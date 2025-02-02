@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New Class</h1>
</div>


@if(session()-> has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-lg-8">
    <form method="post" autocomplete="off" action="/dashboard/balances" class="mb-5" enctype="multipart/form-data">
        <!-- multipart form data harus supaya bisa upload file(img dll) -->
        @csrf

        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="string" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas"
                name="nama_kelas" required autofocus value="{{old('nama_kelas')}}">
            @error('nama_kelas')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="biaya" class="form-label">Biaya</label>
            <input type="integer" class="form-control @error('biaya') is-invalid @enderror" id="biaya" name="biaya"
                required autofocus value="{{old('biaya')}}">
            @error('biaya')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="teacher" class="form-label">Teacher</label>
            <select class="form-control" name="teacher">
                @foreach ($teachers as $teacher)
                <option value="{{$teacher->nama}}"> {{$teacher->nama}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="schedule" class="form-label">Schedule</label>
            <input type="string" class="form-control @error('schedule') is-invalid @enderror" id="schedule"
                name="schedule" required autofocus value="{{old('schedule')}}">
            @error('schedule')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="string" class="form-control @error('description') is-invalid @enderror" id="description"
                name="description" required autofocus value="{{old('description')}}">
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-1">

            <button type="submit" class="btn btn-primary">Add Class</button>
            <a class="btn btn-danger btn-custom" href="/dashboard/ryr/classes">Cancel</a>
        </div>
    </form>

</div>

@endsection
