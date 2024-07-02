<?php

namespace App\Http\Controllers\Client;

use App\Functions\WhatsApp;
use App\Http\Controllers\BasicController;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Address\Entities\Model as Address;
use Modules\Service\Entities\Model as Service;
use Modules\Product\Entities\ProductItem;
use Modules\Subscriber\Entities\Model as Subscriber;
use Modules\Product\Entities\Product;
use Modules\Order\Entities\Model as Order;
use Modules\Size\Entities\Model as Size;
use Modules\Category\Entities\Model as Category;
use Modules\Slider\Entities\Model as Slider;
use Modules\Country\Entities\Region;
use Modules\Coupon\app\Models\Coupon;
use Modules\ProductReview\app\Models\ProductReview;

class HomeController extends BasicController
{
    // Home Page
    public function home()
    {
        $carouselItems = Slider::Active()->get();
        $services = Service::Active()->get();
        $products = Product::with('gallery', 'colors')->get();
        // $mainCategory = Categories()->where('appearInHomepage',1)->first();
        $mostPopularProducts = Product::query()->where('most_popular', 1)->get();
        $mostSellingProducts = Product::query()->where('most_selling', 1)->get();
        $NewCollectionProducts = Product::query()->where('new_collection', 1)->get();
        return view('client.index', compact('NewCollectionProducts', 'mostSellingProducts', 'carouselItems', 'services', 'mostPopularProducts', 'products'));
    }

    public function newCollection()
    {

        $NewCollectionProducts = Product::query()->where('new_collection', 1)->get();
        $categories = Category::with('children')->whereNull('parent_id')->get();
        // dd($categories);
        return view('client.newCollection', compact('NewCollectionProducts', 'categories'));
    }

    public function offers()
    {

         $now = Carbon::now();

        $productsWithOffers = Product::query()
            ->whereNotNull('discount_value')
            ->where('discount_from', '<', $now)
            ->where('discount_to', '>', $now)
            ->get();
        $categories = Category::with('children')->whereNull('parent_id')->get();
        // dd($categories);
        return view('client.offers', compact('productsWithOffers', 'categories'));
    }
    // public function filterProducts(Request $request)
    // {
    //     $query = Product::query();

    //     if ($request->has('category_id') && $request->category_id) {
    //         $category = Category::with('children')->find($request->category_id);
    //         $query->whereHas('categories', function ($q) use ($category) {
    //             $q->where('category_id', $category->id)
    //                 ->orWhereIn('category_id', $category->children->pluck('id')->toArray());
    //         });
    //     }

    //     if ($request->has('min_price') && $request->has('max_price')) {
    //         $query->whereBetween('price', [$request->min_price, $request->max_price]);
    //     }

    //     $products = $query->get();

    //     return response()->json($products);
    // }
    public function filterProducts(Request $request)
    {
        // Log::info("product filter",['request'=>$request->category_id]);
        $query = Product::query();
    
        if ($request->has('category_id')) {
            $category = Category::find($request->category_id);
            if ($category) {
                $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('category_id', $category->id)
                      ->orWhereIn('category_id', $category->children->pluck('id'));
                });
            }
        }
    
        if ($request->has('subcategory_id') && $request->subcategory_id != 'all') {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('category_id', $request->subcategory_id);
            });
        }
    
        if ($request->has('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }
    
        $products = $query->get();
    
        $view = view('client.product_list', compact('products'))->render();
    
        return response()->json(['html' => $view]);
    }

    public function filterProductsOffers(Request $request)
    {
        // Log::info("product filter",['request'=>$request->category_id]);
        $now = Carbon::now();
        $query = Product::query()
        ->whereNotNull('discount_value')
            ->where('discount_from', '<', $now)
            ->where('discount_to', '>', $now);
    
        if ($request->has('category_id')) {
            $category = Category::find($request->category_id);
            if ($category) {
                $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('category_id', $category->id)
                      ->orWhereIn('category_id', $category->children->pluck('id'));
                });
            }
        }
    
        if ($request->has('subcategory_id') && $request->subcategory_id != 'all') {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('category_id', $request->subcategory_id);
            });
        }
    
        if ($request->has('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }
    
        $productOffers = $query->get();
    
        $view = view('client.product_list_offers', compact('productOffers'))->render();
    
        return response()->json(['html' => $view]);
    }
    

    public function getSubcategories(Request $request)
    {
        if ($request->has('category_id')) {
            $category = Category::with('children')->find($request->category_id);
            $subcategories = $category->children;

            return response()->json($subcategories);
        }

        return response()->json([]);
    }


    public function success($id, Request $request)
    {
        // dd($id);
        $Order = Order::findorfail($id);
        return view('client.success', compact('Order'));
    }

    
    

    public function priceFilter(Request $request)
    {
        $query = Product::query();

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('subcategory')) {
            $query->where('subcategory_id', $request->subcategory);
        }

        if ($request->has('sort')) {
            if ($request->sort == 'price_low_high') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_high_low') {
                $query->orderBy('price', 'desc');
            }
        }

        $products = $query->get();

        return response()->json($products);
    }


    // searchProducts (ajax)
    public function searchProducts(Request $request)
    {
        $searchTerm = $request->input('search_product');

        // Query products based on the search term
        $results = Product::with('gallery', 'colors')
            ->where('id', 'like', '%' . $searchTerm . '%')
            ->orWhere('title_ar',  'like', '%' . $searchTerm . '%')
            ->orWhere('title_en',  'like', '%' . $searchTerm . '%')
            // ->select('id','title_'.lang().' as title')
            ->get();

        // dd($searchTerm);
        return view('client.searchResult', compact('results'));

        // return response()->json($products);
    }

    public function reviewView($id)
    {
        $product = Product::where('id', $id)->first();
        return view('client.review', compact('product'));
    }

    public function getTotalBeforShipping(Request $request)
    {
        $data = CalcCart();
        return response()->json($data['total']);
    }

    public function getDeliveryCost(Request $request)
    {
        // dd($request->address_id);
        if ($request->address_id == null) {
            $DeliveryCost = Region::where('id', $request->region_id)->where('status', 1)->first()->delivery_cost;
            $DeliveryCost = number_format(Country()->currancy_value * $DeliveryCost, Country()->decimals, '.', '');
        } else {
            // dd(1);
            $address = Address::where('id', $request->address_id)->first();
            // dd($address->region_id);
            $DeliveryCost = Region::where('id', $address->region_id)->where('status', 1)->first()->delivery_cost;
            // dd($DeliveryCost);
            $DeliveryCost = number_format(Country()->currancy_value * $DeliveryCost, Country()->decimals, '.', '');
        }

        $data = CalcCart();
        $totalAfterShipping = number_format($data['total'] + $DeliveryCost, Country()->decimals, '.', '');
        return response()->json(['DeliveryCost' => $DeliveryCost, 'totalAfterShipping' => $totalAfterShipping]);;
    }

    public function applayCode(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();
        // Log::info('Data from CalcCart:', ['يهس' => $coupon->discount]);
        if ($coupon) {
            if ($coupon->from < now() && $coupon->to > now()) {
                if ($coupon->type == "discount") {
                    if ($coupon->discount < $request->subTotal) {
                        $subTotalAfterCoupon = number_format(($request->subTotal - ($coupon->discount * Country()->currancy_value)), Country()->decimals, '.', '');
                        // Log::info('Data from CalcCart:', ['subTotalAfterCoupon' => $subTotalAfterCoupon]);
                        $couponValue = number_format($coupon->discount * Country()->currancy_value, Country()->decimals, '.', '');
                        $vat = number_format($subTotalAfterCoupon * (setting('vat') / 100), Country()->decimals, '.', '');
                        $charge_cost = $request->charge_cost;
                        $total = number_format($charge_cost + $vat + $subTotalAfterCoupon, Country()->decimals, '.', '');
                        $message = "coupon applied sucsessfly";
                        return response()->json(['status' => true, 'message' => $message, 'vat' => $vat, 'total' => $total, 'subTotalAfterCoupon' => $subTotalAfterCoupon, 'couponValue' => $couponValue]);
                    } else {
                        $message = "coupon value greater than sub total";
                        $subTotalAfterCoupon = number_format(0 * Country()->currancy_value, Country()->decimals, '.', '');
                        $couponValue = number_format(0 * Country()->currancy_value, Country()->decimals, '.', '');
                        // $vat = number_format($subTotal * (setting('VAT') / 100), Country()->decimals, '.', '');
                        $charge_cost = $request->charge_cost;
                        $total = number_format($charge_cost + $request->vat + $request->subTotal, Country()->decimals, '.', '');
                        return response()->json(['status' => false, 'vat' => $request->vat, 'message' => $message, 'total' => $total, 'subTotalAfterCoupon' => $subTotalAfterCoupon, 'couponValue' => $couponValue]);
                    }
                } else {
                    // type percentage

                    $message = "coupon applied sucsessfly";
                    $subTotalAfterCoupon = number_format((($request->subTotal) * (1 - ($coupon->percent_off / 100))) * Country()->currancy_value, Country()->decimals, '.', '');
                    $couponValue = number_format(($request->subTotal * ($coupon->percent_off / 100)) * Country()->currancy_value, Country()->decimals, '.', '');
                    $vat = number_format($subTotalAfterCoupon * (setting('vat') / 100), Country()->decimals, '.', '');
                    $charge_cost = $request->charge_cost;
                    $total = number_format($charge_cost + $vat + $subTotalAfterCoupon, Country()->decimals, '.', '');
                    return response()->json(['status' => true, 'vat' => $vat, 'message' => $message, 'total' => $total, 'subTotalAfterCoupon' => $subTotalAfterCoupon, 'couponValue' => $couponValue]);
                }
            } else {
                $message = "coupon expierd";
                $subTotalAfterCoupon = number_format(0 * Country()->currancy_value, Country()->decimals, '.', '');
                $couponValue = number_format(0 * Country()->currancy_value, Country()->decimals, '.', '');
                // $vat = number_format($subTotal * (setting('VAT') / 100), Country()->decimals, '.', '');
                $charge_cost = $request->charge_cost;
                $total = number_format($charge_cost + $request->vat + $request->subTotal, Country()->decimals, '.', '');
                return response()->json(['status' => false, 'message' => $message, 'total' => $total, 'subTotalAfterCoupon' => $subTotalAfterCoupon, 'vat' => $request->vat, 'couponValue' => $couponValue]);
            }
        } else {
            $message = "coupon not found";
            $subTotalAfterCoupon = number_format(0 * Country()->currancy_value, Country()->decimals, '.', '');
            $couponValue = number_format(0 * Country()->currancy_value, Country()->decimals, '.', '');
            // $vat = number_format($subTotal * (setting('VAT') / 100), Country()->decimals, '.', '');
            $charge_cost = $request->charge_cost;
            $total = number_format($charge_cost + $request->vat + $request->subTotal, Country()->decimals, '.', '');
            return response()->json(['status' => false, 'vat' => $request->vat, 'message' => $message, 'total' => $total, 'subTotalAfterCoupon' => $subTotalAfterCoupon, 'couponValue' => $couponValue]);
        }
    }

    public function getInailDeliveryCost(Request $request)
    {
        // dd($request->inialRegion);
        Log::info('Data from CalcCart:', ['inital' => $request->inialRegion]);
        if ($request->inialRegion != null) {
            $inailDeliveryCost = Region::where('id', $request->inialRegion)->first()->delivery_cost;
            $inailDeliveryCostForSelectedCurrancy = number_format(Country()->currancy_value * $inailDeliveryCost, Country()->decimals, '.', '');
        } elseif ($request->address_id != null) {
            $address = Address::where('id', $request->address_id)->first();
            $inailDeliveryCost = Region::where('id', $address->region_id)->first()->delivery_cost;
            Log::info('Data from CalcCart:', ['inailDeliveryCost' => $inailDeliveryCost]);
            $inailDeliveryCostForSelectedCurrancy = number_format(Country()->currancy_value * $inailDeliveryCost, Country()->decimals, '.', '');
            Log::info('Data from CalcCart:', ['inailDeliveryCostForSelectedCurrancy' => $inailDeliveryCostForSelectedCurrancy]);
        } else {
            $inailDeliveryCostForSelectedCurrancy = number_format(Country()->currancy_value * 0, Country()->decimals, '.', '');
        }

        $data = CalcCart();
        Log::info('Data from CalcCart:', ['carts' => $data['carts']]);
        Log::info('Data from CalcCart:', ['data' => $data['subTotal']]);
        Log::info('Data from CalcCart:', ['data' => $data['vat']]);
        Log::info('Data from CalcCart:', ['data' => $data['total']]);
        $totalAfterShipping = number_format($data['total'] + $inailDeliveryCostForSelectedCurrancy, Country()->decimals, '.', '');
        Log::info('Data from CalcCart:', ['finalTotal' => $totalAfterShipping]);
        return response()->json(['inailDeliveryCostForSelectedCurrancy' => $inailDeliveryCostForSelectedCurrancy, 'totalAfterShipping' => $totalAfterShipping]);
    }

    public function submit(Request $request)
    {
        $client_id = auth('client')->user()->id;
        // dd($client_id);

        // step one shipping methods

        // has delivery shipping method
        if ($request->delivery_id == 1) {
            $addressLogined = Address::where('client_id', $client_id)->get();
            // dd($addressLogined);
            if ($addressLogined->count() > 0) {
                // dd(1);
                $this->validate($request, [
                    'payment_id' => 'required',
                    'address_id' => 'required',

                ]);
                $address_id = $request->address_id;
            } else {
                $Address = Address::create([
                    'client_id' => $client_id,
                    'country_id' => $request->country_id,
                    'region_id' => $request->region_id,
                    'city' => $request->city,
                    'block' => $request->block,
                    'apartment' => $request->apartment,
                    'street' => $request->street,
                    'road' => $request->road,
                    'region_id' => $request->region_id,
                ]);
                $address_id = $Address->id;
            }
        } else {
            // if pickup the order he don't need delivery
            $this->validate($request, [
                'payment_id' => 'required',
            ]);
            $address_id = null;
        }

        // step two coupons handle
        if ($request->code != null) {
            $coupon = Coupon::where('code', $request->code)->first();
            $coupon_id = $coupon->id;
        } else {
            $coupon_id = null;
        }

        $Cart = Cart::where('client_id', client_id())->with('product')->get();
        $sub_total = 0;
        $sub_total_exclusive_vat = 0;
        $discount = 0;

        $Order = Order::create([
            'client_id' => $client_id,
            'delivery_id' => $request->delivery_id,
            'address_id' => $address_id,
            'payment_id' => $request->payment_id,
            'status' => $request->payment_id > 1 ? 5 : 0,
            'follow' => 0,
            'coupon_id' => $coupon_id,
            'sub_total' => $request->sub_total,
            'discount' => $discount,
            'discount_percentage' => 0,
            'vat' => $request->vat,
            'notes' => $request->notes,
            'vat_percentage' => setting('vat'),
            'coupon' => $request->coupon,
            'coupon_percentage' => 0,
            'charge_cost' => $request->charge_cost,
            'net_total' => $request->net_total,
            'sub_total_after_coupon' => $request->sub_total_after_coupon
        ]);
        // dd($Order);
        foreach ($Cart as $key => $CartItem) {
            $Product = $CartItem->Product->first();
            $ProPrice = ($Product->CalcPrice());

            // DB::table('order_product')->insert([
            //     'order_id' => $Order->id,
            //     'product_id' => $CartItem->Product->id,
            //     'size_id' => $CartItem->size_id > 0 ? $CartItem->size_id : null,
            //     'color_id' => $CartItem->color_id > 0 ? $CartItem->color_id : null,
            //     'price' => $ProPrice,
            //     'quantity' => $CartItem->quantity,
            //     'total' => $ProPrice * $CartItem->quantity,
            //     'category' => $CartItem->category,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            $OrderProduct = $Order->OrderProducts()->create([
                'product_id' => $CartItem->Product->id,
                'size_id' => $CartItem->size_id > 0 ? $CartItem->size_id : null,
                'color_id' => $CartItem->color_id > 0 ? $CartItem->color_id : null,
                'price' => $ProPrice,
                'quantity' => $CartItem->quantity,
                'total' => $ProPrice * $CartItem->quantity,
                'category' => $CartItem->category,
            ]);
            // dd($Order->OrderProducts);
            $product = Product::where('id', $CartItem->product_id)->decrement('quantity', $CartItem->quantity);
            $product_item = ProductItem::where('id', $CartItem->item_id)->decrement('quantity', $CartItem->quantity);


            if ($request->payment_id == 1) {
                $CartItem->delete();
            }
        }

        if ($Order) {
            if ($Order->payment_id == 1) {
                WhatsApp::SendOrder($Order);
                return redirect()->route('Client.success', $Order->id);
                // try {
                //     Mail::to(['info@or-couture.com', setting('email'), $Order->client->email])->send(new OrderSummary($Order));
                // } catch (\Exception $e) {
                //     return $e->getMessage();
                // }
                // alert()->success(__('trans.order_added_successfully'));

            }
        } else {
            return redirect()->back();
        }
    }


    // store subscriber
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ], [
            'email.required' => __('validation.required', ['attribute' => __('validation.attributes.email')]),
            'email.email' => __('validation.email'),
            'email.unique' => __('validation.unique', ['attribute' => __('validation.attributes.email')])
        ]);

        Subscriber::create($request->all());

        if ($request->ajax()) {
            return response()->json(['message' => __('trans.subscribedSuccessfully')]);
        } else {
            session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.subscribedSuccessfully')]);
            return back();
        }
    }


    // change country
    public function changeCountry($id)
    {
        // To change country in (config)
        $country =  Countries()->where('id', $id)->first();
        session()->put('country', $country->id);
        Country($country->id);

        return redirect()->back();
    }


    // Get famous questions
    public function getFaqs()
    {
        $Faqs = FAQ();
        return view('client.faqs', compact('Faqs'));
    }


    // Get Stores (branches)
    public function getStores()
    {
        $stores = Branches();
        return view('client.store', compact('stores'));
    }



    /*** Get details of product ***/
    public function productDetails(Product $product)
    {
        // return $product;
        $product->increment('viewed'); // for viewed products

        $productSizes = Size::whereHas('items', function ($q) use ($product) {
            $q->where('product_id', $product->id);
        })->with('items')->get();

        // get colors first images
        $productFirstColorImages = $product->Gallery->whereNotNull('color_id')->groupBy('color_id')->map(function ($group) {
            return $group->first()->load('color');
        });

        // To get related products
        //  $categoryIds = $product->Categories->pluck('id');
        $categoryIds = $product->categories()->pluck('categories.id');
        $relatedProducts = Product::where('products.id', '!=', $product->id)
            ->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('categories.id', $categoryIds);
            })
            ->get();

        // To get services
        // $services = Service::Active()->get();


        // $reviews=ProductReview::get();

        $clientReviews = ProductReview::with('Client')->where('product_id', $product->id)->paginate(3);
        $totalReviews = ProductReview::with('Client')->where('product_id', $product->id)->count();
        // dd($clientReviews);
        $ratingRound = ProductReview::where('product_id', $product->id)
            ->avg('rate');
        // dd($ratingRound);
        $averageRating = round($ratingRound);
        // dd($averageRating);

        // dd($productFirstColorImages);
        $rate = ProductReview::where('product_id', $product->id)
            ->selectRaw('rate, COUNT(*) as count')
            ->groupBy('rate')
            ->get();

        $ratingsCount = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ];

        foreach ($rate as $rating) {
            $ratingsCount[$rating->rate] = $rating->count;
        }
        // dd($ratingsCount);
        return view('client.product-details.product-details', compact('ratingRound', 'ratingsCount', 'product', 'relatedProducts', 'productFirstColorImages', 'productSizes', 'clientReviews', 'averageRating', 'totalReviews'));
    }


    /*** Get getSizesByColor ***/
    public function getSizesByColor(Request $request)
    {
        $sizes = ProductItem::where('product_id', $request->input('product_id'))
            ->where('color_id', $request->input('color_id'))->pluck('size_id');

        return response()->json($sizes);
    }


    /*** Get getItemByColorSize ***/
    public function getItemByColorSize(Request $request)
    {
        $item = ProductItem::where('product_id', $request->input('product_id'))
            ->where('color_id', $request->input('color_id'))
            ->where('size_id', $request->input('size_id'))->first();

        return response()->json($item);
    }


    // rating and reviews
    public function ClientReview(Request $request)
    {
        // dd($request); 
        if ($request->rate == "0") {
            $this->validate($request, [
                "rate" => "required"
            ]);
            return redirect()->back()->with('rating', trans('trans.Rating required minimum 1 sater'));
        } else {
            ProductReview::create([
                "client_id" => client_id(),
                "product_id" => $request->product_id,
                'rate' => $request->star,
                'comment' => $request->comment,
            ]);
            $product = Product::where('id', $request->product_id)->first();
            session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.Your Review Has Been Added Successfully')]);
            return redirect()->route('Client.productDetails', $product);
        }
    }
} //end of class
