@extends('layouts.app')

@section('content')
<div class="blog-post">

    <h2 class="blog-post-title">
            <a href="/posts/{{$post->id}}">
        {{ $post->title}}
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
@endsection