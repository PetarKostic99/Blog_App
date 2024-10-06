<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Metoda koja definise da jedan post ima vise komentara
    public function comment()
    {
        //return $this->hasMany('App\Models\Comment');
        return $this->hasMany(Comment::class, 'post_id');
    }


    // public function user_id()
    // {
    //     return $this->hasOne('App\Models\User');
    // }

    // In app/Models/Post.php
    public function getPostLength()
    {
        return strlen($this->content);
    }

    protected $fillable = ['title', 'content', 'user_id'];
}