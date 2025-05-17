<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Comment extends Model
{



    protected static function booted()
    {
        static::creating(function ($comment) {
            
            $comment->user_id = Auth::id();
            
        });
    }



    use HasFactory;

    protected $fillable = [
        'blog_id',
        'user_id',
        'comment',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    


    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'added_by');
    // }

    
}
