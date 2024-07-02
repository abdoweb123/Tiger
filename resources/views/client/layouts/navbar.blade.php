    {{-- loader Amimation --}}
    <div
        class="loading-screen  position-fixed top-0 start-0 end-0 bottom-0 bg-white justify-content-center align-items-center">
        <img src="{{ asset('assets-front/imgs/home/Animation - 1714427318282.gif') }}">
    </div>
    {{-- loader Amimation --}}


 
    <!-- Navebar -->
    <div class=" navContainer">
        {{-- black google and number navbar --}}
        <nav class="bg-primary-color shadow-sm py-2">
            <div class="container nav d-block  navbar-expand-lg  ">
                <div class="row align-items-center  justify-content-lg-between  text-white">
                    <div class="col-lg-6 col-4 d-lg-flex align-items-center d-none">
                        <ul class="social d-flex px-0 mb-0">
                            <li>
                                <a href="{{ setting('facebook') }}">
                                    <i class="fab fa-facebook-f icon"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ setting('twitter') }}"><i class="fab fa-twitter icon"></i></a>
                            </li>
                            <li>
                                <a href="{{ setting('instagram') }}"><i class="fa-brands fa-instagram icon">
                                    </i></a>
                            </li>
                            <li>
                                <a href="tel:{{ setting('phone') }}"><i class="fa-brands fa-whatsapp icon"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-12 ">

                        <div class=" d-flex justify-content-lg-between align-items-center justify-content-between">
                            <div class="dropdown ">
                                <button class="btn border text-white fw-semibold rounded-2 border-1 px-lg-1 px-0 dropdown-toggle "
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="px-2">
                                    <img src="{{asset(Country()->image)}}" alt="" width="35" height="25" />
                                    </span>
                                    
                                        {{Country()['title_'.lang()]}}
                                </button>
                                <ul class="dropdown-menu py-lg-3 py-0 ">
                                    @foreach(Countries() as $country)
                                    <li class="py-1 border-bottom">
                                        <a class="dropdown-item d-flex rounded-0 border-0" href="{{route('Client.changeCountry',$country['id'])}}">
                                        <span class="">
                                            <img src="{{asset($country->image)}}" alt="" width="35" height="25" class="mx-2" />
                                        </span>
                                        <span>{{$country['title_'.lang()]}}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            
                            @if (!Auth::guard('client')->check())
                            <div class="px-2 LanguageMenu" role="button">
                                <a href="{{route('lang',lang() == 'ar'? 'en' : 'ar')}}"
                                    class=" btn-book rounded-5 py-1 text-white d-flex align-items-center text-decoration-none fs-7 d-none d-lg-flex">
                                    <span class="lan" id="LanguageText">
                                        {{ lang() == 'ar'? 'English' : 'العربية'}}
                                    </span>
                                    <span class="px-2">
                                        <img src="{{ asset('assets-front/imgs/home/translate.png') }}">
                                    </span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        {{-- black google and number navbar --}}
        <nav class=" bg-white shadow-sm py-2">
            <div class="container nav d-block  navbar-expand-lg bg-body-tertiary ">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-1 d-lg-block d-none">
                        <a class="navbar-brand  py-2 text-center  m-0" href="{{ route('Client.home') }}">
                            <img class=" w-100" src="{{ setting('logo') }}" />
                        </a>
                    </div>
                    <div class="col-lg-8 col-2 ">
                        <div class="container-fluid nav-container">
                            <a class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                                aria-label="Toggle navigation">
                                <i class="fa-solid fa-bars text-dark fs-3"></i>

                            </a>
                            {{-- sidebar --}}
                            @include('client.layouts.sidebar')
                            {{-- sidebar --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-10">
                        @if(auth('client')->check())
                        {{-- {{ Auth::user()->first_name }} --}}
                        <div class="d-flex justify-content-end gap-3">
                            <div class="p-2 rounded-1 bg-gray">
                                    <a href="{{route('Client.account')}}" class="header__icon text-decoration-none text-black header__icon--account link focus-inset small-hide">
                                            <i class="fa-regular fa-user fs-5 mx-1"></i>
                                        </a>
                            </div>
                            <div class="p-2 rounded-1 bg-gray" 
                                role="button">
                                <a href="{{route('Client.getWishlist')}}" class="header__icon text-decoration-none  text-black header__icon--account link focus-inset small-hide position-relative"> 
                                    <i class="fa-regular fa-heart fs-5 mx-1">
                                        <span class="icon-number position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 8px;">
                                            {{count(Wishlist())?? 0 }}
                                        </span>
                                    </i>
                                </a>
                            </div>
                            <div class="p-2 rounded-1 bg-gray">
                                    <a href="{{route('Client.getCart')}}" class="header__icon text-decoration-none mx-2 text-black header__icon--account link focus-inset small-hide position-relative">
                                        <i class="fas fa-shopping-bag fs-5 mx-1">
                                             <span class="icon-number position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 8px; font-style:normal">{{cart_count()??0}}</span>
                                        </i>
                                    </a>
                                </a>
                            </div>
                            
                        </div>
                        @else
                        <div class="d-flex align-items-center justify-content-end"> 
                            <div class="d-flex gap-3">
                                <a href="{{ route('Client.login') }}"  id="RegisterPageMain" class="btn btn-outline-dark border px-lg-4 px-2"
                                    >@lang('trans.Sign Up')</a>
                                <a href="{{ route('Client.login') }}" id = "LogInPageMain" class="btn btn-dark text-white px-lg-4 px-2 GoToLogInPageButton"
                                    >@lang('trans.login')</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>






            </div>
        </nav>
    </div>
    <!-- Navebar -->
    @push('js')
    @endpush
