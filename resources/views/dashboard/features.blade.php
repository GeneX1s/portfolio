<h1>Export data to excel</h1>                   |halt
<h1>Multiple Profile( untuk RYR) dan users</h1> |done
<h1>Assets</h1>                                 |done
<h1>Clear all data transactions</h1>            |done
<h1>Audit Log</h1>                              |
<h1>Toggleable dashboard contents</h1>          |
<h1>RYR implementation</h1>                     |

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

<a class="h1" href="/dashboard">Back</a>