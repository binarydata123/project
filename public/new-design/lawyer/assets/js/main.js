$('.moreless-button').click(function() {
    $('.moretext').slideToggle();
    if ($('.moreless-button').text() == "Read more") {
      $(this).text("Read less")
    } else {
      $(this).text("Read more")
    }
  })
 
  $(document).ready(function() {
    if(window.innerWidth > 1023) {
      document.getElementById("mobile-nav-profile").style.display = "none";
    }
    
    if(window.innerWidth == 768) {      
      document.getElementById("navbar_brand_mobile").style.marginTop = "1.5%";
    }
    if(window.innerWidth == 1024) {      
      document.getElementById("navbar_brand_mobile").style.marginTop = "-0.5%";
    }

    if(window.innerWidth == 1920 || window.innerWidth == 1440) {
      document.getElementById("mySidenav").style.width = "300px";
      if(document.getElementById('dashboard') != null) {
          document.getElementById("dashboard").style.marginLeft = "315px";
      }
    }else {
      $('#openNav').click(function(e) {
        if(window.innerWidth == 320) {
          document.getElementById("mySidenav").style.width = "260px!important";
        }
        e.stopPropagation();
        $('#mySidenav').toggleClass('add-width-lawyer');
      });
      
      $('#mySidenav').click(function(e) {
        e.stopPropagation();
      });
      
      $('#closeNav').click(function() {      
        $('#mySidenav').removeClass('add-width-lawyer');
      });
      
      $('body,html').click(function(e) {
        $('#mySidenav').removeClass('add-width-lawyer');
      });
    }
});





$(document).ready( function () {
  if(window.innerWidth == 768) {
    document.getElementById('create-service-btn-card-id').style.marginRight = "-27%";
  }else if(window.innerWidth == 1024) {
    document.getElementById('create-service-btn-card-id').style.marginRight = "-34.5%";
  }else if(window.innerWidth == 320) {
    document.getElementById('create-service-btn-card-id').style.marginRight = "16.5%";
  }else if(window.innerWidth == 375) {
    document.getElementById('create-service-btn-card-id').style.marginRight = "6.5%";
  }

  if(window.innerWidth == 320 || window.innerWidth == 375 || window.innerWidth == 425) {
    $('#myTable').removeAttr('width').DataTable( {
      scrollY:        "250px",
      scrollX:        true,
      scrollCollapse: true,
      paging:         true,
      columnDefs: [
          { width: 150, targets: 0 }
      ],
      fixedColumns: true
    });
  }else {
    $('#myTable').DataTable();
  }
  $('#myTable2').DataTable();
}); 


function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


// function openNav() {
//   console.log(window.innerWidth)
//   if(window.innerWidth <= 1920) {
//       document.getElementById("mySidenav").style.width = "300px";
//       if(document.getElementById('dashboard') != null) {
//           document.getElementById("dashboard").style.marginLeft = "315px";
//       }
//   }else {
//       document.getElementById("mySidenav").style.width = "250px";
//       if(document.getElementById('dashboard') != null) {
//           document.getElementById("dashboard").style.marginLeft = "250px";
//       }
//   }                    
// }
// if(window.innerWidth >= 1339) {
//   openNav()
// }

// function closeNav() {
//   if(window.innerWidth < 1339) {
//       document.getElementById("mySidenav").style.display = "none";
//       if(document.getElementById('dashboard') != null) {
//           document.getElementById("dashboard").style.marginLeft = "0";
//       }
//   }
// }

if(window.innerWidth <= 600) {
  $('.slider').slick({
    dots: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    arrows: true,
  });
}else if(window.innerWidth <= 820) {
  $('.slider').slick({
    dots: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    arrows: true,
  });
}


if(window.innerWidth <= 1024) {
  $(".slot-desktop-view").attr('style', 'display: none!important');
  $(".slot-mobile-view").attr('style', 'display: flex!important');
}else {
  $(".slot-desktop-view").attr('style', 'display: flex!important');
  $(".slot-mobile-view").attr('style', 'display: none!important');
}







function showFile(){
  var filenameData = document.getElementById('fileUpload');
  if (filenameData.style.display === "none") {
      filenameData.style.display = "flex";
  } else {
      filenameData.style.display = "none";
  }
  scrollToBottom();
}

function showEmoji(){
  var x = document.getElementById("emoji");
  if (x.style.display === "none") {
      x.style.display = "block";
  } else {
      x.style.display = "none";
  }
}

const dropArea = document.querySelector(".drop_box"),
button = dropArea.querySelector("button"),
dragText = dropArea.querySelector("header"),
input = dropArea.querySelector("input");
let file;
var filename;

button.onclick = () => {
  input.click();
};

input.addEventListener("change", function (e) {
  var fileName = e.target.files[0].name;
  var size = formatBytes(e.target.files[0].size)
  document.getElementById("filehere").style.display = "block";
  $("#filehere").append(fileName)
  // let filedata = `
  //     <form action="" method="post">
  //     <div class="form" style="text-align: center;" id="file"> 
  //     <img src="assets/image/dashboard/pdf.png" alt="" class="pdf">
  //     <h6 style="font-size: 12px;">${fileName}</h6>
  //     <br>
  //     <h6 style="font-size: 12px;">${size}</h6>
  //     </div>
  //     </form>`;
  //     dropArea.append = filedata;
});
 
function formatBytes(bytes, decimals = 2) {
  if (!+bytes) return '0 Bytes'

  const k = 1024
  const dm = decimals < 0 ? 0 : decimals
  const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']

  const i = Math.floor(Math.log(bytes) / Math.log(k))

  return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`
}


function scrollToBottom() {
  var objDiv = document.getElementById("fileUpload");
  objDiv.scrollIntoView();
}

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function injectEmojisToList(e) {
  document.getElementById("fname").value += e.innerHTML;
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
      }
      }
  }
}