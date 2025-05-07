<?php

namespace App\Imports;

use App\Models\RYR\ryrMembers;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MemberImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        foreach ($row as $key => $value) {
            if (is_null($value)) {
                $row[$key] = 0;
            }
        }
        // dd($row);
        return new ryrMembers([
            'nama_murid' => $row['nama_murid'],
            'tipe' => $row['tipe'],
            'join_date' => $row['join_date'],
            'total_attendance' => $row['total_attendance'],
            'dob' => $row['date_of_birth'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'deskripsi' => $row['deskripsi'],
        ]);
    }
}
