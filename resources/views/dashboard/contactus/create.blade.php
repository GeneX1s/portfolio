@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add New Message (For Testing)</h1>
</div>


@if(session()-> has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('error')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-lg-8">
  <form method="post" autocomplete="off" action="/dashboard/features" class="mb-5" enctype="multipart/form-data">
    <!-- multipart form data harus supaya bisa upload file(img dll) -->
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="string" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
        autofocus value="{{old('name')}}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Deskripsi</label>
      <input type="integer" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required
        autofocus value="{{old('description')}}">
      @error('description')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>


    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-control" name="status">
        <option value="Ongoing" selected> Ongoing</option>
        <option value="Pending">Pending</option>
      </select>
    </div>

    <div class="mb-1">

      <button type="submit" class="btn btn-primary">Add Message (For Testing)</button>
      <a class="btn btn-danger btn-custom" href="/dashboard/features">Cancel</a>
    </div>
  </form>

</div>

@endsection
