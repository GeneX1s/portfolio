<?php

namespace App\Exports;

use App\Models\RYR\ryrClasses;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ClassExport implements FromCollection, WithHeadings, WithMapping, WithTitle, WithChunkReading
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ryrClasses::all();
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
            'Class Name',
            'Type',
            'Teacher',
            'Day',
            'Schedule',
            'Start Time',
            'End Time',
            'Fee',
            'Photo',
            'Description',
        ];
    }

    /**
     * Map the data for each row.
     *
     * @param mixed $class
     * @return array
     */
    public function map($class): array
    {
        return [
        $class->id,
        $class->nama_kelas,
        $class->tipe,
        $class->teacher,
        $class->day,
        $class->schedule,
        $class->start_time,
        $class->end_time,
        $class->biaya,
        $class->foto,
        $class->description,
    ];
    }

    /**
     * Define the title for the sheet.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Classs'; // You can customize the sheet title here.
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
