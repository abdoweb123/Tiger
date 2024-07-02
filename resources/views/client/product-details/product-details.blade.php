@push('css')
    <style>
        .img-showcase img {
            opacity: 1;
            transition: opacity 0.2s ease-in-out;
        }

        .img-showcase img.hidden {
            opacity: 0;
        }

        .img-showcase img.shown {
            opacity: 1;
        }

        .in-stock-button,
        .out-stock-button {
            display: none;
        }

        .out-stock-btn {
            background-color: inherit;
            color: #dd1f1f;
            border: 1px dashed #dd1f1f;
            padding: 2px 15px !important;
        }

        .spinner-bg {
            right: -33px;
            width: 30px;
            height: 30px;
        }

        .disabled-btn,
        .disabled-btn:hover {
            cursor: not-allowed !important;
            background-color: #00000066 !important;
            border: #00000066 !important;
        }

        .showViewCart {
            /*display: block;*/
            opacity: 1 !important;
            background-color: #00000066;
        }

        .inwp-stock-left-info {
            display: none;
        }
        
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
@endpush
@extends('client.layouts.layout')
@section('content')
    @include('client.product-details.product-section')

    @include('client.product-details.also-like')

    @include('client.product-details.product-rating')
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
        integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    {{-- chat gpt --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('.col-2.p-0.width.btn.rounded-0.w-auto');

            images.forEach(function(image) {
                image.addEventListener('click', function() {
                    // Remove 'active' class from all images
                    images.forEach(function(img) {
                        img.classList.remove('active');
                    });

                    // Add 'active' class to the clicked image
                    this.classList.add('active');
                });
            });
        });
    </script> --}}
    {{-- chat gpt --}}
    {{-- Amira js --}}

{{-- slider details --}}
    <script>
        // var lang = localStorage.getItem('Language');
        var Diriction = false;
        @if (lang('ar'))
            Diriction = true;
        @endif
        AOS.init({
            once: true
        })
        Fancybox.bind('[data-fancybox="gallery"]', {});
        document.addEventListener('DOMContentLoaded', function() {

            function handleButtonClick(buttons, currentButton) {
                buttons.forEach(btn => {
                    if (btn !== currentButton) {
                        btn.classList.remove('active');
                    }
                });
                currentButton.classList.toggle('active');
            }

            const sizeButtons = document.querySelectorAll('.length');
            sizeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    handleButtonClick(sizeButtons, this);
                });
            });

            const widthButtons = document.querySelectorAll('.width');
            widthButtons.forEach(button => {
                button.addEventListener('click', function() {
                    handleButtonClick(widthButtons, this);
                });
            });

        });
        $(".slider1").slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            arrows: false,
            autoplaySpeed: 1000,
            rtl: Diriction,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        infinite: true,
                    },
                },
                {
                    breakpoint: 919,
                    settings: {
                        slidesToShow: 2,
                    },
                }
            ],
        });
        $(".slider2").slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            arrows: false,
            autoplaySpeed: 1000,
            rtl: Diriction,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        infinite: true,
                    },
                },
                {
                    breakpoint: 919,
                    settings: {
                        slidesToShow: 2,
                    },
                }
            ],
        });
    </script>
{{-- slider details --}}


    <script>
        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = parseInt(imgItem.dataset.id); // Parsing to ensure imgId is treated as a number
                slideImage();
            });
        });

        // function slideImage() {
        //     const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
        //     // Correcting syntax for transform property
        //     document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        // }

        // slider image edits
        function slideImage() {
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
            if (document.body.classList.contains('arabicVersion')) {
                document.querySelector('.img-showcase').style.transform = `translateX(${(imgId - 1) * displayWidth}px)`;
                console.log('arabic');
            } else {
                document.querySelector('.img-showcase').style.transform = `translateX(${-(imgId - 1) * displayWidth}px)`;
            }
        }


        function showImage(event, imageSrc) {
            event.preventDefault();
            // Get the img-showcase element
            var imgShowcase = document.querySelector('.img-showcase img');
            // Set the src attribute of img-showcase to the clicked image's source
            imgShowcase.classList.add('hidden');

            // Change the image source after the fade out animation completes
            setTimeout(function() {
                imgShowcase.src = imageSrc;
            }, 300);
            imgShowcase.classList.add('shown');
        }
        // function slideImage() {
        //     const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
        //     // Correcting syntax for transform property
        //     document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        // }


        window.addEventListener('resize', slideImage);
        document.addEventListener("DOMContentLoaded", function() {
            const productCards = document.querySelectorAll('.slider-title .card');

            function initializeProductCard(card) {
                const colorButtons = card.querySelectorAll('.color');

                const defaultButton = Array.from(colorButtons).find(button => button.classList.contains('active'));
                if (defaultButton) {
                    changeProductImage(defaultButton, card);
                }

                colorButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        handleButtonClick(colorButtons, this);
                        changeProductImage(this, card);
                    });
                });
            }

            function handleButtonClick(buttons, currentButton) {
                buttons.forEach(btn => {
                    if (btn !== currentButton) {
                        btn.classList.remove('active');
                    }
                });
                currentButton.classList.toggle('active');
            }

            function changeProductImage(button, card) {
                const newImageSrc = button.getAttribute('data-img');
                const productImage = card.querySelector('.img-card img');
                productImage.src = newImageSrc;
            }

            // Initialize each product card
            productCards.forEach(card => {
                initializeProductCard(card);
            });
        });
    </script>
    {{-- Amira js --}}

    {{-- cart Turtle --}}
    <script>
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
                }
                if (currentValue == maxQuantity) {
                    Swal.fire({
                        text: "@lang('trans.You_have_reached_your_limit')",
                        showConfirmButton: true,
                        // timer: 1500 // Display duration in milliseconds
                    });
                }
            });

            decrementButton.addEventListener("click", () => {
                const currentValue = parseInt(quantityInput.value);

                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.img-container img').click(function() {
                $('.img-container img').removeClass('selected-img');
                $(this).toggleClass('selected-img');

                // if ($('.selected-img').length > 0) {
                //   $('.stock-button').show();
                // } else {
                //   $('.stock-button').hide();
                // }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.size-select').click(function() {
                $('.size-select').removeClass('selected-img');
                $(this).toggleClass('selected-img');
            });
        });
    </script>

    <script>
        document.getElementById('sizeToggle').addEventListener('click', function() {
            var accordion = document.getElementById('show-accordion');
            if (accordion.style.display === 'none') {
                accordion.style.display = 'block';
            } else {
                accordion.style.display = 'none';
            }
        });
    </script>

    <script>
        const options = document.querySelectorAll('.option');

        options.forEach(option => {
            option.addEventListener('click', function() {
                options.forEach(opt => opt.classList.remove('active'));

                this.classList.add('active');
            });
        });
    </script>

    <!-- show sizes of each color -->
    <script>
        $(document).ready(function() {

            // When an image with class colorImage is clicked
            $('.colorImage').click(function() {

                var colorId = $(this).data('color-id');

                var productId = $('input[name="product_id"]').val();

                console.log(productId);
                $.ajax({
                    url: '{{ route('Client.getSizesByColor') }}',
                    method: 'GET',
                    data: {
                        color_id: colorId,
                        product_id: productId,
                    },
                    success: function(response) {
                        console.log('Success:', response);
                        $('.showSizes').hide();
                        response.forEach(function(sizeId) {
                            $('.showSizes[data-size-id="' + sizeId + '"]').show();
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
    {{-- cart Turtle --}}

    <!-- To get item by sending color_id, size_id, product_id && add_product_to_cart -->
    <script>
        $(document).ready(function() {
            /*** start To prevent add to cart if there is no product ***/
            $('#addToCart').click(function(event) {
                if ($(this).hasClass('disabled-btn')) { // Here you can not use add_to_cart_btn
                    event.preventDefault(); // Prevent the default action (opening modal)
                    Swal.fire({
                        text: "@lang('trans.Sorry_product_unavailable_choose_different_combination')",
                        showConfirmButton: true,
                        // timer: 1500 // Display duration in milliseconds
                    });
                    return false;
                } else { // Here you can use add_to_cart_btn
                    
                    // Here code to save product in cart
                    // make sure we have correct data
                    var colorId = parseInt($('input[name="color_id"]').val());
                    var sizeId = parseInt($('input[name="size_id"]').val());
                    var productId = parseInt($('input[name="product_id"]').val());
                    var quantityItem = parseInt($('input[name="quantity_item"]').val());
                    var TotalQuantityItem = parseInt($('input[name="total_quantity_item"]').val());

                    if (colorId && sizeId && productId && quantityItem) {
                        // to make_sure the chosen quantity by client is not bigger than total_quantity
                        if (TotalQuantityItem) {
                            if (quantityItem > TotalQuantityItem || quantityItem <= 0) {
                                // {{--                alert('@lang('trans.Sorry_product_unavailable_choose_different_combination')'); --}}
                                Swal.fire({
                                    text: "@lang('trans.Sorry_product_unavailable_choose_different_combination')",
                                    showConfirmButton: true,
                                    // timer: 1500 // Display duration in milliseconds
                                });
                                return false;
                            }
                        }
                        // go to addProductToCart
                        addToCart(colorId, sizeId, productId, quantityItem);
                    } else {
                        Swal.fire({
                            text: "@lang('trans.Sorry_product_unavailable_choose_different_combination')",
                            showConfirmButton: true,
                            // timer: 1500 // Display duration in milliseconds
                        });
                    }

                    // Put code of ajax here
                    // To show modal view cart
                    // $('.viewCart').fadeIn().addClass('showViewCart');
                }
            });
            // To close modal viewCart
            $('.viewCart .btn-close').on('click', function() {
                $('.viewCart').hide();
                $('.size-select').removeClass('selected-img');
                $('.img-container img').removeClass('selected-img');
                $('input[name="color_id"]').val('');
                $('input[name="size_id"]').val('');
                $('#addToCart').addClass('disabled-btn');
                $('.in-stock-button').hide();
                $('.out-stock-button').hide();
            });

            @if (auth('client')->check())
                function addToCart(colorId, sizeId, productId, quantityItem) {
                    $.ajax({
                        url: '{{ route('Client.addToCart') }}',
                        method: 'GET',
                        data: {
                            color_id: colorId,
                            size_id: sizeId,
                            product_id: productId,
                            quantity: quantityItem,
                        },
                        success: function(response) {
                            console.log('Success:', response.cart_count);
                            $('.fa-shopping-bag .icon-number').text(response.cart_count);
                            $('.viewCart').fadeIn().addClass('showViewCart');
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                }
            @endif
         
            /*** End To prevent add to cart if there is no product then add_to_cart ***/


            /*** start To get item by sending color_id, size_id, product_id ***/
            $('.img-container img').click(function() {

                var colorId = $(this).data('color-id');

                // Save colorId to input field
                $('input[name="color_id"]').val(colorId);

                // Check if both color and size IDs are selected
                if ($('input[name="color_id"]').val() && $('input[name="size_id"]').val()) {
                    console.log('Success');
                    // Make your AJAX request here
                    var sizeId = $('input[name="size_id"]').val();
                    var productId = $('input[name="product_id"]').val();
                    makeAjaxRequest(colorId, sizeId, productId);
                } else {
                    console.log('no');
                }
            });

            $('.size-select').click(function() {
                var sizeId = $(this).parent().data('size-id');

                // Save sizeId to input field
                $('input[name="size_id"]').val(sizeId);

                // Check if both color and size IDs are selected
                if ($('input[name="color_id"]').val() && $('input[name="size_id"]').val()) {
                    console.log('Success');
                    // Make your AJAX request here
                    var colorId = $('input[name="color_id"]').val();
                    var productId = $('input[name="product_id"]').val();
                    makeAjaxRequest(colorId, sizeId, productId);
                } else {
                    console.log('no');
                }
            });

            function makeAjaxRequest(colorId, sizeId, productId) {
                $.ajax({
                    url: '{{ route('Client.getItemByColorSize') }}',
                    method: 'GET',
                    data: {
                        color_id: colorId,
                        size_id: sizeId,
                        product_id: productId
                    },
                    success: function(response) {
                        // console.log('Success:', response);
                        if (response.quantity > 0) {
                            // Show the corresponding .showSizes element
                            console.log('Success:', response.quantity);

                            // to show 1_left div
                            if (response.quantity === 1) {
                                $('.one_left_' + response.size_id).show();
                            } else {
                                $('.one_left_' + response.size_id).hide();
                            }

                            $('#addToCart').removeClass('disabled-btn');
                            $('.out-stock-button').hide();
                            $('.in-stock-button').show();
                            $('.show_max_quantity').text(response.quantity);

                            // update input quantity
                            $('input[name="quantity_item"]').attr('max', response.quantity);
                            $('input[name="total_quantity_item"]').val(response.quantity);

                        } else {
                            $('#addToCart').addClass('disabled-btn');
                            $('.in-stock-button').hide();
                            $('.out-stock-button').show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
            /*** End To get item by sending color_id, size_id, product_id ***/
        });
    </script>

    <!-- To copy link -->
    <script>
        // Select the elements with the "copy-link" class
        const copyLinks = document.querySelectorAll('.copy-link');

        // Iterate over each link
        copyLinks.forEach(link => {
            // Add click event listener
            link.addEventListener('click', (event) => {
                // Prevent the default action of the link
                event.preventDefault();

                // Get the URL from the href attribute of the link
                const url = link.getAttribute('href');

                // Create a temporary textarea element
                const textarea = document.createElement('textarea');
                textarea.value = url;

                // Append the textarea to the body
                document.body.appendChild(textarea);

                // Select the text inside the textarea
                textarea.select();

                // Execute the copy command
                document.execCommand('copy');

                // Remove the textarea from the DOM
                document.body.removeChild(textarea);

                // Alert the user that the link has been copied
                alert('Link copied to clipboard!');
            });
        });
    </script>
@endpush
