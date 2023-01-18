   <x-layout>
   <div class="container py-md-5 container--narrow">

        <p><small><strong><a href="/profile/{{auth()->user()->username}}">&laquo; Powrót do profilu</a></strong></small></p>
        <h2 class="text-center mb-3">Usuń profil</h2>

        <form action="/delete/{{auth()->user()->username}}" method="POST">
            @csrf

            <label for="password" class="text-muted mb-1"><small>Aby usunąć konto podaj hasło</small></label>
            <input name="password" id="password" class="form-control form-control-lg form-control-title" type="password" autocomplete="off"/>
            @error('password')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          <button type="submit" class="btn btn-primary mt-3">Usuń</button>
          </form>


    </div>
</x-layout>
