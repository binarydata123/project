$('.moreless-button').click(function() {
    $('.moretext').slideToggle();
    if ($('.moreless-button').text() == "Read more") {
      $(this).text("Read less")
    } else {
      $(this).text("Read more")
    }
  })

  
  if(window.innerWidth > 1023) {
    document.getElementById("mobile-nav-profile").style.display = "none";
  }

  $(".always-open-content").click(function() {
    if($("#mySidenav").hasClass('add-width') && window.location.pathname != "/how-it-works") {
      if(!window.location.toString().includes("/page-practice-area/details"))
        closeNav()
    }
  })
 
  $(document).ready(function() {
    $('#openNav').click(function(e){
      if(window.innerWidth < 992 || window.location.pathname === "/") {
        e.stopPropagation();
        $('#mySidenav').toggleClass('add-width');
      }
      $('#mySidenav').addClass('add-width');
      if(document.getElementById('always-open-content') != null) {
        // document.getElementById("always-open-content").style.marginLeft = "300px";
      }
    });

    if(window.innerWidth > 992) { 
      if(window.location.pathname === "/how-it-works" ||
         window.location.pathname === "/lawyer/register" ||
         window.location.pathname === "/dashboard" ||
         window.location.toString().includes("/reset-password/") ||
         window.location.toString().includes("/book-a-meeting/") ||
         window.location.pathname === "/forgot-password" 
         ) {
        $('#mySidenav').addClass('fixed-width');
      }
    }

    $('#mySidenav').click(function(e){
        e.stopPropagation();
    });
    $('#closeNav').click(function() {
          if(window.innerWidth < 992) {
            $('#mySidenav').removeClass('add-width');
          }
      });
      $('body,html').click(function(e){
          $('#mySidenav').removeClass('add-width');          
      });
  });



  function closeNav() {
    $('#mySidenav').removeClass('add-width');
    if(document.getElementById('always-open-content') != null) {
      document.getElementById("always-open-content").style.marginLeft = "0";
    }
  }

$(document).ready(function(){
  $('.question-carousel').slick({
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
  });
});

if(window.location.pathname.includes("/question-answer/view")) {
  document.body.classList.add('green-bg');
}

if(window.innerWidth <= 768) {
  // if(window.location.pathname === "/how-it-works" || 
  //    window.location.pathname === "/page-practice-area" || 
  //    window.location.pathname === "/question-answers"  ||
  //    window.location.pathname === "/question-answers/list")
  $('#mySidenav').removeClass('add-width');
}
if(window.location.toString().includes("/page-practice-area/details")) {
  document.body.classList.add('green-bg');
  if(window.innerWidth < 1024) {
    $('#mySidenav').removeClass('add-width');
  }
}

if(window.innerWidth <= 425) {  
  $('.p-a-cat-slider').slick({
    dots: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
  });
}else if(window.innerWidth >= 640 && window.innerWidth <= 1024) {
  $('.p-a-cat-slider').slick({
    dots: true,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
  });
}

if(window.innerWidth <= 600) {
  $("#desktop-view").attr('style', 'display: none!important');
  $("#mobile-view").attr('style', 'display: flex!important');
}else {
  $("#desktop-view").attr('style', 'display: block!important');
  $("#mobile-view").attr('style', 'display: none!important');
}

if(window.innerWidth < 992) {
  $('#mySidenav').removeClass('add-width');
}

  








