@extends('layouts.app')

@section('content')

        <div class="col-sm-8">
                <h1>Login</h1>

                <form action="/check" method="POST">
                        @csrf
                    <div class="form-group">
                <label for="email">Email</label>
                
                <input type="text" class="form-control" id="email" name="email">
                </div>    

                <div class="form-group">
                        <label for="Password">Password</label>
                        
                        <input type="password" class="form-control" id="password" name="password">
                        </div>  

                        <div class="form-group">

                                <button type="submit" class="btn btn-primary">Login</button>

                        </div>

                        @include('layouts.error')

                </form>

        </div>
@endsection