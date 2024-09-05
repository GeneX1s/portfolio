@extends('dashboard.layouts.main')

<style>
  .img {
    width: 70px;
    border-radius: 50%;
    float: left;
    border: 5px solid rgba(255, 255, 255, 0.2);
  }

  .content {
            width: 100%; /* Default for small screens */
        }

        @media (min-width: 768px) { /* Medium screens and up */
            .content {
                width: 40%; /* 40% width on medium and larger screens */
            }
          }

        @media (max-width: 767px) { /* Medium screens and up */
            .content {
                width: 100%; /* 40% width on medium and larger screens */
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

<div class="table-responsive">
  {{-- <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Insert New Product</a> --}}<form
    action="{{ route('transactions.index') }}" method="GET">
    @csrf
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4 w-100">
        <div class="mb-3">
          <label for="start_date" class="form-label">Start Date</label>
          <input type="date" class="form-control" id="start_date" name="start_date">
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4 w-100">
        <div class="mb-3">
          <label for="end_date" class="form-label">End Date</label>
          <input type="date" class="form-control" id="end_date" name="end_date">
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4 w-100">
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
      <div class="col-12 col-md-6 col-lg-3 w-100">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
      <div class="col-12 col-md-6 col-lg-4 w-100">
        <a href="/dashboard/transactions/create" class="btn btn-primary mb-3">Add New</a>
      </div>
    </div>
  </form>


  <table class="table table-striped table-sm">
    <thead class="thead">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">ID Transaksi</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Kategori</th>
        <th scope="col">Nominal</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transactions as $transaction)
      <tr>
        <td>{{$loop->iteration}}</td>

        <td>{{$transaction->nama}}</td>
        <td>{{$transaction->created_at}}</td>
        <td>{{$transaction->kategori}}</td>
        <td>Rp.{{ number_format($transaction->nominal, '2', ',', '.') }}</td>
        <td>{{$transaction->deskripsi}}</td>
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
            <!-- Not strictly necessary with `POST` method -->
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
    <div class="col-12 col-md-6 col-lg-4 w-100">
      <div class="mb-3">
        <h6>Total : Rp.{{ number_format($total, '2', ',', '.') }}</h6>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 w-100">
      <div class="mb-3">
        <h6>Pendapatan(+) : Rp.{{ number_format($pendapatan, '2', ',', '.') }}</h6>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 w-100">
      <div class="mb-3">
        <h6>Pengeluaran(-) : Rp.{{ number_format($pengeluaran, '2', ',', '.') }}</h6>
      </div>
    </div>
  </div>

  <style>
    .btn-custom {
      width: 100%; /* Make all buttons the same width */
      padding: 10px; /* Consistent padding */
      border-radius: 5px; /* Consistent border radius */
      text-align: center; /* Center text */
    }
  </style>
  
  <div class="row">
    <div class="col-12 col-md-6 col-lg-4 w-100">
      <div class="mb-1">
        <button type="submit" class="btn btn-secondary btn-custom">Batch Select</button>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 w-100">
      <div class="mb-1">
        <a class="btn btn-warning btn-custom" href="/dashboard">Export to Excel</a>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 w-100">
      <div class="mb-1">
        <a class="btn btn-danger btn-custom" href="/dashboard">Back</a>
      </div>
    </div>
  </div>
  
  
</div>
@endsection