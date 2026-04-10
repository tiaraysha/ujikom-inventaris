<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Category extends Model
{
    protected $fillable = [
        'name',
        'division_pj',
    ];

    public function Item() {
        return $this->hasMany(Item::class);
    }
}
