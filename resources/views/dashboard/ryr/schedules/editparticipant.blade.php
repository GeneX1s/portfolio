@extends('dashboard.layouts.main')

@section('container')

<h1 class="h2">Edit Schedule Participant</h1>

<div class="col-lg-8">
    <form method="post" action="/dashboard/ryr/schedules/{{ $participant->id }}/updateParticipant" class="mb-5"
        enctype="multipart/form-data">
        @method('put')
        @csrf



        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Murid</label>
            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas"
                name="nama_kelas" readonly value="{{ $participant->nama_member }}">
            @error('nama_kelas')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="payment_type" class="form-label">Tipe Pembayaran:</label>
            <select class="form-control" name="payment_type">
                <option value="Cash"> Cash</option>
                <option value="Transfer"> Transfer</option>
                <option value="Bulanan"> Bulanan</option>
                <option value="Qris"> Qris</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="payment_status" class="form-label">Status Pembayaran:</label>
            <select class="form-control" name="payment_status">
                <option value="Done"> Done</option>
                <option value="Pending"> Pending</option>
            </select>
        </div>

        <div class="mb-1">

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/dashboard/ryr/schedules/{{ $schedule->id }}/detail" class="btn btn-danger ml-3">Cancel</a>
        </div>

    </form>
</div>

@endsection
