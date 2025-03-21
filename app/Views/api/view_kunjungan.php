<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">DATA TINDAKAN</h6>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">SIMRS V2</a></li>
        <li class="breadcrumb-item">Master</li>
        <li class="breadcrumb-item active">Tindakan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body mt-4">
            <div class="col-lg-12">
              <div>
                <table border="1">
                  <tr>
                    <th>Deskripsi</th>
                    <th>Jenis Kunjungan</th>
                  </tr>
                  <?php foreach ($data['Ruangan'] as $row): ?>
                    <tr>
                      <td><?= $row['DESKRIPSI']; ?></td>
                      <td><?= $row['JENIS_KUNJUNGAN']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </table>


              </div>
            </div>

          </div>
        </div>
  </section>

</main><!-- End #main -->




<?= $this->endsection() ?>