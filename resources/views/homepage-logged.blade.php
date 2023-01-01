<x-layout>
{{--    <div class="container py-md-5 container--narrow">--}}
{{--        <div class="text-center">--}}
{{--            <h2>Hello <strong>{{auth()->user()->username}}</strong>, your feed is empty.</h2>--}}
{{--            <h2>Hello human</strong>, your feed is empty.</h2>--}}
{{--            <p class="lead text-muted">Your feed displays the latest posts from the people you follow. If you don&rsquo;t have any friends to follow that&rsquo;s okay; you can use the &ldquo;Search&rdquo; feature in the top menu bar to find content written by people with similar interests and then follow them.</p>--}}
{{--        </div>--}}

{{--    </div>--}}
    <div class="container py-md-5 container--narrow">
        <h2>
            <img class="avatar-small" src="{{auth()->user()->avatar}}" /> {{auth()->user()->username}}
            <form class="ml-2 d-inline" action="#" method="POST">
                <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
                <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
            </form>
        </h2>

        <div class="profile-nav nav nav-tabs pt-2 mb-4">
            <a href="#" class="profile-nav-link nav-item nav-link active">Posts: 3</a>
            <a href="#" class="profile-nav-link nav-item nav-link">Followers: 3</a>
            <a href="#" class="profile-nav-link nav-item nav-link">Following: 2</a>
        </div>

        <div class="list-group">
            <a href="/post/5c3af3dcc7d0ad0004e53b3d" class="list-group-item list-group-item-action">
                <img class="avatar-tiny" src="{{auth()->user()->avatar}}" />
                <strong>Example Post #1</strong> on 0/13/2019
            </a>
            <a href="/post/5c3af3dcc7d0ad0004e53b3d" class="list-group-item list-group-item-action">
                <img class="avatar-tiny" src="{{auth()->user()->avatar}}" />
                <strong>Example Post #2</strong> on 0/13/2019
            </a>
            <a href="/post/5c3af3dcc7d0ad0004e53b3d" class="list-group-item list-group-item-action">
                <img class="avatar-tiny" src="{{auth()->user()->avatar}}" />
                <strong>Example Post #3</strong> on 0/13/2019
            </a>
        </div>
    </div>
</x-layout>
