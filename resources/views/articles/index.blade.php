@extends('layouts.master')

@section('title')
    SLS - Articles list
@stop

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header bg-transparent">
            <div class="text-center">
                <h2 class="card-title">Check all Articles</h2>
            </div>
            @can('manage-users')
            <div class="text-right">
                <a class="btn btn-warning text-right mr-5" href="{{ route('articles.create') }}"><i class="fas fa-plus-square"></i></a>
            </div>
            @endcan
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="card-body">
            <table class="table table-borderless">
                    <thead class=" text-primary">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Learn more...</th>
                            <th>Created At...</th>
                            @can('edit-users')
                                <th>Edit</th>
                            @endcan
                            @can('delete-users')
                                <th>Delete</th>
                            @endcan
                        </tr>
                    </thead>


                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ Illuminate\Support\Str::limit($article->content, 20) }}</td>
                            <td>
                                <a href="{{ route('articles.show',$article->id) }}" class="btn btn-link">Learn More...</a>
                            </td>
                            <td>{{ $article->created_at }}</td>
                            @can('edit-users')
                                <td>
                                    <a href="{{ route('articles.edit',$article->id) }}" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
                                </td>
                            @endcan
                            @can('delete-users')
                                <td>
                                    <form action="{{ route('articles.destroy',$article->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>


            </table>
        </div>
        <div class="card-footer pagination bg-transparent">
            {{ $articles->links() }}
        </div>
    </div>
    </div>
    </div>
    </div>

@stop

@section('script')

@stop
