<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Product extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            $product->cart()->delete();
            $product->orders()->delete();

        });
    }



    protected static function booted()
    {
        static::creating(function ($product) {
            
            $product->added_by = Auth::id();
            
        });
    }


    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'category_id',
        'description',
    ];


    public function cart()
    {
        return $this->hasMany(CartItem::class,'product_id');
                    
    }


    public function orders()
    {
        return $this->hasMany(Order::class,'product_id');
                    
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }



    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
    

    public function scopeFilter($query, $request)
    {
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled(['min', 'max'])) {
            $query->whereBetween('price', [$request->min, $request->max]);
        }

        if ($request->filled(['category_id'])) {
            $query->where('category_id', [$request->category_id]);
        }

        
    }
 
    

    
}
