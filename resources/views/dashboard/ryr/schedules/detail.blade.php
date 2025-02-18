@extends('dashboard.layouts.main')

@section('container')
<style>
    .btn-custom {
        width: 70%;
        /* Make all buttons the same width */
        padding: 8px;
        /* Consistent padding */
        border-radius: 5px;
        /* Consistent border radius */
        text-align: center;
        /* Center text */
    }

    table {
        width: 100%;
        /* Ensure the table takes full width */
    }

    th,
    td {
        text-align: left;
        /* Align text to the left */
    }

    .content {
        display: flex;
        flex-direction: column;
        /* Stack items vertically on mobile */
        align-items: center;
        /* Center items horizontally */
        justify-content: flex-start;
        /* Align items to the top */
        height: auto;
        /* Allow height to adjust */
        padding: 20px;
        /* Add some padding */
    }

    @media (min-width: 768px) {
        .content {
            flex-direction: row;
            /* Stack items side by side on larger screens */
            align-items: flex-start;
            /* Align items to the start */
            justify-content: space-between;
            /* Space out items */
            padding: 40px;
            /* More padding on larger screens */
        }
    }

    .row {
        margin-top: 1%;

    }

    .mb-3 {
        margin-bottom: 1rem;
        /* Adjust as needed */
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
    <a class="h2" href="/dashboard/ryr/schedules">{{ $schedule->class_name }}, {{ $schedule->tanggal }}</a>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif

<h5 class="mt-2">Total Profit: </h5>
<div class="table-responsive">

    <form action="{{ url('/dashboard/ryr/schedules/' . $schedule->id . '/detail') }}" method="GET">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="nama_murid" class="form-label">Nama Murid</label>
                    <input type="string" class="form-control" id="nama_murid" name="nama_murid">
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe</label>
                    <select class="form-control" name="tipe" id="tipe">
                        <option value=""></option>
                        <option value="Non-Member">Non-Member</option>
                        <option value="Bulanan 1">Bulanan 1</option>
                        <option value="Bulanan Special">Bulanan Special</option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="payment_status" class="form-label">Status Pembayaran</label>
                    <select class="form-control" name="payment_status" id="payment_status">
                        <option value=""></option>
                        <option value="Done">Done</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <button type="submit" class="btn btn-primary btn-custom mb-3">Search</button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="/dashboard/ryr/schedules/{{$schedule->id}}" class="btn btn-primary btn-custom mb-3">Add New</a>
            </div>
        </div>
    </form>

    {{-- <form action="{{ route('members.import') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="col-12 col-md-6 col-lg-4">

            <div class="mb-3">

                <label class="form-label" for="customFile">Import Data</label>
                <input type="file" class="form-control" id="customFile" name="file" />

            </div>

        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mb-3">

                <button type="submit" class="btn btn-success btn-custom mb-3">(+)Import from Excel/CSV</a>

            </div>
        </div>

    </form> --}}

    <h2 class="h4">Participants</h2>


    <table class="table table-striped table-sm">
        <thead class="thead">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Murid</th>
                <th scope="col">Tipe</th>
                <th scope="col">Tipe Pembayaran</th>
                <th scope="col">Status Pembayaran</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $participant)

            @php


            if($participant->payment_status == 'Done'){
            $total += $participant->nominal;
            }
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $participant->nama_member }}</td>
                <td>{{ $participant->tipe }}</td>
                <td>{{ $participant->payment_type }}</td>
                <td>{{ $participant->payment_status}}</td>
                <td>

                    <a class="btn btn-warning btn-sm" href="{{ route('dashboard.ryr.edit', $participant->id) }}">Edit</a>
                    <form action="/dashboard/ryr/schedules/{{ $participant->id }}/delete" method="POST"
                        class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <h6 class=>Total Participants: {{ $participants->count() }}</h6>


    <form action="{{ route('dashboard.ryr.finalize', $schedule->id) }}" method="POST">
        @csrf
        <!-- Hidden fields to pass values -->
        <input type="hidden" name="nominal" value="{{ $total }}">
        <input type="hidden" name="deskripsi" value="{{ $schedule->class_name }}">

        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="mb-1">
                    <button type="submit" class="btn btn-warning btn-custom">Finish</button>
                </div>
    </form>
</div>

<div class="col-12 col-md-6 col-lg-4">
    <a class="btn btn-danger btn-custom" href="/dashboard/ryr/schedules">Back</a>
</div>
</div>

</div>

@endsection
