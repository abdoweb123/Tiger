<div class="container-fluid my-5" data-aos="fade-up">
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <h3 class="py-4 fw-semibold">YOU MAY ALSO LIKE</h3>
        </div>
    </div>
    <div class="row ">
        <div class=" slider3 slider-title regular ">
            @foreach ($relatedProducts as $product )
            @php
            $galleryItems = $product->gallery()->whereNotNull('color_id')->get();
            $maxCount = $galleryItems->count();
            // dd($galleryItems)
            @endphp
            <div class=" p-2 ">
                <div class="card  border-0 rounded-0  position-relative p-2">
                    {{-- best seller label --}}
                    <div class="position-absolute best-sell p-2">
                        <div class="rounded-pill bg-warning  text-white d-flex px-3 py-1 align-items-center gap-1  fw-semibold">
                            <span><img src="{{ asset('assets-front/imgs/home/Stroke 1.png') }}" /></span>
                            <span class="text-capitalize">@lang('trans.best_seller')</span>
                        </div>
                    </div>
                    {{-- best seller label --}}

                    {{-- wishlist --}}
                    <div class="position-absolute  liked-icon  d-flex align-items-center    justify-content-center rounded-circle">
                        {{-- <a href="washList.html"> --}}
                            <img class="text-black fs-6 link-blak cursor-pointer mt-1 position-absolute top-0 end-custom spinner" src="{{ asset('assets_client/images/spinner.png') }}" width="15" height="15" style="right:0; display: none;"></span>
                            @if(checkProductWishlist($product->id) == true)
                                <i class="fa-solid fa-heart position-absolute heartIcon text-black"
                                   {{-- style="right: 0;" --}}
                                   data-product-id="{{ $product->id }}"
                                   data-action-url="{{ route('Client.ToggleWishlist') }}">
                                </i>
                                @else
                                    <i class="fa-regular fa-heart text-black fs-6 link-black cursor-pointer mt-1 position-absolute top-0 end-custom heartIcon"
                                       {{-- style="right: 0;" --}}
                                       data-product-id="{{ $product->id }}"
                                       data-action-url="{{ route('Client.ToggleWishlist') }}">
                                    </i>
                                @endif
                        {{-- </a> --}}
                    </div> 
                    {{-- wishlist
                    
                    {{-- details link --}}
                    <a href="{{ route('Client.productDetails',$product->id) }}">
                        <div class="img-card d-flex align-items-center bg-white">
                            <img class="w-100 h-auto" />
                        </div>
                    </a>
                    {{-- details link --}}

                    <div class="card-body px-0">
                        {{-- product name with rating --}}
                        <h6 class="text-black d-flex justify-content-between ">
                            <span class="fw-semibold ">{{ $product->title() }}</span>
                        </h6>
                        {{-- maybe size --}}
                        <p class="card-text text-secondary fw-bold mb-0">
                            <small>@lang('trans.Regular fit')</small>
                        </p>
                        {{-- maybe size --}}
                        {{-- product name with rating --}}

                        {{-- color of product  --}}
                        <div class="card-text my-2">
                            <div class="d-flex gap-2 flex-wrap">
                                @for ($i = 0; $i < $maxCount; $i++)
                                @php
                                $galleryItem = $galleryItems[$i];
                                // dd($galleryItem);
                                $color[$i] = $galleryItem->product->colors->where('id', $galleryItem->color_id)->first();
                                // dd($maxCount);
                                // dd($color[$i]->hexa)
                                @endphp 
                                @if (isset($color[$i]->hexa))
                                    <div class="color {{ $i === 0 ? 'active' : '' }}" style="border-color: {{ $color[$i]->hexa }} !important;" data-img="{{ asset($galleryItems[$i]['image']) }}">
                                        <div class="border-white  border-2 w-100 h-100">
                                            <div class="w-100 h-100 rounded-circle" style="background-color: {{ $color[$i]->hexa }}">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        {{-- color of product  --}}

                        {{-- price of product --}}
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <div class="d-flex">

                                <h6 class="text-black fw-semibold mb-0">
                                    @if($product->HasDiscount())
                                    <span style="text-decoration: line-through; {{lang() == 'en' ? 'margin-right' : 'margin-left'}}: 10px;">
                                        {{$product->Price()}}
                                    </span>
                                    <span>{{$product->PriceWithCurrancy()}}</span>
                                @else
                                    <span>{{$product->Price()}}</span> {{Country()->currancy_code}}
                                @endif
                                </h6>
                                {{-- <h6 class="text-secondary text-decoration-line-through mb-0 px-2">
                                    <span class=" ">30000 </span>
                                    <span>BD</span>
                                </h6> --}}

                            </div>
                            {{-- <a class="btn btn-dark" href="shoppingCart.html"><i
                                    class="fa-solid fa-cart-shopping"></i></a> --}}
                        </div>
                        {{-- price of product --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>