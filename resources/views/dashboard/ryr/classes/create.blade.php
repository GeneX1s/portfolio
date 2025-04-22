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
    <form method="post" autocomplete="off" action="/dashboard/ryr/classes" class="mb-5" enctype="multipart/form-data">
        <!-- multipart form data harus supaya bisa upload file(img dll) -->
        @csrf

        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas"
                name="nama_kelas" required autofocus value="{{old('nama_kelas')}}">
            @error('nama_kelas')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <select class="form-control" name="tipe">
                <option value="public"> Public</option>
                <option value="private"> Private</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="biaya" class="form-label">Biaya</label>
            <input type="number" class="form-control @error('biaya') is-invalid @enderror" id="biaya" name="biaya"
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
            <label for="day" class="form-label">Day</label>
            <select class="form-control" name="day">
                <option value="Senin"> Senin</option>
                <option value="Selasa"> Selasa</option>
                <option value="Rabu"> Rabu</option>
                <option value="Kamis"> Kamis</option>
                <option value="Jumat"> Jumat</option>
                <option value="Sabtu"> Sabtu</option>
                <option value="Minggu"> Minggu</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="schedule" class="form-label">Schedule Jam</label>
            <select class="form-control" name="schedule">
                <option value="7AM"> 7.00-8.30</option>
                <option value="8AM"> 8.00-9.30</option>
                <option value="3PM"> 15.00-16.30</option>
                <option value="5PM"> 17.00-18.30</option>
                <option value="6PM"> 18.30-20.00</option>
            </select>
        </div>

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
            <label for="foto" class="form-label">Foto Kelas <small class="text-muted">(370 x 207 px)</small></label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto"
              onchange="previewImage()">
            @error('foto')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description <small class="text-muted">(optional)</small></label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                name="description"  autofocus value="Ini adalah kelas...">
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

<script>
    function previewImage() {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };
    }
</script>
@endsection
