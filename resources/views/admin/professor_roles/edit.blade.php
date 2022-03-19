@extends('admin.layouts.app')

@section('container')

<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <div class="panel-body">
                <div class="form">
                    <form class="form-validate form-horizontal " id="register_form" method="post"
                        action="{{ route('admin.professor_roles.update', ['id'=>$professor_role->id]) }}">
                        @csrf
                        @method('POST')
                        <div class="form-group row ">
                            <label for="fullname" class="control-label col-lg-2">Role Name <span
                                    class="required">*</span></label>
                            <div class="col-lg-8">
                                <input value="{{$professor_role->name}}" class=" form-control" id="name" name="name"
                                    type="text" />
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
