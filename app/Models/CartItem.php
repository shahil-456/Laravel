<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;



class Cartitem extends Model
{


    protected static function booted()
    {
        static::creating(function ($product) {
            
            $product->user_id = Auth::id();
            
        });


        
    }



    use HasFactory;
    protected $table = 'cart_items';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity'

    ];


    public static function addProduct($userId, $productId)
    {
        return self::updateOrCreate(
            ['user_id' => $userId, 'product_id' => $productId],
            ['quantity' => \DB::raw('quantity + 1')]
        );
    }



    
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    
}
