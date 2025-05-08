<?php

namespace App\Imports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        // dd($row);
        return new Transaction([
            'nama' => $row['nama'],
            'nominal' => $row['nominal'],
            'kategori' => $row['kategori'],
            'sub_kategori' => $row['sub_kategori'],
            'deskripsi' => $row['deskripsi'],
            'status' => $row['status'],
            'profile' => $row['profile'],
            'balance' => $row['balance'],
            'balance_destination' => $row['balance_destination'],
            'created_at' => $row['created_at'],

        ]);
    }
}
