<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Pegawai RSUD Indramayu</h1>
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
          <div class="card-body">
            <!-- <h5 class="card-title">Datatables</h5>
          <p>Data Pengguna SIMRS Gos V2</p> -->

            <!-- Table with stripped rows -->
            <table class="table datatable table-striped" style="font-size: 12px;">
              <thead>
                <tr>
                  <th>
                    <b>ID</b>
                  </th>
                  <th>NAMA</th>
                  <th>NIP</th>
                  <!-- <th data-type="date" data-format="YYYY/DD/MM">NIK</th> -->
                  <th>TTL</th>
                  <th>UMUR</th>
                  <th>ALAMAT</th>
                  <th>PROFESI</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php foreach ($selectpengguna as $user => $pengguna) : ?>
                    <td class="text-center"><?= esc($pengguna['ID']) ?></td>
                    <td><?= esc($pengguna['NAMA']) ?></td>
                    <td><?= esc($pengguna['NIP']) ?></td>
                    <td><?= esc($pengguna['TEMPAT_LAHIR']), ', ', date('d-m-Y', strtotime(esc($pengguna['TANGGAL_LAHIR']))) ?></td>
                    <td class="text-center"><?= esc($pengguna['age']) ?></td>
                    <td><?= esc($pengguna['ALAMAT']) ?></td>
                    <td><?= esc($pengguna['DESKRIPSI']) ?></td>
                </tr>
              <?php endforeach ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?= $this->endsection() ?>