@extends('student.layouts.app')

@section('container')

<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <div class="panel-body">
                <div class="form">
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
                    <form class="form-validate form-horizontal " id="FormProject2" method="post"
                        action="{{ route('student.projectForms.update', ['id'=>$projectForm->id]) }}">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-2">Title <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <input value="{{$projectForm->title}}" class=" form-control" id="title" name="title" type="text" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="control-label col-lg-2">Category <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <select name="category_id" class="form-control">
                                    <option value="">Please select value</option>
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}" {{$item->id == $projectForm->category_id ? 'selected' : ''}}>{{$item->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Instructor" class="control-label col-lg-2">Professor Supervisor <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <select name="professorSupervisor" class="form-control">
                                    <option value="">Please select value</option>
                                    @foreach ($professors as $item)
                                    <option value="{{$item->id}}"  {{$item->id == $projectForm->professorSupervisor ? 'selected' : ''}}>{{$item->Firstname}} {{$item->Lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Instructor" class="control-label col-lg-2">Laboratory Supervisor <span
                                    class="required"></span></label>
                            <div class="col-lg-9">
                                <select name="laboratorySupervisor" class="form-control">
                                    <option value="">Optional select value</option>
                                    @foreach ($professors as $item)
                                    <option value="{{$item->id}}"  {{$item->id == $projectForm->laboratorySupervisor ? 'selected' : ''}}>{{$item->Firstname}} {{$item->Lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="user_id" class="control-label col-lg-2">Student <span
                                    class="required"></span></label>
                            <div class="col-lg-2">
                                <select name="" id="" class="form-control col-lg-2">
                                    <option selected>
                                        {{Auth::user()->Firstname}} {{Auth::user()->Lastname}}</option>
                                </select>
                            </div>
                            <div class="col-lg-7">
                                <select name="student_id[]" class="form-control select2 js-example-basic-multiple"
                                    multiple="multiple">
                                    @foreach ($students as $item)
                                    <option value="{{$item->id}}" {{$item->id == Auth::user()->id ? '  disabled ': ''}}>
                                        {{$item->Firstname}} {{$item->Lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="skills" class="control-label col-lg-2">Skills <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="skills" id="skills">{{$projectForm->skills}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="goal" class="control-label col-lg-2">Goals <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="goal" id="goal">{{$projectForm->goal}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="about" class="control-label col-lg-2">About <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="about" id="about">{{$projectForm->about}}</textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Update</button>
                                <a  class="btn btn-default" href="{{  redirect()->getUrlGenerator()->previous()  }}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>
</section>

@endsection


