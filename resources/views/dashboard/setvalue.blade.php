@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Set Values Here</h1>
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

@php

if($setvalue == null){
    $setvalue = (object) [
        'salary' => 0,
        'outcome' => 0
    ];
}
@endphp

<div class="col-lg-8">
  <form method="post" action="/dashboard/transactions/setvalue" class="mb-5" enctype="multipart/form-data">
    <!-- multipart form data harus supaya bisa upload file(img dll) -->
    @csrf

    <div class="mb-3">
      <label for="salary" class="form-label">Income</label>
      <input type="number" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" required
        autofocus value={{ $setvalue->salary }}>
      @error('salary')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="outcome" class="form-label">Investment Target</label>
      <input type="number" class="form-control @error('outcome') is-invalid @enderror" id="outcome" name="outcome"
        required autofocus value="{{ $setvalue->outcome }}">
      @error('outcome')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>


    <div class="mb-1">
      <button type="submit" class="btn btn-primary">Update Value</button>
  </form>

  <a class="btn btn-danger btn-custom" href="/dashboard">Cancel</a>
</div>
</div>


@endsection
