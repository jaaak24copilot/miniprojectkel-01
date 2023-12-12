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
                    <h1 class="h3 mb-2 text-gray-800">Kelola Perangkat</h1>
                    <p class="mb-4">Maksimum Perangkat : 2</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('tambah_detail_perangkat') }}"><button class="btn btn-dark">Tambah
                                    Perangkat</button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>ID Pelanggan</th>
                                            <th>ID Device</th>
                                            <th>Type Device</th>
                                            <th>Tanggal Sewa</th>
                                            <th>Waktu Durasi</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 0;
                                        $photoModal = ["photoModal1", "photoModal2", "photoModal3", "photoModal4", "photoModal5", "photoModal6", "photoModal7", "photoModal8", "photoModal9", "photoModal10", "photoModal11", "photoModal12", "photoModal13", "photoModal14", "photoModal15", "photoModal16", "photoModal17", "photoModal18", "photoModal19", "photoModal20", "photoModal21", "photoModal22", "photoModal23", "photoModal24", "photoModal25", "photoModal26", "photoModal27", "photoModal28", "photoModal29", "photoModal30", "photoModal31", "photoModal32", "photoModal33", "photoModal34", "photoModal35", "photoModal36", "photoModal37", "photoModal38", "photoModal39", "photoModal40", "photoModal41", "photoModal42", "photoModal43", "photoModal44", "photoModal45", "photoModal46", "photoModal47", "photoModal48", "photoModal49", "photoModal50", "photoModal51", "photoModal52", "photoModal53", "photoModal54", "photoModal55", "photoModal56", "photoModal57", "photoModal58", "photoModal59", "photoModal60", "photoModal61", "photoModal62", "photoModal63", "photoModal64", "photoModal65", "photoModal66", "photoModal67", "photoModal68", "photoModal69", "photoModal70", "photoModal71", "photoModal72", "photoModal73", "photoModal74", "photoModal75", "photoModal76", "photoModal77", "photoModal78", "photoModal79", "photoModal80", "photoModal81", "photoModal82", "photoModal83", "photoModal84", "photoModal85", "photoModal86", "photoModal87", "photoModal88", "photoModal89", "photoModal90", "photoModal91", "photoModal92", "photoModal93", "photoModal94", "photoModal95", "photoModal96", "photoModal97", "photoModal98", "photoModal99", "photoModal100"];
                                        $selesai = ["selesai1", "selesai2", "selesai3", "selesai4", "selesai5", "selesai6", "selesai7", "selesai8", "selesai9", "selesai10", "selesai11", "selesai12", "selesai13", "selesai14", "selesai15", "selesai16", "selesai17", "selesai18", "selesai19", "selesai20", "selesai21", "selesai22", "selesai23", "selesai24", "selesai25", "selesai26", "selesai27", "selesai28", "selesai29", "selesai30", "selesai31", "selesai32", "selesai33", "selesai34", "selesai35", "selesai36", "selesai37", "selesai38", "selesai39", "selesai40", "selesai41", "selesai42", "selesai43", "selesai44", "selesai45", "selesai46", "selesai47", "selesai48", "selesai49", "selesai50", "selesai51", "selesai52", "selesai53", "selesai54", "selesai55", "selesai56", "selesai57", "selesai58", "selesai59", "selesai60", "selesai61", "selesai62", "selesai63", "selesai64", "selesai65", "selesai66", "selesai67", "selesai68", "selesai69", "selesai70", "selesai71", "selesai72", "selesai73", "selesai74", "selesai75", "selesai76", "selesai77", "selesai78", "selesai79", "selesai80", "selesai81", "selesai82", "selesai83", "selesai84", "selesai85", "selesai86", "selesai87", "selesai88", "selesai89", "selesai90", "selesai91", "selesai92", "selesai93", "selesai94", "selesai95", "selesai96", "selesai97", "selesai98", "selesai99", "selesai100"];
                                    @endphp
                                    <tbody>
                                        @foreach ($perangkat as $item)
                                            <tr>
                                                <td>{{ $item->nama_pelanggan }}</td>
                                                <td>{{ $item->user_id }}</td>
                                                <td>{{ $item->device_id }}</td>
                                                <td>
                                                    @php
                                                        $harga_per_hari = 0;
                                                
                                                        switch($item->tipe_perangkat) {
                                                            case 1:
                                                                echo "<p>Small Ponds</p>";
                                                                $harga_per_hari = 1000;
                                                                break;
                                                
                                                            case 2:
                                                                echo "<p>Medium Ponds</p>";
                                                                $harga_per_hari = 2000;
                                                                break;
                                                
                                                            case 3:
                                                                echo "<p>Big Ponds</p>";
                                                                $harga_per_hari = 3000;
                                                                break;
                                                
                                                            default:
                                                                echo "<p>Unknown Type</p>";
                                                        }
                                                
                                                        $total_hari = floor((strtotime($item->tanggal_kembali) - strtotime($item->tanggal_pinjam)) / (60 * 60 * 24));
                                                        $total_harga = $total_hari * $harga_per_hari;
                                                    @endphp
                                                </td>                                                
                                                <td>{{ $item->tanggal_pinjam }}</td>

                                                <td id="timer{{ $item->id }}"></td>
                                                

                                                <td>{{ $item->tanggal_kembali }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    @if ($item->status == 'Menunggu Pembayaran')
                                                        <button class="btn btn-success" data-toggle="modal"
                                                            data-target="#{{$photoModal[$no]}}">Pay</button>
                                                    @else
                                                        <p>Sudah di bayar</p>
                                                    @endif
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="{{$photoModal[$no]}}" tabindex="-1"
                                                        role="dialog" aria-labelledby="photoModalLabel"
                                                        aria-hidden="true">       
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="photoModalLabel">Qris
                                                                        Payment</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <!-- Single Photo -->
                                                                    <img src="{{ asset('img/aaaaaa.jpg') }}" class="img-fluid" alt="Single Photo">
                                                                    <p>Scan QRIS untuk melakukan pembayaran</p>
                                                                    
                                                                    <p>Rp. {{ number_format($total_harga, 2, ',', '.') }};</p>
                                                                </div>                                                                
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary"
                                                                        id="selesaiButton"
                                                                        onclick="event.preventDefault();
                                    document.getElementById('{{$selesai[$no]}}').submit();">Selesai</button>
                                                                    <form id="{{$selesai[$no]}}"
                                                                        action="{{ route('selesai_detail_perangkat', $item->id) }}"
                                                                        method="POST" class="d-none">
                                                                        @csrf
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#selesaiButton').click(function() {
                    alert('Terimakasih telah menggunakan layanan kami');
                });
            });
        </script>

        <script>
            // Function to update the timer
            function updateTimer(targetDate, elementId) {
                // Get the current date and time
                var now = new Date().getTime();

                // Calculate the time remaining
                var timeRemaining = targetDate - now;

                // Calculate days, hours, minutes, and seconds
                var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                // Display the time remaining in the specified element
                document.getElementById(elementId).innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

                // Update the timer every second
                setTimeout(function () {
                    updateTimer(targetDate, elementId);
                }, 1000);
            }

            // Call the updateTimer function for each row in the table
            @foreach ($perangkat as $item)
                var targetDate{{$item->id}} = new Date("{{ $item->tanggal_kembali }}").getTime();
                updateTimer(targetDate{{$item->id}}, "timer{{$item->id}}");
            @endforeach
        </script>

</body>

</html>
