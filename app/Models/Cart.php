<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    /**
     * Get the customer that owns the cart.
     */
    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the products for the cart.
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
