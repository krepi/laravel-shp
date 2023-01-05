<x-layout>
    <div class="container py-md-5">
        <div class="row align-items-center">
            <div class="col-lg-7 py-3 py-md-5">
                <h1 class="display-3">nie zalogowany widok</h1>
                <p class="lead text-muted"> Okrojony widok ogłszeń dla niezalogowanego uzytkownika</p>
            </div>
        </div>
        <div class="container py-md-5 container--narrow">
            <div class="list-group">
                @foreach($posts as $post)
                    <div class="list-group-item list-group-item-action mb-3">
                        <div class="d-flex justify-content-between">
                            <h2>{{$post->brand}}</h2>
                            <h3>{{$post->model}}</h3>
                            <img class="rounded" style="width: 150px;"  src="{{'/storage/post-img/'.$post->images[0]}}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
            {{$posts->links()}}
        </div>
    </div>
</x-layout>
