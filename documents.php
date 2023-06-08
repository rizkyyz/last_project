<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
$id = "";
$tanggal = "";
$judul = "";
$dokumen = "";
$sukses = "";
$error = "";
$koneksi = mysqli_connect("localhost","root","","db");
if (isset($_POST['submit'])) {
    $tanggal = date("Y-m-d H:i:s");
    $judul = $_POST['judul'];
    $dokumen   = $_FILES['dokumen']['name'];
    $direktori = "dokumen/";
    move_uploaded_file($_FILES['dokumen']['tmp_name'],$direktori.$dokumen);
    mysqli_query($koneksi, "insert into dokomen set file='$dokumen'");
        $sukses = "Berhasil memasukan data baru";

    if ($tanggal && $judul && $dokumen) {
        $sql1 = "insert into dokomen(tanggal,judul,dokumen) values ('$tanggal','$judul','$dokumen')";
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
if (isset($_GET['op'])) {//delete dokumen
    $op = $_GET['op'];
} else {
    $op = " ";
}
if($op == 'delete'){
    $id  = $_GET ['id'];
    $sql1 = "delete from dokomen where id = '$id'";
    $q1   = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "berhasil hapus data";
    }else{
        $error = "Gagal melakukan hapus data";
    }
}else {
    $error = "";
}


?>
<?php include_once("head.php");?>
<?php include_once("menu.php");?>      
<?php include_once("topbar.php");?>      
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
                                <a class="nav-link collapsed" href="./documents.php">
                                <!-- Card Body -->
                                <div class="card-body">
                                <i class="fa fa-refresh fa-spin" style="font-size:24px blockquote text-right"></i> Refresh</a>                             

                                <div class="col-sm-10 animate__animated animate__fadeInTopLeft animate__slow 2s">
                <div class="text-center">
                    <h2 class="text-uppercase">Dokumen</h2>
                    <hr />
                </div>
                <div class="col-sm-12">
                    <div class="card p-1">
                        <div class="container mb-2 hrt">
                        </div>
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
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" placeholder="judul" name="judul" value="<?php echo $judul ?>">
                                 <small id="judul" class="form-text text-muted"></small>
                             </div>
                             <div class="form-group">
                            <label for="documen">Upload Documents</label>
                            <input type="file" class="form-control-file" id="dokumen" name="dokumen" value="<?php echo $dokumen ?>">
                                </div>
                                <div class="col-12">
                                <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                            </div><br> 
                         </form>
                         <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Dokumen</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                  $query = "SELECT * FROM dokomen ORDER BY id ASC";
                                  $result = mysqli_query($koneksi, $query);
                                  //mengecek apakah ada error ketika menjalankan query
                                  if(!$result){
                                    die ("Query Error: ".mysqli_errno($koneksi).
                                       " - ".mysqli_error($koneksi));
                                  }
                            
                                  //buat perulangan untuk element tabel dari data mahasiswa
                                  $no = 1; //variabel untuk membuat nomor urut
                                  // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                  // kemudian dicetak dengan perulangan while
                                  while($row = mysqli_fetch_assoc($result))
                                  {
                                  ?>
                                   <tr>
                                      <td><?php echo $no; ?></td>
                                      <td><?php echo $row['tanggal']; ?></td>
                                      <td><?php echo $row['judul']; ?></td>
                                      <td><a href ="dokumen/<?php echo $row['dokumen'];?>"><button class="btn btn-outline-danger"><svg class="bi bi-file-pdf" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16">
                                          <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                          <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                                         </svg></button></a></td>
                                         <td>
                                        <a href="documents.php?op=delete&id=<?php echo $row['id'] ?>" onclick="contoh()"><button class="btn btn-danger">Delete</button></a>
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
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        
                    <!-- Content Row -->
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
}else {
   header("Location: login.php");
}
 ?>