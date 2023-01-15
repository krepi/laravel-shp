<x-layout>
    <div class="container py-md-5">
        <div class="row align-items-center">
            <div class="col-lg-7 py-3 py-md-5">
                <h2 class="display-3">Widok użytkownika nie zalogowanego</h2>
                <p class="lead text-muted"> Okrojony widok ogłoszeń dla niezalogowanego uzytkownika</p>
            </div>
        </div>
        <div class="container py-md-5 container--narrow">
            <div class="list-group">
                @foreach($posts as $post)
                    <div class="list-group-item list-group-item-action mb-3 bg-light">
                        <div class="d-flex justify-content-between ">
                            <p>marka:</p>
                            <h2>{{$post->brand}}</h2>
                            <p>model:</p>
                            <h3>{{$post->model}}</h3>
                            <p>przebieg:</p>
                            <h4>{{$post->mileage}}</h4>
                            @if($post->images !== null)
                            <img class="rounded" style="width: 150px;"  src="{{'/storage/post-img/'.$post->images[0]}}" alt="">
                            @else
                            <div><p>Brak zdjęć do wyświetlenia</p></div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            {{$posts->links()}}
        </div>
    </div>
</x-layout>
