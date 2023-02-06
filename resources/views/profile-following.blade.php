<x-profile :avatar="$avatar" :username="$username" :postCountFollowed="$postCountFollowed" :postCount="$postCount">
    <div class="list-group">
        @foreach($posts as $post)
           @foreach($post as $data)
            <a href="/post/{{$data['_id']}}" class="list-group-item list-group-item-action">
                @if($data->images !== null)
                <img class="avatar-small" src="{{'/storage/post-img/'.$data->images[0]}}"  />
                @endif
                <strong>{{ Str::limit($data->description,50) }}...</strong> {{-- on {{$data->created_at->format('n/j/Y')}} --}}
              </a>
            @endforeach
        @endforeach
    </div>
</x-profile>
