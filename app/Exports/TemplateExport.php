<?php

namespace App\Exports;

use App\Models\Template;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class TemplateExport implements FromCollection, WithHeadings, WithMapping, WithTitle, WithChunkReading
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Template::all();
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
            'ID Transact',
            'Name',
            'Flag',
            'Created At',
            'Updated At',
        ];
    }

    /**
     * Map the data for each row.
     *
     * @param mixed $Template
     * @return array
     */
    public function map($template): array
    {
        return [
            $template->id,
            $template->id_transact,
            $template->name,
            $template->flag,
            $template->created_at,
            $template->updated_at,
        ];
    }

    /**
     * Define the title for the sheet.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Template'; // You can customize the sheet title here.
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
