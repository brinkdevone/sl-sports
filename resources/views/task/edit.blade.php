@extends('layouts.app')

@section('title')
    Dashboard SLS
@stop

@section('content')
    <div class="container py-5">
        <div class="card-category">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Task</h2>
                </div>
                <div class="pull-right text-right">
                    <a class="btn btn-primary" href="{{ route('tasks.index') }}"><i class="fas fa-backspace"></i></a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Warning!</strong> Please check input field code<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <form action="{{ route('tasks.update',$task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="title">Title :</label>
                            <input type="text" name="title" value="{{ $task->title }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <input type="textarea" class="form-control"  name="decription" value="{{ $task->description }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="due_date">Due date :</label>
                            <input type="date" class="form-control" value="{{ $task->due_date }}" name="due_date" placeholder="Content">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fas fa-upload"></i></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop

@section('scripts')

@stop

