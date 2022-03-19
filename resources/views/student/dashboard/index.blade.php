@extends('student.layouts.app')

@section('container')

<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row   justify-content-center">


            <div class="col-xs-12 col-lg-12">
                <h1 class="" style="color: #fed189; margin-top: 0;margin-bottom: 20px;text-align: center;
                font-weight: normal;">UOK <span class="lite">Projects</span></h1>
            </div>


            <div class="card col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin: 15px;padding: 25px;
            border-radius: 25px;
            font-size: 20px;
            font-weight: initial;background-color: greenyellow;
color: white;">
                <div class="info-box blue-bg">
                    <div class="card-title">
                        <i class=" fas fa-book" style="font-size: 40px"></i>
                    </div>
                    <div class="text-end count">{{$projects}} </div>
                    <div class="title">Completed Projects </div>
                </div>
                <!--/.col-->

            </div>
            <!--/.row-->


            <div class="card col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin: 15px;padding: 25px;
            border-radius: 25px;
            font-size: 20px;
            font-weight: initial;background-color: gold;
color: white;">
                <div class="info-box blue-bg">
                    <div class="card-title">
                        <i class=" fas fa-book" style="font-size: 40px"></i>
                    </div>
                    <div class="text-end count">{{$projects2}} </div>
                    <div class="title">InCompleted Projects </div>
                </div>
                <!--/.col-->

            </div>
            <!--/.row-->

            <div class="card col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin: 15px;padding: 25px;
            border-radius: 25px;
            font-size: 20px;
            font-weight: initial;background-color: red;
color: white;">
                <div class="info-box blue-bg">
                    <div class="card-title">
                        <i class=" fas fa-book" style="font-size: 40px"></i>
                    </div>
                    <div class="text-end count">{{$projects3}} </div>
                    <div class="title">Rejected Projects </div>
                </div>
                <!--/.col-->

            </div>
            <!--/.row-->



    </section>
    <div class="text-right">
        <div class="credits">
            UOK <a href="">Project</a>
        </div>
    </div>
</section>
<!--main content end-->
</section>
<!-- container section start -->
@endsection
