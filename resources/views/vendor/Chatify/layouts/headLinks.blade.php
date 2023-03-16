<title>{{ config('chatify.name') }}</title>

{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="id" content="{{ $id }}">
<meta name="type" content="{{ $type }}">
<meta name="messenger-color" content="{{ $messengerColor }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

{{-- scripts --}}
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ asset('js/chatify/autosize.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/theme-vendors.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

<script>
  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
  });
  
  $( document ).on( 'click', '.open-menu', function () {
      $( 'body' ).toggleClass( 'show-menu' );
      $( 'body' ).toggleClass( 'hamburger-show-menu' );
      lawyerOnline()
  });

  function mainMenu() {
      $("#lawyer-online").hide()
      $("#main-menu").show()
      $( '.lawyerOnline' ).removeClass( 'active show' );
      $( '.mainMenu' ).addClass( 'active show' );
  }

  function lawyerOnline() {
      $("#lawyer-online").show()
      $("#main-menu").hide()
      $( '.lawyerOnline' ).addClass( 'active show' );
      $( '.mainMenu' ).removeClass( 'active show' );
  }
</script>

{{-- styles --}}
<link rel="shortcut icon" href="/images/favicon.png">
<link rel="apple-touch-icon" href="/images/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">
<!-- style sheets and font icons  -->   
<link rel="stylesheet" type="text/css" href="/css/font-icons.min.css">
<link rel="stylesheet" type="text/css" href="/css/theme-vendors.min.css">
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/responsive.css" />

<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />

{{-- Messenger Color Style--}}
@include('Chatify::layouts.messengerColor')

<style>
    .logo .mobile-logo {
        display: none;
    }
    /* when screen is less than 600px wide
        show mobile version and hide desktop */
    @media (max-width: 768px) {
        .logo .mobile-logo {
            display: block;
        }
    }

    @media (max-width: 320px) {
        .logo .mobile-logo {
            padding-top: 72.977px;
        }
    }
    
    
    .bottomNavbar {
        overflow: hidden;
        background-color: black;
        position: fixed;
        bottom: 0;
        width: 23.3%;
    }
    
    @media (max-width: 425px) {
        .bottomNavbar {                    
            width: 100%;
        }
    }

    @media (min-width: 768px) {
        .bottomNavbar {                   
            width: 49%;
        }
    }

    @media (min-width: 1024px) {
      .bottomNavbar {                   
          width: 37%;
      }

      .banner-image {
          margin-left: 48%;
          margin-top: 9%;
      }

      .for-lawyers {
          margin-left: 33px;
      }

      .for-lawyers-breadcrumb {
          padding-top: 108px;
          padding-bottom: 0px;
          margin-left: 50px;
      }

      .for-lawyers-form {
          width: 54.89%!important;
      }
  }

  @media (min-width: 1440px) {
      .bottomNavbar {                   
          width: 23.8%;
      }

      .banner-image {
          margin-left: 0%;
          margin-top: 0%;
      }

      .for-lawyers {
          margin-left: 0px;
      }

      .for-lawyers-form {
          width: 58.1%!important;
      }
  }
  
  .bottomNavbar a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
  }

  .bottomNavbar a:hover {
      background: #f1f1f1;
      color: black;
  }

  .bottomNavbar a.active {
      background-color: white;
      color: black;
  }   
</style>
