<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "db");
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email']))

    $id = "";
$title = "";
$gambar = "";
$halaman = "";
$tanggal = "";
$sukses = "";
$error = "";
$koneksi = mysqli_connect("localhost", "root", "", "db");

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

<?php include_once("head.php"); ?>

<body>
<?php include_once("navbar.php"); ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Kelurahan Telaga Asih</h1>
          <blockquote class="blockquote text-white font-weight-bold">
            <p>Selamat datang di website resmi Kelurahan Telaga Asih Kabupaten Bekasi</p>
          </blockquote>
          <!--<figcaption class="blockquote-footer text-white font-weight-bold">
            OK <cite title="Source Title">(Optimalisasi Kinerja)</cite>
          </figcaption>-->
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#why-us" class="btn-get-started scrollto">Lihat Layanan</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img text-center" data-aos="zoom-in-up" data-aos-delay="100">
          <!-- <img src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/img/hero-img.png" class="img-fluid animated" alt=""> -->
          <img src="https://dev.bekasikab.go.id/telagaasih/vendor/assets/img/1.png" class="" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Cliens Section ======= -->
    <section id="cliens" class="cliens section-bg">
      <div class="container">
      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="visi" class="about">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>VISI MISI</h2>
          </div>
  
          <div class="row content">
            <div class="col-lg-6">
              <p  style="text-align: center; font-weight: bold;">
               VISI
              </p>
              <ul>
                <li style="text-align: center;"></i>Mewujudkan Pelayanan Profesional Masyarakat Religus dan Sejahtera.</li>
              </ul>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p style="text-align: center;  font-weight: bold;">
                MISI
              </p>
              <ul>
                <li></i>Meningkatkan Kuliatas SDM Masyarakat dan Aparatur Religus<br>Memberdayakan dan Mengembangkan Ekonomi Kerakyatan.<br>Masyarakat yang Mandiri dan Sejahtera.</li>
              </ul>
            </div>
          </div>
  
        </div>
      </section><!-- End About Us Section -->
    <!-- ======= Why Us Section ======= --> 
</div>
</div>
    </section><!-- End Why Us Section -->
    <!-- ======= Services Section ======= -->
    <section class="oe_structure" id="portfolio">
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                  <div class="p-3 mb-2 bg-light">
                    <h3 style="text-align: center;"><strong>Berita Terkini</strong></h3>
                  </div>
                  <div class="row"> <?php
                                       $batas = 6;
                                       $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                       $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
                                
                                       $previous = $halaman - 1;
                                       $next = $halaman + 1;
                                       
                                       $data = mysqli_query($koneksi,"select * from berita");
                                       $jumlah_data = mysqli_num_rows($data);
                                       $total_halaman = ceil($jumlah_data / $batas);
                                
                                       $data_pegawai = mysqli_query($koneksi,"select * from berita limit $halaman_awal, $batas");
                                       $nomor = $halaman_awal+1;
                                       while($d = mysqli_fetch_array($data_pegawai)){
                                         ?>
                                              
                           
                              <div class="mb-3 col-md-4">
                                  <a class="stretched-link" href="">
                                      <img class="img img-fluid img-blog" alt="" src="../berita/<?php echo $d['gambar']; ?>"/>
                                      <h5 class="mt-3"><span><?php echo $d['title']?></span></h5>
                                  </a>
                                  <p><?php echo $d['halaman']?></p>
                                  <p class="text-muted"><span>8 May 2023</span></p>
                              </div>
                              <?php
                                            }

                                            ?> 
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
              </div>
              <div class="col-md">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-2 bg-info">
                            <h5 class="section-heading mb-0 text-center text-dark">Pengumuman</h5>
                        </div>
                        <div class="bg-light">
                            <ul class="list-unstyled pl-2">
                                
                                    <li class="mb-3 "><br>
                                      <P style="text-align: center;"> <span>Teruntuk Pedagang Kaki Lima, kami minta kesadaran para pedagang untuk tidak membuang sampah di pinggir jalan ataupun saluran air, sebab itu bukan TPS.</span>
                                      </P>
                                        <a href="/blog/our-blog-1/post/teruntuk-pedagang-kaki-lima-kami-minta-kesadaran-para-pedagang-untuk-tidak-membuang-sampah-di-pinggir-jalan-ataupun-saluran-air-sebab-itu-bukan-tps-14">Selengkapnya
                                          .....</a>
                                        <br/>
                                        <p class="text-muted"><span>8 Mei 2023</span></p>
                                    </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="p-2 bg-info">
                            <h5 class="section-heading mb-0 text-center text-dark">Agenda</h5>
                        </div>
                        <div class="bg-light">
                            <ul class="list-unstyled pl-2">
                                
                                    <li class="mb-3"><br>
                                      <P style="text-align: center;"> <span>Teruntuk Pedagang Kaki Lima, kami minta kesadaran para pedagang untuk tidak membuang sampah di pinggir jalan ataupun saluran air, sebab itu bukan TPS.</span>
                                      </P>
                                        <a href="/blog/our-blog-1/post/teruntuk-pedagang-kaki-lima-kami-minta-kesadaran-para-pedagang-untuk-tidak-membuang-sampah-di-pinggir-jalan-ataupun-saluran-air-sebab-itu-bukan-tps-14">Selengkapnya
                                         ...... </a>
                                        <br/>
                                        <p class="text-muted"><span>8 Mei 2023</span></p>
                                    </li>
                                
                            </ul>
                        </div>
                  </div>
              </div>

              </div>
      </div>
  </section>
  </main><!-- End #main -->
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
    <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="dropdown-toggle"></i></a>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <!-- <script src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/php-email-form/validate.js"></script> -->
  <script src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/1.12.1/jquery.dataTables.min.js" integrity="sha512-MOsicOaJyNWPgwMOE1q4sTPZK6KuUQTMBhkmzb0tFVSRxgx3VnGTwIyRme/IhBJQdWJkfTcIKozchO11ILrmSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.12.1/dataTables.bootstrap5.min.js" integrity="sha512-nfoMMJ2SPcUdaoGdaRVA1XZpBVyDGhKQ/DCedW2k93MTRphPVXgaDoYV1M/AJQLCiw/cl2Nbf9pbISGqIEQRmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


  <!-- Template Main JS File -->
  <script src="https://dev.bekasikab.go.id/telagaasih/assets/arsha/js/main.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
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