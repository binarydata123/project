$('.moreless-button').click(function() {
    $('.moretext').slideToggle();
    if ($('.moreless-button').text() == "Read more") {
      $(this).text("Read less")
    } else {
      $(this).text("Read more")
    }
  })
 
  $(document).ready(function() {
  //   $('#openNav').click(function() {
  //     console.log("hi");
  //       $('#mySidenav').addClass('add-width');
  //       // $('#closeNav').removeClass('.add-width');
  //   });
  //   $('#closeNav').click(function() {
  //     // $('#mySidenav').addClass('.add-width');
  //     $('#mySidenav').removeClass('add-width');
  // });
  $('#openNav').click(function(e){
    e.stopPropagation();
     $('#mySidenav').toggleClass('add-width');
});
$('#mySidenav').click(function(e){
    e.stopPropagation();
});
$('#closeNav').click(function() {
    
      $('#mySidenav').removeClass('add-width');
  });
$('body,html').click(function(e){
       $('#mySidenav').removeClass('add-width');
});
});



$(document).ready(function(){

  $('.question-carousel').owlCarousel({
    loop: true,
 items: 3,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    dots: true,
    // center:true,
    margin:10,
     smartSpeed: 1500,
  
  
    responsive: {
        1200: {
            items: 1,
        },
        992: {
            items: 1,
        },
        768: {
            items: 1,
        },
        100: {
            items: 1,
        },
    },
});
});


