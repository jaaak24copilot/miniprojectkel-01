<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h4 mb-2 text-gray-800">Laporan Pengaduan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <style>
                label {
                    font-weight: bold;
                }

                input[type="text"],
                input[type="email"],
                input[type="tel"],
                select,
                textarea {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 10px;
                    border: 1px solid #ccc;
                    border-radius: 3px;
                }

                input[type="submit"] {
                    background: #007bff;
                    color: #fff;
                    border: none;
                    padding: 10px 20px;
                    border-radius: 3px;
                    cursor: pointer;
                }

                input[type="submit"]:hover {
                    background: #0056b3;
                }

                input[type="date"] {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 10px;
                    border: 1px solid #ccc;
                    border-radius: 3px;
                }

                textarea {
                    resize: vertical;
                }

                @media (max-width: 768px) {
                    form {
                        width: 100%;
                    }
                }
            </style>
            <form method="POST" action="{{route('store_laporan_pengaduan')}}">
                @csrf
                <label for="nama">Nama:</label><br>
                <input type="text" id="nama" name="nama" required value="{{$user->name}}"><br><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required value="{{$user->email}}"><br><br>

                <label for="telepon">Nomor Telepon:</label><br>
                <input type="tel" id="telepon" name="no_telp" required><br><br>

                <label for="kategori">Kategori Pengaduan:</label><br>
                <select id="kategori" name="subjek" required>
                    <option value="perangkat">Perangkat</option>
                    <option value="pembayaran">Pembayaran</option>
                    <option value="pelayanan">Pelayanan</option>
                </select><br><br>

                <label for="deskripsi">Deskripsi:</label><br>
                <textarea id="deskripsi" name="deskripsi" rows="4" cols="50"
                    required></textarea><br><br>

                <center><button type="submit" class="btn btn-dark">Submit</button></center>
            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->