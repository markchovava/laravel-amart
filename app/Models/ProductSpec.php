<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpec extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'name',
        'value',
        'updated_at',
        'created_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
