<x-layout>
    <form action="/manage-avatar" method="POST" enctype="multipart/form-data">--}}
        {{--                    @csrf--}}
        <div class="mb3">
            <input class="mb-3" type="file" name="avatar"  multiple>
            @error('picture')
            <p class="alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
        </div>
        <a href="" class = "btn btn-secondary btn-sm">Dodaj zdjecia</a>
    </form>
</x-layout>
