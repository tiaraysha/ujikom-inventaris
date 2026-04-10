<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lending;
use Carbon\Carbon;

class LendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lending::create([
            'borrower_name' => 'tiara',
            'item_id' => 1,
            'total' => 10,
            'description' => 'keperluan',
            'date' => Carbon::now(),
            'return_date' => '2026-04-10',
            'status' => 'Not Returned',
            'edited_by' => 'ubah auth'
        ]);
    }
}
