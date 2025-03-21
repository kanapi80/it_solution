<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - ITsolution</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <link href="/assets/css/logstyle.css" rel="stylesheet">
</head>

<body>
  <div class="login-container">
    <div class="info-card">
      <img src="/assets/img/kunci2.png" alt="" style="width:100px;height:100px">
      <h5 class="fw-bold">RSUD INDRAMAYU</h5>
      <a style="font-size: 11px;">Jl. Murah Nara No 7 Indramayu</a>
      <a style="font-size: 11px;">📞 0234272655 📠 0234272655</a>
      <a style="font-size: 11px;">✉️ rsudindramayukab@gmail.com</a>
      <a style="font-size: 11px;">🌐 rsud.indramayukab.go.id</a>
    </div>
    <div class="login-card">
      <div class="card-body">
        <div class="text-center pt-0 align-items-center mb-0 mt-2">
          <img src="/assets/img/its.png" alt="" style="width:170px;height:125px" class="fade-in-scale">
        </div>

        <div class="pt-0 pb-0">
          <!-- <h5 class="card-title text-center pb-0 fs-3">iT SOLUTION</h5> -->
          <!-- <?= password_hash("bangkit", PASSWORD_DEFAULT) ?> -->
          <!-- <p class="text-center fs-7">Silahkan Login !</p> -->
          <h2 class="login-title">Silahkan Login !</h2>

        </div>
        <form role="form" action="<?= base_url('admin/cek-login-admin'); ?>" method="post" class="row g-3 needs-validation" novalidate>
          <div class="col-12">
            <!-- <label for="yourUsername" class="form-label">Username</label> -->
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend">@</span>
              <input type="text" name="username" class="form-control form-control sm" id="yourUsername" required autofocus placeholder="Username" value="<?= old('username'); ?>">
              <div class="invalid-feedback">Silahkan masukan username.</div>
            </div>
          </div>
          <div class="col-12">
            <!-- <label for="yourPassword" class="form-label">Password</label> -->
            <div class="input-group has-validation">
              <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
              <input type="password" name="password" class="form-control form-control sm" id="yourPassword" required placeholder="Password">
              <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                <i class="bi bi-eye-fill fw-bold"></i>
              </button>
              <div class="invalid-feedback">Silahkan masukan password!</div>
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-success w-100  btn-sm" type="submit">Login</button>
          </div>


          <div class="col-12 mb-0 text-secondary" style="font-size: 9px;">
            Versi 2.2025.03.06 | Eagle@Soft
          </div>
      </div>
      </form>
    </div>
    <!-- Vendor JS Files -->
    <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/quill/quill.js"></script>
    <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    <!-- sweet alert -->
    <script src="/assets/vendor/sweetalert2/sweetalert2.all.js"></script>
    <!-- Custon Sweet Alert  -->
    <script src="<?= base_url('assets/js/custom-swal.js') ?>"></script>

    <!-- <script>
      // Ambil tanggal hari ini
      const today = new Date().getDate();

      // Cek apakah tanggal ganjil atau genap, lalu atur background
      if (today % 2 === 0) {
        document.body.style.backgroundImage = "url('/assets/img/1.jpg')";
      } else {
        document.body.style.backgroundImage = "url('/assets/img/x1.jpg')";
      }
    </script> -->
</body>

</html>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    <?php if (session()->getFlashdata('success')) : ?>
      customSwal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '<?= session()->getFlashdata('success'); ?>',
        timer: 3000,
        showConfirmButton: false
      });
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
      customSwal.fire({
        icon: 'error',
        title: 'Gagal Login',
        text: '<?= session()->getFlashdata('error'); ?>',
        confirmButtonColor: '#d33'
      });
    <?php endif; ?>
  });

  // Toggle Password Visibility
  document.getElementById("togglePassword").addEventListener("click", function() {
    var passwordField = document.getElementById("yourPassword");
    var icon = this.querySelector("i");

    if (passwordField.type === "password") {
      passwordField.type = "text";
      icon.classList.remove("bi-eye");
      icon.classList.add("bi-eye-slash");
    } else {
      passwordField.type = "password";
      icon.classList.remove("bi-eye-slash");
      icon.classList.add("bi-eye");
    }
  });
  $(document).ready(function() {
    $('img').addClass('fade-in-scale');
  });
</script>