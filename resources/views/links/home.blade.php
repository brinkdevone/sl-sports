@extends('layouts.app')

@section('content')
    <div class="row">
    @foreach ($events as $event)

            <div class="offset-1 col-md-4 homeback">
                <h2 class="mt-4 text-white text-center">Event à la une</h2>
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title text-center text-uppercase">
                            {{ $event->title }}
                        </h4>
                    </div>

                    <div class="card-body">
                        {{ $event->content }}
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ route('events.show',$event->id) }}" class="btn btn-link">Learn More...</a>
                        <small class="text-muted">{{ Carbon\Carbon::parse($event->due_date)->format('d/m/Y') }}</small>
                    </div>
                </div>
            </div>

    @endforeach

    @foreach ($articles as $article)

            <div class="offset-2 col-md-4 homeback">
                <h2 class="mt-4 text-white text-center">Article à la une</h2>
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title text-center text-uppercase">
                            {{ $article->title }}
                        </h4>
                    </div>

                    <div class="card-body">
                        {{ $article->content }}
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('articles.show',$article->id) }}" class="btn btn-link">Learn More...</a>
                        <small class="text-muted">{{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</small>
                    </div>
                </div>
            </div>

    @endforeach
    </div>
@endsection
