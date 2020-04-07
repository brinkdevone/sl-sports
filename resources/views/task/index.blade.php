@extends('layouts.master')

@section('title')
    Dashboard SLS
@stop

@section('content')

    <div class="col-lg-12">
        <div class="card card-tasks">
            <div class="card-header">
                <h3 class="title d-inline">Tasks</h3>
            </div>
            <div class="text-right">
                <a class="btn btn-warning text-right mr-5" href="{{ route('tasks.create') }}"><i class="fas fa-plus-square"></i></a>
            </div>
            <div class="card-body">
                <div class="table-full-width">
                    <table class="table">
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>
                                    <h4 class="title">{{ $task->title }}</h4>
                                    <p class="text-muted">{{ $task->description }}</p>
                                    <hr>
                                    <small class="text-muted font-italic font-weight-light">{{ Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}</small>
                                </td>
                                <td class="td-actions text-right">

                                    <a href="{{ route('tasks.edit',$task->id) }}" class="btn btn-link">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>


                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-link">
                                            <i class="tim-icons icon-trash-simple"></i>
                                        </button>
                                    </form>
                                </td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')

@stop

