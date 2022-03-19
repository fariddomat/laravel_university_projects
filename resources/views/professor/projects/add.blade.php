@extends('professor.layouts.app')

@section('container')


<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <div class="panel-body">
                <div class="form">
                    @include("errors._errors")
                    <form class="form-validate form-horizontal " id="FormProject2" method="post"
                        action="{{ route('professor.projects.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2">Name <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <input class=" form-control" id="name" name="name" type="text" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="control-label col-lg-2">Category <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <select name="category_id" class="form-control">
                                    <option value="">Please select value</option>
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file" class="control-label col-lg-2">File <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <input class=" form-control" id="file" name="file" type="file" />
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="overview" class="control-label col-lg-2">Overview</label>
                            <div class="col-lg-9">
                            <textarea id="" name="overview" id="overview"
                                class="form-control col-lg-9"></textarea>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="status" class="control-label col-lg-2">Status <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <select name="status" class="form-control">
                                    <option value="">Please select value</option>

                                    <option value="pending" class="text-warning">Pending</option>
                                    <option value="approved" class="text-success">Approved</option>
                                    <option value="rejected" class="text-danger">Rejected</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="grade" class="control-label col-lg-2">Grade <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <input type="number" name="grade" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="control-label col-lg-2">Student <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <select name="student_id[]" class="form-control select2 js-example-basic-multiple"  multiple="multiple">
                                    @foreach ($students as $item)
                                    <option value="{{$item->id}}">{{$item->Firstname}} {{$item->Lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-9">
                                <button class="btn btn-primary" type="submit">Save</button>
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
