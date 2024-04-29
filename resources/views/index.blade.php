<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($newsList as $mediaName => $popularNewsList)
        <h1>{{ $mediaName }}</h1>
            @foreach ($popularNewsList as $news)
                <a href={{ $news->url }}>
                    <img src={{ $news->image }} alt="image" />
                    <h3>{{ $news->title }}</h3>
                </a>
            @endforeach
    @endforeach
</body>
</html>
