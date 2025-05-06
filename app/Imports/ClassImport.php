<?php

namespace App\Imports;

use App\Models\RYR\ryrClasses;
use Maatwebsite\Excel\Concerns\ToModel;

class ClassImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ryrClasses([
            'id' => $row['id'],
            'nama_kelas' => $row['nama_kelas'],
            'tipe' => $row['tipe'],
            'teacher' => $row['teacher'],
            'day' => $row['day'],
            'schedule' => $row['schedule'],
            'start_time' => $row['start_time'],
            'end_time' => $row['end_time'],
            'biaya' => $row['biaya'],
            'foto' => $row['foto'],
            'description' => $row['description'],
        ]);
    }
}
