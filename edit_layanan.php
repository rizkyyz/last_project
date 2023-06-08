<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "db");
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {

    $layanan_name = "";
    $judul_isi = "";
    $layanan_file = "";
    $halaman = "";
    $sukses = "";
    $error = "";
    $koneksi = mysqli_connect("localhost", "root", "", "db");
    if (isset($_POST['submit'])) {
        $judul_isi = $_POST['judul_isi'];
        $halaman = $_POST['halaman'];
        $sukses = "Berhasil memasukan data baru";
       
    }
    ?>
    <?php include('db_conn.php'); ?>
    <?php include_once("head.php"); ?>
    <?php include_once("menu.php"); ?>
    <?php include_once("topbar.php"); ?>
    <!-- Content Wrapper -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-11">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Layanan</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                            </a> <a class="nav-link collapsed" href="./layanan.php">
                                <i class="fa fa-refresh fa-spin" style="font-size:24px"></i> Refresh</a>
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
                          <div class="text-center">            
                    <h2 class="text-uppercase">Form Layanan</h2>
                    <hr />
                </div>
                        <label for="layanan_name">Layanan</label>
                        <form action="" method="POST">
                            <div class="form-group">
                                <select class="form-control" name="layanan_name" id="layanan_name">
                                    <option disabled selected> Pilih layanan</option>
                                    <?php
                                    $query = "SELECT * FROM layanan ORDER BY layanan_id ASC";
                                    $result = mysqli_query($koneksi, $query);

                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>

                                        <option value="<?= $row['layanan_name'] ?>"><?= $row['layanan_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select><br>
                                <div class="form-group">
                                <label for="judul_isi">Judul</label>
                                <input type="text" class="form-control" id="judul_isi" placeholder="judul" name="judul_isi" value="<?php echo $judul_isi ?>">
                                 <small id="judul_isi" class="form-text text-muted"></small>
                             </div>
                                <div class="form-group">
                            <label for="dock">Upload File (jpg,png,docx,dll)</label>
                            <input type="file" class="form-control" id="file" name="dock" value="<?php echo $dock ?>">
                                </div><br>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Isi Halaman Layanan</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="halaman"
                                        rows="3" value="<?php echo $halaman ?>"></textarea>
                                </div>
                                <div class="col-12">
                                <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                            </div><br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->

    <!-- Card Header - Dropdown -->

    <!-- Card Body -->

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->


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

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    </body>

    </html>
<?php
} else {
    header("Location: login.php");
}
?>