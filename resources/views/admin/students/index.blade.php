@extends('admin.layouts.app')

@section('container')

        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel" style="overflow-x: scroll;">
                            <header class="panel-heading" style="padding-top: 0px">
                                <h2>Manage Students</h2>
                            </header>
                            <div>
                                <a class="btn btn-primary" style="margin-bottom: 5px !important" href="{{ route('admin.students.create') }}" title="Bootstrap 3 themes generator"><span class="icon_plus_alt"> </span> Add New Student</a>
                            </div>

                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th><i class="fa fa-user"></i> Full Name</th>
                                        <th><i class="far fa-calendar-alt"></i> Rey Year</th>
                                        <th><i class="fa fa-mail"></i>@ Email</th>
                                        <th><i class="fas fa-graduation-cap"></i> Collegue</th>
                                        <th><i class="fas fa-map-marker-alt"></i> Address</th>
                                        <th><i class="fas fa-phone"></i> Mobile</th>
                                        <th><i class="fas fa-cogs"></i> Action</th>
                                    </tr>
                                    @if ($students->count() > 0)
                                    @foreach ($students as $student)
                                    <tr>
                                        <td>{{$student->Firstname}} {{$student->Lastname}}</td>
                                        <td>{{$student->RegYeer}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->collegue->name}}</td>
                                        <td>{{$student->Address}}</td>
                                        <td>{{$student->mobileNo}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-warning" href="{{ route('admin.students.edit', ['id'=>$student->id]) }}"><i class="fa fa-edit"></i></a>
                                                <form action="{{route('admin.students.destroy',$student->id)}}" method="POST"
                                                    style="display: inline-block">
                                                    @csrf
                                                    @method('Post')
                                                    <button type="submit" class="btn btn-danger delete"
                                                        style="display: inline-block; margin-left: 5px"><i class="fa fa-trash"
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

                <div class="row" style="margin-top: 15px">
                    <div class="col-lg-12">
                        <nav class="courses-pagination mt-50">
                            <ul class="pagination justify-content-center">
                                {{$students->links()}}
                            </ul>
                        </nav> <!-- courses pagination -->
                    </div>
                </div> <!-- row -->
            </section>
        @endsection
