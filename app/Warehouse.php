<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Buy;

class Warehouse extends Model
{
    protected $fillable = [
        'buy_id', 'code', 'service_code', 'supplier', 'name', 'quantity', 'unit_price', 'warehouse'
    ];

    public function warehouse_item()
    {
        return $this->belongsTo(Buy::class, 'buy_id');
    }

    public function book_warehouse()
    {
        return $this->hasMany(Book::class, 'warehouse_id');
    }
}
