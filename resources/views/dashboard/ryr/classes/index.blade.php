@extends('dashboard.layouts.main')

@section('container')
<style>
    .btn-custom {
        width: 70%;
        /* Make all buttons the same width */
        padding: 8px;
        /* Consistent padding */
        border-radius: 5px;
        /* Consistent border radius */
        text-align: center;
        /* Center text */
    }

    table {
        width: 100%;
        /* Ensure the table takes full width */
    }

    th,
    td {
        text-align: left;
        /* Align text to the left */
    }

    .content {
        display: flex;
        flex-direction: column;
        /* Stack items vertically on mobile */
        align-items: center;
        /* Center items horizontally */
        justify-content: flex-start;
        /* Align items to the top */
        height: auto;
        /* Allow height to adjust */
        padding: 20px;
        /* Add some padding */
    }

    @media (min-width: 768px) {
        .content {
            flex-direction: row;
            /* Stack items side by side on larger screens */
            align-items: flex-start;
            /* Align items to the start */
            justify-content: space-between;
            /* Space out items */
            padding: 40px;
            /* More padding on larger screens */
        }
    }

    .row {
        margin-top: 1%;
    }

    .mb-3 {
        margin-bottom: 1rem;
        /* Adjust as needed */
    }
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
    <a class="h2" href="/dashboard">Jadwal Kelas</a>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive">
    {{-- <a href="/dashboard/ryr/posts/create" class="btn btn-primary mb-3">Insert New Product</a> --}}<form
        action="{{ route('classes.index') }}" method="GET">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="string" class="form-control" id="nama_kelas" name="nama_kelas">
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="teacher" class="form-label">Teacher</label>
                    <select class="form-control" name="teacher" id="teacher">
                        <option value=""></option>
                        @foreach ($teachers as $teacher)
                        <option value="{{$teacher->nama}}"> {{$teacher->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe</label>
                    <select class="form-control" name="tipe" id="tipe">
                        <option value=""></option>
                        <option value="Public"> Public</option>
                        <option value="Private"> Private</option>

                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <button type="submit" class="btn btn-primary btn-custom mb-3">Search</button>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="/dashboard/ryr/classes/create" class="btn btn-primary btn-custom mb-3">Add New</a>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Teacher</th>
                    <th scope="col">Schedule</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Biaya</th>
                    <th scope="col">Description</th>
                    <th scope="col">Preview</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                <tr>
                    <td>{{$loop->iteration}}</td>

                    <td>{{$class->nama_kelas}}</td>
                    <td>{{$class->tipe}}</td>
                    <td>{{$class->teacher}}</td>
                    <td>{{$class->schedule}}</td>
                    <td>{{$class->day}}</td>
                    <td>Rp.{{ number_format($class->biaya, '2', ',', '.') }}</td>
                    <td>{{$class->description}}</td>
                    <td>
                        @if($class->foto)
                        <img src="{{ asset('storage/' . $class->foto) }}" alt="{{ $class->nama_kelas }}"
                            class="img-thumbnail" style="max-width: 100px;">
                        @else
                        <small>No Image</small>
                        @endif
                    </td>

                    <td>
                        <form action="/dashboard/ryr/classes/{{$class->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf

                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-regular fa-trash"></i>
                            </button>
                        </form>

                        <form action="/dashboard/ryr/classes/{{ $class->id }}/edit" class="d-inline">
                            @csrf
                            @method('POST')
                            <!-- Not strictly necessary with `POST` method -->
                            <button class="badge bg-warning border-0" type="submit">
                                <i class="fas fa-regular fa-pen-nib"></i>
                            </button>
                        </form>

                        <form action="/dashboard/ryr/participants/{{ $class->id }}/index" class="d-inline">
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
    </div>
        <div class="row">
            {{-- <div class="col-12 col-md-6 col-lg-4">
                <div class="mb-1">
                    <a class="btn btn-warning btn-custom" href="{{ url('/export-classes') }}">Export to Excel</a>
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
