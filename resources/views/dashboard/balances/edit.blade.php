@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update Balance</h1>
</div>
<div class="row">
  <div class="col-lg-8">
    <form method="post" action="/dashboard/balances/{{$balance->id}}" class="mb-5" enctype="multipart/form-data">
      <!-- multipart form data harus supaya bisa upload file(img dll) -->
      @method('put')
      @csrf

  
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
      
      <button type="submit" class="btn btn-primary">Update Balance</button>
    </form>

  </div>
  @endsection