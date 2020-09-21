<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'invoice', 'worker', 'nip', 'buyer_name', 'address', 'cost', 'note'
    ];

    public function sale_item()
    {
        return $this->hasMany(SaleItem::class, 'sale_id');
    }
}
