@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New blog</h1>
</div>


@if(session()-> has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-lg-8">
    <form method="post" autocomplete="off" action="/blog/{{ $id }}" class="mb-5" enctype="multipart/form-data">
        <!-- multipart form data harus supaya bisa upload file(img dll) -->
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required
                autofocus value="{{old('title')}}">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="5" required
            autofocus>{{ old('body') }}</textarea>
            @error('body')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
                readonly value="Rian">
            @error('author')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="kategori" class="form-label">Gender</label>
            <select class="form-control" name="kategori">
                <option value="Artikel">Artikel</option>
                <option value="Event">Event</option>
                <option value="Special Class">Special Class</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto<small class="text-muted">(370 x 207 px)</small></label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto"
                onchange="previewImage()">
            @error('foto')
            <div class="invalid-feedback">
                {{ $message }}
                @enderror
            </div>

            <div class="mb-1">

                <button type="submit" class="btn btn-primary">Add Article</button>
                <a class="btn btn-danger btn-custom" href="/ryr/blog">Cancel</a>
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
