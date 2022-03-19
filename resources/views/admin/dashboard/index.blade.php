@extends('admin.layouts.app')

@section('container')
<!--main content start-->
<section id="main-content">
   <div class="container-fluid">
    <section class="wrapper">


        <div class="row justify-content-center">


            <div class="col-xs-12 col-lg-12">
                <h1 class="" style="color: #fed189; margin-top: 0;margin-bottom: 20px;text-align: center;
            font-weight: normal;">UOK <span class="lite">Project</span></h1>
            </div>
            <div class="card col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-2" style="margin: 15px;padding: 25px;
                border-radius: 25px;
                font-size: 20px;
                font-weight: initial; background-color: gold;
color: white;">
                <div class="info-box blue-bg">
                    <div class="card-title">
                        <i class=" fa fa-users" style="font-size: 40px"></i>
                    </div>
                    <div class="text-end count">{{$students}} </div>
                    <div class="title">Students</div>
                </div>
                <!--/.info-box-->
            </div>
            <!--/.col-->



            <div class="card col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin: 15px;padding: 25px;
        border-radius: 25px;
        font-size: 20px;
        font-weight: initial; background-color: greenyellow;
color: white;">
                <div class="info-box blue-bg">
                    <div class="card-title">
                        <i class=" fa fa-user" style="font-size: 40px"></i>
                    </div>
                    <div class="text-end count">{{$professors}} </div>
                    <div class="title">Professors</div>
                </div>
                <!--/.col-->
            </div>

            <div class="card col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin: 15px;padding: 25px;
        border-radius: 25px;
        font-size: 20px;
        font-weight: initial; background-color: blueviolet;
color: white;">
                <div class="info-box blue-bg">
                    <div class="card-title">
                        <i class=" fas fa-book" style="font-size: 40px"></i>
                    </div>
                    <div class="text-end count">{{$projects}} </div>
                    <div class="title">Projects </div>
                </div>
                <!--/.col-->

            </div>
            <!--/.row-->



            <div class="card col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin: 15px;padding: 25px;
        border-radius: 25px;
        font-size: 20px;
        font-weight: initial;background-color: aquamarine;
color: white;">
                <div class="info-box blue-bg">
                    <div class="card-title">
                        <i class=" fas fa-graduation-cap" style="font-size: 40px"></i>
                    </div>
                    <div class="text-end count">{{$collegues}} </div>
                    <div class="title">Collegues </div>
                </div>
                <!--/.col-->

            </div>
            <!--/.row-->


            <div class="card col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin: 15px;padding: 25px;
        border-radius: 25px;
        font-size: 20px;
        font-weight: initial;background-color: violet;
color: white;">
                <div class="info-box blue-bg">
                    <div class="card-title">
                        <i class=" fa fa-globe" style="font-size: 40px"></i>
                    </div>
                    <div class="text-end count">{{$categories}} </div>
                    <div class="title">Categories </div>
                </div>
                <!--/.col-->

            </div>
            <!--/.row-->


            <div class="card col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin: 15px;padding: 25px;
        border-radius: 25px;
        font-size: 20px;
        font-weight: initial;    background-color: coral;
    color: white;
}">
                <div class="info-box blue-bg">
                    <div class="card-title">
                        <i class=" fas fa-comment" style="font-size: 40px"></i>
                    </div>
                    <div class="text-end count">{{$comments}} </div>
                    <div class="title">Comments </div>
                </div>
                <!--/.col-->

            </div>
            <!--/.row-->


    </section>
   </div>
    <div class="text-right">
        <div class="credits">
            UOK <a href="">Project</a>
        </div>
    </div>
</section>
<!--main content end-->
@endsection
