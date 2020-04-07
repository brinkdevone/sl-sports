@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-center">Articles Management</h2></div>

                    <div class="card-body">

                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th class="text-center" scope="col">#</th>
                                <th class="text-center" scope="col">Title</th>
                                <th class="text-center" scope="col">Content</th>
                                <th class="text-center" scope="col">Learn More...</th>
                                <th class="text-center" scope="col">Created At...</th>
                                @can('edit-users')
                                    <th class="text-center" scope="col">Edit</th>
                                @endcan
                                @can('delete-users')
                                    <th class="text-center" scope="col">Delete</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <th scope="row">{{ $article->id }}</th>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ Illuminate\Support\Str::limit($article->content, 20) }}</td>
                                    <td>
                                        <a href="{{ route('articles.show',$article->id) }}" class="btn btn-link">Learn More...</a>
                                    </td>
                                    <td>{{ $article->created_at }}</td>
                                    @can('edit-users')
                                        <td>
                                            <a href="{{ route('articles.edit', $article->id) }}" type="button" class="btn btn-warning"><i class="fas fa-user-edit"></i></a>
                                        </td>
                                    @endcan
                                    @can('delete-users')
                                        <td>
                                            <form action="{{ route('articles.destroy', $article) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
