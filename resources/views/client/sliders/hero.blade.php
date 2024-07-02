{{-- hero section --}}
{{-- {{ dd($carouselItems) }} --}}
<div class="container-fluid mb-5 section-top">
    <div class="row">
        <div id="carouselExampleDark" class="carousel carousel-dark slide p-0">
            <div class="carousel-indicators">
                @foreach($carouselItems as $key => $item)
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key }}" @if($loop->first) class="active" @endif aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner ">
                @foreach($carouselItems as $key => $item)
                <div class="carousel-item @if($loop->first) active @endif " >
                    <div class="img-slider d-flex align-items-center justify-content-center">
                        <img src="{{ asset( $item->file ) }}" class="d-block w-100" alt="...">
                    </div>

                    <div class="carousel-caption text-white d-md-block">
                        {!! $item->desc() !!}

                        <a class="bg-red text-decoration-none text-white fw-semibold rounded-1 py-2 explore d-flex justify-content-center align-items-center m-auto my-5"
                            href="aboutUs.html">@lang('trans.more_about')</a>
                    </div>
                </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </div>
</div>
{{-- hero section --}}