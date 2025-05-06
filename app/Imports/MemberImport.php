<?php

namespace App\Imports;

use App\Models\RYR\ryrMembers;
use Maatwebsite\Excel\Concerns\ToModel;

class MemberImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ryrMembers([
            'nama_murid' => $row['nama_murid'],
            'tipe' => $row['tipe'],
            'join_date' => $row['join_date'],
            'total_attendance' => $row['total_attendance'],
            'dob' => $row['dob'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'deskripsi' => $row['deskripsi'],
        ]);
    }
}
