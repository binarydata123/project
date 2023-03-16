<!doctype html>
<html lang="en">

@include('common.user-dashboard.layouts.head')

<body>

  <div class="flex-part">
    @include('common.user-dashboard.layouts.sidenav')
    <div class="dash-body">
      @include('common.user-dashboard.layouts.nav')

      @include('sweetalert::alert')
        @yield('content')


    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
</script>


    
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>


</script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@stack('script')
<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    direction: "vertical",
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>

<script>
  $(document).ready(function () {
    $(".open-d").click(function () {
      $(".vat-box").toggle();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $('.counter-value').each(function () {
      $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
      }, {
        duration: 3500,
        easing: 'swing',
        step: function (now) {
          $(this).text(Math.ceil(now));
        }
      });
    });
  });

  $(document).ready(function () {
    $("#news-slider").owlCarousel({
      items: 1,
      itemsDesktop: [1199, 1],
      itemsMobile: [600, 1],
      pagination: true,
      autoPlay: true
    });
  });
</script>
<script>
  $(document).ready(function () {
    $("#testimonial-slider").owlCarousel({
      items: 2,
      itemsDesktop: [1000, 2],
      itemsDesktopSmall: [979, 2],
      itemsTablet: [767, 1],
      pagination: true,
      autoPlay: true
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    // Hide submenus
    $('#body-row .collapse').collapse('hide');

    // Collapse/Expand icon
    $('#collapse-icon').addClass('fa-angle-double-left');

    // Collapse click
    $('[data-toggle=sidebar-colapse]').click(function () {
      SidebarCollapse();
    });

    function SidebarCollapse() {
      $('.menu-collapsed').toggleClass('d-none');
      $('.sidebar-submenu').toggleClass('d-none');
      $('.submenu-icon').toggleClass('d-none');
      $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

      // Collapse/Expand icon
      $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
    }
  });
</script>
<script>
  $(document).ready(function() {
    $(window).scroll(function() {
      if ($(document).scrollTop() > 70) {
        $(".top-header").addClass("head-fixed");
      } else {
        $(".top-header").removeClass("head-fixed");
      }
    });
  });
  </script>

</body>

</html>