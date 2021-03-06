<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    
    public $fillable = ['title', 'body','user_id','file_path','search'];
    public $timestamps = false;


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body){

        Comment::create([
            'body'=> $body,
            'post_id'=>$this->id,
            'user_id'=>auth()->id()


        ]);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

}

