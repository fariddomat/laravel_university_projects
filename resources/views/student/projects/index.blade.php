@extends('student.layouts.app')

@section('container')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel" style="overflow-x: scroll">
                    <header class="panel-heading">
                        <h2>Manage Projects</h2>
                    </header>
                    <div>
                        <a class="btn btn-primary" style="margin-bottom: 5px !important"
                            href="{{ route('student.projects.create') }}" title="Bootstrap 3 themes generator"><span
                                class="icon_plus_alt"> </span> Add New
                            Project</a>
                    </div>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                            <tr>
                                <th><i class="icon_document_alt"></i> Title</th>
                                {{-- <th><i class="icon_calendar"></i> delivery_date</th> --}}
                                <th><i class="fa fa-circle"></i> category</th>
                                <th><i class="fa fa-percent"></i> grade</th>
                                <th><i class="fa fa-star"></i> status</th>
                                <th><i class="fa fa-user"></i> Professor</th>
                                <th><i class="icon_cogs"></i> Action</th>
                            </tr>

                            @if ($projectForms->count() > 0)
                            @foreach ($projectForms as $project)
                            <tr>
                                <td>{{$project->title}}
                                </td>
                                {{-- <td>{{$project->created_at}}</td> --}}
                                <td>{{$project->category->type}}</td>
                                <td>
                                    @if ($project->project)
                                    {{$project->project->grade}}

                                    @else
                                    Not set yet
                                    @endif
                                </td>
                                <td class="@if ($project->status =='rejected')
                                            text-danger
                                                                                    @else
                                                                                    @if ($project->status == 'completed')
                                            text-success
                                                                                    @else
                                            text-warning
                                                                                    @endif

                                                                                    @endif">{{$project->status}}</td>
                                <td>
                                    {{$project->professorSuper->Firstname}} {{$project->professorSuper->Lastname}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-warning"
                                            href="{{ route('student.projects.edit', ['id'=>$project->id]) }}"><i
                                                class="fa fa-edit"></i></a>
                                        <form action="{{route('student.projects.destroy',$project->id)}}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('Post')
                                            <button type="submit" class="btn btn-danger delete"
                                                style="display: inline-block; margin-left: 3px"><i class="fa fa-trash"
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
                        {{$projectForms->links()}}
                    </ul>
                </nav> <!-- courses pagination -->
            </div>
        </div> <!-- row -->
    </section>
</section>
@endsection
