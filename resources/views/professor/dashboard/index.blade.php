@extends('professor.layouts.app')

@section('container')

<body>

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">


            <div class="row  justify-content-center">


                <div class="col-xs-12 col-lg-12">
                    <h1 class="" style="color: #fed189; margin-top: 0;margin-bottom: 20px;text-align: center;
                font-weight: normal;">UOK <span class="lite">Project</span></h1>
                </div>



                <div class="card col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin: 15px;padding: 25px;
        border-radius: 25px;
        font-size: 20px;
        font-weight: initial;background-color: gold;
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
                <div class="card col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-2" style="margin: 15px;padding: 25px;
                border-radius: 25px;
                font-size: 20px;
                font-weight: initial; background-color: aquamarine;
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
