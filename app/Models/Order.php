<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'user_id',
        'receiver',
        'address',
        'shipment_id',
        'total_price',
        'quantity',
        'status',
    ];

    public function items(){
        return $this->belongsToMany(Order::class, 'orders', 'item_id');
    }
    public function users(){
        return $this->belongsTo(User::class, 'orders', 'user_id');
    }

}
