<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BasicController;
use App\Http\Requests\Client\AddressRequest;
use App\Http\Requests\Client\BillingAddressRequest;
use App\Http\Requests\Client\ShippingAddressRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Address\Entities\Model as Address;
use Modules\Country\Entities\Country;
use Modules\Country\Entities\Region;

class AddressController extends BasicController
{
    public function createAddress(Request $request)
    {

        $countries = Country::active()->whereHas('Regions')->get();
        $regions = Region::where('country_id', $request->country_id)->where('status', 1)->get();
        $Client = auth('client')->user();
        $addresses = $Client->addresses;
        $defaultAddress = Address::with(['country', 'region'])->where('client_id', $Client->id)->where('default', 1)->first();
        return view('client.addAddress', compact('countries', 'regions'));
    }

    public function getRigons(Request $request)
    {

        $rigons = Region::where('country_id', $request->country_id)->where('status', 1)->get();
        return response()->json($rigons);

    }

    public function storeAddress(Request $request){
        // dd($request);
        $defaultValue=0;
        if($request->default=='on'){
            $defaultValue=1;
        }else{
            $defaultValue=0;
        }
        $defaultAddress = Address::where('client_id', auth('client')->user()->id)->where('default', 1)->latest()->first();
        $default = isset($request->default) ? 1 : 0;
        if ($defaultAddress) {

            if ($default == 1) {
                $defaultAddress->update(["default" => 0]);
                Address::create([
                    'client_id' => client_id(),
                    'country_id' => $request->country_id,
                    'region_id' => $request->region_id,
                    'city' => $request->city,
                    'block' => $request->block,
                    'apartment' => $request->apartment,
                    'street' => $request->street,
                    'road' => $request->road,
                    'default'=>$defaultValue,
                    // 'region_id' => $request->region_id,
                    // 'note' => $request->note,
                ]);
            } else {
                Address::create([
                    'client_id' => client_id(),
                    'country_id' => $request->country_id,
                    'region_id' => $request->region_id,
                    'city' => $request->city,
                    'block' => $request->block,
                    'apartment' => $request->apartment,
                    'street' => $request->street,
                    'road' => $request->road,
                    'region_id' => $request->region_id,
                    'default'=>$defaultValue,
                    // 'note' => $request->note,
                ]);
            }

        } else {
            Address::create([
                'client_id' => client_id(),
                'country_id' => $request->country_id,
                    'region_id' => $request->region_id,
                    'city' => $request->city,
                    'block' => $request->block,
                    'apartment' => $request->apartment,
                    'street' => $request->street,
                    'road' => $request->road,
                    'default'=>$defaultValue,
                    // 'region_id' => $request->region_id,
                    // 'note' => $request->note,
            ]);
        }
        // dd(1);

        // dd($default);


        // alert()->success(__('trans.addedSuccessfully'));
        session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.addedSuccessfully')]);
        return redirect()->back();
    }

    // public function editAddress(Request $request,$id){

    //     $this->validate($request, [
    //         'country_id' => 'required|exists:countries,id',
    //         'region_id' => 'required|exists:regions,id',
    //         'flat' => 'numeric|nullable',
    //         'zone' => 'required',
    //         'road' => 'required',
    //         'building_no' => 'required|numeric',
    //         'floor_no' => 'numeric|nullable',
    //         'note' => 'nullable'
    //     ]);

    //     $defaultAddress = Address::where('client_id', auth('client')->user()->id)->where('default', 1)->latest()->first();

    //     $default = isset($request->default) ? 1 : 0;
    //     if ($defaultAddress) {
    //         if ($default == 1) {
    //             $defaultAddress->update(["default" => 0]);
    //             Address::where('id', $id)->update(['default' => 1] + $request->except('_token', '_method'));

    //         } else {
    //             Address::where('id', $id)->update(['default' => 0] + $request->except('_token', '_method'));

    //         }
    //     } else {
    //         Address::where('id', $id)->update(['default' => $default] + $request->except('_token', '_method'));

    //     }

    //     alert()->success(__('trans.updatedSuccessfully'));

    //     return redirect()->back();
    // }
    public function editAddress($id)
    {
        $countries = Country::active()->whereHas('Regions')->get();
        $regions = Region::where('country_id', Country()->id)->where('status', 1)->get();
        $address = Address::findOrFail($id);
        // $Location = Location::get(request()->ip());
        $Client = auth('client')->user();
        $addresses = $Client->addresses;
        $defaultAddress = Address::with(['country', 'region'])->where('client_id', $Client->id)->where('default', 1)->first();
        
        // $Orders = Order::where('client_id',auth('client')->user()->id)->get();
        // return view('Client.address.edit', [
        //     'address' => $address,
        //     'countries' => $countries,
        //     'regions' => $regions,
        //     'Client' => $Client,
        //     'addresses' => $addresses,
        //     'defaultAddress' => $defaultAddress,
        //     'Orders'=>$Orders
        // ]);
        return view('client.editAddress',compact('countries','regions','address','Client','addresses','defaultAddress'));
    }




        public function updateAddress(Request $request, $id)
    {

        // $this->validate($request, [
        //     'country_id' => 'required|exists:countries,id',
        //     'region_id' => 'required|exists:regions,id',
        //     'flat' => 'numeric|nullable',
        //     'zone' => 'required',
        //     'road' => 'required',
        //     'building_no' => 'required|numeric',
        //     'floor_no' => 'numeric|nullable',
        //     'note' => 'nullable'
        // ]);
        $defaultAddress = Address::where('client_id', auth('client')->user()->id)->where('default', 1)->latest()->first();
        $default = isset($request->default) ? 1 : 0;
        if ($defaultAddress) {
            if ($default == 1) {
                $defaultAddress->update(["default" => 0]);
                Address::where('id', $id)->update(['default' => 1] + $request->except('_token', '_method'));

            } else {
                Address::where('id', $id)->update(['default' => 0] + $request->except('_token', '_method'));

            }
        } else {
            Address::where('id', $id)->update(['default' => $default] + $request->except('_token', '_method'));

        }

        session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.updatedSuccessfully')]);
        return redirect()->back();
    }
   

    // public function destroy($id)
    // {
    //     $address = Address::where('id', $id)->first();
    //     $ordersCount = Order::where('address_id', $id)->count();

    //     // If the address has orders, return a response indicating it cannot be deleted
    //     if ($ordersCount > 0) {
    //         alert()->success(__('trans.Cannot be deleted as it has orders'));

    //     }else{
    //         $address->delete();
    //         alert()->success(__('trans.DeletedSuccessfully'));

    //     }

    //     session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.updatedSuccessfully')]);
    //     return redirect()->back();

    // }

    // Controller method to fetch regions for country by ajax
    // public function fetchRegionsForCountry(Request $request)
    // {
    //     // Assuming you have a Region model

    //     $country_id = $request->country_id;
    //     $regions = Region::where('country_id', $country_id)->get(['id', 'title_' . lang() . ' as title']);
    //     return response()->json(['regions' => $regions]);
    // }


    /*** update Shipping Address in account ***/
    public function updateShippingAddress(Request $request)
    {

        // save address
        $addressShipping = Address::query()->updateOrCreate(
                [
                    'client_id' => client_id(),
                ],

                [
                    // 'first_name' => $request->first_name,
                    // 'last_name' => $request->last_name,
                    'country_id' => $request->country_id,
                    'region_id' => $request->region_id,
                    'city' => $request->city,
                    'block' => $request->block,
                    'apartment' => $request->apartment,
                    'street' => $request->street,
                    'road' => $request->road,
                    'region_id' => $request->region_id,
                    // 'state' => $request->state,
                    // 'road' => $request->road,
                    // 'building_no' => $request->building_no,
                    // 'floor_no' => $request->floor_no,
                    // 'apartmentType' => $request->apartmentType,
                    // 'additional_directions' => $request->additional_directions,
                ]
            );
        // dd($addressShipping);
        session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.updatedSuccessfully')]);
        return redirect()->back();
    }

    /*** update Address Shipping in cart ***/
    public function updateAddressShipping(Request $request)
    {

        $old_address = Address::where('client_id', client_id())->where('shipping', 1)->delete();

        $new_address = Address::query()->create([
                'client_id' => client_id(),
                'country_id' => $request->input('country_id'),
                'region' => $request->input('city'),
                'shipping' => 1,
                'state' => $request->input('state'),
            ]);


        if ($new_address->country_id == Country()->id)
            $delivery_type = 1;
        else
            $delivery_type = 3;

        return response()->json([
            'success' => true,
            'type' => 'success',
            'delivery_type' => $delivery_type,
            'message' => __('trans.shippingCostUpdated'),
        ]);
    }
} //end of class
