@extends('dashboard.layouts.main')
<head>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      const kategoriSelect = document.querySelector('select[name="kategori"]');
      const subKategoriSelect = document.querySelector('select[name="sub_kategori"]');
  
      // Define options for each category
      const options = {
          Pendapatan: [
              { value: 'Gaji', text: 'Gaji' },
              { value: 'Obligasi', text: 'Obligasi' },
              { value: 'Bunga/Cashback', text: 'Bunga/Cashback' },
              { value: 'Angpao', text: 'Angpao' },
              { value: 'Ngajar Yoga', text: 'Ngajar Yoga' },
              { value: 'Lainnya', text: 'Lainnya' },
          ],
          Pengeluaran: [
              { value: 'Lainnya', text: 'Lainnya' },
              { value: 'Transport', text: 'Transport' },
              { value: 'Fixed', text: 'Fixed' },
              { value: 'Internet', text: 'Internet' },
              { value: 'Lifestyle', text: 'Lifestyle' },
              { value: 'Topup', text: 'Topup' },
          ],
      };
  
      function updateSubKategoriOptions() {
          const selectedKategori = kategoriSelect.value;
          const currentOptions = options[selectedKategori] || [];
  
          // Clear existing options
          subKategoriSelect.innerHTML = '';
  
          // Populate new options based on selected category
          currentOptions.forEach(option => {
              const newOption = document.createElement('option');
              newOption.value = option.value;
              newOption.textContent = option.text;
              subKategoriSelect.appendChild(newOption);
          });
  
          // Reset the selected value if the category changes
          subKategoriSelect.value = currentOptions.length > 0 ? currentOptions[0].value : '';
      }
  
      kategoriSelect.addEventListener('change', updateSubKategoriOptions);
  
      // Initialize options based on the current selection
      updateSubKategoriOptions();
  });
  </script>
</head>

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add New Transaction</h1>
</div>

@if(session()-> has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{session('error')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    
<div class="row">
  <div class="col-lg-8">
    <form method="post" autocomplete="off" action="/dashboard/transactions" class="mb-5" enctype="multipart/form-data">
      <!-- multipart form data harus supaya bisa upload file(img dll) -->
      @csrf

      <div class="mb-3">
        <label for="nominal" class="form-label">Nominal</label>
        <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal"
          required autofocus value="{{old('nominal')}}">
        @error('nominal')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select class="form-control" name="kategori">
            <option value="Pendapatan" selected>Pendapatan</option>
            <option value="Pengeluaran">Pengeluaran</option>
        </select>
    </div>

  <div class="mb-3">
      <label for="sub_kategori" class="form-label">Sub Kategori</label>
      <select class="form-control" name="sub_kategori">
          <option value="">Pilih Sub Kategori</option>
      </select>
  </div>

      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
        autofocus value="{{old('deskripsi')}}">
        @error('deskripsi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="balance" class="form-label">Balance</label>
        <select class="form-control" name="balance">
          {{-- <option value="Cash" selected> Cash</option> --}}
          @foreach ($balances as $balance)
          <option value="{{$balance->nama}}"> {{$balance->nama}}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-control" name="status">
          <option value="Active" selected> Active</option>
          <option value="Pending"> Pending</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Add Transaction</button>
    </form>

  </div>
  <div class="col-lg-8">

    <form method="post" action="/dashboard/transactions/template" class="mb-5" enctype="multipart/form-data">
      <!-- multipart form data harus supaya bisa upload file(img dll) -->
      @csrf
      @method('POST')
      <!-- Not strictly necessary with `POST` method -->
      <div class="mb-3">
        <label for="template" class="form-label">Use Template</label>
        <select class="form-control" name="template">
          @foreach ($templates as $template)
          <option value="{{$template->id}}" selected> {{$template->name}}</option>
          @endforeach
        </select>
      </div>


  <div class="row">
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary btn-custom">Use Template</button>
        </div>
        <div class="col-md-2">
          <a class="btn btn-danger btn-custom" href="/dashboard/transactions/index">Cancel</a>
        </div>
      </div>
    </form>

</div>
</div>

@endsection