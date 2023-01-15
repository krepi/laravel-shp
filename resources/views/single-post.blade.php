<x-layout>
<div class="container py-md-5 container--narrow">
    <div class="d-flex justify-content-between">
        <h2>{{$post->brand}}</h2>
        <h3>{{$post->model}}</h3>

        <span class="pt-2">
          <a href="#" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
          <form class="delete-post-form d-inline" action="#" method="POST">
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
          </form>
        </span>
    </div>

    <p class="text-muted small mb-4">
        <a href="#"><img class="avatar-tiny" src="{{$post->user->avatar }}" /></a>
        Posted by <a href="/profile/{{$post->user->username}}">{{$post->user->username}}</a> on {{$post->created_at->format('n/j/Y')}}
    </p>
    <div class="body-content">
    {{$post->description}}
    </div>
    @if($post->images !== null)
    @foreach($post->images as $img)
        <img class="rounded m-3" style="width: 150px;" src="{{'/storage/post-img/'. $img}}" alt="">
    @endforeach
    @else
    <div><p>Brak zdjęć do wyświetlenia</p></div>
    @endif
</div>
</x-layout>
