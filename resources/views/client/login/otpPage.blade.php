@extends('client.layouts.layout')
@section('content')
<div class="container-fluid section-top ">
  <div class="row">
    <div class="col-lg-6 col-12 ">
        <div class="h-100 w-100 d-flex justify-content-center align-items-center">

            <form action="{{ route('Client.sendOtp') }}" method="POST" class="w-75 send-mail">
                @csrf
                <h6 class="text-secondary">@lang('trans.SECOND STEP/2')</h6>
                <h4 class=" py-3 mb-0 fw-bold header-div d-flex gap-2 align-items-center">@lang('trans.Reset Password')</h4>
                <h6 class="text-secondary mb-lg-3 mb-1">@lang('trans.Please enter reset password code below that was sent to you')</h6>
                <label for="otp" class="form-label ">@lang('trans.code')</label>
                <input type="hidden" name="ssh" value="{{ $id }}">
                <div class="mb-3 d-flex gap-2">
                    <input name="digit1" type="text" class="form-control rounded-2 border border-2 py-3 code-input"
                        aria-describedby="OtpInput" maxlength="1">
                    <input name="digit2" type="text" class="form-control rounded-2 border border-2 py-3 code-input"
                        aria-describedby="OtpInput" maxlength="1">
                    <input name="digit3" type="text" class="form-control rounded-2 border border-2 py-3 code-input"
                        aria-describedby="OtpInput" maxlength="1">
                    <input name="digit4" type="text" class="form-control rounded-2 border border-2 py-3 code-input"
                        aria-describedby="OtpInput" maxlength="1">
                    <input name="digit5" type="text" class="form-control rounded-2 border border-2 py-3 code-input"
                        aria-describedby="OtpInput" maxlength="1">
                    <input name="digit6" type="text" class="form-control rounded-2 border border-2 py-3 code-input"
                        aria-describedby="OtpInput" maxlength="1">

                </div>
                <div class="otp fs-4 pb-4"> @lang('trans.Resend otp within')
                    <span class="counter">60</span>
                    <span>@lang('trans.seconds')</span>
                </div>

                <!-- <div class="mb-3 form-check">
                                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                              </div> -->

                <button type="submit" class="btn btn-send btn-dark btn text-white px-5 py-2 mb-3 w-100 "
                >@lang('trans.confirm')</button>
                <div class="d-flex justify-content-center">
                    <a type="button" class="text-secondary fs-3 py-2 fw-medium text-decoration-underline resend">
                        @lang('trans.Resent code again')
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-6 p-0 col-12 h-auto">
        <img src="{{ asset('assets-front/imgs/home/e37b241538f2d8febac99dfa76d61d23.jpg') }}" class="img-fluid">
    </div>
</div>
</div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const codeInputs = document.querySelectorAll('.code-input');

            codeInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    if (this.value.length === 1) {
                        if (index < codeInputs.length - 1) {
                            codeInputs[index + 1].focus();
                        }
                    }
                });

                // Prevent inputs from exceeding 1 character
                input.addEventListener('keypress', function(e) {
                    if (this.value.length >= 1) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(() => {
            // Selecting elements
            var counterElement = $('.counter');
            var otpElement = $('.otp');
            var resendElement = $('.resend');
            var confirmCreationButton = $('#ConfirmCreation');

            var count = 60;
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
            startCountdown();

            // Function to start the countdown
            function startCountdown() {
                count = initialCount;
                counterElement.text(count);
                intervalId = setInterval(updateCounter, 1000); // Set interval only once
            }

            // Event listener for the button click
            resendElement.on('click', function() {
                resendElement.fadeOut(100, function() {
                    otpElement.fadeIn(1000);
                    clearInterval(intervalId);
                    startCountdown();
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const codeInputs = document.querySelectorAll('.code-input');

            codeInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    if (this.value.length === 1) {
                        if (index < codeInputs.length - 1) {
                            codeInputs[index + 1].focus();
                        }
                    }
                });

                // Prevent inputs from exceeding 1 character
                input.addEventListener('keypress', function(e) {
                    if (this.value.length >= 1) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
    <script>
        $('.resend').on('click', function() {
            var client_id = "{{ $id }}";
            //  console.log(client_id)

            $.ajax({
                url: '{{ route('Client.resend') }}',
                type: "POST",
                data: {
                    ssh: client_id,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(response) {
                    // Handle the response
                    console.log(1);

                    // count = 60
                    // otpElement.fadeOut(1000);
                    // clearInterval(intervalId);
                    // startCountdown();
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    // console.log(5)
                    console.error(xhr.responseText);
                }
            })
        })
    </script>
@endpush