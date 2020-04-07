@extends('layouts.master')

@section('content')
    <div class="container py-5">
    <div class="card-header bg-transparent">

            <div class="text-left">
                <h5 class="card-category">Creating Articles</h5>
                <h4 class="card-title">Create an Article</h4>
            </div>
            <div class="pull-right text-right">
                <a class="btn btn-primary" href="{{ route('articles.index') }}"><i class="fas fa-backspace"></i></a>
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

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
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
