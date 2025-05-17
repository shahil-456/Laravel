<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ProductCategory extends Model
{



   
    use HasFactory;

    protected $fillable = [
        'name',

    ];





    public function cart()
    {
        return $this->hasMany(CartItem::class);
                    
    }


    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }







 
    

    
}
