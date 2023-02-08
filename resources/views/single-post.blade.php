<x-layout>
<div class="container py-md-5 container--narrow">
    <div class="d-flex justify-content-between">
        <h2>{{$post->brand}}</h2>
        <h3>{{$post->model}}</h3>

        <span class="pt-2">
          @if(auth()->user()->username === $post->user->username)
          <a href="/post/{{$post->id}}/edit" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
          <form class="delete-post-form d-inline" action="/post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
          </form>
          @else
          @if(!$currentlyFollowing)
          <form class="follow-post-form d-inline" action="/create-follow/{{$post->id}}" method="POST">
            @csrf
            <button class="btn btn-primary btn-sm ">Obserwuj <i class="fas fa-user-plus"></i></button>
          </form>
          @else
          <form class="follow-post-form d-inline" action="/remove-follow/{{$post->id}}" method="POST">
            @csrf
            <button class="btn btn-danger btn-sm">Przestań obserwować <i class="fas fa-user-times"></i></button>
          </form>
          @endif
          @endif
        </span>
    </div>

    <p class="text-muted small mb-4">
        <a href="#"><img class="avatar-tiny" src="{{$post->user->avatar }}" /></a>
        Wystawiony przez: <a href="/profile/{{$post->user->username}}">{{$post->user->username}}</a> w {{$post->created_at->format('n/j/Y')}}
    </p>
    <div class="body-content">
        <div class="font-italic">
    <p class="mb-1 ">Cena: {{$post->price}} zł</p>
    <p class="mb-1">Przebieg: {{$post->mileage}} km</p>
    <p class="mb-1">Paliwo: {{$post->fuel}}</p>
    <p class="mb-1">Rodzaj nadwozia: {{$post->body}}</p>
    <p class="mb-2">Kolor: {{$post->colour}}</p>

    </div>

    {{$post->description}}
    </div>
    @if($post->images !== null)
    @foreach($post->images as $img)
        <img class="rounded m-3" style="width: 150px;" src="{{'/storage/post-img/'. $img}}" alt="">
    @endforeach
    @else
    <div><p>Brak zdjęć do wyświetlenia</p></div>
    @endif
    @if($post->contact !== null)
        <div>
            <p>Kontakt: {{$post->contact}}</p>
        </div>
    @else
        <div><p>Brak danych  do kontaktu</p></div>
    @endif
</div>
</x-layout>
