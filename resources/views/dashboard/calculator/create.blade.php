@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add New Transaction</h1>
</div>
<div class="col-lg-8">
  <form method="post" action="/dashboard/transactions" class="mb-5" enctype="multipart/form-data">
    <!-- multipart form data harus supaya bisa upload file(img dll) -->
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required
        autofocus value="{{old('nama')}}">
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="nominal" class="form-label">Nominal</label>
      <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal"
        required autofocus value="{{old('nominal')}}">
      @error('nominal')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="tipe" class="form-label">Tipe</label>
      <select class="form-control" name="tipe">
        <option value="Pengeluaran" selected> Pengeluaran</option>
        <option value="Pendapatan"> Pendapatan</option>
      </select>
    </div>



    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
        autofocus value="{{old('deskripsi')}}">
      @error('deskripsi')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>


    <button type="submit" class="btn btn-primary">Add Transaction</button>
  </form>

</div>


@endsection