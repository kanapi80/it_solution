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
                <table class="table table-striped w-100 table-sm table-borderless" id="gettindakan" style="font-size: 10px;">
                  <thead>
                    <tr>
                      <th class="bg-success text-white text-center" width="1%">NO</th>
                      <th class="bg-success text-white text-center">ID</th>
                      <th class="bg-success text-white text-start">KELOMPOK TINDAKAN</th>
                      <th class="bg-success text-white text-start">NAMA TINDAKAN</th>
                      <th class="bg-success text-white text-start">NOMOR / TANGGAL SK</th>
                      <th class="bg-success text-white text-start">TARIF</th>
                      <th class="bg-success text-white text-start" width="8%">STATUS</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>

              </div>
            </div>

          </div>
        </div>
  </section>

</main><!-- End #main -->
<script>
  $(document).ready(function() {
    $('#gettindakan').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?= base_url('page/gettindakan') ?>",
        "type": "POST",

        "dataSrc": function(json) {
          console.log(json);
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
          render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },

        {
          "data": "ID",
          "className": "text-center",
          "searchable": true
        },
        {
          "data": "KELOMPOK_TINDAKAN",
          "className": "text-start"
        },
        {
          "data": "NAMA_TINDAKAN",
          "searchable": true
        },
        {
          data: 'TANGGAL_SK',
          render: function(data, type, row) {
            if (data) {
              // Format tanggal menjadi hanya "YYYY-MM-DD"
              const date = new Date(data);
              return row.NOMOR_SK + ' / ' + date.toISOString().split('T')[0]; // Hanya ambil bagian tanggal
            }
            return ''; // Jika data kosong, tampilkan string kosong
          },
          searchable: false
        },
        {
          "data": "TARIF",
          "searchable": true,
          "className": "text-end"
        },

        {
          "data": "STATUS",
          "className": "text-center",
          render: function(data, type, row) {
            return data === '1' ? ' <span class="badge bg-primary"> Aktif' : ' <span class="badge bg-danger"> Tidak Aktif';
          },
          "searchable": false
        },


      ],

      language: {
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


      },

      "deferRender": true,
      "initComplete": function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
        $('#example').css('font-size', '12px');
        $('#example thead th').css({
          'background-color': '#28a745',
          'color': 'white'
        });
        $('#example td, #example th').css('text-align', 'center');
        $('.dataTables_filter input').css('margin-bottom', '10px').css('font-size', '14px').addClass('form-control form-control-sm');
        $('.dataTables_length select').css('margin-bottom', '10px').css('font-size', '14px').addClass('form-select form-select-sm');
        $('.dt-info').css('font-size', '13px');
        $('.dt-input').css('font-size', '13px').css('padding', '5px').css('padding-right', '10px').css('padding-left', '10px');
        $('.dataTables_paginate').css('font-size', '11px');
        $('.dt-paging-button.current').css('font-size', '12px');
      }
    });

  });
</script>



<?= $this->endsection() ?>