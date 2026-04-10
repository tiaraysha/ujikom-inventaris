<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'category_id' => '1',
            'name' => 'Kompor',
            'total' => 100,
            'available' => 100,
            'lending_total' => 0,
            'lending' => 0,
            'repair' => 0
        ]);
    }
}
