@extends('layouts.app')

@section('content')

<!--====== SLIDER PART START ======-->

<section id="slider-part" class="slider-active">
    <div class="single-slider bg_cover pt-150" style="background-image: url({{ asset('home/images/uokk.jpg') }})"
        data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">Explore our projects</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">You can view and download the projects and
                            rate it.</p>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="{{ route('projects') }}">Explore
                                    Now</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->

    <div class="single-slider bg_cover pt-150" style="background-image: url({{ asset('home/images/uook.jpg') }})"
        data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">Meet Our Teachers</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">See the full list of teachers and the projects
                            that supervised by them. Also, their experince and certificates.</p>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="{{ route('teachers') }}">Find out</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->

    <div class="single-slider bg_cover pt-150" style="background-image: url({{ asset('home/images/uok3.jpeg') }})"
        data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">Want to Know More About Us?</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s"></p>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="{{ route('about') }}">Read
                                    More</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>

<!--====== SLIDER PART ENDS ======-->

<!--====== CATEGORY PART START ======-->

<section id="category-part">
    <div class="container">
        <div class="category pt-40 pb-80">
            <div class="row">
                <div class="col-lg-4">
                    <div class="category-text pt-40">
                        <h2>Best place to explore Colleges</h2>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                    <div class="row category-slied mt-40">
                        @foreach ($collegues as $key=>$item)
                        <div class="col-lg-4">
                            <a href="#">
                                <span class="singel-category text-center color-{{$key%3 +1}}">
                                    <span class="icon">
                                        <img src="{{ asset('home/images/all-icon/f-1.png') }}" alt="Icon">
                                    </span>
                                    <span class="cont">
                                        <span>{{$item->name}}</span>
                                    </span>
                                </span> <!-- singel category -->
                            </a>
                        </div>
                        @endforeach

                    </div> <!-- category slied -->
                </div>
            </div> <!-- row -->
        </div> <!-- category -->
    </div> <!-- container -->
</section>

<!--====== CATEGORY PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section id="about-part" class="pt-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5>Projects Under Construction</h5>
                    <h2>Welcome to UOK </h2>
                </div> <!-- section title -->
                <div class="about-cont">
                    <p>
                        Here you can find the last Projects,<br>
                        Last Seminars and News. <br> <br>
                        All new things are Here, the best projects that you can find online<br>
                        You can see projects of different topics and download it.
                    </p>
                    <a href="{{ route('about') }}" class="main-btn mt-55">Read More</a>
                </div>
            </div> <!-- about cont -->
            <div class="col-lg-6 offset-lg-1">
                <div class="about-event mt-50">
                    <div class="event-title">
                        <h3>Upcoming Projects</h3>
                    </div> <!-- event title -->
                    <ul>
                        @foreach ($upcomingEvents as $item)
                        <li>
                            <div class="singel-event">
                                <span><i class="fa fa-calendar"></i>{{$item->date}}</span>
                                <a href="#">
                                    <h4 class="text-success">{{$item->title}} </h4>
                                    <h5 style="margin-bottom: 10px; " class="text-primary"><i class="fa fa-user"></i>
                                        {{$item->studentsForm->Firstname}} {{$item->studentsForm->Lastname}}</h5>
                                </a>
                                <span><i class="fa fa-clock-o"></i> {{ $item->time  }}</span>
                                <span><i class="fa fa-map-marker"></i> {{$item->location}} </span>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div> <!-- about event -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="about-bg">
        <img src="{{ asset('home/images/about/bg-1.png') }}" alt="About">
    </div>
</section>

<!--====== ABOUT PART ENDS ======-->


<!--====== COURSE PART START ======-->

<section id="course-part" class="pt-115 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-45">
                    <h5>Our projects</h5>
                    <h2>Featured projects </h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row course-slied mt-30">
            @foreach ($lastProjects as $key=>$item)

            <div class="col-lg-4 col-md-6"
                style="display: flex; justify-content: center; flex-direction: row; align-items: stretch; align-content: center; height: auto ">
                <div class="singel-course mt-30">
                    <div class="thum">
                        <div class="image"
                            style="height: 250px !important;width:400px !important; display: flex; align-items: stretch">
                            <img src="{{ $item->cover_path }}" alt="Course">
                        </div>
                        <div class="price" style="right: auto;
                                left: 60px;">
                                    <span style="width: 100%;
                                    min-width: 55px;
                                    padding: 0 10px;
                                    background-color: #ff3c00;
                                    color: white;">{{$item->students->first()->collegue->name}}</span>
                                </div>
                                <div class="price">
                                    <span style="width: 100%;
                                    border-radius: 15px;
                                    padding: 0 10px;
                                    color: white;">{{$item->projectForm->category->type}}</span>
                                </div>
                    </div>
                    <div class="far" style="height: 250px !important;">
                        <div class="cont" style="">
                            <div class="course-teacher" style="border-bottom: 1px solid #e0e0e0; border-top: none">
                                <div class="thum">
                                    <a href="{{ route('student', ['id'=>$item->students->first()->id]) }}"><img
                                            src="{{ asset($item->students->first()->image_path) }}" alt="" style=""></a>
                                </div>
                                <div class="name">
                                    <a href="{{ route('student', ['id'=>$item->students->first()->id]) }}">
                                        <h6>{{$item->students->first()->Firstname}}
                                            {{$item->students->first()->Lastname}}</h6>
                                    </a>
                                </div>
                                <div class="admin">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-comment"></i><span>{{$item->comments->count()}}</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <ul>
                                <li><a href="" style="color:{{ $item->averageRating >= 1 ? 'gold' :'#958f8f'}}"><i
                                            class="fa fa-star"></i></a></li>
                                <li><a href="" style="color:{{ $item->averageRating >= 2 ? 'gold' :'#958f8f'}}"><i
                                            class="fa fa-star"></i></a></li>
                                <li><a href="" style="color:{{ $item->averageRating >= 3 ? 'gold' :'#958f8f'}}"><i
                                            class="fa fa-star"></i></a></li>
                                <li><a href="" style="color:{{ $item->averageRating >= 4 ? 'gold' :'#958f8f'}}"><i
                                            class="fa fa-star"></i></a></li>
                                <li><a href="" style="color:{{ $item->averageRating >= 5 ? 'gold' :'#958f8f'}}"><i
                                            class="fa fa-star"></i></a></li>
                            </ul>
                            <span>({{$item->ratings->count()}} Reviws)</span><br>
                            <a href="{{ route('project', ['id'=>$item->id]) }}">
                                <h4>{{$item->projectForm->title}}</h4>
                            </a>

                        </div>
                    </div>
                </div> <!-- singel course -->
            </div>
            @endforeach
        </div> <!-- course slied -->
    </div> <!-- container -->
</section>

<!--====== COURSE PART ENDS ======-->

<!--====== VIDEO FEATURE PART START ======-->

<section id="video-feature" class="bg_cover pt-60 pb-110"
    style="background-image: url({{ asset('home/images/bg-1.jpg') }})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-last order-lg-first">
                <div class="video text-lg-left text-center pt-50">
                    {{-- <a class="Video-popup" href="#"><i class="fa fa-play"></i></a> --}}
                </div> <!-- row -->
            </div>
            <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                <div class="feature pt-50">
                    <div class="feature-title">
                        <h3>Our Facilities</h3>
                    </div>
                    <ul>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="{{ asset('home/images/all-icon/f-1.png') }}" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>Global Certificate</h4>
                                    <p>UOK is one of the best univesities in Syria.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="{{ asset('home/images/all-icon/f-2.png') }}" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>Students Support</h4>
                                    <p>Studend can search and learn from hundreds of projects.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="{{ asset('home/images/all-icon/f-3.png') }}" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>Projects & Library</h4>
                                    <p>All projects are archived and sorted.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                    </ul>
                </div> <!-- feature -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="feature-bg"></div> <!-- feature bg -->
</section>

<!--====== VIDEO FEATURE PART ENDS ======-->

<!--====== TEACHERS PART START ======-->

<section id="teachers-part" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5>Featured Teachers</h5>
                    <h2>Meet Our teachers</h2>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>
                        Best Professors are here !
                        <br><br><br>
                        We have qualified teachers in all fields, they give every thing they can to supprot their studentsr.
                    </p>
                    <a href="{{ route('teachers') }}" class="main-btn mt-55">Meet Our Professors</a>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6 offset-lg-1"
                style="display: flex; justify-content: center; flex-direction: row; align-items: stretch; align-content: center; ">
                <div class="teachers mt-20">
                    <div class="row">
                        @foreach ($teachers as $item)
                        <div class="col-sm-6">
                            <div class="singel-teachers mt-30 text-center"
                                style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                <div class="image">
                                    <img style="height: 250px; width: 250; display: flex; align-items: stretch; box-shadow: 2px"
                                        src="{{ asset($item->image_path) }}" alt="Teachers">
                                </div>
                                <div class="cont">
                                    <a href="teachers-singel.html">
                                        <h6>{{$item->Firstname}} {{$item->Lastname}}</h6>
                                    </a>
                                    <span>
                                        @if ($item->roles->count() >1)
                                        @foreach ($item->roles->pluck('name') as $itemp)
                                        @if ($itemp != 'Professor')
                                        {{$itemp}}
                                        @endif
                                        @endforeach
                                        @else
                                        {{$item->roles->first()->name}}
                                        @endif
                                    </span>
                                </div>
                            </div> <!-- singel teachers -->
                        </div>
                        @endforeach


                    </div> <!-- row -->
                </div> <!-- teachers -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== TEACHERS PART ENDS ======-->

<!--====== PUBLICATION PART START ======-->

<section id="publication-part" class="pt-115 pb-120 gray-bg">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-6 col-md-8 col-sm-7">
                <div class="section-title pb-60">
                    <h5>Projects</h5>
                    <h2>High Rated Projects </h2>
                </div> <!-- section title -->
            </div>
            <div class="col-lg-6 col-md-4 col-sm-5">
            </div>
        </div> <!-- row -->
        <div class="row course-slied mt-30">
            @foreach ($highRatedProject as $key=>$item)

            <div class="col-lg-4 col-md-6"
                style="display: flex; justify-content: center; flex-direction: row; align-items: stretch; align-content: center; height: auto ">
                <div class="singel-course mt-30">
                    <div class="thum">
                        <div class="image"
                            style="height: 250px !important;width:400px !important; display: flex; align-items: stretch">
                            <img src="{{ $item->cover_path }}" alt="Course">
                        </div>
                        <div class="price" style="right: auto;
                                left: 60px;">
                                    <span style="width: 100%;
                                    min-width: 55px;
                                    padding: 0 10px;
                                    background-color: #ff3c00;
                                    color: white;">{{$item->students->first()->collegue->name}}</span>
                                </div>
                                <div class="price">
                                    <span style="width: 100%;
                                    border-radius: 15px;
                                    padding: 0 10px;
                                    color: white;">{{$item->projectForm->category->type}}</span>
                                </div>
                    </div>
                    <div class="far" style="height: 250px !important;">
                        <div class="cont" style="">
                            <div class="course-teacher" style="border-bottom: 1px solid #e0e0e0; border-top: none">
                                <div class="thum">
                                    <a href="{{ route('student', ['id'=>$item->students->first()->id]) }}"><img
                                            src="{{ asset($item->students->first()->image_path) }}" alt="" style=""></a>
                                </div>
                                <div class="name">
                                    <a href="{{ route('student', ['id'=>$item->students->first()->id]) }}">
                                        <h6>{{$item->students->first()->Firstname}}
                                            {{$item->students->first()->Lastname}}</h6>
                                    </a>
                                </div>
                                <div class="admin">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-comment"></i><span>{{$item->comments->count()}}</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <ul>

                                <li><a href="" style="color:{{ $item->averageRating >= 1 ? 'gold' :'#958f8f'}}"><i
                                            class="fa fa-star"></i></a></li>
                                <li><a href="" style="color:{{ $item->averageRating >= 2 ? 'gold' :'#958f8f'}}"><i
                                            class="fa fa-star"></i></a></li>
                                <li><a href="" style="color:{{ $item->averageRating >= 3 ? 'gold' :'#958f8f'}}"><i
                                            class="fa fa-star"></i></a></li>
                                <li><a href="" style="color:{{ $item->averageRating >= 4 ? 'gold' :'#958f8f'}}"><i
                                            class="fa fa-star"></i></a></li>
                                <li><a href="" style="color:{{ $item->averageRating >= 5 ? 'gold' :'#958f8f'}}"><i
                                            class="fa fa-star"></i></a></li>
                            </ul>
                            <span>({{$item->ratings->count()}} Reviws)</span><br>
                            <a href="{{ route('project', ['id'=>$item->id]) }}">
                                <h4>{{$item->projectForm->title}}</h4>
                            </a>

                        </div>
                    </div>
                </div> <!-- singel course -->
            </div>
            @endforeach
        </div> <!-- course slied -->
    </div> <!-- container -->
</section>

<!--====== PUBLICATION PART ENDS ======-->

<!--====== TEASTIMONIAL PART START ======-->

<section id="testimonial" class="bg_cover pt-115 pb-115" data-overlay="8"
    style="background-image: url({{ asset('home/images/bg-2.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-40">
                    <h5>Comments</h5>
                    <h2>What they say</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row testimonial-slied mt-40">

            @foreach ($highRatedProject as $item)
            @foreach ($item->comments as $comment)
            <div class="col-lg-6">
                <div class="singel-testimonial">
                    <div class="testimonial-thum">
                        <img style="max-width: 65px; max-height: 65px" src="{{ asset($comment->user->image_path) }}" alt="Testimonial">
                        <div class="quote">
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                    <div class="testimonial-cont">
                        <p>{{$comment->comment}} </p>
                        <h6>{{$comment->user->Firstname}} {{$comment->user->Lastname}} </h6>
                        <span>{{$comment->user->roles->first()->name}}</span>
                    </div>
                </div> <!-- singel testimonial -->
            </div>
            @endforeach
            @endforeach

        </div> <!-- testimonial slied -->
    </div> <!-- container -->
</section>

<!--====== TEASTIMONIAL PART ENDS ======-->



<!--====== PATNAR LOGO PART START ======-->

<div id="patnar-logo" class="pt-40 pb-80 gray-bg">
    <div class="container">
        <div class="row patnar-slied">
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="{{ asset('home/images/patnar-logo/p-1.png') }}" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="{{ asset('home/images/patnar-logo/p-2.png') }}" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="{{ asset('home/images/patnar-logo/p-3.png') }}" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="{{ asset('home/images/patnar-logo/p-4.png') }}" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="{{ asset('home/images/patnar-logo/p-2.png') }}" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="{{ asset('home/images/patnar-logo/p-3.png') }}" alt="Logo">
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>

<!--====== PATNAR LOGO PART ENDS ======-->


@endsection
