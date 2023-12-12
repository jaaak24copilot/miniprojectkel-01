<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Perangkat Aktif</div>
                                @php
                                    $perangkatAktif = $perangkat->where('status', "Active")->count();
                                @endphp
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$perangkatAktif}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wifi fa-2x text-red-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                @php
                                    $menungguKonfirmasi = $perangkat->where('status', "Pengajuan sedang di proses")->count();
                                @endphp
                                Menunggu Konfirmasi Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$menungguKonfirmasi}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wifi fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->

    <div class="row">
        <div class="card-body">
            <h2>Lokasi Perangkat</h2>
            <p>Ini adalah lokasi perangkat yang sudah terpasang.</p>
            <div class="mapouter">
                <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0"
                        scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=850&amp;height=432&amp;hl=en&amp;q=telkom university&amp;t=k&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                        href="https://connectionsgame.org/">Connections NYT</a></div>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        width: 100%;
                        height: 432px;
                    }

                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        width: 100%;
                        height: 432px;
                    }

                    .gmap_iframe {
                        height: 432px !important;
                    }
                </style>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->