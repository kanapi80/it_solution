<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">DATA BILLING RAWAT JALAN</h6>
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

            <form method="get" action="<?= base_url('jkn/cetakbilling'); ?>">

              <div class="row mb-3">
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="notag" name="notag" value="<?= esc($notag) ?>" autofocus placeholder="NOMOR TAGIHAN">
                  <input type="text" class="form-control" id="st" name="st" value="1" hidden>
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


                    <table width="100%" class="table table-borderless ">
                      <tr>
                        <!-- <td width="7%" rowspan="4" class="align-middle"> <img src="/assets/img/rs.jpg" width="80px"> </td> -->
                        <td width="100%" class="align-middle">
                          <h5 class="fw-bold align-middle text-center">RINCIAN BIAYA PELAYANAN PASIEN<BR> RSUD INDRAMAYU</h6>
                        </td>

                      </tr>
                    </table>
                  </div>
                </div>

                <section class="section">
                  <div class="row">
                    <div class="col-lg-12">
                      <!-- <div class="card"> -->

                      <?php if (!empty($results)) : ?>

                        <table width="100%" class="table table-borderless table-sm">
                          <?php foreach ($results as $index => $row) : ?>
                            <?php if ($index == 0) : // Menampilkan hanya baris pertama 
                            ?>
                              <tr>
                                <td width="25%">No. Rekam Medis </td>
                                <td width="25%">: <?php echo $row['NORM']; ?></td>
                                <td width="25%">No. Tagihan</td>
                                <td width="25%">: <?php echo $row['TAGIHAN']; ?></td>
                              </tr>
                              <tr>
                                <td>Nama Lengkap</td>
                                <td>: <?php echo $row['NAMALENGKAP']; ?></td>
                                <td>Tgl. Tagihan</td>
                                <td>: <?php echo $row['TANGGALTAGIHAN']; ?></td>
                              </tr>
                              <tr>
                                <td>Jenis Kelamin / Umur</td>
                                <td>: <?php echo $row['UMUR']; ?></td>
                                <td>Cara Bayar</td>
                                <td>: <?php echo $row['CARABAYAR']; ?></td>
                              </tr>
                              <tr>
                                <td>Tanggal Registerasi</td>
                                <td>: <?php echo $row['TANGGALREG']; ?></td>
                                <td>No. Jaminan</td>
                                <td>: <?php echo $row['NOMORKARTU']; ?></td>
                              </tr>
                              <?php break; // Hentikan loop setelah baris pertama 
                              ?>
                            <?php endif; ?>
                          <?php endforeach; ?>
                          </tbody>
                        </table>
                      <?php else : ?>
                        <p>Data tidak tersedia.</p>
                      <?php endif; ?>



                      <section class="section">
                        <div class="row">
                          <div class="col-lg-12">
                            <!-- <div class="card"> -->
                            <table width="100%" class="table table-bordered">

                              <tr class="fw-bold">
                                <td width="25%">UNIT / LAYANAN </td>
                                <td width="40%">TINDAKAN PEMERIKSAAN </td>
                                <td width="10%" class="text-center">JUMLAH</td>
                                <td width="25%" class="text-end pe-4">TOTAL TAGIHAN</td>
                              </tr>
                              <?php
                              $tottagihan = 0;
                              foreach ($results as $row) : $tottagihan += $row['TARIF']; ?>
                                <tr>
                                  <td><?php echo $row['RUANGAN']; ?></td>
                                  <td><?php echo $row['LAYANAN']; ?> </td>
                                  <td class="text-center"><?php echo $row['JUMLAH']; ?></td>
                                  <td class="text-end pe-4"><?= number_format($row['TARIF'], 0, ',', '.') ?></td>
                                </tr>
                              <?php endforeach; ?>
                              <tfoot class="fw-bold table-light">
                                <td class="fw-bold text-end pe-4" colspan="3">JUMLAH</td>

                                <td class="text-end pe-4"><?= number_format($tottagihan, 0, ',', '.') ?></td>
                              </tfoot>

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
                                    <!-- <td class="text-center" width="50%">Indramayu, <?php echo $row['TANGGALREG']; ?><br>
                                      <h6 class="fw-bold">Dokter Yang Memeriksa </h6><br>
                                      <img src="<?php
                                                $dataDokter = strtoupper($row['NAMALENGKAP']);
                                                $dataDokter = str_replace(',', ' ', $dataDokter);
                                                echo base_url('qrcode/' . urlencode($dataDokter)); ?>" alt="QR Code" width="70" height="70"><br>
                                      ________________________________<br>
                                      NIP. <?php echo $row['NAMALENGKAP']; ?>

                                    </td> -->
                                  </tr>

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