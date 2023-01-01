<!DOCTYPE html>
<html>
<head>
    <title>bez jaj</title>
</head>
<body>
{{--<h1>{{$post->title}}</h1>--}}
{{--<h1>{{$post->body}}</h1>--}}

@foreach($databases as $database)
    <h3>{{$database}}</h3>
@endforeach
{{var_dump($databases)}}
<div>{{}}</div>
</body>
</html>
