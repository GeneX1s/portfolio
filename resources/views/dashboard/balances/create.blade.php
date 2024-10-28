@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add New Balance</h1>
</div>


@if(session()-> has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{session('error')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

<div class="col-lg-8">
  <form method="post" action="/dashboard/balances" class="mb-5" enctype="multipart/form-data">
    <!-- multipart form data harus supaya bisa upload file(img dll) -->
    @csrf

    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="string" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
        required autofocus value="{{old('nama')}}">
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="saldo" class="form-label">Saldo</label>
      <input type="integer" class="form-control @error('saldo') is-invalid @enderror" id="saldo" name="saldo" required
        autofocus value="{{old('saldo')}}">
      @error('saldo')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    

    <div class="mb-3">
      <label for="tipe" class="form-label">Tipe</label>
      <select class="form-control" name="tipe">
        <option value="E-Wallet" selected> E-Wallet</option>
        <option value="Bank">Bank</option>
        <option value="Investment">Investment</option>
        <option value="Cash">Cash</option>
      </select>
    </div>


    <button type="submit" class="btn btn-primary">Add Balance</button>
  </form>

</div>

@endsection