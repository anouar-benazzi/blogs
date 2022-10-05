<?php

namespace App\Models;


use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $dispatchesEvents =[
        'created' => PostCreated::class
    ];

    protected $fillable = ['user_id','title','description','tags'];

    public function scopeFilter($query,array$filters){
        if($filters['tag'] ?? false) {

            $query->where('tags','like','%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {

            $query->where('title','like','%' . request('search') . '%')
            ->orwhere('description','like','%' . request('search') . '%')
            ->orwhere('tags','like','%' . request('search') . '%');
        }

    }



    //Relationship to user

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function getLastComment()
    {
        return $this->comments()->latest()->first();
    }

    public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
    public function latestImage()
    {
        return $this->morphOne(Images::class, 'imageable')->latestOfMany();
    }
}
