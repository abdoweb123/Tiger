@extends('client.layouts.layout')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>

    </style>
@stop

@section('content')
<div class="container-fluid section-top ">
    <div class="row">
        {{-- <h3></h3> --}}
        <div class="col-lg-6 col-12" >
            <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                <form action="{{ route('Client.restPassword') }}" class=" w-75 py-5" method="POST">
                    @csrf
                    {{-- <h6 class="text-secondary">@lang('trans.WelcomeBack')</h6> --}}
                    <h4 class="py-3 mb-0 header-div fw-bold d-flex gap-2 align-items-center">
                        @lang('trans.Reset Password')
                    </h4>
                    <div class="mb-3">
                        <label for="phone" class="form-label">@lang('trans.password')</label>
                        <div class="input-group mb-3">
                            <input type="hidden" name="ssh" value="{{ $id }}">
                            <input type="password" name="password" id="phone" class="form-control rounded-1 bg-gray border-0 phone" placeholder="@lang('trans.password')" required />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">
                            <span> @lang('trans.password')</span>
                        </label>
                        <div class="mb-5 password-container">
                            <input type="password" name="password_confirmation" class="form-control rounded-1 border-0 py-2 bg-gray"
                            placeholder="@lang('trans.confirmPassword')" required />
{{--                             <button class="toggle-password TogglePasswordBtns" tabindex="-1" type="button">--}}
{{--                                 <i class="fa fa-eye toggle-password"></i>--}}
{{--                            </button>--}}
                        </div>
                    </div>
                    <!-- <div class="mb-3 form-check">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                      </div> -->
                    <div class="col-12">
                        <button class="btn-dark btn text-white px-5 py-2 mb-3 w-100">
                            @lang('trans.Reset Password')
                        </button>
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
