@extends('layouts.app')


@section('content')
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
    style="background-image: url({{ asset('home/images/page-banner-2.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Our Projects</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Projects</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== COURSES PART START ======-->

<section id="courses-part" class="pt-120 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="courses-top-search">
                    <ul class="nav float-left" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab"
                                aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                        </li>
                        <li class="nav-item">Showning {{$projects->count()}} Results</li>
                    </ul> <!-- nav -->
                    <div class="courses-search float-right">
                        <form action="{{ route('search') }}" method="GET">
                            <div style="display: inline-block;">
                                <select name="filter" class="form-control">
                                <option value="">Filter</option>
                                <option value="last" {{request()->filter == "last" ? 'selected' : ''}}>Last Project</option>
                                <option value="rated" {{request()->filter == "rated" ? 'selected' : ''}}>High Rated</option>
                                <option value="grade" {{request()->filter == "grade" ? 'selected' : ''}}>High Grade</option>
                                </select>
                            </div>
                            <div style="display: inline-block;">
                                <select name="colleague" class="form-control">
                                <option value="">All Colleagues</option>
                                @foreach ($collegues as $collegue)
                                <option value="{{$collegue->id}}" {{request()->colleague == $collegue->id ? 'selected' : ''}}>{{$collegue->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div style="display: inline-block;">
                                <select name="category" class="form-control">
                                <option value="">All Category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{request()->category == $category->id ? 'selected' : ''}}>{{$category->type}}</option>
                                @endforeach
                                </select>
                            </div>
                            <input type="text" name="search" placeholder="Search by keyword">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div> <!-- project search -->



                </div> <!-- project top search -->
            </div>
        </div> <!-- row -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                <div class="row">
                    @foreach ($projects as $item)

                    <div class="col-lg-4 col-md-6"
                        style="display: flex; justify-content: center; flex-direction: row; align-items: stretch; align-content: center; ">
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
                            <div class="cont">
                                <div class="course-teacher" style="border-bottom: 1px solid #e0e0e0; border-top: none;padding-top: 0;
                                padding-bottom: 10px;">
                                    <div class="thum">
                                        <a href="{{ route('student', ['id'=>$item->students->first()->id]) }}"><img
                                                src="{{ asset($item->students->first()->image_path) }}"
                                                alt="teacher"></a>
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
                        </div> <!-- singel course -->
                    </div>
                    @endforeach

                </div> <!-- row -->
            </div>


        </div> <!-- tab content -->
        <div class="row">
            <div class="col-lg-12">
                <nav class="courses-pagination mt-50">
                    <ul class="pagination justify-content-center">
                        {{$projects->links()}}
                    </ul>
                </nav> <!-- courses pagination -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
@endsection
