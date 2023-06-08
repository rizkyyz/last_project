<?php 
  session_start();
 
  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
    $id = " ";
    $foto = "";
    $sukses = "";
    $error = "";
    $koneksi = mysqli_connect("localhost","root","","db");
    if (isset($_POST['submit'])) {
        
        $foto   = $_FILES['foto']['name'];
        $direktori = "foto/";
        move_uploaded_file($_FILES['foto']['tmp_name'],$direktori.$foto);
        mysqli_query($koneksi, "insert into galery set file='$foto'");
            $sukses = "Berhasil memasukan data baru";
    
        if ($foto) {
            $sql1 = "insert into galery(foto) values ('$foto')";
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
    if (isset($_GET['op'])) {//delete foto
        $op = $_GET['op'];
    } else {
        $op = " ";
    }
    if($op == 'delete'){
        $id  = $_GET ['id'];
        $sql1 = "delete from galery where id = '$id'";
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
                            <div class="card shadow mb-4"><br>
                                <!-- Card Header - Dropdown -->
                                 <!-- Card Body -->
                                <div class="card-body">
                                <div class="col-sm-10 animate__animated animate__fadeInTopLeft animate__slow 2s">
                <div class="text-center">
                    <h2 class="text-uppercase">Galery</h2>
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
                            <label for="foto">Upload Galery</label>
                            <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $foto ?>">
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
                                        <th>foto</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                  $query = "SELECT * FROM galery ORDER BY id ASC";
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
                                      <td><img src="foto/<?php echo $row['foto'];?>" width="90" height="70" /></td>
                                      <td>
                                        <a href="galery.php?op=delete&id=<?php echo $row['id'] ?>" onclick="contoh()"><button class="btn btn-danger">Delete</button></a>
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
                            </div>
                        </div>
                        </div>
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
            <!-- End of model-->
            <div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Delete Account</h1>
      <p>Are you sure you want to delete your account?</p>

      <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="button" class="deletebtn">Delete</button>
      </div>
    </div>
  </form>
</div>                   
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
    <script type="text/javascript">

        function contoh() {

           swal({

                title: "Berhasil!",

                text: "Pop-up berhasil ditampilkan",

                icon: "success",

                button: true

            });

        }

    </script>
</body>
</html>
<?php 
}else {
   header("Location: login.php");
}
 ?>