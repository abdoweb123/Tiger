{{-- whatapp icon --}}
<div class="floatwhatsapp ">
    <a class="text-white" href="https://wa.me/+{{ setting('whatsapp') }}">
    <i class="fa-brands fa-whatsapp ">
    </i>
    </a>
    </div>
{{-- whatapp icon --}}

{{-- scroll up  --}}
<div class="back-to-top" id="backTop">
    <i class="fa fa-arrow-up "></i>
</div>
{{-- scroll up  --}}


@push('js')
    <script>
        $(document).ready(() => {
            $(window).scroll(function() {
                let windowScroll = $(window).scrollTop();
                if (windowScroll > 130) {
                    $("#backTop").fadeIn(500).css("display", "flex")
                } else {
                    $("#backTop").fadeOut(500);

                }
            })
            $("#backTop").click(function() {
                $("html,body").animate({
                    scrollTop: 0
                }, 300)
            })
        });
        AOS.init({
            once: true
        })
    </script>
@endpush
