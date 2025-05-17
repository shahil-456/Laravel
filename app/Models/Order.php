<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;



class Order extends Model
{


    protected static function booted()
    {
        static::creating(function ($order) {
            
            $order->user_id = Auth::id();
            
        });


        
    }



    use HasFactory;
    // protected $table = 'cart_items';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'total'
    ];


    



    

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function order()
    // {
    //     return $this->belongsTo(User::class);
    // }

    
}
