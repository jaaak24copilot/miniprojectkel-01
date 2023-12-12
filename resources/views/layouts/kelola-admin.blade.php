<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Admin</h1>
    <p class="mb-4">Data user admin : {{$userCount}}</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('superadmin_tambah_admin')}}"><button class="btn btn-dark">Tambah</button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nomor Handphone</th>
                            <th>Email</th>
                            <th>Action Admin</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->no_telp}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <a href="{{route('superadmin_edit_admin',$item->id)}}"><button class="btn btn-dark">Edit</button></a>
                                <a href="{{route('superadmin_delete_admin',$item->id)}}"><button class="btn btn-danger">Hapus</button></a>
                            </td>
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