<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>
  th.sorting,
  th.sorting_asc,
  th.sorting_desc {
    background-image: none !important;
  }

  .form-control-sm,
  .btn-sm {
    font-size: 11px;
    height: 29px;
    padding: 3px 6px;
  }
</style>


<main id="main" class="main">

  <div class="pagetitle">
    <!-- <h6 class="fw-bold">REKON RUANGAN</h6> -->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item fw-bold text-black">JASPEL</li>
        <li class="breadcrumb-item">Rawat Inap</li>
        <!-- <li class="breadcrumb-item active">Data Jasa Rawat Inap</li> -->
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body mt-4">
            <div class="col-lg-12">
              <div class="row g-2 align-items-center mb-2">
                <!-- <div class="col-md-2"> -->
                <input type="text" name="ruangan" class="form-control form-control-sm" id="ruangan" value="<?php echo (session('Ses_UserName')); ?>" hidden>
                <!-- </div> -->
                <div class="col-md-2">
                  <select name="asuransi" class="form-control form-control-sm" id="asuransi">
                    <option value="">ASURANSI</option>
                    <?php foreach ($modelAsuransi as $asuransi): ?>
                      <option value="<?= $asuransi['paymentname']; ?>"><?= $asuransi['paymentname']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-1">
                  <select name="periode" id="periode" class="form-control form-control-sm">
                    <option value="">PERIODE</option>
                  </select>

                </div>
                <div class="col-md-2">
                  <select name="tahun" class="form-select form-control-sm" id="tahun">
                  </select>
                </div>
                <div class="col-md-3">
                  <input type="text" name="nama" class="form-control form-control-sm" id="nama" placeholder="Cari Nama ...">
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn btn-outline-success form-control-sm" id="btn-filter"><i class="bi bi-search"></i> Filter</button>

                </div>
                <div class="col-md-2 text-end">
                  <button class="btn btn-secondary btn-sm" id="copyButton" data-bs-toggle="tooltip" data-bs-placement="left" title="Copy Table"><i class="bi bi-copy"></i></button>
                </div>
              </div>

              <table class="table table-striped w-100 table-sm table-borderless" id="getjasaranap" style="font-size: 10px;">
                <thead>
                  <tr>
                    <th class="bg-success text-white text-center" width="1%">NO</th>
                    <th class="bg-success text-white text-start" width="20%">NOMR / PASIEN</th>
                    <th class="bg-success text-white text-start" width="21%">NAMA TINDAKAN</th>
                    <th class="bg-success text-white text-start" width="23%">RUANGAN / DOKTER</th>
                    <!-- <th class="bg-success text-white text-start" width="11%">RUANGAN</th> -->
                    <th class="bg-success text-white text-center" width="8%">TARIF</th>
                    <th class="bg-success text-white text-start" width="7%">MEDIS</th>
                    <th class="bg-success text-white text-start" width="7%">PARAMEDIS</th>
                    <th class="bg-success text-white text-start" width="7%">KEBERSAMAAN</th>
                    <th class="bg-success text-white text-start" width="7%">PERIODE</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Data akan diisi oleh DataTables -->
                </tbody>
                <tfoot>
                  <tr class="bg-success">
                    <th class="bg-success text-white"></th>
                    <th class="bg-success text-white"></th>
                    <!-- <th class="bg-success text-white"></th> -->
                    <th class="bg-success text-white"></th>
                    <th colspan="2" class="text-end bg-success text-white">JUMLAH</th>
                    <th class="bg-success text-white"></th>
                    <th class="bg-success text-white"></th>
                    <th class="bg-success text-white"></th>
                    <th class="bg-success text-white"></th>
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
  // $(document).ready(function() {
  //   $("#asuransi").change(function() {
  //     var asuransi = $(this).val();
  //     if (asuransi != '') {
  //       $.ajax({
  //         url: '<?= site_url('jaspel/getPeriodByAsuransi'); ?>/' + asuransi,
  //         method: 'GET',
  //         dataType: 'json',
  //         success: function(response) {
  //           var periodeSelect = $('#periode');
  //           periodeSelect.empty();
  //           periodeSelect.append('<option value="">-</option>');

  //           $.each(response, function(index, data) {
  //             periodeSelect.append('<option value="' + data.periode + '">' + data.periode + '</option>');
  //           });
  //         }
  //       });
  //     } else {
  //       $('#periode').empty();
  //       $('#periode').append('<option value="">-</option>');
  //     }
  //   });
  $(document).ready(function() {
    $("#asuransi").change(function() {
      var asuransi = $(this).val();

      if (asuransi != '') {
        // Load Periode
        $.ajax({
          url: '<?= site_url('jaspel/getPeriodByAsuransi'); ?>/' + asuransi,
          method: 'GET',
          dataType: 'json',
          success: function(response) {
            var periodeSelect = $('#periode');
            periodeSelect.empty();
            periodeSelect.append('<option value="">- Pilih Periode -</option>');

            $.each(response, function(index, data) {
              periodeSelect.append('<option value="' + data.periode + '">' + data.periode + '</option>');
            });
          }
        });

        // Load Tahun
        $.ajax({
          url: '<?= site_url('jaspel/getYearsByAsuransi'); ?>/' + asuransi,
          method: 'GET',
          dataType: 'json',
          success: function(response) {
            var tahunSelect = $('#tahu');
            tahunSelect.empty();
            tahunSelect.append('<option value="">- Pilih Tahun -</option>');

            $.each(response, function(index, data) {
              tahunSelect.append('<option value="' + data.tahun + '">' + data.tahun + '</option>');
            });
          }
        });
      } else {
        $('#periode').empty().append('<option value="">- Pilih Periode -</option>');
        $('#tahu').empty().append('<option value="">- Pilih Tahun -</option>');
      }
    });


    function copyTableToClipboard() {
      // Mendapatkan tabel
      var table = document.getElementById("myTable1");
      var range = document.createRange();
      range.selectNode(table);
      window.getSelection().removeAllRanges(); // Menghapus seleksi yang ada
      window.getSelection().addRange(range); // Menyimpan range ke seleksi
      try {
        // Menyalin isi tabel ke clipboard
        var successful = document.execCommand('copy');
        var msg = successful ? 'Tabel telah disalin ke clipboard!' : 'Gagal menyalin tabel.';
        alert(msg);
      } catch (err) {
        alert('Tidak dapat menyalin: ' + err);
      }

      window.getSelection().removeAllRanges(); // Menghapus seleksi
    }
  });
  $(document).ready(function() {
    var table = $('#getjasaranap').DataTable({
      "processing": true,
      "serverSide": true,
      "paging": false, // Aktifkan pagination
      "searching": false,
      "info": false, // Aktifkan pencarian
      "order": true,
      "ajax": {
        "url": "<?= base_url('jaspel/getjasaranap') ?>",
        "type": "GET",
        "data": function(d) {
          d.ruangan = $('#ruangan').val(); // Filter Ruangan
          d.periode = $('#periode').val(); // Filter Periode
          d.asuransi = $('#asuransi').val(); // Filter Asuransi
          d.tahun = $('#tahun').val(); // Filter Asuransi
          d.nama = $('#nama').val(); // Filter Asuransi
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
          "data": null,
          "className": "text-center",
          "sortable": false,
          "render": function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {
          "data": null,
          "className": "text-start",
          "render": function(data, type, row) {
            // Fungsi untuk mengganti newline dengan <br>
            function nl2br(str) {
              return str.replace(/\n/g, '<br>');
            }
            // Gabungkan field NomorRekamMedis dan NamaPasien dengan <br>
            return '<b>' + row.NomorRekamMedis + '</b>' + '<br>' + row.NamaPasien;
          }
        },
        {
          "data": null,
          "className": "text-start",
          "render": function(data, type, row) {
            function nl2br(str) {
              return str.replace(/\n/g, '<br>');
            }
            // Gabungkan field Periode dan Tahun dengan pemisah "-"
            return '<b>' + row.KelompokTindakan + '</b>' + '<br>' + row.NamaTindakan;
          }
        },
        {
          "data": null,
          "className": "text-start",
          "render": function(data, type, row) {
            function nl2br(str) {
              return str.replace(/\n/g, '<br>');
            }
            // Gabungkan field Periode dan Tahun dengan pemisah "-"
            return '<b>' + row.NamaRuangan + '</b>' + '<br>' + row.NamaPelaksanaMedis;
          }
        },

        {
          "data": "TotalTarif",
          "searchable": false,
          "className": "text-center"
        },
        {
          "data": "JasaMedis",
          "className": "text-end",
          "searchable": false
        },

        {
          "data": "JasaParamedis",
          "className": "text-end",
          "searchable": false
        },
        {
          "data": "JasaKebersamaan",
          "className": "text-center",
          "searchable": false
        },
        {
          // Gabungkan Periode dan Tahun
          "data": null,
          "className": "text-center",
          "render": function(data, type, row) {
            // Gabungkan field Periode dan Tahun dengan pemisah "-"
            return '<b>' + row.NamaAsuransi + '</b>' + '</br>' + `<span class="badge bg-primary">${row.Periode}-${row.Tahun}</span>`;
          }
        }

      ],
      "createdRow": function(row, data, dataIndex) {
        // Menambahkan valign="middle" atau style inline ke setiap cell
        $(row).find('td').each(function() {
          $(this).css('vertical-align', 'middle');
        });
      },
      language: {
        "emptyTable": "Tidak ada data yang tersedia",
        "zeroRecords": "<div class='btn btn-secondary btn-sm' style='font-size: 10px;'>DATA TIDAK TERSEDIA</div>"
      },

      "initComplete": function(settings, json) {
        // Jika ingin menambahkan kelas tertentu pada pesan zeroRecords
        $('.dataTables_empty').addClass('bg-white text-white');
      },

      "footerCallback": function(row, data, start, end, display) {
        let api = this.api();
        let intVal = function(i) {
          return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
        };

        // Total calculation for the columns
        let totalmedis = api.column(5).data().reduce(function(a, b) {
          return intVal(a) + intVal(b);
        }, 0);
        let totaldokterumum = api.column(6).data().reduce(function(a, b) {
          return intVal(a) + intVal(b);
        }, 0);
        let totalparamedis = api.column(7).data().reduce(function(a, b) {
          return intVal(a) + intVal(b);
        }, 0);
        // let totalkebersamaan = api.column(9).data().reduce(function(a, b) {
        //   return intVal(a) + intVal(b);
        // }, 0);

        // Display totals in footer
        $(api.column(5).footer()).html(totalmedis.toLocaleString());
        $(api.column(6).footer()).html(totaldokterumum.toLocaleString());
        $(api.column(7).footer()).html(totalparamedis.toLocaleString());
        // $(api.column(9).footer()).html(totalkebersamaan.toLocaleString());
      },

    });

    $('#btn-filter').click(function() {
      table.ajax.reload(); // Reload DataTables dengan nilai filter baru
    });

    function pilihTahun() {
      const currentYear = new Date().getFullYear(); // Mendapatkan tahun sekarang
      const yearSelect = document.getElementById('tahun');

      // Menambahkan pilihan tahun mulai dari tahun sekarang sampai 3 tahun sebelumnya
      for (let i = currentYear; i >= currentYear - 2; i--) {
        const option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        yearSelect.appendChild(option);
      }
    }

    // Panggil fungsi untuk mengisi dropdown tahun
    pilihTahun();
  });
  document.getElementById("copyButton").addEventListener("click", function() {
    // Pilih tabel yang ingin disalin
    var table = document.getElementById("getjasaranap");

    // Salin tabel ke clipboard
    var range = document.createRange();
    range.selectNode(table);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);

    try {
      document.execCommand('copy');
      Swal.fire({
        icon: 'success',
        title: 'Copy Berhasil!',
        text: 'Silakan Paste di Ms.Excel',
        timer: 1900, // Durasi tampilan pesan dalam milidetik
        showConfirmButton: false // Tidak menampilkan tombol OK
      });
    } catch (err) {
      alert('Gagal menyalin tabel!');
    }

    window.getSelection().removeAllRanges();
    $("#periode").chained("#asuransi");

  });

  document.addEventListener("DOMContentLoaded", function() {
    document.body.classList.add("toggle-sidebar");
  });
</script>



<?= $this->endsection() ?>