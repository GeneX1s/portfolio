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

        if (ryrClasses::where('id', $row['id'])->exists()) {
            return null; // Skip the row if duplicate is found
        }
        // dd($row);
        foreach ($row as $key => $value) {
            if (is_null($value)) {
            $row[$key] = 0;
            }
        }

        return new ryrClasses([
            'id' => $row['id'],
            'nama_kelas' => $row['class_name'],
            'tipe' => $row['type'],
            'teacher' => $row['teacher'],
            'day' => $row['day'],
            // 'schedule' => $row['schedule'],
            'start_time' => $row['start_time'],
            'end_time' => $row['end_time'],
            'biaya' => $row['fee'],
            'foto' => $row['photo'],
            'description' => $row['description'],
        ]);
    }
}


