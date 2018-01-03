<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model{

    protected $table = 'order_user';
    protected $fillable = ['user_id', 'product_id', 'status', 'quantity', 'value'];
}
