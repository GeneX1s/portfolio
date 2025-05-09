<?php

namespace App\Imports;

use App\Models\RYR\ryrSchedules;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ScheduleImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        if (ryrSchedules::where('class_id', $row['class_id'])->where('tanggal', $row['tanggal'])->exists()) {
            return null; // Skip the row if duplicate is found
        }

        foreach ($row as $key => $value) {
            if (is_null($value)) {
                $row[$key] = 0;
            }
        }

        return new ryrSchedules([
            'class_id' => $row['class_id'],
            'class_name' => $row['class_name'],
            'teacher_name' => $row['teacher_name'],
            'status' => $row['status'],
            'tanggal' => $row['date'],
            'start_time' => $row['start_time'],
            'end_time' => $row['end_time'],
            'tipe' => $row['type'],
            'harga' => $row['price'],
            'description' => $row['description'],
            'profit' => $row['profit'],
        ]);
    }
}
