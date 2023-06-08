<?php 
    session_start();
    $koneksi = mysqli_connect("localhost","root","","db");
    $id = " ";
    $tanggal  = "";
    $nama_pengadu = "";
    $email_pengadu = "";
    $telpon_pengadu  = "";
    $judul_pengadu  = "";
    $pesan_pengadu  = "";
    if (isset($_POST['kirim'])) {
        $tanggal  = date("Y-m-d H:i:s");
        $nama_pengadu = $_POST['nama_pengadu'];
        $email_pengadu = $_POST['email_pengadu'];
        $telpon_pengadu  = $_POST['telpon_pengadu'];
        $judul_pengadu  = $_POST['judul_pengadu'];
        $pesan_pengadu  = $_POST['pesan_pengadu'];
        if ($tanggal && $nama_pengadu && $email_pengadu && $telpon_pengadu && $judul_pengadu && $pesan_pengadu) {
            $sql1 = "insert into pengaduan(tanggal,nama_pengadu,email_pengadu,telpon_pengadu,judul_pengadu,pesan_pengadu ) values ('$tanggal', '$nama_pengadu', '$email_pengadu', '$telpon_pengadu', '$judul_pengadu', '$pesan_pengadu')";
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
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = " ";
    }
    if($op == 'view'){
        $id  = $_GET ['id'];
        $sql1 = "select from berita where id = '$id'";
        $q1   = mysqli_query($koneksi,$sql1);
        if($q1){
            $sukses = "berhasil hapus data";
        }else{
            $error = "Gagal melakukan hapus data";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pengaduan | Kelurahan Telaga Asih</title>
    <meta content="Website Resmi Kelurahan Telaga Asih" name="description">
    <meta content="Kelurahan Telaga Asih" name="keywords">
    <meta name="author" content="Kelurahan Telaga Asih">
    <meta property="og:type" content="website" />
    <!-- Favicons -->
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets/img/logo.ico" rel="icon">
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <!-- flexslider -->
    <!-- Syntax Highlighter -->
    <!-- <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/css/shCore.css" rel="stylesheet" type="text/css" /> -->
    <link href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/css/shThemeDefault.css" rel="stylesheet" type="text/css" />

    <!-- <link rel="stylesheet" href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/css/demo.css" type="text/css" media="screen" /> -->
    <link rel="stylesheet" href="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/css/flexslider.css" type="text/css" media="screen" />
    <!-- Modernizr -->
    <script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/flexslider/js/modernizr.js"></script>

    <!-- end flexslider -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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
    <link href="style2.css" rel="stylesheet">

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
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
            <?php include_once("navbar2.php"); ?>
            <div class="header-social-links" hidden>
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
            </div>

        </div>
    </header><!-- End Header --><script type="text/javascript">
    var onloadCallback = function() {
        grecaptcha.render('html_element', {
            'sitekey': '6Lfn8-waAAAAANbb0yTkOwpnuOWTZ7HvdvFkjle-'
        });
    };
</script>
<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container" style="margin-top: 25px;">
        <div class="row">
            <!-- utama -->
            <div class="col-sm-8 animate__animated animate__fadeInTopLeft animate__slow 2s">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Pengaduan</h2>
                </div>
                <br>
                <form method="POST" action="">
                                        <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" name="nama_pengadu" placeholder="Nama Anda *" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email_pengadu" placeholder="Email Anda *" required="required" />
                                <small>Alamat email digunakan untuk mengetahui status pengaduan anda</small>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" type="number" name="telpon_pengadu" placeholder="No Telpon Anda *" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" name="judul_pengadu" placeholder="Topik *" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" name="pesan_pengadu" placeholder="Pesan Anda *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="centered text-center">
                        <div id="html_element" style="position: absolute; left: 50%; transform: translate(-50%, -50%);">
                        </div><br> <br>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit" name="kirim">Kirim</button>
                    </div>
                </form>
                <br>
                <br>
            </div>
            <div class="col-sm-4 animate__animated animate__fadeInBottomRight animate__slower 2s">
                <div class="col-sm-12 text-center text-bold text-white " style="background: #0352a5; padding: 15px;">
          
                    <h5>Berita Terkini</h5>
                </div>
                <div class="col-sm-12 border border-gray">
                  <br>
                  <?php
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
                              <a href="?halaman=pengaduan&lihat=post&id=<?php echo $row['id'] ?>" class="list-group-item list-group-item-action flex-column align-items-start">
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
                <br>
                <div class="col-sm-12 text-center text-bold text-white " style="background: #0352a5; padding: 15px;">
                    <h5>Pesan, Kritik dan Saran</h5>
                </div>
                <div class="col-sm-12 border border-gray">
                    <br>
                    <div class="list-group">
                                                    <a href="https://dev.bekasikab.go.id/telagaasih/beranda/read_kritik/20" class="list-group-item list-group-item-action flex-column align-items-start">
                                <small><i class="icofont-user"></i> &lt;marquee&gt;ahaha&lt;/marquee&gt; | <i class="icofont-calendar"></i> 04 May 2023</small>
                                <hr>
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1">&lt;marquee&gt;ahaha&lt;/marquee&gt;</p>
                                </div>

                            </a>
                                                    <a href="https://dev.bekasikab.go.id/telagaasih/beranda/read_kritik/19" class="list-group-item list-group-item-action flex-column align-items-start">
                                <small><i class="icofont-user"></i> Adan | <i class="icofont-calendar"></i> 05 Apr 2023</small>
                                <hr>
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1">Topik</p>
                                </div>

                            </a>
                                                    <a href="https://dev.bekasikab.go.id/telagaasih/beranda/read_kritik/18" class="list-group-item list-group-item-action flex-column align-items-start">
                                <small><i class="icofont-user"></i> Ami | <i class="icofont-calendar"></i> 05 Apr 2023</small>
                                <hr>
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1">Admin</p>
                                </div>

                            </a>
                                            </div>
                    <br>
                </div>
                <div class="col-sm-12">
                    <br>
                    <div id="gpr-kominfo-widget-container"></div>
                </div>
            </div>
        </div>
</section>
<!-- capcay -->
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script>
    function validateRecaptcha() {
        var response = grecaptcha.getResponse();
        if (response.length === 0) {
            $(".capcay-box-msg").html("<span style='color:#b32525;'>Anda belum verifikasi recaptcha!</span>");
            return false;
        } else {
            return true;
        }
    }
</script>
<!-- end capcay --><!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
    <div class="container">
    <div class="row">
    
    <div class="col-md-4 mb-2">
    <p class="font-weight-bold mb-0">Kontak Kami</p>
    <ul class="list-unstyle">
    <li class="q-mb-sm text-muted">
      <i class="fa fa-map-marker"></i> <span>Jl. Telaga Asih (Imam Bonjol 2),</span> <span>Kel. Telaga Asih, Kec Cikarang Barat, </span> <span>Kabupaten Bekasi</span> <span>Jawa Barat</span> <span>17610</span> 
    </li>
    <li class="q-mb-sm">
      
      <a href="mailto:kel_telagaasih@gmail.com"><i class="fa fa-envelope"></i> <span>kel_telagaasih@gmail.com</span></a>
    </li>
    </ul>
    </div>  
    
    </div>
    </div>
    </div>
    <div class="container d-md-flex py-4">
    
    <div class="mr-md-auto text-center text-md-left">
    <div class="copyright">
    &copy; Copyright <strong><span>DISKOMINFOSANTIK KABUPATEN BEKASI</span></strong>. All Rights Reserved
    </div>
    </div>
    </footer><!-- End Footer -->
<a href="#" class="back-to-top animate__animated animate__fadeInDownBig animated__slower"><i class="dropdown-toggle"></i></a>


<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/jquery/jquery.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/php-email-form/validate.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/counterup/counterup.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/venobox/venobox.min.js"></script>
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/vendor/owl.carousel/owl.carousel.min.js"></script>


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
<script src="https://dev.bekasikab.go.id/telagaasih/vendor/assets_lu/js/main.js"></script>

<!-- capcay -->
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

<script>
    // $('#popup').modal('toggle');
   
    $(window).on('load', function() {
        $.ajax({
            url: "https://dev.bekasikab.go.id/telagaasih/beranda/getpopup",
            type: 'POST',
            dataType: 'json',
            data: {
                id: '1'
            },
            success: function(data) {
                $('#mdlimg').html('<img class="w-100" style="max-height:580px;" src="https://dev.bekasikab.go.id/telagaasih/file/images/news_img/' + data.foto_bi + '">');
                $('#mdlbtn').html('<a type="button" class="btn btn-primary" href="https://dev.bekasikab.go.id/telagaasih/beranda/news_img/' + data.img_slug + '">Selengkapnya</a>')

            }
        });

        $('#popup').modal('show');

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
            itemWidth: 210,
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