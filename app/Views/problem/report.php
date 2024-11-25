<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">REPORT RADIOLOGI</h6>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Problem</li>
        <li class="breadcrumb-item active">Laporan Radiologi</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body fs-6 text">
            <div class="mb-3">
              <form action="<?= base_url('problem/getReport') ?>" method="get">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group mt-3">
                      <input type="text" class="form-control form-control-sm fs-7" name="id" value="<?= esc($id) ?>" required>
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
            <div class="container mt-4">
              <?php if (!isset($data) || empty($data)) : ?>
                <!-- <?php if (session()->has('error')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                  </div>
                <?php endif; ?> -->
              <?php else : ?>
                <table class="table table-striped" style="font-size: 12px;">
                  <tr>
                    <th>ID LAPORAN</th>
                    <th>DIBUAT TANGGAL</th>
                    <th>PEMBUAT</th>
                    <th>STATUS</th>
                    <th class="text-center">AKSI</th>
                  </tr>
                  <?php foreach ($data as $row) : ?>
                    <tr class="align-middle">
                      <td class="text-start fw-bold fs-7">
                        <div style="display: flex; align-items: center;">
                          <button type="button" onclick="copyToClipboard()" class="btn btn-outline-success btn-sm" data-bs-placement="bottom" title="Copy" data-bs-toggle="tooltip"><i class="bi bi-copy"></i></button>
                          <input type="text" id="inputText" value="<?= $row['ID'] ?>" readonly class="form-control form-control-sm form-control-plaintext" style=" display: inline-block; margin-left:15px;">

                        </div>
                      </td>
                      <td><?= $row['DIBUAT_TANGGAL'] ?></td>
                      <td><?= $row['NAMA'] ?></td>
                      <td>
                        <!-- <?php if ($row['STATUS'] == 2) : ?> SELESAI <?php else : ?> BELUM SELESAI <?php endif; ?> -->

                        <?php if (esc($row['STATUS']) == 2) : ?>
                          <span class="badge text-bg-success">SELESAI</span>
                        <?php else : ?>
                          <span class="badge text-bg-danger">BELUM SELESAI</span>
                        <?php endif; ?>

                      </td>
                      <td class="text-center">
                        <button class="btn btn-success btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Batal View" onclick="window.location.href='<?= base_url('problem/unreport?id=' . $row['ID']); ?>'">
                          <i class="bi bi-arrow-right-circle"></i>
                        </button>
                        <!-- <button class="btn btn-danger btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" onclick="window.location.href='<?= base_url('problem/unLunas?notag=' . $row['ID']); ?>'">
                          <i class="bi bi-trash"></i>
                        </button> -->
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
  </section>

</main><!-- End #main -->
<script>
  function copyToClipboard() {
    const input = document.getElementById('inputText');
    input.style.width = `${input.scrollWidth}px`;
    input.select(); // Memilih teks dalam input
    document.execCommand('copy'); // Menyalin teks ke clipboard
    document.getElementById('message').innerText = 'Teks berhasil disalin!';
  }
</script>

<?= $this->endsection() ?>
<?php if (session()->getFlashdata('success')) : ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Sukses!',
      text: '<?= session()->getFlashdata('success') ?>',
    });
  </script>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '<?= session()->getFlashdata('error') ?>',
    });
  </script>
<?php endif; ?>