<div class="offcanvas offcanvas-start bg-white" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
            <a class="navbar-brand  py-2 text-center  m-0" href="{{ route('Client.home') }}">
                <img class="m-0" width="100" src="{{ setting('logo') }}" />
            </a>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body header ">
        <ul class="navbar-nav w-100  mb-2 mb-lg-0 justify-content-between align-items-lg-center">

            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'Client.home' ? 'active' : '' }}" aria-current="page" href="{{ route('Client.home') }}">
                    <span class="">
                        @lang('trans.home')
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="allProducts.html">
                    <span class="">Shop</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'Client.newCollection' ? 'active' : '' }}" aria-current="page" href="{{ route('Client.newCollection') }}"><span class="">new
                        collection</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ route('Client.offers') }}"><span class="">Offers</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="contactus.html"><span class="">Contact
                        Us</span></a>
            </li>

            <li class="nav-item">
                <form class=" my-2 my-lg-0 w-100 " action="{{ route('Client.searchProducts') }}"
                    dir="ltr">
                    <div class="position-relative w-auto">
                        <input class="form-control  mr-sm-2 rounded-pill" type="text" placeholder="Search" name="search_product"
                            aria-label="Search">
                 <button class="btn btn-search  px-3 rounded-pill position-absolute  end-0"
                            type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </li>
            <li class="nav-item d-lg-none d-block">
                <ul class="social d-flex px-0 mb-0">
                    <li>
                        <a href="#">
                            <i class="fab fa-facebook-f icon"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-twitter icon"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-instagram icon">
                            </i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-whatsapp icon"></i></a>

                    </li>
                </ul>
            </li>

        </ul>

    </div>
</div>
