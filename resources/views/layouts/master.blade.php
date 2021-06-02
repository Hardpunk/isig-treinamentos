<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="pt-br" itemscope itemtype="http://schema.org/Article">
<!--<![endif]-->

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ config('app.name') }}</title>

    <meta content="{{ csrf_token() }}" name="csrf-token">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="canonical" href="/" />
    <meta name="description" content="ISIG Treinamentos">
    <meta name="keywords" content="">
    <meta name="author" content="ISIG">

    <!-- og tags -->
    <meta property='og:type' content='website'/>
    <meta property="og:locale" content="pt_BR">
    <meta property='og:title' content="ISIG Treinamentos"/>
    <meta property='og:url' content='/'/>
    <meta property='og:description' content='ISIG Treinamentos'/>
    <meta property='og:site_name' content='ISIG Treinamentos'/>
    <meta property='og:image' content="{{ asset('images/favicon/ms-icon-144x144.png') }}"/>
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="144">
    <meta property="og:image:height" content="144">

    <!-- Schema -->
    <meta itemprop="name" content="ISIG">
    <meta itemprop="description" content="ISIG">

    <!-- ICONES -->
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="144x144"  href="{{ asset('images/favicon/favicon-144x144.png') }}">
    <link rel="manifest" href="{{ asset('/images/favicon/manifest.json') }}">

    <meta name="msapplication-TileColor" content="#188d19">
    <meta name="msapplication-TileImage" content="{{ asset('/images/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#188d19">

    <link rel="stylesheet" href="{{ asset('vendor/normalize/normalize.css') }}">

    <!-- Jquery -->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <!-- Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/dist/assets/owl.theme.default.min.css') }}">

    <!-- Tooltipster -->
    <link rel="stylesheet" href="{{ asset('vendor/tooltipster/dist/css/tooltipster.bundle.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('vendor/tooltipster/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-light.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/mdb/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/custom.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('styles/breakpoints.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    @yield('css')
    @yield('js_tags')
</head>

<body>
@if(Route::current()->getName() === 'home')
    <main class="wrapper">
        @include('includes.header')

        @yield('content')

        @include('includes.footer')
    </main>
    <!-- Jquery -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

    <!-- Popper -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <!-- Bootstrap -->
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- Scripts Gerais -->
    <script src=" {{ asset('vendor/tooltipster/dist/js/tooltipster.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>

    <script src="{{ asset('js/init.js') }}"></script> {{--?v={{ time() }}--}}
    <script src="{{ asset('vendor/mdb/js/mdb.min.js') }}"></script>

@else
    <div id="wrapper">
        @include('includes.header')
        @yield('content')
        @include('includes.footer')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('vendor/mdb/js/mdb.min.js') }}"></script>
@endif
    @yield('js')

    <div id="cart-list-overlay"></div>


</body>

</html>
