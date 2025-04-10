<?php

namespace App\Imports;

use App\Models\Balance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BalanceImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        // dd($row);
        return new Balance([

            'nama' => $row['nama'],
            'saldo' => $row['saldo'],
            'tipe' => $row['tipe'],
            'dividen' => $row['dividen'],
            'updated_at' => $row['updated_at'],
        ]);
    }
}
