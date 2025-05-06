<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class UsersExport implements FromCollection, WithHeadings, WithMapping, WithTitle, WithChunkReading
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }
    /**
     * Define the headings of the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Username',
            'Email',
            'Password',
            'Role',
            'Created At',
            'Updated At',
        ];
    }

    /**
     * Map the data for each row.
     *
     * @param mixed $User
     * @return array
     */
    public function map($user): array
    {
        return [
            $user->id,
            $user->username,
            $user->email,
            $user->password,
            $user->role,
            $user->created_at,
            $user->updated_at,
        ];
    }

    /**
     * Define the title for the sheet.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Users'; // You can customize the sheet title here.
    }

    /**
     * Chunk the data for better memory performance when exporting large datasets.
     *
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000; // This will chunk the data in sets of 1000 rows at a time.
    }
}
