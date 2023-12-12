<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Halo {{$user->name}}</h1>
    
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Status Perangkat</div>
                                @if ($perangkat->where('status', "Active")->count() > 0)
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Connected</div>
                                @elseif($perangkat->where('status', "Menunggu Pembayaran")->count() > 0 || $perangkat->where('status', "Pengajuan sedang di proses")->count() > 0)
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Requested</div>
                                @elseif ($perangkat-> count() == 0)
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">No Device</div>
                                @endif
                            
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wifi fa-2x text-red-300"></i>
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
                                @php
                                    $perangkatAktif = $perangkat->where('status', "Active")->count();
                                @endphp
                                Jumlah Perangkat Aktif</div>
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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Suhu
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">26°C</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-temperature-low fa-2x text-red-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                PH</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8 pH</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-water fa-2x text--300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Suhu Dan PH Air</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Timestamp</th>
                            <th>Suhu (°C)</th>
                            <th>PH (pH)</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>17/08/2023 02:37</td>
                            <td>26°C</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>87/08/2023 02:37</td>
                            <td>28°C</td>
                            <td>8</td>
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