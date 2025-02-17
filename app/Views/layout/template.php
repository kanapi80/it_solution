<!-- <?php
      if (session()->get('Ses_IdAdmin') == "" or session('Ses_NamaAdmin') == "" or session('Ses_Level') == "" or session('Ses_Tupoksi') == "") {
      ?>
<script>
alert("Anda Sudah Logout !");
document.location = "<?= base_url('admin/login-admin'); ?>";
</script>
<?php
      }
?> -->

<?php if (session()->get('Ses_IdAdmin') == "" || session()->get('Ses_NamaAdmin') == "" || session()->get('Ses_Level') == "" || session()->get('Ses_Tupoksi') == "") : ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'error',
        title: 'Anda Sudah Logout!',
        text: 'Silakan login kembali untuk melanjutkan.',
        timer: 800, // Durasi tampilan pesan dalam milidetik
        showConfirmButton: false // Tidak menampilkan tombol OK
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
  <!-- Vendor CSS Files -->
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

  <!-- sweet alert -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"> -->

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <!-- server side css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

  <!-- <link href="/node_modules/datatables.net-dt/css/dataTables.dataTables.css" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" type="text/css" href="/node_modules/datatables.net-dt/css/dataTables.dataTables.css"> -->


  <!-- Server Side DataTable -->
  <!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/vendor/server/jquery.dataTables.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css"> -->
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script> -->
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>


<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <!-- <header id="header" class="header ignielPelangi fixed-top d-flex align-items-center"> -->

    <div class="d-flex align-items-center justify-content-between">
      <!-- <a href="<?= base_url('admin/dashboard-admin'); ?>" class="logo d-flex align-items-center"> DEFAULT -->
      <a class="logo d-flex align-items-center">
        <!-- <a class="d-flex align-items-center"> -->
        <!-- <img src="/assets/img/x4.jpg" alt=""> -->
        <img src="/assets/img/x3.png" alt="" style="height: 60px;">
        <!-- <img src="/assets/img/55.png" alt="" width="130px" height="60px"> -->
        <span class="d-none d-lg-block">iTRSUD</span>
        <i class="bi bi-three-dots-vertical toggle-sidebar-btn" style="color:black; font-size: 24px;"></i>

        <!-- <div class="search-bar">
          <form class="search-form d-flex align-items-center" method="POST" action="<?= base_url('jkn/listpasien'); ?>">
            <input type="text" id="id" name="id" placeholder="Cari" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
          </form>
        </div> -->
      </a>

    </div>
    <!-- End Logo -->


    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <!-- End Search Icon-->

        <li class="nav-item dropdown">

          <!-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">1</span>
          </a> -->
          <!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <!-- <li class="dropdown-header">
              <?= session('Ses_NamaAdmin'); ?> 1 Notifikasi baru
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Timeline Pencairan Jasa</h4>
                <p>BPJS dan Jasa Umum</p>
                <p>BPJS Bulan April dan Jasum Bulan Juli 2024</p>
              </div>
            </li>
 <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li> -->

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <!-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">1</span>
          </a> -->
          <!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <!-- <li class="dropdown-header">
              <?= session('Ses_NamaAdmin'); ?> 1 Pesan baru
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>TARGET BPJS </h4>
                  <p>Target Pencairan On track</p>
                  <p></p>
                </div>
              </a>
            </li>  -->
            <!-- <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li> -->

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

            <?php if (session('Ses_Foto')) : ?>
              <?php $fotoPath = base_url('uploads/' . session('Ses_Foto')); ?>
              <img src="<?= $fotoPath ?>" alt="Foto" class="rounded-circle" style="width: 40px; height: 50px;">
              <!-- <?php echo $fotoPath; // Tambahkan ini untuk debug 
                    ?> -->
            <?php else : ?>
              <!-- <span>No Photo</span> -->
              <img src="/assets/img/avatar.jpg" alt="Profile" class="rounded-circle">
            <?php endif; ?>
            <!-- <img src="/assets/img/avatar.jpg" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2 fs-7"><?= session('Ses_NamaAdmin'); ?>
            </span>
            <span><?php session('Ses_Tupoksi'); ?></span>

          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= session('Ses_NamaAdmin'); ?></h6>
              <span><?= session('Ses_Tupoksi'); ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <!-- PROFILE -->
            <li>
              <button class="dropdown-item d-flex align-items-center" onclick="confirmLogout()">

                <i class="bi bi-box-arrow-right"></i>Sign Out</button>

            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <script>
    function confirmLogout() {
      Swal.fire({
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

  <!-- SIDEBAR -->
  <?= $this->include('layout/sidebar.php'); ?>

  <!-- CONTENT  -->


  <?= $this->renderSection('content'); ?>


  <!-- FOOTER -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright Template <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Development by <a href="https://kirimke.blogspot.com/" target="_blank">Eagle@Soft</a>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <script src="/assets/vendor/server/jquery.dataTables.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

  <!-- sweet alert -->
  <script src="/assets/vendor/sweetalert2/sweetalert2.all.js"></script>
  <!-- Select  -->
  <script src="/assets/vendor/select2/js/select2.full.min.js"></script>

</body>

</html>