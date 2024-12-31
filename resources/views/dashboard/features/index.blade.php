@extends('dashboard.layouts.main')

{{-- <h1>Clear all data transactions</h1>            |done
<h1>Audit Trail clear all button</h1>     |ongoing
<h1>Toggleable dashboard contents</h1>          |
<h1>RYR implementation</h1>                     |ongoing
<h1>New bug sidebar dashboard ilang di mobile</h1>|
<h1>STATISTICS Tahunan(cth. pengeluaran 2023)</h1>|ongoing
<h1>Sortir transaksi dari yang terbaru</h1>|done
<h1>Cron Job create transaction fixed outcome dan income</h1>|
<h1>Implementasi API Mutasi rekening dengan https://moota.co/</h1>|
<h1>Pending payments/transactions index(list hutang atau pembayaran yang belum terjadi)</h1>| done (notes: pake index create transaction tapi masuk   dari url yg beda di web.php)
<h1>Upload/ Update CV di Resume </h1>| done
<h1>Resume dinamis diedit dari dashboard </h1>| done

<h1>index for user login sessions? dan simpen field password</h1>|done(field password gabisa disimpen laravel)

<h1>authenticator for login</h1>|
<h1>generate report di dashboard index?(belum tau apa aja yg mau digenerate)</h1>| Problem: Karena ada dynamic value, sekarang dompdf belum bisa handle

<h1>implementasi datatables untuk index dan juga generate pdf,excel,dll</h1>|
<h1>Fitur tracking kelas yoga, start date dan total attendance</h1>|
<h1>Upload dan update CV melalui dashboard</h1>| --}}





{{-- <a class="h1" href="/dashboard">Back</a> --}}

@php

// Store a value in the cache for 10 minutes
// Cache::put('key', 'value', now()->addMinutes(10));

// Retrieving the value
$value = Cache::get('key'); // This should return 'value' if it was set

// Removing the value
// Cache::forget('key');

// dd($value);
// Removing the value
// session()->forget('key');
@endphp


@section('container')

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Upcoming Features</h1>
                    <p class="mb-4">Features that are on development and to be available!</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">On Progress</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Feature</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Feature</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                    </tfoot>
                                    {{-- @foreach ($resumes as $resume)

                                    @endforeach --}}
                                    <tbody>
                                        <tr>
                                            <td>Update/upload CV portfolio melalui dashboard</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                        </tr>
                                        <tr>
                                            <td>Fitur tracking kelas yoga, start date dan total attendance</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Done</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Category</th>{{-- education, experience --}}
                                            <th>Company/School Name</th>
                                            <th>Position</th>
                                            <th>Duration</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Category</th>
                                            <th>Company/School Name</th>
                                            <th>Position</th>
                                            <th>Duration</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                        </tr>
                                    </tfoot>
                                    {{-- @foreach ($resumes as $resume)

                                    @endforeach --}}
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

@endsection
