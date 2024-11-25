<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Users</h1>
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

            <table class="table table-striped" style="font-size: 12px;">
              <thead>
                <tr>
                  <th colspan="7">
                    <button class="btn btn-info btn btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add" onclick="window.location.href='<?= base_url('users/addusers'); ?>'"><i class="bi bi-plus"></i></button>
                    <button class="btn btn-success btn btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export Excel" onclick="window.location.href='<?= base_url('users/export-excel'); ?>'"><i class="bi bi-file-earmark-excel"></i></button>
                    <a href="<?= base_url('users/cetak_pdf'); ?>" class="btn btn-danger btn btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export PDF" target="_blank"><i class="bi bi-file-earmark-pdf-fill"></i></a>
                    <!-- <button class="btn btn-success btn btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cetak PDF" onclick="window.location.href='<?= base_url('users/cetak_pdf'); ?>',  '_blank'"><i class="bi bi-printer-fill"></i></button> -->

                  </th>
                </tr>
                <tr class="align-middle">
                  <th class="text-center">
                    <b>ID</b>
                  </th>
                  <th>NAMA LENGKAP</th>
                  <th>USERNAMA</th>
                  <!-- <th data-type="date" data-format="YYYY/DD/MM">NIK</th> -->
                  <th class="text-center">LEVEL</th>
                  <th class="text-center">TUPOKSI</th>
                  <th class="text-center">STATUS</th>
                  <th class="text-center">FOTO</th>
                  <th class="text-center">AKSI</th>
                </tr>
              </thead>
              <tbody>
                <tr class="align-middle">
                  <?php foreach ($selectadmin as $dtUser) : ?>
                <tr>
                  <td class="text-center"><?= esc($dtUser['IdAdmin']) ?></td>
                  <td><?= esc($dtUser['NamaAdmin']) ?></td>
                  <td><?= esc($dtUser['UserName']) ?></td>
                  <td class="text-center">
                    <?php if (esc($dtUser['Level']) == 1) : ?>
                      ADMINISTRATOR
                    <?php else : ?>
                      USER
                    <?php endif; ?>
                  </td>
                  <td class="text-center"><?= esc($dtUser['Tupoksi']) ?></td>
                  <td class="text-center">
                    <?php if (esc($dtUser['Status']) == 1) : ?>
                      AKTIF
                    <?php else : ?>
                      TIDAK AKTIF
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if ($dtUser['Foto']) : ?>
                      <?php $fotoPath = base_url('uploads/' . $dtUser['Foto']); ?>
                      <img src="<?= $fotoPath ?>" alt="Foto" class="rounded" style="width: 50px; height: 50px;">
                      <!-- <?php echo $fotoPath; // Tambahkan ini untuk debug 
                            ?> -->
                    <?php else : ?>
                      <span>No Photo</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <button class="btn btn-outline-success btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update" onclick="confirmSubmit(event)">
                      <i class="bi bi-arrow-right-circle"></i>
                    </button>
                    <button class="btn btn-danger btn btn-sm btn-delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" onclick="confirmDelete(<?= esc($dtUser['IdAdmin']); ?>)" data-id="<?= esc($dtUser['IdAdmin']); ?>">
                      <i class="bi bi-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php endforeach ?>

              </tbody>
            </table>
            <!-- End Table with stripped rows -->


            <script>
              function confirmDelete(id) {
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = '<?= base_url('users/delusers/'); ?>' + id;
                  }
                });
              }
            </script>


          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?= $this->endsection() ?>