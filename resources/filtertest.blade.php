{{-- @extends('client.layouts.layout')
@section('content')
<div class="w-100 bg-products"></div>
<div class="w-100 bg-primaryColor">
    <div class="container">
        <div class="row py-3 justify-content-center align-items-center">
            <div class=" col-12 ">
                <div class="row gy-3">
                    <div class="col-lg-2 col-12">
                        <div class="dropdown">
                            <button class="btn border rounded-pill w-auto dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false" style="width: max-content;">
                                Category
                            </button>
                            <ul class="dropdown-menu drop-filter p-2">
                                <h6 class="dropdown-header text-dark px-0 fw-semibold">Category</h6>
                                @foreach ($categories as $category)
                                <li>
                                    <div class="form-check py-2">
                                        <input class="form-check-input" type="radio" name="category" value="{{ $category->id }}">
                                        <label class="form-check-label">
                                            {{ $category->title() }}
                                        </label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12"> --}}
{{-- <div class="d-flex gap-2" id="subcategory-buttons"> --}}

<!-- Add more filter buttons here -->
{{-- </div>
                    </div>
                    <div class="col-lg-5 col-12 d-flex justify-content-lg-end align-items-start gap-2">
                        <input type="number" id="min_price" placeholder="Min Price" class="form-control">
                        <input type="number" id="max_price" placeholder="Max Price" class="form-control">
                        <button id="filter_button" class="btn text-white filter-button-result rounded-pill w-auto border px-4">
                            <span>Filter</span>
                            <span><i class="fa-solid fa-filter"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-lg-5 my-3">
    <h4 class="py-3 mb-0">New Collection</h4>
    <div class="row gy-3 slider-title regular" id="product_list">
        @foreach ($NewCollectionProducts as $product)
        <!-- Product card -->
        @php
        $galleryItems = $product->gallery()->whereNotNull('color_id')->get();
        $maxCount = $galleryItems->count();
        // dd($galleryItems)
        @endphp
        <div class="col-lg-3 col-md-6 col-12" data-aos="flip-down">
            <div class="card border-0 rounded-0 position-relative p-2">
                <div class="position-absolute best-sell p-2">
                    <div class="rounded-pill bg-black text-white d-flex px-3 py-1 align-items-center gap-1">
                        <span>@lang('trans.new_collection')</span>
                    </div>
                </div>
                <a href="detailsPage.html">
                    <div class="img-card position-relative d-flex align-items-center bg-white">
                        <div class="product-hover"></div>
                        <img class="w-100 h-auto" src="" alt="{{ $product->title() }}">
                    </div>
                </a>
                <div class="card-body px-0">
                    <h6 class="text-black d-flex justify-content-between">
                        <span class="fw-semibold">{{ $product->title() }}</span>
                    </h6>
                    <p class="card-text text-secondary fw-bold mb-0">
                        <small>@lang('trans.Regular fit')</small>
                    </p>
                    <div class="card-text my-2">
                        <div class="d-flex gap-2 flex-wrap">
                            @for ($i = 0; $i < $maxCount; $i++)
                            @php
                            $galleryItem = $galleryItems[$i];
                            $color[$i] = $galleryItem->product->colors->where('id', $galleryItem->color_id)->first();
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
                    <div class="card-text d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            <h6 class="text-black fw-semibold mb-0">
                                @if ($product->HasDiscount())
                                <span style="text-decoration: line-through;">{{ $product->RealPrice() }}</span>
                                <span>{{ $product->PriceWithCurrency() }}</span>
                                @else
                                <span>{{ $product->Price() }}</span> {{ Country()->currency_code }}
                                @endif
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection --}}

{{-- @push('js')
<script>
$(document).ready(function() {
    $('#filter_button').click(function() {
        let category_id = $('input[name="category"]:checked').val();
        let min_price = $('#min_price').val();
        let max_price = $('#max_price').val();

        $.ajax({
            url: '{{ route("Client.filterProducts") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                category_id: category_id,
                min_price: min_price,
                max_price: max_price
            },
            success: function(response) {
                $('#product_list').empty();
                response.forEach(function(product) {
                    $('#product_list').append(`
                        <div class="col-lg-3 col-md-6 col-12" data-aos="flip-down">
                            <div class="card border-0 rounded-0 position-relative p-2">
                                <div class="position-absolute best-sell p-2">
                                    <div class="rounded-pill bg-black text-white d-flex px-3 py-1 align-items-center gap-1">
                                        <span>@lang('trans.new_collection')</span>
                                    </div>
                                </div>
                                <a href="detailsPage.html">
                                    <div class="img-card position-relative d-flex align-items-center bg-white">
                                        <div class="product-hover"></div>
                                        <img class="w-100 h-auto" src="{{ asset('${product.image}') }}" alt="${product.title}">
                                    </div>
                                </a>
                                <div class="card-body px-0">
                                    <h6 class="text-black d-flex justify-content-between">
                                        <span class="fw-semibold">${product.title}</span>
                                    </h6>
                                    <p class="card-text text-secondary fw-bold mb-0">
                                        <small>@lang('trans.Regular fit')</small>
                                    </p>
                                    <div class="card-text my-2">
                                        <div class="d-flex gap-2 flex-wrap">
                                            <!-- Colors will be added dynamically here -->
                                        </div>
                                    </div>
                                    <div class="card-text d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <h6 class="text-black fw-semibold mb-0">
                                                <span>${product.price}</span> {{ Country()->currency_code }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });
            }
        });
    });
});
</script>
@endpush --}}
{{-- @push('js')
<script>
$(document).ready(function() {
    $('.category-filter').change(function() {
        let category_id = $(this).val();

        $.ajax({
            url: '{{ route("getSubcategories") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                category_id: category_id
            },
            success: function(response) {
                $('#subcategory-buttons').empty();
                $('#subcategory-buttons').append(`<div class="btn filter-button rounded-pill w-auto active" data-subcategory="all"><span>All</span></div>`);
                response.forEach(function(subcategory) {
                    $('#subcategory-buttons').append(`
                        <div class="btn filter-button rounded-pill w-auto" data-subcategory="${subcategory.id}">
                            <span>${subcategory.name}</span>
                        </div>
                    `);
                });
            }
        });
    });

    $('#filter_button').click(function() {
        let category_id = $('input[name="category"]:checked').val();
        let min_price = $('#min_price').val();
        let max_price = $('#max_price').val();
        let subcategory_id = $('.filter-button.active').data('subcategory');

        $.ajax({
            url: '{{ route("filterProducts") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                category_id: category_id,
                min_price: min_price,
                max_price: max_price,
                subcategory_id: subcategory_id
            },
            success: function(response) {
                $('#product_list').empty();
                response.forEach(function(product) {
                    $('#product_list').append(`
                        <div class="col-lg-3 col-md-6 col-12" data-aos="flip-down">
                            <div class="card border-0 rounded-0 position-relative p-2">
                                <div class="position-absolute best-sell p-2">
                                    <div class="rounded-pill bg-black text-white d-flex px-3 py-1 align-items-center gap-1">
                                        <span>@lang('trans.new_collection')</span>
                                    </div>
                                </div>
                                <a href="detailsPage.html">
                                    <div class="img-card position-relative d-flex align-items-center bg-white">
                                        <div class="product-hover"></div>
                                        <img class="w-100 h-auto" src="{{ asset('${product.image}') }}" alt="${product.title()}">
                                    </div>
                                </a>
                                <div class="card-body px-0">
                                    <h6 class="text-black d-flex justify-content-between">
                                        <span class="fw-semibold">${product.title()}</span>
                                    </h6>
                                    <p class="card-text text-secondary fw-bold mb-0">
                                        <small>@lang('trans.Regular fit')</small>
                                    </p>
                                    <div class="card-text my-2">
                                        <div class="d-flex gap-2 flex-wrap">
                                            <!-- Colors will be added dynamically here -->
                                        </div>
                                    </div>
                                    <div class="card-text d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <h6 class="text-black fw-semibold mb-0">
                                                <span>${product.price}</span> {{ Country()->currency_code }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });
            }
        });
    });

    $(document).on('click', '.filter-button', function() {
        $('.filter-button').removeClass('active');
        $(this).addClass('active');
    });
});
</script>
@endpush --}}

{{-- ADDTIONS --}}

<div class="container my-lg-5 my-3">
    
    <h4 class=" py-3 mb-0">New Collection</h4>
    <div class="row gy-3  slider-title regular">
        @foreach ($NewCollectionProducts as $product)
            @php
                $galleryItems = $product->gallery()->whereNotNull('color_id')->get();
                $maxCount = $galleryItems->count();
                // dd($galleryItems)
            @endphp
            <div class="col-lg-3 col-md-6 col-12 " data-aos="flip-down">
                <div class="card  border-0 rounded-0  position-relative p-2">
                    <div class="position-absolute best-sell p-2">
                        {{-- new collection label --}}
                        <div class="rounded-pill bg-black   text-white d-flex px-3 py-1 align-items-center gap-1  ">
                            <span>@lang('trans.new_collection')</span>
                        </div>
                        {{-- new collection label --}}
                    </div>

                    {{-- wishlist --}}
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
                    {{-- wishlist --}}

                    {{-- details link --}}
                    <a href="detailsPage.html">
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
                                        $color[$i] = $galleryItem->product->colors
                                            ->where('id', $galleryItem->color_id)
                                            ->first();
                                        // dd($color[$i]->hexa)
                                    @endphp
                                    @if (isset($color[$i]->hexa))
                                        <div class="color {{ $i === 0 ? 'active' : '' }}"
                                            style="border-color: {{ $color[$i]->hexa }} !important;"
                                            data-img="{{ asset($galleryItems[$i]['image']) }}">
                                            <div class="border-white  border-2 w-100 h-100">
                                                <div class="w-100 h-100 rounded-circle"
                                                    style="background-color: {{ $color[$i]->hexa }}">
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
                                    @if ($product->HasDiscount())
                                        <span
                                            style="text-decoration: line-through; {{ lang() == 'en' ? 'margin-right' : 'margin-left' }}: 10px;">
                                            {{ $product->RealPrice() }}
                                        </span>
                                        <span>{{ $product->PriceWithCurrancy() }}</span>
                                    @else
                                        <span>{{ $product->Price() }}</span> {{ Country()->currancy_code }}
                                        @endif
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
