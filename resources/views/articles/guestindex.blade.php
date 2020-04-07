@extends('layouts.app')

@section('title')
    SLS - Articles list
@stop

@section('content')
<div class="container-fluid">
    <div class="card-deck col-md-12">
        @foreach ($articles as $article)
            <div class="row">
                <div class="card post-marge" style="width: 18rem; height: 350px;">
                    <img class="card-img-top" src="{{URL::asset('/images/sls-nav.png')}}" alt="Card image cap">
                    <h5 class="card-header text-center">
                        {{ $article->title }}
                    </h5>
                    <div class="card-body">
                        {{ Illuminate\Support\Str::limit($article->content, 100) }}
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="{{ route('articles.show',$article->id) }}" class="btn btn-link">Learn More...</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    {{ $articles->links() }}
@stop

@section('script')

@stop
