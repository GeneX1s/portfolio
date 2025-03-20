@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Transfer Balance</h1>
</div>


@if(session()-> has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{session('error')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

<div class="col-lg-8">
  <form method="post" action="/dashboard/balances/transfer" class="mb-5" enctype="multipart/form-data" autocomplete="off">
    <!-- multipart form data harus supaya bisa upload file(img dll) -->
    @csrf

    <div class="mb-3">
      <label for="source" class="form-label">Source balance</label>
      <select class="form-control" name="source">
        @foreach ($balances as $balance)
          <option value="{{$balance->nama}}"> {{$balance->nama}}</option>
          @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="destination" class="form-label">Destination balance</label>
      <select class="form-control" name="destination">
        @foreach ($balances as $balance)
          <option value="{{$balance->nama}}"> {{$balance->nama}}</option>
          @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="nominal" class="form-label">Saldo</label>
      <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal" required
        autofocus value="{{old('nominal')}}">
      @error('nominal')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>



      <div class="mb-1">

    <button type="submit" class="btn btn-primary">Submit</button>


      <a class="btn btn-danger btn-custom" href="/dashboard/balances">Cancel</a>
    </div>
  </form>

</div>

@endsection
