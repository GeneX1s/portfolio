<?php

namespace App\Imports;

use App\Models\Template;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TemplateImport implements ToModel, WithHeadingRow
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
        return new Template([
            'id' => $row['id'],
            'name' => $row['id_transact'],
            'status' => $row['name'],
            'description' => $row['flag'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ]);
    }
}
