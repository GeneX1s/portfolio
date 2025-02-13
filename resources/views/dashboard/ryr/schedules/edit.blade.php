@extends('dashboard.layouts.main')

@section('container')

<h1 class="h2">Edit Schedule</h1>

<div class="col-lg-8">
    <form method="post" action="/dashboard/ryr/schedules/{{ $schedule->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf



        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas"
                name="nama_kelas" autofocus value="{{old('nama_kelas')}}">
            @error('nama_kelas')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

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
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"
                autofocus value="{{today()}}">
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

            <button type="submit" class="btn btn-primary">Create Session</button>
            <a class="btn btn-danger btn-custom" href="/dashboard/ryr/schedules">Cancel</a>
        </div>

    </form>
</div>

@endsection
