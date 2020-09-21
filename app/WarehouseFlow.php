<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseFlow extends Model
{
    protected $fillable = [
        'worker', 'status','buy_id', 'code', 'service_code', 'supplier', 'name', 'quantity', 'unit_price', 'warehouse'
    ];

    public function warehouse_item()
    {
        return $this->belongsTo(Buy::class, 'buy_id');
    }
}
