<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">APS FARMASI</h6>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body fs-6 text">
            <div class="mb-3">
              <form action="<?= base_url('problem/getstatusAps') ?>" method="get">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group mt-3">
                      <input type="text" class="form-control form-control-sm fs-7" name="notag" value="<?= esc($notag) ?>">
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
                <?php if (session()->has('error')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                  </div>
                <?php endif; ?>
              <?php else : ?>
                <table class="table table-striped" style="font-size: 12px;">
                  <tr>
                    <th>NO.TAGIHAN</th>
                    <th>TOTAL</th>
                    <th>NAMA</th>
                    <th>TANGGAL</th>
                    <th>DOKTER</th>
                    <th>DEPO</th>
                    <th>KASIR</th>
                    <th>STATUS</th>
                    <th class="text-center">AKSI</th>
                  </tr>
                  <?php foreach ($data as $row) : ?>
                    <tr class="align-middle">
                      <td class="text-start fw-bold fs-7"><?= $row['NOMOR'] ?></td>
                      <td><?= $row['TOTAL'] ?></td>
                      <td><?php if (empty($row['PENGUNJUNG'])) : ?> NONAME <?php else : ?> <?= $row['PENGUNJUNG'] ?> <?php endif; ?></td>
                      <td><?= $row['TANGGAL'] ?></td>
                      <td><?php if (empty($row['DOKTER'])) : ?> - <?php else : ?> <?= $row['DOKTER'] ?> <?php endif; ?></td>
                      <td><?= strtoupper($row['RUANGAN']); ?></td>
                      <td><?= strtoupper($row['NAMA']); ?></td>
                      <td>

                        <?php if (esc($row['STATUS']) == 2) : ?>
                          <span class="badge text-bg-success">LUNAS</span>
                        <?php else : ?>
                          <span class="badge text-bg-danger">BELUM LUNAS</span>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <button class="btn btn-success btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Batal Lunas" onclick="window.location.href='<?= base_url('problem/unLunas?notag=' . $row['NOMOR']); ?>'">
                          <i class="bi bi-arrow-right-circle"></i>
                        </button>
                        <!-- <button class="btn btn-danger btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" onclick="window.location.href='<?= base_url('problem/unLunas?notag=' . $row['NOMOR']); ?>'">
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

<?= $this->endsection() ?>
<script>
  <?php if (session()->getFlashdata('success')) : ?>
    Swal.fire({
      icon: 'success',
      title: 'Success',
      text: '<?= session()->getFlashdata('success'); ?>',
      timer: 3000,
      showConfirmButton: false
    });
  <?php endif; ?>