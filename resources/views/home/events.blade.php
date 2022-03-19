@extends('layouts.app')

@section('content')

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('home/images/page-banner-3.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Events</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<section id="event-page" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">

            @foreach ($events as $item)
            <div class="col-lg-6">
                <div class="singel-event-list mt-30">
                    <div class="event-thum">
                        <img style="max-height: 200px; max-width: 200px;" src="{{ asset($item->project->cover_path) }}"
                            alt="Event">
                    </div>
                    <div class="event-cont">
                        <span><i class="fa fa-calendar"></i> {{$item->date}}</span>
                        <a href="{{ route('project', ['id'=>$item->id]) }}">
                            <h4>{{$item->title}} </h4>
                        </a>
                        <span><i class="fa fa-clock-o"></i> {{ $item->time  }}</span>
                        <span><i class="fa fa-map-marker"></i> {{$item->location}}</span>
                        <h5 style="font-weight: lighter; margin: 10px 0;">Student : {{$item->studentsForm->Firstname}}
                            {{$item->studentsForm->Lastname}}</h5>
                        <h6 style="font-weight: lighter; margin: 10px 0;">Collegue :
                            {{$item->studentsForm->collegue->name}}</h6>
                        <h6 style="font-weight: lighter; margin: 10px 0;">Project type : {{$item->category->type}}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <nav class="courses-pagination mt-50">
                    <ul class="pagination justify-content-center">
                        {{$events->links()}}
                    </ul>
                </nav> <!-- courses pagination -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>


@endsection
