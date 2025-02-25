@extends('dashboard.layouts.main')

<style>
  .img {
    width: 70px;
    border-radius: 50%;
    float: left;
    border: 5px solid rgba(255, 255, 255, 0.2);
  }

  .content {
    display: flex;
    flex-direction: column; /* Stack items vertically on mobile */
    align-items: center; /* Center items horizontally */
    justify-content: flex-start; /* Align items to the top */
    height: auto; /* Allow height to adjust */
    padding: 20px; /* Add some padding */
  }

  @media (min-width: 768px) {
    .content {
      flex-direction: row; /* Stack items side by side on larger screens */
      align-items: flex-start; /* Align items to the start */
      justify-content: space-between; /* Space out items */
      padding: 40px; /* More padding on larger screens */
    }
  }

  .table-responsive {
    width: 100%;
    overflow-x: auto; /* Allow horizontal scroll on small screens */
  }

  .btn-custom {
    width: 70%; /* Make all buttons the same width */
    padding: 10px; /* Consistent padding */
    border-radius: 5px; /* Consistent border radius */
    text-align: center; /* Center text */
  }

  .alert {
    margin-bottom: 20px; /* Add spacing below alerts */
  }

  table {
    width: 100%; /* Ensure the table takes full width */
  }

  th, td {
    text-align: left; /* Align text to the left */
  }

  /* Responsive styles for mobile */
  @media (max-width: 768px) {
    .btn-custom {
      padding: 8px; /* Adjust button padding for smaller screens */
    }

    .row > .col-12 {
      flex: 0 0 100%; /* Ensure full width for columns on mobile */
      max-width: 100%; /* Remove any max-width constraint */
    }
  }
</style>

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <a class="h2" href="/dashboard">Templates</a>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive">

  <table class="table table-striped table-sm">
    <thead class="thead">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">ID Transaksi</th>
        <th scope="col">Kategori</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Nominal</th>
        <th scope="col">Date</th>
        <th scope="col">Flag</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($templates as $template)
    @php

        $trx = \App\Models\Transaction::where('id', $template->id_transact)->first();

    @endphp

      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$template->id_transact}}</td>
        <td>{{$trx->kategori}}</td>
        <td>{{$trx->deskripsi}}</td>
        <td>Rp.{{ number_format($trx->nominal, '2', ',', '.') }}</td>
        <td>{{$trx->created_at}}</td>
        <td>{{$template->flag}}</td>
        <td>
          <form action="/dashboard/templates/{{$template->id}}/setMonthly" method="post" class="d-inline">
            @method('post')
            @csrf
            @if ($template->status != "Deleted")
            <button class="badge bg-success border-0">
              <i class="fas fa-regular fa-pen-nib"></i>
            </button>
          </form>
          <form action="/dashboard/templates/{{$template->id}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
              <i class="fas fa-regular fa-trash"></i>
            </button>
            @endif
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


  <div class="row">
    <div class="col-12 col-md-6 col-lg-4">
      <div class="mb-1">
        <a class="btn btn-danger btn-custom" href="/dashboard/transactions">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection
