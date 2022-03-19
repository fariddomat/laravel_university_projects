<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--====== Title ======-->
    <title>UOK - Projects</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ asset('home/css/slick.css') }}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{ asset('home/css/animate.css') }}">

    <!--====== Nice Select css ======-->
    {{-- <link rel="stylesheet" href="{{ asset('home/css/nice-select.css') }}"> --}}

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{ asset('home/css/jquery.nice-number.min.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('home/css/magnific-popup.css') }}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('home/css/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />


    <style>
        .glow {
            /* font-size: 80px; */
            color: #fff;
            text-align: center;
            -webkit-animation: glow 1s ease-in-out infinite alternate;
            -moz-animation: glow 1s ease-in-out infinite alternate;
            animation: glow 1s ease-in-out infinite alternate;
        }

        @-webkit-keyframes glow {
            from {
                text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
            }

            to {
                text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
            }
        }

        .rating2 {
            float: left;
            border: none;
        }

        .rating2:not(:checked)>input {
            position: absolute;
            top: -9999px;
            clip: rect(0, 0, 0, 0);
        }

        .rating2:not(:checked)>label {
            float: right;
            width: 1em;
            padding: 0 .1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 200%;
            line-height: 1.2;
            color: #ddd;
        }

        .rating2:not(:checked)>label:before {
            content: '★ ';
        }

        .rating2>input:checked~label {
            color: #f70;
        }

        .rating2:not(:checked)>label:hover,
        .rating2:not(:checked)>label:hover~label {
            color: gold;
        }

        .rating2>input:checked+label:hover,
        .rating2>input:checked+label:hover~label,
        .rating2>input:checked~label:hover,
        .rating2>input:checked~label:hover~label,
        .rating2>label:hover~input:checked~label {
            color: #ea0;
        }

        .rating2>label:active {
            position: relative;
        }


        .page-link {
            height: 35px !important;
            margin-top: 0;
            padding-top: 0;
            color: gold !important;
            font-weight: bold;
            font-size: 25px;
            background-color: aliceblue;
        }

        .page-item.active.page-link {

        }
    </style>

</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>

    <!--====== PRELOADER PART END ======-->

    @include('layouts._header')

    @yield('content')

    @include('layouts._footer')
    <!--====== jquery js ======-->
    <script src="{{ asset('home/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('home/js/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('home/js/slick.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('home/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Counter Up js ======-->
    <script src="{{ asset('home/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.counterup.min.js') }}"></script>

    <!--====== Nice Select js ======-->
    {{-- <script src="{{ asset('home/js/jquery.nice-select.min.js') }}"></script> --}}

    <!--====== Nice Number js ======-->
    <script src="{{ asset('home/js/jquery.nice-number.min.js') }}"></script>

    <!--====== Count Down js ======-->
    <script src="{{ asset('home/js/jquery.countdown.min.js') }}"></script>

    <!--====== Validator js ======-->
    <script src="{{ asset('home/js/validator.min.js') }}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{ asset('home/js/ajax-contact.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('home/js/main.js') }}"></script>

    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="{{ asset('home/js/map-script.js') }}"></script>

    @stack('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>


</body>

</html>
