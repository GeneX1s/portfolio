@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Class</h1>
</div>

@if(session()-> has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-lg-8">
        <form method="post" action="/dashboard/ryr/classes/{{$class->id}}" class="mb-5"
            enctype="multipart/form-data">
            <!-- multipart form data harus supaya bisa upload file(img dll) -->
            @csrf
            @method('put')


            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas"
                    name="nama_kelas" required autofocus value="{{$class->nama_kelas}}">
                @error('nama_kelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe</label>
                <select class="form-control" name="tipe">
                    <option value="Public"> Public</option>
                    <option value="Private"> Private</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="biaya" class="form-label">Biaya</label>
                <input type="number" class="form-control @error('biaya') is-invalid @enderror" id="biaya" name="biaya"
                    required autofocus value="{{$class->biaya}}">
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
            <div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="day[]" id="monday" value="Senin">
            <label class="form-check-label" for="monday">Senin</label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="day[]" id="tuesday" value="Selasa">
            <label class="form-check-label" for="tuesday">Selasa</label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="day[]" id="wednesday" value="Rabu">
            <label class="form-check-label" for="wednesday">Rabu</label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="day[]" id="thursday" value="Kamis">
            <label class="form-check-label" for="thursday">Kamis</label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="day[]" id="friday" value="Jumat">
            <label class="form-check-label" for="friday">Jumat</label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="day[]" id="saturday" value="Sabtu">
            <label class="form-check-label" for="saturday">Sabtu</label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="day[]" id="sunday" value="Minggu">
            <label class="form-check-label" for="sunday">Minggu</label>
            </div>
            </div>
            <small class="text-muted">You can select multiple days.</small>
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
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" autofocus value="{{$class->description}}">
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-1">

                    <button type="submit" class="btn btn-primary">Update Class</button>
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
