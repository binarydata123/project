<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="480" >
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Lawyer Dashboard</title>
<meta name="description" content="A description of the page content.">

<meta name="id" content="{{ isset(request()->route()->parameters['id']) ? request()->route()->parameters['id'] : null }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- css File link  -->
<link rel="stylesheet" type="text/css" href="/new-design/user-dashboard/css/style-dash.css">
<link rel="stylesheet" type="text/css" href="/new-design/user-dashboard/css/responsive.css">
<link rel="stylesheet" type="text/css" href="/new-design/user-dashboard/css/style.css">
<!-- Select 2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<!-- Sweet alert -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
<!-- Google Font Poppins-->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700;800;900&display=swap"
rel="stylesheet">
<!-- Dont-Awesome Icon-->
<link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<!--carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<!-- For CAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js"></script>
<!-- fevicon icon -->
<link href="/new-design/user-dashboard/images/fevicon.png" rel="shortcut icon" type="image/png">