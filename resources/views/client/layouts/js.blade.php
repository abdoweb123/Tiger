<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
    integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="{{ asset('assets-front/js/index.js') }}"></script>
<script src="{{ asset('assets-front/js/LogIn.Js') }}"></script>


{{-- js lang need edits as php & the slider edits in human-assets files --}}
<script>
    AOS.init({
        once: true
    })
    var lang = localStorage.getItem('Language');
    var Diriction = false;

    //if (lang == "العربية") {
      //  Diriction = true;
    //}
    @if (lang('ar'))
        Diriction = true;
    @endif

    document.addEventListener('DOMContentLoaded', function() {
        var seeAllProductLinks = document.querySelectorAll('.seeall-product');

        seeAllProductLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                console.log("hi");

                var container = this.closest('.container');
                var h3Element = container.querySelector('h3');
                var activeLinkText = h3Element.textContent.trim();
                localStorage.setItem('activeLinkText', activeLinkText);
            });
        });
    });

    $(".slider1").slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        dots: true,
        rtl: Diriction,
        autoplaySpeed: 1000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    infinite: true,
                },
            },
            {
                breakpoint: 719,
                settings: {
                    slidesToShow: 1,
                },
            }
        ],
    });

    $(".slider2").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        rtl: Diriction,
        autoplaySpeed: 1000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    infinite: true,
                },
            },
            {
                breakpoint: 919,
                settings: {
                    slidesToShow: 2,
                },
            }, {
                breakpoint: 619,
                settings: {
                    slidesToShow: 1,
                },
            }
        ],
    });
    $(".slider3").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        rtl: Diriction,
        arrows: false,
        autoplaySpeed: 1000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    infinite: true,
                },
            },
            {
                breakpoint: 919,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 619,
                settings: {
                    slidesToShow: 1,
                },
            }
        ],
    });
    $(".slider4").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        rtl: Diriction,
        arrows: false,
        autoplaySpeed: 1000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    infinite: true,
                },
            },
            {
                breakpoint: 919,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 619,
                settings: {
                    slidesToShow: 1,
                },
            }
        ],
    });

    $(document).on("click", ".list-group-item .toggle", function() {
        $(this).parent().find('ul').toggleClass('d-none');
    });

    //     document.addEventListener('DOMContentLoaded', function () {

    // function handleButtonClick(buttons, currentButton) {
    //   buttons.forEach(btn => {
    //     if (btn !== currentButton) {
    //       btn.classList.remove('active');
    //     }
    //   });
    //   currentButton.classList.toggle('active');
    // }

    // const filterButtons = document.querySelectorAll('.filter-button');
    // filterButtons.forEach(button => {
    //   button.addEventListener('click', function () {
    //     handleButtonClick(filterButtons, this);
    //   });
    // });


    // });

    document.addEventListener("DOMContentLoaded", function() {
        const productCards = document.querySelectorAll('.slider-title .card');

        function initializeProductCard(card) {
            const colorButtons = card.querySelectorAll('.color');

            const defaultButton = Array.from(colorButtons).find(button => button.classList.contains('active'));
            if (defaultButton) {
                changeProductImage(defaultButton, card);
            }

            colorButtons.forEach(button => {
                button.addEventListener('click', function() {
                    handleButtonClick(colorButtons, this);
                    changeProductImage(this, card);
                });
            });
        }

        function handleButtonClick(buttons, currentButton) {
            buttons.forEach(btn => {
                if (btn !== currentButton) {
                    btn.classList.remove('active');
                }
            });
            currentButton.classList.toggle('active');
        }

        function changeProductImage(button, card) {
            const newImageSrc = button.getAttribute('data-img');
            const productImage = card.querySelector('.img-card img');
            productImage.src = newImageSrc;
        }

        // Initialize each product card
        productCards.forEach(card => {
            initializeProductCard(card);
        });
    });
    $(document).ready(() => {
        $(".loading-screen").fadeOut(3000);
    });
</script>
{{-- js lang need edits as php & the slider edits in human-assets files --}}

{{-- love handle --}}
<script>

    @if (lang('en'))
        document.body.classList.remove("arabicVersion");
    @else
        document.body.classList.add("arabicVersion");
        console.log('dina');
    @endif

</script>
{{-- love handle --}}

<!--====== BACK TO TP PART ENDS ======-->

<!-- JS Files -->
<!-- animation library js file -->
<script src="{{asset('assets_client/aos/aos.js')}}"></script>
<!-- bootstrap js file -->
<script src="{{asset('assets_client/js/bootstrap.bundle.min.js')}}"></script>
<!-- swiper js file -->
<script src="{{asset('assets_client/swiper/swiper-bundle.min.js')}}"></script>
<!-- main js file -->
<script src="{{asset('assets_client/js/script.js')}}"></script>
<!--====== Slick js ======-->
<script src="{{asset('assets_client/js/slick.min.js')}}"></script>
<script src="{{asset('assets_client/js/slick.js')}}"></script>

<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  // Get the data passed from the session
  var success = {!! json_encode(session('success')) !!};
  var type = {!! json_encode(session('type')) !!};
  var message = {!! json_encode(session('message')) !!};
  var cart_count = {!! json_encode(session('cart_count')) !!};

  let textMessage = '';
  // Check if cart_count is not empty
  if (cart_count) {
    // If cart_count is not empty, concatenate it with the label
    textMessage = '@lang('trans.cart_count')' + ' : ' + cart_count;
  } else {
    // If cart_count is empty, display a different message
    textMessage = '';
  }

  // Display SweetAlert based on the session data
  if (success) {
    Swal.fire({
      icon: type,
      title: message,
      text: textMessage,
      showConfirmButton: true,
      // timer: 1500 // Display duration in milliseconds
    });
  }
</script>

<!-- Start Add tostr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  // Check if there are any toast messages from the backend
  @if(session('toast_message'))
  // Display the toast message using Toastr
  toastr.{{ session('toast_message')['type'] }}('{{ session('toast_message')['message'] }}');
  @endif
</script>
<!-- End Add tostr -->



<!-- Start search -->
<script>
  var typingTimer;
  var doneTypingInterval = 500; // milliseconds

  $('.search_product').on('keyup', function () {
    var $this = $(this);
    clearTimeout(typingTimer);
    if ($this.val()) {
      typingTimer = setTimeout(function () {
        doneTyping($this);
      }, doneTypingInterval);
    }
  });

  function doneTyping($input) {
    var searchTerm = $input.val();
    if (searchTerm) {
      $.ajax({
        url: '{{route('Client.searchProducts')}}',
        type: 'GET',
        data: { search_product: searchTerm },
        success: function (response) {
          displayResults($input, response);
        }
      });
    }
  }

  function displayResults($input, products) {
    var $resultsList = $('.search_results');
    console.log($resultsList);
    $resultsList.empty();
    var productDetailsRoute = $input.data('product-details-route'); // Get the route from data attribute
    if (products.length > 0) {
      $.each(products, function (index, product) {
        $resultsList.append('<li style="list-style-type: none;"><a style="text-decoration: none" href="' + productDetailsRoute + '/' + product.id + '">' + product.title + '</a></li>');
      });
      $resultsList.show();
      $resultsList.css('padding-top','15px');
    } else {
      $resultsList.hide();
      $resultsList.css('padding-top','0');
    }
  }

  // Hide the results list when clicking outside the input field
  $(document).on('click', function (e) {
    if (!$(e.target).closest('.search_results').length && !$(e.target).is('.search_product')) {
      $('.search_results').hide();
    }
  });

</script>
<!-- End search -->

{{-- jQuery --}}
{{-- <script> --}}
  {{-- $(document).ready(function() {

  // Show the register section and hide the login section when clicking the register link
  $('#LogInPageMain').click(function(e) {
    e.preventDefault();
    $('#RegisterPage').attr('hidden',true);
    $('#LogInPage').removeAttr('hidden');
  }); --}}

  {{-- // Show the login section and hide the register section when clicking the login link
//   $('#RegisterPageMain').click(function(e) {
//     e.preventDefault();
//     $('#LogInPage').attr('hidden', true);
//     $('#RegisterPage').removeAttr('hidden');
//   });

// });
// </script> --}}
{{-- jQuery --}}

@stack('js')
