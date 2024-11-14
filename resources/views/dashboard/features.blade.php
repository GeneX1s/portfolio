<h1>Clear all data transactions</h1>            |done
<h1>Audit Log</h1>                              |
<h1>Toggleable dashboard contents</h1>          |
<h1>RYR implementation</h1>                     |ongoing
<h1>New bug sidebar dashboard ilang di mobile</h1>|
<h1>STATISTICS Tahunan(cth. pengeluaran 2023)</h1>|
<h1>Investment Earning Total di Index balance</h1>|
<h1>Penambahan field dividen untuk Balance Investment</h1>|
<h1>Tambahkan end date untuk investment?</h1>|



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
