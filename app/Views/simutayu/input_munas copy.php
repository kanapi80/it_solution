<?= $this->extend('layout/template_simutayu'); ?>
<?= $this->section('content'); ?>
<style>
  #reportsChart {
    width: 100% !important;
    max-width: 100%;
  }
</style>

<main id="main" class="main">

  <!-- <div class="container mt-4"> -->
  <!--FORM INPUT dan TABEL dalam satu ROW agar sejajar -->
  <div class="row">
    <div class="col-12 col-md-6">
      <!-- FORM INPUT -->
      <div class="card text-dark bg-light">
        <div class="card-header p-1 m-0 ps-2">
          <i class="bi bi-journal-plus text-success"></i>
          <b class="text-dark ps-1"> FORM INPUT NUMERATOR & DENUMERATOR</b>
        </div>
        <div class="card-body p-0 ps-2 pe-2 text-secondary">
          <!-- Form content goes here -->
          <?php foreach ($getindikator as $item) : ?>
            <form class="row g-1" action="<?= base_url('simutayu/update_indikator') ?>" method="POST">
              <!-- <div class="col-md-12 mt-0">
              <label for="definisi" class="form-label form-label-sm">Judul Indikator</label>
              <input type="text" class="form-control form-control-xs" name="judul" id="judul" disabled>
              <input type="hidden" name="id" id="id">
            </div> -->
              <div class="col-md-6">
                <label for="tujuan" class="form-label form-label-sms">Jenis Mutu</label>
                <input type="text" class="form-control form-control-xsx text-secondary" placeholder="-" name="tujuan" id="tujuan" value="<?= $item['NamaJenis']; ?>" disabled>
              </div>

              <div class="col-md-6">
                <label for="definisi" class="form-label form-label-sms">Penanggung Jawab</label>
                <input type="text" class="form-control form-control-xsx text-secondary" name="definisi" id="definisi" placeholder="-" value="<?= $item['nama_pj']; ?>" disabled>
              </div>

              <div class="col-md-10">
                <label for="inklusi" class="form-label form-label-sms">Indikator</label>
                <input type="text" class="form-control form-control-xsx text-secondary" placeholder="-" name="inklusi" id="inklusi" value="<?= $item['nama']; ?>" disabled>
              </div>

              <div class="col-md-2">
                <label for="eksklusi" class="form-label form-label-sms">Standar</label>
                <input type="text" class="form-control form-control-xsx text-secondary" placeholder="-" name="eksklusi" id="eksklusi" value="<?= $item['standar']; ?>" disabled>
              </div>
              <div class="col-md-4">
                <label for="eksklusi" class="form-label form-label-sms">Tanggal Penilaian</label>
                <input type="date" class="form-control form-control-xsx fw-bold" placeholder="-" name="eksklusi" id="eksklusi" value="<?php echo date('Y-m-d'); ?>" max="<?= date('Y-m-d'); ?>">
              </div>

              <div class="col-md-8">
                <label for="numerator" class="form-label form-label-sms">Keterangan</label>
                <input type="text" class="form-control form-control-xsx" placeholder="Isi Keterangan..." name="keterangan" id="keterangan"></input>
              </div>
              <div class="col-md-6">
                <label for="numerator" class="form-label form-label-sms">Numerator</label>

                <input type="number" min="0" class="form-control form-control-xsx fw-bold text-primary" placeholder="Isi Numerator..." name="keterangan" id="keterangan" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;font-size:14px"></input>
                <textarea class="form-control form-control-xsx text-secondary border-0" style="font-size: 9px;border-radius:0px;" aria-label="With textarea" rows="3" disabled><?= $item['num']; ?></textarea>
              </div>
              <div class="col-md-6 mb-1">
                <label for="denumerator" class="form-label form-label-sms">Denumerator</label>
                <input type="number" min="0" class="form-control form-control-xsx fw-bold text-primary" placeholder="Isi Denumerator..." name="keterangan" id="keterangan" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;font-size:14px"></input>
                <textarea class="form-control form-control-xs text-secondary border-0" style="font-size: 9px;border-radius:0px;" placeholder="Denumerator" name="denumerator" id="denumerator" rows="3" disabled><?= $item['denum']; ?></textarea>

              </div>

              <div class="col-md-12 text-end mt-1 mb-2">
                <button class="btn btn-success btn-xsx" type="submit"><i class="bi bi-save"></i> Save</button>
                <button class="btn btn-outline-success btn-xsx" type="reset"><i class="bi bi-arrow-clockwise"></i> Reset</button>
              </div>
            </form>
          <?php endforeach ?>
          <!-- end  -->
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6">
      <!-- TABEL -->
      <div class="card text-dark bg-light">
        <div class="card-header p-1 m-0 ps-2 pe-2">
          <i class="bi bi-journal-plus text-success"></i>
          <b class="text-dark ps-1"> PERIODE PENILAIAN</b>
        </div>
        <div class="card-body p-2 ps-2 pe-2 text-secondary">
          <!-- Table content goes here -->
          <?php foreach ($getindikator as $items) : ?>
            <div class="col-auto">
              <!-- <input type="text" name="unit_id" class="form-control form-control-sm" id="unit_id" placeholder="" value="<?php echo (session('Ses_Ruangan')); ?>"> -->
              <input type="hidden" name="unit_id" class="form-control form-control-sm" id="unit_id" placeholder="" value="<?= $items['id_users']; ?>">
              <input type="hidden" name="indikator_id" class="form-control form-control-sm" id="indikator_id" placeholder="" value="<?= $items['id']; ?>">
            </div>
            <div class="col-auto">
              <input type="month" name="tgl_tran" class="form-control form-control-sm" id="tgl_tran" value="<?= date('Y-m'); ?>" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;font-size:11px">
            </div>

            <!-- <div class="col-auto">
              <button type="button" class="btn btn-sm btn-outline-success" id="btn-filter">
                <i class="bi bi-search"></i> Filter
              </button>
            </div> -->
          <?php endforeach ?>
          <table class="table table-striped w-100 table-sm table-borderless" id="gettransindikator" style="font-size: 9px;">
            <thead>
              <tr>
                <th class="bg-success text-white text-center" width="10%">TANGGAL</th>
                <th class="bg-success text-white text-start" width="30%">KETERANGAN</th>
                <th class="bg-success text-white text-start" width="15%">NUMERATOR</th>
                <th class="bg-success text-white text-start" width="15%">DENUMERATOR</th>
                <th class="bg-success text-white text-start" width="15%">HASIL</th>
                <th class="bg-success text-white text-start" width="15%">AKSI</th>
              </tr>
            </thead>
            <tbody>
              <!-- Data akan diisi oleh DataTables -->
            </tbody>
          </table>
          <!-- end  -->
        </div>
      </div>
    </div>
  </div>



  <!-- GRAFIK -->
  <section class="section">
    <div class="row g-0">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card text-dark bg-light">
          <div class="card-header p-1 m-0 ps-3">
            <i class="bi bi-journal-plus text-success"></i>
            <b class="text-dark ps-1"> GRAFIK PENILAIAN UNIT</b>
          </div>
          <div class="card-body p-2 ps-3 text-secondary">
            <div class="row">
              <div class="col-12 text-white p-3 text-center">
                <div class="card-body p-0">
                  <h5 class="card-title">Grafik <span>/Penilai Unit</span></h5>
                  <!-- Line Chart -->
                  <div class="container-fluid">
                    <div id="reportsChart" class="w-100"></div>
                  </div>

                  <div class="mt-3">
                    <canvas id="chartCanvas"></canvas>
                  </div>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      // 1. Buat array tanggal dari 1 - 31 (X-axis)
                      var categories = Array.from({
                        length: 31
                      }, (_, i) => i + 1);

                      // 2. Data Numerator & Denominator berdasarkan tanggal input
                      var tanggalPenginputan = [2, 5, 8, 12, 15, 20, 25, 30]; // Tanggal yang memiliki data
                      var numerator = [10, 30, 50, 70, 60, 80, 90, 100]; // Contoh numerator
                      var denominator = [20, 60, 100, 80, 120, 100, 150, 200]; // Contoh denominator

                      // 3. Hitung hasil (Numerator / Denominator * 100)
                      var hasilData = categories.map((tanggal) => {
                        let index = tanggalPenginputan.indexOf(tanggal);
                        if (index !== -1) {
                          return ((numerator[index] / denominator[index]) * 100).toFixed(2); // Konversi ke persentase
                        }
                        return undefined; // Agar garis tidak putus
                      });

                      // Debugging data sebelum ditampilkan
                      console.log("Data Categories:", categories);
                      console.log("Data Hasil:", hasilData);

                      // 4. Render Grafik
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Hasil (%)',
                          data: hasilData
                        }],
                        chart: {
                          height: 300,
                          type: 'line', // Gunakan line chart agar berbentuk garis
                          toolbar: {
                            show: false
                          }
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1'],
                        xaxis: {
                          categories: categories,
                          title: {
                            text: "Tanggal dalam Bulan"
                          },
                          labels: {
                            formatter: (value) => `${value}`
                          }
                        },
                        yaxis: {
                          title: {
                            text: "Hasil (%)"
                          },
                          min: 0,
                          max: 100,
                          tickAmount: 5
                        },
                        tooltip: {
                          x: {
                            formatter: (value) => `Tanggal ${value}`
                          },
                          y: {
                            formatter: (value) => `${value}%`
                          }
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        markers: {
                          size: 4,
                          hover: {
                            size: 6
                          }
                        },
                        connectNulls: true // Menyambungkan titik kosong agar tidak putus
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





</main>
<script>
  $(document).ready(function() {
    var table = $('#gettransindikator').DataTable({
      "processing": true,
      "serverSide": true,
      "paging": true, // Aktifkan pagination
      "pageLength": 5, // Menampilkan 5 data per halaman
      "searching": false,
      "info": false,
      "lengthChange": false,
      "order": true,
      "ajax": {
        "url": "<?= base_url('simutayu/gettransindikator') ?>",
        "type": "GET",
        "data": function(d) {
          d.unit_id = $('#unit_id').val(); // Filter Ruangan
          d.tgl_tran = $('#tgl_tran').val();
          d.indikator_id = $('#indikator_id').val();

        },
        "dataSrc": function(json) {
          console.log(json); // Debugging untuk memeriksa data yang diterima
          return json.data ? json.data : [];
        },
        "error": function(xhr, error, thrown) {
          console.error('Error:', error, thrown);
        }
      },
      "columns": [{
          "data": "tgl_tran",
          "className": "text-center"
        },
        {
          // "data": "keterangan",
          // "className": "text-start"

          data: null,
          className: 'text-start',
          render: function(data, type, row) {
            function nl2br(str) {
              return str.replace(/\n/g, '<br>');
            }
            let badgeClass = '';
            let textColor = '';
            let fontWeight = '';

            if (row.keterangan === 'LIBUR') {
              badgeClass = 'bg-danger';
              fontWeight = 'font-weight-bold';
            } else {
              textColor = 'text-secondary';
              fontWeight = 'font-weight-normal';
            }
            return `<span class="badge ${badgeClass} ${textColor} ${fontWeight}">${row.keterangan}</span>`;

          }
        },
        {
          "data": "num",
          "className": "text-center"
        },
        {
          "data": "denum",
          "className": "text-center"
        },
        {
          "data": null,
          "className": "text-start",
          "render": function(data, type, row) {
            if (row.denum == 0) {
              return '<span class="text-danger">N/A</span>';
            } else {
              let hasil = (row.num / row.denum) * 100;
              return hasil.toFixed(2) + " %";
            }
          }
        },
        {
          "data": "user_id",
          "className": "text-center",
          "render": function(data, type, row) {
            // Membuat tombol Edit dan Hapus dengan parameter user_id
            return `
      <button class="btn btn-success btn-xsx" onclick="editRecord(${data})" style="font-size: 10px;padding: 0px 8px">
        <i class="bi bi-pencil-square"></i> 
      </button>
      <button class="btn btn-outline-danger btn-xsx" onclick="deleteRecord(${data})"  style="font-size: 10px;padding: 0px 8px">
        <i class="bi bi-trash"></i> 
      </button>
    `;
          }
        }
      ],
      drawCallback: function() {
        // Pastikan class pagination diubah dengan benar
        $('.dataTables_paginate .pagination').addClass('custom-pagination');

        // Menargetkan elemen .page-link agar lebih kecil
        $('.dataTables_paginate .pagination .page-item .page-link').css({
          'padding': '3px 5px',
          'font-size': '10px',
          'min-width': '25px',
          'height': '25px',
          'line-height': '15px'
        });


      },
      language: {
        "emptyTable": "Tidak ada data yang tersedia",
        "zeroRecords": "<div class='btn btn-secondary btn-sm' style='font-size: 10px;'>DATA TIDAK TERSEDIA</div>"
      },

      "initComplete": function(settings, json) {
        $('.dataTables_empty').addClass('bg-white text-white');
      },


    });

    //   $('#btn-filter').click(function() {
    //     table.ajax.reload(); // Reload DataTables dengan nilai filter baru
    //   });
    $('#tgl_tran, #unit_id, #indikator_id').on('change', function() {
      table.ajax.reload(); // Reload DataTables dengan filter baru
    });

  });
  //Grafik
</script>

<?= $this->endsection() ?>