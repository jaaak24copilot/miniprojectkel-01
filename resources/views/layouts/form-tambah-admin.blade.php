<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-2 text-gray-800">Tambah Admin</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <style>
                label {
                    display: block;
                    font-weight: bold;
                    margin-bottom: 1px;
                }

                input[type="text"],
                input[type="email"],
                input[type="password"],
                input[type="tel"],
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
            <form method="POST" action="{{route('superadmin_store_admin')}}">
                @csrf
                <label for="nama">Nama:</label><br>
                <input type="text" id="nama" name="name" required placeholder="nama panjang"><br><br>
            
                <label for="email">Email:</label><br>
                <input type="email" name="email" required placeholder="email"><br><br>
            
                <label for="password">Password:</label><br>
                <input type="password" name="password" required placeholder="password"><br><br>
            
                <label for="telepon">Nomor Telepon:</label><br>
                <input type="tel" id="telepon" name="no_telp" required placeholder="nomor telfon"><br><br>
            
                <label for="kecamatan">Kecamatan:</label><br>
                <input type="text" id="kecamatan" name="kecamatan" required placeholder="kecamatan"><br><br>
            
                <label for="alamat">Alamat:</label><br>
                <textarea id="alamat" name="alamat" rows="4" required placeholder="alamat"></textarea><br><br>

                <button type="submit" class="btn btn-dark">Submit</a>
            </form>
            
            
            
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->