@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New Teacher</h1>
</div>


@if(session()-> has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-lg-8">
    <form method="post" autocomplete="off" action="/dashboard/ryr/teachers" class="mb-5" enctype="multipart/form-data">
        <!-- multipart form data harus supaya bisa upload file(img dll) -->
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Teacher</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required
                autofocus value="{{old('nama')}}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Gaji</label>
            <input type="number" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary"
                required autofocus value="{{old('salary')}}">
            @error('salary')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Gender</label>
            <select class="form-control" name="jenis_kelamin">
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="join_date" class="form-label">Join Date</label>
            <input type="date" class="form-control @error('join_date') is-invalid @enderror" id="join_date"
                name="join_date" readonly autofocus value="{{today()}}">
            @error('join_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Tanggal Lahir(optional)</label>
            <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" autofocus
                value="{{today()}}">
            @error('dob')
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
                <label for="instagram" class="form-label">Instagram <small class="text-muted">(optional)</small></label>
                <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram"
                    name="instagram" autofocus value="{{old('instagram')}}">
                @error('instagram')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Biografi/Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                    rows="5" maxlength="500" required autofocus>{{ old('deskripsi') }}</textarea>
                <small class="text-muted">Maximum 500 characters.</small>
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-1">

                <button type="submit" class="btn btn-primary">Add Teacher</button>
                <a class="btn btn-danger btn-custom" href="/dashboard/ryr/teachers">Cancel</a>
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
