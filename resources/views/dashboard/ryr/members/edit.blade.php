@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Balance</h1>
</div>
<div class="row">
    <div class="col-lg-8">
        <form method="post" action="/dashboard/ryr/members/{{$member->id}}" class="mb-5" enctype="multipart/form-data">
            <!-- multipart form data harus supaya bisa upload file(img dll) -->
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="nama_murid" class="form-label">Nama Murid</label>
                <input type="text" class="form-control @error('nama_murid') is-invalid @enderror" id="nama_murid"
                    name="nama_murid" required autofocus value="{{$member->nama_murid}}">
                @error('nama_murid')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe</label>
                <select class="form-control" name="tipe">
                    <option value="Non-Member">Non-Member</option>
                    <option value="Bulanan 1">Bulanan 1(800k)</option>
                    <option value="Bulanan Special">Bulanan Special(400k)</option>
                </select>
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
                <label for="deskripsi" class="form-label">Deskripsi(optional)</label>
                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                    name="deskripsi" autofocus value="{{$member->deskripsi}}">
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-1">

                <button type="submit" class="btn btn-primary">Update Member</button>
                <a class="btn btn-danger btn-custom" href="/dashboard/ryr/members">Cancel</a>
            </div>

        </form>

    </div>
    @endsection
