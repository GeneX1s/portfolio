<h1>Clear all data transactions</h1>            |done
<h1>Audit Trail index dan implementasi</h1>     |ongoing
<h1>Toggleable dashboard contents</h1>          |
<h1>RYR implementation</h1>                     |ongoing
<h1>New bug sidebar dashboard ilang di mobile</h1>|
<h1>STATISTICS Tahunan(cth. pengeluaran 2023)</h1>|
<h1>Tambahkan end date untuk investment?</h1>|
<h1>Sortir transaksi dari yang terbaru</h1>|done
<h1>Cron Job create transaction fixed outcome dan income</h1>|
<h1>Implementasi API Mutasi rekening dengan https://moota.co/</h1>|
<h1>View transaction templates index</h1>|



<a class="h1" href="/dashboard">Back</a>

@php

// Store a value in the cache for 10 minutes
// Cache::put('key', 'value', now()->addMinutes(10));

// Retrieving the value
$value = Cache::get('key'); // This should return 'value' if it was set

// Removing the value
// Cache::forget('key');

dd($value);
// Removing the value
// session()->forget('key');
@endphp
