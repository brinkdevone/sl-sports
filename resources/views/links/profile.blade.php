@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                <h4>Welcome {{ $user->firstname }} {{ $user->name }}</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <img src="/images/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <h2>{{ $user->firstname }}'s Profile</h2>
                        <form enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST">
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-sm btn-primary">
                        </form>

                            <div class="separate"></div>

                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="firstname" class="form-control" id="firstname" aria-describedby="firstname" value="{{ $user->firstname }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="name" class="form-control" id="name" aria-describedby="name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="email" value="{{ $user->email }}">
                                <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
