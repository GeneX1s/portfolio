<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Roemah Yoga Rian</title>
    <meta name="description"
        content="Official website for Roemah Yoga Rian, which is a yoga studio situated in Central jakarta | Jakarta Pusat. Has Hatha, Power, and Ashtanga Yoga classes.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <link rel="stylesheet" href="/../../portfolio2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/../../portfolio2/css/font-awesome.min.css">
    <link rel="stylesheet" href="/../../portfolio2/css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="/../../portfolio2/css/slick.css">
    <link rel="stylesheet" href="/../../portfolio2/style.css">
    <link rel="stylesheet" href="/../../portfolio2/css/responsive.css">




    <script src="/../../portfolio2/js/vendor/modernizr-3.11.2.min.js" defer></script>


</head>

<body style="margin-left: 50px;">


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add New Photo</h1>
</div>


@if(session()-> has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('error')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-lg-8">
  <form method="post" autocomplete="off" action="/gallery" class="mb-5" enctype="multipart/form-data">
    <!-- multipart form data harus supaya bisa upload file(img dll) -->
    @csrf

    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required
        autofocus value="{{old('nama')}}">
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="tipe" class="form-label">Kategori</label>
      <select class="form-control" name="tipe">
        <option value="Kelas" selected> Kelas</option>
        <option value="Event">Event</option>
        <option value="Flyer">Flyer</option>
        <option value="Schedule">Schedule</option>
      </select>
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
            <label for="deskripsi" class="form-label">Deskripsi <small class="text-muted">(optional)</small></label>
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                name="deskripsi" autofocus value="{{old('deskripsi')}}">
            @error('deskripsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

    <div class="mb-1">

      <button type="submit" class="btn btn-primary">Post Gallery</button>
      <a class="btn btn-danger btn-custom" href="/ryr/gallery">Cancel</a>
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

<script src="portfolio2/js/vendor/jquery-3.6.0.min.js" defer></script>
    <script src="portfolio2/js/vendor/jquery-migrate-3.3.2.min.js" defer></script>
    <script src="portfolio2/js/bootstrap.bundle.min.js" defer></script>
    <script src="portfolio2/js/owl.carousel.min.js" defer></script>
    <script src="portfolio2/js/jquery.meanmenu.js" defer></script>
    <script src="portfolio2/js/ajax-mail.js" defer></script>
    <script src="portfolio2/js/jquery.ajaxchimp.min.js" defer></script>
    <script src="portfolio2/js/slick.min.js" defer></script>
    <script src="portfolio2/js/imagesloaded.pkgd.min.js" defer></script>
    <script src="portfolio2/js/isotope.pkgd.min.js" defer></script>
    <script src="portfolio2/js/jquery.magnific-popup.js" defer></script>
    <script src="portfolio2/js/plugins.js" defer></script>
    <script src="portfolio2/js/main.js" defer></script>

</body>
