@extends('layouts.app')


@section('content')
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('home/images/page-banner-2.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{ $project->name }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('projects') }}">Projects</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $project->name }}</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== COURSES SINGEl PART START ======-->

    <section id="corses-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="corses-singel-left mt-30">
                        <div class="title">
                            <h3>Project : {{ $project->projectForm->title }}</h3>
                        </div> <!-- title -->
                        <div class="course-terms">
                            <ul>
                                <li>
                                    <div class="teacher-name">
                                        <div class="name">
                                            <span>Student</span>
                                            @foreach ($project->students as $student)
                                                <h6>{{ $student->Firstname }} {{ $student->Lastname }}</h6>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="course-category">
                                        <span>Category</span>
                                        <h6>{{ $project->projectForm->category->type }} </h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="review">
                                        <span>Review</span>
                                        <ul>

                                            <li><a href=""
                                                    style="color:{{ $project->averageRating >= 1 ? '' : '#958f8f' }}"><i
                                                        class="fa fa-star"></i></a></li>
                                            <li><a href=""
                                                    style="color:{{ $project->averageRating >= 2 ? '' : '#958f8f' }}"><i
                                                        class="fa fa-star"></i></a></li>
                                            <li><a href=""
                                                    style="color:{{ $project->averageRating >= 3 ? '' : '#958f8f' }}"><i
                                                        class="fa fa-star"></i></a></li>
                                            <li><a href=""
                                                    style="color:{{ $project->averageRating >= 4 ? '' : '#958f8f' }}"><i
                                                        class="fa fa-star"></i></a></li>
                                            <li><a href=""
                                                    style="color:{{ $project->averageRating >= 5 ? '' : '#958f8f' }}"><i
                                                        class="fa fa-star"></i></a></li>
                                            <li class="rating">({{ $project->ratings->count() }} Reviws)</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- course terms -->

                        <div class="corses-singel-image pt-50">
                            <img style="max-height: 250px" src="{{ $project->cover_path }}" alt="Projects">
                        </div> <!-- corses singel image -->

                        <div class="corses-tab mt-30">
                            <ul class="nav nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="overview-tab" data-toggle="tab" href="#overview"
                                        role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab"
                                        aria-controls="curriculam" aria-selected="false">Students</a>
                                </li>
                                <li class="nav-item">
                                    <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab"
                                        aria-controls="instructor" aria-selected="false">Instructor</a>
                                </li>
                                <li class="nav-item">
                                    <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                        aria-selected="false">Reviews</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                    aria-labelledby="overview-tab">
                                    <div class="overview-description">
                                        <div class="singel-description pt-40">
                                            <h6>Project Summary</h6>
                                            <p>{{ $project->projectForm->about }}</p>
                                        </div>
                                        <div class="singel-description pt-10">
                                            <h6>Project Goal</h6>
                                            <p>{{ $project->projectForm->goal }}</p>
                                        </div>
                                        <div class="singel-description pt-10">
                                            <h6>Skills</h6>
                                            <p>{{ $project->projectForm->skills }}</p>
                                        </div>
                                    </div> <!-- overview description -->
                                </div>
                                <div class="tab-pane fade" id="curriculam" role="tabpanel"
                                    aria-labelledby="curriculam-tab">
                                    @foreach ($project->students as $student)
                                        <div class="instructor-cont">
                                            <div class="instructor-author">
                                                <div class="author-thum">
                                                    <img src="{{ asset($student->image_path) }}" alt=""
                                                        style="max-width: 250px">
                                                </div>
                                                <div class="author-name">
                                                    <a href="#">
                                                        <h5>{{ $student->Firstname }} {{ $student->Lastname }}</h5>
                                                    </a>
                                                    <span><i class=" fa fa-graduation"> Collegue :
                                                            {{ $student->collegue->name }}</i></span>
                                                    <ul class="social">
                                                        <li><a href="{{ $student->github }}"><i
                                                                    class="fa fa-github-square"></i></a></li>
                                                        <li><a href="{{ $student->linkedin }}"><i
                                                                    class="fa fa-linkedin-square"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="instructor-description pt-25">
                                                <p>
                                                    {{ $student->About }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                                <div class="tab-pane fade" id="instructor" role="tabpanel"
                                    aria-labelledby="instructor-tab">
                                    <div class="instructor-cont">
                                        <div class="instructor-author">
                                            <div class="author-thum">
                                                <img src="{{ asset($project->projectForm->professorSuper->image_path) }}"
                                                    alt="" style="max-width: 250px">
                                            </div>
                                            <div class="author-name">
                                                <a href="#">
                                                    <h5>{{ $project->projectForm->professorSuper->Firstname }}
                                                        {{ $project->projectForm->professorSuper->Lastname }}</h5>
                                                </a>
                                                <span>Professor</span>
                                                <ul class="social">
                                                    <li><a href="{{ $project->projectForm->professorSuper->github }}"><i
                                                                class="fa fa-github-square"></i></a></li>
                                                    <li><a href="{{ $project->projectForm->professorSuper->linkedin }}"><i
                                                                class="fa fa-linkedin-square"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="instructor-description pt-25">
                                            <p>
                                                {{ $project->projectForm->professorSuper->About }}
                                            </p>
                                        </div>
                                    </div> <!-- instructor cont -->
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="reviews-cont">
                                        <div class="title">
                                            <h6>Student Reviews</h6>
                                        </div>
                                        <ul>
                                            @if ($project->comments->count() > 0)
                                                @foreach ($project->comments as $item)
                                                    <li>
                                                        @hasanyrole('Admin|Professor')
                                                            <a href="{{ route('comment.destroy', ['id' => $item->id]) }}"
                                                                class="btn btn-danger" style=" float: right;
                                                        margin-top: 35px;
                                                    }"><i class="fa fa-trash"></i> </a>
                                                        @endhasanyrole
                                                        <div class="singel-reviews">
                                                            <div class="reviews-author">
                                                                <div class="author-thum">
                                                                    <img style="max-width: 50px"
                                                                        src="{{ asset($item->user->image_path) }}"
                                                                        alt="Reviews">
                                                                </div>
                                                                <div class="author-name">
                                                                    <h6>{{ $item->user->Firstname }}
                                                                        {{ $item->user->Lastname }} </h6>
                                                                    <span>{{ $item->created_at->diffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="reviews-description pt-20">
                                                                <p>{{ $item->comment }} </p>

                                                            </div>
                                                        </div> <!-- singel reviews -->
                                                    </li> <!-- singel reviews -->

                                                @endforeach
                                            @else
                                                <h4 class="text-warning" style="margin-top: 15px">No Comments to show</h4>
                                            @endif

                                        </ul>
                                        <div class="title pt-15">
                                            <h6>Leave A Comment or Rate</h6>
                                        </div>
                                        @if (Auth::user())
                                            <div class="reviews-form">

                                                <div class="row">


                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <div class="rate-wrapper">
                                                                <div class="rate-label" style="padding-top: 8px;">Your
                                                                    Rating:</div>
                                                                <div class="rate">

                                                                    <form action="{{ route('projects.rateProject') }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <fieldset class="rating2">
                                                                            <input class="rating2" type="radio"
                                                                                id="star5" name="rating" value="5"
                                                                                {{ $rate == 5 ? 'checked' : '' }} />
                                                                            <label for="star5">5 stars</label>
                                                                            <input class="rating2" type="radio"
                                                                                id="star4" name="rating" value="4"
                                                                                {{ $rate == 4 ? 'checked' : '' }} />
                                                                            <label for="star4">4 stars</label>
                                                                            <input class="rating2" type="radio"
                                                                                id="star3" name="rating" value="3"
                                                                                {{ $rate == 3 ? 'checked' : '' }} />
                                                                            <label for="star3">3 stars</label>
                                                                            <input class="rating2" type="radio"
                                                                                id="star2" name="rating" value="2"
                                                                                {{ $rate == 2 ? 'checked' : '' }} />
                                                                            <label for="star2">2 stars</label>
                                                                            <input class="rating2" type="radio"
                                                                                id="star1" name="rating" value="1"
                                                                                {{ $rate == 1 ? 'checked' : '' }} />
                                                                            <label for="star1">1 star</label>
                                                                        </fieldset>
                                                                        <input class="rate_id" type="hidden"
                                                                            name="id" required=""
                                                                            value="{{ $project->id }}">
                                                                        {{-- <span class="review-no">422 reviews</span> --}}
                                                                        {{-- <br /> --}}
                                                                        {{-- <button class="btn btn-success" type="submit">Submit rating</button> --}}
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form class="col-lg-12" method="post"
                                                        action="{{ route('comment.add') }}">
                                                        @csrf
                                                        @method('POST')
                                                        <div class="col-lg-12">
                                                            <div class="form-singel">
                                                                <textarea style="width: 100%" name="comment"
                                                                    placeholder="Comment"></textarea>
                                                                <input type="hidden" name="project_id"
                                                                    value="{{ $project->id }}" />

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-singel">
                                                                <button class="main-btn" type="submit">Post
                                                                    Comment</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div> <!-- row -->
                                            </div>
                                        @else
                                            <h2>Please Loggin to Leave a comment or rate</h2>
                                        @endif

                                    </div> <!-- reviews cont -->
                                </div>
                            </div> <!-- tab content -->
                        </div>
                    </div> <!-- corses singel left -->

                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="course-features mt-30">
                                <h4>Project Features </h4>
                                @auth
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i>Date : <span>{{ $project->created_at }}</span></li>
                                        <li><i class="fa fa-clone"></i>File : <span><a
                                                    href="{{ asset('uploads/docs/' . $project->path) }}"><i
                                                        class="fa fa-download"></i> </a></span></li>
                                        <li><i class="fa fa-clone"></i>Presentation : <span><a
                                                    href="{{ asset('uploads/ppt/' . $project->ppt) }}"><i
                                                        class="fa fa-download"></i></a></span></li>
                                        <li><i class="fa fa-clone"></i>Code : <span><a
                                                    href="{{ asset('uploads/code/' . $project->code) }}"><i
                                                        class="fa fa-download"></i> </a></span></li>
                                        <li><i class="fa fa-link"></i>Host : <span><a
                                                    href="{{ $project->host }}">{{ $project->host }}</a></span></li>
                                        <li><i class="fa fa-github"></i>Github : <span><a
                                                    href="{{ $project->github }}">{{ $project->github }}</a></span></li>
                                    </ul>
                                @else
                                    <h6 class="pt-10 text-capitalize text-warning">Please Login to access project files</h3>
                                    @endauth
                                    <div class="price-button pt-10">
                                        <span>Grade : <b>
                                                @if ($project->grade)
                                                    {{ $project->grade }}
                                                @else
                                                    grade not set yet
                                                @endif
                                            </b></span>
                                    </div>
                            </div> <!-- course features -->
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="You-makelike mt-30">
                                <h4>Upcomming Events </h4>
                                @foreach ($upcomingEvents as $item)
                                    <div class="singel-makelike mt-20">
                                        <div class="image">
                                            <img src="{{ asset('home/images/your-make/y-1.jpg') }}" alt="Image">
                                        </div>
                                        <div class="cont">
                                            <a href="#">
                                                <h4>{{ $item->title }} </h4>
                                            </a>
                                            <ul>
                                                <li style="color: gold">

                                                    <span><i class="fa fa-clock-o"></i> {{ $item->time }}</span>
                                                    <span><i class="fa fa-map-marker"></i> {{ $item->location }} </span>
                                                </li>
                                                <li style="color: gold"><i class="fa fa-user"></i>
                                                    {{ $item->studentsForm->Firstname }}
                                                    {{ $item->studentsForm->Lastname }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="releted-courses pt-95">
                        <div class="title">
                            <h3>Releted Projects</h3>
                        </div>
                        <div class="row">
                            @foreach ($relatedProject as $item)
                                <div class="col-md-6"
                                    style="display: flex; justify-content: center; flex-direction: row; align-items: stretch; align-content: center;">
                                    <div class="singel-course mt-30">
                                        <div class="thum">
                                            <div class="image">
                                                <img style="height: 250px !important;width:400px !important; display: flex; align-items: stretch"
                                                    src="{{ asset($item->cover_path) }}" alt="Project">
                                            </div>
                                            <div class="price">
                                                <span>Free</span>
                                            </div>
                                        </div>
                                        <div class="cont">
                                            <ul>
                                                <li><a href=""
                                                        style="color:{{ $item->averageRating >= 1 ? 'gold' : '#958f8f' }}"><i
                                                            class="fa fa-star"></i></a></li>
                                                <li><a href=""
                                                        style="color:{{ $item->averageRating >= 2 ? 'gold' : '#958f8f' }}"><i
                                                            class="fa fa-star"></i></a></li>
                                                <li><a href=""
                                                        style="color:{{ $item->averageRating >= 3 ? 'gold' : '#958f8f' }}"><i
                                                            class="fa fa-star"></i></a></li>
                                                <li><a href=""
                                                        style="color:{{ $item->averageRating >= 4 ? 'gold' : '#958f8f' }}"><i
                                                            class="fa fa-star"></i></a></li>
                                                <li><a href=""
                                                        style="color:{{ $item->averageRating >= 5 ? 'gold' : '#958f8f' }}"><i
                                                            class="fa fa-star"></i></a></li>
                                            </ul>
                                            <span>({{ $item->ratings->count() }} Reviws)</span>
                                            <a href="courses-singel.html">
                                                <h4>{{ $item->projectForm->title }}</h4>
                                            </a>
                                            <div class="course-teacher">
                                                <div class="thum">
                                                    <a href="#"><img
                                                            src="{{ asset($item->projectForm->studentsForm->image_path) }}"
                                                            alt="teacher"></a>
                                                </div>
                                                <div class="name">
                                                    <a href="#">
                                                        <h6>{{ $item->projectForm->studentsForm->Firstname }}
                                                            {{ $item->projectForm->studentsForm->Lastname }}</h6>
                                                    </a>
                                                </div>
                                                <div class="admin">
                                                    <ul>
                                                        <li><a href="#"><i
                                                                    class="fa fa-comment"></i><span>{{ $item->comments->count() }}</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- singel course -->
                                </div>
                            @endforeach


                        </div> <!-- row -->
                    </div> <!-- releted courses -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== COURSES SINGEl PART ENDS ======-->

@endsection

@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('input[type=radio][name=rating]').change(function(e) {
            e.preventDefault();
            alert($('.rating:checked').val());
            $.ajax({
                type: 'POST',
                url: '/projects/rateProject',
                data: {
                    rating: $('.rating2:checked').val(),
                    id: $('.rate_id').val(),
                },
                success: function(response) {
                    alert("Your rate saved !");
                }
            });
        });
    </script>


@endpush
