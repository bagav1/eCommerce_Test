<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'status_id',
        'order_id'
    ];

    protected $hidden = [
        'user_id',
        'product_id',
        'status_id',
        'order_id'
    ];

    public function user(){
        return $this->belongsTo(User::Class,'user_id');
    }

    public function product(){
        return $this->belongsTo(Product::Class,'product_id');
    }

    public function status(){
        return $this->belongsTo(Status::Class,'status_id');
    }

    public function order(){
        return $this->belongsTo(Order::Class,'order_id');
    }
}
