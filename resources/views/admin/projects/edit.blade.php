@extends('admin.layouts.app')

@section('container')

<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <div class="panel-body">
                <div class="form">
                    <form class="form-validate form-horizontal " id="FormProject" method="post"
                        action="{{ route('admin.projects.update', ['id'=>$project->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2">Name <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <input class=" form-control" id="name" name="name" type="text"
                                    value="{{$project->name}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="control-label col-lg-2">Category <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <select name="category_id" class="form-control">
                                    <option value="">Please select value</option>
                                    @foreach ($categories as $item)
                                    <option {{$item->id == $project->category->id ? 'selected' : ''}}
                                        value="{{$item->id}}">{{$item->type}}</option>
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
                        {{-- image --}}
                        <div class="form-group row">
                            <label for="cover" class="control-label col-lg-2">Cover Image</label>
                            <div class="col-lg-9">
                                <input type="file" class="form-control-file" name="cover" value="{{old('cover')}}"
                                id="cover" placeholder="" aria-describedby="fileHelpId">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="control-label col-lg-2">preview</label>
                            <div class="col-lg-9">
                                <img src="{{ asset('uploads/cover/images/'.$project->cover) }}"
                                    style=" margin-top: 10px; width: 50px; height: 50;" alt="">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="overview" class="control-label col-lg-2">Overview</label>
                            <div class="col-lg-9">
                            <textarea id="" name="overview" id="overview"
                                class="form-control col-lg-9">{{$project->overview}}</textarea>
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="status" class="control-label col-lg-2">Status <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <select name="status" class="form-control">
                                    <option value="">Please select value</option>

                                    <option {{$project->status == 'pending' ? 'selected' : ''}} value="pending"
                                        class="text-warning">Pending</option>
                                    <option {{$project->status == 'approved' ? 'selected' : ''}} value="approved"
                                        class="text-success">Approved</option>
                                    <option {{$project->status == 'rejected' ? 'selected' : ''}} value="rejected"
                                        class="text-danger">Rejected</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="grade" class="control-label col-lg-2">Grade <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <input value="{{$project->grade}}" type="number" name="grade" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="control-label col-lg-2">Student <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <select name="student_id[]" class="form-control select2 js-example-basic-multiple"
                                    multiple="multiple">
                                    @foreach ($students as $key=>$item)
                                    <option {{ in_array($item->id, $project->students->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$item->id}}">
                                        {{$item->Firstname}} {{$item->Lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Instructor" class="control-label col-lg-2">Professor <span
                                    class="required">*</span></label>
                            <div class="col-lg-9">
                                <select name="professor_id" class="form-control">
                                    <option value="">Please select value</option>
                                    @foreach ($professors as $item)
                                    <option {{$item->id == $project->professors()->first()->id ? 'selected' : ''}}
                                        value="{{$item->id}}">{{$item->Firstname}} {{$item->Lastname}}</option>
                                    @endforeach
                                </select>
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



@section('script')
<script>
        quill2.setContents(<?=$project->overview?>);
</script>

@endsection
