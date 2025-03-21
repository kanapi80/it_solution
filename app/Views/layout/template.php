<?php if (session()->get('Ses_IdAdmin') == "" || session()->get('Ses_NamaAdmin') == "" || session()->get('Ses_Level') == "" || session()->get('Ses_Tupoksi') == "" || session()->get('Ses_Pejuang') == "" || session()->get('Ses_Ruangan') == "") : ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      customSwal.fire({
        icon: 'error',
        title: 'Anda Sudah Logout!',
        text: 'Silakan login kembali untuk melanjutkan.',
        timer: 800,
        showConfirmButton: false
      }).then(function() {
        document.location = "<?= base_url('admin/login-admin'); ?>";
      });
    });
  </script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>IT.Solution</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/favicon.png'); ?>">
  <link href="/assets/img/x.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="/assets/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">
  <link href="/assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css" rel="stylesheet">
  <link href="/assets/vendor/select2/css/select2.min.css" rel="stylesheet">
  <link href="/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <style>
    .se-pre-con {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url('/assets/img/loading.gif') center no-repeat #fff;
      /* Sesuaikan path */
    }
  </style>
  <script>
    $(window).on("load", function() {
      $(".se-pre-con").fadeOut("slow"); // Hilangkan preloader setelah halaman selesai dimuat
    });
  </script>

</head>

<body>
  <div class="se-pre-con"></div>
  <!-- ======= Header ======= -->
  <!-- <header id="header" class="header fixed-top d-flex align-items-center"> -->
  <!-- <header id="header" class="header fixed-top d-flex align-items-center bg-success"> -->
  <header id="header" class="header fixed-top d-flex align-items-center back-header">
    <!-- <header id="header" class="header ignielPelangi fixed-top d-flex align-items-center"> -->
    <div class="d-flex align-items-center justify-content-between">
      <!-- <a href="<?= base_url('admin/dashboard-admin'); ?>" class="logo d-flex align-items-center"> DEFAULT -->
      <a class="logo d-flex align-items-center">
        <img src="/assets/img/kunci2.png" alt="" style="height: 55px;">
        <!-- <span class="d-none d-lg-block text-white">iTRSUD</span> -->
        <span class="d-none d-lg-block text-white"> <img src="/assets/img/rs.png" alt="" style="height: 33px;"></span>
        <i class="bi bi-list toggle-sidebar-btn" style="color:white; font-size: 28px;font-weight: bold;"></i>
      </a>
    </div>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          </ul>

        </li>

        <li class="nav-item dropdown">
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          </ul>
        </li>

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-2" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2 fs-7 text-white pe-2"><?= session('Ses_NamaAdmin'); ?></span>
            <span>

              <?php if (session('Ses_Foto')) : ?>
                <?php $fotoPath = base_url('uploads/' . session('Ses_Foto')); ?>
                <img src="<?= $fotoPath ?>" alt="Foto" class="rounded-circle" style="width: 40px; height: 50px;">
              <?php else : ?>
                <img src="/assets/img/avatar.jpg" alt="Profile" class="rounded-circle">
              <?php endif; ?>

          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= session('Ses_NamaAdmin'); ?></h6>
              <span><?= session('Ses_Tupoksi'); ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <button class="dropdown-item d-flex align-items-center" onclick="confirmLogout()">
                <i class="bi bi-box-arrow-right"></i>Sign Out</button>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <script>
    function confirmLogout() {
      customSwal.fire({
        title: <?= json_encode(session('Ses_NamaAdmin')) ?>,
        text: "Kamu Yakin Ingin Keluar !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Keluar!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '<?= base_url('admin/logout-admin'); ?>';
        }
      });
    }
  </script>
  <?= $this->include('layout/sidebar.php'); ?>
  <?= $this->renderSection('content'); ?>
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright Template <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Development by <a href="https://kirimke.blogspot.com/" target="_blank">Eagle@Soft</a>
    </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/server/jquery.dataTables.js"></script>
  <script src="/assets/js/main.js"></script>
  <script src="/assets/vendor/sweetalert2/sweetalert2.all.js"></script>
  <script src="/assets/vendor/select2/js/select2.full.min.js"></script>
  <script src="<?= base_url('assets/js/custom-swal.js') ?>"></script>
</body>

</html>