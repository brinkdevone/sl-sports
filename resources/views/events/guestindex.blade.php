@extends('layouts.app')

@section('title')
    SLS - Events list
@stop

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="separate-top"></div>
            @foreach ($events as $event)
                <div class="media">
                    <img class="card-img-top" src="{{URL::asset('/images/sls-nav.png')}}" alt="Card image cap" style="width: 220px; height: 100px">
                    <div class="media-body">
                        <h3 class="ml-3 font-weight-bold">{{ $event->title }}</h3>
                        <p class="ml-5">{{ Illuminate\Support\Str::limit($event->content, 100) }}</p>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('events.show',$event->id) }}" class="btn btn-link">Learn More...</a>
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="separate"></div>

        </div>
    </div>

</div>

    {{ $events->links() }}
@stop

@section('script')

@stop
