<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">REKON RUANGAN</h6>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">JASPEL</a></li>
        <li class="breadcrumb-item">Rawat Inap</li>
        <li class="breadcrumb-item active">Data Jasa Rawat Inap</li>
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
                <table class="table table-striped w-100 table-sm table-borderless" id="getjasaranap" style="font-size: 10px;">
                  <thead>
                    <tr>
                      <th class="bg-success text-white text-center">NO</th>
                      <th class="bg-success text-white text-center">NOMR</th>
                      <th class="bg-success text-white text-start">NAMA</th>
                      <th class="bg-success text-white text-start">NAMA TINDAKAN</th>
                      <th class="bg-success text-white text-start">KELOMPOK TINDAKAN</th>
                      <th class="bg-success text-white text-start">DOKTER</th>
                      <th class="bg-success text-white text-center">TARIF</th>
                      <th class="bg-success text-white text-start">MEDIS</th>
                      <th class="bg-success text-white text-start">MEDIS UMUM</th>
                      <th class="bg-success text-white text-start">PARAMEDIS</th>
                      <th class="bg-success text-white text-start">KEBERSAMAAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Data akan diisi oleh DataTables -->
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="7" class="text-end">Sub Total</th>
                      <!-- <th></th> -->
                      <!-- <th></th> -->
                      <!-- <th></th> -->
                      <!-- <th></th> -->
                      <!-- <th></th> -->
                      <!-- <th></th> -->
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>

              </div>
            </div>

          </div>
        </div>
  </section>

</main><!-- End #main -->
<script>
  $(document).ready(function() {
    $('#getjasaranap').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?= base_url('jaspel/getjasaranap') ?>",
        "type": "get",
        "dataSrc": function(json) {
          console.log(json); // Periksa data yang diterima
          return json.data;
        },
        "error": function(xhr, error, thrown) {
          console.error('Error:', error, thrown);
        }
      },
      "columns": [{
          "data": null,
          "className": "text-center",
          "sortable": false,
          "render": function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {
          "data": "NomorRekamMedis",
          "className": "text-center"
        },
        {
          "data": "NamaPasien",
          "className": "text-start"
        },
        {
          "data": "NamaTindakan",
          "searchable": false
        },
        {
          "data": "KelompokTindakan"
        },
        {
          "data": "NamaPelaksanaMedis"
        },
        {
          "data": "TotalTarif",
          "searchable": false,
          "className": "text-center"
        },
        {
          "data": "JasaMedis",
          "searchable": false
        },
        {
          "data": "JasaMedisUmum",
          "searchable": false
        },
        {
          "data": "JasaParamedis",
          "searchable": false,
          "render": function(data, type, row) {
            return parseFloat(data.replace(/[\$,]/g, '')) || 0; // Mengonversi string menjadi angka
          }
        },
        {
          "data": "JasaKebersamaan",
          "searchable": false
        }
      ],
      "pageLength": 10,
      "lengthMenu": [10, 25, 50, 75, 100],
      "footerCallback": function(row, data, start, end, display) {
        let api = this.api();

        // Fungsi untuk menghapus format dan mengubah data ke integer
        let intVal = function(i) {
          return typeof i === 'string' ?
            i.replace(/[\$,]/g, '') * 1 :
            typeof i === 'number' ? i : 0;
        };

        // Total untuk semua halaman
        totalmedis = api.column(7).data().reduce(function(a, b) {
          return intVal(a) + intVal(b);
        }, 0);
        // Total untuk semua halaman
        totalparamedis = api.column(9).data().reduce(function(a, b) {
          return intVal(a) + intVal(b);
        }, 0);
        // Total untuk semua halaman
        totaldokterumum = api.column(8).data().reduce(function(a, b) {
          return intVal(a) + intVal(b);
        }, 0);
        // Total untuk semua halaman
        totalkebersamaan = api.column(10).data().reduce(function(a, b) {
          return intVal(a) + intVal(b);
        }, 0);

        // Total Paramedis 
        pageTotal = api.column(7, {
          page: 'current'
        }).data().reduce(function(a, b) {
          return intVal(a) + intVal(b);
        }, 0);
        // Total Paramedis 
        pageTotal = api.column(9, {
          page: 'current'
        }).data().reduce(function(a, b) {
          return intVal(a) + intVal(b);
        }, 0);
        // Total Dokter Umum
        pageTotal = api.column(8, {
          page: 'current'
        }).data().reduce(function(a, b) {
          return intVal(a) + intVal(b);
        }, 0);
        // Total Kebersamaan
        pageTotal = api.column(10, {
          page: 'current'
        }).data().reduce(function(a, b) {
          return intVal(a) + intVal(b);
        }, 0);

        // Menampilkan hasil total di footer
        $(api.column(7).footer()).html(
          'Rp ' + pageTotal.toLocaleString() + ' (Total: Rp ' + totalmedis.toLocaleString() + ')'
        );
        // Menampilkan hasil total di footer
        $(api.column(8).footer()).html(
          'Rp ' + pageTotal.toLocaleString() + ' (Total: Rp ' + totaldokterumum.toLocaleString() + ')'
        );
        // Menampilkan hasil total di footer
        $(api.column(9).footer()).html(
          'Rp ' + pageTotal.toLocaleString() + ' (Total: Rp ' + totalparamedis.toLocaleString() + ')'
        );
        // Menampilkan hasil total di footer
        $(api.column(10).footer()).html(
          'Rp ' + pageTotal.toLocaleString() + ' (Total: Rp ' + totalkebersamaan.toLocaleString() + ')'
        );
      },
      "language": {
        "lengthMenu": " _MENU_ ",
        "search": "",
        "searchPlaceholder": "Cari data...",
        paginate: {
          first: '<button class="btn btn-outline-success btn-sm"> <i class="ri ri-rewind-fill"></i> </button>',
          last: '<button class="btn btn-outline-success btn-sm"> <i class="ri ri-rewind-fill" style="transform: scaleX(-1); display: inline-block;"></i> </button>',
          next: '<button class="btn btn-outline-success btn-sm"> <i class="ri ri-play-fill"></i> </button>',
          previous: '<button class="btn btn-outline-success btn-sm"> <i class="ri ri-play-fill" style="transform: scaleX(-1); display: inline-block;"></i> </button>',
          current: '<button class="btn btn-success btn-sm"> <i class="bi bi-skip-backward-fill"></i> </button>'
        },
        pagingType: "simple",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ Data",
        infoEmpty: "Menampilkan 0 - 0 dari 0 data",
        infoFiltered: "(filtered from _MAX_ total entries)",
      }
    });
  });
</script>



<?= $this->endsection() ?>