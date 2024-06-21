<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'shop_id',
        'brand_id',
        'code',
        'condition',
        'description',
        'name',
        'price',
        'priority',
        'quantity',
        'rating',
        'source',
        'created_at',
        'updated_at',
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function product_specs(){
        return $this->hasMany(ProductSpec::class, 'product_id', 'id');
    }

    public function product_variations(){
        return $this->hasMany(ProductVariation::class, 'product_id', 'id');
    }

    public function product_images(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id')
            ->withTimestamps();
    }

    public function sub_categories(){
        return $this->belongsToMany(SubCategory::class, 'product_sub_categories', 'product_id', 'sub_category_id')
            ->withTimestamps();
    }
    

}
