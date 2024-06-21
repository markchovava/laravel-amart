<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'category_id',
        'name',
        'description',
        'image',
        'slug',
        'created_at',
        'updated_at',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
