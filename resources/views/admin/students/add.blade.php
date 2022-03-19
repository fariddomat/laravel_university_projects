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
                    <center class="mt-4"> <img src="../assets/images/users/5.jpg" class="rounded-circle" width="150" />
                        <h4 class="card-title mt-2">New</h4>
                        <h6 class="card-subtitle">Student</h6>
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <a href="javascript:void(0)" class="link">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                    <span class="font-normal">0</span>
                                </a></div>
                        </div>
                    </center>
                </div>
            </div>
            @include('errors._errors')
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" id="FormID" method="post"
                        action="{{ route('admin.students.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label class="col-md-12 mb-0">First Name</label>
                            <div class="col-md-12">
                                <input type="text" name="Firstname" placeholder="First name"
                                    class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Last Name</label>
                            <div class="col-md-12">
                                <input type="text" name="Lastname" placeholder="Last name"
                                    class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" placeholder="student@uok.com"
                                    class="form-control ps-0 form-control-line" name="email" id="example-email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Password</label>
                            <div class="col-md-12">
                                <input type="password" name="password" value="password"
                                    class="form-control ps-0 form-control-line" autocomplete="false">
                            </div>
                        </div>
                        {{-- image --}}
                        <div class="form-group">
                            <label for="img_path">Image</label>
                            <input type="file" class="form-control-file" name="img_path" value="{{old('img_path')}}"
                                id="img_path" placeholder="" aria-describedby="fileHelpId">
                        </div>
                        <div class="form-group">
                            <label for="About" class="col-md-12 mb-0">About</label>
                            <div class="col-md-12">
                            <textarea id="" name="About" id="About"
                                class="form-control col-lg-8"> </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 mb-0">Github</label>
                            <div class="col-md-12">
                                <input type="text" name="github" placeholder="https://www.github.com"
                                    class="form-control ps-0 form-control-line">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 mb-0">LinkedIn</label>
                            <div class="col-md-12">
                                <input type="text" name="linkedin" placeholder="https://www.Linkedin.com"
                                    class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label col-lg-2">Collegue <span
                                    class="required"></span></label>
                            <div class="col-lg-9">
                                <select name="collegue_id" class="form-control">
                                    <option value="">Please select value</option>
                                    @foreach ($collegues as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Address</label>
                            <div class="col-md-12">
                                <input type="text" name="Address" placeholder="Damas 011"
                                    class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group row  ">
                            <label for="address" class="col-md-12 mb-0">Gender</label>
                            <div class="col-md-12">
                                <select name="Gender" class="form-control" id="Gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 mb-0">Reg Year</label>
                            <div class="col-md-12">
                                <input type="year" name="RegYeer" placeholder="2021"
                                    class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Phone No</label>
                            <div class="col-md-12">
                                <input type="text" name="mobileNo" placeholder="123 456 7890"
                                    class="form-control ps-0 form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-primary mx-auto mx-md-0 text-white">Save
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
