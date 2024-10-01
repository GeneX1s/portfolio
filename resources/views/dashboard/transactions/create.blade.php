@extends('dashboard.layouts.main')
<head>
<style>
  .sub-kategori-container {
      display: none;
  }
</style>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      const kategoriSelect = document.querySelector('select[name="kategori"]');
      const subKategoriPendapatan = document.querySelector('.sub-kategori-pendapatan');
      const subKategoriPengeluaran = document.querySelector('.sub-kategori-pengeluaran');

      function updateSubKategoriVisibility() {
          const value = kategoriSelect.value;
          if (value === 'Pengeluaran') {
              subKategoriPengeluaran.style.display = 'block';
              subKategoriPendapatan.style.display = 'none';
          } else if (value === 'Pendapatan') {
              subKategoriPengeluaran.style.display = 'none';
              subKategoriPendapatan.style.display = 'block';
          } else {
              subKategoriPengeluaran.style.display = 'none';
              subKategoriPendapatan.style.display = 'none';
          }
      }

      kategoriSelect.addEventListener('change', updateSubKategoriVisibility);

      // Initialize visibility based on the current selection
      updateSubKategoriVisibility();
  });
</script>
</head>

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add New Transaction</h1>
</div>

@if(session()-> has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{session('error')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    
<div class="row">
  <div class="col-lg-8">
    <form method="post" action="/dashboard/transactions" class="mb-5" enctype="multipart/form-data">
      <!-- multipart form data harus supaya bisa upload file(img dll) -->
      @csrf

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
        <label for="kategori" class="form-label">Kategori</label>
        <select class="form-control" name="kategori">
            <option value="Pendapatan" selected>Pendapatan</option>
            <option value="Pengeluaran">Pengeluaran</option>
            <option value="Investment">Investment</option>
        </select>
    </div>

    <!-- Sub Kategori for Pengeluaran -->
    <div class="sub-kategori-pengeluaran sub-kategori-container">
        <div class="mb-3">
            <label for="sub_kategori" class="form-label">Sub Kategori</label>
            <select class="form-control" name="sub_kategori">
                <option value="Lainnya" selected>Lainnya</option>
                <option value="Bensin">Bensin</option>
                <option value="Fixed">Fixed</option>
                <option value="Internet">Internet</option>
                <option value="Lifestyle">Lifestyle</option>
                <option value="Topup">Topup</option>
            </select>
        </div>
    </div>

    <!-- Sub Kategori for Pendapatan -->
    <div class="sub-kategori-pendapatan sub-kategori-container">
        <div class="mb-3">
            <label for="sub_kategori" class="form-label">Sub Kategori</label>
            <select class="form-control" name="sub_kategori">
                <option value="Gaji" selected>Gaji</option>
                <option value="Obligasi">Obligasi</option>
                <option value="Bunga/Cashback">Bunga/Cashback</option>
                <option value="Angpao">Angpao</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
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
      
      <div class="mb-3">
        <label for="balance" class="form-label">Balance</label>
        <select class="form-control" name="balance">
          {{-- <option value="Cash" selected> Cash</option> --}}
          @foreach ($balances as $balance)
          <option value="{{$balance->nama}}"> {{$balance->nama}}</option>
          @endforeach
          <option value="Misc">Misc</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Add Transaction</button>
    </form>

  </div>
  <div class="col-lg-8">

    <form method="post" action="/dashboard/transactions/template" class="mb-5" enctype="multipart/form-data">
      <!-- multipart form data harus supaya bisa upload file(img dll) -->
      @csrf
      @method('POST')
      <!-- Not strictly necessary with `POST` method -->
      <div class="mb-3">
        <label for="template" class="form-label">Use Template</label>
        <select class="form-control" name="template">
          @foreach ($templates as $template)
          <option value="{{$template->id}}" selected> {{$template->name}}</option>
          @endforeach
        </select>
      </div>


      <div class="row">
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary btn-custom">Use Template</button>
    </form>
  </div>
  <div class="col-md-2">
    <a class="btn btn-danger btn-custom" href="/dashboard/transactions/index">Back</a>
  </div>

</div>
</div>
</div>

@endsection