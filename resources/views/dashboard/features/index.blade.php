@extends('dashboard.layouts.main')

{{-- <h1>Clear all data transactions</h1>            |done
<h1>Audit Trail clear all button</h1>     |ongoing
<h1>Toggleable dashboard contents</h1>          |
<h1>RYR implementation</h1>                     |ongoing
<h1>New bug sidebar dashboard ilang di mobile</h1>|
<h1>STATISTICS Tahunan(cth. pengeluaran 2023)</h1>|ongoing
<h1>Sortir transaksi dari yang terbaru</h1>|done
<h1>Cron Job create transaction fixed outcome dan income</h1>|
<h1>Implementasi API Mutasi rekening dengan https://moota.co/</h1>|
<h1>Pending payments/transactions index(list hutang atau pembayaran yang belum terjadi)</h1>| done (notes: pake index create transaction tapi masuk   dari url yg beda di web.php)
<h1>Upload/ Update CV di Resume </h1>| done
<h1>Resume dinamis diedit dari dashboard </h1>| done

<h1>index for user login sessions? dan simpen field password</h1>|done(field password gabisa disimpen laravel)

<h1>authenticator for login</h1>|
<h1>generate report di dashboard index?(belum tau apa aja yg mau digenerate)</h1>| Problem: Karena ada dynamic value, sekarang dompdf belum bisa handle

<h1>implementasi datatables untuk index dan juga generate pdf,excel,dll</h1>|
<h1>Fitur tracking kelas yoga, start date dan total attendance</h1>|
<h1>Upload dan update CV melalui dashboard</h1>|
<h1>Reminder bayar tagihan dll</h1>| --}}





{{-- <a class="h1" href="/dashboard">Back</a> --}}

@php

// Store a value in the cache for 10 minutes
// Cache::put('key', 'value', now()->addMinutes(10));

// Retrieving the value
$value = Cache::get('key'); // This should return 'value' if it was set

// Removing the value
// Cache::forget('key');

// dd($value);
// Removing the value
// session()->forget('key');
@endphp


@section('container')

<style>
    .btn-custom {
    width: 70%; /* Make all buttons the same width */
    padding: 8px; /* Consistent padding */
    border-radius: 5px; /* Consistent border radius */
    text-align: center; /* Center text */
  }
</style>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Upcoming Features</h1>
                    <p class="mb-4">Features that are on development and to be available!</p>

                    <form action="{{ route('features.index') }}" method="GET">
                    @csrf
                    <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                          <label for="name" class="form-label">Nama</label>
                          <input type="string" class="form-control" id="name" name="name">
                        </div>
                      </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status">
                              <option value=""></option>
                              <option value="Done">Done</option>
                              <option value="Ongoing">Ongoing</option>
                              <option value="Pending">Pending</option>
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                          <button type="submit" class="btn btn-primary btn-custom mb-3">Search</button>
                        </div>
                </form>

                        <div class="col-12 col-md-6 col-lg-4">
                          <a href="/dashboard/features/create" class="btn btn-primary btn-custom mb-3">Create</a>
                        </div>
                      </div>

                    <!-- DataTales Example -->
                    {{-- <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">On Progress</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Feature</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Feature</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Update/upload CV portfolio melalui dashboard</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                        </tr>
                                        <tr>
                                            <td>Fitur tracking kelas yoga, start date dan total attendance</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Features</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Feature</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Feature</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                     @foreach ($features as $feature)

                                         <tr>
                                             <td>{{ $feature->name }}</td>
                                             <td>{{ $feature->status }}</td>
                                             <td>{{ $feature->description }}</td>
                                             <td>{{ $feature->created_at }}</td>
                                             <td>{{ $feature->updated_at }}</td>
                                             <td>
                                                <form action="/dashboard/features/{{$feature->id}}" method="post" class="d-inline">
                                                  @method('delete')
                                                  @csrf

                                                  <button class="badge bg-danger border-0"
                                                  {{-- onclick="return confirm('Are you sure?')" --}}
                                                  >
                                                    <i class="fas fa-regular fa-trash"></i>
                                                  </button>
                                                </form>

                                                <form action="/dashboard/features/{{ $feature->id }}/edit" class="d-inline">
                                                  @csrf
                                                  @method('POST')
                                                  <!-- Not strictly necessary with `POST` method -->
                                                  <button class="badge bg-warning border-0" type="submit">
                                                    <i class="fas fa-regular fa-pen-nib"></i>
                                                  </button>
                                                </form>


                                              </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>

</html>

@endsection
