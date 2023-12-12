</html><!DOCTYPE html>
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
                    <h1 class="h4 mb-2 text-gray-800">Hello {{Auth::user()->name}}!</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{route('tambah_laporan_pengaduan')}}"><button class="btn btn-dark">Tambah</button></a>
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
                                            <th>Status</th>
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
                                                <td>{{$item->status}}</td>
                                                
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