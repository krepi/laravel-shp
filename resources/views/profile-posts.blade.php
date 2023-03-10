<x-profile :avatar="$avatar" :username="$username" :postCount="$postCount" :postCountFollowed="$postCountFollowed">
    <div class="list-group">
        @foreach($posts as $post)
            <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
                <img class="avatar-tiny" src="{{$post->user->avatar}}" />
                <strong>{{ Str::limit($post->description,50) }}...</strong> on {{$post->created_at->format('n/j/Y')}}
              </a>
            @endforeach
    </div>
</x-profile>
