<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'code', 'name', 'supplier', 'quantity', 'order_item_number', 'item_note'
    ];


    public function item()
    {
        return $this->belongsTo(Order::class);
    }
}
