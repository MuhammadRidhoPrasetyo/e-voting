<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>{{ $title ?? 'Laravel' }}</title>

    <meta name="description"
        content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="OneUI">
    <meta property="og:description"
        content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href={{ asset('media/favicons/favicon.png') }}>
    <link rel="icon" type="image/png" sizes="192x192" href={{ asset('media/favicons/favicon-192x192.png') }}>
    <link rel="apple-touch-icon" sizes="180x180" href={{ asset('media/favicons/apple-touch-icon-180x180.png') }}>
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- OneUI framework -->
    @stack('prepend-style')
    <x-include.style/>
    @stack('after-style')
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->

</head>

<body>
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        <x-include.sidebar/>
        <x-include.header/>
        {{ $slot }}
        <x-include.footer/>

    </div>
    @include('sweetalert::alert')
    @stack('prepend-script')
    <x-include.script/>
    @stack('after-script')
</body>
</html>
