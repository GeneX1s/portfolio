@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update Class</h1>
</div>
<div class="row">
  <div class="col-lg-8">
    <form method="post" action="/dashboard/ryr/classes/{{$class->id}}" class="mb-5" enctype="multipart/form-data">
      <!-- multipart form data harus supaya bisa upload file(img dll) -->
      @method('put')
      @csrf


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
        <label for="schedule" class="form-label">Schedule</label>
        <input type="text" class="form-control @error('schedule') is-invalid @enderror" id="schedule"
            name="schedule" required autofocus value="{{$class->schedule}}">
        @error('schedule')
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
            name="description"  autofocus value="{{$class->description}}">
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
