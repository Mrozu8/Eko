<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'user_id', 'warehouse_id', 'quantity'
    ];

    public function book_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book_warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
}
