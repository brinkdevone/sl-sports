@extends('layouts.app')

@section('content')
    <div class="container py-5">
    <div class="card-category">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Article</h2>
            </div>
            <div class="pull-right text-right">
                <a class="btn btn-primary" href="{{ route('articles.index') }}"><i class="fas fa-backspace"></i></a>
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
    <form action="{{ route('articles.update',$article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image :</strong>
                    <img src="/images/{{ $article->imgarticles }}" style="width:900px; height:300px;">
                    <input type="file" name="imgarticles" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title :</strong>
                    <input type="text" name="title" value="{{ $article->title }}" class="form-control" placeholder="Title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Content :</strong>
                    <textarea class="form-control" id="summernote" style="height:150px" name="content" placeholder="Content">{{ $article->content }}</textarea>
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
