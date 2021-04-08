<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function __construct(){

        $this->middleware('auth')->except(['index','show']);

    }

 
 

    public function index()
    {
        $posts = Post::latest()->get();
        // dd($posts);die();

        return view('Tasks.index', compact('posts'));

    }

    public function create()
    {

        return view('Tasks.create');

    }

    public function store(Request $request)
    {
        $this->validate(request(),
        [
            'title' => 'required',
            'body'  => 'required',

        ]);

        // auth()->user()->publish(
        //     new Post(request([ 'title','body']))
        // );

        if($request->hasFile('file'))
        {
            $request->validate([
                'image' => 'mimes:png,jpg,jpeg,bmp'
            ]);

            $request->file->store('product','public');

            $product = new Post([
                "file_path" => $request->file->hashName(),
                "title" => $request->title,
                "body" =>$request->body,
                "user_id"=>auth()->id(),
            ]);

            $product->save();


        }      

        return redirect('/');

    }

    public function upload()
    {
        return view('Tasks.create');
    }

    public function storeupload(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        
      

    }

    public function show(Post $post)
    {

        return view('Tasks.show',compact('post'));

    }
}
