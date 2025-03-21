<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">KUNJUNGAN PASIEN BPJS RAWAT INAP</h6>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Kunjungan</li>
        <li class="breadcrumb-item active fw-bold">Rawat Inap</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" style="border-top:3px solid #0F998D; border-bottom:5px solid #72C2BA;border-radius: 2px">
          <div class="card-body card-body-sm mt-4">
            <form method="get" action="<?= base_url('jkn/listpasienranap'); ?>">
              <?= csrf_field() ?>
              <div class="row mb-4">
                <div class="col-12 col-sm-6 mb-2">
                  <input type="text" class="form-control" id="id" name="id" value="<?= esc($id) ?>" autofocus placeholder="Input Nomor SEP" required="required">
                </div>
                <div class="col-12 col-sm-2">
                  <button type="submit" class="btn btn-success  <?php echo (!$results) ? '' : 'w-100'; ?>">
                    <i class="bx bxs-search"></i> Cari
                  </button>
                </div>
              </div>
            </form>

            <?php if (empty($results)) : ?>
              <div class="alert alert-success" role="alert">
                <i class="bx bx-error-circle"></i> Data Tidak Ditemukan
              </div>
            <?php else : ?>
          </div>
        </div>
      </div>
    </div>

  </section>
  <section class="section">
    <div class="row">
      <?php if (!empty($results)) : ?>
        <?php foreach ($results as $row) : ?>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card text-dark bg-light mb-3">
              <div class="card-header">
                <i class="bi bi-grid-fill" style="color:green"></i>
                <b><?php echo strtoupper($row['DESKRIPSI']); ?></b> |
                <?php
                  $date = new DateTime($row['MASUK']);
                  echo $date->format('d-m-Y');
                ?> <span class="badge bg-primary"> <?php echo $row['NORM']; ?> </span>
                <?php echo $row['NAMA']; ?>
              </div>
              <div class="card-body">
                <div class="col-12">
                  <br>
                  <button class="btn btn-outline-success btn-sm w-100 mb-2" data-bs-toggle="modal" data-bs-target="#uploadModal<?php echo $row['NOSEP']; ?>" data-nosep="<?php echo $row['NOSEP']; ?>" title="Upload Gambar" data-bs-toggle="tooltip">
                    <i class="bi bi-upload"></i> Upload
                  </button>
                  <button class="btn btn-success btn-sm w-100" onclick="window.open('<?= base_url('jkn/pdfbpjsranap?id=' . urlencode($row['NOPEN']) . '&notag=' . urlencode($row['TAGIHAN']) . '&lab1=' . urlencode($row['KEYLAB1']) . '&lab2=' . urlencode($row['KEYLAB2']) . '&idr=' . urlencode($row['KEYRAD']) . '&no_SEP=' . urlencode($row['NOSEP']) . '&cppt1=' . urlencode($row['NOPEN']) . '&cppt2=' . urlencode($row['NOMOR']) . '&no_spri=' . urlencode($row['NO_SPRI']) . '&nokun=' . urlencode($row['NOMOR']) . '&lab3=' . urlencode($row['KEYLAB3']) . '&lab4=' . urlencode($row['KEYLAB4']) . '&kd_kelas=' . urlencode($row['kdKelas'])); ?>', '_blank')">
                    <i class="bi bi-download"></i> Download
                  </button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <div class="alert alert-warning">Tidak ada hasil ditemukan.</div>
      <?php endif; ?>
    </div>
  </section>

  <!-- END DASHBOARD -->

  <!-- MODAL -->
  <div class="modal fade" id="uploadModal<?php echo $row['NOSEP']; ?>" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h6 class="modal-title fw-bold">UPLOAD PENUNJANG</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('jkn/image-upload/upload') ?>" method="post" enctype="multipart/form-data">
            <?php if (session('pesan')): ?>
              <div class="alert alert-success"><?= session('pesan') ?></div>
            <?php endif; ?>
            <div class="mb-3">
              <label for="nosep" class="form-label">Nomor SEP</label>
              <input type="text" class="form-control form-control-sm fw-bold" id="nosepInput<?php echo $row['NOSEP']; ?>" name="nosep" readonly>
              <input type="text" class="form-control form-control-sm fw-bold" name="ranap" value="1" readonly>
            </div>
            <div class="mb-3">
              <label for="images" class="form-label">Pilih Gambar</label>
              <input type="file" class="form-control form-control-sm" name="gambar[]" multiple required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-upload"></i> Upload</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL -->


  </section>

  <!-- PENUNJANG -->
  <?php if (!empty($penunjang)) : ?>
    <div class="card text-dark bg-light mb-3 col-xxl-12 col-md-6">
      <div class="card-header"><i class="bi bi-image-fill" style="color:blue"></i> DOKUMEN PENUNJANG</div>
      <div class="card-body"><br>
        <?php foreach ($penunjang as $row) : ?>
          <?php $imagePath = base_url('uploads/' . $row['image']); ?>
          <div style="position: relative; display: inline-block; padding-left: 5px; padding-right: 5px;">
            <a href="<?= $imagePath; ?>" target="_blank"> <img src="<?= $imagePath; ?>" alt="Gambar" class="rounded p-0" width="100px" height="50px"></a>
            <button style="position: absolute;top: 3px; right: 3px; cursor: pointer;" onclick="hapusGambar('<?= $row['image']; ?>', <?= $row['id']; ?>)" class="btn btn-outline-danger btn-sm" title="Hapus" data-bs-target="bottom" data-bs-toggle="tooltip"><i class="bi bi-trash"></i></button>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- END PENUNJANG -->
  <?php endif; ?>
<?php endif; ?>


</section>
</main><!-- End #main -->

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
      button.addEventListener('click', function() {
        const noSep = this.getAttribute('data-nosep');
        console.log("NOSEP yang diambil:", noSep);
        const modalId = this.getAttribute('data-bs-target');
        const inputField = document.querySelector(modalId + ' input[name="nosep"]');
        if (inputField) {
          inputField.value = noSep;
          console.log("Input field diisi dengan:", noSep);
        } else {
          console.log("Input field tidak ditemukan.");
        }
      });
    });
  });

  function hapusGambar(imageName, id) {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Gambar yang dihapus tidak bisa kembali",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        const xhr = new XMLHttpRequest();
        const url = '<?= base_url('jkn/image-hapus/') ?>' + id;

        xhr.open("POST", url, true);
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4) {
            const response = JSON.parse(xhr.responseText);
            if (xhr.status === 200) {
              Swal.fire({
                title: 'Deleted!',
                text: response.message,
                icon: 'success',
                confirmButtonText: 'OK'
              }).then(() => {
                location.reload();
              });
            } else {
              Swal.fire({
                title: 'Error!',
                text: response.message,
                icon: 'error',
                confirmButtonText: 'OK'
              });
            }
          }
        };
        xhr.send();
      }
    });
  }
</script>

<?= $this->endsection() ?>