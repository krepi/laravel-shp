<!DOCTYPE html>
<html>
<head>
    <title>bez jaj</title>
</head>
<body>
{{--<h1>{{$post->title}}</h1>--}}
{{--<h1>{{$post->body}}</h1>--}}

@foreach($posts as $post)

        <h1>{{$post->user->email}}</h1>
{{--        @foreach($post->images as $image)--}}
{{--            <h3>{{$image}}</h3>--}}
{{--        @endforeach--}}

@endforeach
{{--{{var_dump($databases)}}--}}




<div>{{}}</div>
</body>
</html>
