<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function customers()
    {
        return $this->hasMany(Customer::class, 'added_by');    
    }


    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id');    
    }



    public function products()
    {
        return $this->hasMany(Product::class, 'added_by');    
    }


    public function cart()
    {
        return $this->hasMany(CartItem::class, 'user_id');    
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');    
    }

    public function checkoutCart()
    
    {
        foreach ($this->cart as $item) {
            Order::create([
                'user_id' => $this->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
                'total' => $item->quantity * $item->product->price,
            ]);
        }

        $this->cart()->delete();
    }


}
