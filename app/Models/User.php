<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post(){

       return $this->hasMany(Post::class);
    }

    public function comment(){

        return $this->hasMany(Comment::class);
     }

     public function publish(Post $post){

        //using eloquent to do the publishing

        $this->post()->save($post);

        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id'=>auth()->id(),

        // ]);
     }
}
