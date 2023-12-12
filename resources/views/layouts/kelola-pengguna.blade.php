<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Pelanggan</h1>
    @php
        $perangkatCount = $perangkat->count();
    @endphp
    <p class="mb-4">Data pelanggan : {{$perangkatCount}}</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Pelanggan</h6>
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Pelanggan</th>
                            <th>ID Device</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($perangkat as $item)
                        <tr>
                            <td>{{$item->user_id}}</td>
                            <td>{{$item->device_id}}</td>
                            <td>{{$item->nama_pelanggan}}</td>
                            <td>
                                @if ($item->status == "Menunggu Pembayaran")
                                    <p>Menunggu pembayaran</p>
                                @elseif ($item->status == "Pengajuan sedang di proses")
                                    <p>Menunggu konfirmasi admin</p>
                                @elseif ($item->status == "Active")
                                    <p>Aktif</p>
                                    @elseif ($item->status == "Expired")
                                    <p>Expired</p>
                                @elseif ($item->status == "Pengajuan ditolak")
                                    <p>Pengajuan di tolak</p>
                                @endif
                            </td>
                            <td>
                                @if ($item->status == "Active" )
                                    <p>-</p>
                                @elseif ( $item->status == "Menunggu Pembayaran")
                                    <p>-</p>
                                @elseif ($item->status == "Expired")
                                <p>-</p>
                                @elseif ($item->status == "Pengajuan ditolak")
                                <p>-</p>
                                @else
                                @if (Auth::user()->role == 1)
                                    <button class="btn btn-success" onclick="event.preventDefault();
                                document.getElementById('accept{{$item->id}}').submit();">Accept</button>
                                                                <form id="accept{{$item->id}}"
                                                                    action="{{ route('admin_update_kelola_pengguna_terima', $item->id) }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                </form>
                                <button class="btn btn-danger" onclick="event.preventDefault();
                                document.getElementById('denied{{$item->id}}').submit();">Denied</button>
                                                                <form id="denied{{$item->id}}"
                                                                    action="{{ route('admin_update_kelola_pengguna_tolak', $item->id) }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                </form>
                                @elseif (Auth::user()->role == 2)
                                <button class="btn btn-success" onclick="event.preventDefault();
                                document.getElementById('accept{{$item->id}}').submit();">Accept</button>
                                                                <form id="accept{{$item->id}}"
                                                                    action="{{ route('superadmin_update_kelola_pengguna_terima', $item->id) }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                </form>
                                <button class="btn btn-danger" onclick="event.preventDefault();
                                document.getElementById('denied{{$item->id}}').submit();">Denied</button>
                                                                <form id="denied{{$item->id}}"
                                                                    action="{{ route('superadmin_update_kelola_pengguna_tolak', $item->id) }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                </form>
                                @endif
                                
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