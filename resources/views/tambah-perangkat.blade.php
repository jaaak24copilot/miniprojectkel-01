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
                    <h1 class="h4 mb-2 text-gray-800">Tambah Perangkat</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <style>
                                label {
                                    display: block;
                                    font-weight: bold;
                                    margin-bottom: 1px;
                                }

                                select{
                                    width: 100%;
                                    padding: 5px;
                                    margin-bottom: 5px;
                                    border: 1px solid #ccc;
                                    border-radius: 5px;}

                                input[type="text"],
                                input[type="datetime-local"],
                                textarea {
                                    width: 100%;
                                    padding: 5px;
                                    margin-bottom: 5px;
                                    border: 1px solid #ccc;
                                    border-radius: 5px;
                                }

                                /* Adjust styles for smaller screens */
                                @media (max-width: 768px) {
                                    form {
                                        width: 100%;
                                    }
                                }
                            </style>
                            <form action="{{route('store_detail_perangkat')}}" method="POST">
                                @csrf
                                <label for="nama">Nama:</label><br>
                                <input type="text" id="nama" name="nama" required><br><br>

                                <label for="type_device">Type Device:</label><br>
                                <select id="type_device" name="type_device" required>
                                    <option value="1">Small Ponds</option>
                                    <option value="2">Medium Ponds</option>
                                    <option value="3">Big Ponds</option>
                                </select><br><br>

                                <label for="tanggal_sewa">Tanggal Sewa:</label><br>
                                <input type="datetime-local" id="tanggal_sewa" name="tanggal_sewa" required><br><br>

                                <label for="tanggal_selesai">Tanggal Selesai:</label><br>
                                <input type="datetime-local" id="tanggal_selesai" name="tanggal_selesai" required><br><br>

                                <button type="submit" class="btn btn-dark">Ajukan Pengajuan Pemasangan</button>
                            </form>
                        
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

    <!-- Logout Modal-->
    @include('layouts.logout')

    @include('layouts.script')

</body>

</html>