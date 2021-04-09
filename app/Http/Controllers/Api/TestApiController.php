<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Validator;

class TestApiController extends Controller
{
    public function index(){
       
        $posts = Post::latest()->get();

        return $this->json_response("Posts Fetched",$posts,'sucess',200);
    }

    public function json_response($message,$data,$status,$statuscode=200,$error=null)
    {
        return response()->json([
            'message'=>$message,
            'data'=>$data,
            'status'=>$status,
            'error'=>$error

        ],$statuscode);
    }

    public function show($id){

        $post = Post::find($id);
        if(is_null($post)){
        return response()->json('Record not found!',404);

        }

        return response()->json($post,200);

    }

    public function store(Request $request)

    {          
        $this->validate(request(),
        [
            'title' => 'required|min:2',
            'body'  => 'required',

        ]);
        $validator = Validator::make($request->all(),$this);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }



        // auth()->user()->publish(
        //     new Post(request([ 'title','body']))
        // );

        // if($request->hasFile('file'))
        // {
        //     $request->validate([
        //         'image' => 'mimes:png,jpg,jpeg,bmp'
        //     ]);

        //     $request->file->store('product','public');

            $product = new Post([
                "file_path" => $request->file_path,
                "title" => $request->title,
                "body" =>$request->body,
                "user_id"=>1,
            ]);

            $product->save();

        // }      
        return response()->json($product,201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if(is_null($post)){
            return response()->json('Record not found!',404);
        }
        $post->update($request->all());
        return response()->json($post,200);

    }

    public function delete(Request $request,$id)
    {
        $post = Post::find($id);
        if(is_null($post)){
            return response()->json('Record not found!',404);
        }
        $post->delete();
        return response()->json(null,204);
    }

}
