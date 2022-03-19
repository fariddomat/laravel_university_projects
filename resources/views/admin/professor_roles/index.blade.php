@extends('admin.layouts.app')

@section('container')

        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel" style="overflow-x: scroll;">
                            <header class="panel-heading" style="padding-top: 0px">
                                <h2>Manage Professor Roles</h2>
                            </header>
                            <div>
                                <a class="btn btn-primary" style="margin-bottom: 5px !important" href="{{ route('admin.professor_roles.create') }}" title="Bootstrap 3 themes generator"><span class="icon_plus_alt"> </span> Add New Role</a>
                            </div>

                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th><i class="fa fa-book"></i> Name</th>
                                        <th><i class="fas fa-cogs"></i> Action</th>

                                    </tr>
                                    @if ($professor_roles->count() > 0)
                                    @foreach ($professor_roles as $professor_role)
                                    <tr>
                                        <td>{{$professor_role->name}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-warning{{$professor_role->id == 3 ? ' disabled' : ''}} " href="{{ route('admin.professor_roles.edit', ['id'=>$professor_role->id]) }}" disabled class=""><i class="fa fa-edit"></i></a>
                                                <form action="{{route('admin.professor_roles.destroy',$professor_role->id)}}" method="POST"
                                                    style="display: inline-block" >
                                                    @csrf
                                                    @method('Post')
                                                    <button type="submit" class="btn btn-danger delete"
                                                        style="display: inline-block; margin-left: 5px" {{$professor_role->id == 3 ? 'disabled' : ''}} ><i class="fa fa-trash"
                                                            aria-hidden="true"></i></button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    Nothing to show
                                    @endif
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </section>
        @endsection
