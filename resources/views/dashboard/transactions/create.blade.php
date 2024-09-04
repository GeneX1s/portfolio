@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add New Transaction</h1>
</div>
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
          <option value="Pendapatan" selected> Pendapatan</option>
          <option value="Pengeluaran"> Pengeluaran</option>
          <option value="Investment"> Investment</option>
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