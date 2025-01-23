<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h5 class="fw-bold">TINDAKAN</h5>
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
              <form action="<?= base_url('sipayu/tindakan') ?>" method="post">
                <?= csrf_field() ?>
                <div class="row">
                  <div class="col-md-2 px-1">
                    <div class="form-group fs-7 mt-3">
                      <!-- <label class="form-label mt-3">Tindakan</label> -->
                      <input type="text" class="form-control form-control-sm" name="namatindakan" value="<?= esc($namatindakan) ?>" placeholder="TINDAKAN">
                    </div>
                  </div>
                  <div class="col-md-2 px-1">
                    <div class="form-group fs-7 mt-3">
                      <!-- <label class="form-label mt-3 fs-7">Kelompok</label> -->
                      <select name="kelompoktindakan" id="kelompoktindakan" class="form-control form-control-sm fs-7">
                        <option value="">KELOMPOK</option>
                        <?php foreach ($modelReferensi as $row) : ?>
                          <option value="<?= $row['KelompokTindakan'] ?>" <?= ($row['KelompokTindakan'] == esc($kelompoktindakan)) ? 'selected="selected"' : '' ?>><?= $row['KelompokTindakan'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1 px-1">
                    <div class="form-group fs-7 mt-3 ">
                      <!-- <label class="form-label mt-3 fs-7">Bulan</label> -->
                      <select name="bulan" id="bulan" class="form-control form-control-sm fs-7">
                        <option value="">BULAN</option>
                        <?php foreach ($modelBulan as $row) : ?>
                          <option value="<?= $row['month'] ?>" <?= ($row['month'] == esc($bulan)) ? 'selected="selected"' : '' ?>><?= $row['month'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1 px-1">
                    <div class="form-group fs-7 mt-3">
                      <!-- <label class="form-label mt-3 fs-7">Tahun</label> -->
                      <select name="tahun" id="tahun" class="form-control form-control-sm fs-7">
                        <option value="">TAHUN</option>
                        <?php foreach ($years as $year) : ?>
                          <option value="<?= $year ?>" <?= ($year == $selectedYear) ? 'selected' : '' ?>><?= $year ?></option>
                        <?php endforeach; ?>
                      </select>
                      <!-- <input type="text" class="form-control form-control-sm" name="tahun" value="<?= esc($tahun) ?>" placeholder="Tahun"> -->
                    </div>
                  </div>
                  <div class="col-md-2 px-1">
                    <div class="form-group fs-7 mt-3">
                      <!-- <label class="form-label mt-3">Asuransi</label> -->
                      <select name="asuransi" id="asuransi" class="form-control form-control-sm fs-7">
                        <option value="">ASURANSI</option>
                        <?php foreach ($modelAsuransi as $row) : ?>
                          <option value="<?= $row['paymentname'] ?>" <?= ($row['paymentname'] == esc($asuransi)) ? 'selected="selected"' : '' ?>>
                            <?= $row['paymentname'] ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <!-- FPK  -->
                  <div class="col-md-1">
                    <div class="form-group mt-3 fs-7">
                      <select name="fpk" id="fpk" class="form-control form-control-sm fs-7">
                        <option value="" <?= (isset($fpk) && $fpk === '') ? 'selected="selected"' : '' ?>>Pilih FPK</option>
                        <option value="1" <?= (isset($fpk) && $fpk === '1') ? 'selected="selected"' : '' ?>>1</option>
                        <option value="2" <?= (isset($fpk) && $fpk === '2') ? 'selected="selected"' : '' ?>>2</option>
                        <option value="3" <?= (isset($fpk) && $fpk === '3') ? 'selected="selected"' : '' ?>>3</option>
                      </select>
                    </div>
                  </div>
                  <!-- RUANGAN -->
                  <div class="col-md-2 px-1">
                    <div class="form-group fs-7 mt-3">
                      <!-- <label class="form-label mt-3">Asuransi</label> -->
                      <select name="ruangan" id="ruangan" class="form-control form-control-sm fs-7">
                        <option value="">RUANGAN</option>
                        <?php foreach ($modelRuangan as $row) : ?>
                          <option value="<?= $row['DESKRIPSI'] ?>" <?= ($row['DESKRIPSI'] == esc($ruangan)) ? 'selected="selected"' : '' ?>>
                            <?= $row['DESKRIPSI'] ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1 px-1 d-flex align-items-end mt-3">
                    <button type="submit" class="btn btn-outline-success btn-sm fs-7"> <i class="bx bxs-search"></i>Cari</button>
                  </div>

              </form>
            </div>
          </div>
          <div class="row">

            <?php if ((isset($bulan) && !empty($bulan)) && (isset($tahun) && !empty($tahun))) : ?>

              <table class="table table-striped w-100" style="font-size: 10px;">
                <tr>
                  <th class="text-center">NO</th>
                  <th>NORM</th>
                  <th>NAMA</th>
                  <th class="fw-bold">NAMA TINDAKAN</th>
                  <th>ASURANSI</th>
                  <th>RUANGAN</th>
                  <th>DOKTER</th>
                  <th>PARAMEDIS</th>
                  <!-- <th>BULAN</th>
                  <th>TAHUN</th> -->
                  <!-- <th class="text-center">AKSI</th> -->
                </tr>
                <?php
                $totalJasa = 0;
                $no = 1;
                foreach ($data as $row) :  $totalJasa += $row['JasaAsistenRvu']; ?>
                  <tr class="align-middle">
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $row['NomorRekamMedis'] ?></td>
                    <td><?= $row['NamaPasien'] ?></td>
                    <td><?= $row['NamaTindakan'] ?></td>
                    <td><?= $row['NamaAsuransi'] ?></td>
                    <td><?= $row['Poliklinik'] ?></td>
                    <td><?= $row['Dokter'] ?></td>
                    <td class="text-end pe-4"><?= number_format($row['JasaAsistenRvu'], 2, ',', '.') ?></td>
                    <!-- <td><?= $row['Monthout'] ?></td>
                    <td><?= $row['YearOut'] ?></td> -->
                    <!-- <td class="text-center"><button class="btn btn-success btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update" onclick="window.location.href='<?= base_url('sipayu/update?id=' . $row['id']); ?>'">
                        <i class="bi bi-arrow-right-circle"></i></button>
                      <button class="btn btn-danger btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" onclick="window.location.href='<?= base_url('sipayu/delete?id=' . $row['IdRegisterKunjungan']); ?>'">
                        <i class="bi bi-trash"></i></button>
                    </td> -->
                  </tr>
                <?php endforeach; ?>
                <tfoot class="fw-bold table-light">
                  <td class="fw-bold"></td>
                  <td class="fw-bold text-start">JUMLAH</td>
                  <td class="text-end"></td>
                  <td class="text-end"></td>
                  <td class="text-end"></td>
                  <td class="text-end"></td>
                  <td class="text-end"></td>
                  <td class="text-end pe-4"><?= number_format($totalJasa, 2, ',', '.') ?></td>
                  <!-- <td class="text-end"></td>
                  <td class="text-end"></td> -->

                </tfoot>
              </table>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<?= $this->endsection() ?>