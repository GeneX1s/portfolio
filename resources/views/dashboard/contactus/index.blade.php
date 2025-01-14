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
</style>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


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
                    <h1 class="h3 mb-2 text-gray-800">User Feedbacks</h1>
                    <p class="mb-4">All messages from the Contact Us Form page is displayed here.</p>

                    <form action="{{ route('contactus.index') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="string" class="form-control" id="name" name="name">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="string" class="form-control" id="email" name="email">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <button type="submit" class="btn btn-primary btn-custom mb-3">Search</button>
                            </div>
                    </form>

                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="/dashboard/contactus/create" class="btn btn-primary btn-custom mb-3">Create</a>
                    </div>
                </div>


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($messages as $msg)

                                    <tr>
                                        <td>{{ $msg->name }}</td>
                                        <td>{{ $msg->email }}</td>
                                        <td>{{ $msg->message }}</td>
                                        <td>{{ $msg->created_at }}</td>

                                        <form action="/dashboard/contactus/{{$msg->id}}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf

                                            <button class="badge bg-danger border-0"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-regular fa-trash"></i>
                                            </button>
                                        </form>

                                        <form action="/dashboard/contactus/{{ $msg->id }}/edit" class="d-inline">
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
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>

</html>

@endsection
