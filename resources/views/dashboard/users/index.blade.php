@extends('dashboard.layouts.main')

@section('container')
<style>
  /* Add custom styles */
.form-control {
    padding: 1rem; /* Adjust as needed */
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

  .btn-custom {
    width: 70%; /* Make all buttons the same width */
    padding: 10px; /* Consistent padding */
    border-radius: 5px; /* Consistent border radius */
    text-align: center; /* Center text */
  }
.row {
    margin-top: 1%;
  }

</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
  <a class="h2" href="/dashboard">Users</a>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-12 col-md-6 col-lg-4" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive">
  <form action="{{ route('users.index') }}" method="GET">
    @csrf
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="string" class="form-control" id="username" name="username">
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select class="form-control" name="role" id="role">
            <option value="super-admin" {{ old('role')=='Super Admin' ? 'selected' : '' }}>Super Admin</option>
            <option value="admin" {{ old('role')=='Admin' ? 'selected' : '' }}>Admin</option>
            <option value="guest" {{ old('role')=='Guest' ? 'selected' : '' }}>Guest</option>
          </select>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <button type="submit" class="btn btn-primary btn-custom">Search</button>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-3">
        <a href="/dashboard/users/create" class="btn btn-primary btn-custom">Add New</a>
      </div>
    </div>
  </form>


  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{$loop->iteration}}</td>

        <td>{{$user->username}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role}}</td>

        <td>
          @if ($user->role != 'super-admin')
          <form action="/dashboard/users/{{$user->id}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            @if ($user->status != "Deleted")

            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
              <i class="fas fa-regular fa-trash"></i>
            </button>
            @endif
          </form>


          <form action="/dashboard/users/{{ $user->id }}/edit" class="d-inline">
            @csrf
            @method('POST')
            <button class="badge bg-warning border-0" type="submit">
              <i class="fas fa-regular fa-pen-nib"></i>
            </button>
          </form>

          @endif
        </td>

      </tr>
      @endforeach

    </tbody>
  </table>


    <div class="col-12 col-md-6 col-lg-4">
        <a class="btn btn-danger btn-custom" href="/dashboard">Back</a>
    </div>


</div>
@endsection
