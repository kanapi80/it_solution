<?= $this->extend('layout/template_pasien'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <!-- <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div> -->
  <!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-3">


        <section class="section">
          <div class="row">

            <div class="col-12 col-md-12 col-lg-12">
              <div class="card text-dark bg-light mb-3">
                <div class="card-header">
                  <a href="<?= base_url('page/kunjungan'); ?>"><i class="bi bi-grid"></i> Dashboard</a>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="section">
          <div class="row">

            <?php foreach ($cpptm as $row) : ?>
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card text-body bg-light mb-3">
                  <div class="card-header fw-bold fs-6 text-primary p-2 m-0 ps-2">
                    <span class="badge bg-primary  rounded-0"><?php echo ($row['JK']); ?></span> <?= esc($norm) ?> - <?php echo strtoupper(esc($nama)); ?>
                  </div>
                  <div class="card-body p-2 ps-3 text-secondary">
                    <?php echo $row['TEMPAT_LAHIR'], ' , ',
                    $row['TANGGAL_LAHIR']; ?><br>
                    <?php echo $row['UMUR']; ?><br>
                    <?php echo $row['ALAMAT']; ?>
                  </div>
                </div>
              </div>
          </div>
        </section>

        <!-- <section class="section">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card text-dark bg-light mb-3">
                <div class="card-header p-1 m-0 ps-2">
                  <i class="bi bi-back"></i> KUNJUNGAN
                </div>
                <div class="card-body p-2 ps-3 text-secondary">
                  NOPEN : <?= esc($nopen) ?> <br>
                  NOKUN : <?= esc($nokun) ?><br>
                  NOSEP : <?= esc($nosep) ?><br>

                </div>
              </div>
            </div>
          </div>
        </section> -->
        <section class="section">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card text-dark bg-light">
                <div class="card-header p-1 m-0 ps-2">
                  <i class="bi bi-back"></i> DIAGNOSA MASUK
                </div>
                <div class="card-body p-2 ps-3 text-secondary">
                  <?php echo $row['DIAGNOSAMASUK']; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          </div>
        </section>

        <!-- JKN  -->

        <section class="section">
          <div class="row">

            <div class="col-12 col-md-12 col-lg-12">
              <div class="card text-dark bg-light">
                <div class="card-header p-1 m-0 ps-2">
                  <i class="bi bi-grid-fill" style="color:green"></i>
                  <?= esc($nosep) ?>
                </div>
                <div class="card-body p-2 ps-3 text-secondary">
                  <div class="col-12">
                    <button class="btn btn-primary btn-sm w-100 mb-2" data-bs-toggle="modal" data-bs-target="#uploadModal<?php echo esc($nosep); ?>" data-nosep="<?php echo esc($nosep); ?>" title="Upload Gambar" data-bs-toggle="tooltip">
                      <i class="bi bi-upload"></i> Upload
                    </button>
                    <?php
                    if (
                      session()->get('Ses_Tupoksi') == 'RAWAT INAP' ||
                      session()->get('Ses_Tupoksi') == 'LABORATORIUM' ||
                      session()->get('Ses_Tupoksi') == 'RADIOLOGI' ||
                      session()->get('Ses_Tupoksi') == 'KAMAR OPERASI'
                    ) :
                    ?>
                      <button class="btn btn-success btn-sm w-100"
                        onclick="window.open('<?= base_url('jkn/pdfbpjsranap') ?>?id=<?= urlencode($nopen) ?>&notag=<?= urlencode($notag) ?>&lab1=<?= urlencode($keylab1) ?>&lab2=<?= urlencode($keylab2) ?>&idr=<?= urlencode($keyrad) ?>&no_SEP=<?= urlencode($nosep) ?>&cppt1=<?= urlencode($nopen) ?>&cppt2=<?= urlencode($nokun) ?>&no_spri=<?= urlencode($keylab1) ?>&nokun=<?= urlencode($nokun) ?>&lab3=<?= urlencode($keylab1) ?>&lab4=<?= urlencode($keylab2) ?>', '_blank')">
                        <i class="bi bi-download"></i> Download RI
                      </button>
                    <?php else : ?>
                      <button class="btn btn-success btn-sm w-100"
                        onclick="window.open('<?= base_url('jkn/pdfBPJS') ?>?id=<?= urlencode($nopen) ?>&notag=<?= urlencode($notag) ?>&lab1=<?= urlencode($keylab1) ?>&lab2=<?= urlencode($keylab2) ?>&idr=<?= urlencode($keyrad) ?>&no_SEP=<?= urlencode($nosep) ?>&cppt1=<?= urlencode($nopen) ?>&cppt2=<?= urlencode($nokun) ?>&no_spri=<?= urlencode($keylab1) ?>&nokun=<?= urlencode($nokun) ?>&lab3=<?= urlencode($keylab1) ?>&lab4=<?= urlencode($keylab2) ?>', '_blank')">
                        <i class="bi bi-download"></i> Download RJ
                      </button>

                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="uploadModal<?php echo esc($nosep); ?>" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-success text-white">
                    <h6 class="modal-title fw-bold">UPLOAD PENUNJANG</h6>
                    <button type="button" class="btn-close text-danger fw-bold" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="<?= base_url('jkn/image-upload/upload') ?>" method="post" enctype="multipart/form-data">
                      <?php if (session('pesan')): ?>
                        <div class="alert alert-success"><?= session('pesan') ?></div>
                      <?php endif; ?>
                      <div class="mb-3">
                        <label for="nosep" class="form-label">Nomor SEP</label>
                        <input type="text" class="form-control form-control-sm fw-bold" id="nosepInput<?php echo esc($nosep); ?>" name="nosep" readonly>
                        <input type="text" class="form-control form-control-sm fw-bold" name="ranap" value="1" hidden>
                      </div>
                      <div class="mb-3">
                        <label for="images" class="form-label">Pilih Gambar</label>
                        <input type="file" class="form-control form-control-sm" name="gambar[]" multiple required>
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-upload"></i> Upload</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- END JKN  -->


      </div>

      <div class="col-xl-9">
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#cppt"><i class="bi bi-file-earmark-medical"></i> CPPT</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#billing"><i class="bi bi-clipboard"></i> B i l l i n g</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#laboratorium"><i class="bi bi-hourglass-split"></i> Laboratorium</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#radiologi"><i class="bi bi-file-easel"></i> Radiologi</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#download"><i class="bi bi-file-easel"></i> Download</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="cppt">
                <div class="container mt-3">
                  <?php if (!empty($cppt)): ?>
                    <?php foreach ($cppt as $item) : ?>
                      <section class="section mb-0 pb-0 pt-0">
                        <div class="row g-0">
                          <div class="col-12">
                            <div class="card text-black bg-light mb-0 ">
                              <div class="card-header p-1 m-0 ps-2 ">
                                <?php
                                $badgeColor = ($item['JNSPPA'] == 'Perawat') ? 'bg-info' : 'bg-success';
                                ?>
                                <span class="fw-light position-absolute top-0 start-100 translate-middle badge <?php echo $badgeColor; ?>">
                                  <?php echo ($item['JNSPPA']); ?>
                                </span>
                                <i class="bi bi-file-earmark-medical-fill text-success fw-lighter"></i>
                                <?php echo ($item['TANGGAL']); ?>
                                <?php
                                $pelaksana = htmlspecialchars($item['DOKTER'] . ' ' . $item['PERAWAT'] . ' | ' . $item['TGLVERIFIKASI']);
                                $namapelaksana = htmlspecialchars($item['DOKTER'] . ' ' . $item['PERAWAT']);
                                ?>
                                <b><?php echo $namapelaksana; ?></b>
                              </div>
                              <div class="card-body p-2 ps-3 text-black  fw-lighter shadow-none">
                                <?php echo strip_tags($item['CATATAN']); ?>
                              </div>
                              <div class="card-header p-1 ps-2 text-secondary">
                                <?php echo strip_tags($item['INSTRUKSI']); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    <?php endforeach; ?>



                  <?php endif; ?>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="billing">

                <!-- Billing -->

                <section class="section">
                  <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                      <div class="card text-dark bg-light">
                        <div class="card-header text-black">
                          <table class="w-100" style="font-size: 10px;padding: 1px;border:none;margin-top: 1px;">

                            <?php
                            // Display the first row details
                            $firstRow = $billing[0];
                            ?>
                            <tr>
                              <td width="22%">No. Rekam Medis </td>
                              <td width="31%"> <?php echo $firstRow['NORM']; ?></td>
                              <td width="20%">No. Tagihan</td>
                              <td width="27%"> <?php echo $firstRow['TAGIHAN']; ?></td>
                            </tr>
                            <tr>
                              <td>Nama Lengkap</td>
                              <td> <?php echo $firstRow['NAMALENGKAP']; ?></td>
                              <td>Tgl. Tagihan</td>
                              <td> <?php echo $firstRow['TANGGALTAGIHAN']; ?></td>
                            </tr>
                            <tr>
                              <td>Jenis Kelamin / Umur</td>
                              <td> <?php echo $firstRow['UMUR']; ?></td>
                              <td>Cara Bayar</td>
                              <td> <?php echo $firstRow['CARABAYAR']; ?></td>
                            </tr>
                            <tr>
                              <td>Tanggal Registerasi</td>
                              <td> <?php echo $firstRow['TANGGALREG']; ?></td>
                              <td>No. Jaminan</td>
                              <td> <?php echo $firstRow['NOMORKARTU']; ?></td>
                            </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="card-body p-2 ps-3 text-secondary">
                          <table class="w-100" style="font-size: 10px;">
                            <tr class="fw-bold fs-6 ">
                              <td width="50%" class="text-start ">
                                <div class="badge bg-success text-start rounded-1" style="width: 100%;">
                                  UNIT / TINDAKAN PEMERIKSAAN
                                </div>
                              </td>
                              <td width="16%" class="text-center">
                                <div class="badge bg-success text-wrap rounded-1" style="width: 100%;">
                                  TANGGAL
                                </div>
                              </td>
                              <td width="8%" class="text-center">
                                <div class="badge bg-success text-wrap rounded-1" style="width: 100%;">
                                  JUMLAH
                                </div>
                              </td>
                              <td width="14%" class="text-end">
                                <div class="badge bg-success text-wrap rounded-1" style="width: 100%;">
                                  HARGA
                                </div>
                              </td>
                              <td width="15%" class="text-end">
                                <div class="badge bg-success  text-wrap rounded-1" style="width: 100%;">
                                  TOTAL
                                </div>
                              </td>
                            </tr>
                            <?php
                            $ruanganGrouped = []; // Array untuk menyimpan data berdasarkan ruangan
                            // Mengelompokkan data berdasarkan ruangan
                            foreach ($billing as $row) {
                              $ruanganGrouped[$row['RUANGAN']][] = $row;
                            }
                            // Menampilkan data per ruangan
                            foreach ($ruanganGrouped as $ruangan => $rows) {
                              // Menampilkan header ruangan
                              echo '<tr><td colspan="5" style="font-weight: bold;">&nbsp;' .
                                ($ruangan == 'Depo Rajal' || $ruangan == 'Depo IGD' ? 'FARMASI - ' : '') .
                                $ruangan . '</td></tr>';
                              // Menampilkan detail untuk tiap layanan dalam ruangan
                              foreach ($rows as $row) {
                                echo '<tr>';
                                echo '<td>&nbsp;&nbsp;&nbsp;' . $row['LAYANAN'] . '</td>';
                                echo '<td align="center">&nbsp;&nbsp;&nbsp;' . $row['TANGGAL'] . '</td>';
                                echo '<td align="center">' . $row['JUMLAH'] . '</td>';
                                echo '<td align="right">' . number_format($row['TARIF'], 0, ',', '.') . '</td>';
                                echo '<td align="right" style="border-collapse: collapse;border-right: 0px solid black;">' .
                                  number_format($row['TARIF'] * $row['JUMLAH'], 0, ',', '.') .
                                  '</td>';
                                echo '</tr>';
                              }
                            }
                            ?>
                          </table>
                        </div>
                        <div class="card-header p-2 ps-3 text-secondary">
                          <table width="100%" style="font-size: 10px;border-collapse: collapse;border: 0px solid black;margin-top: 5px;padding: 1px">
                            <?php
                            $ruanganGrouped = []; // Array untuk menyimpan data berdasarkan ruangan
                            $tottagihan = 0;
                            // Mengelompokkan data berdasarkan ruangan
                            foreach ($billing as $row) {
                              $ruanganGrouped[$row['RUANGAN']][] = $row;
                              $tottagihan += $row['TARIF'] * $row['JUMLAH'];
                            }
                            ?>
                            <tr class="fw-bold ">
                              <td colspan="4" class="text-end">JUMLAH</td>
                              <td class="text-end"><?= number_format($tottagihan, 0, ',', '.') ?>
                                <span class="fw-boldfw-lighter position-absolute top-0 start-100 translate-middle badge bg-primary fs-6">
                                  <?= number_format($tottagihan, 0, ',', '.') ?>
                                </span>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="laboratorium">

                <!-- Settings Form -->
                <?php if (!empty($lab)) : ?>

                  <?php
                  $firstRow = $lab[0];
                  ?>
                  <table class="table-no-border w-100" style="padding:1px;font-size:10px;">
                    <tr>
                      <td width="15%">No. Rekam Medis</td>
                      <td width="35%">: <?php echo $firstRow['NORM']; ?></td>
                      <td width="15%">No. Registrasi</td>
                      <td width="35%">: <?php echo $firstRow['NOPEN']; ?></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>: <?php echo $firstRow['NAMALENGKAP']; ?></td>
                      <td>Tgl. Registrasi</td>
                      <td>: <?php echo $firstRow['TGLREG']; ?></td>
                    </tr>
                    <tr>
                      <td>JK / Tgl.Lahir</td>
                      <td>: <?php echo $firstRow['JKTGLALHIR']; ?></td>
                      <td>Tgl.Hasil</td>
                      <td>: <?php echo $firstRow['TANGGALHASIL']; ?></td>
                    </tr>
                    <tr>
                      <td>No.Laboratorium</td>
                      <td>: <?php echo $firstRow['KUNJUNGAN']; ?></td>
                      <td>Unit Pengantar</td>
                      <td>: <?php echo $firstRow['UNITPENGANTAR']; ?></td>
                    </tr>
                    <tr>
                      <td>Diagnosa</td>
                      <td>: <?php echo htmlspecialchars($firstRow['DIAGNOSA']); ?></td>
                      <td>Dokter Perujuk</td>
                      <td>: <?php echo htmlspecialchars($firstRow['DOKTERASAL']); ?></td>
                    </tr>
                  </table>
                  <br>

                  <?php
                  // Mengelompokkan data berdasarkan REFF
                  $groupedLabs = [];
                  foreach ($labs as $row) {
                    $groupedLabs[$row['REF']][] = $row; // Mengelompokkan berdasarkan REF
                  }
                  ?>

                  <table class="w-100">
                    <tr class="fw-bold fs-6">
                      <td width="50%" style="border-bottom: 0px solid black; border-top: 0px solid black;">
                        <div class="badge bg-success text-wrap rounded-1" style="width: 100%;">PEMERIKSAAN</div>
                      </td>
                      <td width="15%" style="border-bottom: 0px solid black; border-top: 0px solid black;">
                        <div class="badge bg-success text-wrap rounded-1" style="width: 100%;">HASIL</div>
                      </td>
                      <td width="25%" style="border-bottom: 0px solid black; border-top: 0px solid black;">
                        <div class="badge bg-success text-wrap rounded-1" style="width: 100%;">NILAI RUJUKAN</div>
                      </td>
                      <td width="10%" style="border-bottom: 0px solid black; border-top: 0px solid black;">
                        <div class="badge bg-success text-wrap rounded-1" style="width: 100%;">SATUAN</div>
                      </td>
                    </tr>

                    <?php
                    // Loop melalui setiap grup REFF
                    foreach ($groupedLabs as $reff => $rows) :
                      $firstRows = $rows[0];
                    ?>
                      <!-- Tampilkan Nama Tindakan dan Tanggal berdasarkan baris pertama dalam grup -->
                      <tr>
                        <td colspan="4" class="dashed-line">
                          <span class="badge bg-secondary text-wrap rounded-1 text-start text-white" style="width: 20%;"> <?php echo htmlspecialchars($firstRows['TANGGAL']); ?></span><br>
                          <b><?php echo htmlspecialchars($firstRows['NAMA']); ?></b>
                        </td>
                      </tr>

                      <?php
                      // Loop untuk menampilkan data dalam setiap grup REFF
                      foreach ($rows as $row) :
                      ?>
                        <tr style="font-size: 10px;">
                          <td> &nbsp;<?php echo nl2br(htmlspecialchars($row['PEMERIKSAAN'])); ?></td>
                          <td class="text-center"><?php echo nl2br(htmlspecialchars($row['HASIL'])); ?></td>
                          <td class="text-center"><?php echo nl2br(htmlspecialchars($row['NILAI_RUJUKAN'])); ?></td>
                          <td class="text-center"><?php echo nl2br(htmlspecialchars($row['SATUAN'])); ?></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
                  </table>

                  <br><br>
                  <table class="table-no-border w-100" style="font-size: 9px;">
                    <tr>
                      <td width="70%"></td>
                      <td width="30%" class="text-center">
                        Indramayu, <?php echo htmlspecialchars($firstRow['TGLSKRG']); ?><br>
                        Dokter Yang Memeriksa<br>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo urlencode($firstRow['DOKTER']); ?>" alt="QR Code" width="50" height="50"><br>
                        <u><?php echo htmlspecialchars($firstRow['DOKTER']); ?></u><br>
                        NIP. <?php echo htmlspecialchars($firstRow['NIPDPJP']); ?>
                      </td>
                    </tr>
                  </table>
                <?php else : ?>

                  <section class="section">
                    <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="card text-dark bg-light">
                          <div class="card-header p-1 m-0 ps-2">
                            <i class="bi bi-back"></i> HASIL PEMERIKSAAN
                          </div>
                          <div class="card-body p-2 ps-3 text-dark">
                            Pasien Tidak Melakukan Pemeriksaan Laboratorium
                          </div>
                        </div>
                      </div>

                    </div>
                  </section>
                <?php endif; ?>
                <!-- End settings Form -->

              </div>

              <div class="tab-pane fade pt-3" id="radiologi">
                <!-- Change Password Form -->
                <?php if (!empty($rad)) : ?>
                  <?php foreach ($rad as $row) : ?>
                    <table width="100%" class="table-no-border" style="font-size: 10px;">
                      <tr>
                        <td width="15%">No. RM</td>
                        <td width="35%">: <?php echo htmlspecialchars($row['NORM'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td width="15%">No. Registrasi</td>
                        <td width="35%">: <?php echo htmlspecialchars($row['NOPEN'], ENT_QUOTES, 'UTF-8'); ?></td>
                      </tr>
                      <tr>
                        <td>Nama Lengkap</td>
                        <td>: <?php echo htmlspecialchars($row['NAMALENGKAP'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>Tgl. Registrasi</td>
                        <td>: <?php echo htmlspecialchars($row['TGLREG'], ENT_QUOTES, 'UTF-8'); ?></td>
                      </tr>
                      <tr>
                        <td>JK / Umur</td>
                        <td>: <?php echo htmlspecialchars($row['JKTGLALHIR'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>Tgl. Hasil</td>
                        <td>: <?php echo htmlspecialchars($row['TANGGAL'], ENT_QUOTES, 'UTF-8'); ?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>: <?php echo htmlspecialchars($row['ALAMAT'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>Nama Tindakan</td>
                        <td>: <?php echo htmlspecialchars($row['NAMATINDAKAN'], ENT_QUOTES, 'UTF-8'); ?></td>
                      </tr>
                      <tr>
                        <td>Unit Pengantar</td>
                        <td>: <?php echo htmlspecialchars($row['UNITPENGANTAR'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td rowspan="2">Diagnosa</td>
                        <td rowspan="2">: <?php echo htmlspecialchars($row['DIAGNOSA'], ENT_QUOTES, 'UTF-8'); ?></td>
                      </tr>
                      <tr>
                        <td>Dokter Perujuk</td>
                        <td>: <?php echo htmlspecialchars($row['DOKTERASAL'], ENT_QUOTES, 'UTF-8'); ?></td>
                      </tr>
                    </table>

                    <section class="section">
                      <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                          <div class="card text-dark bg-light">
                            <div class="card-header p-1 m-0 ps-2">
                              <i class="bi bi-back"></i> HASIL PEMERIKSAAN
                            </div>
                            <div class="card-body p-2 ps-3 text-dark">
                              <?php echo nl2br(htmlspecialchars($row['HASIL'], ENT_QUOTES, 'UTF-8')); ?>
                            </div>
                          </div>
                        </div>

                      </div>
                    </section>

                    <section class="section">
                      <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                          <div class="card text-dark bg-light">
                            <div class="card-header p-1 m-0 ps-2">
                              <i class="bi bi-back"></i> KESAN PEMERIKSAAN
                            </div>
                            <div class="card-body p-2 ps-3 text-dark">
                              <?php echo nl2br(htmlspecialchars($row['KESAN'], ENT_QUOTES, 'UTF-8')); ?>
                            </div>
                          </div>
                        </div>

                      </div>
                    </section>

                    <section class="section">
                      <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                          <div class="card text-dark bg-light">
                            <div class="card-header p-1 m-0 ps-2">
                              <i class="bi bi-back"></i> Indramayu, <?php echo $row['TANGGAL']; ?>
                            </div>
                            <div class="card-body p-2 ps-3 text-dark">
                              Konsulen <br>
                              <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo $row['DOKTER']; ?>" alt="QR Code" width="70" height="70"><br>
                              <u><?php echo $row['DOKTER']; ?></u><br>
                              NIP. <?php echo $row['NIPDOKTER']; ?>
                            </div>
                          </div>
                        </div>

                      </div>
                    </section>
                  <?php endforeach; ?>

                <?php else : ?>

                  <section class="section">
                    <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="card text-dark bg-light">
                          <div class="card-header p-1 m-0 ps-2">
                            <i class="bi bi-back"></i> HASIL PEMERIKSAAN
                          </div>
                          <div class="card-body p-2 ps-3 text-black">
                            Pasien Tidak Melakukan Pemeriksaan Radiologi
                          </div>
                        </div>
                      </div>


                    </div>
                  </section>
                <?php endif; ?>

                <!-- End Change Password Form -->

              </div>

              <!-- Download  -->
              <div class="tab-pane fade pt-3" id="download">
                <section class="section">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="card" style="border-top:3px solid #0F998D; border-bottom:5px solid #72C2BA;border-radius: 2px">
                        <div class="card-body card-body-sm mt-4">
                          <form method="get" action="<?= base_url('jkn/listpasienranap'); ?>">
                            <?= csrf_field() ?>
                            <div class="row mb-4">
                              <div class="col-12 col-sm-6 mb-2">
                                <input type="text" class="form-control" id="id" name="id" value="<?= esc($nosep) ?>" autofocus placeholder="Input Nomor SEP" required="required">
                              </div>
                              <div class="col-12 col-sm-2">
                                <button type="submit" class="btn btn-success">
                                  <i class="bx bxs-search"></i> Cari
                                </button>
                              </div>
                            </div>
                          </form>

                          <?php if (empty($results)) : ?>
                            <div class="alert alert-success" role="alert">
                              <i class="bx bx-error-circle"></i> Data Tidak Ditemukan
                            </div>
                          <?php else : ?>
                        </div>
                      </div>
                    </div>
                  </div>

                </section>
                <section class="section">
                  <div class="row">
                    <?php if (!empty($results)) : ?>
                      <?php foreach ($results as $row) : ?>
                        <div class="col-12 col-md-6 col-lg-4">
                          <div class="card text-dark bg-light mb-3">
                            <div class="card-header">
                              <i class="bi bi-grid-fill" style="color:green"></i>
                              <b><?php echo strtoupper($row['DESKRIPSI']); ?></b> |
                              <?php
                                $date = new DateTime($row['MASUK']);
                                echo $date->format('d-m-Y');
                              ?> <span class="badge bg-primary"> <?php echo $row['NORM']; ?> </span>
                              <?php echo $row['NAMA']; ?>
                            </div>
                            <div class="card-body">
                              <div class="col-12">
                                <br>
                                <button class="btn btn-outline-success btn-sm w-100 mb-2" data-bs-toggle="modal" data-bs-target="#uploadModal<?php echo $row['NOSEP']; ?>" data-nosep="<?php echo $row['NOSEP']; ?>" title="Upload Gambar" data-bs-toggle="tooltip">
                                  <i class="bi bi-upload"></i> Upload
                                </button>
                                <button class="btn btn-success btn-sm w-100" onclick="window.open('<?= base_url('jkn/pdfbpjsranap?id=' . urlencode($row['NOPEN']) . '&notag=' . urlencode($row['TAGIHAN']) . '&lab1=' . urlencode($row['KEYLAB1']) . '&lab2=' . urlencode($row['KEYLAB2']) . '&idr=' . urlencode($row['KEYRAD']) . '&no_SEP=' . urlencode($row['NOSEP']) . '&cppt1=' . urlencode($row['NOPEN']) . '&cppt2=' . urlencode($row['NOMOR']) . '&no_spri=' . urlencode($row['NO_SPRI']) . '&nokun=' . urlencode($row['NOMOR']) . '&lab3=' . urlencode($row['KEYLAB3']) . '&lab4=' . urlencode($row['KEYLAB4'])); ?>', '_blank')">
                                  <i class="bi bi-download"></i> Download
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    <?php else : ?>
                      <div class="alert alert-warning">Tidak ada hasil ditemukan.</div>
                    <?php endif; ?>
                  </div>
                </section>

                <!-- END DASHBOARD -->

                <!-- MODAL -->

                <!-- END MODAL -->


  </section>

  <!-- PENUNJANG -->
  <?php if (!empty($penunjang)) : ?>
    <div class="card text-dark bg-light mb-3 col-xxl-12 col-md-6">
      <div class="card-header"><i class="bi bi-image-fill" style="color:blue"></i> DOKUMEN PENUNJANG</div>
      <div class="card-body"><br>
        <?php foreach ($penunjang as $row) : ?>
          <?php $imagePath = base_url('uploads/' . $row['image']); ?>
          <div style="position: relative; display: inline-block; padding-left: 5px; padding-right: 5px;">
            <a href="<?= $imagePath; ?>" target="_blank"> <img src="<?= $imagePath; ?>" alt="Gambar" class="rounded p-0" width="100px" height="50px"></a>
            <button style="position: absolute;top: 3px; right: 3px; cursor: pointer;" onclick="hapusGambar('<?= $row['image']; ?>', <?= $row['id']; ?>)" class="btn btn-outline-danger btn-sm" title="Hapus" data-bs-target="bottom" data-bs-toggle="tooltip"><i class="bi bi-trash"></i></button>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- END PENUNJANG -->
  <?php endif; ?>
<?php endif; ?>


</section>
</main><!-- End #main -->

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
      button.addEventListener('click', function() {
        const noSep = this.getAttribute('data-nosep');
        console.log("NOSEP yang diambil:", noSep);
        const modalId = this.getAttribute('data-bs-target');
        const inputField = document.querySelector(modalId + ' input[name="nosep"]');
        if (inputField) {
          inputField.value = noSep;
          console.log("Input field diisi dengan:", noSep);
        } else {
          console.log("Input field tidak ditemukan.");
        }
      });
    });
  });

  function hapusGambar(imageName, id) {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Gambar yang dihapus tidak bisa kembali",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        const xhr = new XMLHttpRequest();
        const url = '<?= base_url('jkn/image-hapus/') ?>' + id;

        xhr.open("POST", url, true);
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4) {
            const response = JSON.parse(xhr.responseText);
            if (xhr.status === 200) {
              Swal.fire({
                title: 'Deleted!',
                text: response.message,
                icon: 'success',
                confirmButtonText: 'OK'
              }).then(() => {
                location.reload();
              });
            } else {
              Swal.fire({
                title: 'Error!',
                text: response.message,
                icon: 'error',
                confirmButtonText: 'OK'
              });
            }
          }
        };
        xhr.send();
      }
    });
  }
</script>

</div>
<!-- End Download  -->


</div><!-- End Bordered Tabs -->

</div>
</div>

</div>
</div>
</section>

</main><!-- End #main -->



<?= $this->endsection() ?>