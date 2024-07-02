  {{-- Product details  --}}
  <div class="container my-lg-5 my-3 section-top">
    {{-- the Path --}}
    <div class="row align-items-center py-2">
        <nav class="" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.html">
                        shop now
                    </a></li>
                <li class="breadcrumb-item"><a href="allProducts.html">
                        men
                    </a></li>
                <li class="breadcrumb-item fw-semibold" aria-current="page">Sneakers
                    </a></li>
            </ol>
        </nav>
    </div>
    {{-- the Path --}}

    <div class="row gap-5 py-2  scrolling">
        <div class="col-lg-6 img-product-slider projects">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class = "product-imgs box-container ">
                <div class = "img-display">
                    <div class = "img-showcase">
                        @forelse($product->Gallery()->whereNull('color_id')->get() as $gallery)
                            <img data-fancybox="gallery" src="{{ $gallery->image ?? Setting('not_found_img') }}"
                                class="img-fluid">
                        @empty
                            <!-- No galleries found -->
                        @endforelse
                    </div>
                </div>

                <div class="img-select">
                    @forelse($product->Gallery()->whereNull('color_id')->get() as $gallery)
                        <div class="img-item" style="width:100px; height:100px;">
                            <a href="#" data-id="{{ $loop->iteration }}"
                                onclick="showImage(event,'{{ $gallery->image }}')">
                                <img src="{{ $gallery->image }}">
                            </a>
                        </div>
                    @empty
                        <!-- No galleries found -->
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-lg-5  col-12">
            <div class="row py-2  details-product">
                <h6 class="">Nike</h6>
                <h5 class="fw-semibold py-2 text-dark">Nike Downshifter 12</h5>
                <h6 class="">Men Shoes</h6>

                <p class="card-text body-card text-secondary d-flex gap-3 align-items-center mb-0 py-2">
                    {{-- rating --}}
                    <span>
                        @for ($i = 0; $i < $averageRating; $i++)
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M9.09459 2.67704C9.45471 1.91058 10.545 1.91073 10.9049 2.67729L12.6322 6.35641C12.7737 6.65774 13.0559 6.86892 13.3848 6.91971L17.3294 7.52872C18.1333 7.65283 18.4606 8.63367 17.8923 9.21564L14.9781 12.2002C14.7561 12.4276 14.6554 12.747 14.7068 13.0606L15.3879 17.2153C15.523 18.0395 14.648 18.6564 13.9171 18.2522L10.489 16.3564C10.1881 16.19 9.8228 16.1898 9.52178 16.356L6.08622 18.2524C5.35533 18.6558 4.48108 18.039 4.61614 17.2151L5.29759 13.0585C5.34902 12.7448 5.24823 12.4253 5.02608 12.198L2.1084 9.21134C1.53992 8.62943 1.86715 7.64838 2.67113 7.52425L6.61533 6.9153C6.94423 6.86452 7.22631 6.65345 7.36783 6.35225L9.09459 2.67704Z"
                                        fill="#F9A000"></path>
                                </svg>
                        @endfor
                        @for ($i = $averageRating; $i < 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="gray-icon" width="20" height="20"
                                viewBox="0 0 20 20">
                                <path
                                    d="M9.09459 2.67704C9.45471 1.91058 10.545 1.91073 10.9049 2.67729L12.6322 6.35641C12.7737 6.65774 13.0559 6.86892 13.3848 6.91971L17.3294 7.52872C18.1333 7.65283 18.4606 8.63367 17.8923 9.21564L14.9781 12.2002C14.7561 12.4276 14.6554 12.747 14.7068 13.0606L15.3879 17.2153C15.523 18.0395 14.648 18.6564 13.9171 18.2522L10.489 16.3564C10.1881 16.19 9.8228 16.1898 9.52178 16.356L6.08622 18.2524C5.35533 18.6558 4.48108 18.039 4.61614 17.2151L5.29759 13.0585C5.34902 12.7448 5.24823 12.4253 5.02608 12.198L2.1084 9.21134C1.53992 8.62943 1.86715 7.64838 2.67113 7.52425L6.61533 6.9153C6.94423 6.86452 7.22631 6.65345 7.36783 6.35225L9.09459 2.67704Z"
                                    fill="#9D9D9D" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        @endfor
                    </span>
                    <span>
                        {{ $totalReviews }} Reviews
                    </span>
                    {{-- rating --}}
                </p>
                <div class=" d-flex align-content-center py-2 gap-3">
                    {{-- price --}}
                    @if ($product->HasDiscount())
                        <h6 class="text-decoration-line-through "
                            style="{{ lang() == 'en' ? 'margin-right' : 'margin-left' }}: 10px;">
                            <span>{{ $product->Price() }}</span><span> {{ Country()->currancy_code }}</span>
                        </h6>
                        <h5 class="fw-semibold  text-dark price">
                         <span>{{ $product->RealPrice() }}</span> <span> {{ Country()->currancy_code }}</span>
                        </h5>
                    @else
                        <h5 class="fw-semibold  text-dark price">{{ $product->Price() }}<span>
                                {{ Country()->currancy_code }}</span></h5>
                    @endif
                    {{-- price --}}
                </div>
            </div>
            <div class="row  py-3">
                <h5 class="mb-0 fw-semibold ">
                    colors
                </h5>
            </div>
            {{-- the small three images for the color --}}
            <div class="row gap-2 py-2" style="padding: 0px 12px;">
                @forelse($productFirstColorImages as $item)
                    <div
                        class="col-2 p-0 width btn  rounded-0 w-auto getColorSizes  img-container cursor-pointer ">
                        <img width="50" class="colorImage" src="{{ $item->image }}" alt="{{ $item->color['title_' . lang()] }}"
                            title="{{ $item->color['title_' . lang()] }}" data-color-id="{{ $item->color_id }}">
                    </div>
                @empty
                @endforelse
                {{-- <div class="col-2 p-0 width btn  rounded-0 w-auto ">
                <img width="50" src="assets/imgs/products/Frame 13.png">
            </div>
            <div class="col-2 p-0  width btn rounded-0 w-auto ">
                <img width="50" src="assets/imgs/products/Frame 13.png">
            </div> --}}
            </div>
            {{-- the small three images --}}
            <div class="row  py-3">
                <h5 class="mb-0 fw-semibold ">
                    selected size
                </h5>
            </div>
            {{-- {{ dd($productSizes) }} --}}
            {{-- the avilable sizes --}}
            <div class="row  gap-2  justify-content-start buttonContainer" style="padding: 0px 12px;" id="">
                @forelse($productSizes as $size)
                    <div class="col-2 mb-2 cursor-pointer showSizes" data-toggle="tooltip" data-placement="top"
                        title="{{ $size->title }}{{ $size->parent->title }}" data-size-id="{{ $size->id }}">
                        <div class=" border-0 btn btn-outline-dark length rounded-2 w-auto px-4  border  text-center align-items-center position-relative d-flex flex-column justify-content-center size-select size-hover">
                            <h6 class="mb-1 mt-2">{{ intval($size->title) }}</h6>
                            <h6 class="">{{ $size->parent->title }}</h6>
                            <div class="inwp-stock-left-info one_left_{{ $size->id }}"
                                data-inwp-stock-info="@lang('trans.1_left')"></div>
                        </div>
                    </div>
                @empty
                @endforelse
                <input type="hidden" name="color_id">
                <input type="hidden" name="size_id">

                <div class="mb-3 in-stock-button">
                    <button class="btn btn-green rounded-1 px-2 py-1">@lang('trans.in_stock')</button>
                    <span class="d-inline-block">@lang('trans.max'): <span class="show_max_quantity"></span> </span>
                </div>
                <div class="mb-3 out-stock-button">
                    <button class="btn out-stock-btn rounded-1 px-2 py-1">@lang('trans.out_of_stock')</button>
                </div>
            </div>
            {{-- the avilable sizes --}}

            {{-- increase decreae button --}}
            {{-- <div class="row mt-5">
                <div>
                    <span class="input-wrapper input-wrapper-product  rounded-0 mb-2 mb-sm-0 ">
                        <button id="decrement" type="button"
                            class="decrement text-danger bg-white fs-4 align-items-center  mt-1 mb-1 rounded-0 text-center mx-2">-</button>
                        <input type="text" value="1" min="1" max="{{ $product->quantity }}"
                            name="quantity_item" id="quantity" class="fw-semibold bg-gray quantity text-center" />
                        <input type="hidden" name="total_quantity_item" value="" />
                        <button id="increment" type="button"
                            class="increment text-danger bg-white fs-4 align-items-center  mt-1 mb-1 rounded-0 text-center mx-2">+</button>
                    </span>
                </div>
            </div> --}}
            <div class="row  py-3">
                <h5 class="mb-0 fw-semibold ">
               quantity
                </h5>
              </div>
              <div class="row ">
                  <div class="input-wrapper input-wrapper-product d-flex gap-2">
                          <button id="decrement" type="button"
                              class="decrement btn btn-dark   rounded-1 text-center ">-</button>
                          <input type="text" value="1" min="1" max="{{ $product->quantity }}"
                              name="quantity_item" id="quantity" class="fw-semibold bg-gray quantity text-center form-control" />
                          <input type="hidden" name="total_quantity_item" value="" />
                          <button id="increment" type="button"
                              class="increment  btn btn-dark   rounded-1 text-center ">+</button>
                  </div>
              </div>
            {{-- increase decreae button --}}

            <div class="row my-5 d-flex gap-3">
                <a href="cart.blade.php" id="addToCart" data-bs-toggle="modal" data-bs-target="#AddToCart"
                    class="btn btn-dark  text-decoration-none px-5 text-white  rounded-1 py-2 explore d-flex justify-content-center align-items-center m-auto disabled-btn">Add
                    to Cart</a>
                <a href="allProducts.html" type="button"
                    class="btn length text-decoration-none px-5 text-dark  rounded-1 py-2 explore d-flex justify-content-center align-items-center m-auto">continue
                    shopping</a>
            </div>

            {{-- add to cart modle --}}
            <!-- Modal -->
            <div class="modal fade rounded-0 border-0 viewCart">
                <div class="modal-dialog mt-8  rounded-0 border-0">
                    <div class="modal-content p-3  rounded-0 border-0">
                        <div class="modal-header border-0">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <h4 class="text-black fw-semibold">@lang('trans.product_added_to_cart')</h4>
                            <div>
                                <a href="{{ route('Client.productDetails', $product->id) }}"
                                    class="text-danger link-black fs-7 fw-semibold">@lang('trans.continue_shopping')</a>
                                <a href="{{ route('Client.getCart') }}"
                                    class="btn btn-dark text-white rounded-0 fs-7 mx-2">@lang('trans.view_cart')</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end modal  -->
            {{-- add to cart modle --}}

        </div>
    </div>

</div>
{{-- Product details  --}}