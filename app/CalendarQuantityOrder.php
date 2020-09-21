<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarQuantityOrder extends Model
{
    protected $fillable = [
        'date', 'quantity'
    ];
}
