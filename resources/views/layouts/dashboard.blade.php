<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="PIXINVENT">
    <meta name="creator" content="Anto Wiranto">

    <title>{{ $title ?? config('app.name') }} - Codefy - Leraning coding</title>
    
    <link rel="apple-touch-icon" href="{{ asset('images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    @livewireStyles
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/vendors.min.css') }}">
    {{ $vendor_style ?? null }}
    <link href="/assets/vendors/filepond/dist/filepond.css" rel="stylesheet" />
    <script src="/assets/vendors/filepond/dist/filepond.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/core/colors/palette-gradient.css') }}">
    {{ $page_style ?? null }}
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern {{ Auth::user()->dark_mode ? 'dark-layout' : ' ' }} 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" {{ Auth::user()->dark_mode ? 'data-layout="dark-layout"' : ' ' }}>

    <!-- BEGIN: Header-->
    <livewire:header-dashboard/>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <x-main-menu-dashboard/>
    <!-- END: Main Menu-->
    
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
              {{ $content_header ?? null}}
            </div>
            <div class="content-body">
               {{ $slot }}
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{ date('Y') }}<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & project made by Anto Wiranto<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->

     @livewireScripts
    
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Customerly Live Chat Snippet Code -->
    <script>
         !function(){var e=window,i=document,t="customerly",n="queue",o="load",r="settings",u=e[t]=e[t]||[];if(u.t){return void u.i("[customerly] SDK already initialized. Snippet included twice.")}u.t=!0;u.loaded=!1;u.o=["event","attribute","update","show","hide","open","close"];u[n]=[];u.i=function(t){e.console&&!u.debug&&console.error&&console.error(t)};u.u=function(e){return function(){var t=Array.prototype.slice.call(arguments);return t.unshift(e),u[n].push(t),u}};u[o]=function(t){u[r]=t||{};if(u.loaded){return void u.i("[customerly] SDK already loaded. Use customerly.update to change settings.")}u.loaded=!0;var e=i.createElement("script");e.type="text/javascript",e.async=!0,e.src="https://messenger.customerly.io/launcher.js";var n=i.getElementsByTagName("script")[0];n.parentNode.insertBefore(e,n)};u.o.forEach(function(t){u[t]=u.u(t)})}();
        
         customerly.load({
               "app_id": "23ae9d5c"
         });
    </script>
    <!-- End of Customerly Live Chat Snippet Code -->
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('vendors/js/extensions/polyfill.min.js') }}"></script>
    {{ $vendor_script ?? null }}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('js/core/app-menu.js') }}"></script>
    <script src="{{ asset('js/core/app.js') }}"></script>
    <script src="{{ asset('js/scripts/components.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {{ $page_script ?? null }}
    <script src="{{ asset('js/scripts/modal/components-modal.js') }}"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>