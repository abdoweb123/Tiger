<?php

namespace App\Http\Controllers\Client;

use App\Functions\WhatsApp;
use App\Http\Controllers\BasicController;
use App\Http\Requests\Client\AddressRequest;
use App\Http\Requests\SaveCheckoutRequest;
use App\Mail\OrderSummary;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\Address\Entities\Model as Address;
use Modules\Client\Entities\Model as Client;
use Modules\Country\Entities\Country;
use Modules\Country\Entities\Region;
use Modules\Order\Entities\Model as Order;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductItem;
use Stevebauman\Location\Facades\Location;

class CheckoutController extends BasicController
{

    /*** checkoutPost to save shippingType in session ***/
    public function checkoutPost(Request $request)
    {
        $request->validate([
            'shipping_type' => 'required|in:1,2,3'
        ]);

        shippingType($request->input('shipping_type'));

        return redirect()->route('Client.checkout');
    }


    /*** Go to checkout page ***/
    public function checkout()
    {
        $cart = Cart::where('client_id', client_id())->with('product')->get();
        // first() address
        $addresses = Address::where('client_id', client_id())->get();
        $countries = Country::active()->whereHas('Regions')->get();
        if (count($cart) == 0) {
            return redirect()->back();
        }
        $subTotalCart = CheckoutController::getTotalCart($cart);
        // dd($subTotalCart);
        $vat = number_format($subTotalCart * (setting('vat') / 100), Country()->decimals, '.', '');
        $total = number_format($vat + $subTotalCart, Country()->decimals, '.', '');
        $regions = Region::where('country_id', Country()->id)->where('status', 1)->get();
        return view('client.checkout', compact('total','vat','cart', 'subTotalCart','regions','addresses','countries'));
    }

    

    /*** save checkout ***/
    // public function saveCheckout(SaveCheckoutRequest $request)
    // {

    //     // if create account == 1 create account
    //     if (!auth('client')->check()) {
    //         $client = Client::query()->updateOrCreate(
    //                 [
    //                     'email' => $request->email_address,
    //                     'phone' => $request->phone_billing,
    //                 ],
    //                 [
    //                     'email' => $request->email_address,
    //                     'phone' => $request->phone_billing,
    //                     'name' => $request->first_name,
    //                 ]
    //             );

    //         auth('client')->login($client);
    //         $this->convertGuestDataToClient();
    //     }


    //     // update shipping address
    //     $addressShipping = Address::query()->create([
    //             'client_id' => client_id(),
    //             'first_name' => $request->first_name,
    //             'last_name' => $request->last_name,
    //             'country_id' => $request->country_id,
    //             'address1' => $request->address1,
    //             'address2' => $request->address2,
    //             'city' => $request->city,
    //             'state' => $request->state,
    //             'region_id' => $request->region_id,
    //             'block' => $request->block,
    //             'road' => $request->road,
    //             'building_no' => $request->building_no,
    //             'floor_no' => $request->floor_no,
    //             'apartment' => $request->apartment,
    //             'apartmentType' => $request->apartmentType,
    //             'additional_directions' => $request->additional_directions,
    //             'gift_color' => $request->gift_color,
    //             'gift_comment' => $request->gift_comment,
    //         ]);


    //     return redirect()->route('Client.submitOrder', $addressShipping->id);
    // }


    /*** submit order ***/
    public function submitOrder($id)
    {

        $carts = Cart::where('client_id', client_id())->with('product')->get();
        $subTotalCart = $this->calcSubtotalCart($carts);
        $shippingValue = shippingType() == '1' ? setting('internal_shipping_cost') : (shippingType() == '3' ? setting('international_shipping_cost') : 0);
        $addressShipping = Address::query()->where('id', $id)->firstOrFail();
        $payment_id = 1; //cash

        try {
            DB::beginTransaction();

            $Order = Order::create([
                'client_id' => Client_id(),
                'delivery_id' => shippingType(),
                'address_id' => $addressShipping->id ?? null,
                'payment_id' => $payment_id,
                'sub_total' => $subTotalCart['sub_total_before_discount'],
                'discount' => $subTotalCart['discount'],
                'discount_percentage' => $subTotalCart['totalDiscountPercentage'],
                'charge_cost' => $shippingValue,
                'net_total' => $subTotalCart['sub_total'] + $shippingValue,
            ]);

            foreach ($carts as $cart) {
                $Order->Products()->attach($cart->product->id, [
                    'price' => $cart->Product->price,
                    'item_id' => $cart->item_id,
                    'color_id' => $cart->color_id,
                    'size_id' => $cart->size_id,
                    'quantity' => $cart->quantity,
                    'total' => $cart->Product->price * $cart->quantity,
                ]);
                $product = Product::where('id', $cart->product_id)->decrement('quantity', $cart->quantity);
                $product_item = ProductItem::where('id', $cart->item_id)->decrement('quantity', $cart->quantity);
                $cart->delete();
            }


            try {
                $client = auth('client')->user() ?? $addressShipping;
                Mail::to(['apps@emcan-group.com', setting('email'), $client->email])->send(new OrderSummary($Order));
            } catch (\Throwable $th) {
            }

            DB::commit();
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Database transaction failed: ' . $e->getMessage());
            // Optionally, you can also return a response with an error message
            return response()->json(['error' => 'An error occurred while processing your request: ' . $e->getMessage()], 500);
        }


        return redirect()->route('Client.successfulOrder');
    }



    //    // Get total cart
    //    public static function getTotalCart($cart)
    //    {
    //        $subTotalCart = 0;
    //        foreach ($cart as $cartItem) {
    //            $subTotalCart += $cartItem->product->RealPrice() * $cartItem->quantity * Country()->currancy_value;
    //        }
    //        return  $subTotalCart;
    //    }

    // Get total cart
    public static function getTotalCart($cart)
    {
        $subTotalCart = 0;
        foreach ($cart as $cartItem) {
            $subTotal = 0;
            foreach ($cart as $cartItem) {
                if ($cartItem->product->discount_value && $cartItem->product->discount_from < now() && $cartItem->product->discount_to > now()) {
                    $subTotalCart = ($cartItem->product->price - ($cartItem->product->price / 100 * $cartItem->product->discount_value)) * Country()->currancy_value;
                } else {
                    $subTotalCart = $cartItem->product->price * Country()->currancy_value;
                }
                $subTotal = $subTotal + ($subTotalCart * $cartItem->quantity);
            }
            return  $subTotal;
        }
    }


    // calcSubtotalCart (sub_total_before_discount, sub_total, discount)
    public function calcSubtotalCart($carts)
    {
        $sub_total = 0;
        $sub_total_before_discount = 0;
        $discount = 0;
        foreach ($carts as $cart) {
            if ($cart->Product->HasDiscount()) {
                $sub_total_before_discount += $cart->Product->price * $cart->quantity;
                $sub_total += $cart->Product->price * $cart->quantity - ($cart->Product->price * $cart->quantity / 100 * $cart->Product->discount_value);
                $discount += ($cart->Product->price * $cart->quantity) * ($cart->Product->discount_value / 100);
            } else {
                $sub_total += $cart->Product->price * $cart->quantity;
                $sub_total_before_discount = $sub_total;
            }
        }

        $totalDiscountPercentage = round((($discount / $sub_total_before_discount) * 100), 2);

        $result = [
            'sub_total_before_discount' => $sub_total_before_discount,
            'sub_total' => $sub_total,
            'discount' => $discount,
            'totalDiscountPercentage' => $totalDiscountPercentage,
        ];

        return $result;
    }


    // To convert [wishlist, orders, addresses, cart] of guest to client
    public function convertGuestDataToClient()
    {
        $guest_id = session()->get('client_id');
        if ($guest_id) {
            DB::table('wishlist')->where('client_id', $guest_id)->update(['client_id' => auth('client')->id()]);
            DB::table('orders')->where('client_id', $guest_id)->update(['client_id' => auth('client')->id()]);
            DB::table('addresses')->where('client_id', $guest_id)->update(['client_id' => auth('client')->id()]);
            DB::table('cart')->where('client_id', $guest_id)->update(['client_id' => auth('client')->id()]);
        }
    }
} //end of class
