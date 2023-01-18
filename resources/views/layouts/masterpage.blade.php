<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UTAS Computer Rental Services</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('/images/utas.jpg')}}" rel="icon">
    <link href="{{asset('/images/logo.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">

</head>
<body>
@include('layouts.header')
@include('layouts.sidebar')


<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            @yield('content')
        </div>
    </section>
</main>

<!-- Vendor JS Files -->
<script src="{{asset('/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/vendor/chart.js/chart.min.js')}}"></script>
<script src="{{asset('/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('/vendor/tinymce/tinymce.min.js')}}"></script>




<!-- Template Main JS File -->
<script src="{{asset('/js/main.js')}}"></script>
</body>

</html>
