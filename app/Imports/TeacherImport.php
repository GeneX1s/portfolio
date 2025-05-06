<?php

namespace App\Imports;

use App\Models\RYR\ryrTeachers;
use Maatwebsite\Excel\Concerns\ToModel;

class TeacherImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ryrTeachers([
            'nama' => $row['nama'],
            'salary' => $row['salary'],
            'join_date' => $row['join_date'],
            'dob' => $row['dob'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'instagram' => $row['instagram'],
            'status' => $row['status'],
            'foto' => $row['foto'],
            'deskripsi' => $row['deskripsi'],
        ]);
    }
}
