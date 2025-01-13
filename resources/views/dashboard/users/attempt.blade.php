@extends('dashboard.layouts.main')

<style>
  .img {
    width: 70px;
    border-radius: 50%;
    float: left;
    border: 5px solid rgba(255, 255, 255, 0.2);
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

  .table-responsive {
    width: 100%;
    overflow-x: auto; /* Allow horizontal scroll on small screens */
  }

  .btn-custom {
    width: 70%; /* Make all buttons the same width */
    padding: 10px; /* Consistent padding */
    border-radius: 5px; /* Consistent border radius */
    text-align: center; /* Center text */
  }

  .alert {
    margin-bottom: 20px; /* Add spacing below alerts */
  }

  table {
    width: 100%; /* Ensure the table takes full width */
  }

  th, td {
    text-align: left; /* Align text to the left */
  }

  /* Responsive styles for mobile */
  @media (max-width: 768px) {
    .btn-custom {
      padding: 8px; /* Adjust button padding for smaller screens */
    }

    .row > .col-12 {
      flex: 0 0 100%; /* Ensure full width for columns on mobile */
      max-width: 100%; /* Remove any max-width constraint */
    }
  }
</style>

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <a class="h2" href="/dashboard">Attempts</a>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive">

  <table class="table table-striped table-sm">
    <thead class="thead">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Email</th>
        <th scope="col">IP Address</th>
        <th scope="col">Status</th>
        <th scope="col">Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($attempts as $attempt)

      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$attempt->email}}</td>
        <td>{{$attempt->user_ip}}</td>
        <td>{{$attempt->status}}</td>
        <td>{{$attempt->created_at}}</td>
        {{-- <td>
          <form action="/dashboard/attempts/{{$attempt->id}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            @if ($attempt->status != "Deleted")
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
              <i class="fas fa-regular fa-trash"></i>
            </button>
            @endif
          </form>
        </td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>


  <div class="row">
    <div class="col-12 col-md-6 col-lg-4">
      <div class="mb-1">
        <a class="btn btn-danger btn-custom" href="/dashboard">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection
