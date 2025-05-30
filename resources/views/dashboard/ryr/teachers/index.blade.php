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
  <a class="h2" href="/dashboard">Teachers</a>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive">
  <form action="{{ route('teachers.index') }}" method="GET">
    @csrf
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="string" class="form-control" id="nama" name="nama">
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-control" name="status" id="status">
            <option value=""></option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <button type="submit" class="btn btn-primary btn-custom mb-3">Search</button>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <a href="/dashboard/ryr/teachers/create" class="btn btn-primary btn-custom mb-3">Add New</a>
      </div>
    </div>
  </form>

  {{-- <form action="{{ route('teachers.import') }}" method="POST" enctype="multipart/form-data">
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

  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama</th>
        <th scope="col">Salary</th>
        <th scope="col">Join Date</th>
        <th scope="col">Birthday</th>
        {{-- <th scope="col">Gender</th> --}}
        <th scope="col">Status</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Foto</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($teachers as $teacher)
      <tr>
        <td>{{$loop->iteration}}</td>

        <td>{{$teacher->nama}}</td>
        <td>Rp.{{ number_format($teacher->salary, '2', ',', '.') }}</td>
        <td>{{$teacher->join_date}}</td>
        <td>{{$teacher->dob}}</td>
        {{-- <td>{{$teacher->jenis_kelamin}}</td> --}}
        <td>{{$teacher->status}}</td>
        <td>{{$teacher->deskripsi}}</td>
        <td>
            @if($teacher->foto)
                <img src="{{ asset('storage/' . $teacher->foto) }}" alt="{{ $teacher->nama_kelas }}" class="img-thumbnail" style="max-width: 100px;">
            @else
                <small>No Image</small>
            @endif
        </td>

        <td>
          <form action="/dashboard/ryr/teachers/{{$teacher->id}}" method="post" class="d-inline">
            @method('delete')
            @csrf

            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
              <i class="fas fa-regular fa-trash"></i>
            </button>
          </form>

          <form action="/dashboard/ryr/teachers/{{ $teacher->id }}/edit" class="d-inline">
            @csrf
            @method('POST')
            <!-- Not strictly necessary with `POST` method -->
            <button class="badge bg-warning border-0" type="submit">
              <i class="fas fa-regular fa-pen-nib"></i>
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
      <a class="btn btn-warning btn-custom" href="{{ url('/export-teachers') }}">Export to Excel</a>
    </div>
  </div> --}}

    <div class="col-12 col-md-6 col-lg-4">
        <a class="btn btn-danger btn-custom" href="/dashboard">Back</a>
    </div>
  </div>

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
