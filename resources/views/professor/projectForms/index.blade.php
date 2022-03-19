@extends('professor.layouts.app')

@section('container')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel" style="overflow-x: scroll">
                    <header class="panel-heading">
                        <h2>Manage ProjectForms</h2>
                    </header>
                    <div>

                    </div>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                            <tr>
                                <th><i class="icon_document_alt"></i> Title</th>
                                <th><i class="fa fa-circle"></i> Category</th>
                                <th><i class="fa fa-user"></i> Student</th>
                                <th><i class="fas fa-calendar-alt"></i> delivery_date</th>
                                <th><i class="fa fa-star"></i> status</th>
                                <th><i class="fa fa-cogs"></i> Details</th>
                            </tr>
                            @if ($projectForms->count() > 0)
                            @foreach ($projectForms as $project)
                            <tr>
                                <td>
                                    {{$project->title}}
                                </td>
                                <td>{{$project->category->type}}</td>
                                <td>{{$project->studentsForm->Firstname}} {{$project->studentsForm->Lastname}}</td>
                                <td>{{$project->created_at}}</td>
                                <td class="
                                @if ($project->status =='rejected')text-danger
                                        @else
                                        @if ($project->status == 'completed')text-success
                                        @else text-warning
                                        @endif

                                @endif">{{$project->status}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success"
                                            href="{{ route('professor.projectForms.edit', ['id'=>$project->id]) }}"><i
                                                class="fa fa-edit"></i></a>


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
