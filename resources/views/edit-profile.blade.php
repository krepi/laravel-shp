<x-layout>
    <div class="container py-md-5 container--narrow">

        <p><small><strong><a href="/profile/{{auth()->user()->username}}">&laquo; Powrót do profilu</a></strong></small></p>
        <h2 class="text-center mb-3">Edytuj profil</h2>
        <h2>

            <img class="avatar-small" src="{{$avatar}}" /> {{$username}}
            <form class="ml-2 d-inline" action="#" method="POST">
                @csrf
                @if(auth()->user()->username == $username)
                <a href="/manage-avatar" class="btn btn-secondary btn-sm">Zmień Avatar</a>
                @csrf
                <a href="/change-password/{{auth()->user()->username}}" class="btn btn-secondary btn-sm">Zmień hasło</a>
                @csrf
                @endif
            </form>
        </h2>


        <form action="/update-profile/{{auth()->user()->username}}" method="POST">
            @csrf

            <label for="username" class="text-muted mb-1"><small>Login</small></label>
            <input value="{{old('username', auth()->user()->username)}}" name="username" id="username" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('username')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
            <label for="email" class="text-muted mb-1"><small>Email</small></label>
            <input value="{{old('email', auth()->user()->email)}}" name="email" id="email" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('email')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror


          <button class="btn btn-primary mt-3">Save</button>
          </form>

    </div>
    </x-layout>


