<?php

namespace App\Exports;

use App\Models\RYR\ryrMembers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class MemberExport implements FromCollection, WithHeadings, WithMapping, WithTitle, WithChunkReading
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ryrMembers::all();
    }
    /**
     * Define the headings of the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama Murid',
            'Tipe',
            'Join Date',
            'Total Attendance',
            'Date of Birth',
            'Jenis Kelamin',
            'Deskripsi',
        ];
    }

    /**
     * Map the data for each row.
     *
     * @param mixed $Member
     * @return array
     */
    public function map($member): array
    {
        return [
            $member->nama_murid,
            $member->tipe,
            $member->join_date,
            $member->total_attendance,
            $member->dob,
            $member->jenis_kelamin,
            $member->deskripsi,
        ];
    }

    /**
     * Define the title for the sheet.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Members'; // You can customize the sheet title here.
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

