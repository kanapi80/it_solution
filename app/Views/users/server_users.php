<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Users Server Side</h1>
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
          <div class="card-body mt-4">
            <table id="example" style="font-weight: 12px;">
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th class="text-left">Nama Admin</th>
                  <th class="text-left">Username</th>
                  <th>Level</th>
                  <th class="text-center">Status</th>
                  <th>Tupoksi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->


<script>
  $(document).ready(function() {
    $('#example').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?= base_url('users/getUsers') ?>",
        "paging": false,
        "type": "POST",

      },

      "columns": [{
          "data": "IdAdmin"
        },
        {
          "data": "NamaAdmin"
        },
        {
          "data": "UserName"
        },
        {
          "data": "Level"
        },
        {
          "data": "Status"
        },
        {
          "data": "Tupoksi"
        }
      ],
      "columnDefs": [{
        "targets": [0, 3, 4, 5], // Index kolom "Status"
        "className": "text-center"
      }]
    });
  });
</script>

<?= $this->endsection() ?>