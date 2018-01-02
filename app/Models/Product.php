<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    protected $fillable = [
        'name', 'amount', 'description', 'image',
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'order_user', 'product_id', 'user_id');
    }
}
