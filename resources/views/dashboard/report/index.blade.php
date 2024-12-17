@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <a class="h2" href="/dashboard">Annual Report</a>
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

<div class="row">

  @foreach ($years as $year)
    @php
        // Get transactions for the current year
        $transactionsForYear = $groupedByYear->get($year, collect());

        // Separate transactions into 'Pendapatan' and 'Pengeluaran'
        $transactionYrPlus = $transactionsForYear->where('kategori', 'Pendapatan');
        $transactionYrMin = $transactionsForYear->where('kategori', 'Pengeluaran');

        // Calculate annual earnings and spending
        $annualEarning = $transactionYrPlus->sum('nominal');
        $annualSpending = $transactionYrMin->sum('nominal');
    @endphp


  <div class="col-sm-3 mb-3 mb-sm-0">
    <div class="card mt-5" style="width: 19rem;">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $year }}</h5>
        <p class="card-text">Click here for detail..</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Annual Earning: Rp.{{ number_format($annualEarning, '2', ',', '.') }}</li>
        <li class="list-group-item">Annual Spending: Rp.{{ number_format($annualSpending, '2', ',', '.') }}</li>
        <li class="list-group-item">New Investment: Rp.{{ number_format(22, '2', ',', '.') }}</li>
      </ul>
      <div class="card-body">
        <a href="#" class="card-link">Download Report</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>


  </div>

  @endforeach
  <div class="col-sm-3">
    <div class="card mt-5" style="width: 18rem;">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">An item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
      </ul>
      <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card mt-5" style="width: 18rem;">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">An item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
      </ul>
      <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card mt-5" style="width: 18rem;">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">An item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
      </ul>
      <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card mt-5" style="width: 18rem;">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">An item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
      </ul>
      <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>
  </div>



</div>



@endsection