@extends('layouts.app')

@section('title')
    SLS - Articles list
@stop

@section('content')
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-10 offset-1">

        <!-- Title -->
        <h1 class="mt-4">{{ $article->title }}</h1>
          <a class="btn btn-primary offset-10" href="{{ route('articles.index') }}"><i class="fas fa-backspace"></i></a>

        <!-- Author -->
        <p class="lead">
          <small>By SLS</small>
        </p>
        <p>Posted on {{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</p>

        <hr>

        <!-- Preview Image -->
        <img src="/images/{{ $article->imgarticles }}" style="width:900px; height:300px;">

        <hr>

        <!-- Post Content -->
        <p>
          {{ $article->content }}
        </p>

        <hr>

        <!-- Comments -->
        <div>
          @comments(['model' => $article])
        </div>

      </div>
@stop
