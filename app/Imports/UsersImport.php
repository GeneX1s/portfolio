<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if (User::where('id', $row['id'])->orWhere('username', $row['username'])->orWhere('email', $row['email'])->exists()) {
            return null; // Skip the row if duplicate is found
        }

        foreach ($row as $key => $value) {
            if (is_null($value)) {
            $row[$key] = 0;
            }
        }
        return new User([
            'id' => $row['id'],
            'username' => $row['username'],
            'email' => $row['email'],
            'password' => $row['password'],
            'role' => $row['role'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ]);
    }
}
