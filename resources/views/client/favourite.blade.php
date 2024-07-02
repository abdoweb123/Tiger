@extends('client.layouts.layout')
@section('content')
    <div class="container my-lg-5 my-3  section-top">
        <div class="row align-items-center py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.html">
                            Home
                        </a></li>
                    <li class="breadcrumb-item fw-semibold" aria-current="page">wishlist
                    </li>
                </ol>
            </nav>
        </div>
        <h4 class=" py-3 mb-0 fw-semibold d-flex gap-2 align-items-center">wishlist</h4>
        <div class="container my-5" data-aos="fade-up">
            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <h3 class="py-4 fw-semibold">@lang('trans.best_seller')</h3>
                </div>
            </div>
            <div class="row ">
                <div class=" slider3 slider-title regular ">
                    @foreach ($wishlist as $product )
                    @php
                    $galleryItems = $product->Product->gallery()->whereNotNull('color_id')->get();
                    $maxCount = $galleryItems->count();
                    @endphp
                    <div class=" p-2 product-container ">
                        <div class=" card  border-0 rounded-0  position-relative p-2">
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
                                    <img class="text-black fs-6 link-black cursor-pointer mt-1 position-absolute top-0 end-custom spinner"
                                    src="{{ asset('assets_client/images/spinner.png') }}" 
                                    width="15" 
                                    height="15" 
                                    style="right:0; display: none;">
                               <i class="fa-solid fa-heart position-absolute heartIcon text-black"
                                  {{-- style="right: 0;" --}}
                                  onclick="deleteRow(this, {{$product->Product->id}})">
                               </i>
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
                                    <span class="fw-semibold ">{{ $product->Product->title() }}</span>
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
                                            @if($product->Product->HasDiscount())
                                            <span style="text-decoration: line-through; {{lang() == 'en' ? 'margin-right' : 'margin-left'}}: 10px;">
                                                {{$product->Product->RealPrice()}}
                                            </span>
                                            <span>{{$product->Product->PriceWithCurrancy()}}</span>
                                        @else
                                            <span>{{$product->Product->Price()}}</span> {{Country()->currancy_code}}
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
    </div>
@endsection
@push('js')
<script>
    function deleteRow(element, id) {
        // Hide the heart icon and show the spinner
        $(element).hide();
        $(element).prev('.spinner').show();

        // Send AJAX request to delete the product from the wishlist
        $.ajax({
            url: '{{route('Client.deleteWishlist')}}', // URL to your delete route
            type: 'POST',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                // Handle success response
                // Remove the product container (e.g., <div> or <tr>) containing the heart icon
                $(element).closest('.product-container').remove();
                
                // Show a success message
                Swal.fire({
                    title: "Success!",
                    text: response.message,
                    icon: "success",
                    showConfirmButton: true,
                    timer: 1500
                });

                // Update the wishlist count in the UI if needed
                $('.fa-heart .icon-number').text(response.wishlistCount);
            },
            error: function(xhr, status, error) {
                // Handle error response
                alert('Error deleting product: ' + error);

                // Revert UI changes if error occurs
            //     $(element).show();
            //     $(element).prev('.spinner').hide();
            }
        });
    }
</script>
@endpush