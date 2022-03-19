@extends('admin.layouts.app')

@section('container')

<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <div class="panel-body">
                <div class="form">
                    <form class="form-validate form-horizontal " id="FormID" method="post"
                        action="{{ route('admin.professors.update', ['id'=>$professor->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="fullname" class="control-label col-lg-2">First name <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="Firstname" name="Firstname" type="text"
                                    value="{{$professor->Firstname}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fullname" class="control-label col-lg-2">Last name <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="Lastname" name="Lastname" type="text"
                                    value="{{$professor->Lastname}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="control-label col-lg-2">Role <span
                                    class="required"></span></label>
                            <div class="col-lg-8">
                                <select name="professor_roles" class="form-control">
                                    <option value="">Please select value</option>
                                    @foreach ($professor_roles as $item)
                                    @if ($professor->roles->count() > 1)
                                    <option {{$item->id == $professor->roles->forget(0)->first()->id ? 'selected' : ''}} value="{{$item->name}}">{{$item->name}}</option>
                                    @else
                                    <option  value="{{$item->name}}">{{$item->name}}</option>
                                    @endif
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
                                    @foreach ($collegues as $key=>$item)
                                    <option {{ in_array($item->id, $professor->professor_collegues->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$item->id}}">
                                        {{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{--image--}}
                        <div class="form-group row">
                            <label class="control-label col-lg-2">Image</label>
                            <div class="col-lg-8">

                                <input type="file" name="img_path" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2">preview</label>
                            <div class="col-lg-8">
                                <img src="{{ asset('uploads/professor/images/'.$professor->img_path) }}"
                                    style=" margin-top: 10px; width: 50px; height: 50;" alt="">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="control-label col-lg-2">Email <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class="form-control " id="email" name="email" type="email"
                                    value="{{$professor->email}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="control-label col-lg-2">Password <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class="form-control " id="password" name="password" type="password" value="" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="About" class="control-label col-lg-2">About</label>
                            <div class="col-lg-8">
                            <textarea id="" name="About" id="About"
                                class="form-control col-lg-8">{{$professor->About}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row  ">
                            <label for="github" class="control-label col-lg-2">Github <span
                                    class="required"></span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="github" name="github" value="{{$professor->github}}" type="text" />
                            </div>
                        </div>

                        <div class="form-group row  ">
                            <label for="linkedin" class="control-label col-lg-2">LinkedIn <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="linkedin" name="linkedin" value="{{$professor->linkedin}}" type="text" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="control-label col-lg-2">Address <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="Address" name="Address" type="text"
                                    value="{{$professor->Address}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="control-label col-lg-2">Gender <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <select name="Gender" class="form-control" id="Gender">
                                    <option value="male" {{$professor->Gender == 'male' ? 'selected' : ''}}>Male
                                    </option>
                                    <option value="female {{$professor->Gender == 'female' ? 'selected' : ''}}">Female
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="control-label col-lg-2">Reg Year <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="RegYeer" name="RegYeer" type="year"
                                    value="{{$professor->RegYeer}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="control-label col-lg-2">mobileNo <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class=" form-control" id="mobileNo" name="mobileNo" type="text"
                                    value="{{$professor->mobileNo}}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-8">
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
    quill.setContents(<?=$professor->About?>);
</script>
@endsection
