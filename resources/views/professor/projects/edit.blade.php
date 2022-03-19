@extends('professor.layouts.app')

@section('container')

<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <div class="panel-body">
                <div class="form">
                    <div class="form-validate form-horizontal " id="FormProject2">
                        <input type="hidden" name="project_forms_id" value="{{$project->id}}">

                        <div class="form-group row">
                            <label for="" class="control-label col-lg-2">Name <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <input class=" form-control" id="title" name="title" type="text"
                                    value="{{$project->projectForm->title}}"   disabled />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="control-label col-lg-2">Category <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <select name="" class="form-control"  disabled >
                                    <option value="">Please select value</option>
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}" {{$item->id == $project->projectForm->category_id ? 'selected' : ''}}>{{$item->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="control-label col-lg-2">Student <span
                                    class="required">*</span></label>
                            <div class="col-lg-2">
                                <select name="" id="" class="form-control col-lg-2"  disabled >
                                    <option selected>
                                        {{$project->projectForm->studentsForm->Firstname}} {{$project->projectForm->studentsForm->Lastname}}</option>

                                </select>
                            </div>
                            <div class="col-lg-7">


                                <select name=""  disabled  class="form-control select2 js-example-basic-multiple"
                                    multiple="multiple">
                                    @foreach ($students as $item)
                                    <option value="{{$item->id}}" {{$item->id == $project->projectForm->studentsForm->id ? '  disabled ': ''}}>
                                        {{$item->Firstname}} {{$item->Lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Instructor" class="control-label col-lg-2">Professor <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <select name=""  disabled  class="form-control">
                                    <option value="">Please select value</option>
                                    @foreach ($professors as $item)
                                    <option {{$item->id == Auth::user()->id ? 'selected' : ''}}
                                        value="{{$item->id}}">{{$item->Firstname}} {{$item->Lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="skills" class="control-label col-lg-2">Skills <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="" id="skills"  disabled >{{$project->projectForm->skills}} </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="goal" class="control-label col-lg-2">Goals <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="" id="goal"  disabled >{{$project->projectForm->goal}} </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="about" class="control-label col-lg-2">About <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="" id="about"  disabled >{{$project->projectForm->about}} </textarea>
                            </div>
                        </div>



                        {{-- <div class="form-group row">
                            <label for="grade" class="control-label col-lg-2">Grade <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <input value="{{$project->grade}}" type="number" name="grade" class="form-control">
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="file" class="control-label col-lg-2">Cover image <span class="required"></span></label>
                            <div class="col-lg-9"><img src="{{ asset('uploads/cover/images/'.$project->cover) }}" alt="" style="max-width: 200px" >
                                <a href="{{ asset('uploads/cover/images/'.$project->cover) }}"><i
                                    class="fa fa-download text-success"></i> {{$project->name}}</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file" class="control-label col-lg-2">Doc <span class="required">*</span></label>
                            <div class="col-lg-9">
                                <a href="{{ asset('uploads/docs/'.$project->path) }}"><i
                                    class="fa fa-download text-success"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ppt" class="control-label col-lg-2">PPT <span class="required">*</span></label>
                            <div class="col-lg-9">
                                <a href="{{ asset('uploads/ppt/'.$project->ppt) }}"><i
                                    class="fa fa-download text-success"></i> </a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="control-label col-lg-2">Code Files <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <a href="{{ asset('uploads/code/'.$project->code) }}"><i
                                    class="fa fa-download text-success"></i> </a>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-2">Host <span
                                    class="required"></span></label>
                            <div class="col-lg-9">
                                <a href="{{$project->host}}">{{$project->host}}</a>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-2">Github <span
                                    class="required"></span></label>
                            <div class="col-lg-9">
                                <a href="{{$project->github}}">{{$project->github}}</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2">
                                <label class="control-label">Action</label>
                            </div>
                            <div class="col lg-10 row">
                                <form action="{{route('professor.projects.complete',$project->id)}}" method="POST"
                                    style="display: inline-block">
                                    @csrf
                                    @method('Post')
                                    <td><input type="text" name="grade" class="form-control"
                                            value="{{$project->grade}}" style="display: inline-block;max-width: 200px;
                                            border-radius: 15px;" placeholder="Grade">
                                    </td>
                                    <td>
                                        <div class="btn-group" style="">
                                            <button type="submit" class="btn btn-success delete text-white"
                                                style="display: inline-block; margin-right: 3px;"> <i
                                                    class="fa fa-check" aria-hidden="true"> </i> Complete</button>
                                </form>

                                <form action="{{route('professor.projects.incomplete',$project->id)}}" method="POST"
                                    style="display: inline-block">
                                    @csrf
                                    @method('Post')
                                    <button type="submit" class="btn btn-warning text-white"
                                        style="display: inline-block; margin-right: 5px "><i class="fa fa-info"
                                            aria-hidden="true"></i> InComplete</button>
                                </form>

                                <form action="{{route('professor.projects.reject',$project->id)}}" method="POST"
                                    style="display: inline-block">
                                    @csrf
                                    @method('Post')
                                    <button type="submit" class="btn btn-danger delete text-white"
                                        style="display: inline-block; "><i class="fa fa-trash"
                                            aria-hidden="true"></i> Reject</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
</section>

@endsection


@section('script2')
<script>
    quill2.setContents(<?="$project->overview"?>);
</script>

@endsection
