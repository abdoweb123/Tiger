@extends('client.layouts.layout')
@section('content')
    {{-- hero --}}
    @include('client.sliders.hero')
    {{-- hero --}}

    {{-- offers --}}
    @include('client.sliders.offers')
    {{-- offers --}}

    {{-- product slider --}}
    @include('client.sliders.product')
    {{-- product slider --}}

    {{-- about --}}
    @include('client.aboutBanner')
    {{-- about --}}

    {{-- best seller --}}
    @include('client.sliders.best')
    {{-- best seller --}}

    {{-- our services --}}
    @include('client.ourservicesbanner')
    {{-- our services --}}

    {{-- new collection --}}
    @include('client.sliders.newCollection')
    {{-- new collection --}}
@endsection

@push('js')
    <!-- Start toggle product to wishlist -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#subscribeButton').click(function(e) {
                e.preventDefault();

                var email = $('#emailInput').val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('Client.subscribe') }}",
                    data: {
                        email: email,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // If success, clear input field and show success message
                        $('#emailInput').val('');
                        Swal.fire({
                            icon: 'success',
                            title: '{{ __('trans.subscribedSuccessfully') }}',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                    error: function(xhr, status, error) {
                        // If error, show error message
                        Swal.fire({
                            icon: 'error',
                            text: xhr.responseJSON.message
                        });
                    }
                });
            });

            // handle Heart Click
            $('.heartIcon').on('click', function(e) {
                e.preventDefault(); // Prevent default link behavior

                var $heartIcon = $(this);
                var productId = $heartIcon.data('product-id');
                var actionUrl = $heartIcon.data('action-url');
                var $spinner = $heartIcon.prev('.spinner');

                // Show spinner and hide heartIcon
                $spinner.show();
                $heartIcon.hide();

                // Perform AJAX request
                $.ajax({
                    url: actionUrl,
                    method: 'POST',
                    data: {
                        product_id: productId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // Hide spinner and show heartIcon upon success
                        $spinner.hide();

                        if (response.exists === 1) {
                            $heartIcon.removeClass().addClass(
                                'fa-solid fa-heart position-absolute heartIcon text-black');
                        } else {
                            $heartIcon.removeClass().addClass(
                                'fa-regular fa-heart text-black fs-6 link-black cursor-pointer mt-1 position-absolute top-0 end-custom heartIcon'
                                );
                        }

                        $heartIcon.show();

                        // Show success message with SweetAlert
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            showConfirmButton: true,
                            timer: 1500
                        });

                        $('.fa-heart .icon-number').text(response.wishlistCount);

                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);

                        // Hide spinner and show heartIcon upon error
                        $spinner.hide();
                        // $heartIcon.removeClass().addClass('fa-solid fa-heart position-absolute heartIcon text-info');
                        $heartIcon.show();

                        swal.fire({
                            title: "Error!",
                            text: "An error occurred. Please Login first.",
                            icon: "error",
                        });
                    }
                });
            });
        });
    </script>
    <!-- End toggle product to wishlist -->
   
@endpush
