<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Item extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'total',
        'available',
        'lending_total',
        'repair',
        'lending'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lending()
    {
        return $this->hasMany(Category::class);
    }
}
