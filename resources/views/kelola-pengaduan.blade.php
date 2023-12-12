<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Laporan Pengaduan</h1>
                    
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Belum Di Proses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$belumDiProsesCount}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tasks fa-2x text-red-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Sedang Di Proses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sedangDiProsesCount}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tasks fa-2x text-red-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sudah Selesai
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$selesaiCount}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tasks fa-2x text-red-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Laporan Pengaduan<h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Pengaduan</th>
                                            <th>Nomor Telepon</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($pengaduan as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nama_pelapor}}</td>
                                                <td>{{$item->subjek}}</td>
                                                <td>{{$item->no_telp}}</td>
                                                <td>
                                                    @if ($item->status == 'Belum Diproses')
                                                        @if (Auth::user()->role == 1)
                                                            <a href="{{route('admin_update_laporan_pengaduan_proses',$item->id)}}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('admin-proses').submit();">Proses</a>
                                                            <form id="admin-proses" action="{{ route('admin_update_laporan_pengaduan_proses',$item->id) }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        @else
                                                            <a href="{{route('superadmin_update_laporan_pengaduan_proses',$item->id)}}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('superadmin-proses').submit();">Proses</a>
                                                            <form id="superadmin-proses" action="{{ route('superadmin_update_laporan_pengaduan_proses',$item->id) }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        @endif
                                                    @elseif ($item->status == 'Sedang Diproses')
                                                        @if (Auth::user()->role == 1)
                                                            <a href="{{route('admin_update_laporan_pengaduan_selesai',$item->id)}}" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('admin-selesai').submit();">Selesai</a>
                                                            <form id="admin-selesai" action="{{ route('admin_update_laporan_pengaduan_selesai',$item->id) }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        @else
                                                            <a href="{{route('superadmin_update_laporan_pengaduan_selesai',$item->id)}}" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('superadmin-selesai').submit();">Selesai</a>
                                                            <form id="superadmin-selesai" action="{{ route('superadmin_update_laporan_pengaduan_selesai',$item->id) }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        @endif
                                                    @else
                                                    @endif
                                                    
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

            @include('layouts.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('layouts.logout')

    @include('layouts.script')

</body>

</html>