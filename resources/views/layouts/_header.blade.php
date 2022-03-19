<!--====== HEADER PART START ======-->

<header id="header-part">

    <div class="header-top d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact text-lg-left text-center">
                        <ul>
                            <li><img src="{{ asset('home/images/all-icon/map.png') }}" alt="icon"><span>Deir
                                    Atia, Damas</span></li>
                            <li><img src="{{ asset('home/images/all-icon/email.png') }}"
                                    alt="icon"><span>info@uok.com</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-opening-time text-lg-right text-center">
                        <p>Opening Hours : Saturday to Wednesday - 8 am to 4 pm</p>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header top -->

    <div class="header-logo-support pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href="/">
                            <img style="max-width: 50px" src="{{ asset('home/images/uok-logo.png') }}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="support-button float-right d-none d-md-block">
                        <div class="support float-left">
                            <div class="icon">
                                <img src="{{ asset('home/images/all-icon/support.png') }}" alt="icon">
                            </div>
                            <div class="cont">
                                <p>Need Help? call us</p>
                                <span>+963 11 78339999</span>
                            </div>
                        </div>
                        <div class="button float-left">
                            <a href="{{ route('register') }} " class="main-btn">Join Now</a>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header logo support -->

    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-8 col-sm-7 col-7">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a  class="{{Request::is('/*')? 'active' :' '}}" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a   class="{{Request::is('projects')? 'active' :' '}} {{Request::is('project/*')? 'active' :' '}}"

                                    href="{{ route('projects') }}">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a  class="{{Request::is('students')? 'active' :' '}} {{Request::is('student/*')? 'active' :' '}}"  href="{{ route('students') }}">Students</a>
                                </li>
                                <li class="nav-item">
                                    <a  class="{{Request::is('teachers')? 'active' :' '}} {{Request::is('teacher/*')? 'active' :' '}}"  href="{{ route('teachers') }}">Our teachers</a>
                                </li>
                                <li class="nav-item">
                                    <a  class="{{Request::is('events')? 'active' :' '}}"  href="{{ route('events') }}">Events</a>
                                </li>
                                <li class="nav-item">
                                    <a  class="{{Request::is('about')? 'active' :' '}}"  href="{{ route('about') }}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a  class="{{Request::is('contact')? 'active' :' '}}"  href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav> <!-- nav -->
                </div>
                <div class="col-lg-2 col-md-4 col-sm-5 col-5">
                    <div class="right-icon text-right">
                        <ul>

                            <li class="nav-item">
                                @if (Auth::user())
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out " style=""></i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li>
                                <a href="{{ route('home') }}"><i class="fa fa-cogs"></i><span>0</span></a>
                                @else

                                <a href="{{ route('login') }}" class="" style="font-size: 14px;
                                    font-family: 'Montserrat', sans-serif;
                                    font-weight: 700;
                                    color: #07294d;
                                    text-transform: uppercase;
                                    -webkit-transition: all 0.4s linear;
                                    transition: all 0.4s linear;">Login</a>
                                @endif
                            </li>
                            <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div> <!-- right icon -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

</header>

<!--====== HEADER PART ENDS ======-->

<!--====== SEARCH BOX PART START ======-->

<div class="search-box">
    <div class="serach-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="search" placeholder="Search by keyword">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div> <!-- serach form -->
</div>

<!--====== SEARCH BOX PART ENDS ======-->
