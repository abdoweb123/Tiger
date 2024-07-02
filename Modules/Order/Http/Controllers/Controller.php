<?php

namespace Modules\Order\Http\Controllers;

use App\Http\Controllers\BasicController;
use App\Mail\OrderSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\Order\Entities\Model;
use App\Functions\WhatsApp;
use Illuminate\Support\Facades\Log;
use Modules\Country\Entities\Country;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductItem;

class Controller extends BasicController
{
    public function index($method,Request $request)
    {
        // $Models = Model::latest()->with( 'Branch', 'Client.Country', 'Products', 'Address')->get();

        $Orders = Model::with(['Payment', 'Branch', 'Client.Country', 'Products', 'Address'])->latest()
        ->when(auth()->user()?->branch_id, function ($query) {
            return $query->where('branch_id', auth()->user()?->branch_id);
        })
        ->when(request()->phone, function ($query, $role) {
            return $query->whereHas('client', function ($q) {
                $q->where('phone', 'like', '%'.request()->phone.'%');
            });
        })
        ->when(request()->client, function ($query, $role) {
            return $query->whereHas('client', function ($q) {
                $q->where('name', 'like', '%'.request()->client.'%');
            });
        })
        ->when(request()->id, function ($query, $role) {
            return $query->where('id', request()->id);
        })

        ->when($method == 'new', function ($query) {
            return $query->where('status', 0);
        })
        ->when($method == 'current', function ($query) {
            return $query->where('status', 1)->whereIn('follow', [0, 1, 2]);
        })
        ->when($method == 'previous', function ($query) {
            return $query->where('status', 1)->whereIn('follow', [3]);
        })
        ->when($method == 'declined', function ($query) {
            return $query->where('status', 2);
        })
        ->when($method == 'order_history', function ($query) {
            return $query->where('status', 5);
        })
        ->paginate(25);

    $last_order_id = Model::orderby('id', 'desc')->first()->id ?? 0;
    $Countries = Country::get();


        return view('order::index', compact('method', 'Orders', 'last_order_id', 'Countries'));
    }

    public function destroy($id)
    {
        $Model = Model::where('id', $id)->delete();
    }

    public function changestatus(Request $request)
    {
        $Order = Model::with('Products','OrderProducts')->where('id', $request->id)->first();
        $Order->status = $request->status;
        $Order->follow = $request->follow;
        $Order->save();

        if ($Order->delivery_id == 1) {
            if ($request->status == 2) {
                $msg = 'order_rejected';
                foreach ($Order->OrderProducts as $item) {
                    $product = Product::where('id', $item->product_id)->increment('quantity', $item->quantity);
                    Log::info("message",['doneProduct'=>$product]);
                    $product_item = ProductItem::where('color_id',$item->color_id)->where('size_id',$item->size_id)->increment('quantity', $item->quantity);
                    Log::info("message",['doneItem'=>$product_item->quantity]);
                }
            } elseif ($request->status == 1 && $request->follow == 1) {
                $msg = 'order_preparing';
            } elseif ($request->status == 1 && $request->follow == 2) {
                $msg = 'order_onway';
            } elseif ($request->status == 1 && $request->follow == 3) {
                $msg = 'order_delivered';
            } else {
                $msg = 'updatedSuccessfully';
            }
        } elseif ($Order->delivery_id > 1) {
            if ($request->status == 2) {
                $msg = 'order_rejected';
                foreach ($Order->Products as $item) {
                    ProductItem::query()
                        ->where('product_id', (int) $item['product_id'])
                        ->when($item['size_id'] ?? null, function ($query) use ($item) {
                            return $query->where('size_id', $item['size_id']);
                        })
                        ->when($item['color_id'] ?? null, function ($query) use ($item) {
                            return $query->where('color_id', $item['color_id']);
                        })
                        ->increment('quantity', (int) $item['quantity']);
                }
            } elseif ($request->status == 1 && $request->follow == 1) {
                $msg = 'order_preparing';
            } elseif ($request->status == 1 && $request->follow == 2) {
                $msg = 'order_ready';
            } elseif ($request->status == 1 && $request->follow == 3) {
                $msg = 'order_delivered';
            } else {
                $msg = 'updatedSuccessfully';
            }
        }

        $message = '%0a *('.env('APP_NAME').')* %0a';
        $message .= '%0a *Order Number :* '.$Order->id;
        $message .= '%0a '.__('trans.'.$msg).' %0a';
        $message .= '%0a *Powered By Emcan Solutions* %0a';

        // WhatsApp::SendWhatsApp($Order->client()->first()->phone_code.$Order->client()->first()->phone, $message);
        alert()->success(__('trans.'.$msg));

        return response()->json([
            'message' => __('trans.'.$msg),
        ]);
    }


}
