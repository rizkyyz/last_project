<?php 
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
      }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Galeri | Kelurahan Telaga Asih </title>
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
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <br>
        <h2>Galery</h2>
        <p>Foto Kegiatan Kelurahan Telaga Asih
        </p>
      </div>
      <div class="row portfolio-container justify-content-center" data-aos="fade-up" data-aos-delay="200">
      <?php 
                               
                               $batas = 12;
                               $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                               $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
                        
                               $previous = $halaman - 1;
                               $next = $halaman + 1;
                               
                               $data = mysqli_query($koneksi,"select * from galery");
                               $jumlah_data = mysqli_num_rows($data);
                               $total_halaman = ceil($jumlah_data / $batas);
                        
                               $data_pegawai = mysqli_query($koneksi,"select * from galery limit $halaman_awal, $batas");
                               $nomor = $halaman_awal+1;
                               while($d = mysqli_fetch_array($data_pegawai)){
                                 ?>
        <div class="col-md-3 mb-3 portfolio-item filter-card">
          <div class="portfolio-img"><img src="../foto/<?php echo $d['foto']?>" class="img-fluid" alt=""></div>
        </div>
        <?php          
}
        ?>
      </div>
      <nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>        
    </div>
  </section><!-- End Portfolio Section -->
  <!-- End Portfolio Section -->

   <!-- ======= Footer ======= -->
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
    </footer>
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
</html><!-- End Footer -->
  <!-- End Footer -->