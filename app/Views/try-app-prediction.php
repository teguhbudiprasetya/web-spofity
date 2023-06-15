<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Spofity</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/icon.png')?>" rel="icon">
  <link href="<?= base_url('assets/img/icon.png')?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/aos/aos.css')?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css')?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css')?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css')?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css')?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url('assets/css/apps.css')?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Gp
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="/">Spofity<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="/try-app/prediction">Prediksi</a></li>
          <li><a class="nav-link scrollto" href="/try-app/bmi">BMI</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <!-- <a href="#about" class="get-started-btn scrollto">Coba fitur</a> -->

    </div>
  </header><!-- End Header -->

  <main id="main" class="p-2 p-xs-5 p-xs-5 d-flex justify-content-center">
    <section id="prediction" class="prediction p-sm-5 w-100">
        <div class="container rounded mb-4 shadow p-xs-5" data-aos="fade-up">

            <div class="row no-gutters p-5">
                <div class="col-xl-12 ps-4 ps-lg-10 pe-4 pe-lg-1 d-flex align-items-stretch justify-content-center">
                    <div class="content d-flex flex-column text-center">
                        <h3 class="fw-bold mb-4">Prediksi Alat Gym</h3>
                        <div class="row d-flex align-items-stretch justify-content-center">
                            <div class="col-11 boxes rounded bg-transparent">
                                <form class="" action="/try-app/prediction" method="POST" enctype="multipart/form-data">
                                    <input type="file" class="form-control" name="file" id="file">
                                    <br><br>
                                    <input class="form-control" type="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>
        </div>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
            <div class="container cont-result rounded shadow p-1 p-sm-3" data-aos="fade-up">

                <div class="row no-gutters">
                    <div class="col-xl-12 ps-4 ps-lg-10 pe-4 pe-lg-1 d-flex align-items-stretch" data-aos="fade-left" data-aos-delay="10">
                        <div class="content d-flex flex-column text-dark">
                            <h5 class="fw-bold"><?=$namaAlat?></h5>
                            <i class="">Confident : <?=$akurasi?></i>
                            <i class="">Time : <?=$waktuPrediksi?></i>
                            <div class="row d-flex align-items-stretch  mt-4 ">
                                <h5 class="fw-bold">Cara pemakaian</h5>
                                <ol class="ps-4 ps-sm-5">
                                    <?php foreach ($guide as $g) : ?>
                                        <li><?=$g?></li>
                                    <?php endforeach;?>
                                </ol>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>
            </div>
        <?php endif?>
    </section><!-- End Counts Section -->
  </main>


  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/vendor/purecounter/purecounter_vanilla.js')?>"></script>
  <script src="<?= base_url('assets/vendor/aos/aos.js')?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js')?>"></script>
  <script src="<?= base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js')?>"></script>
  <script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js')?>"></script>
  <script src="<?= base_url('assets/vendor/php-email-form/validate.js')?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/js/main.js')?>"></script>

</body>

</html>