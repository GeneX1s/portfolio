@extends('dashboard.layouts.main')

@section('container')
<style>
   .btn-custom {
    width: 70%; /* Make all buttons the same width */
    padding: 8px; /* Consistent padding */
    border-radius: 5px; /* Consistent border radius */
    text-align: center; /* Center text */
  }
  table {
    width: 100%; /* Ensure the table takes full width */
  }
    th, td {
    text-align: left; /* Align text to the left */
  }
  .content {
    display: flex;
    flex-direction: column; /* Stack items vertically on mobile */
    align-items: center; /* Center items horizontally */
    justify-content: flex-start; /* Align items to the top */
    height: auto; /* Allow height to adjust */
    padding: 20px; /* Add some padding */
        }

        @media (min-width: 768px) {
    .content {
      flex-direction: row; /* Stack items side by side on larger screens */
      align-items: flex-start; /* Align items to the start */
      justify-content: space-between; /* Space out items */
      padding: 40px; /* More padding on larger screens */
    }
  }
.row {
    margin-top: 1%;

  }

  .mb-3 {
    margin-bottom: 1rem; /* Adjust as needed */
  }



</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
  <a class="h2" href="/dashboard">Members</a>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive">
  {{-- <a href="/dashboard/ryr/posts/create" class="btn btn-primary mb-3">Insert New Product</a> --}}<form
    action="{{ route('members.index') }}" method="GET">
    @csrf
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Murid</label>
          <input type="string" class="form-control" id="nama" name="nama">
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <div class="mb-3">
          <label for="tipe" class="form-label">Tipe</label>
          <select class="form-control" name="tipe" id="tipe">
            <option value=""></option>
            <option value="Non-Member">Non-Member</option>
            <option value="Bulanan 1">Bulanan 1</option>
            <option value="Bulanan Special">Bulanan Special</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <button type="submit" class="btn btn-primary btn-custom mb-3">Search</button>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <a href="/dashboard/ryr/members/create" class="btn btn-primary btn-custom mb-3">Add New</a>
      </div>
    </div>
  </form>

  {{-- <form action="{{ route('members.import') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="col-12 col-md-6 col-lg-4">

      <div class="mb-3">

        <label class="form-label" for="customFile">Import Data</label>
        <input type="file" class="form-control" id="customFile" name="file" />

      </div>

    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="mb-3">

      <button type ="submit" class="btn btn-success btn-custom mb-3">(+)Import from Excel/CSV</a>

      </div>
    </div>

</form> --}}

  <table class="table table-striped table-sm">
    <thead class="thead">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama Murid</th>
        <th scope="col">Tipe</th>
        <th scope="col">Join Date</th>
        <th scope="col">Total Attendance</th>
        <th scope="col">Tanggal Lahir</th>
        {{-- <th scope="col">Gender</th> --}}
        <th scope="col">Deskripsi</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($members as $member)
      <tr>
        <td>{{$loop->iteration}}</td>

        <td>{{$member->nama_murid}}</td>
        <td>{{$member->tipe}}</td>
        <td>{{$member->join_date}}</td>
        <td>{{$member->total_attendance}}</td>
        <td>{{$member->dob}}</td>
        {{-- <td>{{$member->jenis_kelamin}}</td> --}}
        <td>{{$member->deskripsi}}</td>
        <td>
          <form action="/dashboard/ryr/members/{{$member->id}}" method="post" class="d-inline">
            @method('delete')
            @csrf

            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
              <i class="fas fa-regular fa-trash"></i>
            </button>
          </form>

          <form action="/dashboard/ryr/members/{{ $member->id }}/edit" class="d-inline">
            @csrf
            @method('POST')
            <!-- Not strictly necessary with `POST` method -->
            <button class="badge bg-warning border-0" type="submit">
              <i class="fas fa-regular fa-pen-nib"></i>
            </button>
          </form>

          <form action="/dashboard/ryr/members/{{ $member->id }}/history" class="d-inline">
            @csrf
            @method('POST')
            <!-- Not strictly necessary with `POST` method -->
            <button class="badge bg-primary border-0" type="submit">
              <i class="fas fa-regular fa-list"></i>
            </button>
          </form>

        </td>

      </tr>
      @endforeach

    </tbody>
  </table>

  <div class="row">
  {{-- <div class="col-12 col-md-6 col-lg-4">
    <div class="mb-1">
      <a class="btn btn-warning btn-custom" href="{{ url('/export-members') }}">Export to Excel</a>
    </div>
  </div> --}}

    <div class="col-12 col-md-6 col-lg-4">
        <a class="btn btn-danger btn-custom" href="/dashboard">Back</a>
    </div>
  </div>

</div>

@endsection
