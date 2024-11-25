<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">DATA SEP RAWAT JALAN</h6>
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
            <form method="post" action="<?= base_url('jkn/cetaksep'); ?>">
              <?= csrf_field() ?>
              <div class="row mb-3">
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="no_SEP" name="no_SEP" value="<?= esc($no_SEP) ?>" autofocus>
                </div>
                <div class="col-sm-3">
                  <button type="submit" class="btn btn-success">
                    <i class="bx bxs-search"></i> Cari
                  </button>
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                </div>
              </div>
            </form>

            <?php if (!empty($results)) : ?>
              <div class="container">
                <div class="d-flex align-items-center">
                  <div class="text-start">
                    <img src="/assets/img/sepbpjs.png" width="300px">
                  </div> <?php foreach ($results as $row) : ?>
                    <div class="ml-3 p-4">
                      <h6 class="fw-bold">SURAT ELEGIBILITAS PESERTA<BR> RSUD INDRAMAYU</h6>
                    </div>
                    <div class="ml-3 p-4"><br>
                      <h7><?php echo $row['PRB']; ?></h7>
                    </div>
                </div>
              </div>
              <section class="section">
                <div class="row">
                  <div class="col-lg-12">

                    <!-- <div class="card"> -->
                    <table class="table table-borderless table-no-padding">
                      <thead>
                        <tr>
                          <th scope="col" style="width: 15%"></th>
                          <th scope="col" style="width: 35%"></th>
                          <th scope="col" style="width: 15%"></th>
                          <th scope="col" style="width: 35%"></th>
                        </tr>
                      </thead>

                      <tbody>

                        <tr>
                          <td scope="row">No.SEP</td>
                          <td>: <?php echo $row['NOMORSEP']; ?></td>
                          <td>Peserta</td>
                          <td>: <?php echo $row['PESERTA']; ?></td>
                        </tr>
                        <tr>
                          <td>Tgl.SEP</td>
                          <td>: <?php echo $row['TGLSEP']; ?></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>No. Kartu</td>
                          <td>: <?php echo $row['NOMORKARTU']; ?></td>
                          <td>Jns Rawat</td>
                          <td>: <?php echo $row['JENISRAWAT']; ?></td>
                        </tr>
                        <tr>
                          <td>Nama Peserta</td>
                          <td>: <?php echo $row['NAMALENGKAP']; ?></td>
                          <td>Jns Kunjungan</td>
                          <td>: <?php echo $row['TJKUNJ']; ?></td>
                        </tr>
                        <tr>
                          <td>Tgl.Lahir</td>
                          <td>: <?php echo $row['TGL_LAHIR']; ?></td>
                          <td>Prosedur</td>
                          <td>: <?php echo $row['PROC']; ?></td>
                        </tr>
                        <tr>
                          <td>No.Telepon</td>
                          <td>: <?php echo $row['NOTELP']; ?></td>
                          <td>Assesment Plyn</td>
                          <td>: <?php echo $row['ASPEL']; ?></td>
                        </tr>
                        <tr>
                          <td>Sub/ Spesialis</td>
                          <td>: <?php echo $row['poliTujuan']; ?></td>
                          <td>Poli Perujuk</td>
                          <td>: <?php echo $row['POLIPERUJUK']; ?></td>
                        </tr>
                        <tr>
                          <td>Dokter</td>
                          <td>: <?php echo $row['DOKTER']; ?></td>
                          <td>Kelas Hak</td>
                          <td>: <?php echo $row['KLSRAWAT']; ?></td>
                        </tr>
                        <tr>
                          <td>Faskes Perujuk</td>
                          <td>: <?php echo $row['RUJUKAN']; ?></td>
                          <td>Kelas Rawat</td>
                          <td>: <?php echo $row['KELAS']; ?></td>
                        </tr>
                        <tr>
                          <td>Diagnosa Awal</td>
                          <td>: <?php echo $row['DIAGNOSA']; ?></td>
                          <td>Penjamin</td>
                          <td>: <?php echo $row['PENJAMIN']; ?></td>
                        </tr>
                        <tr>
                          <td>Catatan</td>
                          <td>: <?php echo $row['CATATAN']; ?></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td colspan="2" style="font-size: smaller;">* Saya Menyetujui BPJS Kesehatan menggunakan Informasi Media pasien jika diperlukan<br>
                            * SEP bukan sebagai bukti penjamin peserta<br>
                            ** Dengan diterbitkannya SEP ini, Peserta rawat inap telah mendapatkan informasi dan menempati<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kelas rawat sesuai hak kelasnya (terkecuali kelas penuh atau naik kelas sesuai aturan yang berlaku)
                            <br> <br><?php echo $row['CETAKAN']; ?>
                          </td>
                          <!-- <td></td> -->
                          <td class="text-center">Pasien/ Keluarga Pasien
                            <img src="<?= base_url('qrcode/' . urlencode($row['NAMALENGKAP'])); ?>" alt="QR Code" width="60" height="60"><br>
                            _______________________
                          </td>
                          <td></td>
                          <!-- <td></td> -->
                        </tr>

                      <?php endforeach; ?>
                      </tbody>
                    </table>
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