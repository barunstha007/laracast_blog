@extends('layouts.app')

@section('content')
<div class="col-sm-8 blog-main">

    <h1>{{$post->title}}</h1>

    {{$post->body}}

    <hr>
    <div class="comments">
            <div class="card">

                @foreach ($post ->comments as $comment )

                <li class="list-group-item">  
                    
                    <strong>
                        {{ $comment->created_at->diffForHumans() }} : &nbsp;
                    </strong>
                    
                    {{ $comment->body }}
                
                </li>
                    
                @endforeach

            </div>

    </div>
                    <hr>

            <div class="card">

                <div class="card-bloc">

                    <form action="/posts/{{$post->id}}/comments" method="POST">
                        @csrf

                        <div class="form-group">

                                <textarea name="body" class="form-group" placeholder="your comments here.."></textarea>
                        </div>

                        <div class="form-group">

                                 <button type="submit" class="btn btn-primary">Comment</button>
                            
                    </div>

                    </form>

                            @include('layouts.error')
                    <hr>
                </div>
            </div>

</div>

@endsection
