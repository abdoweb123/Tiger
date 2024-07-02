@extends('client.layouts.layout')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/intl-tel-input@17.0.3/build/css/intlTelInput.css">
    @if (lang() == 'ar')
        <style>
            .iti--allow-dropdown .iti__flag-container,
            .iti--separate-dial-code .iti__flag-container {
                /* right: 25px !important; */
                left: auto !important;
            }

            .iti__country-list {
                margin: 0px 0px 0 0px !important;
            }

            .iti__country-list {
                position: absolute !important;
                z-index: 2 !important;
                list-style: none !important;
                text-align: right !important;
                padding: 0 !important;
                margin: 0 0 0 -1px !important;
                box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2) !important;
                background-color: white !important;
                border: 1px solid #CCC !important;
                white-space: nowrap !important;
                max-height: 200px !important;
                overflow-y: scroll !important;
                -webkit-overflow-scrolling: touch !important;
            }

            #phone {
                padding-left: 90px !important;
                padding-right: 90px !important;
            }
        </style>
    @else
        <style>
            .iti--allow-dropdown .iti__flag-container,
            .iti--separate-dial-code .iti__flag-container {
                /* left: 25px !important; */
                right: auto !important;
            }

            .iti__country-list {
                position: absolute !important;
                z-index: 2 !important;
                list-style: none !important;
                text-align: left !important;
                padding: 0 !important;
                margin: 0 0 0 -1px !important;
                box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2) !important;
                background-color: white !important;
                border: 1px solid #CCC !important;
                white-space: nowrap !important;
                max-height: 200px !important;
                overflow-y: scroll !important;
                -webkit-overflow-scrolling: touch !important;
            }

            #phone {
                padding-left: 90px !important;
                padding-right: 90px !important;
            }
        </style>
    @endif
@endpush
@section('content')
    <div class="container my-lg-5 my-3  section-top">
        <div class="row profile" style="column-gap: 10px;">
            <div class="col-lg-3 ">
                <div class="nav flex-lg-column flex-row  nav-pills  px-4 py-5" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <button class="nav-link active my-1" id="v-pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="true">
                        <h6 class="  py-2 my-0 ">
                            account
                        </h6>
                    </button>

                    <button class="nav-link my-1" id="v-pills-address-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-address" type="button" role="tab" aria-controls="v-pills-address"
                        aria-selected="false">
                        <h6 class=" py-2 my-0 ">
                            my address
                        </h6>
                    </button>

                    <button class="nav-link my-1" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false">
                        <h6 class=" py-2 my-0 ">
                            my orders
                        </h6>
                    </button>

                    <button class="nav-link my-1" id="v-pills-Security-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-Security" type="button" role="tab" aria-controls="v-pills-Security"
                        aria-selected="false">
                        <h6 class="  py-2 my-0 ">
                            Security
                        </h6>
                    </button>

                    <button class="nav-link my-1" id="v-pills-lang-tab" data-bs-toggle="pill" data-bs-target="#v-pills-lang"
                        type="button" role="tab" aria-controls="v-pills-lang" aria-selected="false">
                        <h6 class="  py-2 my-0 ">
                            Language
                        </h6>
                    </button>

                    <a href="{{ route('Client.logout') }}" class="nav-link my-5 d-flex gap-2">
                        <h6 class="py-2 my-0 border-0">
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </h6>
                        <h6 class="py-2 my-0 border-0">
                            @lang('trans.logout')
                        </h6>
                    </a>
                </div>
            </div>

            <div class="col-lg-8 col-12" style="min-height: 70vh;">
                <div class="row ">
                    <div class="col-12 ">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab" tabindex="0">
                                <form action="{{ route('Client.account') }}" method="POST" class="update-profile">
                                    @csrf
                                    <div class="row  my-5 p-2 gap-3 ">
                                        <h5 class="py-2">General Info</h5>

                                        <div class="col-lg-5 col-12">
                                            <label for="name" class="form-label fw-medium">User Name*</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="first_name"
                                                    value="{{ auth()->user()->first_name }}"
                                                    class="form-control rounded-1 bg-gray border-0">

                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-12">
                                            <label for="last_name" class="form-label fw-medium">Last Name*</label>
                                            <div class="input-group mb-3">
                                                <input type="text"name="last_name"
                                                    value="{{ auth()->user()->last_name }}"
                                                    class="form-control rounded-1 bg-gray border-0 ">
                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-12">
                                            <label for="email" class="form-label fw-medium">Emaill*</label>
                                            <div class="input-group mb-3">
                                                <input id="email" name="email" type="email"
                                                    value="{{ auth()->user()->email }}"
                                                    class="form-control rounded-1 bg-gray border-0">
                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-12">
                                            <label for="phone" class="form-label fw-medium">Phone Number*</label>
                                            <div class="input-group mb-3">
                                                <input type="hidden" name="country_code" id="country_code"
                                                    value="{{ old('country_code', auth()->user()->country_code) }}">
                                                <input type="hidden" name="phone_code" id="phone_code"
                                                    value="{{ old('phone_code', auth()->user()->phone_code) }}">
                                                <input id="phone" value="{{ old('phone', auth()->user()->phone) }}"
                                                    name="phone" type="text" placeholder="Phone number"
                                                    class="form-control rounded-1 bg-gray border-0  phone" />
                                            </div>
                                        </div>

                                        <div class="col-12 ">
                                            <div class="d-flex align-items-center my-3">
                                                <div class="d-flex gap-3 ">
                                                    <button class="btn  btn-dark text-white px-lg-4 px-2 button-width save"
                                                        type="submit">
                                                        save
                                                    </button>
                                                    <a class="btn btn-outline-dark border-dark px-lg-4 px-2 button-width cancel"
                                                        type="button">Cancel</a>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row my-5">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a class="text-black text-decoration-underline w-auto px-3" type="button"
                                                href="changePassword.html">Change
                                                password</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            {{-- adderss --}}
                            <div class="tab-pane fade " id="v-pills-address" role="tabpanel"
                                aria-labelledby="v-pills-address-tab" tabindex="0">
                                <div class="row table-row py-2">
                                    <h5 class="py-2">My Addresses</h5>
                                </div>
                                @foreach ($addresses as $address)
                                    <div class="row table-row py-2 bg-gray p-2 my-2 rounded-1">
                                        <div class="col-12 align-items-center  d-flex justify-content-between">
                                            <div class=" py-2">
                                                <div class="d-flex gap-2 align-items-center">
                                                    <span>
                                                        <i class="fa-solid fa-location-dot text-black"></i>
                                                    </span>
                                                    @if ($address->default == 1)
                                                        <span> defualt Address</span>
                                                    @else
                                                        <span> my Address</span>
                                                    @endif
                                                </div>
                                                <div class=" text-secondary fw-medium">
                                                    <small> {{ $address->country->title() }},
                                                        {{ $address->region->title() }}</small>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <button class="text-danger text-capitalize d-flex gap-1 btn"
                                                    type="button">
                                                    <span><i class="fa-regular fa-trash-can"></i></span><span>delete</span>
                                                </button>
                                                <a href="{{ route('Client.editAddress', ['id' => $address->id]) }}"
                                                    class="text-secondary d-flex gap-1 btn" type="button">
                                                    <span><i class="fa-regular fa-pen-to-square"></i>
                                                    </span><span>edit</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-12 ">
                                        <a class="btn  btn-dark text-white px-lg-4 px-5 my-3 text-capitalize save py-2"
                                            href="{{ route('Client.createAddress') }}" type="submit">
                                            add new address
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{-- adderss --}}

                            @include('client.login.orders')

                            {{-- change password --}}
                            <div class="tab-pane fade " id="v-pills-Security" role="tabpanel"
                                aria-labelledby="v-pills-Security-tab" tabindex="0">
                                <form>

                                    <div class="row table-row gy-3 justify-content-lg-between py-2 ">
                                        <h5 class="py-2">Password Info</h5>
                                        <div class="col-lg-6 col-12">
                                            <label for="email" class="form-label fw-medium">Emaill*</label>
                                            <div class="input-group mb-3">
                                                <input type="text" value="amirazak1032000@gmail.com"
                                                    class="form-control rounded-1 bg-gray border-0">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">

                                            <label for="password" class="form-label fw-medium">Current Password</label>
                                            <div class="mb-3 password-container">
                                                <input type="password"
                                                    class="form-control rounded-1 border-0 py-2 bg-gray"
                                                    id="exampleInputPassword1">
                                                <button class="toggle-password TogglePasswordBtns" tabindex="-1"><i
                                                        class="fa-regular fa-eye"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">

                                            <label for="password" class="form-label fw-medium">new Password</label>
                                            <div class="mb-3 password-container">
                                                <input type="password"
                                                    class="form-control rounded-1 border-0 py-2 bg-gray"
                                                    id="exampleInputPassword1">
                                                <button class="toggle-password TogglePasswordBtns" tabindex="-1"><i
                                                        class="fa-regular fa-eye"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">

                                            <label for="password" class="form-label fw-medium">Confirm Password</label>
                                            <div class="mb-3 password-container">
                                                <input type="password"
                                                    class="form-control rounded-1 border-0 py-2 bg-gray"
                                                    id="exampleInputPassword1">
                                                <button class="toggle-password TogglePasswordBtns" tabindex="-1"><i
                                                        class="fa-regular fa-eye"></i></button>
                                            </div>
                                        </div>
                                        <div class=" col-12">
                                            <div class="d-flex align-items-center my-3">
                                                <div class="d-flex gap-3 ">
                                                    <button class="btn  btn-dark text-white px-lg-4 px-2 button-width"
                                                        type="button">

                                                        save
                                                    </button>
                                                    <a class="btn btn-outline-dark border-dark px-lg-4 px-2 button-width"
                                                        type="button">Cancel</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            {{-- change password --}}

                            {{-- lang --}}
                            <div class="tab-pane fade " id="v-pills-lang" role="tabpanel"
                                aria-labelledby="v-pills-lang-tab" tabindex="0">
                                <form action="{{ route('Client.update.language') }}" method="POST"
                                    class="update-profile">
                                    @csrf
                                    <div class="row my-5 p-2 gap-3">
                                        <h5 class="py-2">Language</h5>
                                        <div class="col-lg-5 col-12">
                                            <label for="preferred_language" class="form-label fw-medium">Preferred
                                                language*</label>
                                            <select name="language"
                                                class="form-select form-control LanguageMenu rounded-1 bg-gray border-0 w-100"
                                                aria-label="Default select example">
                                                <option value="en" class="lan"
                                                    {{ Auth::guard('client')->user()->language == 'en' ? 'selected' : '' }}>
                                                    English</option>
                                                <option value="ar" class="lan"
                                                    {{ Auth::guard('client')->user()->language == 'ar' ? 'selected' : '' }}>
                                                    العربية</option>
                                                <!-- Add more language options here -->
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center my-3">
                                                <div class="d-flex gap-3">
                                                    <button class="btn btn-dark text-white px-lg-4 px-2" type="submit">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                            </div>
                            {{-- lang --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
        integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.16/build/js/intlTelInput.min.js"></script>

    <script>
        if ($("details").click().attr("")) {
            $("summary span").text("Close details");
        } else if ($("details").click().attr("open")) {
            $("summary span").text("view details")
        }
    </script>


    <script>
        $(".data-route").on("click", function() {
            console.log("data test");
            const summarySection = $(".summary--section");
            const viewBtnImg = $(".data-route", this);

            summarySection.toggleClass("hide-content");

            let currentSrc = viewBtnImg.attr("src");
            let altSrc = viewBtnImg.data("alt-src");

            viewBtnImg.attr("src", altSrc);
            viewBtnImg.data("alt-src", currentSrc);
            let orderId = $(this).data("order_id");
            $.ajax({
                url: '{{ route('Client.orderView') }}',
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    orderId: orderId
                },
                success: function(data) {
                    var lang = "{{ lang() }}"
                    let order = data.order;
                    console.log(order);
                    if (order.address_id != null) {
                        $("#country").text(order.address.country['title_' + lang]);
                        $("#addressDetails").html(`,${ order.address.apartment } , ${ order.address.road } ,
                    ${ order.address.region['title_'+lang] }`);
                    } else {
                        console.log(24);
                        $(".shipping-section").hide()

                    }

                    $("#subTotal").html(
                        `{{ Country()->currancy_code_en }} ${(order.sub_total*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}`
                    );
                    $("#vat").html(
                        `{{ Country()->currancy_code_en }} ${(order.vat*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}`
                    );
                    if (order.delivery_id == 1) {
                        $("#shipping").html(
                            `{{ Country()->currancy_code_en }} ${(order.charge_cost*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}`
                        );
                    } else {
                        console.log("hide");
                        $(".shippingCountainer").hide()
                    }

                    $("#total").html(
                        `{{ Country()->currancy_code_en }} ${(order.net_total*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}`
                    );

                    if (order.coupon > 0) {
                        $('.couponInfo').css('display', "flex")
                        $("#coupon").html(
                            `{{ Country()->currancy_code_en }} ${(order.coupon*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}`
                        );
                        $("#sub_total_after_coupon").html(
                            `{{ Country()->currancy_code_en }} ${(order.sub_total_after_coupon*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}`
                        );

                    }
                    $('#paymentImage').html(`${(order.payment['title_' + lang])}`);
                    // $("#order_cancel").data("order_id_cancel", order.id);
                    $(".order-item").remove();
                    let orderItemsHtml = '';
                    console.log(order.order_products);
                    order.order_products.forEach(function(item) {
                        orderItemsHtml += `
                    <div class="order-item row justify-content-center align-items-center">
                        <div class="col-12 col-md-6">
                            <div class="row justify-content-center align-items-center" style="font-size: 14px;">
                                <div class="col-4 d-flex align-items-center justify-content-center">
                                    <img src="${item.color.header[0].header}" class="img-fluid w-75" alt=""/>
                                 </div>
                        <div class="details col-8">
                            <div class="">
                                <span class="name font-weight-bold d-block ">${item['title_' + lang]}</span>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-12 col-md-6">
                     <div class="row mt-2 align-items-center">
                          <div class="col-6 text-secondary font-weight-bold d-block ">
                                <div class="size ">
                                    <span class="title-details">${item.size['title']}</span>
                                </div>
                            <p class="color">Color: ${item.color['title_' + lang]}</p>
                            <p class="quantity">Quantity: ${item.quantity}</p>
                        </div>
                        <div class="price">{{ Country()->currancy_code_en }} ${(item.price*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}</div>
                    </div>`;
                    });
                    $(".order-items-container").append(orderItemsHtml);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>

    <script src="https://unpkg.com/intl-tel-input@17.0.3/build/js/intlTelInput.js"></script>

    <script>
        var iti = window.intlTelInput(document.querySelector("#phone"), {
            separateDialCode: true,
            formatOnDisplay: false,
            utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
            onlyCountries: @json(Countries()->pluck('country_code')),
            preferredCountries: ['sa']
        });
        window.iti = iti;

        iti.setCountry(
            "{{ old('country_code', isset(auth()->user()->country_code) ? auth()->user()->country_code : 'SA') }}");
        document.querySelector("#phone").addEventListener("countrychange", function() {
            document.getElementById("phone").value = '';
            document.getElementById("country_code").value = iti.getSelectedCountryData().iso2.toUpperCase();
            document.getElementById("phone_code").value = iti.getSelectedCountryData().dialCode;
        })
    </script>

    <script>
        $(document).ready(function() {
            // Function to toggle between the two address sections
            function toggleAddressSections(countryValue) {
                if (countryValue == 1) {
                    $('#otherCountries').hide(); // Hide otherCountries section
                    $('#bahrain').show(); // Show bahrain section
                    // Add 'required' attribute to inputs in bahrain section
                    $('#bahrain').find('input, select').prop('required', true);
                    $('#bahrain').find('input[name="additional_directions"]').prop('required', false);
                    // Remove 'required' attribute from inputs in otherCountries section
                    $('#otherCountries').find('input, select').prop('required', false);

                    // Fetch regions for country 1
                    fetchRegionsForCountry(countryValue);
                } else {
                    $('#otherCountries').show(); // Show otherCountries section
                    $('#bahrain').hide(); // Hide bahrain section
                    // Add 'required' attribute to inputs in otherCountries section
                    $('#otherCountries').find('input, select').not('[name="state"], [name="address2"]').prop(
                        'required', true);
                    // Remove 'required' attribute from inputs in bahrain section
                    $('#bahrain').find('input, select').prop('required', false);
                }
            }

            // Call the function initially to set the correct section based on the selected country
            toggleAddressSections($('#country_id').val());

            // Event listener to detect changes in the selected country
            $('#country_id').change(function() {
                var selectedCountryValue = $(this).val();
                toggleAddressSections(selectedCountryValue);
            });


            // Function to fetch regions for country 1 using AJAX
            function fetchRegionsForCountry(countryValue) {
                $.ajax({
                    url: '{{ route('Client.fetchRegionsForCountry') }}', // Route for fetching regions
                    type: 'GET',
                    data: {
                        country_id: countryValue
                    }, // Pass the country_id as data
                    success: function(response) {
                        // Populate the select box with regions
                        var $regionSelect = $('#region_id');
                        $regionSelect.empty(); // Clear existing options
                        $regionSelect.append(
                            '<option value="">{{ __('trans.select_region') }}</option>'
                        ); // Add default option
                        $.each(response.regions, function(index, region) {
                            $regionSelect.append('<option value="' + region.id + '">' + region
                                .title + '</option>');
                        });
                    }
                });
            }
        });
    </script>
@endpush
