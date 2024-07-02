<div id="footer">
    <footer>
        <div class="container py-5">
            <div class="row justify-content-between" data-aos="fade-up">
                <div class="col-md-4 col-12 text-white ">
                    <h4 class="">@lang('trans.About Us')</h4>
{{--                    <div style="color: white !important;">{!! setting('about_'.lang()) !!}</div>--}}
                    <div style="color: white !important;">
                        <?php
                        $aboutText = setting('about_'.lang());
                        $excerpt = getExcerpt($aboutText,20);
                        ?>
                        {!! $excerpt !!}
                        @if(strlen(strip_tags($aboutText)) > strlen(strip_tags($excerpt)))
                            <a href="#" style="color: #ffffff;">see more</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-12 ">
                    <h4 class="">Overview</h4>

                    <ul class="p-0 fs-6 list-footer">
                        <li class="py-1">
                            <a href="filterProducts.html">
                                Shop
                            </a>
                        </li>
                        <li class="py-1">
                            <a href="FAQ.html">
                                FQA
                            </a>
                        </li>
                        <li class="py-1">
                            <a href="NewCollection.html">
                                New Collection
                            </a>
                        </li>
                        <li class="py-1">
                            <a href="contactus.html">
                                Contact us
                            </a>
                        </li>
                        <li class="py-1">
                            <a href="offers.html">
                                Best Offers
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-12 ">
                    <h4 class="">contact us</h4>

                    <ul class="p-0 fs-6 list-footer">
                        <li class="py-1 w-100">
                            <a href="tel:(+973) 55642310">
                                Phone Number: (+973) 55642310
                            </a>
                        </li>
                        <li class="py-1 w-100">
                            <a href="mailto:Tiger1234@gmail.com">
                                Email: Tiger1234@gmail.com
                            </a>
                        </li>
                        <li class="py-1 w-100">
                            <a href="1101,123,05 Bahrain">
                                Address: 1101,123,05 Bahrain
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-12 px-0">
                    <ul class="social d-flex p-0">
                        <li>
                            <a href="{{ setting('facebook') }}" target="_blank">
                                <i class="fab fa-facebook-f icon"></i>
                            </a>
                        </li>

                        <li>
                            <a href="{{ setting('instagram') }}" target="_blank">
                                <i class="fa-brands fa-instagram icon">
                                </i></a>
                        </li>
                        <li>
                            <a href="{{ setting('twitter') }}" target="_blank">
                                <i class="fab fa-twitter icon"></i></a>
                        </li>

                        <li>
                            <a href="{{ setting('whatsapp') }}" target="_blank">
                                <i class="fab fa-twitter icon"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container py-3">


            <div class="row justify-content-center border-top border-light text-white-50 py-4 fw-medium gy-3">
                <div class="col-md-4 col-12 text-center fs-6   ">
                    © 2024 <a class="" href="https://emcan-group.com/en"> Tiger</a>. All right reserved.
                </div>
                <div class="col-md-4 col-12 text-center  emcan">
                    Powared by<span class=""> <a style="color:#CE1126;opacity: 1;"
                            href="https://emcan-group.com/en">Emcan Solutions</a> </span>
                </div>
                <div class="col-md-4 col-12 text-center  emcan">
                    <ul class="p-0 fs-6 list-footer list-data-footer">
                        <li class="py-1">
                            <a href="Terms.html">
                                Terms & Conditions
                            </a>
                        </li>
                        <li class="py-1">
                            <a href="privacy.html">
                                Privacy Policy
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </footer>

</div>
