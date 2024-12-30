<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">DATA IS NULL</h6>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">PROBLEM</li>
        <li class="breadcrumb-item active">Data Is Null</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body fs-6 text">
            <div class="mb-3">
              <form action="<?= base_url('problem/updatedataisnull') ?>" method="get">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group mt-3">
                      <input type="text" class="form-control form-control-sm fs-7" name="nopen" value="<?= esc($nopen ?? '') ?>">
                    </div>
                  </div>

                  <div class="col-md-2 mt-3">
                    <button type="submit" class="btn btn-success btn-sm fs-7">
                      <i class="bx bxs-search"></i> Cari
                    </button>
                  </div>
                </div>
              </form>
            </div>

            <!-- Flash message container -->
            <div class="container mt-4">
              <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-<?= session()->getFlashdata('message_type') == 'success' ? 'success' : 'danger'; ?>">
                  <?= esc(session()->getFlashdata('message')); ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
  </section>

</main><!-- End #main -->

<?= $this->endsection() ?>

<script>
  <?php if (session()->getFlashdata('message')) : ?>
    Swal.fire({
      icon: '<?= session()->getFlashdata('message_type') == 'success' ? 'success' : 'error'; ?>',
      title: '<?= session()->getFlashdata('message_type') == 'success' ? 'Success' : 'Error'; ?>',
      text: '<?= session()->getFlashdata('message'); ?>',
      timer: 3000,
      showConfirmButton: false
    });
  <?php endif; ?>
</script>