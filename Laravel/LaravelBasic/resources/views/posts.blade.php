<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/posts/{{$post->id}}">
                {{$post->title}}
            </a>
        </h1>
        <h3>
            by
            <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a>
            for
            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </h3>
        <div>
            {{$post->excerpt}}
        </div>
    </article>
    @endforeach

</body>

</html>