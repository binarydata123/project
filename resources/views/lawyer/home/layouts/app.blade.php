<!doctype html>
<html lang="en">

<head>
    <style>     
        .tox-tinymce {
            border: 1px solid #ccc;
            padding: 15px;
        }
        .chosen-container {
            width: 100%!important;
            margin-top: 3%!important;
        }
        .search-choice {
            /* font-size:15px!important; */
            margin-top:2%!important;
        }
        .chosen-choices {
            height: 53px!important;
            border: 0.75px solid #85BACA!important;
            border-radius: 15px;
            font-weight: 400;
            font-size: 20px;
            line-height: 20px;
            color: #191919;
            width: 100%;
            padding: 0 15px;
        }

        .chosen-search-input {
            color: black!important;
            margin-top: 7%!important;
        }
        .chosen-container .chosen-results {
            text-align: left;
        }

        .chosen-container .chosen-drop {
            left: auto !important;
            right: 0 !important;
        }

        .was-validated {
          justify-content: center;
          display: flex;
        }
    </style>
    @include('lawyer.home.layouts.header')
</head>

<body>
    <div class="flex-part">
        @include('lawyer.home.layouts.sidenav')
        <div class="dash-body">
            @include('lawyer.home.layouts.nav')
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
  </script>
  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script><!-- Important -->
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <!-- Pusher -->
  <script src="//js.pusher.com/3.1/pusher.min.js"></script><!-- Important -->
  <!-- Select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Rich Text Editor -->
    <script src="https://cdn.tiny.cloud/1/vvh09oz5j0g13dytvat9h2hhuowu0yq8uaml9jbfp4glcl24/tinymce/5/tinymce.min.js"></script>  <!-- Important -->
  <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script><!-- Important -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">            <!-- Important -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script><!-- Important -->
        

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
        $('#lawyer-multiselect').select2()     
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

    <script>
        tinymce.init({
            selector: '#richText',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });

        
                        
    </script>


<script>

        var pusher = new Pusher('a34a416e0fe588185c8e', {
            cluster: 'ap2'
        });

        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('post-comment');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\PostComment', function(data) {
            if(data.type === "comment") {
                $.ajax({
                    method:"post",
                    url: "/lawyer/updated-comment",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'data':data
                    },
                    success: function(res){
                        debugger
                        // $("#commentList_"+data.postComment.post_id).empty();
                        $("#commentList_"+data.postComment.post_id).prepend(res.comments);
                        $("#commentCounts_"+data.postComment.post_id).empty();
                        $("#commentCounts_"+data.postComment.post_id).prepend(res.count);
                    }
                });
            }else if(data.type === "post") {
                $.ajax({
                    method:"post",
                    url: "/lawyer/updated-post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'data':data
                    },
                    success: function(res){
                        // $(".all-posts-"+data.postComment.post_id).empty();
                        $(".all-posts").prepend(res);
                    }
                });
            }else if(data.type === "groupPost") {
                $.ajax({
                    method:"post",
                    url: "/lawyer/updated-post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'data':data
                    },
                    success: function(res){
                        // $(".all-posts-"+data.postComment.post_id).empty();
                        $(".all-group-posts").prepend(res);
                    }
                });
            }else if(data.type === "groupMessage") {
                $.ajax({
                    method:"post",
                    url: "/lawyer/community/group/latest-group-chat",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'data':data
                    },
                    success: function(res){
                        // $(".all-posts-"+data.postComment.post_id).empty();
                        $(".messages-content").append(res);
                        $("#chat-text").animate({ scrollTop: $('#chat-text').prop("scrollHeight")}, 1000);
                    }
                });
            }
        }); 
</script>
    
    @stack('script')

</body>

</html>