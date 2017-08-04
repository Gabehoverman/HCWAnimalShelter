<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

    {{--favicon--}}
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HCW Shelter - @yield('title')</title>

    {{--CSS Dependencies - Materialize minified CSS and fonts--}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/lib/materialize/dist/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    {{--Our site's CSS--}}
    <link href="/css/app.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    @yield('pageCss')
</head>
<body>

<nav class="white" role="navigation">
    <div class="nav-wrapper container">
        {{--<a id="logo-container" href="/" class="brand-logo white-text"> HCW Shelter</a>--}}
        {{--<a href="/" class="white-text"><img class="logo-image" src="/img/logo.png"/></a>--}}
        {{--<i style="display: inline-block;" class="material-icons large blue-text">pets</i>--}}
        <a href="/" class="site-slogan black-text"><img src="/img/HCWBlackLogo.png" width="300px"></a>

        <ul class="right hide-on-med-and-down">
            <li @if(Request::is('animals')) class="active" @endif><a href="/animals">Animals</a></li>
            <li @if(Request::is('events')) class="active" @endif><a href="/events">Events</a></li>
            <li @if(Request::is('about')) class="active" @endif><a href="/about">About</a></li>
            <li @if(Request::is('donations')) class="active" @endif><a href="#">Donations</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li @if(Request::is('animals')) class="active" @endif><a href="/animals">Animals</a></li>
            <li @if(Request::is('events')) class="active" @endif><a href="/events">Events</a></li>
            <li @if(Request::is('about')) class="active" @endif><a href="/about">About</a></li>
            <li @if(Request::is('donations')) class="active" @endif><a href="#">Donations</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse black-text"><i class="material-icons">menu</i></a>
    </div>
</nav>


<main>
    @yield('content')
</main>

<footer id="footer" class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col m8 s6">
                <h5 class="white-text">HCW Animal Shelter</h5>
                <img src="/img/logo.png" style="max-height: 100px; max-width: 100%; border-radius: 0.5em;">
            </div>
            <div class="col m4 s6">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="/animals">Animals</a></li>
                    <li><a class="grey-text text-lighten-3" href="/events">Events</a></li>
                    <li><a class="grey-text text-lighten-3" href="/about">About Us</a></li>
                    <li><a class="grey-text text-lighten-3" href="/contact">Contact Us</a></li>
                    @if (Auth::guest())
                        <li><a class="grey-text text-lighten-3" href="{{ route('login') }}">Admin Login</a></li>
                    @else
                        <li>
                            <a href="/admin" class="grey-text text-lighten-4">Admin Panel</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="grey-text text-lighten-4"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright black">
        <div class="container">
            © 2017 Huntington Cabell-Wayne Animal Shelter
        </div>
    </div>
</footer>


{{--JS Libraries - jQuery, Materialize lodash, etc--}}
<script src="/lib/jquery/dist/jquery.min.js"></script>
<script src="/lib/materialize/dist/js/materialize.min.js"></script>
<script src="/lib/lodash/dist/lodash.min.js"></script>
<script src="/lib/moment/min/moment.min.js"></script>
{{--Cloudinary upload widget--}}
<script src="https://widget.cloudinary.com/global/all.js" type="text/javascript"></script>

{{--Added by auth --}}
<script>
    window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
</script>



{{--Our site's JS--}}
<script src="/js/app.js"></script>
@yield('templateScripts')
@yield('pageScripts')

</body>
</html>