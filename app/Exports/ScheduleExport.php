<?php

namespace App\Exports;

use App\Models\RYR\ryrSchedules;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ScheduleExport implements FromCollection, WithHeadings, WithMapping, WithTitle, WithChunkReading
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ryrSchedules::all();
    }
    /**
     * Define the headings of the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Class ID',
            'Class Name',
            'Teacher Name',
            'Status',
            'Date',
            'Start Time',
            'End Time',
            'Type',
            'Price',
            'Profit',
        ];
    }

    /**
     * Map the data for each row.
     *
     * @param mixed $schedule
     * @return array
     */
    public function map($schedule): array
    {
        return [
            $schedule->class_id,
            $schedule->class_name,
            $schedule->teacher_name,
            $schedule->status,
            $schedule->tanggal,
            $schedule->start_time,
            $schedule->end_time,
            $schedule->tipe,
            $schedule->harga,
            $schedule->profit,
        ];
    }

    /**
     * Define the title for the sheet.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Schedules'; // You can customize the sheet title here.
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
