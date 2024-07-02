<div class="container section-top  my-lg-5 my-3">
    <div class="row gap-5">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="row">
                <h4 class=" py-3 mb-0 fw-semibold">REVIEWS</h4>

                <div class="col-12 py-2 d-flex gap-2 ">
                    <span class="fw-bold lh-lg">{{ $ratingRound }}</span>

                    <div class="d-flex gap-2 flex-column">
                        <span>
                            @for ($i = 0; $i < $averageRating; $i++)
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M9.09459 2.67704C9.45471 1.91058 10.545 1.91073 10.9049 2.67729L12.6322 6.35641C12.7737 6.65774 13.0559 6.86892 13.3848 6.91971L17.3294 7.52872C18.1333 7.65283 18.4606 8.63367 17.8923 9.21564L14.9781 12.2002C14.7561 12.4276 14.6554 12.747 14.7068 13.0606L15.3879 17.2153C15.523 18.0395 14.648 18.6564 13.9171 18.2522L10.489 16.3564C10.1881 16.19 9.8228 16.1898 9.52178 16.356L6.08622 18.2524C5.35533 18.6558 4.48108 18.039 4.61614 17.2151L5.29759 13.0585C5.34902 12.7448 5.24823 12.4253 5.02608 12.198L2.1084 9.21134C1.53992 8.62943 1.86715 7.64838 2.67113 7.52425L6.61533 6.9153C6.94423 6.86452 7.22631 6.65345 7.36783 6.35225L9.09459 2.67704Z"
                                            fill="#F9A000"></path>
                                    </svg>
                            @endfor
                            @for ($i = $averageRating; $i < 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" class="gray-icon" width="20" height="20"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.09459 2.67704C9.45471 1.91058 10.545 1.91073 10.9049 2.67729L12.6322 6.35641C12.7737 6.65774 13.0559 6.86892 13.3848 6.91971L17.3294 7.52872C18.1333 7.65283 18.4606 8.63367 17.8923 9.21564L14.9781 12.2002C14.7561 12.4276 14.6554 12.747 14.7068 13.0606L15.3879 17.2153C15.523 18.0395 14.648 18.6564 13.9171 18.2522L10.489 16.3564C10.1881 16.19 9.8228 16.1898 9.52178 16.356L6.08622 18.2524C5.35533 18.6558 4.48108 18.039 4.61614 17.2151L5.29759 13.0585C5.34902 12.7448 5.24823 12.4253 5.02608 12.198L2.1084 9.21134C1.53992 8.62943 1.86715 7.64838 2.67113 7.52425L6.61533 6.9153C6.94423 6.86452 7.22631 6.65345 7.36783 6.35225L9.09459 2.67704Z"
                                        fill="#9D9D9D" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            @endfor
                        </span>
                        <span class="fw-medium small">
                            Based on {{ $totalReviews }} customer reviews
                        </span>
                    </div>
                </div>

                {{-- @foreach ($ratingsCount as $rating => $count)
                <div class="col-12 fw-normal py-2">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-12 d-flex align-items-baseline">
                            <span class="ratenum">{{ $rating }}</span>
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M9.09459 2.67704C9.45471 1.91058 10.545 1.91073 10.9049 2.67729L12.6322 6.35641C12.7737 6.65774 13.0559 6.86892 13.3848 6.91971L17.3294 7.52872C18.1333 7.65283 18.4606 8.63367 17.8923 9.21564L14.9781 12.2002C14.7561 12.4276 14.6554 12.747 14.7068 13.0606L15.3879 17.2153C15.523 18.0395 14.648 18.6564 13.9171 18.2522L10.489 16.3564C10.1881 16.19 9.8228 16.1898 9.52178 16.356L6.08622 18.2524C5.35533 18.6558 4.48108 18.039 4.61614 17.2151L5.29759 13.0585C5.34902 12.7448 5.24823 12.4253 5.02608 12.198L2.1084 9.21134C1.53992 8.62943 1.86715 7.64838 2.67113 7.52425L6.61533 6.9153C6.94423 6.86452 7.22631 6.65345 7.36783 6.35225L9.09459 2.67704Z"
                                        fill="#000000" />
                                </svg>
                            </div>
                        </div>

                        <div class="col-lg-9 col-10">
                            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="50">
                                <div class="progress-bar  bg-black" style="width: 90%"></div>
                            </div>
                        </div>

                        <div class="col-2">
                            <span>{{ $count }}</span>
                        </div>
                    </div>
                </div>
                @endforeach --}}

                @foreach ($ratingsCount as $rating => $count)
                    <div class="col-12 fw-normal py-2">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-12 d-flex align-items-baseline">
                                <span class="ratenum">{{ $rating }}</span>
                                <div class="d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M9.09459 2.67704C9.45471 1.91058 10.545 1.91073 10.9049 2.67729L12.6322 6.35641C12.7737 6.65774 13.0559 6.86892 13.3848 6.91971L17.3294 7.52872C18.1333 7.65283 18.4606 8.63367 17.8923 9.21564L14.9781 12.2002C14.7561 12.4276 14.6554 12.747 14.7068 13.0606L15.3879 17.2153C15.523 18.0395 14.648 18.6564 13.9171 18.2522L10.489 16.3564C10.1881 16.19 9.8228 16.1898 9.52178 16.356L6.08622 18.2524C5.35533 18.6558 4.48108 18.039 4.61614 17.2151L5.29759 13.0585C5.34902 12.7448 5.24823 12.4253 5.02608 12.198L2.1084 9.21134C1.53992 8.62943 1.86715 7.64838 2.67113 7.52425L6.61533 6.9153C6.94423 6.86452 7.22631 6.65345 7.36783 6.35225L9.09459 2.67704Z"
                                            fill="#000000" />
                                    </svg>
                                </div>
                            </div>

                            <div class="col-lg-9 col-10">
                                @php
                                    // $maxCount = 500; // Define your maximum count here
                                    if ($totalReviews == 0) {
                                        $percentage=0;
                                    }else{
                                        $percentage = ($count / $totalReviews) * 100;
                                    }
                                   
                                @endphp
                                <div class="progress" role="progressbar" aria-label="Basic example"
                                    aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-black" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>

                            <div class="col-2">
                                <span>{{ $count }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="col-12">
                    <a href="{{ route('Client.reviewView', $product->id) }}" type="button"
                        class="btn btn-dark  text-decoration-none px-5 text-white w-100 rounded-1 py-2 explore d-flex justify-content-center align-items-center m-auto">Write
                        A Review</a>
                </div>
            </div>
        </div>

        <div class="col-lg-7 col-md-6 col-12">
            <div class="">
                <h4 class=" py-3 mb-0 fw-semibold">CUSTOMER REVIEWS</h4>

                @foreach ($clientReviews as $review)
                    <div class="row py-2">
                        <div class="col-12 py-2 d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column">
                                <span class="fw-semibold">{{ $review->Client->first_name }}
                                    {{ $review->Client->last_name }}
                                </span>
                                <span>
                                    @for ($i = 0; $i < $review->rate; $i++)
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M9.09459 2.67704C9.45471 1.91058 10.545 1.91073 10.9049 2.67729L12.6322 6.35641C12.7737 6.65774 13.0559 6.86892 13.3848 6.91971L17.3294 7.52872C18.1333 7.65283 18.4606 8.63367 17.8923 9.21564L14.9781 12.2002C14.7561 12.4276 14.6554 12.747 14.7068 13.0606L15.3879 17.2153C15.523 18.0395 14.648 18.6564 13.9171 18.2522L10.489 16.3564C10.1881 16.19 9.8228 16.1898 9.52178 16.356L6.08622 18.2524C5.35533 18.6558 4.48108 18.039 4.61614 17.2151L5.29759 13.0585C5.34902 12.7448 5.24823 12.4253 5.02608 12.198L2.1084 9.21134C1.53992 8.62943 1.86715 7.64838 2.67113 7.52425L6.61533 6.9153C6.94423 6.86452 7.22631 6.65345 7.36783 6.35225L9.09459 2.67704Z"
                                                    fill="#F9A000"></path>
                                            </svg>
                                    @endfor
                                    @for ($i = $review->rate; $i < 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="gray-icon" width="20"
                                            height="20" viewBox="0 0 20 20">
                                            <path
                                                d="M9.09459 2.67704C9.45471 1.91058 10.545 1.91073 10.9049 2.67729L12.6322 6.35641C12.7737 6.65774 13.0559 6.86892 13.3848 6.91971L17.3294 7.52872C18.1333 7.65283 18.4606 8.63367 17.8923 9.21564L14.9781 12.2002C14.7561 12.4276 14.6554 12.747 14.7068 13.0606L15.3879 17.2153C15.523 18.0395 14.648 18.6564 13.9171 18.2522L10.489 16.3564C10.1881 16.19 9.8228 16.1898 9.52178 16.356L6.08622 18.2524C5.35533 18.6558 4.48108 18.039 4.61614 17.2151L5.29759 13.0585C5.34902 12.7448 5.24823 12.4253 5.02608 12.198L2.1084 9.21134C1.53992 8.62943 1.86715 7.64838 2.67113 7.52425L6.61533 6.9153C6.94423 6.86452 7.22631 6.65345 7.36783 6.35225L9.09459 2.67704Z"
                                                stroke="#9D9D9D" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    @endfor
                                </span>
                            </div>
                            <div>
                                <span class="text-secondary">{{ \Carbon\Carbon::now()->format('d M, Y') }}</span>
                            </div>
                        </div>
                        <div class="col-10 ">
                            <p>
                                {{ $review->comment }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- {{ $clientReviews->links() }} --}}
            <ul class="pagination justify-content-center">

                @if ($clientReviews->hasPages())
                    <li class="page-item bg-">
                        {{ $clientReviews->withQueryString()->links('pagination::bootstrap-4') }}
                    </li>
                    <style>
                        .page-item .page-link {
                            color: black;
                            /* Change button text color to black */
                        }

                        .page-item.active .page-link {
                            background-color: red;
                            border: #ccc;
                            /* Change background color of active button to black */
                        }
                    </style>
                @endif


            </ul>
        </div>
        {{-- {{ dd($reviews) }} --}}
    </div>
</div>
