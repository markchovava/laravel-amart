<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'address',
        'phone',
        'email',
        'facebook',
        'instagram',
        'website',
        'image',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'shop_categories', 'shop_id', 'category_id')
            ->withTimestamps();
    }
    
}
