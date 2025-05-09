<?php

namespace App\Exports;

use App\Models\RYR\ryrParticipants;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ParticipantExport implements FromCollection, WithHeadings, WithMapping, WithTitle, WithChunkReading
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ryrParticipants::all();
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
            'ID Member',
            'Nama Member',
            'ID Kelas',
            'Nama Kelas',
            'Tipe',
            'Grup',
            'Payment Type',
            'Payment Status',
            'ID Schedule',
            'Deskripsi',
            'Created At',
            'Updated At',
        ];
    }

    /**
     * Map the data for each row.
     *
     * @param mixed $participant
     * @return array
     */
    public function map($participant): array
    {
        return [
            $participant->id,
            $participant->id_member,
            $participant->nama_member,
            $participant->id_kelas,
            $participant->nama_kelas,
            $participant->tipe,
            $participant->grup,
            $participant->payment_type,
            $participant->payment_status,
            $participant->id_schedule,
            $participant->deskripsi,
            $participant->created_at,
            $participant->updated_at,
        ];
    }

    /**
     * Define the title for the sheet.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Participants'; // You can customize the sheet title here.
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
