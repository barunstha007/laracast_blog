@extends('layouts.app')

@section('content')

<div class="col-md-8">

    <h1>Create a post</h1>

    <form method="POST" action="/posts/store" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
          <label for="Title">Title</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
          <label for="body">Body</label>
          <textarea   class="form-control" id="body" name="body"></textarea>
        </div>

        <div class="form-group">
          <input type="file" name="file" required>
      </div>
      

        <button type="submit" class="btn btn-primary">Publish</button>

       @include('layouts.error')
      </form>

</div>

@endsection
