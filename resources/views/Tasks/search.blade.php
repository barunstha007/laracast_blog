@extends('layouts.app')

@section('content')


@if ($posts->isNotEmpty())

    @foreach ($posts as $post )
        <div class="post-list">
            <p>{{ $post->title }}</p>

            <hr>
            <p>{{ $post->body }}</p>
            
            <img src="{{ asset('/storage/product'.'/'.$post->file_path) }}" alt="">
        </div>        
    @endforeach
@else
            <div>
                <h2>No post was found</h2>
            </div>
    
@endif

@endsection