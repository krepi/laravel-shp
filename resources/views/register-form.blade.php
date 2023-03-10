
<x-layout>

<div class="container py-md-5">
    <div class="row align-items-center">
        <div class="col-lg-7 py-3 py-md-5">
            <h1 class="display-3">Stwórz nowe konto!</h1>
            <p class="lead text-muted">Dzięki temu będziesz miał pełny dostęp do elitarnej grupy handlarzy samochodami i ich elitarnych ofert .</p>
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
            <form action="/register-user" method="POST" id="registration-form">
                @csrf
                <div class="form-group">
                    <label for="username-register" class="text-muted mb-1"><small>Username</small></label>
                    <input value="{{old('username')}}" name="username" id="username-register" class="form-control" type="text" placeholder="Wybierz pseudonim" autocomplete="off" />
                    @error('username')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
                    <input value="{{old('email')}}" name="email" id="email-register" class="form-control" type="text" placeholder="ty@example.com" autocomplete="off" />
                    @error('email')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
                    <input name="password" id="password-register" class="form-control" type="password" placeholder="Stwórz hasło" />
                    @error('password')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
                    <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Potwierdź hasło" />
                    @error('password_confirmation')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Stwórz konto w PADAK Corp.</button>
            </form>
        </div>
    </div>
</div>
</x-layout>

>

