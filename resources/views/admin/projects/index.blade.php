@extends('admin.layouts.app')

@section('container')

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel" style="overflow-x: scroll;">
                    <header class="panel-heading">
                        <h2>Manage Projects</h2>
                    </header>
                    <div>
                        <a class="btn btn-primary" style="margin-bottom: 5px !important"
                            href="{{ route('admin.projects.create') }}" title="Bootstrap 3 themes generator"><span
                                class="icon_plus_alt"> </span> Add New
                            Project</a>
                    </div>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                            <tr>
                                <th><i class="fas fa-book"></i> name</th>
                                <th><i class="fas fa-calendar-alt"></i> delivery_date</th>
                                <th><i class="fa fa-circle"></i> category</th>
                                <th><i class="fas fa-graduation-cap"></i> grade</th>
                                <th><i class="fa fa-star"></i> status</th>
                                <th><i class="fa fa-users"></i> User</th>
                                <th><i class="fa fa-user"></i> Professor</th>
                                <th><i class="fas fa-cogs"></i> Action</th>
                            </tr>
                            @if ($projects->count() > 0)
                            @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <a target="_blank" href="{{ asset('uploads/docs/'.$project->path) }}"><i
                                            class="fa fa-download text-success"></i>
                                        {{$project->projectForm->title}}</a>
                                </td>
                                <td>{{$project->created_at}}</td>
                                <td>{{$project->projectForm->category->type}}</td>
                                <td>{{$project->grade}}</td>
                                <td class="@if ($project->projectForm->status =='rejected')
                                text-danger
                                @else
                                @if ($project->projectForm->status == 'completed')
                                text-success
                                @else
                                text-warning
                                @endif

                                @endif">
                                    {{$project->projectForm->status}}</td>
                                <td>
                                    @foreach ($project->students()->get() as $item)
                                    <a href="{{ route('student', ['id'=>$item->id]) }}">{{$item->Firstname}} {{$item->Lastname}}</a>
                                    <br>
                                    @endforeach
                                </td>
                                <td><a
                                        href="{{ route('teacher', ['id'=>
                                        $project->projectForm->professorSuper->id]) }}">
                                        {{$project->projectForm->professorSuper->Firstname}}
                                        {{$project->projectForm->professorSuper->Lastname}}</a></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" target="_blank"
                                            href="{{ route('project', ['id'=>$project->id]) }}"><i
                                                class="fa fa-book"></i></a>


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
                        {{$projects->links()}}
                    </ul>
                </nav> <!-- courses pagination -->
            </div>
        </div> <!-- row -->
    </section>
</section>
@endsection
