@extends('client.layouts.layout')

@push('css')

    <link rel="stylesheet" href="https://unpkg.com/intl-tel-input@17.0.3/build/css/intlTelInput.css">
    <style>
        .iti {

            width: 100%;
            /* margin-top: 3rem; */
        }
    </style>
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

            #phone,
            #register_phone {
                /* padding-left: 90px !important; */
                padding-right: 120px !important;
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
                padding-left: 120px !important;
                /* padding-right: 100px !important; */
            }
        </style>
    @endif


    @if (lang() == 'ar')
        <style>
            .toggle-password {
                left: -91%;
                right: 0;
            }
        </style>
    @else

    @endif

    @if (lang() == 'ar')
        <style>
            .iti2--allow-dropdown .iti2__flag-container,
            .iti2--separate-dial-code .iti2__flag-container {
                /* right: 25px !important; */
                left: auto !important;
            }

            .iti2__country-list {
                margin: 0px 0px 0 0px !important;
            }

            .iti2__country-list {
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

        </style>
    @else
        <style>
            .iti2--allow-dropdown .iti2__flag-container,
            .iti2--separate-dial-code .iti2__flag-container {
                /* left: 25px !important; */
                right: auto !important;
            }

            .iti2__country-list {
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

        </style>
    @endif
    <style>
        .iti2 {

            width: 100%;
            margin-top: 3rem;
        }
    </style>
    {{--  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@endpush

@section('content')
    <div class="container-fluid section-top ">
        <div class="row">
            <div class="col-lg-6 col-12" id="LogInPage">
                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                    <form action="{{ route('Client.login') }}" class=" w-75 py-5" method="POST">
                        @csrf
                        <h6 class="text-secondary">@lang('trans.WelcomeBack')</h6>
                        <h4 class="py-3 mb-0 header-div fw-bold d-flex gap-2 align-items-center">
                            @lang('trans.login')
                        </h4>
                        <div class="mb-3 d-flex text-secondary fw-semibold">
                            <span>@lang('trans.dontHaveAccount')</span>
                            <span class="px-2">
                                <a class="text-black text-decoration-none" id="CreateAccount">
                                    @lang('trans.signUp')</a>
                                </span>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="exampleInputEmail1" class="form-label">@lang('trans.PHONE NUMBER')</label>
                            <input class="form-control" required type="tel" id="phone_2" name="phone" class="w-100" autocomplete="off" placeholder="{{ str_repeat('*', Country()->length) }}" minlength="{{ Country()->length }}" maxlength="{{ Country()->length }}" size="{{ Country()->length }}" />
                            <input type="hidden" name="phone_code" id="phone_code_2" value="{{ old('phone_code', Country()->phone_code ) }}">
                            <input type="hidden" name="country_code" id="country_code_2" value="{{ old('country_code', Country()->country_code ) }}"/>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">
                                <span> @lang('trans.password')</span>
                            </label>
                            <div class="mb-3 password-container">
                                <input type="password" name="password" class="form-control rounded-1 border-0 py-2 bg-gray"
                                       id="exampleInputPassword1" required />
                                <button class="toggle-password TogglePasswordBtns" tabindex="-1" type="button">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>

                            <div class="d-flex justify-content-end" id="ForgetPassWordButton">
                                <a class="text-secondary fw-medium text-decoration-none" style="font-size: 14px">
                                    @lang('trans.forget_password')
                                </a>
                            </div>
                        </div>
                        <!-- <div class="mb-3 form-check">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                          </div> -->
                        <div class="col-12">
                            <button class="btn-dark btn text-white px-5 py-2 mb-3 w-100">
                                @lang('trans.login')
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="col-lg-6 col-12" id="RegisterPage" hidden>
                <div class="h-100 w-100 d-flex justify-content-center align-items-center">

                    <form action="{{ route('Client.register') }}" class="w-75" method="POST">
                        @csrf
                        <div class="row">
                            <h6 class="text-secondary">@lang('trans.WelcomeBack')</h6>
                            <h4 class=" py-3 mb-0 fw-bold header-div d-flex gap-2 align-items-center">@lang('trans.Create New Account')
                            </h4>
                            <div class="mb-3 d-flex text-secondary fw-semibold">
                                <span>@lang('trans.Already have an account?')</span>
                                <span class="px-2"><a class="text-black text-decoration-none GoToLogInPageButton"
                                                      id="LoginAccount">@lang('trans.Login')</a></span>
                            </div>
                            <div class="col-lg-6 col-12">
                                <label for="first_name" class="form-label ">@lang('trans.First Name')*</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control rounded-1 bg-gray border-0"
                                           id="first_name" name="first_name" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <label for="last_name" class="form-label ">>@lang('trans.Last Name')*</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="last_name" class="form-control rounded-1 bg-gray border-0"
                                           id="last_name" >
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="exampleInputEmail1" class="form-label">@lang('trans.Email')</label>
                                <input type="email" class="form-control bg-gray rounded-1 border-0" name="email"
                                       id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="exampleInputEmail1" class="form-label">@lang('trans.Phone Number')</label>
                                <input class="form-control" required type="tel" id="phone_1" name="register_phone" class="w-100" autocomplete="off" placeholder="{{ str_repeat('*', Country()->length) }}" minlength="{{ Country()->length }}" maxlength="{{ Country()->length }}" size="{{ Country()->length }}" />
                                <input type="hidden" name="register_phone_code" id="phone_code_1" value="{{ old('register_phone_code', Country()->phone_code ) }}">
                                <input type="hidden" name="register_country_code" id="country_code_1" value="{{ old('country_code', Country()->country_code ) }}"/>
                            </div>



                            <label for="exampleInputPassword1" class="form-label d-flex justify-content-between">
                                <span>@lang('trans.Password')</span>
                            </label>
                            <div class="mb-3  col-12">
                                <div class="password-container">
                                    <input type="password" name="password"
                                           class="form-control rounded-1 bg-gray border-0 " id="exampleInputPassword2">
                                    <button class="toggle-password TogglePasswordBtns" tabindex="-1" type="button">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                </div>

                            </div>
                            <div class="col-12">
                                <button class="btn-dark btn text-white px-5 py-2 mb-3 w-100 " type="submit"> @lang('trans.Register') </button>

                            </div>


                        </div>

                    </form>
                </div>
            </div>

            <div class="col-lg-6 col-12" id="ForgetPassword" hidden>
                <div class="h-100 w-100 d-flex justify-content-center align-items-center">

                    <form action="{{ route('Client.forget') }}" method="POST" class="send-mail w-75">
                        @csrf
                        <div class="row">
                            <h6 class="text-secondary">@lang('trans.FIRST STEP/1')</h6>
                            <h4 class=" py-3 mb-0 header-div fw-bold d-flex gap-2 align-items-center">@lang('trans.Forget Password ?')</h4>
                            <h6 class="text-secondary mb-lg-3 mb-1"> @lang('trans.Please enter your phone number. You will receive a OTP to create a new password via phone number.')

                            </h6>
                            <div class="col-12 mb-3">
                                <label for="exampleInputEmail1" class="form-label">@lang('trans.PHONE NUMBER')</label>
                                <input class="form-control" required type="tel" id="phone_3" name="phone" class="w-100" autocomplete="off" placeholder="{{ str_repeat('*', Country()->length) }}" minlength="{{ Country()->length }}" maxlength="{{ Country()->length }}" size="{{ Country()->length }}" />
                                <input type="hidden" name="phone_code" id="phone_code_3" value="{{ old('phone_code', Country()->phone_code ) }}">
                                <input type="hidden" name="country_code" id="country_code_3" value="{{ old('register_phone_code', Country()->phone_code ) }}"/>
                            </div>
                            <!-- <div class="mb-3 form-check">
                                                                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                                    </div> -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-send btn-dark btn text-white px-5 py-2 mb-3 w-100 "
                                >@lang('trans.send')</button>
                                {{-- <input type="hidden" name="" id="ConfirmCreation"/> --}}
                                {{-- <a href="{{ route('Client.home') }}" class="btn btn-cancel btn-dark btn text-white px-5 py-2 mb-3 w-100 ">@lang('trans.cancel')</a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- @include('client.otpPage') --}}


            <div class="col-lg-6 p-0 col-12 h-auto">
                <img src="assets-front/imgs/home/e37b241538f2d8febac99dfa76d61d23.jpg" class="img-fluid">
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var togglePasswords = document.querySelectorAll('.toggle-password');

            togglePasswords.forEach(function(icon) {
                icon.addEventListener('click', function() {
                    var passwordInput = this.parentElement.querySelector(
                        'input[type="password"]'
                    ); // Get the password input within the same parent element
                    passwordInput.classList.toggle('show-password');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            });
        });
    </script>

    <script>
        AOS.init({
            once: true
        })
    </script>

    <script src="https://unpkg.com/intl-tel-input@17.0.3/build/js/intlTelInput.js"></script>
    <script>
        var iti2 = window.intlTelInput(document.getElementById("phone"), {
            separateDialCode: true,
            formatOnDisplay: false,
            utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
            onlyCountries: @json(Countries()->pluck('country_code')),
            preferredCountries: ['sa']
        });
        window.iti2 = iti2;
        iti2.setCountry("{{ old('country_code', isset($country_code) ? $country_code : 'SA') }}");

        document.getElementById("phone").addEventListener("countrychange", function() {
            document.getElementById("phone").value = '';
            document.getElementById("country_code").value = iti2.getSelectedCountryData().iso2.toUpperCase();
            document.getElementById("phone_code").value = iti2.getSelectedCountryData().dialCode;
        })
    </script>


    <!-- When change country_code -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function initializePhoneInput(phoneInputId, phoneCodeInputId, countryIdInputId) {
                var phoneInput = document.querySelector(phoneInputId);
                var iti = window.intlTelInput(phoneInput, {
                    separateDialCode: true,
                    onlyCountries: @json(countries()->pluck('country_code')->toArray()),
                    utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
                    preferredCountries: ["{{ Country()->country_code }}"],
                });

                window.iti = iti; // Optional: Store the iti instance globally if needed

                phoneInput.addEventListener("countrychange", function() {
                    $(phoneInputId).val('');
                    var dialCode = iti.getSelectedCountryData().dialCode;
                    var country_code = '';
                    var length = 0;
                    var country_id = '';

                    // Find the length and country ID based on the selected dialCode
                    $.each(@json(countries()), function (key, element) {
                        if (element.phone_code.includes(dialCode)) {
                            length = element.length;
                            country_id = element.id;
                            country_code = element.country_code;
                        }
                    });

                    // Update attributes of the input field
                    $(phoneInputId).attr("minlength", length);
                    $(phoneInputId).attr("maxlength", length);
                    $(phoneInputId).attr("size", length);

                    // Construct the placeholder with real numbers based on length
                    // Set placeholder based on country
                    var placeholder = '';
                    switch (dialCode) {
                        case '20': // Egypt
                            placeholder = '1023049763';
                            break;
                        case '966': // Saudi Arabia
                            placeholder = '598364758';
                            break;
                        case '973': // Bahrain
                            placeholder = '39876543';
                            break;
                        default:
                            placeholder = '*'.repeat(length);
                            break;
                    }

                    $(phoneInputId).attr("placeholder", placeholder);

                    // Set hidden fields values
                    $(phoneCodeInputId).val(dialCode);
                    $(countryIdInputId).val(country_code);
                });
            }

            // Initialize phone inputs
            initializePhoneInput("#phone_1", "#phone_code_1", "#country_code_1");
            initializePhoneInput("#phone_2", "#phone_code_2", "#country_code_2");
            initializePhoneInput("#phone_3", "#phone_code_3", "#country_code_3");

            // Add more calls to initializePhoneInput for additional phone input fields
        });
    </script>




    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
        $(document).ready(() => {
            // Selecting elements
            var counterElement = $('.counter');
            var otpElement = $('.otp');
            var resendElement = $('.resend');
            var confirmCreationButton = $('#ConfirmCreation');

            var count = 59;
            var intervalId;
            var initialCount = count;

            function updateCounter() {
                counterElement.text(count);
                count--;
                if (count < 0) {
                    clearInterval(intervalId);
                    otpElement.fadeOut(100, function() {
                        resendElement.fadeIn(1000);
                    });
                }
            }

            // Function to start the countdown
            function startCountdown() {
                count = initialCount;
                counterElement.text(count);
                intervalId = setInterval(updateCounter, 1000); // Set interval only once
            }

            // Event listener for the button click
            confirmCreationButton.on('click', function() {
                startCountdown();
            });

            resendElement.on('click', function() {
                resendElement.fadeOut(100, function() {
                    otpElement.fadeIn(1000);
                    clearInterval(intervalId);
                    startCountdown();
                });
            });
        });
    </script>

    <script src="{{ asset('assets-front/js/Login.js') }}"></script>



@endpush
