<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/x.png" rel="icon">
  <!-- <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
  <!-- <link href="/assets/img/x.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> -->
  <!-- <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->
  <link href="/assets/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <!-- <a href="<?= base_url('admin/login-admin'); ?>" class="logo d-flex align-items-center w-auto"> -->
                <!-- <a href="<?= base_url('admin/login-admin'); ?>" >
                <img src="/assets/img/rsud.png" alt="" style="width:120px;height:120px"> -->
                <!-- <span class="d-none d-lg-block">iT.Solution</span> -->
                </a>
              </div><!-- End Logo -->
              <div class="card mb-2">
                <div class="card-body">
                  <div class="text-center pt-2 align-items-center mb-3">
                    <!-- <a href="<?= base_url('admin/login-admin'); ?>"> -->
                    <img src="/assets/img/55.png" alt="" style="width:230px;height:165px">
                    <!-- <img src="/assets/img/x4.jpg" alt="" style="width:145px;height:145px"> -->
                    <!-- </a> -->
                  </div>
                  <div class="pt-0 pb-1">
                    <!-- <h5 class="card-title text-center pb-0 fs-3">iT SOLUTION</h5> -->
                    <!-- <?= password_hash("super", PASSWORD_DEFAULT) ?> -->
                    <p class="text-center fs-7">Silahkan masukan username & password !</p>
                  </div>
                  <form role="form" action="<?= base_url('admin/cek-login-admin'); ?>" method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required autofocus placeholder="Username">
                        <div class="invalid-feedback">Silahkan masukan username.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password" class="form-control" id="yourPassword" required placeholder="Password">
                        <div class="invalid-feedback">Silahkan masukan password!</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn button-37 w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12 mb-2">
                      <!-- <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p> -->
                    </div>
                  </form>

                </div>
              </div>

              <!-- <div class="credits"> -->
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
              <!-- Designed by <a href="https://kirimke.blogspot.com/">Eagle@Soft</a>
              </div> -->

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="/assets/vendor/chart.js/chart.umd.js"></script> -->
  <!-- <script src="/assets/vendor/echarts/echarts.min.js"></script> -->
  <script src="/assets/vendor/quill/quill.js"></script>
  <!-- <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script> -->
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
  <!-- sweet alert -->
  <script src="/assets/vendor/sweetalert2/sweetalert2.all.js"></script>

</body>

</html>
<script>
  <?php if (session()->getFlashdata('success')) : ?>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: '<?= session()->getFlashdata('success'); ?>',
      timer: 3000,
      showConfirmButton: false
    });
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')) : ?>
    Swal.fire({
      icon: 'error',
      title: 'Gagal Login',
      text: '<?= session()->getFlashdata('error'); ?>',
      timer: 3000,
      showConfirmButton: false
    });
  <?php endif; ?>
</script>