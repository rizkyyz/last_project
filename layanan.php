<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "db");
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email']))

$id = "";
$nama = "";
$title= "";   
$file = "";
$halaman = "";
$foto = "";
$sukses = "";
$error = "";
$koneksi = mysqli_connect("localhost", "root", "", "db");

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = " ";
}
if($op == 'delete'){
    $id  = $_GET ['id'];
    $sql1 = "delete from layanan where id = '$id'";
    $q1   = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "berhasil hapus data";
    }else{
        $error = "Gagal melakukan hapus data";
    }
}
if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from layanan where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $title = $r1['title'];
    $file = $r1['file'];
    $halaman = $r1['halaman'];

    if ($title == '') {
        $error = "Data Tidak Ditemukan";
    }
}

if (isset($_POST['submit'])) {
    $nama = $_POST ['nama'];
    $title = $_POST['title'];
    $file = $_FILES['file']['name'];
    $direktori = "anjas/";
    $halaman = $_POST['halaman'];
    move_uploaded_file($_FILES['file']['tmp_name'], $direktori . $file);
    mysqli_query($koneksi, "insert into layanan set file='$file'");
    $sukses = "Berhasil memasukan data baru";

    if ($nama && $title && $file && $halaman) {//update
        if ($op == 'edit') {
            $sql1 = "update layanan set nama = '$nama', title = '$title',file = '$file',halaman = '$halaman' where id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil di update";
            } else {
                $error = "Data gagal di update";
            }
        } else { //insert
            $sql1 = "insert into layanan(nama,title,file,halaman) values ('$nama','$title','$file','$halaman')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukan data baru";
            } else {
                $errors = "Gagal Memasukan Data";
            }
        }

    } else {
        $error = "Lengkapi berita anda !";
    }
}
if (isset($_POST['uplod'])) {
        
    $foto   = $_FILES['foto']['name'];
    $direktori = "dok/";
    move_uploaded_file($_FILES['foto']['tmp_name'],$direktori.$foto);
    mysqli_query($koneksi, "insert into depan_layanan set file='$foto'");
        $sukses = "Berhasil memasukan data baru";

    if ($foto) {
        $sql1 = "insert into depan_layanan(foto) values ('$foto')";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil memasukan data baru";
        } else {
            $error = "Gagal Memasukan Data";
        }
    }else {
        $error = "Lengkapi berita anda !";
    }
  }
?>
<?php include('db_conn.php'); ?>
<?php include_once("head.php"); ?>
<?php include_once("menu.php"); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                </li>

                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                        <img class="img-profile rounded-circle"
                            src="https://cdn.pixabay.com/photo/2020/07/14/13/07/icon-5404125_1280.png">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
            </div>

            <!-- Content Row -->

            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-7 col-lg-8">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Pelayanan</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">

                            <?php
                            if ($error) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error ?>
                                </div>
                                <?php
                            } ?>
                            <?php
                            if ($sukses) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $sukses ?>
                                </div>
                                <?php
                            } ?>
                            <form action=" " method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                    <label for="title" class="col-sm-3 col-form-label">Layanan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" id="layanan"
                                            value="<?php echo $nama ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="<?php echo $title ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file">Gambar Berita</label>
                                    <input type="file" class="form-control" id="gambar" name="file"
                                        value="<?php echo $file ?>">
                                </div>
                                <div class="form-group">
                                    <label for="halaman">Halaman</label>
                                    <textarea class="form-control" id="halaman" name="halaman" rows="3"
                                        value="<?php echo $halaman ?>"></textarea>
                                </div>
                                <div class="col-12">
                                    <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-5 col-lg-4">
                        <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                            <h6 class="m-0 font-weight-bold text-primary">Gambar Halaman Depan</h6>
                            <div class="dropdown no-arrow">
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="card-body">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <form action=" " method="POST" enctype="multipart/form-data">
                               
                                <div class="form-group">
                                    <label for="file">Gambar Berita</label>
                                    <input type="file" class="form-control" id="gambar" name="foto"
                                        value="<?php echo $file ?>">
                                </div>
                                <div class="col-12">
                                    <input type="submit" name="uplod" value="Simpan Data" class="btn btn-primary">
                                </div>
                            </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="col-xl-12 col-lg-11">
                        <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                            <h6 class="m-0 font-weight-bold text-primary">Layanan Tersedia</h6>
                            <div class="dropdown no-arrow">
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                            <div class="card-body">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Layanan</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM layanan ORDER BY id ASC";
                                            $result = mysqli_query($koneksi, $query);
                                            //mengecek apakah ada error ketika menjalankan query
                                            if (!$result) {
                                                die("Query Error: " . mysqli_errno($koneksi) .
                                                    " - " . mysqli_error($koneksi));
                                            }

                                            //buat perulangan untuk element tabel dari data mahasiswa
                                            $no = 1; //variabel untuk membuat nomor urut
                                            // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                            // kemudian dicetak dengan perulangan while
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <td>
                                                        <?php echo $row['title']; ?>
                                                    </td>
                                                    <td>
                                                        <a href="layanan.php?op=edit&id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                        <a href="layanan.php?op=delete&id=<?php echo $row['id'] ?>" onclick="return confirm('Yakin mau Hapus')"><button type="button" class="btn btn-danger">Delete</button></a>
                                                    </td>
                                                </tr>

                                                <?php
                                                $no++; //untuk nomor urut terus bertambah 1
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                <!-- Color System -->

            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->

            <!-- Approach -->

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto ">
            &copy; Copyright <strong><span>DISKOMINFOSANTIK KABUPATEN BEKASI</span></strong>. All Rights Reserved
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    CKEDITOR.replace('halaman', {
        uiColor:'#4976F2'
    });
</script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>