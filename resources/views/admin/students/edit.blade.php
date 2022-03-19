@extends('admin.layouts.app')

@section('container')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body profile-card">
                    <center class="mt-4"> <img src="{{ asset($student->image_path) }}" class="rounded-circle" width="150" />
                        <h4 class="card-title mt-2">Update</h4>
                        <h6 class="card-subtitle">Student</h6>
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <a href="javascript:void(0)" class="link">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                    <span class="font-normal">{{$student->projects->count()}}</span>
                                </a></div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" id="FormID" method="post"
                        action="{{ route('admin.students.update', ['id'=>$student->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label class="col-md-12 mb-0">First Name</label>
                            <div class="col-md-12">
                                <input type="text" name="Firstname" placeholder="First name"
                                    class="form-control ps-0 form-control-line" value="{{$student->Firstname}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Last Name</label>
                            <div class="col-md-12">
                                <input type="text" name="Lastname" placeholder="Last name"
                                    class="form-control ps-0 form-control-line" value="{{$student->Lastname}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" placeholder="student@uok.com"
                                    class="form-control ps-0 form-control-line" name="email" id="example-email"
                                    value="{{$student->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Password</label>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        {{--image--}}
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="img_path" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="About" class="col-md-12 mb-0">About</label>
                            <div class="col-md-12">
                            <textarea id="" name="About" id="About"
                                class="form-control col-lg-8">{{$student->About}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Github</label>
                            <div class="col-md-12">
                                <input type="text" name="github" placeholder="https://www.github.com"
                                    class="form-control ps-0 form-control-line" value="{{$student->github}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 mb-0">LinkedIn</label>
                            <div class="col-md-12">
                                <input type="text" name="linkedin" placeholder="https://www.Linkedin.com"
                                    class="form-control ps-0 form-control-line" value="{{$student->linkedin}}">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="category" class="control-label col-lg-2">Collegue</label>
                            <div class="col-lg-9">
                                <select name="collegue_id" class="form-control">
                                    <option value="">Please select value</option>
                                    @foreach ($collegues as $item)
                                    <option {{$item->id == $student->collegue->id ? 'selected' : ''}}
                                        value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Address</label>
                            <div class="col-md-12">
                                <input type="text" name="Address" placeholder="Damas 011"
                                    class="form-control ps-0 form-control-line" value="{{$student->Address}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="control-label col-md-12">Gender </label>
                            <div class="col-md-12">
                                <select name="Gender" class="form-control" id="Gender">
                                    <option value="male" {{$student->Gender == 'male' ? 'selected' : ''}}>Male</option>
                                    <option value="female" {{$student->Gender == 'female' ? 'selected' : ''}}>Female
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 mb-0">Reg Year</label>
                            <div class="col-md-12">
                                <input type="year" name="RegYeer" placeholder="2021"
                                    class="form-control ps-0 form-control-line" value="{{$student->RegYeer}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Phone No</label>
                            <div class="col-md-12">
                                <input type="text" name="mobileNo" placeholder="123 456 7890"
                                    class="form-control ps-0 form-control-line" value="{{$student->mobileNo}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit" class="btn btn-primary mx-auto mx-md-0 text-white">Update
                                    Profile</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>

@endsection


@section('script')
<script>
    quill.setContents(<?=$student->About?>);
</script>

@endsection
