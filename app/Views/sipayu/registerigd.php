<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<main id="main" class="main">

  <div class="pagetitle">
    <h5>REGISTER IGD</h5>
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
              <form action="<?= base_url('sipayu/cari') ?>" method="get">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group mt-3">
                      <!-- <label for="inputIdRegisterKunjungan" class="form-label mt-3">IdRegisterKunjungan</label> -->
                      <input type="number" class="form-control form-control-sm" value="<?= esc($cari) ?>" name="id" placeholder="IdRegisterKunjungan">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group mt-3">
                      <!-- <label for="inputNamaPasien" class="form-label mt-3">NamaPasien</label> -->
                      <input type="text" class="form-control form-control-sm" name="nama" value="<?= esc($nama) ?>" placeholder="Nama Pasien">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group mt-3">
                      <!-- <label for="inputNamaPasien" class="form-label mt-3">NamaAsuransi</label> -->
                      <select name="asuransi" id="asuransi" class="form-control form-control-sm">
                        <option value="">Pilih Asuransi</option>
                        <?php foreach ($modelAsuransi as $row) : ?>
                          <option value="<?= $row['paymentname'] ?>" <?= ($row['paymentname'] == esc($asuransi)) ? 'selected="selected"' : '' ?>>
                            <?= $row['paymentname'] ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mt-3">

                      <button type="submit" class="btn btn-success btn-sm">
                        <i class="bx bxs-search"></i> Cari
                      </button>
                    </div>
                  </div>
              </form>
            </div>
          </div>

          <div class="row">
            <?php if (!isset($data) || empty($data)) : ?>
              <?php if (session()->has('success')) : ?>
                <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
                  <?php echo session()->getFlashdata('success'); ?>
                </div>
              <?php endif; ?>
            <?php else : ?>
              <table class="table table-striped" style="font-size: 12px;">
                <tr>
                  <th>ID REG</th>
                  <th>NORM</th>
                  <th class="fw-bold">NAMA</th>
                  <th>TGL.MASUK</th>
                  <th>ASURANSI</th>
                  <!-- <th>NO.SEP</th> -->
                  <th class="text-center">STATUS</th>
                  <th>REALISASI</th>
                  <th>REALCOST</th>
                  <th class="text-center">AKSI</th>
                </tr>
                <?php foreach ($data as $row) : ?>
                  <tr class="align-middle">
                    <td><?= $row['IdRegisterKunjungan'] ?></td>
                    <td><?= $row['NomorRekamMedis'] ?></td>
                    <td><?= $row['NamaPasien'] ?></td>
                    <td><?= $row['TanggalMasuk'] ?></td>
                    <td><?= $row['NamaAsuransi'] ?></td>
                    <!-- <td><?= $row['NomorSEP'] ?></td> -->
                    <td class="text-center"><?= $row['StatusRealisasi'] ?></td>
                    <td><?= $row['NilaiRealisasi'] ?></td>
                    <td><?= $row['NilaiRealCost'] ?></td>
                    <td class="text-center"><button class="btn btn-success btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update" onclick="window.location.href='<?= base_url('sipayu/update?id=' . $row['id']); ?>'">
                        <i class="bi bi-arrow-right-circle"></i></button>
                      <button class="btn btn-danger btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" onclick="window.location.href='<?= base_url('sipayu/delete?id=' . $row['IdRegisterKunjungan']); ?>'">
                        <i class="bi bi-trash"></i></button>
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