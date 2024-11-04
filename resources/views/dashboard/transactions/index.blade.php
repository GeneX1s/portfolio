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
  <a class="h2" href="/dashboard">Transactions</a>
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
  <form action="{{ route('transactions.index') }}" method="GET">
    @csrf
    <div class="row">
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
      <div class="col-12 col-md-6 col-lg-4">
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-control" name="status" id="status">
            <option value="Active" {{ old('status')=='Active' ? 'selected' : '' }}>Active</option>
            <option value="Deleted" {{ old('status')=='Deleted' ? 'selected' : '' }}>Deleted</option>
            <option value="Pending" {{ old('status')=='Pending' ? 'selected' : '' }}>Pending</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <button type="submit" class="btn btn-primary btn-custom">Search</button>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <a href="/dashboard/transactions/create" class="btn btn-primary btn-custom mb-3">Add New</a>
      </div>
    </div>
  </form>

  <table class="table table-striped table-sm">
    <thead class="thead">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Source</th>
        <th scope="col">Kategori</th>
        <th scope="col">Nominal</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transactions as $transaction)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$transaction->deskripsi}}</td>
        <td>{{$transaction->balance}}</td>
        <td>{{$transaction->kategori}}</td>
        <td>Rp.{{ number_format($transaction->nominal, '2', ',', '.') }}</td>
        <td>{{$transaction->status}}</td>
        <td>
          <form action="/dashboard/transactions/{{$transaction->id}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            @if ($transaction->status != "Deleted")
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
              <i class="fas fa-regular fa-trash"></i>
            </button>
            @endif
          </form>
          <form action="/dashboard/transactions/{{ $transaction->id }}/template" method="post" class="d-inline">
            @csrf
            @method('POST')
            @if ($transaction->status != "Deleted")
            <button class="badge bg-success border-0" type="submit">
              <i class="fas fa-regular fa-plus"></i>
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
      <div class="mb-3">
        <h6>Total : Rp.{{ number_format($total, '2', ',', '.') }}</h6>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="mb-3">
        <h6>Pendapatan(+) : Rp.{{ number_format($pendapatan, '2', ',', '.') }}</h6>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="mb-3">
        <h6>Pengeluaran(-) : Rp.{{ number_format($pengeluaran, '2', ',', '.') }}</h6>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-md-6 col-lg-4">
      <div class="mb-1">
        <form action="{{ url('/dashboard/clear/transactions') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-secondary btn-custom">
            Clear All
          </button>
        </form>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="mb-1">
        <a class="btn btn-warning btn-custom" href="{{ url('/dashboard/transactions/export-pdf') }}">Export to PDF</a>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="mb-1">
        <a class="btn btn-danger btn-custom" href="/dashboard">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection
