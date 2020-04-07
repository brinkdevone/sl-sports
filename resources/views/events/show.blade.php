@extends('layouts.app')

@section('title')
    SLS - Articles list
@stop

@section('content')
<!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8 offset-2">

        <!-- Title -->
        <h1 class="mt-4">{{ $event->title }}</h1>
          <a class="btn btn-primary offset-10" href="{{ route('events.index') }}"><i class="fas fa-backspace"></i></a>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">Start Bootstrap</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{ $event->created_at }}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
        <p>
          {{ $event->content }}
        </p>

        <hr>

        <!-- Comments -->
        <div>
          @comments(['model' => $event])
        </div>

      </div>
@stop
