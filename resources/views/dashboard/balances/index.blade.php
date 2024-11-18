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
  <a class="h2" href="/dashboard">Balances</a>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive">
  {{-- <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Insert New Product</a> --}}<form
    action="{{ route('balances.index') }}" method="GET">
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
          <label for="tipe" class="form-label">Tipe</label>
          <select class="form-control" name="tipe" id="tipe">
            <option value=""></option>
            <option value="E-Wallet">E-Wallet</option>
            <option value="Bank">Bank</option>
            <option value="Investment">Investment</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <button type="submit" class="btn btn-primary btn-custom mb-3">Search</button>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <a href="/dashboard/balances/create" class="btn btn-primary btn-custom mb-3">Add New</a>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <a href="/dashboard/balances/move" class="btn btn-primary btn-custom mb-3">Move Balance</a>
      </div>
    </div>
  </form>


  <table class="table table-striped table-sm">
    <thead class="thead">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama</th>
        <th scope="col" onclick="sortTable()">Saldo</th>
        <th scope="col">Tipe</th>
        <th scope="col">Dividen/Bunga</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @php
        $total = 0;
        $investment = 0;
        $saldo = 0;
      @endphp
      @foreach ($balances as $balance)
      <tr>
        <td>{{$loop->iteration}}</td>

        <td>{{$balance->nama}}</td>
        <td>Rp.{{ number_format($balance->saldo, '2', ',', '.') }}</td>
        <td>{{$balance->tipe}}</td>
        <td>{{$balance->dividen}}</td>
        @php
          $total = $total + $balance->saldo;
          if($balance->tipe == 'Investment'){
            $investment = $investment + $balance->saldo;
          }else{
            $saldo = $saldo + $balance->saldo;

          }
        @endphp
        <td>
          <form action="/dashboard/balances/{{$balance->id}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
              <i class="fas fa-regular fa-trash"></i>
            </button>
          </form>
          
          <form action="/dashboard/balances/{{ $balance->id }}/edit" class="d-inline">
            @csrf
            @method('POST')
            <!-- Not strictly necessary with `POST` method -->
            <button class="badge bg-warning border-0" type="submit">
              <i class="fas fa-regular fa-pen-nib"></i>
            </button>
          </form>

          <form action="/dashboard/balances/{{ $balance->id }}/history" class="d-inline">
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
    <div class="col-12 col-md-6 col-lg-4">
      <div class="mb-3">
        <h6>Total : Rp.{{ number_format($total, '2', ',', '.') }}</h6>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
      <div class="mb-3">
        <h6>Saldo : Rp.{{ number_format($saldo, '2', ',', '.') }}</h6>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
      <div class="mb-3">
        <h6>Investment : Rp.{{ number_format($investment, '2', ',', '.') }}</h6>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
      <div class="mb-3">
        <h6>Monthly Profit(from invest) : Rp.{{ number_format($profit/12, '2', ',', '.') }}</h6>
      </div>
    </div>
  </div>
  
    <div class="col-12 col-md-6 col-lg-4">
        <a class="btn btn-danger btn-custom" href="/dashboard">Back</a>
    </div>
  
  
</div>

<script>
  function sortTable() {
      const table = document.getElementById("saldoTable");
      const tbody = table.querySelector("tbody");
      const rows = Array.from(tbody.rows);
  
      // Sort rows based on the Saldo column (index 2)
      rows.sort((a, b) => {
          const saldoA = parseInt(a.cells[2].innerText, 10);
          const saldoB = parseInt(b.cells[2].innerText, 10);
          return saldoA - saldoB; // Ascending order
      });
  
      // Clear existing rows and append sorted rows
      tbody.innerHTML = "";
      rows.forEach(row => tbody.appendChild(row));
  }
  </script>
@endsection