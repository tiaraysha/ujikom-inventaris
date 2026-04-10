<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{

    protected $fillable = [
        'item_id',
        'total',
        'borrower_name',
        'description',
        'date',
        'status',
        'edited_by',
        'return_date'
    ];

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
