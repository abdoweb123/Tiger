@extends('client.layouts.layout')
@section('content')
    <div class="container my-5">
        <div class="row d-flex justify-content-center flex-column align-items-center">
            <img class="w-img-popup" src="{{ asset('assets-front/imgs/home/3e3805322fb5a260f8adeeeb71628219.gif') }}" />
            <p class="fs-5 fw-semibold text-center">Thank you!</p>
            <p class="fs-6 fw-semibold  text-secondary text-center">Your order was placed successfully</p>
            <div class="py-2">
                <p class=" d-flex justify-content-center">
                    <span class="px-2">Your order number: {{ $Order->id }}</span>
                </p>
                <p class="  d-flex justify-content-center">
                    <span class="px-2">Order date: {{ \Carbon\Carbon::now()->format('d M, Y') }} </span>
                    
                </p>
            </div>
            <a href="allProducts.html"
                class="text-black text-decoration-underline text-center  m-auto  gap-2 my-2  py-2">Continue shopping</a>
        </div>
    </div>
@endsection
@push('js')
    

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
  integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
  crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
  integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A=="
  crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
  integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


<script>

  AOS.init({
    once: true
  })
</script>
@endpush