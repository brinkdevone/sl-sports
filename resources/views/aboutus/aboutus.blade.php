@extends('layouts.app')

@section('content')

        <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-md-8">

                        <div class="separate-top"></div>
                        @foreach($abouts as $about)
                        <div class="media">
                            <img src="{{ asset('images/img-test.jpg') }}" class="align-self-center mr-3 aboutus" alt="..." style="width: 220px; height: 100px">
                            <div class="media-body">
                                <h3 class="mt-0 font-weight-bold">{{ $about->title }}</h3>
                                <p>{{ $about->text }}</p>
                            </div>
                        </div>

                            <div class="separate"></div>
                            <hr>
                            <div class="separate"></div>
                        @endforeach

                    </div>
                </div>

        </div>

@endsection
