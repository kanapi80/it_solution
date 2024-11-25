<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">KUNJUNGAN PASIEN BPJS RAWAT JALAN</h6>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Merge</li>
        <li class="breadcrumb-item active fw-bold">Rawat Jalan</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" style="border-top:3px solid #adb5bd; border-radius: 10px">
          <div class="card-body card-body-sm mt-2">
            <h5 class="card-title">Menggabungkan File PDF dan Gambar (JPEG, JPG, PNG, BMP)</h5>
            <form action="<?= site_url('jkn/merge-pdf') ?>" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nosep" class="form-label">Nomor SEP</label>
                <input type="text" name="nomor" class="form-control">
              </div>
              <div class="mb-3">
                <label for="nosep" class="form-label">Pilih File PDF dan Gambar (JPEG, JPG, PNG, BPM)</label>
                <input class="form-control" type="file" name="files[]" multiple accept="application/pdf, image/jpeg, image/png" required>
              </div> <br>
              <button type="submit" class="btn btn-primary btn-sm">Merge Files</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>
</main>

<?= $this->endsection() ?>