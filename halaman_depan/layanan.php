<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "db");
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email']))

$id = "";
$nama = "";
$title= "";   
$file = "";
$halaman = "";
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>KELURAHAN TELAGA ASIH</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets/img/logokab70x70.png" rel="icon">
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets/img/logokab70x70.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/aos/aos.css" rel="stylesheet">
    <link href="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/bootstrap/css/bootstrap.min.css"
        rel="stylesheet">
    <link href="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/bootstrap-icons/bootstrap-icons.css"
        rel="stylesheet">
    <link href="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/boxicons/css/boxicons.min.css"
        rel="stylesheet">
    <link href="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/glightbox/css/glightbox.min.css"
        rel="stylesheet">
    <link href="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/swiper/swiper-bundle.min.css"
        rel="stylesheet">
    <link href="https://dev.bekasikab.go.id/telagaasih/assets/icofont/icofont.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="https://dev.bekasikab.go.id/telagaasih/assets/arsha/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.12.1/dataTables.bootstrap5.css" integrity="sha512-3g2jlxiWYLcHo9Y/jU2dDJNqDIxN/yU5z9fa8lXIJRPe6aWYxTIVpGu95Jn+kgf/4D4fThWsWF5x4u5oK3lMVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <!-- =======================================================
  * Template Name: Arsha - v4.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center text-white" style="background-color: #37517e;">
        <div class="container d-flex align-items-center">

            <!-- <h1 class="logo me-auto"></h1> -->
            <h5 class="logo me-auto"><a href="https://dev.bekasikab.go.id/telagaasih/"><img
                        src="https://dev.bekasikab.go.id/telagaasih/vendor/assets/img/logokab70x70.png" alt=""
                        class="img btn-primary"> Kelurahan Telaga Asih</a></h5>

            <!-- Uncomment below if you prefer to use an image logo -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="./tentang.php">Tentang</a></li>
                            <li><a href="./visi.php">Visi dan Misi</a></li>
                            <li><a href="./struktur.php">Struktur
                                    Organisasi</a></li>
                  <li><a href="./kondisi.php">Kondisi</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Publik</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="./berita.php">Berita</a></li>
                            <li><a href="./galery.php">Galeri</a></li>
                            <li><a href="./pengaduan.php">Pengaduan</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>PELAYANAN MASYARAKAT</h3>
              <p>

              Dalam rangka meningkatkan efisiensi, efektivitas, transparansi dan akuntabilitas penyelenggaraan pemerintahan dan pelayanan masyarakat            </p>
            </div>

            <div class="accordion-list">
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
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-<?php echo $no;?>"><a href="../halaman_depan/layanan_masyarakat.php?id=<?=$row['id']?>"><span><?php echo $no;?></span><?php echo $row['nama']?></a> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-<?php echo $no;?>" class="collapse show" data-bs-parent=".accordion-list">
                    <p></span><?php echo $row['title']?></p>
                  </div>
                </li><br>
                <?php 
                                                           $no++; //untuk nomor urut terus bertambah 1

        }
            ?>
              </ul>
            </div>

          </div>
          <?php
                                            $query = "SELECT * FROM depan_layanan  ORDER BY id ASC";
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
          <div class="col-lg-4 align-items-stretch order-1 order-lg-2 img" style='background-image: url("../dok/<?php echo $row['foto']?>");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        
            <?php }?>
        </div>

      </div>
    </section>

                </div>

                <!-- ======= Services Section ======= -->
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="   col-md-6 footer-contact">

                    </div>

                    <div class="   col-md-6 footer-links">

                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">

                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Diskominfosantik Kabupaten Bekasi</span></strong>. 2023
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
            </div>
        </div>
    </footer><!-- End Footer -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center" style="margin-bottom:5px;">
                        <img src="assets/img/logo.png" width="80" height="53">
                    </div>
                    <form action="https://dev.bekasikab.go.id/telagaasih/login/login_akses" method="post">
                        <div class="form-group mb-2">
                            <input class="form-control" placeholder="Username" name="username" type="text" required>
                        </div>
                        <div class="form-group mb-2">
                            <input class="form-control" placeholder="Password" name="password" type="password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/aos/aos.js"></script>
    <!-- <script src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/glightbox/js/glightbox.min.js"></script>
    <script
        src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <!-- <script src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/php-email-form/validate.js"></script> -->
    <script src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/swiper/swiper-bundle.min.js"></script>
    <script
        src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/1.12.1/jquery.dataTables.min.js" integrity="sha512-MOsicOaJyNWPgwMOE1q4sTPZK6KuUQTMBhkmzb0tFVSRxgx3VnGTwIyRme/IhBJQdWJkfTcIKozchO11ILrmSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.12.1/dataTables.bootstrap5.min.js" integrity="sha512-nfoMMJ2SPcUdaoGdaRVA1XZpBVyDGhKQ/DCedW2k93MTRphPVXgaDoYV1M/AJQLCiw/cl2Nbf9pbISGqIEQRmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


    <!-- Template Main JS File -->
    <script src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dataTable').dataTable({
                'bDestroy': true,
                'processing': true,
                "paging": true,
                "info": false,
                "ordering": false,
                "searching": true,
                'language': {
                    'emptyTable': 'Data tidak tersedia',
                    'info': 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    'infoEmpty': 'Menampilkan 0 sampai 0 dari 0 data',
                    'infoFiltered': '(sorting dari _MAX_ total data)',
                    'lengthMenu': 'Menampilkan _MENU_ data',
                    'zeroRecords': 'Ooops,.. Maaf data yang anda cari tidak ada',
                    'search': '<i class="icofont-search-2 text-xl-center" title="Pencarian"></i> ',
                    'paginate': {
                        'first': 'Awal',
                        'last': 'Akhir',
                        'next': 'Berikutnya',
                        'previous': 'Sebelumnya'
                    }
                },
                'columns': [{
                    className: "text-left"
                },
                {
                    className: "text-left"
                },
                {
                    className: "text-center"

                },
                {
                    className: "text-center"
                }
                ],
                'columnDefs': [{
                    'width': '2%',
                    'targets': 0
                },
                {
                    'width': '10%',
                    'targets': 1
                },
                {
                    'width': '30%',
                    'targets': 2
                },
                {
                    'width': '30%',
                    'targets': 3
                },
                {
                    'width': '30%',
                    'targets': 4
                }
                ]
            });
        });
    </script>
</body>

</html>