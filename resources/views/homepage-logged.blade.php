<x-layout>
    <div class="container py-md-5 container--narrow">
        <div class="text-center">
            <h2>Witaj <strong>{{auth()->user()->username}}</strong></h2>
            <p class="lead text-muted">masz dostęp do postów , kontaktów ich właścicieli, możesz negocjowac, kupować, wystawiać własne ogłoszenia </p>
        </div>

        <div class="container py-md-5 container--narrow">
            @foreach($posts as $post)
                <a href="/post/{{$post->_id}}">
            <div class="list-group">


                    <div class="list-group-item list-group-item-action mb-3">

                        <div class="d-flex justify-content-between">
                            <h2>{{$post->brand}}</h2>
                            <h3>{{$post->model}}</h3>
{{--                            <img class="rounded" style="width: 150px;" src="{{'/storage/post-img/'.$post->images[0]}}" alt="">--}}
                            @if($post->images!==null)
                                <img class="rounded" style="width: 150px;"  src="{{'/storage/post-img/'.$post->images[0]}}" alt="">
                            @else
                                <div><p>Brak zdjęć do wyświetlenia</p></div>
                            @endif
                        </div>

                        <div class="body-content text-muted small mb-4">
                            {{$post->description}}
                        </div>
                        <p class="text-muted small mb-4">
                            <a href="#"><img class="avatar-tiny" src="{{$post->user->avatar}}" /></a>
                            Posted by <a href="#">{{$post->user->username}}</a> on {{$post->created_at->format('n/j/Y')}}
                        </p>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        {{$posts->links()}}
        </div>

    </div>
{{--    <div class="container py-md-5 container--narrow">--}}
{{--        <h2>--}}
{{--            <img class="avatar-small" src="{{auth()->user()->avatar}}" /> {{auth()->user()->username}}--}}
{{--            <form class="ml-2 d-inline" action="#" method="POST">--}}
{{--                <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>--}}
{{--                <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->--}}
{{--            </form>--}}
{{--        </h2>--}}

{{--        <div class="profile-nav nav nav-tabs pt-2 mb-4">--}}
{{--            <a href="#" class="profile-nav-link nav-item nav-link active">Posts: 3</a>--}}
{{--            <a href="#" class="profile-nav-link nav-item nav-link">Followers: 3</a>--}}
{{--            <a href="#" class="profile-nav-link nav-item nav-link">Following: 2</a>--}}
{{--        </div>--}}

{{--        <div class="list-group">--}}
{{--            <a href="/post/5c3af3dcc7d0ad0004e53b3d" class="list-group-item list-group-item-action">--}}
{{--                <img class="avatar-tiny" src="{{auth()->user()->avatar}}" />--}}
{{--                <strong>Example Post #1</strong> on 0/13/2019--}}
{{--            </a>--}}
{{--            <a href="/post/5c3af3dcc7d0ad0004e53b3d" class="list-group-item list-group-item-action">--}}
{{--                <img class="avatar-tiny" src="{{auth()->user()->avatar}}" />--}}
{{--                <strong>Example Post #2</strong> on 0/13/2019--}}
{{--            </a>--}}
{{--            <a href="/post/5c3af3dcc7d0ad0004e53b3d" class="list-group-item list-group-item-action">--}}
{{--                <img class="avatar-tiny" src="{{auth()->user()->avatar}}" />--}}
{{--                <strong>Example Post #3</strong> on 0/13/2019--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-layout>
