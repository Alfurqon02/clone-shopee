<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'slug',
        // 'shipment',
        'stock',
        'description',
        'user_id',
        'image'
    ];


    public function categories(){
        return $this->belongsToMany(Category::class, 'items_categories', 'item_id', 'category_id');
    }
    public function users(){
        return $this->belongsToMany(User::class, 'users_items', 'item_id', 'user_id');
    }

    public function shipments(){
        return $this->belongsToMany(Shipment::class, 'items_shipments', 'shipment_id', 'item_id');
    }
    public function orders(){
        return $this->hasMany(Order::class, 'orders', 'item_id');
    }


}
