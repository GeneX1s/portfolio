<?php

namespace App\Imports;

use App\Models\Balance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BalanceImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        if (Balance::where('nama', $row['nama'])->exists()) {
            return null; // Skip the row if duplicate is found
        }
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                $row[$key] = 0;
            }
        }

        foreach ($row as $key => $value) {
            if (is_null($value)) {
                $row[$key] = 0;
            }
        }
        if ($row['updated_at'] == 0) {
            $row['updated_at'] = now();
        }
        // dd($row);
        return new Balance([

            'nama' => $row['nama'],
            'saldo' => $row['saldo'],
            'tipe' => $row['tipe'],
            'dividen' => $row['dividen'],
            'updated_at' => $row['updated_at'],
            'penerima_dividen' => $row['penerima_dividen'],
        ]);
    }
}
