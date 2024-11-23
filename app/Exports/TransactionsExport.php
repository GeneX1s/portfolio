<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Http\Request;

class TransactionsExport implements FromCollection, WithHeadings, WithMapping, WithTitle, WithChunkReading
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        // Get filter values from the request
    $status_search = $this->request->status;
    $jenis_search = $this->request->jenis;
    $start_date = $this->request->start_date;
    $end_date = $this->request->end_date;
    $profile_filter = $this->request->profile;  // Assuming there's a 'profile' filter too

    // Start building the query
    $query = Transaction::query();

    // Apply filters conditionally
    $transactions = $query
        ->when($status_search, function ($query) use ($status_search) {
            return $query->where('status', 'like', '%' . $status_search . '%');
        })
        ->when($jenis_search, function ($query) use ($jenis_search) {
            return $query->where('kategori', 'like', '%' . $jenis_search . '%');
        })
        ->when($profile_filter, function ($query) use ($profile_filter) {
            return $query->where('profile', $profile_filter);
        })
        ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            return $query->whereDate('created_at', '>=', $start_date)
                         ->whereDate('created_at', '<=', $end_date);
        })
        ->get();  // Finally, get the filtered results

    return $transactions;
    
        // return Transaction::all();
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
            'Nama',
            'Nominal',
            'Kategori',
            'Sub Kategori',
            'Deskripsi',
            'Status',
            'Profile',
            'Balance',
            'Balance Destination',
            'Created At',
            'Updated At',
        ];
    }

    /**
     * Map the data for each row.
     *
     * @param mixed $transaction
     * @return array
     */
    public function map($transaction): array
    {
        return [
            $transaction->id,
            $transaction->nama,
            $transaction->nominal,
            $transaction->kategori,
            $transaction->sub_kategori,
            $transaction->deskripsi,
            $transaction->status,
            $transaction->profile,
            $transaction->balance,
            $transaction->balance_destination,
            $transaction->created_at,
            $transaction->updated_at,
        ];
    }

    /**
     * Define the title for the sheet.
     *
     * @return string
     */
    public function title(): string
    {
        return 'Transactions'; // You can customize the sheet title here.
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
