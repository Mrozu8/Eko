<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairItem extends Model
{
    protected $fillable = [
        'repair_id', 'code', 'name', 'unit_price', 'quantity'
    ];


    public function items_repair()
    {
        return $this->belongsTo(Repair::class, 'repair_id');
    }
}
