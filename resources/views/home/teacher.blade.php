@extends('layouts.app')

@section('content')

<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8"
    style="background-image: url({{ asset('home/images/page-banner-3.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Teachers</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Teachers</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== TEACHERS PART START ======-->

<section id="teachers-singel" class="pt-70 pb-120 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-8">
                <div class="teachers-left mt-50">
                    <div class="hero"
                        style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <img style="max-height: 250px ;" src="{{ asset($professor->image_path) }}" alt="Teachers">
                    </div>
                    <div class="name">
                        <h6>{{$professor->Firstname}} {{$professor->Lastname}}</h6>
                        <span>
                            @foreach ($professor->roles->pluck('name') as $itemp)
                            @if ($itemp != 'Professor')
                            {{$itemp}}
                            @endif
                            @endforeach
                        </span>
                    </div>
                    <div class="social">
                        <ul>
                            <li><a href="{{$professor->github}}"><i class="fa fa-github-square"></i></a></li>
                            <li><a href="{{$professor->linkedin}}"><i class="fa fa-linkedin-square"></i></a></li>

                        </ul>
                    </div>

                </div> <!-- teachers left -->
            </div>
            <div class="col-lg-8">
                <div class="teachers-right mt-50">
                    <ul class="nav nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab"
                                aria-controls="dashboard" aria-selected="true">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses"
                                aria-selected="false">Projects</a>
                        </li>

                    </ul> <!-- nav -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                            aria-labelledby="dashboard-tab">
                            <div class="dashboard-cont">
                                <div class="singel-dashboard pt-40">
                                    <h5>About</h5>
                                    <p>
                                        {{$professor->About}}
                                    </p>
                                </div> <!-- singel dashboard -->
                                {{-- <div class="singel-dashboard pt-40">
                                    <h5>Acchivments</h5>
                                    <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
                                        auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh
                                        vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .
                                    </p>
                                </div> <!-- singel dashboard -->
                                <div class="singel-dashboard pt-40">
                                    <h5>My Objective</h5>
                                    <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
                                        auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh
                                        vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .
                                    </p>
                                </div> <!-- singel dashboard --> --}}
                            </div> <!-- dashboard cont -->
                        </div>
                        <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                            <div class="courses-cont pt-20">

                                @if ($professor->projects_info2->count() > 0 )
                                <div class="row">
                                    @foreach ($professor->projects_info2 as $key=>$project)
                                    @if ($key==2)
                                    <?php break; ?>
                                    @endif
                                    <div class="col-md-6" style="display: flex; justify-content: center; flex-direction: row; align-items: stretch; align-content: center;">
                                        <div class="singel-course mt-30">
                                            <div class="thum">
                                                <div class="image">
                                                    <img style="height: 250px !important;width:400px !important; display: flex; align-items: stretch" src="{{ $project->project->cover_path }}"
                                                        alt="Course">
                                                </div>
                                                <div class="price" style="right: auto;
                                left: 60px;">
                                    <span style="width: 100%;
                                    min-width: 55px;
                                    padding: 0 10px;
                                    background-color: #ff3c00;
                                    color: white;">{{$project->studentsForm->collegue->name}}</span>
                                </div>
                                <div class="price">
                                    <span style="width: 100%;
                                    border-radius: 15px;
                                    padding: 0 10px;
                                    color: white;">{{$project->category->type}}</span>
                                </div>
                                            </div>
                                            <div class="cont border">
                                                <ul>
                                                    <li><a href=""
                                                            style="color:{{ $project->averageRating >= 1 ? 'gold' :'#958f8f'}}"><i
                                                                class="fa fa-star"></i></a></li>
                                                    <li><a href=""
                                                            style="color:{{ $project->averageRating >= 2 ? 'gold' :'#958f8f'}}"><i
                                                                class="fa fa-star"></i></a></li>
                                                    <li><a href=""
                                                            style="color:{{ $project->averageRating >= 3 ? 'gold' :'#958f8f'}}"><i
                                                                class="fa fa-star"></i></a></li>
                                                    <li><a href=""
                                                            style="color:{{ $project->averageRating >= 4 ? 'gold' :'#958f8f'}}"><i
                                                                class="fa fa-star"></i></a></li>
                                                    <li><a href=""
                                                            style="color:{{ $project->averageRating >= 5 ? 'gold' :'#958f8f'}}"><i
                                                                class="fa fa-star"></i></a></li>
                                                </ul>

                                                <a href="{{ route('project', ['id'=>$project->id]) }}">
                                                    <h4>{{$project->title}}</h4>
                                                </a>
                                                <div class="course-teacher">
                                                    <div class="thum">
                                                        <a href="#"><img
                                                                src="{{ asset($project->professorSuper->image_path) }}"
                                                                alt="teacher"></a>
                                                    </div>
                                                    <div class="name">
                                                        <a
                                                            href="{{ route('teacher', ['id'=>$project->professorSuper->id]) }}">
                                                            <h6>{{$project->professorSuper->Firstname}}
                                                                {{$project->professorSuper->Lastname}}</h6>
                                                        </a>
                                                    </div>
                                                    <div class="admin">
                                                        <ul>
                                                            <li><a href="#"><i class="fa fa-comment"></i><span>{{$project->project->comments->count()}}</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- singel course -->
                                    </div>
                                    @endforeach

                                </div> <!-- row -->
                                @else
                                <h4 style="padding: 15px;" class="bg-warning text-white"> No projects belong to this
                                    Teacher !</h4>

                                @endif
                            </div> <!-- courses cont -->
                        </div>

                    </div> <!-- tab content -->
                </div> <!-- teachers right -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== EVENTS PART ENDS ======-->

@endsection
