<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarMaker extends Model
{
    protected $fillable = [
        'repair_id', 'worker_id',
    ];

    public function repair_worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

    public function repair_order()
    {
        return $this->belongsTo(Repair::class, 'repair_id');
    }
}
