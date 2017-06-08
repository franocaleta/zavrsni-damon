<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Damon</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{URL::asset('css/freelancer.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

<!-- Modal - ono što se poziva iz navigacije prilikom klika na korisnicki racun/login/register-->
@include('homepage.modalLOGIN')
@include('homepage.modalREGISTER')

<!-- Navigation -->
@include('homepage.navigation')

<!-- Header -->
@include('homepage.header')

<!-- Aktualno Grid Section -->
@include('homepage.aktualno')

<!-- Kako koristiti Section -->
@include('homepage.kakokoristiti')



<!-- Footer -->
@include('homepage.footer')

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- jQuery -->
<script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{URL::asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="{{URL::asset('js/jqBootstrapValidation.js')}}"></script>
<script src="{{URL::asset('js/contact_me.js')}}"></script>

<!-- Theme JavaScript -->
<script src="{{URL::asset('js/freelancer.min.js')}}"></script>

</body>

</html>
