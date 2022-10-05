<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Images;
use App\Events\AdminCreated;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $dispatchesEvents =[
        'created' => AdminCreated::class
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role_id',
        'email',
        'password',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        // relationship with listing

        public function Post()
        {
            return $this->hasMany(Post::class, 'user_id');
        }
        public function Comment()
        {
            return $this->hasMany(Comment::class, 'user_id');
        }

        public function role(){
            return $this->belongsTo(Role::class, 'role_id');
        }


        public function image()
        {
            return $this->morphOne(Images::class, 'imageable')->latestOfMany();
        }


}
