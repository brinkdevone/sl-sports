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
                <h2 class="card-title">Check all Events</h2>
            </div>
            @can('manage-users')
            <div class="text-right">
                <a class="btn btn-warning text-right mr-5" href="{{ route('events.create') }}"><i class="fas fa-plus-square"></i></a>
            </div>
            @endcan
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="card-body">
            <div class="table table-borderless">
                <table class="table">
                    <thead class=" text-primary">
                    <th>No</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Learn more...</th>
                    @can('edit-users')
                        <th>Edit</th>
                    @endcan
                    @can('delete-users')
                        <th>Delete</th>
                    @endcan
                    </thead>


                    <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ Illuminate\Support\Str::limit($event->content, 20) }}</td>
                            <td>{{ $event->created_at }}</td>
                            <td>
                                <a href="{{ route('events.show',$event->id) }}" class="btn btn-link">Learn More...</a>
                            </td>
                            @can('edit-users')
                                <td>
                                    <a href="{{ route('events.edit',$event->id) }}" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
                                </td>
                            @endcan
                            @can('delete-users')
                                <td>
                                    <form action="{{ route('events.destroy',$event->id) }}" method="post">
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
        </div>
        <div class="card-footer pagination bg-transparent">
            {{ $events->links() }}
        </div>
    </div>
    </div>
    </div>
    </div>

@stop

@section('script')

@stop
