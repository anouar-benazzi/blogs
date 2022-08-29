<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_id','user_id','description'];


    //Relationship to user

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Post(){
        return $this->belongsTo(Post::class, 'post_id');
    }


}
