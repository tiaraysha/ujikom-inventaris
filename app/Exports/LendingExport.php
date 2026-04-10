<?php

namespace App\Exports;

use App\Models\Lending;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeading;
use Maatwebsite\Excel\Concerns\WithMapping;

class LendingExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lending::all();
    }

    public function headings(): array {
        return [
            'Item',
            'Total',
            'Name',
            'Ket.',
            'Date',
            'Return Date',
            'Edited By'
        ];
    }

    public function map(): array {
        $lending = Lending::all();

        return [
            $lending->item->name,
            $lending->total,
            $lending->borrower_name,
            $lending->description,
            $lending->edited_by,
            $lending->edited_by,
            $lending->edited_by,
        ];
    }
    
}
