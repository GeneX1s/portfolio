@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add New Asset</h1>
</div>


@if(session()-> has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{session('error')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

<div class="col-lg-8">
  <form method="post" action="/dashboard/assets" class="mb-5" enctype="multipart/form-data">
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
      <label for="harga_beli" class="form-label">Harga Beli</label>
      <input type="integer" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli" required
        autofocus value="{{old('harga_beli')}}">
      @error('harga_beli')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="jenis" class="form-label">Jenis</label>
      <input type="string" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" required
        autofocus value="{{old('jenis')}}">
      @error('jenis')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    
    
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-control" name="status">
        <option value="Active" selected> Active</option>
        <option value="Sold">Sold</option>
        <option value="Broken">Broken</option>
        <option value="Lent">Lent</option>
        <option value="Missing">Missing</option>
      </select>
    </div>
    
    <div class="mb-3">
      <label for="tanggal_beli" class="form-label">Tanggal Beli</label>
      <input type="date" class="form-control @error('tanggal_beli') is-invalid @enderror" id="tanggal_beli" name="tanggal_beli" required
        autofocus value="{{old('tanggal_beli')}}">
      @error('tanggal_beli')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Add Asset</button>
  </form>

</div>

@endsection