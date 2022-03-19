@extends('layouts.app')

@section('content')


<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
    style="background-image: url({{ asset('home/images/page-banner-3.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Students</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Students</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== TEACHERS PART START ======-->

<section id="teachers-page" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            @foreach ($students as $item)
            <div class="col-lg-3 col-sm-6" style="display: flex; justify-content: center; flex-direction: row; align-items: stretch; align-content: center; ">
                <div class="singel-teachers mt-30 text-center" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="image" style="height: 250px; width: 250px; display: flex; align-items: stretch">
                        <img src="{{ asset($item->image_path) }}" alt="">
                    </div>
                    <div class="cont">
                        <a href="{{ route('student', ['id'=>$item->id]) }}">
                            <h6>{{$item->Firstname}} {{$item->Lastname}}</h6>
                        </a>
                        <span><i class="fa fa-graduation-cap"> </i> {{$item->collegue->name}}</span>
                    </div>
                </div> <!-- singel teachers -->
            </div>

            @endforeach
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <nav class="courses-pagination mt-50">
                    <ul class="pagination justify-content-center">
                        {{$students->links()}}
                    </ul>
                </nav> <!-- courses pagination -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== TEACHERS PART ENDS ======-->

@endsection
