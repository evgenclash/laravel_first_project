@props(['post'=>$post])

<div class="mb-4 ">
    <a href="{{ route('user.posts', $post->user) }}" class="font-bold">{{ $post->user->username }}</a>
    <span class="text-gray-600 text-sm "> {{$post->created_at->diffForHumans()}}</span>
    <p></p>
    <a href="{{ route('post', $post) }}" class=mb-2">{{$post->body}}</a>
    @can('delete',$post)
        <form action="{{ route('posts.delete',$post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan

    <div class="flex items-right">
        @auth()
            @if($post->likedby(auth()->user()))
                <form action="{{route('like', $post)}}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @else
                <form action="{{ route('like', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @endif

        @endauth

        <span class="sm:text-sm">{{ $post->likes->count() }} {{ \Illuminate\Support\Str::plural('like',$post->likes->count() ) }}</span>
    </div>
</div>
