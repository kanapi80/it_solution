<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h7 class="fw-bold"> DOKTER GP</h7>
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
              <form action="<?= base_url('sipayu/doktergp') ?>" method="post">
                <?= csrf_field() ?>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group mt-3 fs-7">
                      <select name="tahun" id="tahun" class="form-control form-control-sm fs-7">
                        <option value="">Pilih Tahun</option>
                        <?php foreach ($years as $year) : ?>
                          <option value="<?= $year ?>" <?= ($year == $selectedYear) ? 'selected' : '' ?>><?= $year ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group mt-3 fs-7">
                      <select name="bulan" id="bulan" class="form-control form-control-sm fs-7">
                        <option value="Apr">Pilih Bulan</option>
                        <?php foreach ($modelBulan as $row) : ?>
                          <option value="<?= $row['month'] ?>" <?= ($row['month'] == esc($bulan)) ? 'selected="selected"' : '' ?>><?= $row['month'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
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
                  <div class="col-md-3">
                    <div class="form-group mt-3 fs-7">
                      <select name="asuransi" id="asuransi" class="form-control form-control-sm fs-7">
                        <option value="BPJS / JKN">Pilih Asuransi</option>
                        <?php foreach ($modelAsuransi as $row) : ?>
                          <option value="<?= $row['paymentname'] ?>" <?= ($row['paymentname'] == esc($asuransi)) ? 'selected="selected"' : '' ?>>
                            <?= $row['paymentname'] ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group mt-3 fs-7">
                      <button type="submit" class="btn btn-outline-success btn-sm ">
                        <i class="bx bxs-search"></i> Cari
                      </button>
                    </div>
                  </div>
              </form>
            </div>

            <?php if (!empty($data)) : ?>
              <div class="container mt-3">
                <button class="btn btn-success btn btn-sm me-1 mb-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export Excel" onclick="window.location.href='<?= base_url('sipayu/exportgp?tahun=' . $tahun . '&bulan=' . $bulan . '&asuransi=' . $asuransi . '&fpk=' . $fpk); ?>'"><i class="bi bi-file-earmark-excel"></i></button>
                <table class="table table-hover " style="font-size: 12px;">
                  <thead class="table-light table-bordered">
                    <th class="text-center">NO</th>
                    <th>RUANGAN</th>
                    <th class="text-end">JASA DOKTER UMUM</th>
                  </thead>
                  <?php
                  $totalKebersamaan = 0;
                  if (!empty($data) && is_array($data)) : ?>
                    <?php $no = 1;
                    foreach ($data as $row) :
                      $totalKebersamaan += $row['JasaDokterUmum']; // Menggunakan sintaks array
                    ?>
                      <tbody>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-start"><?= esc($row['Poliklinik']) ?></td>
                        <td class="text-end"><?= number_format($row['JasaDokterUmum'], 2, ',', '.') ?></td>
                      </tbody>
                    <?php endforeach; ?>
                    <tfoot class="fw-bold table-light">
                      <td class="fw-bold"></td>
                      <td class="fw-bold text-start">JUMLAH</td>
                      <td class="text-end"><?= number_format($totalKebersamaan, 2, ',', '.') ?></td>
                    </tfoot>
                  <?php endif; ?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>
            <?php endif; ?>
          </div>

        </div>
      </div>
  </section>

</main><!-- End #main -->

<?= $this->endsection() ?>