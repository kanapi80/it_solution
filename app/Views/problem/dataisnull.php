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
                      <input type="text" class="form-control form-control-sm fs-7" name="nopen" value="<?= esc($nopen ?? '') ?>" placeholder="Input Nomor Pendaftaran">
                    </div>
                  </div>

                  <div class="col-md-2 mt-3">
                    <button type="button" class="btn btn-success btn-sm fs-7" onclick="updateGrouping()"><i class="bi bi-check-all"></i> Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
  <script>
    function updateGrouping() {
      let nopen = document.querySelector('input[name="nopen"]').value;

      if (!nopen) {
        customSwal.fire({
          icon: "warning",
          title: "Peringatan!",
          text: "Silakan masukkan NOPEN terlebih dahulu.",
          confirmButtonColor: "#f39c12",
          confirmButtonText: "OK"
        });
        return;
      }

      fetch(`<?= base_url('problem/updatedataisnull') ?>?nopen=${nopen}`)
        .then(response => response.json())
        .then(data => {
          if (data.status === "success") {
            customSwal.fire({
              icon: "success",
              title: "Berhasil!",
              text: data.message,
              confirmButtonColor: "#3085d6",
              confirmButtonText: "OK"
            }).then(() => {
              window.location.href = "<?= base_url('problem/getdataisnull') ?>";
            });
          } else {
            customSwal.fire({
              icon: "error",
              title: "Gagal!",
              text: data.message,
              confirmButtonColor: "#d33",
              confirmButtonText: "OK"
            });
          }
        })
        .catch(error => {
          customSwal.fire({
            icon: "error",
            title: "Kesalahan!",
            text: "Terjadi kesalahan saat mengupdate data.",
            confirmButtonColor: "#d33",
            confirmButtonText: "OK"
          });
        });
    }
  </script>

</main><!-- End #main -->

<?= $this->endsection() ?>