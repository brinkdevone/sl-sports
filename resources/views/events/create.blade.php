@extends('layouts.master')

@section('content')
    <div class="container py-5">
    <div class="card-header bg-transparent">

            <div class="text-left">
                <h5 class="card-category">Creating an event</h5>
                <h4 class="card-title">Create an event</h4>
            </div>
            <div class="pull-right text-right">
                <a class="btn btn-primary" href="{{ route('events.index') }}"><i class="fas fa-backspace"></i></a>
            </div>

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check your input code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">

    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="summernote" style="height:280px" name="content" placeholder="Content"></textarea>
                    </div>
                 </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fas fa-upload"></i></button>
            </div>
        </div>
    </form>

    </div>
    </div>
@endsection
