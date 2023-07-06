<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content'
    ];



    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function liked()
    {
        $user_id = Auth::user()->id ?? null;
        $likes_ids = $this->likes()->pluck('user_id')->toArray();
        return in_array($user_id, $likes_ids) ? true : false;
    }
}
