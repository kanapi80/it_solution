<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">TAMBAH DATA USER</h6>
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
          <div class="card-body card-body-sm">
            <h6 class="card-title">Add User Form</h6>
            <hr class="hr1">
            <!-- Horizontal Form -->
            <form action="<?= base_url('users/simpanusers') ?>" method="post" id="myForm" enctype="multipart/form-data">
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name='name' autofocus>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail" name='username'>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" name='password'>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-4">
                  <select class="form-select" name="level">
                    <option value="">Pilih Level</option>
                    <option value="1">Administrator</option>
                    <option value="2">User</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                  <select class="form-select" name="status">
                    <option value="">Pilih Status</option>
                    <option value="1">AKTIF</option>
                    <option value="2">NON AKTIF</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tupoksi</label>
                <div class="col-sm-4">
                  <select class="form-select" name="tupoksi">
                    <option value="">Pilih Tupoksi</option>
                    <option value="Administrator">Administrator</option>
                    <option value="Programmer">Programmer</option>
                    <option value="Analist">Analist</option>
                    <option value="Analist">Administrasi</option>
                  </select>
                </div>
              </div>
              <!-- FOTO -->
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Pilih Foto</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control" id="file" name="file">
                </div>
              </div>
              <div class="text-left">
                <button type="submit" class="btn btn-primary" onclick="confirmSubmit(event)">Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- End Horizontal Form -->

            <script>
              function confirmSubmit(event) {
                event.preventDefault(); // Prevent the form from submitting

                Swal.fire({
                  title: 'Are you sure?',
                  text: "Do you want to save the changes?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    document.getElementById('myForm').submit(); // Submit the form
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