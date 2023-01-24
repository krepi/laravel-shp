<x-profile :avatar="$avatar" :username="$username" :postCountFollowed="$postCountFollowed" :postCount="$postCount">
    <div class="list-group">
        @foreach($posts as $post)
           @foreach($post as $data)
            <a href="/post/{{$data['_id']}}" class="list-group-item list-group-item-action">
                <img class="avatar-tiny" src="" />
                <strong>{{ Str::limit($data->description,50) }}...</strong> {{-- on {{$data->created_at->format('n/j/Y')}} --}}
              </a>
            @endforeach
        @endforeach
    </div>
</x-profile>
