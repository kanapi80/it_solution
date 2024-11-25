<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h5>REGISTER RAWAT JALAN</h5>
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
            <!-- <h5 class="card-title">Datatables</h5>
          <p>Data Pengguna SIMRS Gos V2</p> -->

            <!-- Table with stripped rows -->
            <table class="table datatable" style="font-size: 12px;">
              <thead>
                <tr>
                  <th>
                    <b>ID.REG</b>
                  </th>
                  <th>NAMA</th>
                  <th>NO.RM</th>
                  <th class="text-center">ASURANSI</th>
                  <th>NO.SEP</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php foreach ($selectregister as $user => $pengguna) : ?>
                    <td class="text-center"><?= $pengguna->IdRegisterKunjungan ?></td>
                    <td><?= $pengguna->NamaPasien ?></td>
                    <td><?= $pengguna->NomorRekamMedis ?></td>
                    <td class="text-center"><?= $pengguna->NamaAsuransi ?></td>
                    <td class="text-center"><?= $pengguna->NomorSEP ?>
                    </td>
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

<?= $this->endsection(); ?>