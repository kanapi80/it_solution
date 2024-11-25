<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h7 class="fw-bold"> JASA LANGSUNG DOKTER </h7>
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
              <div class="mb-3">
                <form action="<?= base_url('sipayu/alldokter') ?>" method="post">
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
            </div>

            <?php if (!empty($data)) : ?>
              <div class="container mt-3">
                <button class="btn btn-success btn btn-sm me-1 mb-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export Excel" onclick="window.location.href='<?= base_url('sipayu/exportalldokter?tahun=' . $tahun . '&bulan=' . $bulan . '&asuransi=' . $asuransi); ?>'"><i class="bi bi-file-earmark-excel"></i></button>
                <table class="table table-hover" style="font-size: 12px;">
                  <thead class="table-light table-bordered">
                    <th class="text-center">NO</th>
                    <th>DOKTER</th>
                    <th class="text-end">RAJAL</th>
                    <th class="text-end">RANAP</th>
                    <th class="text-end">IGD</th>
                    <th class="text-end">LABORATORIUM</th>
                    <th class="text-end">RADIOLOGI</th>
                    <th class="text-end">OPERASI</th>
                    <th class="text-end">ANASTESI</th>
                    <th class="text-end">JUMLAH</th>
                  </thead>
                  <?php
                  $totalRajal = 0;
                  $totalRanap = 0;
                  $totalIgd = 0;
                  $totalLab = 0;
                  $totalRad = 0;
                  $totalOperasi = 0;
                  $totalAnestesi = 0;
                  $totalJumlah = 0;

                  $no = 1;
                  if (!empty($data) && is_array($data)) : ?>
                    <?php foreach ($data as $row) :
                      $rajal = $row['JASAPEMERIKSAANRAJAL'] + $row['JASATINDAKANRAJAL'];
                      $ranap = $row['JASAPEMERIKSAANRANAP'] + $row['JASATINDAKANRANAP'];
                      $igd = $row['JASAPEMERIKSAANIGD'] + $row['JASATINDAKANIGD'];
                      $lab = $row['JASALAB'];
                      $rad = $row['JASARAD'];
                      $operasi = $row['JASAPIBS'];
                      $anestesi = $row['JASAPIBS_ANASTESI'];
                      $jumlah = $rad + $lab + $operasi + $anestesi + $rajal + $ranap + $igd;

                      // Tambahkan ke total
                      $totalRajal += $rajal;
                      $totalRanap += $ranap;
                      $totalIgd += $igd;
                      $totalLab += $lab;
                      $totalRad += $rad;
                      $totalOperasi += $operasi;
                      $totalAnestesi += $anestesi;
                      $totalJumlah += $jumlah;
                    ?>
                      <tbody>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-start"><?= $row['NamaOrang'] ?></td>
                        <td class="text-end"><?= number_format($rajal, 2, ',', '.') ?></td>
                        <td class="text-end"><?= number_format($ranap, 2, ',', '.') ?></td>
                        <td class="text-end"><?= number_format($igd, 2, ',', '.') ?></td>
                        <td class="text-end"><?= number_format($lab, 2, ',', '.') ?></td>
                        <td class="text-end"><?= number_format($rad, 2, ',', '.') ?></td>
                        <td class="text-end"><?= number_format($operasi, 2, ',', '.') ?></td>
                        <td class="text-end"><?= number_format($anestesi, 2, ',', '.') ?></td>
                        <td class="text-end"><?= number_format($jumlah, 2, ',', '.') ?></td>
                      </tbody>
                    <?php endforeach; ?>
                    <tfoot class="fw-bold table-light">
                      <td class="fw-bold"></td>
                      <td class="fw-bold text-start">JUMLAH</td>
                      <td class="text-end"><?= number_format($totalRajal, 2, ',', '.') ?></td>
                      <td class="text-end"><?= number_format($totalRanap, 2, ',', '.') ?></td>
                      <td class="text-end"><?= number_format($totalIgd, 2, ',', '.') ?></td>
                      <td class="text-end"><?= number_format($totalLab, 2, ',', '.') ?></td>
                      <td class="text-end"><?= number_format($totalRad, 2, ',', '.') ?></td>
                      <td class="text-end"><?= number_format($totalOperasi, 2, ',', '.') ?></td>
                      <td class="text-end"><?= number_format($totalAnestesi, 2, ',', '.') ?></td>
                      <td class="text-end"><?= number_format($totalJumlah, 2, ',', '.') ?></td>
                    </tfoot>
                  <?php endif; ?>
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