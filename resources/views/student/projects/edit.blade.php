@extends('student.layouts.app')

@section('container')

<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <div class="panel-body">
                <div class="form">

                @extends("errors._errors");
                    <form class="form-validate form-horizontal " id="FormProject2" method="post"
                        action="{{ route('student.projects.store', ['id'=>$project->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="project_forms_id" value="{{$project->id}}">

                        <div class="form-group row">
                            <label for="" class="control-label col-lg-2">Name <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <input class=" form-control" id="title" name="title" type="text"
                                    value="{{$project->title}}"   disabled />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="control-label col-lg-2">Category <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <select name="" class="form-control"  disabled >
                                    <option value="">Please select value</option>
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}" {{$item->id == $project->category_id ? 'selected' : ''}}>{{$item->type}}</option>
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
                                        {{Auth::user()->Firstname}} {{Auth::user()->Lastname}}</option>

                                </select>
                            </div>
                            <div class="col-lg-7">


                                <select name=""  disabled  class="form-control select2 js-example-basic-multiple"
                                    multiple="multiple">
                                    @foreach ($students as $item)
                                    <option value="{{$item->id}}" {{$item->id == Auth::user()->id ? '  disabled ': ''}}>
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
                                    <option {{$item->id == $project->professorSuper()->first()->id ? 'selected' : ''}}
                                        value="{{$item->id}}">{{$item->Firstname}} {{$item->Lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="skills" class="control-label col-lg-2">Skills <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="" id="skills"  disabled >{{$project->skills}} </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="goal" class="control-label col-lg-2">Goals <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="" id="goal"  disabled >{{$project->goal}} </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="about" class="control-label col-lg-2">About <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="" id="about"  disabled >{{$project->about}} </textarea>
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
                            <div class="col-lg-9">
                                <input class=" form-control" id="cover" name="cover" type="file" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file" class="control-label col-lg-2">Doc <span class="required">*</span></label>
                            <div class="col-lg-9">
                                <input class=" form-control" id="file" name="file" type="file" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ppt" class="control-label col-lg-2">PPT <span class="required">*</span></label>
                            <div class="col-lg-9">
                                <input class=" form-control" id="ppt" name="ppt" type="file" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="control-label col-lg-2">Code Files <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <input class=" form-control" id="code" name="code" type="file" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-2">Host <span
                                    class="required"></span></label>
                            <div class="col-lg-9">
                                <input value="" class=" form-control" id="host" name="host" type="text" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-2">Github <span
                                    class="required"></span></label>
                            <div class="col-lg-9">
                                <input value="" class=" form-control" id="github" name="github" type="text" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Update</button>
                                <button class="btn btn-default" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>
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
