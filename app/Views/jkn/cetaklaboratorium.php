<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">DATA HASIL LABORATORIUM RAWAT JALAN</h6>
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
            <form method="get" action="<?= base_url('jkn/cetaklaboratorium'); ?>">
              <div class="row mb-3">
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="lab1" name="lab1" autofocus placeholder="NOMOR KUNJUNGAN" value="<?= esc($lab1) ?>">
                </div>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="lab2" name="lab2" placeholder="NOMOR TINDAKAN" value="<?= esc($lab2) ?>">
                </div>
                <div class="col-sm-3">
                  <button type="submit" class="btn btn-success">
                    <i class="bx bxs-search"></i> Cari
                  </button>
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                  <!-- <button class="btn btn-outline-success"
                    onclick="window.location.href='<?= base_url('jkn/cetaklaboratorium?id=' . '<?= esc($id) ?>' . '&st=' . '<?= esc($st) ?>'); ?>' ">
                    <i class="ri-printer-fill"></i>
                  </button> -->
                </div>
              </div>


            </form>

            <?php if (!empty($results)) : ?>
              <!-- <div class="col-sm-2"> <button class="btn btn-success" onclick="window.open('<?= base_url('jkn/pdfcetakresume?lab1=' . urlencode(esc($lab1)) . '&lab2=' . urlencode(esc($lab2))); ?>', '_blank')">
                  <i class="bx bxs-printer"></i> Cetak </button>
              </div> -->
              <div class="container">
                <div class="row">
                  <div class="col-sm-12 mt-3">
                    <table width="100%" class="table table-no-padding table-borderless p-0">
                      <tr>
                        <td width="7%" rowspan="3" class="align-middle"> <img src="/assets/img/rs.jpg" width="90px"> </td>
                        <td width="68%" rowspan="3" class="align-middle">
                          <h5 class="fw-bold align-middle">HASIL PEMERIKSAAN LABORATORIUM<BR></h5>
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

                      <?php if (!empty($results)) : ?>
                        <?php foreach ($results as $index => $row) : ?>
                          <?php if ($index == 0) : // Menampilkan hanya baris pertama 1010501012408080187  24080802963
                          ?>


                            <table width="100%" class="table table-borderless table-sm">

                              <tr>
                                <td width="25%">No. Rekam Medis </td>
                                <td width="25%">: <?php echo $row['NORM']; ?></td>
                                <td width="25%">No. Registrasi</td>
                                <td width="25%">: <?php echo $row['NOPEN']; ?></td>
                              </tr>
                              <tr>
                                <td>Nama Lengkap</td>
                                <td>: <?php echo $row['NAMALENGKAP']; ?></td>
                                <td>Tgl. Registrasi</td>
                                <td>: <?php echo $row['TGLREG']; ?></td>
                              </tr>
                              <tr>
                                <td>Jenis Kelamin / Tgl.Lahir</td>
                                <td>: <?php echo $row['JKTGLALHIR']; ?></td>
                                <td>Tgl.Hasil</td>
                                <td>: <?php echo $row['TANGGALHASIL']; ?></td>
                              </tr>
                              <tr>
                                <td>No.Laboratorium</td>
                                <td>: <?php echo $row['KUNJUNGAN']; ?></td>
                                <td>Unit Pengantar</td>
                                <td>: <?php echo $row['UNITPENGANTAR']; ?></td>
                              </tr>
                              <tr>
                                <td>Diagnosa</td>
                                <td>: <?php echo $row['DIAGNOSA']; ?></td>
                                <td>Dokter Perujuk</td>
                                <td>: <?php echo $row['DOKTERASAL']; ?></td>
                              </tr>

                              </tbody>
                            </table>



                            <section class="section">
                              <div class="row">
                                <div class="col-lg-12">
                                  <!-- <div class="card"> -->
                                  <table width="100%" class="table table-bordered">

                                    <tr class="fw-bold">
                                      <td width="50%">PEMERIKSAAN </td>
                                      <td width="15%" class="text-center">HASIL </td>
                                      <td width="15%" class="text-center">NILAI RUJUKAN</td>
                                      <td width="20%" class="text-CENTER">SATUAN</td>
                                    </tr>
                                    <tr>

                                      <td class="text-start fw-bold"><?php echo $row['NAMATINDAKAN']; ?></td>
                                      <td class="text-center"></td>
                                      <td class="text-center"></td>
                                      <td class="text-center"></td>
                                    </tr>
                                    <?php break; // Hentikan loop setelah baris pertama 
                                    ?>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                                <tr>
                                  <?php foreach ($results as $row) : ?>
                                    <td class="text-start ps-4 "> <?php echo $row['PARAMETER']; ?></td>
                                    <td class="text-center"><?php echo $row['HASIL']; ?> </td>
                                    <td class="text-center"><?php echo $row['NILAI_RUJUKAN']; ?></td>
                                    <td class="text-center"><?php echo $row['SATUAN']; ?></td>
                                </tr>
                              <?php endforeach; ?>
                              <tfoot class="fw-bold table-light">
                                <td class="fw-bold text-end pe-4" colspan="3">JUMLAH</td>

                                <td class="text-end pe-4"></td>
                              </tfoot>

                                  </table>

                                <?php else : ?>
                                  <p>Data tidak tersedia.</p>
                                <?php endif; ?>

                                <div class="row">
                                  <div class="col-sm-12 mt-3">

                                    <table width="100%" class="table table-no-padding table-borderless">
                                      <tr>
                                        <td width="50%" class="align-middle text-center">
                                          <!-- <h6>Mengetahui,<br>Petugas<br><br><br>
                                        ___________________________________<br>
                                      </h6> -->
                                        </td>
                                        <td class="text-center" width="50%">Indramayu, <?php echo $row['TGLSKRG2']; ?><br>
                                          <h6 class="fw-bold">Dokter Yang Memeriksa </h6>
                                          <img src="<?php
                                                    $dataDokter = strtoupper($row['DOKTER']);
                                                    $dataDokter = str_replace(',', ' ', $dataDokter);
                                                    echo base_url('qrcode/' . urlencode($dataDokter)); ?>" alt="QR Code" width="80" height="80"><br>
                                          <U><?php echo $row['DOKTER']; ?></U><br>
                                          NIP. <?php echo $row['NIPDPJP']; ?>

                                        </td>
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