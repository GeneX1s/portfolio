@extends('dashboard.layouts.main')

@section('container')
<style>
  /* Add custom styles */
.form-control {
    padding: 1rem; /* Adjust as needed */
  }
  .content {
            width: 100%; /* Default for small screens */
        }

        @media (min-width: 768px) { /* Medium screens and up */
            .content {
                width: 40%; /* 40% width on medium and larger screens */
            }
          }
.row {
    margin-top: 1%;
  }
  
  .mb-3 {
    padding-left:8%;
    margin-bottom: 1rem; /* Adjust as needed */
  }
  
  
  .fixed-width {
    width: 100px; /* Set a fixed width */
    margin-left:5%;
    margin-bottom: 1rem; /* Adjust as needed */
  }

</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
  <a class="h2" href="/dashboard">Assets</a>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive">
  {{-- <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Insert New Product</a> --}}<form
    action="{{ route('assets.index') }}" method="GET">
    @csrf
    <div class="row">
      <div class="col-mb-3">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="string" class="form-control" id="nama" name="nama">
        </div>
      </div>

      <div class="col-mb-3">
        <div class="mb-3">
          <label for="tipe" class="form-label">Tipe</label>
          <select class="form-control" n  ame="tipe" id="tipe">
            <option value="super-admin" {{ old('tipe')=='Super Admin' ? 'selected' : '' }}>Super Admin</option>
            <option value="admin" {{ old('tipe')=='Admin' ? 'selected' : '' }}>Admin</option>
            <option value="guest" {{ old('tipe')=='Guest' ? 'selected' : '' }}>Guest</option>
          </select>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-md-2 sm-3">
        <button type="submit" class="btn btn-primary fixed-width">Search</button>
      </div>
      <div class="col-md-2 sm-3">
        <a href="/dashboard/assets/create" class="btn btn-primary fixed-width">Add New</a>
      </div>
    </div>
  </form>


  <table class="table table-striped table-sm">
    <thead class="thead">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama</th>
        <th scope="col">Harga Beli</th>
        <th scope="col">Tanggal Beli</th>
        <th scope="col">Jenis</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($assets as $asset)
      <tr>
        <td>{{$loop->iteration}}</td>

        <td>{{$asset->nama}}</td>
        <td>Rp.{{ number_format($asset->harga_beli, '2', ',', '.') }}</td>
        <td>{{$asset->tanggal_beli}}</td>
        <td>{{$asset->jenis}}</td>
        <td>{{$asset->status}}</td>
        
        <td>
          <form action="/dashboard/assets/{{$asset->id}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
              <i class="fas fa-regular fa-trash"></i>
            </button>
          </form>
          
          <form action="/dashboard/assets/{{ $asset->id }}/edit" class="d-inline">
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

  
    <div class="col-md-2">
      <div class="mb-1">
        <a class="btn btn-danger btn-custom" href="/dashboard">Back</a>
      </div>
    </div>
  
  
</div>
@endsection