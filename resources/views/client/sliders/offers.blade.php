{{-- offers section --}}
<div class="container session-offers my-5" data-aos="fade-up">
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <h3 class="py-4 fw-semibold">@lang('trans.offers_section')</h3>
        </div>
    </div>
    <div class="row ">
        <div class=" slider1 slider-title regular ">
            {{-- {{ dd($services) }} --}}
            @foreach ($services as $slider)
                <div class=" p-2 ">
                    <a href="detailsPage.html">
                        <div class="card mb-3 border-0">
                            <div class="row g-0 p-2 align-items-center">
                                <div class="col-md-5">
                                    <div class="card-body text-center">
                                        {!! $slider->desc() !!}
                                        <p class="card-text">
                                            <a class="card-text text-danger text-decoration-underline"
                                                href="{{ route('Client.offers') }}">@lang('trans.find_out_more')</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="img-card-container">
                                        <img src="{{ asset($slider->file) }}" class="h-auto w-100" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</div>

{{-- offers section --}}
