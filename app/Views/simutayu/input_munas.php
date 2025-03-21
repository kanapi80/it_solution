<?= $this->extend('layout/template_simutayu'); ?>
<?= $this->section('content'); ?>

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
            <form class="row g-1" action="<?= base_url('simutayu/simpan_indikator') ?>" method="post">
              <input type="hidden" name="id_mutu" id="id_mutu" value="<?= $item['id']; ?>">
              <input type="hidden" name="id" id="id" value="<?= $item['unit_id']; ?>">
              <input type="hidden" name="idu" id="idu" value="<?= $item['id_users']; ?>">
              <input type="hidden" name="jenis_id" id="jenis_id" value="<?= $item['jenis_id']; ?>">
              <div class="col-md-6">
                <label for="tujuan" class="form-label form-label-sms">Jenis Mutu</label>
                <input type="text" class="form-control form-control-xsx text-secondary" placeholder="-" name="jenis" id="jenis" value="<?= $item['NamaJenis']; ?>" disabled>
              </div>
              <div class="col-md-6">
                <label for="definisi" class="form-label form-label-sms">Penanggung Jawab</label>
                <input type="text" class="form-control form-control-xsx text-secondary" name="pj" id="pj" placeholder="-" value="<?= $item['nama_pj']; ?>" disabled>
              </div>
              <div class="col-md-10">
                <label for="inklusi" class="form-label form-label-sms">Indikator</label>
                <input type="text" class="form-control form-control-xsx text-secondary" placeholder="-" name="indikator" id="indikator" value="<?= $item['nama']; ?>" disabled>
              </div>
              <div class="col-md-2">
                <label for="eksklusi" class="form-label form-label-sms">Standar</label>
                <input type="text" class="form-control form-control-xsx text-secondary" placeholder="-" name="standar" id="standar" value="<?= $item['standar']; ?>" disabled>
              </div>
              <div class="col-md-4">
                <label for="eksklusi" class="form-label form-label-sms">Tanggal Penilaian</label>
                <input type="date" class="form-control form-control-xsx fw-bold" placeholder="-" name="tgl_penilaian" id="tgl_penilaian" value="<?php echo date('Y-m-d'); ?>" max="<?= date('Y-m-d'); ?>">
              </div>
              <div class="col-md-8">
                <label for="numerator" class="form-label form-label-sms">Keterangan</label>
                <input type="text" class="form-control form-control-xsx" placeholder="Isi Keterangan..." name="keterangan" id="keterangan"></input>
              </div>
              <div class="col-md-6">
                <label for="numerator" class="form-label form-label-sms">Numerator</label>
                <input type="number" min="0" class="form-control form-control-xsx fw-bold text-primary" placeholder="Isi Numerator..." name="nemurator" id="nemurator" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;font-size:14px"></input>
                <textarea class="form-control form-control-xsx text-secondary border-0" style="font-size: 9px;border-radius:0px;" aria-label="With textarea" rows="3" disabled><?= $item['num']; ?></textarea>
              </div>
              <div class="col-md-6 mb-1">
                <label for="denumerator" class="form-label form-label-sms">Denumerator</label>
                <input type="number" min="0" class="form-control form-control-xsx fw-bold text-primary" placeholder="Isi Denumerator..." name="denumerator" id="denumerator" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;font-size:14px"></input>
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
      <div class="card text-dark bg-light">
        <div class="card-header p-1 m-0 ps-2 pe-2">
          <i class="bi bi-journal-plus text-success"></i>
          <b class="text-dark ps-1"> PERIODE PENILAIAN</b>
        </div>
        <div class="card-body p-2 ps-2 pe-2 text-secondary">
          <?php foreach ($getindikator as $items) : ?>
            <div class="col-auto">
              <input type="hidden" name="unit_id" class="form-control form-control-sm" id="unit_id" placeholder="" value="<?= $items['id_users']; ?>">
              <input type="hidden" name="indikator_id" class="form-control form-control-sm" id="indikator_id" placeholder="" value="<?= $items['id']; ?>">
            </div>
            <div class="col-auto">
              <input type="month" name="tgl_tran" class="form-control form-control-sm fw-bold" id="tgl_tran" value="<?= date('Y-m'); ?>" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;font-size:11px" onchange="fetchData()">
            </div>
          <?php endforeach ?>
          <div class="table-responsive">
            <table class="table table-striped w-100 table-sm table-borderless" id="gettransindikator" style="font-size: 9px;">
              <thead>
                <tr>
                  <th class="bg-success text-white text-center" width="10%">TANGGAL</th>
                  <th class="bg-success text-white text-start" width="36%">KETERANGAN</th>
                  <th class="bg-success text-white text-start" width="12%">NUMERATOR</th>
                  <th class="bg-success text-white text-start" width="12%">DENUMERATOR</th>
                  <th class="bg-success text-white text-start" width="13%">HASIL</th>
                  <th class="bg-success text-white text-start" width="15%">AKSI</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
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
          <div class="card-body text-secondary">
            <div class="row">
              <div class="col-12 text-white text-center">
                <div class="card-body p-0">


                  <div class="card-body p-0" style="width: 100%;">
                    <div id="grafikIndikator" style="height: 200px; width: 100%;"></div>
                  </div>

                  <script>
                    let chart;

                    async function fetchData() {
                      const unit_id = document.getElementById("unit_id").value;
                      const indikator_id = document.getElementById("indikator_id").value;
                      const tgl_tran = document.getElementById("tgl_tran").value;
                      const response = await fetch(`<?= base_url('simutayu/getgrafikindikator') ?>?tgl_tran=${tgl_tran}&unit_id=${unit_id}&indikator_id=${indikator_id}`);
                      const result = await response.json();
                      if (result.status === 'error') {
                        alert(result.message);
                        return;
                      }
                      const labels = result.data.map(item => item.tanggal);
                      const values = result.data.map(item => item.hasil);

                      const options = {
                        chart: {
                          type: 'area',
                          height: 200,
                          toolbar: {
                            show: false
                          }
                        },
                        series: [{
                          name: 'Nilai Indikator (%)',
                          data: values
                        }],
                        xaxis: {
                          categories: labels,
                          title: {
                            text: 'Tanggal Periode Penilaian'
                          }
                        },
                        yaxis: {
                          min: 0,
                          max: 100,
                          title: {
                            text: 'Nilai Hasil (%)'
                          }
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 1,
                          colors: ['#f74608']
                        },
                        markers: {
                          size: 6,
                          colors: ['#198754'],
                          hover: {
                            size: 4
                          }
                        },

                        // fill: {
                        //   type: 'gradient',
                        //   gradient: {
                        //     shade: 'light',
                        //     type: 'vertical',
                        //     gradientToColors: ['#28a745', '#00ff00'],
                        //     stops: [0, 100],
                        //     opacityFrom: 0.7,
                        //     opacityTo: 0.2
                        //   }
                        colors: ['#198754', '#090f0b', '#090f0b'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        tooltip: {
                          theme: 'dark'
                        },
                        dataLabels: {
                          enabled: false

                        }
                      };
                      if (chart) {
                        chart.updateOptions(options);
                      } else {
                        chart = new ApexCharts(document.querySelector("#grafikIndikator"), options);
                        chart.render();
                      }
                    }
                    fetchData();
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
          "data": "keterangan",
          "className": "text-start"
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
          "data": "hasil",
          "className": "text-center"
        },
        {
          "data": "user_id",
          "className": "text-center",
          "render": function(data, type, row) {
            let tgl_tran = row.tgl_tran ? row.tgl_tran : '1970-01-01'; // Default jika tgl_tran kosong
            return `
    <button class="btn btn-success btn-xsx" onclick="editRecord(${data}, ${row.indikator_id}, '${tgl_tran}')" style="font-size: 10px;padding: 0px 8px">
        <i class="bi bi-pencil-square"></i> 
    </button>
    <button class="btn btn-outline-danger btn-xsx" 
        onclick="deleteRecord(${data}, ${row.indikator_id}, '${tgl_tran}')"  
        style="font-size: 10px;padding: 0px 8px">
        <i class="bi bi-trash"></i> 
    </button>
    `;
          }
        },
      ],
      drawCallback: function() {
        $('.dataTables_paginate .pagination').addClass('custom-pagination');
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
    $('#tgl_tran, #unit_id, #indikator_id').on('change', function() {
      table.ajax.reload();
    });

  });

  document.querySelectorAll('input[type="date"], input[type="month"]').forEach(function(input) {
    input.addEventListener('click', function() {
      this.showPicker();
    });




  });
  //Hapus
  function deleteRecord(user_id, indikator_id, tgl_tran) {
    console.log("Menghapus data dengan:", {
      user_id,
      indikator_id,
      tgl_tran
    }); // Debugging

    // Pastikan tgl_tran ada dan valid
    if (!tgl_tran || tgl_tran.length < 10) {
      Swal.fire("Error!", "Tanggal tidak valid!", "error");
      return;
    }

    Swal.fire({
      title: "Apakah Anda yakin?",
      text: "Data akan dihapus secara permanen!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Ya, Hapus!"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url('simutayu/delete_indikator') ?>",
          type: "POST",
          data: {
            user_id: user_id,
            indikator_id: indikator_id,
            tgl_tran: tgl_tran
          },
          dataType: "json",
          success: function(response) {
            console.log("Response dari server:", response); // Debugging
            if (response.status === "success") {
              Swal.fire("Terhapus!", "Data berhasil dihapus.", "success").then(() => {
                location.reload();
              });
            } else {
              Swal.fire("Gagal!", "Data gagal dihapus.", "error");
            }
          },
          error: function(xhr) {
            console.error("AJAX Error:", xhr.responseText); // Debugging
            Swal.fire("Error!", "Terjadi kesalahan pada server.", "error");
          }
        });
      }
    });
  }
</script>

<script>
  function editRecord(user_id, indikator_id, tgl_tran) {
    fetch(`<?= base_url('simutayu/get_indikator') ?>?user_id=${user_id}&indikator_id=${indikator_id}&tgl_tran=${tgl_tran}`)
      .then(response => response.json())
      .then(data => {
        if (data.status === "error") {
          alert(data.message);
          return;
        }

        // Masukkan data ke dalam form input
        document.getElementById("tgl_penilaian").value = data.tgl_tran;
        document.getElementById("keterangan").value = data.keterangan;
        document.getElementById("nemurator").value = data.num;
        document.getElementById("denumerator").value = data.denum;
      })
      .catch(error => console.error('Error:', error));
  }
</script>
<!-- <?php if (session()->getFlashdata('success')) : ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: '<?= session()->getFlashdata('success'); ?>',
      timer: 2000,
      showConfirmButton: false
    });
  </script>
<?php endif; ?> -->
<?= $this->endsection() ?>