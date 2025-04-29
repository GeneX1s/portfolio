@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit User</h1>
</div>
<div class="row">
  <div class="col-lg-8">
    <form method="post" action="/dashboard/users/{{$user->id}}" class="mb-5" enctype="multipart/form-data">
      <!-- multipart form data harus supaya bisa upload file(img dll) -->
      @method('put')
      @csrf

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="string" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
          required autofocus value="{{$user->username}}">
        @error('username')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="string" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required
          autofocus value="{{$user->email}}">
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
          name="password" required autofocus value="{{$user->password}}">
        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select class="form-control" name="role">
          <option value="finance" selected> Guest</option>
          <option value="ryr"> RYR</option>
          <option value="admin"> Admin</option>
          <option value="super-admin"> Super Admin</option>
        </select>
      </div>


      <button type="submit" class="btn btn-primary">Update</button>
      <a class="btn btn-danger btn-custom" href="/dashboard/users/index">Cancel</a>
    </form>

  </div>
  @endsection
