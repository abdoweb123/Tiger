<!DOCTYPE html>
<html style="overflow-x: hidden;" lang="{{ lang() }}">

<head>
    @include('client.layouts.css')

    @if (lang() == 'ar')
        <style>
            .toggle-password {
                left: -91%;
                right: 0;
            }
        </style>
    @else

    @endif
</head>

<body style=" overflow-x: hidden; direction:{{ lang('en') ? 'ltr' : 'rtl' }}" >
 @if (Route::currentRouteName() == 'Client.checkout')
 <div class="position-fixed congratulation top-0 start-0 end-0 bottom-0 ">
    <div class="js-container" style="top:0px !important;"></div>
  </div>
 @endif
    {{-- class=" {{ lang('en') ? '' : 'arabicVersion' }}" --}}

@include('client.layouts.navbar')

@yield('content')

@include('client.layouts.footer')

@include('client.layouts.whatsapp')

@include('client.layouts.js')

 <!-- if there is validation_errors -->
 @if (session('validation_errors'))
     <script>
         $(document).ready(function(){
             $('.toggle-password').on('click', function(){
                 var passwordField = $('#password');
                 var passwordFieldType = passwordField.attr('type');
                 if (passwordFieldType === 'password') {
                     passwordField.attr('type', 'text');
                     $(this).removeClass('fa-eye').addClass('fa-eye-slash');
                 } else {
                     passwordField.attr('type', 'password');
                     $(this).removeClass('fa-eye-slash').addClass('fa-eye');
                 }
             });
         });
     </script>
 @endif
</body>

</html>
