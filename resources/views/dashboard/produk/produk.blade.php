@extends('layouts.master')
@section('content')
{{-- @include('layouts.footer') --}}
@include('layouts.navbar')


@auth
<body id="page-top">

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
                        </div>
                        <div class="card-header py-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-produk">Tambah Produk</button>
                        @include('dashboard.produk.add-produk')
                        </div>
                        <div class="card-body">

                            <div class="table-responsive" id="tab">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama</th>
                                            <th>Foto</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <!-- footer content -->
                                    </tfoot>
                                    <tbody>
                                        @foreach ($dataProduk as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama_produk }}</td>
                                            <td>{{ $data->foto_produk }}</td>
                                            <td>{{ $data->harga_produk }}</td>
                                            <td>{{ $data->stok_produk }}</td>
                                            <td>
                                                <a href="#" class="edit-button" data-bs-toggle="modal" data-bs-target="#edit-produk"
                                                   data-id_produk="{{ $data->id_produk }}" data-nama_produk="{{ $data->nama_produk }}"
                                                   data-foto_produk="{{ $data->foto_produk }}" data-harga_produk="{{ $data->harga_produk}}"
                                                   data-stok_produk="{{ $data->stok_produk }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('delete-produk', $data->id_produk) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                    <i class="fas fa-trash-alt" style="color: red"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach

                                    @include('dashboard.produk.edit-produk')

                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            $('.edit-button').click(function() {
                                                var id_produk = $(this).data('id_produk');
                                                var nama = $(this).data('nama');
                                                var foto = $(this).data('foto');
                                                var harga = $(this).data('harga');
                                                var stok = $(this).data('stok');

                                                $('#edit-produk').find('#edit-id').val(id_produk);
                                                $('#edit-produk').find('#edit-nama').val(nama);
                                                $('#edit-produk').find('#edit-foto').val(foto);
                                                $('#edit-produk').find('#edit-harga').val(harga);
                                                $('#edit-produk').find('#edit-stok').val(stok);
                                            });
                                        });
                                    </script>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ... (modals and scripts) ... -->
        </section>
    </div>


    <!-- Modal Edit Data -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Modal Add Data -->

<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Form for adding new user data -->
            <form id="add-user-form">
                <!-- Add form fields for new user data here -->
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Add User</button>
        </div>
    </div>
</div>
</div>
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
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    @endauth
    @guest <!-- Menampilkan pesan jika pengguna belum login -->
    <div class="container">
        <div class="alert alert-warning" role="alert">
            Anda harus login untuk mengakses halaman ini.
        </div>
    </div>
    @endguest
    <!-- Bootstrap core JavaScript-->
@endsection

