@extends('client.layouts.layout')
@section('content')
    @if (count($cart) > 0)
        <div class="container my-lg-5 my-3 section-top">
            <div class="row align-items-center py-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
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
            <h4 class=" py-3 mb-0 fw-semibold d-flex gap-2 align-items-center">
                <span>cart</span><span>({{ count($cart) }})</span></h4>

            <div class="row py-2 justify-content-between">
                <div class="col-lg-7 col-12">

                    <div class="row">
                        <div class="col-12 ">
                            <div class="row  py-2 shopping-cart align-items-center  border-bottom table-row">
                                <div class="col-lg-5 col-3 ">
                                    <h6>product</h6>
                                </div>
                                <div class="col-lg-2 col-3 ">
                                    <h6 class="">Price</h6>
                                </div>
                                <div class="col-lg-2 col-3">
                                    <h6>Quantity</h6>
                                </div>

                                <div class="col-lg-3 col-3 ">
                                    <h6 class="">Subtotal</h6>
                                </div>
                            </div>
                        </div>
                        @foreach ($cart as $cartItem)
                            @if ($cartItem->item)
                                <div class="col-12">
                                    <div class="row py-2 shopping-cart align-items-lg-center  border-bottom table-row-data">
                                        <div class="col-lg-5 col-3">
                                            <div class="d-flex gap-2 flex-lg-row flex-column align-items-lg-center">
                                                <div class="flex-shrink-0 ">
                                                    <img class="border p-2"
                                                        src="{{ asset($cartItem->product->Gallery()->whereNull('color_id')->first()->image ?? Setting('not_found_img')) }}"
                                                        alt="...">
                                                </div>
                                                <div class="flex-grow-1 mx-lg-3 mx-0 d-flex justify-content-between ">
                                                    <div class=" w-100 justify-content-between">
                                                        <div class=" col-12">
                                                            <h6 class="fw-semibold">
                                                                <span>{{ $cartItem->product['title_' . lang()] }} -
                                                                    {{ $cartItem->color['title_' . lang()] }},
                                                                    {{ intval($cartItem->size->title) . $cartItem->size->parent->title }}</span>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <h6 class="item-price">{{ $cartItem->product->PriceWithCurrancy() }}</h6>
                                        </div>
                                        <div class="col-lg-2 col-3 p-0">
                                            <div class="input-wrapper input-wrapper-product d-flex">
                                                <button id="decrement" type="button"
                                                    class="decrement btn  btn-outline-dark  rounded-1 py-0 text-center ">-</button>
                                                <input type="text" value="{{ $cartItem->quantity }}" min="1"
                                                    max="{{ $cartItem->item->quantity }}"
                                                    name="quantity[{{ $cartItem->id }}]" data-item-id="{{ $cartItem->id }}"
                                                    name="quantity_item" id="quantity"
                                                    class="p-0  text-center form-control quantity border-0" />
                                                <button id="increment" type="button"
                                                    class="increment  btn btn-outline-dark  rounded-1 text-center ">+</button>
                                            </div>


                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <h6 class="">
                                                <span
                                                    id="subtotalItem_{{ $cartItem->id }}">{{ $cartItem->product->RealPriceWithQuantity($cartItem->quantity) }}
                                                </span>
                                                <span> {{ Country()->currancy_code }}</span>
                                            </h6>
                                        </div>
                                        <div class="col-lg-1 col-12 d-flex justify-content-end">
                                            <a class="text-secondary text-decoration-underline" type="button">
                                                <img class="text-success fs-6 link-primary cursor-pointer top-0 end-custom spinner deleteRawImg"
                                                    src="{{ asset('assets_client/images/spinner.png') }}" width="15"
                                                    height="15" style="right:0; display: none">
                                                <i class="fa-solid fa-trash-can cursor-pointer deleteRawIcon"
                                                    onclick="deleteCartElement(this,{{ $cartItem->id }})"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                {{-- checkout --}}
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class=" bg-gray col-12 py-3 rounded-1">
                            <div class="bg-white p-3 rounded-1">
                                <div class="border-bottom">
                                    <p class="d-flex justify-content-between summary">
                                        <span>@lang('trans.subTotal')</span>
                                        <span class="subTotal">{{ $subTotalCart }}{{ Country()->currancy_code }} </span>
                                    </p>

                                    <p class="d-flex justify-content-between summary">
                                        <span>@lang('trans.VAT')({{ setting('vat') }}%)</span>
                                        <span class="vat"> {{ $vat }}  {{ Country()->currancy_code }}</span>
                                    </p>
                                </div>
                                <p class="d-flex justify-content-between summary py-2">
                                    <span class="fw-bold">@lang('trans.Total')</span>
                                    <span class="total"> {{ $total }} {{ Country()->currancy_code }}</span>
                                </p>
                            </div>

                            <div class=" w-100 d-flex flex-column align-items-center">
                                <a type="button" href="{{ route('Client.checkout') }}"
                                    class="btn btn-dark px-4 btn m-auto border border-1 border-dark rounded-3 gap-2 my-2 mt-3 w-50 py-2">Checkout</a>
                                <a href="allProducts.html"
                                    class="text-black text-decoration-underline text-center  m-auto  gap-2 my-2  py-2">Continue
                                    shopping</a>
                            </div>


                        </div>
                    </div>


                </div>

                <div>


                </div>

            </div>
        </div>
    @else
        {{-- empty --}}
        <div class="container  section-top">
            <div class="row align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-5">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                    fill="none">
                                    <path
                                        d="M1.5 9.93841C1.5 8.71422 2.06058 7.55744 3.02142 6.79888L8.52142 2.45677C9.97466 1.30948 12.0253 1.30948 13.4786 2.45677L18.9786 6.79888C19.9394 7.55744 20.5 8.71422 20.5 9.93841V16.5C20.5 18.7091 18.7091 20.5 16.5 20.5H15C14.4477 20.5 14 20.0523 14 19.5V16.5C14 15.3954 13.1046 14.5 12 14.5H10C8.89543 14.5 8 15.3954 8 16.5V19.5C8 20.0523 7.55228 20.5 7 20.5H5.5C3.29086 20.5 1.5 18.7091 1.5 16.5L1.5 9.93841Z"
                                        fill="#9D9D9D" stroke="#9D9D9D" stroke-width="1.5" />
                                </svg>
                            </a></li>
                        <li class="breadcrumb-item fw-semibold" aria-current="page">shopping cart
                            </a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="gray-bage">
            <div class="container ">
                <div class="row ">
                    <div class=" col-12">
                        <h3>shopping cart</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container section-top my-5">
            <div class="row justify-content-center align-items-center">
                <div class="img d-flex justify-content-center">
                    <img src="assets/imgs/empaty/Group.svg" />
                </div>
                <div class="py-4">
                    <p class="text-secondary text-center">Empty</p>
                </div>
            </div>
        </div>
        {{-- empty --}}
    @endif

@endsection
@push('js')
    {{-- <script>
    $(document).ready(function() {
    function updateCart() {
        // Prepare an object to store item IDs and corresponding quantities
        var quantitiesData = {};
        var subTotal = 0;

        // Loop through all quantity inputs
        $('input[name^="quantity"]').each(function() {
            var itemId = $(this).data('item-id'); // Get the item ID from the data attribute
            var quantity = $(this).val(); // Get the quantity value
            var price = parseFloat($(this).closest('.table-row-data').find('.item-price').text().replace(/[^0-9.-]+/g, "")); // Extract the price

            // Calculate the subtotal for each item
            var itemSubtotal = price * quantity;

            // Update the subtotal display for the item
            $('#subtotalItem_' + itemId).text(itemSubtotal.toFixed(2));

            // Add to the overall subtotal
            subTotal += itemSubtotal;

            // Store the item ID and quantity in the quantitiesData object
            if (itemId && quantity) {
                quantitiesData[itemId] = quantity;
            }
        });

        // Calculate VAT
        var vatPercentage = {{ setting('vat') }};
        var vat = subTotal * (vatPercentage / 100);

        // Calculate total
        var total = subTotal + vat;

        // Update the displayed subtotal, VAT, and total
        $('.subTotal').text('{{ Country()->currancy_code }} ' + subTotal.toFixed(2));
        $('.vat').text('{{ Country()->currancy_code }} ' + vat.toFixed(2));
        $('.total').text('{{ Country()->currancy_code }} ' + total.toFixed(2));

        // Perform an AJAX request with the quantities data
        $.ajax({
            url: '{{ route('Client.updateCart') }}',
            method: 'GET',
            data: {
                quantities: quantitiesData
            },
            success: function(response) {
                console.log('Success:', response);
                Swal.fire({
                    text: response.message,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1000
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function deleteCartElement(icon, cartItemId) {
        var $icon = $(icon);
        var $img = $icon.siblings('.deleteRawImg');
        var $tbody = $icon.closest('.table-row-data');

        $icon.hide();
        $img.show();

        // Ajax call here
        $.ajax({
            url: '{{ route('Client.deleteCart') }}',
            method: 'GET',
            data: {
                cart_item_id: cartItemId // Pass the cart item id to the server
            },
            success: function(response) {
                // Success callback
                $icon.show();
                $img.hide();
                $tbody.remove(); // Remove the item row after ajax call success
                Swal.fire({
                    text: response.message,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1000
                });
                $('.fa-shopping-bag .icon-number').text(response.cart_count);

                // Update subtotal, VAT, and total after deletion
                updateCart();
            },
            error: function(xhr, status, error) {
                // Error callback
                console.error('Error:', error);
                $icon.show();
                $img.hide();
            }
        });
    }

    // Bind the delete function to the delete icon click event
    $('.deleteRawIcon').on('click', function() {
        var cartItemId = $(this).data('id');
        deleteCartElement(this, cartItemId);
    });

    const inputWrappers = document.querySelectorAll('.input-wrapper');

    inputWrappers.forEach(inputWrapper => {
        const incrementButton = inputWrapper.querySelector('.increment');
        const decrementButton = inputWrapper.querySelector('.decrement');
        const quantityInput = inputWrapper.querySelector('.quantity');

        incrementButton.addEventListener("click", () => {
            const maxQuantity = parseInt(quantityInput.getAttribute('max'));
            let currentValue = parseInt(quantityInput.value);

            if (currentValue < maxQuantity) {
                quantityInput.value = currentValue + 1;
                updateCart(); // Call the updateCart function
            }
            if (currentValue == maxQuantity) {
                Swal.fire({
                    text: "@lang('trans.You_have_reached_your_limit')",
                    showConfirmButton: true,
                });
            }
        });

        decrementButton.addEventListener("click", () => {
            const currentValue = parseInt(quantityInput.value);

            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateCart(); // Call the updateCart function
            }
        });
    });
});
</script> --}}
    <script>
        $(document).ready(function() {
            function updateCart() {
                // Prepare an object to store item IDs and corresponding quantities
                var quantitiesData = {};
                var subTotal = 0;

                // Loop through all quantity inputs
                $('input[name^="quantity"]').each(function() {
                    var itemId = $(this).data('item-id'); // Get the item ID from the data attribute
                    var quantity = $(this).val(); // Get the quantity value
                    var price = parseFloat($(this).closest('.table-row-data').find('.item-price').text()
                        .replace(/[^0-9.-]+/g, "")); // Extract the price

                    // Calculate the subtotal for each item
                    var itemSubtotal = price * quantity;

                    // Update the subtotal display for the item
                    $('#subtotalItem_' + itemId).text(itemSubtotal.toFixed(2));

                    // Add to the overall subtotal
                    subTotal += itemSubtotal;

                    // Store the item ID and quantity in the quantitiesData object
                    if (itemId && quantity) {
                        quantitiesData[itemId] = quantity;
                    }
                });

                // Calculate VAT
                var vatPercentage = {{ setting('vat') }};
                var vat = subTotal * (vatPercentage / 100);

                // Calculate total
                var total = subTotal + vat;

                // Update the displayed subtotal, VAT, and total
                $('.subTotal').text(  subTotal.toFixed(2) +'{{ Country()->currancy_code }} ');
                $('.vat').text( vat.toFixed(2)+ '{{ Country()->currancy_code }} ');
                $('.total').text(total.toFixed(2) + '{{ Country()->currancy_code }} ');

                // Perform an AJAX request with the quantities data
                $.ajax({
                    url: '{{ route('Client.updateCart') }}',
                    method: 'GET',
                    data: {
                        quantities: quantitiesData
                    },
                    success: function(response) {
                        console.log('Success:', response);
                        Swal.fire({
                            text: response.message,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1000
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            const inputWrappers = document.querySelectorAll('.input-wrapper');

            inputWrappers.forEach(inputWrapper => {
                const incrementButton = inputWrapper.querySelector('.increment');
                const decrementButton = inputWrapper.querySelector('.decrement');
                const quantityInput = inputWrapper.querySelector('.quantity');

                incrementButton.addEventListener("click", () => {
                    const maxQuantity = parseInt(quantityInput.getAttribute('max'));
                    let currentValue = parseInt(quantityInput.value);

                    if (currentValue < maxQuantity) {
                        quantityInput.value = currentValue + 1;
                        updateCart(); // Call the updateCart function
                    }
                    if (currentValue == maxQuantity) {
                        Swal.fire({
                            text: "@lang('trans.You_have_reached_your_limit')",
                            showConfirmButton: true,
                        });
                    }
                });

                decrementButton.addEventListener("click", () => {
                    const currentValue = parseInt(quantityInput.value);

                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                        updateCart(); // Call the updateCart function
                    }
                });
            });
        });
    </script>

    <!-- Update quantity of cart_items -->


    <!-- Delete cart_item -->
    <script>
        // Function to handle delete action
        function deleteCartElement(icon, cartItemId) {
            var $icon = $(icon);
            var $img = $icon.siblings('.deleteRawImg');
            var $tbody = $icon.closest('.table-row-data');

            $icon.hide();
            $img.show();

            // Ajax call here
            $.ajax({
                url: '{{ route('Client.deleteCart') }}',
                method: 'GET',
                data: {
                    cart_item_id: cartItemId // Pass the cart item id to the server
                },
                success: function(response) {
                    // Success callback
                    $icon.show();
                    $img.hide();
                    $tbody.hide(); // Hide tbody after ajax call success
                    Swal.fire({
                        text: response.message,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('.fa-shopping-bag .icon-number').text(response.cart_count);

                    // Check if there are no more cart items
                    if (response.cart_count === 0) {
                        // Reload the page
                        location.reload(true);
                    }
                },
                error: function(xhr, status, error) {
                    // Error callback
                    console.error('Error:', error);
                    $icon.show();
                    $img.hide();
                }
            });
        }
    </script>
@endpush
