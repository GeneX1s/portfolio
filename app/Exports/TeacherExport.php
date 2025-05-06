<?php

namespace App\Exports;

use App\Models\RYR\ryrTeachers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class TeacherExport implements FromCollection, WithHeadings, WithMapping, WithTitle, WithChunkReading
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ryrTeachers::all();
    }
    /**
     * Define the headings of the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama',
            'Salary',
            'Join Date',
            'Date of Birth',
            'Gender',
            'Instagram',
            'Status',
            'Photo',
            'Description',
        ];
    }

    /**
     * Map the data for each row.
     *
     * @param mixed $teacher
     * @return array
     */
    public function map($teacher): array
    {
    return [
        $teacher->nama,
        $teacher->salary,
        $teacher->join_date,
        $teacher->dob,
        $teacher->jenis_kelamin,
        $teacher->instagram,
        $teacher->status,
        $teacher->foto,
        $teacher->deskripsi,
    ];
    }

    /**
     * Define the title for the sheet.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Teachers'; // You can customize the sheet title here.
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
