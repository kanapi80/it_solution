<?= $this->include('Backend/Template/header'); ?>
<?= $this->include('Backend/Template/sidebar'); ?>
 
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Modul Applikasi SIMRS Gos V2</h1>
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
          <!-- <h5 class="card-title">Data Modul</h5> -->
          <!-- <p>Data Modul Applikasi SIMRS Gos V2</p> -->

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>
                  <b>N</b>ame
                </th>
                <th>NAMA</th>
                <th>NIP</th>
                <!-- <th data-type="date" data-format="YYYY/DD/MM">NIK</th> -->
                <th >NIK</th>
                <th>JENIS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <?php foreach ($selectmodul as $user =>$modul): ?>
              <td><?= $modul->ID ?></td>
                    <td><?= $modul->NAMA ?></td>
                    <td><?= $modul->LEVEL ?></td>
                    <td><?= $modul->DESKRIPSI ?></td>
                    <td><?= $modul->STATUS ?></td>
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

  <?= $this->include('Backend/Template/footer'); ?>
 