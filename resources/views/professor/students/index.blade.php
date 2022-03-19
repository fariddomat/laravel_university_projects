@extends('professor.layouts.app')

@section('container')

        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel" style="overflow-x: scroll;">
                            <header class="panel-heading" style="padding-top: 0px">
                                <h2>View Students</h2>
                            </header>

                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th><i class="fa fa-user"></i> Full Name</th>
                                        <th><i class="far fa-calendar-alt"></i> Rey Year</th>
                                        <th><i class="fas fa-graduation-cap"></i> Collegue</th>
                                        <th><i class="fa fa-mail"></i>@ Email</th>
                                        <th><i class="fas fa-map-marker-alt"></i> Address</th>
                                        <th><i class="fas fa-phone"></i> Mobile</th>
                                    </tr>
                                    @if ($students->count() > 0)
                                    @foreach ($students as $student)
                                    <tr>
                                        <td><a href="{{ route('student', ['id'=>$student->id]) }}">{{$student->Firstname}} {{$student->Lastname}}</a></td>
                                        <td>{{$student->RegYeer}}</td>
                                        <td>{{$student->collegue->name}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->Address}}</td>
                                        <td>{{$student->mobileNo}}</td>

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
