<?php

namespace App\Imports;

use App\Models\RYR\ryrParticipants;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParticipantImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {


        if (ryrParticipants::where('id', $row['id'])->exists()) {
            return null;
        }

        foreach ($row as $key => $value) {
            if (is_null($value)) {
                $row[$key] = 0;
            }
        }

        return new ryrParticipants([
            'id' => $row['id'],
            'id_member' => $row['id_member'],
            'nama_member' => $row['nama_member'],
            'id_kelas' => $row['id_kelas'],
            'nama_kelas' => $row['nama_kelas'],
            'tipe' => $row['tipe'],
            'grup' => $row['grup'],
            'payment_type' => $row['payment_type'],
            'payment_status' => $row['payment_status'],
            'id_schedule' => $row['id_schedule'],
            'deskripsi' => $row['deskripsi'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ]);
    }
}
