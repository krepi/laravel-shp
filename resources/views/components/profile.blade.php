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
            <a href="/profile/{{$username}}" class="profile-nav-link nav-item nav-link {{Request::segment(3) == "" ? "active" : ""}}">Posts: {{$postCount}}</a>
            <a href="/profile/{{$username}}/followed" class="profile-nav-link nav-item nav-link {{Request::segment(3) == "followed" ? "active" : ""}}">Obserwowane: {{$postCountFollowed}}</a>
        </div>

        <div class="profile-slot-content">
            {{$slot}}
        </div>

    </div>
    </x-layout>
