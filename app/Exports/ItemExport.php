<?php

namespace App\Exports;

use App\Models\Item;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class ItemExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $category = Category::all();
        // $item = Item::with('category')->get();
        // return compact($category, $item);

        return Item::all();
    }

    public function headings(): array
    {
        return [
            'no',
            'Category',
            'Name',
            'Total',
            'Repair',
            'Lending',
        ];
    }

    public function map($item): array
    {
        $created_at = Carbon::parse($item->created_at)->format('d F Y');
        return [
            $item->id,
            $item->category->name,
            $item->name,
            $item->total,
            $item->repair,
            $item->lending,
        ];
    }
}
