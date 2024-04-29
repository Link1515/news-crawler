@extends('layouts.app')

@section('content')
    @foreach ($newsList as $mediaName => $popularNewsList)
        <h2>{{ $mediaName }}</h2>
        @foreach ($popularNewsList as $news)
            <a href={{ $news->url }}>
                <img src={{ $news->image }} alt="image" />
                <h3>{{ $news->title }}</h3>
            </a>
        @endforeach
    @endforeach
@endsection
