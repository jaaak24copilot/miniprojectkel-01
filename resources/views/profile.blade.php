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
                    <h1 class="h4 mb-2 text-gray-800">Hello {{Auth::user()->name}}!</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form class="user" method="POST" action="{{route('update_profile')}}" enctype="multipart/form-data">
                                @csrf
                                <style> 
                                    .form-container {
                                        display: flex;
                                        align-items: center;
                                    }
                                
                                    .image-preview {
                                        width: 100px;
                                        height: 100px;
                                        background-size: cover;
                                        background-position: center;
                                        border: 1px solid #918a8a;
                                        border-radius: 50%;
                                        margin-right: 10px; 
                                    }
                                
                                    .image-upload {
                                        display: flex;
                                        flex-direction: column;
                                    }
                                </style>
                                <div class="form-container">
                                    <div class="image-preview" id="imagePreview" style="background-image: url('{{ asset('foto_profile/' . Auth::user()->foto) }}');">
                                    </div>
                                    <div class="image-upload">
                                        <div class="form-group">
                                            <label for="imageUpload">Upload Image</label>
                                            <br>
                                            <label class="btn btn-dark">
                                                Choose Your Photo
                                                <input name="foto" type="file" class="form-control-file" id="imageUpload" accept="image/*" onchange="previewImage(event)" style="display: none;">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function previewImage(event) {
                                        var imagePreview = document.getElementById('imagePreview');
                                        imagePreview.style.backgroundImage = 'url(' + URL.createObjectURL(event.target.files[0]) + ')';
                                    }
                                </script>
                                <hr>
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control form-control-user"
                                        placeholder="Full Name" value="{{Auth::user()->name}}">
                                </div>
                                <div class="form-group">
                                    <input name="no_telp" type="text" class="form-control form-control-user"
                                        placeholder="No Handpohone" value="{{Auth::user()->no_telp}}">
                                </div>
                                <button type="submit" class="btn btn-dark btn-user btn-block">
                                    Update Account
                                </button>
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

    @include('layouts.logout')

    @include('layouts.script')

</body>

</html>