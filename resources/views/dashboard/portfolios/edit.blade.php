@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update Portfolio</h1>
</div>
<div class="row">
  <div class="col-lg-8">
    <form method="post" action="/dashboard/portfolios/{{$balance->id}}" class="mb-5" enctype="multipart/form-data">
      <!-- multipart form data harus supaya bisa upload file(img dll) -->
      @method('put')
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
        <label for="category_1" class="form-label">Kategori 1</label>
        <select class="form-control" name="category_1">
          <option value="Resume" selected> Resume</option>
          <option value="Portfolio">Portfolio</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="category_2" class="form-label">Kategori 2</label>
        <select class="form-control" name="category_2">
          <option value="Education"> Education</option>
          <option value="Experience">Experience</option>
        </select>
      </div>

      <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <input type="string" class="form-control @error('content') is-invalid @enderror" id="content" name="content" required
            autofocus value="{{old('content')}}">
          @error('content')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

      <div class="mb-1">
      <button type="submit" class="btn btn-primary">Update Portfolio</button>
        <a class="btn btn-danger btn-custom" href="/dashboard/portfolios">Cancel</a>
      </div>
    </form>

  </div>
  @endsection
