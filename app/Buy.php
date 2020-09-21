<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Warehouse;

class Buy extends Model
{
    protected $fillable = [
        'invoice', 'worker', 'nip', 'dealer_name', 'address', 'cost', 'note'
    ];

    public function warehouse_item()
    {
        return $this->hasMany(Warehouse::class, 'buy_id');
    }

    public function buy_item()
    {
        return $this->hasMany(BuyItems::class, 'buy_id');
    }
}
