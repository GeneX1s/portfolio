@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">New Yoga Class Session</h1>
</div>


@if(session()-> has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('error')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-lg-8">

    <h3>Regular/Wallrope Class</h3>
  <form method="post" autocomplete="off" action="/dashboard/ryr/schedules" class="mb-5" enctype="multipart/form-data">
    <!-- multipart form data harus supaya bisa upload file(img dll) -->
    @csrf

    <div class="mb-3">
      <label for="class_id" class="form-label">Pilih Kelas:</label>
      <select class="form-control" name="class_id">
        @foreach ($classes as $class)
        <option value="{{ $class->id }}"> {{ $class->nama_kelas }}</option>
        @endforeach
      </select>
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

    {{-- <div class="mb-3">
        <label for="jam" class="form-label">Schedule Jam</label>
        <select class="form-control" name="jam">
            <option value="7AM"> 7.00-8.30</option>
            <option value="8AM"> 8.00-9.30</option>
            <option value="3PM"> 15.00-16.30</option>
            <option value="5PM"> 17.00-18.30</option>
            <option value="6PM"> 18.30-20.00</option>
        </select>
    </div> --}}

    {{-- <div class="mb-3">
        <label for="jam" class="form-label">Jam</label>
        <input type="time" class="form-control @error('jam') is-invalid @enderror" id="jam" name="jam" autofocus
            value="{{today()}}">
        @error('jam')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div> --}}

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi <small class="text-muted">(optional)</small></label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description"
            name="description" rows="3" autofocus>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur corrupti quae repellendus, et nihil ducimus eius molestiae minima enim ipsum ratione</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-1">

      <button type="submit" class="btn btn-primary">Create Session</button>
    </div>
  </form>

<hr>

  <h3>Special/Private Class</h3>
  <form method="post" autocomplete="off" action="/dashboard/ryr/schedules" class="mb-5" enctype="multipart/form-data">
    <!-- multipart form data harus supaya bisa upload file(img dll) -->
    @csrf



    <div class="mb-3">
        <label for="class_name" class="form-label">Nama Kelas</label>
        <input type="text" class="form-control @error('class_name') is-invalid @enderror" id="class_name"
            name="class_name" autofocus value="{{old('class_name')}}">
        @error('class_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="teacher_name" class="form-label">Nama Guru</label>
        <input type="text" class="form-control @error('teacher_name') is-invalid @enderror" id="teacher_name"
            name="teacher_name" autofocus value="{{old('teacher_name')}}">
        @error('teacher_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
            name="harga" autofocus value="{{old('harga')}}">
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

    {{-- <div class="mb-3">
        <label for="jam" class="form-label">Schedule Jam</label>
        <select class="form-control" name="jam">
            <option value="7AM"> 7.00-8.30</option>
            <option value="8AM"> 8.00-9.30</option>
            <option value="3PM"> 15.00-16.30</option>
            <option value="5PM"> 17.00-18.30</option>
            <option value="6PM"> 18.30-20.00</option>
        </select>
    </div> --}}

    <div class="mb-3">
        <label for="start_time" class="form-label">Start Time</label>
        <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" required value="{{ old('start_time') }}">
        @error('start_time')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="end_time" class="form-label">End Time</label>
        <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" required value="{{ old('end_time') }}">
        @error('end_time')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi <small class="text-muted">(optional)</small></label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description"
            name="description" rows="3" autofocus>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur corrupti quae repellendus, et nihil ducimus eius molestiae minima enim ipsum ratione</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-1">

      <button type="submit" class="btn btn-primary">Create Session</button>
      <a class="btn btn-danger btn-custom" href="/dashboard/ryr/schedules">Cancel</a>
    </div>
  </form>
</div>

@endsection
