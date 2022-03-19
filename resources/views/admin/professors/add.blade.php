@extends('admin.layouts.app')

@section('container')

<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <div class="panel-body">
                <div class="form">
                    @include("errors._errors")
                    <form class="form-validate form-horizontal " id="FormID" method="post"
                        action="{{ route('admin.professors.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group row ">
                            <label for="fullname" class="control-label col-lg-2">First name <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="Firstname" name="Firstname" type="text" />
                            </div>
                        </div>
                        <div class="form-group row  ">
                            <label for="fullname" class="control-label col-lg-2">Last name <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="Lastname" name="Lastname" type="text" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="control-label col-lg-2">Role <span
                                    class="required"></span></label>
                            <div class="col-lg-8">
                                <select name="professor_roles" class="form-control">
                                    <option value="">Professor</option>
                                    @foreach ($professor_roles as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="collegues" class="control-label col-lg-2">Collegues <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <select name="collegues[]" class="form-control select2 js-example-basic-multiple"
                                    multiple="multiple">
                                    @foreach ($collegues as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row  ">
                            <label for="email" class="control-label col-lg-2">Email <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class="form-control " id="email" name="email" type="email" placeholder="user@test.com"/>
                            </div>
                        </div>

                        <div class="form-group row  ">
                            <label for="password" class="control-label col-lg-2">Password <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class="form-control " id="password" name="password" type="password" />
                            </div>
                        </div>

                        {{-- image --}}
                        <div class="form-group row">
                            <label for="img_path" class="control-label col-lg-2">Image</label>
                            <div class="col-lg-8">

                            <input type="file" class="form-control-file" name="img_path" value="{{old('img_path')}}"
                            id="img_path" placeholder="" aria-describedby="fileHelpId">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="About" class="control-label col-lg-2">About *</label>
                            <div class="col-lg-8">
                            <textarea id="" name="About" id="About"
                                class="form-control col-lg-8"></textarea>
                            </div>
                        </div>

                        <div class="form-group row  ">
                            <label for="github" class="control-label col-lg-2">Github <span
                                    class="required"></span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="github" name="github" type="text" placeholder="https://www.github.com/username" />
                            </div>
                        </div>

                        <div class="form-group row  ">
                            <label for="linkedin" class="control-label col-lg-2">LinkedIn <span
                                    class="required"></span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="linkedin" name="linkedin" type="text" placeholder="https://www.linkedin.com/username" />
                            </div>
                        </div>
                        <div class="form-group row  ">
                            <label for="address" class="control-label col-lg-2">Address <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="Address" name="Address" type="text" />
                            </div>
                        </div>
                        <div class="form-group row  ">
                            <label for="address" class="control-label col-lg-2">Gender <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <select name="Gender" class="form-control" id="Gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row  ">
                            <label for="address" class="control-label col-lg-2">Reg Year <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="RegYeer" name="RegYeer" type="year" />
                            </div>
                        </div>
                        <div class="form-group row  ">
                            <label for="address" class="control-label col-lg-2">mobileNo <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="mobileNo" name="mobileNo" type="text" placeholder="09XXXXXXXX" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-8">
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
