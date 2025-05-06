<?php

namespace App\Imports;

use App\Models\RYR\ryrSchedules;
use Maatwebsite\Excel\Concerns\ToModel;

class ScheduleImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ryrSchedules([
            'class_id' => $row['class_id'],
            'class_name' => $row['class_name'],
            'teacher_name' => $row['teacher_name'],
            'status' => $row['status'],
            'tanggal' => $row['tanggal'],
            'start_time' => $row['start_time'],
            'end_time' => $row['end_time'],
            'tipe' => $row['tipe'],
            'harga' => $row['harga'],
            'profit' => $row['profit'],
        ]);
    }
}
