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
    <a class="h2" href="/dashboard">Schedules</a>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive">
    {{-- <a href="/dashboard/ryr/posts/create" class="btn btn-primary mb-3">Insert New Product</a> --}}<form
        action="{{ route('schedules.index') }}" method="GET">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="class_name" class="form-label">Kelas</label>
                    <select class="form-control" name="class_name" id="class_name">
                        <option value=""></option>
                        @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value=""></option>
                        <option value="Ongoing">Ongoing</option>
                        <option value="Done">Done</option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <button type="submit" class="btn btn-primary btn-custom mb-3">Search</button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="/dashboard/ryr/schedules/create" class="btn btn-primary btn-custom mb-3">Add New</a>
            </div>
        </div>
    </form>

    {{-- <form action="{{ route('schedules.import') }}" method="POST" enctype="multipart/form-data">
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

    <table class="table table-striped table-sm">
        <thead class="thead">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Tipe</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Total Murid</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
            @php
            $count = $participants
            ->where('id_schedule', $schedule->id)
            ->where('grup', 'Schedule')
            ->count();
            @endphp
            <tr>
                <td>{{$loop->iteration}}</td>

                <td>{{$schedule->class_name}}</td>
                <td>{{$schedule->tipe}}</td>
                <td>{{$schedule->tanggal}}</td>
                <td>{{$count}}</td>
                <td>{{$schedule->status}}</td>
                <td>
                    @if ($schedule->status == 'Ongoing')
                    <form action="/dashboard/ryr/schedules/{{$schedule->id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf

                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-regular fa-trash"></i>
                        </button>
                    </form>

                    @if($schedule->tipe != 'Regular')
                    <form action="/dashboard/ryr/schedules/{{ $schedule->id }}/edit" class="d-inline">
                        @csrf
                        @method('POST')
                        <!-- Not strictly necessary with `POST` method -->
                        <button class="badge bg-warning border-0" type="submit">
                            <i class="fas fa-regular fa-pen-nib"></i>
                        </button>
                    </form>

                    @endif

                    <form action="/dashboard/ryr/schedules/{{ $schedule->id }}/detail" class="d-inline">
                        @csrf
                        @method('POST')
                        <!-- Not strictly necessary with `POST` method -->
                        <button class="badge bg-primary border-0" type="submit">
                            <i class="fas fa-regular fa-list"></i>
                        </button>
                    </form>
                    @endif

                </td>

            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="row">

        <div class="col-12 col-md-6 col-lg-4">
            <div class="mb-1">
              <form action="{{ url('/dashboard/clear/schedules') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary btn-custom"
                onclick="return confirm('Are you sure?')">
                  Clear All
                </button>
              </form>
            </div>
          </div>

        <div class="col-12 col-md-6 col-lg-4">
            <a class="btn btn-danger btn-custom" href="/dashboard">Back</a>
        </div>
    </div>

</div>

@endsection
