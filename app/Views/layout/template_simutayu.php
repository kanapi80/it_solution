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

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <!-- server side css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">



  <!-- Server Side DataTable -->

  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

</head>


<body>



  <header id="header" class="header fixed-top d-flex align-items-center bg-success py-0">
    <div class="container-fluid d-flex justify-content-between">
      <!-- Logo atau Menu -->
      <a class="logo d-flex align-items-center">
        <img src="/assets/img/x6.png" alt="">
        <div class="search-bar text-white">
          <span class="d-none d-lg-block text-white fs-6"> Pengisian Indikator <?= esc($nama_jenis) ?> </span>
          <span class="d-none d-lg-block text-white" style="font-size: smaller; letter-spacing: 0.1em;">Unit : <?php echo (session('Ses_UserName')); ?></span>
          <!-- <span class="d-none d-lg-block text-white" style="font-size: x-small;">No.Pendaftaran : <?php echo strtoupper(esc($unit_id)); ?></span> -->
        </div>
      </a>
      <!-- Nama di tengah saat mode HP -->
      <div class="d-block d-lg-none text-center flex-grow-1">
        <div class="text-white fw-bold  mt-2">
          <h6 class="fw-bold">Indikator <?= esc($nama_jenis) ?> </h6>
        </div>
        <div class="text-white fw-bold fs-sm">
          <h6><?php echo (session('Ses_UserName')); ?></h6>
        </div>
      </div>
      <!-- Info tambahan atau menu di kanan -->
      <div class="d-flex align-items-center">
        <button class="btn btn-danger btn-sm rounded-0 fw-bold" onclick="closeTab()"> x </button>
      </div>
    </div>
  </header>

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
  <?php /*$this->include('layout/pasien.php');*/ ?>

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
<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.body.classList.add("toggle-sidebar");
  });

  function closeTab() {
    window.close();
  }
</script>