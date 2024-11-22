<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argon/assets/img/home.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('argon/assets/img/home.png') }}">
    <title>
        PerumKita | Portal Warga Perum
    </title>
    <link rel="stylesheet" href="{{asset('icons/css/font-awesome.min.css')}}">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('argon/assets/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
    <style>
        .table-fixed {
            table-layout: fixed;
            width: 100%;
        }

        .table-fixed td,
        .table-fixed th {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>
    @include('includes.sidebar')
    <main class="main-content position-relative border-radius-lg">
        @include('includes.navbar')
        @yield('content')
        @include('includes.footer')
    </main>
    @include('includes.script')
    @yield('scripts')
</body>

</html>
