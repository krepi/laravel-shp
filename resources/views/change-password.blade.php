<x-layout>
    <div class="container py-md-5 container--narrow">

        <p><small><strong><a href="/profile/{{auth()->user()->username}}">&laquo; Powrót do profilu</a></strong></small></p>
        <h2 class="text-center mb-3">Edytuj profil</h2>
        <h2>

            <img class="avatar-small" src="{{$avatar}}" /> {{$username}}
            <form class="ml-2 d-inline" action="#" method="POST">
                @if(auth()->user()->username == $username)
                <a href="/manage-avatar" class="btn btn-secondary btn-sm">Zmień Avatar</a>
                <a href="/edit-profile/{{auth()->user()->username}}" class="btn btn-secondary btn-sm">Zmień dane</a>
                @endif
            </form>
        </h2>


        <form action="/update-password/{{auth()->user()->username}}" method="POST">
            @csrf

            <label for="old-password" class="text-muted mb-1"><small>Stare hasło</small></label>
            <input name="old-password" id="old-password" class="form-control form-control-lg form-control-title" type="password" placeholder="" autocomplete="off" />
            @error('old-password')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                    @enderror
            <label for="new-password" class="text-muted mb-1"><small>Nowe hasło</small></label>
            <input name="new-password" id="new-password" class="form-control form-control-lg form-control-title" type="password" placeholder="" autocomplete="off" />
            @error('new-password')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                    @enderror
            <label for="new-password" class="text-muted mb-1"><small>Potwierdź hasło</small></label>
            <input name="new-password_confirmation" id="new-password-confirm" class="form-control form-control-lg form-control-title" type="password" placeholder="" autocomplete="off" />
            @error('password_confirmation')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          <button class="btn btn-primary mt-3">Save</button>
          </form>

    </div>
    </x-layout>
