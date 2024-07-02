@extends('client.layouts.layout')

@section('content')
    <div class="container my-lg-5 my-3 section-top">
        <div class="row align-items-center py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="index.html">home</a>
                    </li>
                    <li class="breadcrumb-item fw-semibold" aria-current="page">Write Review</li>
                </ol>
            </nav>
        </div>
        <h4 class="py-3 mb-0 fw-semibold d-flex gap-2 align-items-center"><span>Write Review</span></h4>

        <div class="row py-2 justify-content-between">
            <div class="col-12">
                <form method="POST" action="{{ route('Client.ClientReview') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="client_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="star" id="star" value="1"> <!-- Hidden input to store rating -->
                    
                    <div class="row table-row gy-5 py-2">
                        <div class="col-12 text-center">
                            <label for="opinion" class="form-label fs-5">TELL US ABOUT YOUR OPINION</label>
                            <div class="d-flex justify-content-center mb-3">
                                <span id="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                             class="star" data-rating="{{ $i }}" fill="none" viewBox="0 0 20 20">
                                            <path d="M9.09459 2.67704C9.45471 1.91058 10.545 1.91073 10.9049 2.67729L12.6322 6.35641C12.7737 6.65774 13.0559 6.86892 13.3848 6.91971L17.3294 7.52872C18.1333 7.65283 18.4606 8.63367 17.8923 9.21564L14.9781 12.2002C14.7561 12.4276 14.6554 12.747 14.7068 13.0606L15.3879 17.2153C15.523 18.0395 14.648 18.6564 13.9171 18.2522L10.489 16.3564C10.1881 16.19 9.8228 16.1898 9.52178 16.356L6.08622 18.2524C5.35533 18.6558 4.48108 18.039 4.61614 17.2151L5.29759 13.0585C5.34902 12.7448 5.24823 12.4253 5.02608 12.198L2.1084 9.21134C1.53992 8.62943 1.86715 7.64838 2.67113 7.52425L6.61533 6.9153C6.94423 6.86452 7.22631 6.65345 7.36783 6.35225L9.09459 2.67704Z"
                                                  fill="{{ $i == 1 ? '#F9A000' : '#9D9D9D' }}"></path>
                                        </svg>
                                    @endfor
                                </span>
                            </div>
                        </div>
                
                        <div class="col-12 text-center">
                            <label for="experience" class="form-label fs-5">TELL US ABOUT YOUR EXPERIENCE</label>
                            <textarea class="form-control rounded-1 bg-gray border-0" name="comment" style="resize: none;" placeholder="write here"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center my-3">
                                <div class="d-flex gap-3">
                                    <button class="btn btn-dark text-white px-lg-5 px-2 w-auto" type="submit">Submit Review</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const stars = document.querySelectorAll('.star');
                        const starInput = document.getElementById('star');

                        function updateStars(rating) {
                            // Reset the fill of all stars
                            stars.forEach(s => s.querySelector('path').setAttribute('fill', '#9D9D9D'));

                            // Fill the selected stars
                            for (let i = 0; i < rating; i++) {
                                stars[i].querySelector('path').setAttribute('fill', '#F9A000');
                            }
                        }

                        // Initialize with one star filled
                        updateStars(1);

                        stars.forEach(star => {
                            star.addEventListener('click', function () {
                                const rating = this.getAttribute('data-rating');
                                starInput.value = rating;

                                updateStars(rating);
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
