@extends('dashboard.layouts.main')


@section('container')
  
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <a class="h2" href="/dashboard">Report Generator</a>
</div>
  <form action="{{ url('export-transactions') }}" method="GET">
    @csrf
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="mb-3">
          <label for="start_date" class="form-label">Start Date</label>
          <input type="date" class="form-control" id="start_date" name="start_date">
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="mb-3">
          <label for="end_date" class="form-label">End Date</label>
          <input type="date" class="form-control" id="end_date" name="end_date">
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-control" name="status" id="status">
            <option value="Active" {{ old('status')=='Active' ? 'selected' : '' }}>Active</option>
            <option value="Deleted" {{ old('status')=='Deleted' ? 'selected' : '' }}>Deleted</option>
            <option value="Pending" {{ old('status')=='Pending' ? 'selected' : '' }}>Pending</option>
          </select>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <div class="mb-3">
          <label for="jenis" class="form-label">Jenis</label>
          <select class="form-control" name="jenis" id="jenis">
            <option value="" {{ old('jenis')=='' ? 'selected' : '' }}></option>
            <option value="Pendapatan" {{ old('jenis')=='Pendapatan' ? 'selected' : '' }}>Pendapatan</option>
            <option value="Pengeluaran" {{ old('jenis')=='Pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
          </select>
        </div>
      </div>
    </div>

      <div class="col-12 col-md-6 col-lg-4">
        {{-- <a href="/dashboard/transactions/templates" class="btn btn-primary btn-custom mb-3">Export Excel</a> --}}
        <button type="submit" class="btn btn-primary btn-custom">Export Excel</button>
      </div>
  </form>

  @endsection