<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $fillable = [
        "repair_number", "worker", "nip", "customer", "address", "phone_one", "phone_two", "customer_note", "model", "code_first", "code_second", "serial_number", "supplier", "warranty", "sale_date", "damage_note", "other_note", "repair_date", "status", "cost", "delivery_cost", "success", "note_end", "total_cost"
    ];

    public function repair_order()
    {
        return $this->hasMany(CalendarMaker::class, 'repair_id');
    }

    public function items_repair()
    {
        return $this->hasMany(RepairItem::class, 'repair_id');
    }
}
