<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">DATA RESUME RAWAT JALAN</h6>
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
          <div class="card-body card-body-sm mt-4">
            <!-- <h6 class="card-title">DATA SEP</h6> -->
            <form method="get" action="<?= base_url('jkn/cetakresume'); ?>">
              <div class="row mb-100">
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="id" name="id" autofocus placeholder="NOMOR PENDAFTARAN" value="<?= esc($id) ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="nokun" name="nokun" autofocus placeholder="NOMOR KUNJUNGAN" value="<?= esc($nokun) ?>">
                </div>
                <div class="col-sm-6">
                  <button type="submit" class="btn btn-outline-success"><i class="bx bxs-search"></i> Cari </button>
            </form>
          </div>
          <?php if (!empty($results)) : ?>
            <div class="col-sm-2"> <button class="btn btn-success" onclick="window.open('<?= base_url('jkn/pdfcetakresume?id=' . urlencode(esc($id)) . '&nokun=' . urlencode(esc($nokun))); ?>', '_blank')">
                <i class="bx bxs-printer"></i> Cetak </button>
            </div>
        </div>



        <?php foreach ($results as $row) : ?>

          <div class="row">
            <div class="col-sm-12 mt-3">


              <table width="100%" class="table table-borderless">
                <tr>
                  <td width="7%" rowspan="3" class="align-middle"> <img src="/assets/img/rs.jpg" width="80px"> </td>
                  <td width="68%" rowspan="3" class="align-middle">
                    <h4 class="fw-bold align-middle">IDENTITAS PASIEN RAWAT JALAN<BR> RSUD INDRAMAYU</h6>
                  </td>
                  <td width="25%" class="text-center table-collapse align-middle">
                    <h6 class="fw-bold "><?php echo strtoupper($row['UNITPELAYANAN']); ?></h6>
                  </td>
                </tr>
                <tr>
                  <td class=" text-center table-collapse align-middle">
                    <h6 class="fw-bold"><?php echo $row['NAMAINSTANSI']; ?></h6>
                  </td>
                </tr>
                <tr>
                  <td class="text-center table-collapse align-middle" style="border-collapse: collapse;border-bottom: 1px solid black">
                    <h6 class="fw-bold">Rp. <?php echo number_format($row['TAGIHAN'], 0, ',', '.'); ?></h6>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 mt-3 mb-0">

              <table width="100%" class="table table-no-padding table-borderless table-sm">
                <tr>
                  <td width="75%" class="align-middle">
                    <h6 class="fw-bold">Diisi oleh Adm Rawat Jalan</h6>
                  </td>
                  <td class="text-center" width="25%">
                    <h6 class="fw-bold">Tanggal : <?php echo $row['TGLREG']; ?></h6>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <section class="section">
            <div class="row">
              <div class="col-lg-12">
                <!-- <div class="card"> -->
                <table width="100%" class="table table-borderless table-collapse">
                  <tr>
                    <td width="25%">No. Rekam Medis </td>
                    <td width="50%">: <?php echo $row['NORM']; ?></td>
                    <td width="25%" class="text-center fw-bold table-collapse align-middle"><?php echo $row['CARABAYAR']; ?></td>
                  </tr>
                  <tr>
                    <td>Nama Lengkap</td>
                    <td>: <?php echo $row['NAMALENGKAP']; ?></td>
                    <td class="text-center table-collapse align-middle">No. Kartu</td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir / Umur</td>
                    <td>: <?php echo $row['TGL_LAHIR']; ?></td>
                    <td class="text-center table-collapse align-middle"><?php echo $row['NOMORKARTU']; ?></td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td>: <?php echo $row['JENISKELAMIN']; ?></td>
                    <td class="text-center table-collapse align-middle">NO. SEP</td>
                  </tr>
                  <tr>
                    <td>Alamat Pasien</td>
                    <td>: <?php echo $row['ALAMAT']; ?></td>
                    <td class="text-center table-collapse align-middle"><?php echo $row['NOMORSEP']; ?></td>
                  </tr>
                </table>
                <div class="row">
                  <div class="col-sm-12 mt-3">
                    <table width="100%" class="table table-no-padding table-borderless">
                      <tr>
                        <td width="75%" class="align-middle">
                          <h6 class="fw-bold">Diisi oleh Dokter</h6>
                        </td>
                        <td class="text-center" width="25%">
                          <h6 class="fw-bold">ICD 10 / ICD 9 CM</h6>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <section class="section">
                  <div class="row">
                    <div class="col-lg-12">
                      <!-- <div class="card"> -->
                      <table width="100%" class="table table-borderless table-collapse">
                        <tr>
                          <td width="27%">Diagnosa Utama </td>
                          <td width="48%">: <?php echo $row['DIAGNOSA']; ?></td>
                          <td width="25%" class="text-center"><input type="text" class="text-center smaller p-2 w-100" value="<?php echo $row['KODE']; ?>" readonly></td>
                        </tr>
                        <tr>
                          <td>Diagnosa Tambahan</td>
                          <td>: </td>
                          <td class="text-center">
                            <input type="text" class="text-center smaller p-2 w-100" value="" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>Penyebab Luar Kesakitan/Kematian</td>
                          <td>: <?php echo $row['DIAGNOSA_MENINGGAL']; ?></td>
                          <td class="text-center"><input type="text" class="text-center smaller p-2 w-100" value="<?php echo $row['KODE_MENINGGAL']; ?>" readonly></td>
                        </tr>
                        <tr>
                          <td class="fw-bold">Tindakan / Operasi</td>
                          <td></td>
                          <td class="text-center"></td>
                        </tr>
                        <tr>
                          <td> - Utama</td>
                          <td>: <?php echo $row['TINDAKAN_MEDIS']; ?></td>
                          <td class="text-center"> <input type="text" class="text-center smaller p-2 w-100" value="<?php echo $row['KODE_PROSEDUR']; ?>" readonly></td>
                        </tr>
                        <tr>
                          <td> - Tambahan</td>
                          <td>: </td>
                          <td class="text-center"> <input type="text" class="text-center smaller p-2 w-100" value="" readonly></td>
                        </tr>
                        <tr>
                          <td class="fw-bold">Pemeriksaan Penunjang</td>
                          <td></td>
                          <td class="text-center"></td>
                        </tr>
                        <tr>
                          <td>RADIOLOGI</td>
                          <td>: <?php echo $row['TINDAKAN_RAD']; ?></td>
                          <td class="text-center"> <input type="text" class="text-center smaller p-2 w-100" value="" readonly></td>
                        </tr>
                        <tr>
                          <td>LABORATORIUM</td>
                          <td>: <?php echo $row['TINDAKAN_LAB']; ?></td>
                          <td class="text-center"> <input type="text" class="text-center smaller p-2 w-100" value="" readonly></td>
                        </tr>
                        <tr>
                          <td>FARMASI</td>
                          <td>: Terlampir dalam rincian tagihan</td>
                          <td class="text-center"></td>
                        </tr>
                      </table>
                      <div class="row">
                        <div class="col-sm-12 mt-3">

                          <table width="100%" class="table table-no-padding table-borderless">
                            <tr>
                              <td width="50%" class="align-middle text-center">
                                <!-- <h6>Mengetahui,<br>Petugas<br><br><br>
                                        ___________________________________<br>
                                      </h6> -->
                              </td>
                              <td class="text-center" width="50%">Indramayu, <?php echo $row['TGLREG']; ?><br>
                                <h6 class="fw-bold">Dokter Yang Memeriksa </h6>
                                <img src="<?php
                                          $dataDokter = strtoupper($row['DOKTERDPJP']);
                                          $dataDokter = str_replace(',', ' ', $dataDokter);
                                          echo base_url('qrcode/' . urlencode($dataDokter)); ?>" alt="QR Code" width="70" height="70"><br>
                                <u class="fw-bold"><?php echo $row['DOKTERDPJP']; ?></u><br>
                                NIP. <?php echo $row['NIPDPJP']; ?>

                              </td>
                            </tr>
                          <?php endforeach; ?>
                          </table>
                        </div>
                      </div>
                    <?php else : ?>
                      <div class="alert alert-danger alert-dismissible fade show p-2 mt-3" role="alert">
                        <?php echo session()->getFlashdata('success'); ?>
                      </div>
                    <?php endif; ?>
                    </div>
                  </div>

              </div>
            </div>
          </section>
</main><!-- End #main -->

<?= $this->endsection() ?>