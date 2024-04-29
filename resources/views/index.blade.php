@extends('layouts.app')

@section('content')
    @foreach ($newsList as $mediaName => $popularNewsList)
        <h2 class="mb-6 text-4xl font-semibold">{{ $mediaName }}</h2>
        <div class="md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-6 grid gap-6">
            @foreach ($popularNewsList as $news)
                <a href={{ $news->url }} target="_blank">
                    <img src={{ $news->image }} class="mb-2" alt={{ $news->title }}/>
                    <h3 class="line-clamp-2 text-lg">{{ $news->title }}</h3>
                </a>
            @endforeach
        </div>
    @endforeach
@endsection
