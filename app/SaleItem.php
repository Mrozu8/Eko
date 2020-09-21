<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $fillable = [
        'sale_id', 'code', 'name', 'quantity', 'unit_price'
    ];

    public function sale_item()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }
}
