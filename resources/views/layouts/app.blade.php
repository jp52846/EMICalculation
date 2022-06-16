<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset(env("CLIENT_THEME").'assets/')}}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />


    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset(env("CLIENT_THEME").'assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset(env("CLIENT_THEME").'assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset(env("CLIENT_THEME").'assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset(env("CLIENT_THEME").'assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset(env("CLIENT_THEME").'assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset(env("CLIENT_THEME").'assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Helpers -->
    <script src="{{ asset(env("CLIENT_THEME").'assets/vendor/js/helpers.js')}}"></script>
    <script src="{{ asset(env("CLIENT_THEME").'assets/js/config.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!--sidebar-->
            @include('layouts.inc.sidebar')
            <div class="layout-page">
                <!--header-->
                @include('layouts.inc.header')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                    </div>
                    <!--footer-->
                </div>
            </div>
        </div>
    </div>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset(env("CLIENT_THEME").'assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset(env("CLIENT_THEME").'assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset(env("CLIENT_THEME").'assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset(env("CLIENT_THEME").'assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{ asset(env("CLIENT_THEME").'assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset(env("CLIENT_THEME").'assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{ asset(env("CLIENT_THEME").'assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{ asset(env("CLIENT_THEME").'assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
