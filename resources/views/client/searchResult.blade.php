@extends('client.layouts.layout')
@push('css')
    <style>
        .bg-products {
            background-image: url("{{ asset('assets-front/imgs/home/Frame 1171276904.png') }}");
            height: 40vh;
            background-position: center center;
        }
    </style>
@endpush
@section('content')
    <div class="w-100 bg-products"></div>
{{-- {{ dd($results) }} --}}
    <div class="container my-lg-5 my-3">
        <h4 class=" py-3 mb-0">Search Result</h4>
        <div class="row gy-4  slider-title regular">
            @foreach ($results as $product )
            @php
                $galleryItems = $product->gallery()->whereNotNull('color_id')->get();
                $maxCount = $galleryItems->count();
                // dd($galleryItems)
                @endphp
                <div class="col-lg-3 col-md-6 col-12" data-aos="flip-down">
                    <div class="card  border-0 rounded-0  position-relative p-2">
                        {{-- details link --}}
                        <a href="{{ route('Client.productDetails',$product->id) }}">
                            <div class="img-card position-relative d-flex align-items-center bg-white">
                                <div class="product-hover">
                                </div>
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
                                    $color[$i] = $galleryItem->product->colors->where('id', $galleryItem->color_id)->first();
                                    // dd($color[$i]->hexa)
                                    @endphp 
                                        <div class="color {{ $i === 0 ? 'active' : '' }}" style="border-color: {{ $color[$i]->hexa }} !important;" data-img="{{ asset($galleryItems[$i]['image']) }}">
                                            <div class="border-white  border-2 w-100 h-100">
                                                <div class="w-100 h-100 rounded-circle" style="background-color: {{ $color[$i]->hexa }}">
                                                </div>
                                            </div>
                                        </div>
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
            {{-- <div class="col-lg-3 col-md-6 col-12 " data-aos="flip-down">
                <div class="card  border-0 rounded-0  position-relative p-2">
                    <div
                        class="position-absolute  liked-icon  d-flex align-items-center justify-content-center rounded-circle">
                        <a href="washList.html">
                            <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M3.66275 13.2136L9.82377 19.7066C11.0068 20.9533 12.9932 20.9534 14.1762 19.7066L20.3372 13.2136C22.5542 10.8771 22.5543 7.08895 20.3373 4.75248C18.1203 2.416 14.5258 2.416 12.3088 4.75248V4.75248C12.1409 4.92938 11.8591 4.92938 11.6912 4.75248V4.75248C9.47421 2.416 5.87975 2.416 3.66275 4.75248C1.44575 7.08895 1.44575 10.8771 3.66275 13.2136Z"
                                    stroke="#1E1E1E" stroke-width="1.5" />
                            </svg>
                        </a>
                    </div>
                    <a href="detailsPage.html">

                        <div class="img-card position-relative d-flex align-items-center bg-white">
                            <div class="product-hover">
                            </div>
                            <img class="w-100 h-auto" />
                        </div>
                    </a>
                    <div class="card-body px-0">
                        <h6 class="text-black d-flex justify-content-between ">
                            <span class="fw-semibold ">Nike Downshifter 12</span>
                            <span>
                                <span class="text-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="10"
                                        height="10" viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M9.09459 2.67704C9.45471 1.91058 10.545 1.91073 10.9049 2.67729L12.6322 6.35641C12.7737 6.65774 13.0559 6.86892 13.3848 6.91971L17.3294 7.52872C18.1333 7.65283 18.4606 8.63367 17.8923 9.21564L14.9781 12.2002C14.7561 12.4276 14.6554 12.747 14.7068 13.0606L15.3879 17.2153C15.523 18.0395 14.648 18.6564 13.9171 18.2522L10.489 16.3564C10.1881 16.19 9.8228 16.1898 9.52178 16.356L6.08622 18.2524C5.35533 18.6558 4.48108 18.039 4.61614 17.2151L5.29759 13.0585C5.34902 12.7448 5.24823 12.4253 5.02608 12.198L2.1084 9.21134C1.53992 8.62943 1.86715 7.64838 2.67113 7.52425L6.61533 6.9153C6.94423 6.86452 7.22631 6.65345 7.36783 6.35225L9.09459 2.67704Z"
                                            fill="#F9A000" />
                                    </svg>
                                    <span>(4.5)</span>
                                </span>

                            </span>

                        </h6>
                        <p class="card-text text-secondary fw-bold mb-0">
                            <small>Regular fit</small>
                        </p>
                        <div class="card-text my-2">
                            <div class="d-flex gap-2 flex-wrap">
                                <div class="color active" style="border-color: #0C0C0C !important;"
                                    data-img="assets/imgs/home/pngwing 2.png">
                                    <div class="border-white  border-2 w-100 h-100">
                                        <div class="w-100 h-100 rounded-circle" style="background-color: #0C0C0C;"></div>
                                    </div>
                                </div>
                                <div class="color " style="border-color: #172B85 !important;"
                                    data-img="assets/imgs/home/pngwing 5.png">
                                    <div class="border-white  border-2 w-100 h-100">
                                        <div class="w-100 h-100 rounded-circle" style="background-color: #172B85;"></div>
                                    </div>
                                </div>
                                <div class="color " style="border-color: #CE1126 !important;"
                                    data-img="assets/imgs/home/Frame 13.png">
                                    <div class="border-white  border-2 w-100 h-100">
                                        <div class="w-100 h-100 rounded-circle" style="background-color: #CE1126;"></div>
                                    </div>
                                </div>
                                <div class="color " style="border-color: #F9A000 !important;"
                                    data-img="assets/imgs/home/pngwing 7.png">
                                    <div class="border-white  border-2 w-100 h-100">
                                        <div class="w-100 h-100 rounded-circle" style="background-color: #F9A000;"></div>
                                    </div>
                                </div>
                                <div class="color " style="border-color: #00ffd5 !important;"
                                    data-img="assets/imgs/home/pngwing 3.png">
                                    <div class="border-white  border-2 w-100 h-100">
                                        <div class="w-100 h-100 rounded-circle" style="background-color: #00ffd5;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <div class="d-flex">

                                <h6 class="text-black fw-semibold mb-0">
                                    <span class=" ">36000 </span>
                                    <span>BD</span>
                                </h6>
                                <h6 class="text-secondary text-decoration-line-through mb-0 px-2">
                                    <span class=" ">30000 </span>
                                    <span>BD</span>
                                </h6>

                            </div>
                            <a class="btn btn-dark" href="shoppingCart.html"><i
                                    class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

