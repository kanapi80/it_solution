<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>
  /* Menghilangkan semua garis pada tabel */
  #example,
  #example thead,
  #example tbody,
  #example th,
  #example td,
  #example tr {
    border: none !important;
  }

  /* Opsional: Menghilangkan garis bawah di header */
  #example thead th {
    border-bottom: none !important;
  }

  /* Opsional: Menghilangkan garis pemisah antar baris */
  #example tbody tr {
    border-bottom: none !important;
  }
</style>

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
<style>
  /* Menghilangkan border pada pagination */
  .dataTables_paginate .pagination {
    border: none;
  }

  /* Menghilangkan border di setiap tombol */
  .dataTables_paginate .pagination .page-item .page-link {
    border: none;
    box-shadow: none;
    /* Menghilangkan efek bayangan */
    background: transparent;
    /* Opsional: Buat transparan */
    color: #007bff;
    /* Warna teks */
  }

  /* Hover efek agar tetap terlihat */
  .dataTables_paginate .pagination .page-item .page-link:hover {
    background-color: rgba(0, 123, 255, 0.1);
  }

  /* Menghilangkan background pada tombol aktif */
  .dataTables_paginate .pagination .page-item.active .page-link {
    background-color: transparent;
    color: #0056b3;
    font-weight: bold;
  }
</style>


<?= $this->endsection() ?>