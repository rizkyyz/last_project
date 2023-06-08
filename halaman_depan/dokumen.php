<?php 
session_start();

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

        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dokumen - Website Resmi Kelurahan Telaga Asih</title>
    <meta content="Website Resmi Kelurahan Telaga Asih" name="description">
    <meta content="Kelurahan Telaga Asih" name="keywords">
    <meta name="author" content="Kelurahan Telaga Asih">
    <meta property="og:type" content="website" />
    <!-- Favicons -->
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets/img/logo.ico" rel="icon">
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- flexslider -->
    <!-- Syntax Highlighter -->
    <!-- <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/css/shCore.css" rel="stylesheet" type="text/css" /> -->
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/css/shThemeDefault.css" rel="stylesheet" type="text/css" />

    <!-- <link rel="stylesheet" href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/css/demo.css" type="text/css" media="screen" /> -->
    <link rel="stylesheet" href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/css/flexslider.css" type="text/css" media="screen" />
    <!-- Modernizr -->
    <!-- <script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/js/modernizr.js"></script> -->

    <!-- end flexslider -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

    <!-- capcay -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">




    <!-- Template Main CSS File -->
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/css/style.css" rel="stylesheet">

    <!-- Bootstrap core JS-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Third party plugin JS-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> -->
    <!-- Vendor JS Files -->


    <!-- =======================================================
  * Template Name: Lumia - v2.2.1
  * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center text-white" style="background-color: #37517e;">
        <div class="container d-flex align-items-center">
            <div class="row mr-auto">
                <img src="https://dev.bekasikab.go.id/telagaasih/vendor/assets/img/logokab70x70.png" style="float: left; max-height: 50px;" alt="">
                <span style="font-weight:bold;margin-top: 10px;"> Kelurahan Telaga Asih</span>
            </div>
            <?php include('navbar2.php'); ?>
            <div class="header-social-links" hidden>
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
            </div>

        </div>
    </header><!-- End Header --><section class="page-section">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap4.min.css" integrity="sha512-4o2NtfcBGIT0SbOTpWLYovl07cIaliKIQpUXvEPvyOgBF/01xY1TXm5F1B+X48/zhhFLIw2oBTsE0rjcwEOwJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <div class="container" style="margin-top: 25px;">
        <div class="row">
            <!-- utama -->

            <div class="col-sm-8 animate__animated animate__fadeInTopLeft animate__slow 2s">
                <div class="text-center">
                    <h2 class="text-uppercase">Dokumen</h2>
                    <hr />
                </div>
                <div class="col-sm-12">
                    <div class="card p-1">
                        <div class="container mb-2 hrt">
                        </div>
                        <div class="card-body">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Dokumen</th>
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
                                      <td><a href ="./dokumen/<?php echo $row['dokumen'];?>"><button class="btn btn-outline-danger"><svg class="bi bi-file-pdf" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16">
                                          <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                          <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                                         </svg></button></a></td>
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
            <!-- widget -->
            <div class="col-sm-4 animate__animated animate__fadeInBottomRight animate__slower 2s">
                <div class="col-sm-12 text-center text-bold text-white " style="background: #007bff; padding: 15px;">
                    <h5>Berita Terkini</h5>
                </div>
                <div class="col-sm-12 border border-gray">
                    <br>
                    <div class="list-group">   <?php
                                            $query = "SELECT * FROM berita ORDER BY id ASC";
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
                             <div class="list-group">
                              <a href="berita.php?op=view&id=<?php echo $row['id'] ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                              <div class="d-flex w-100 justify-content-between">
                                <img class="img img-fluid img-blog" alt="" src="../berita/<?php echo $row['gambar']; ?>" width="100px">
                              </div>
                              <h5 class="mb-1"><?php echo $row['title']; ?></h5>
                                  <small class="text text-xs"><?php echo $row['tanggal']; ?></small><br>
                              <small><i class="icofont-eye-alt"></i> Views: 57 | <i class="icofont-law-document"></i><?=$_SESSION['user_full_name']?></small>
                          </a>
                        </div>
                  <?php
                                                $no++; //untuk nomor urut terus bertambah 1
                                            }

                                            ?>
                    <br>
                </div>
               
                <div class="col-sm-12">
                    <br>
                    <div id="gpr-kominfo-widget-container"></div>
                </div>

            </div>
        </div>
    </div>
    
</section><!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Kelurahan Telaga Asih</h3>
                    <p>
                        Kelurahan Telaga Asih ,Kabupaten Bekasi, Jawa Barat                        <br>
                        <strong>Telepon:</strong> 021<br>
                        <strong>Email:</strong> <br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">

                </div>

                <div class="col-lg-3 col-md-6 footer-links">

                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Lokasi Kami</h4>
                    <iframe src="" width="320" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <!-- <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
    <form action="" method="post">
      <input type="email" name="email"><input type="submit" value="Subscribe">
    </form> -->
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                &copy; Copyright <strong><span>DISKOMINFOSANTIK KABUPATEN BEKASI</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <a href="https://bootstrapmade.com/lumia-bootstrap-business-template/" target="_blank">Modify from</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#!" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#!" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#!" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->
<a href="#" class="back-to-top animate__animated animate__fadeInDownBig animated__slower"><i class="icofont-simple-up"></i></a>


<!-- <script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/jquery/jquery.min.js"></script> -->
<!-- <script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/php-email-form/validate.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/counterup/counterup.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/venobox/venobox.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/owl.carousel/owl.carousel.min.js"></script> -->


<!-- FlexSlider -->
<script defer src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/js/jquery.flexslider.js"></script>
<!-- Syntax Highlighter -->
<script type="text/javascript" src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/js/shCore.js"></script>
<script type="text/javascript" src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/js/shBrushXml.js"></script>
<script type="text/javascript" src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/js/shBrushJScript.js"></script>

<!-- Optional FlexSlider Additions -->
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/js/jquery.easing.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/js/jquery.mousewheel.js"></script>
<script defer src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/js/demo.js"></script>

<!-- info kopid -->
<script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>

<!-- Template Main JS File -->
<!-- <script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/js/main.js"></script> -->


<script>
    // $('#popup').modal('toggle');

    $(window).on('load', function() {
        // flexslider
        $(function() {
            SyntaxHighlighter.all();
        });

        $('#carouselfx').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: true,
            slideshow: false,
            mousewheel: true,
            itemMargin: 2,
            asNavFor: '#sliderfx'
        });

        $('#sliderfx').flexslider({
            animation: "slide",
            controlNav: true,
            animationLoop: true,
            slideshow: true,
            mousewheel: false,
            sync: "#carouselfx",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });

        $('.carousel').carousel({
            touch: true,
            keyboard: true,
            pause: false
        });

        // capcay
    });
</script>
</body>

</html>
