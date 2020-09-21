<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderItem;

class Order extends Model
{
    protected $fillable = [
      'order_number', 'worker', 'nip', 'customer_name', 'address', 'phone', 'price', 'advance', 'customer_note', 'order_type', 'order_note', 'status'
    ];


    public function item()
    {
        return $this->hasMany(OrderItem::class);
    }
}
