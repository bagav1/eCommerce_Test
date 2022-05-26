<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status_id',
        'total',
    ];

    protected $hidden = [
        'user_id',
        'status_id',
    ];

    public function user(){
        return $this->belongsTo(User::Class,'user_id');
    }

    public function status(){
        return $this->belongsTo(Status::Class,'status_id');
    }
}
