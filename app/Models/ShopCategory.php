<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'user_id',
        'shop_id',
        'category_id'
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function shop(){
        return $this->belongsTo(Product::class, 'shop_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
