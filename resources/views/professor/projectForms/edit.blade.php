@extends('professor.layouts.app')

@section('container')

<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <div class="panel-body">
                <div class="form" style="">
                    @if ($projectForm->status=='rejected')
                    <div class="form-group row" style="">
                        <label for="about" class="control-label col-lg-2">Rejected Message : <span
                                class="required"></span></label>
                        <div class="col-lg-9 bg-danger text-white text-capitalize" style="padding: 15px 10px;
                        margin-left: 12px;
                        border-radius: 15px;
                        font-weight: bold;">
                            {{$projectForm->reject_message}}
                            </div>
                    </div>
                    @endif
                        <div class="form-group row center">
                            <label for="title" class="control-label col-lg-2 ">Title <span
                                    class="required"></span></label>
                            <div class="col-lg-4">
                                <p>{{$projectForm->title}}</p>
                            </div>

                        </div>


                        <div class="form-group row ">
                            <label for="category" class="control-label col-lg-2  ">Category <span
                                    class="required"></span></label>
                            <div class="col-lg-4">
                                @foreach ($categories as $item)
                                @if($item->id == $projectForm->category_id)
                                <p>{{$item->type}}</p>
                                @endif
                                @endforeach
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label for="user_id" class="control-label col-lg-2  ">Student <span
                                    class="required"></span></label>

                            <div class="col-lg-4">
                                <p>{{$projectForm->studentsForm->Firstname}} {{$projectForm->studentsForm->Lastname}}
                                </p>
                            </div>

                        </div>


                        <div class="form-group row ">
                        <label for="Instructor" class="control-label col-lg-2  ">Professor Supervisor <span
                                class="required"></span></label>
                        <div class="col-lg-4">
                            @foreach ($professors as $item)
                            @if($item->id == $projectForm->professorSupervisor)
                            <p>{{$item->Firstname}} {{$item->Lastname}}</p>
                            @endif
                            @endforeach

                        </div>
                </div>




                <div class="form-group row">
                    <label for="skills" class="control-label col-lg-2  ">Skills <span class="required"></span></label>
                    <div class="col-lg-7">
                        <p>{{$projectForm->skills}}</p>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="goal" class="control-label col-lg-2  ">Goals <span class="required"></span></label>
                    <div class="col-lg-7">
                        <p>{{$projectForm->goal}}</p>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="about" class="control-label col-lg-2  ">About <span class="required"></span></label>
                    <div class="col-lg-7">
                        <p>{{$projectForm->about}}</p>
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-lg-12">
                        @can('HeadOfDepartment')
                        <form action="{{ route('professor.projectForms.makeEvent', ['id'=>$projectForm->id]) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <label for="" class="control-label col-lg-2" style="">
                                    Date
                                </label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="date" name="date" id="date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="control-label col-lg-2">
                                    Time
                                </label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="time" name="time" id="time" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="control-label col-lg-2">
                                    Location
                                </label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" name="location" id="location" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success text-white">Approve</button>
                        </form>
                        <form action="{{ route('professor.projectForms.reject_message', ['id'=>$projectForm->id]) }}" class="row" style="    margin-top: 10px;">
                            @csrf
                            @method('POST')
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-danger text-white">Reject</button>
                            </div>
                            <div class="col-lg-6">
                            <textarea name="reject_message" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </form>


                        @endcan
                        @cannot('HeadOfDepartment')
                        <a href="{{ route('professor.projectForms.professorApprove', ['id'=>$projectForm->id]) }}" class="btn btn-success text-white mt-10">Approve</a><br>
                        <form action="{{ route('professor.projectForms.reject_message', ['id'=>$projectForm->id]) }}" method="POST" class="row" style="    margin-top: 10px;">
                            @csrf
                            @method('POST')
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-danger text-white">Reject</button>
                            </div>
                            <div class="col-lg-6">
                            <textarea name="reject_message" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </form>
                        @endcannot

                    </div>
                </div>
            </div>
        </div>
        </div>


    </section>
</section>

@endsection
