<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Pengguna SIMRS Gos V2</h1>
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
            <table class="table datatable" style="font-size:fs-7;">
              <thead>
                <tr>
                  <th>
                    <b>ID</b>
                  </th>
                  <th>NAMA</th>
                  <th>NIP</th>
                  <th>USERNAME</th>
                  <th>RUANGAN</th>
                  <th>STATUS</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php foreach ($selectpenggunaruangan as $user => $pengguna) : ?>
                    <td class="text-center"><?= $pengguna->ID ?></td>
                    <td><?= $pengguna->NAMA ?></td>
                    <td><?= $pengguna->NIP ?></td>
                    <td><?= $pengguna->LOGIN ?></td>
                    <td><?= $pengguna->DESKRIPSI ?></td>
                    <td class="text-center"><?php if ($pengguna->STATUS == 1) : ?>
                        AKTIF
                      <?php else : ?>
                        TIDAK AKTIF
                      <?php endif; ?>
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