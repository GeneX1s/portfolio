<?php

namespace App\Imports;

use App\Models\Features;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FeatureImport implements ToModel, WithHeadingRow
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
        return new Features([
            'id' => $row['id'],
            'name' => $row['name'],
            'status' => $row['status'],
            'description' => $row['description'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ]);
    }
}
