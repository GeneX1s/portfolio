@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit {{ $schedule->class_name }}</h1>
</div>


@if(session()-> has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('error')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-lg-8">

  <form method="post" autocomplete="off" action="/dashboard/ryr/schedules/{{ $schedule->id }}/update" class="mb-5" enctype="multipart/form-data">
    <!-- multipart form data harus supaya bisa upload file(img dll) -->
    @method('put')
    @csrf



    <div class="mb-3">
        <label for="class_name" class="form-label">Nama Kelas</label>
        <input type="text" class="form-control @error('class_name') is-invalid @enderror" id="class_name"
            name="class_name" autofocus value="{{$schedule->class_name}}">
        @error('class_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="teacher_name" class="form-label">Nama Guru</label>
        <input type="text" class="form-control @error('teacher_name') is-invalid @enderror" id="teacher_name"
            name="teacher_name" autofocus value="{{$schedule->teacher_name}}">
        @error('teacher_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
            name="harga" autofocus value="{{$schedule->harga}}">
        @error('harga')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" autofocus
            value="{{today()}}">
        @error('tanggal')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi(optional)</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
            name="description" autofocus value="{{old('description')}}">
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-1">

      <button type="submit" class="btn btn-primary">Update Session</button>
      <a class="btn btn-danger btn-custom" href="/dashboard/ryr/schedules">Cancel</a>
    </div>
  </form>
</div>

@endsection
