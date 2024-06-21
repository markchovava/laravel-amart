<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'email',
        'phone',
        'website',
        'address',
        'whatsapp',
        'facebook',
        'instagram',
        'image',
        'created_at',
        'updated_at'
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
