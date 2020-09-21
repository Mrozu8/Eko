<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyItems extends Model
{
    protected $fillable = [
        'buy_id', 'code', 'service_code', 'supplier', 'name', 'quantity', 'unit_price'
    ];

    public function buy_item()
    {
        return $this->belongsTo(Buy::class);
    }
}
