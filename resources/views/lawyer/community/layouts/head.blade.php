<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="friendbook">
    <meta name="keywords" content="friendbook">
    <meta name="id" content="{{ isset(request()->route()->parameters['id']) ? request()->route()->parameters['id'] : null }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="friendbook">
            <!-- favicon icon -->
    <link rel="shortcut icon" href="/images/favicon.png">
    <link rel="apple-touch-icon" href="/images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">
    <link rel="stylesheet" type="text/css" href="{{asset('community/assets/select2/css/select2.css')}}">
    
    <title>Connect Legal - Lawyers Community</title>
    
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <!-- style sheets and font icons  -->   
    <link rel="stylesheet" type="text/css" href="/css/font-icons.min.css">
    <link rel="stylesheet" type="text/css" href="/css/theme-vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/responsive.css" />
    
    <!-- Theme css -->
    <link id="change-link" rel="stylesheet" type="text/css" href="{{asset('community/assets/css/style.css')}}">
    
    <!-- Theme css -->
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

        .select2-container {
            z-index: 9999 !important;
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

        .message-box input[type="file"] {
            display: none;
        }

        .message-box label {
            margin-right: 2%;
        }

        .attachment-preview {
            position: relative;
            padding: 10px;
        }
        .attachment-preview > p {
            margin: 0;
            font-weight: 600;
            padding: 0px;
            padding-top: 10px;
        }
        .attachment-preview > p > svg {
            font-size: 16px;
            margin: 0;
            margin-bottom: -1px;
            color: #737373;
        }
        .attachment-preview svg:active {
            transform: none;
        }
        .image-file {
            cursor: pointer;
            width: 140px;
            height: 70px;
            border-radius: 4px;
            background-color: #f7f7f7;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .attachment-preview > svg:first-child {
            position: absolute;
            background: rgba(0, 0, 0, 0.33);
            width: 20px;
            height: 20px;
            padding: 3px;
            border-radius: 100%;
            font-size: 16px;
            margin: 0;
            top: 10px;
            color: #fff;
        }

        .messenger-sendCard {
  /* display: none; */
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
}
.messenger-sendCard form {
  width: 100%;
  display: inline-flex;
  margin: 0;
}
.messenger-sendCard input[type="file"] {
  display: none;
}
.messenger-sendCard button,
.messenger-sendCard button:active,
.messenger-sendCard button:focus {
  border: none;
  outline: none;
  background: none;
  padding: 0;
  margin: 0;
}
.messenger-sendCard label {
  margin: 0;
}
.messenger-sendCard svg {
  margin: 9px 10px;
  color: #bdcbd6;
  cursor: pointer;
  font-size: 21px;
  transition: transform 0.15s;
}

.messenger-sendCard svg:active {
  transform: scale(0.9);
}

.file-download {
  font-size: 12px;
  display: block;
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  border: 1px solid rgba(0, 0, 0, 0.08);
  background: rgba(0, 0, 0, 0.03);
  padding: 2px 8px;
  margin-top: 10px;
  border-radius: 20px;
  transition: transform 0.3s, background 0.3s;
}
.file-download:hover,
.file-download:focus {
  color: #fff;
  text-decoration: none;
  background: rgba(0, 0, 0, 0.08);
}
.file-download:active {
  transform: scale(0.95);
}
    </style>
</head>