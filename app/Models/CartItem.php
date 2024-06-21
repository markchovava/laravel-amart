<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'image',
        'quantity',
        'cart_id',
        'name',
        'price',
        'total',
        'created_at',
        'updated_at'
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
