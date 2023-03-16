<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>Legal Advice services Dubai, UAE-Speak to Lawyers online</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="ThemeZaa">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="description" content="Litho is a clean and modern design, BootStrap 5 responsive, business and portfolio multipurpose HTML5 template with 37+ ready homepage demos.">
        <!-- favicon icon -->
        <link rel="shortcut icon" href="/images/favicon.png">
        <link rel="apple-touch-icon" href="/images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">
        <!-- style sheets and font icons  -->   
        <link rel="stylesheet" type="text/css" href="/css/font-icons.min.css">
        <link rel="stylesheet" type="text/css" href="/css/theme-vendors.min.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/css/responsive.css" />
        
        <!-- toastr -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
        <!-- toastr -->

        <!-- Theme css -->
        <link id="change-link" rel="stylesheet" type="text/css" href="../customer/assets/css/style.css">

        <!-- Captcha -->
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <!-- Captcha -->

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
    </head>
    <body data-mobile-nav-style="classic" style="background-color:#0c294c;padding-top:73.977px!important;">

        @include('common.layouts.header')
        <div class="p-80">
            @yield('content')
        </div>
        
        @include('common.layouts.footer')
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="feather icon-feather-arrow-up"></i></a>
        <!-- end scroll to top -->
        <!-- javascript -->
        @include('layouts.sections.scriptsIncludes')
        <script type="text/javascript" src="/js/jquery.min.js"></script>
        <script type="text/javascript" src="/js/theme-vendors.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>        
        <script>
            $(document).ready(function() {
                toastr.options.timeOut = 10000;
                toastr.options.positionClass = "toast-bottom-right";
                @if (Session::has('error'))
                    toastr.error('{{ Session::get('error') }}');
                @elseif(Session::has('success'))
                    toastr.success('{{ Session::get('success') }}');
                @endif
            });

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

            $(document).ready( function () {
                $('#myTable').DataTable();
                $('#myTable2').DataTable();
            });
        </script>
        @yield('script')
    </body>
</html>