@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <a class="h2" href="/dashboard">Users</a>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-10">
  {{-- <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Insert New Product</a> --}}<form
    action="{{ route('users.index') }}" method="GET">
    @csrf
    <div class="row">
      <div class="col-md-3">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="string" class="form-control" id="username" name="username">
        </div>
      </div>

      <div class="col-md-3">
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
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
      <div class="col-md">
        <a href="/dashboard/users/create" class="btn btn-primary mb-3">Add New</a>
      </div>
    </div>
  </form>


  <table class="table table-striped table-sm">
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
        @if ($user->role == 'admin' || $user->role == 'guest')
        
        <td>
          <form action="/dashboard/users/{{$user->id}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            @if ($user->status != "Deleted")
            
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
              <i class="fas fa-regular fa-trash"></i>
            </button>
            @endif
          </form>
          
          {{-- a href="/dashboard/menus/{{$menu['id']}}/edit" --}}
          <form action="/dashboard/users/{{ $user->id }}/edit" class="d-inline">
            @csrf
            @method('POST')
            <!-- Not strictly necessary with `POST` method -->
            <button class="badge bg-warning border-0" type="submit">
              <i class="fas fa-regular fa-pen-nib"></i>
            </button>
          </form>

        </td>
        @endif
        
      </tr>
      @endforeach

    </tbody>
  </table>

{{-- 
  <style>
    .btn-custom {
      width: 100%; /* Make all buttons the same width */
      padding: 10px; /* Consistent padding */
      border-radius: 5px; /* Consistent border radius */
      text-align: center; /* Center text */
    }
  </style> --}}
  
    <div class="col-md-2">
      <div class="mb-1">
        <a class="btn btn-danger btn-custom" href="/dashboard">Back</a>
      </div>
    </div>
  
  
</div>
@endsection