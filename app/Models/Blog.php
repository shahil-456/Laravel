<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Blog extends Model
{

    protected static function booted()
    {
        static::creating(function ($blog) {
            
            $blog->user_id = Auth::id();
            
        });
    }



    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',

    ];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
