<?php

namespace App\Imports;

use App\Models\RYR\ryrClasses;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClassImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new ryrClasses([
            'id' => $row['id'],
            'nama_kelas' => $row['class_name'],
            'tipe' => $row['type'],
            'teacher' => $row['teacher'],
            'day' => $row['day'],
            'schedule' => $row['schedule'],
            'start_time' => $row['start_time'],
            'end_time' => $row['end_time'],
            'biaya' => $row['fee'],
            'foto' => $row['photo'],
            'description' => $row['description'],
        ]);
    }
}
