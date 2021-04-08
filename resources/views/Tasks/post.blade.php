
<div class="blog-post">

    <h2 class="blog-post-title">
            <a href="/posts/{{$post->id}}">
        {{ $post->title}}

        {{-- <img src="{{ storage_path() }}/products/{{$post->file_path}}"> --}}

        <img src="{{ asset('/storage/product'.'/'.$post->file_path) }}" alt="">
    </a>
    </h2>


<p class="blog-post-meta">

        {{ $post->user->name }} 
        on
{{$post->created_at->toFormattedDateString()}}
            {{-- {{$post->created_at}} --}}


</p>


    {{$post->body}}
</div>
