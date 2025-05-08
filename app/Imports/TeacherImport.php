<?php

namespace App\Imports;

use App\Models\RYR\ryrTeachers;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeacherImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        if (ryrTeachers::where('nama', $row['nama'])->exists()) {
            return null; // Skip the row if duplicate is found
        }
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                $row[$key] = 0;
            }
        }
        // dd($row);
        return new ryrTeachers([
            'nama' => $row['nama'],
            'salary' => $row['salary'],
            'join_date' => $row['join_date'],
            'dob' => $row['date_of_birth'],
            'jenis_kelamin' => $row['gender'],
            'instagram' => $row['instagram'],
            'status' => $row['status'],
            'foto' => $row['photo'],
            'deskripsi' => $row['description'],
        ]);
    }
}
