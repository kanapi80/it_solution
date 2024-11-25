<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">DATA HASIL RADIOLOGI RAWAT JALAN</h6>
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
            <form method="get" action="<?= base_url('jkn/cetakradiologi'); ?>">
              <div class="row mb-3">
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="idr" name="idr" autofocus placeholder="KODE TINDAKAN" value="<?= esc($idr) ?>">
                </div>
                <div class="col-sm-3">
                  <button type="submit" class="btn btn-success">
                    <i class="bx bxs-search"></i> Cari
                  </button>
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                </div>
            </form>

            <?php if (!empty($results)) : ?>
              <div class="container">
                <div class="row">
                  <div class="col-sm-12 mt-3">
                    <?php foreach ($results as $row) : ?>
                      <table width="100%" class="table table-no-padding table-borderless p-0">
                        <tr>
                          <td width="7%" rowspan="3" class="align-middle"> <img src="/assets/img/rs.jpg" width="90px"> </td>
                          <td width="68%" rowspan="3" class="align-middle">
                            <h5 class="fw-bold align-middle">HASIL PEMERIKSAAN RADIOLOGI<BR></h5>
                            <h5 class="fw-bold align-middle">RSUD INDRAMAYU</h5>
                            <h6>JL Murah Nara No 7 indramayu Website : rsud.indramayukab.go.id Telp. 0234272655 Fax. 0234272655</h6>
                          </td>
                        </tr>
                      </table>
                      <hr>
                  </div>
                </div>
                <section class="section">
                  <div class="row">
                    <div class="col-lg-12">
                      <!-- <div class="card"> -->
                      <table width="100%" class="table table-borderless table-sm">
                        <tr>
                          <td width="15%">No. Rekam Medis </td>
                          <td width="35%">: <?php echo $row['NORM']; ?></td>
                          <td width="15%">No. Registrasi</td>
                          <td width="35%">: <?php echo $row['NOPEN']; ?></td>
                        </tr>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td>: <?php echo $row['NAMALENGKAP']; ?></td>
                          <td>Tgl. Registrasi</td>
                          <td>: <?php echo $row['TGLREG']; ?></td>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin / Umur</td>
                          <td>: <?php echo $row['JKTGLALHIR']; ?></td>
                          <td>Tgl. Hasil</td>
                          <td>: <?php echo $row['TANGGAL']; ?></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td>: <?php echo $row['ALAMAT']; ?></td>
                          <td>Nama Tindakan</td>
                          <td>: <?php echo $row['NAMATINDAKAN']; ?></td>
                        </tr>
                        <tr>
                          <td>Unit Pengantar</td>
                          <td>: <?php echo $row['UNITPENGANTAR']; ?></td>
                          <td rowspan="2">Diagnosa</td>
                          <td rowspan="2">: <?php echo $row['DIAGNOSA']; ?></p>
                          </td>
                        </tr>
                        <tr>
                          <td>Dokter Perujuk</td>
                          <td>: <?php echo $row['DOKTERASAL']; ?></td>
                          <!-- <td>x</td> -->
                          <!-- <td>y</td> -->
                        </tr>
                      </table>
                      <hr>
                      <section class="section">
                        <div class="row">
                          <div class="col-lg-12">
                            <!-- <div class="card"> -->
                            <table width="100%" class="table table-borderless">
                              <tr>
                                <td width="27%" class="fw-bold">HASIL PEMERIKSAAN : </td>
                              </tr>
                              <tr>
                                <td class="line-spacing">
                                  <?php echo nl2br($row['HASIL']); ?>
                                </td>
                                </td>
                              </tr>
                              <tr>
                                <td class=" fw-bold">KESAN PEMERIKSAAN :</td>
                              </tr>
                              <tr>
                                <td><?php echo nl2br($row['KESAN']); ?></td>
                              </tr>
                            </table>
                            <div class="row">
                              <div class="col-sm-12 mt-3">
                                <table width="100%" class="table table-no-padding table-borderless">
                                  <tr>
                                    <td width="50%" class="align-middle text-center">
                                    </td>
                                    <td class="text-center" width="50%">Indramayu, <?php echo $row['TANGGAL']; ?><br>
                                      Konsulen <br>
                                      <img src="<?php
                                                $dataDokter = strtoupper($row['DOKTER']);
                                                $dataDokter = str_replace(',', ' ', $dataDokter);
                                                echo base_url('qrcode/' . urlencode($dataDokter)); ?>" alt="QR Code" width="70" height="70"><br>
                                      <u><?php echo $row['DOKTER']; ?></u><br>
                                      NIP. <?php echo $row['NIPDOKTER']; ?>
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
</main>
<!-- End #main -->
<?= $this->endsection() ?>