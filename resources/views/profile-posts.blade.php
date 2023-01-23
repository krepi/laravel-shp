<x-layout>
<div class="container py-md-5 container--narrow">
    <h2>
        <img class="avatar-small" src="{{$avatar}}" /> {{$username}}
        <form class="ml-2 d-inline" action="#" method="POST">
            @csrf

            @if(auth()->user()->username == $username)
            <a href="/edit-profile/{{auth()->user()->username}}" class="btn btn-secondary btn-sm">Edytuj profil</a>
            @csrf
            <a href="/deleted-profile/{{auth()->user()->username}}" class="btn btn-secondary btn-sm">Usuń konto</a>
            @csrf
            @endif
        </form>
    </h2>

    <div class="profile-nav nav nav-tabs pt-2 mb-4">
        <a href="#" class="profile-nav-link nav-item nav-link active">Posts: {{$postCount}}</a>
        {{-- <a href="#" class="profile-nav-link nav-item nav-link">Followers: 3</a> --}}
        {{-- <a href="#" class="profile-nav-link nav-item nav-link">Following: 2</a> --}}
    </div>

    <div class="list-group">
        @foreach($posts as $post)
            <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
                <img class="avatar-tiny" src="{{$post->user->avatar}}" />
                <strong>{{$post->title}}</strong> on {{$post->created_at->format('n/j/Y')}}
              </a>
            @endforeach
    </div>
</div>
</x-layout>
