@extends('admin.layouts.app')

@section('container')

        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel" style="overflow-x: scroll;">
                            <header class="panel-heading" style="padding-top: 0px">
                                <h2>Manage categories</h2>
                            </header>
                            <div>
                                <a class="btn btn-primary" style="margin-bottom: 5px !important" href="{{ route('admin.categories.create') }}" title="Bootstrap 3 themes generator"><span class="icon_plus_alt"> </span> Add New category</a>
                            </div>

                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th><i class="fa fa-book"></i> Type</th>
                                        <th><i class="fas fa-cogs"></i> Action</th>

                                    </tr>
                                    @if ($categories->count() > 0)
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->type}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-warning" href="{{ route('admin.categories.edit', ['id'=>$category->id]) }}"><i class="fa fa-edit"></i></a>
                                                <form action="{{route('admin.categories.destroy',$category->id)}}" method="POST"
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
                                {{$categories->links()}}
                            </ul>
                        </nav> <!-- courses pagination -->
                    </div>
                </div> <!-- row -->
            </section>
        @endsection
