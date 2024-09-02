@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update User</h1>
</div>
<div class="col-lg-8">
  <form method="post" action="/dashboard/users/update" class="mb-5" enctype="multipart/form-data">
    <!-- multipart form data harus supaya bisa upload file(img dll) -->
    @csrf

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="string" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
        required autofocus value="{{old('email')}}">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
        required autofocus value="{{old('password')}}">
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>


    <button type="submit" class="btn btn-primary">Update User</button>
  </form>

</div>


@endsection