<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>
  .form-control,
  .table {
    font-size: 0.65rem;
    /* Ukuran font lebih kecil */
  }

  .form-label,
  .btn,
  .form-select {
    font-size: 0.65rem;
    /* Ukuran font label lebih kecil */
    margin-bottom: 0.1rem;
    /* Jarak antara label dan input lebih kecil */
  }

  .input-group,
  .input-group-text,
  .form-control-sm {
    height: calc(1.5em + 0.65rem + 2px);
    /* Sesuaikan tinggi jika perlu */
  }

  .form-group {
    display: flex;
    flex-direction: column;
    /* Atur label di atas input */
    margin-bottom: 0.5rem;
    /* Jarak antar form-group */
  }

  .input-group-text {
    height: calc(1.5em + .75rem + 2px);
    /* Sesuaikan dengan tinggi input */
    display: flex;
    align-items: center;
    /* Vertikal center */
  }

  th {
    vertical-align: middle;
  }
</style>

<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold"> BRIDGING VCLAIM V2 BPJS</h6>
    </h6>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">VClaim</li>
        <li class="breadcrumb-item active fw-bold">BPJS</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <!-- Default Tabs -->
        <div class="card" style="border-top:3px solid #90caf9;border-bottom:3px solid #90caf9; border-radius: 3x">
          <!-- <div class="card"> -->
          <div class="card-body card-body-sm mt-2">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <!-- <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Referensi</button>
              </li> -->
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Peserta</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">S E P</button>
              </li>
              <!-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="rujukan-tab" data-bs-toggle="tab" data-bs-target="#rujukan" type="button" role="tab" aria-controls="rujukan" aria-selected="false">Rujukan</button>
              </li> -->
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="monitoring-tab" data-bs-toggle="tab" data-bs-target="#monitoring" type="button" role="tab" aria-controls="monitoring" aria-selected="false">Monitoring</button>
              </li>
            </ul>
            <div class="tab-content pt-2" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <div class="input-group mb-3 mt-3">
                  <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan NIK" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-primary btn-sm" id="peserta"><i class="bi bi-search"></i> Detail</button>
                  <button type="button" class="btn btn-success btn-sm" id="clearForm"><i class="bi bi-arrow-repeat"></i> Reset</button>
                </div>
                <!-- Form  -->
                <div id="pesertaFormContainer" class="mt-3" style="display: none;">
                  <form id="pesertaForm">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="noKartu" class="form-label">No Kartu</label>
                        <input type="text" id="noKartu" class="form-control form-control-sm" readonly>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" id="niks" class="form-control form-control-sm" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" class="form-control form-control-sm fw-bold" readonly>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="sex" class="form-label">Jenis Kelamin</label>
                        <input type="text" id="sex" class="form-control form-control-sm" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="noMR" class="form-label">No MR</label>
                        <input type="text" id="noMR" class="form-control form-control-sm" readonly>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="noTelepon" class="form-label">No Telepon</label>
                        <input type="text" id="noTelepon" class="form-control form-control-sm" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                        <input type="text" id="tglLahir" class="form-control form-control-sm" readonly>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="umur" class="form-label">Umur Sekarang</label>
                        <input type="text" id="umur" class="form-control form-control-sm" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="statusPeserta" class="form-label">Status Peserta</label>
                        <input type="text" id="statusPeserta" class="form-control form-control-sm fw-bold" readonly>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="provider" class="form-label">Provider</label>
                        <input type="text" id="provider" class="form-control form-control-sm" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="jenisPeserta" class="form-label">Jenis Peserta</label>
                        </span>
                        <input type="text" id="jenisPeserta" class="form-control form-control-sm" readonly>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="hakKelas" class="form-label">Hak Kelas</label>
                        <input type="text" id="hakKelas" class="form-control form-control-sm" readonly>
                      </div>
                    </div>


                  </form>

                  <!-- end form  -->
                </div>
              </div>
              <div class=" tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="input-group mb-3 mt-3">
                  <input type="text" name="nomorsep" id="nomorsep" class="form-control" placeholder="Masukan Nomor SEP" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-primary btn-sm" id="sep"><i class="bi bi-search"></i> Detail</button>
                  <button type="button" class="btn btn-success btn-sm" id="clearsepForm"><i class="bi bi-arrow-repeat"></i> Reset</button>
                </div>
                <div id="sepFormContainer" class="mt-3" style="display: none;">
                  <form id="sepForm">
                    <div class="row">
                      <div class="col-md-6 mb-3 form-group">
                        <label for="noSep" class="form-label">No SEP</label>
                        <input type="text" id="noSep" class="form-control form-control-sm" readonly>
                      </div>
                      <div class="col-md-6 mb-3 form-group">
                        <label for="tglSep" class="form-label">Tanggal SEP</label>
                        <input type="text" id="tglSep" class="form-control form-control-sm" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3 form-group">
                        <label for="jnsPelayanan" class="form-label">Jenis Pelayanan</label>
                        <input type="text" id="jnsPelayanan" class="form-control form-control-sm" readonly>
                      </div>
                      <div class="col-md-6 mb-3 form-group">
                        <label for="kelasRawat" class="form-label">Kelas Rawat</label>
                        <input type="text" id="kelasRawat" class="form-control form-control-sm" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3 form-group">
                        <label for="diagnosa" class="form-label">Diagnosa</label>
                        <input type="text" id="diagnosa" class="form-control form-control-sm" hidden>
                        <input type="text" id="codesx" class="form-control form-control-sm" readonly>
                        <input type="text" id="codes" class="form-control form-control-sm" name="codes" hidden>
                      </div>
                      <div class="col-md-6 mb-3 form-group">
                        <label for="noRujukan" class="form-label">No Rujukan</label>
                        <input type="text" id="noRujukan" class="form-control form-control-sm" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3 form-group">
                        <label for="poli" class="form-label">Poli</label>
                        <input type="text" id="poli" class="form-control form-control-sm" readonly>
                      </div>
                      <div class="col-md-6 mb-3 form-group">
                        <label for="nmStatusKecelakaan" class="form-label">Status Kecelakaan</label>
                        <input type="text" id="nmStatusKecelakaan" class="form-control form-control-sm" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3 form-group">
                        <label for="noKartu" class="form-label">No Kartu</label>
                        <input type="text" id="noKartusep" class="form-control form-control-sm" readonly>
                      </div>
                      <div class="col-md-6 mb-3 form-group">
                        <label for="namaPeserta" class="form-label">Nama Peserta</label>
                        <input type="text" id="namaPeserta" class="form-control form-control-sm fw-bold" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3 form-group">
                        <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                        <input type="text" id="tglLahirsep" class="form-control form-control-sm" readonly>
                      </div>
                      <div class="col-md-6 mb-3 form-group">
                        <label for="kelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" id="kelamin" class="form-control form-control-sm" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3 form-group">
                        <label for="jnsPeserta" class="form-label">Jenis Peserta</label>
                        <input type="text" id="jnsPeserta" class="form-control form-control-sm" readonly>
                      </div>
                      <div class="col-md-6 mb-3 form-group">
                        <label for="hakKelas" class="form-label">Hak Kelas</label>
                        <input type="text" id="hakKelassep" class="form-control form-control-sm" readonly>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3 form-group">
                        <label for="dpjp" class="form-label">DPJP</label>
                        <input type="text" id="dpjp" class="form-control form-control-sm" readonly>
                      </div>
                      <!-- </div> -->
                      <!-- <div class="row"> -->
                      <div class="col-md-6 mb-3 form-group">
                        <label for="tujuanKunj" class="form-label form-label-sm">Tujuan Kunjungan</label>
                        <input type="text" id="tujuanKunj" class="form-control form-control-sm" readonly>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
              <div class="tab-pane fade" id="rujukan" role="tabpanel" aria-labelledby="rujukan-tab">
                <form action="<?= site_url('jkn/merge-pdf') ?>" method="post" enctype="multipart/form-data">
                  <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control w-50" placeholder="Masukan No Rujukan" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Tampilkan Detail</button>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="monitoring" role="tabpanel" aria-labelledby="monitoring-tab">

                <div class="row">
                  <div class="col-md-4  form-group">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check small" name="btnradio" id="monkunjungan" autocomplete="off" checked>
                      <label class="btn btn-outline-primary btn-sm" for="monkunjungan">Kunjungan</label>

                      <input type="radio" class="btn-check small" name="btnradio" id="monklaim" autocomplete="off">
                      <label class="btn btn-outline-primary btn-sm" for="monklaim">Klaim</label>

                      <input type="radio" class="btn-check small" name="btnradio" id="monhistory" autocomplete="off">
                      <label class="btn btn-outline-primary btn-sm" for="monhistory">History</label>

                      <input type="radio" class="btn-check small" name="btnradio" id="monklaimjr" autocomplete="off">
                      <label class="btn btn-outline-primary btn-sm" for="monklaimjr">Klaim JR</label>
                    </div>
                  </div>
                  <!-- RIWAYAT SEP -->
                  <div class="col-md-4 form-group" id="formkunjungantableContainer" style="display: none;">
                    <div class="input-group">
                      <button class="btn btn-secondary btn-sm" type="button" id="button-addon1">Tanggal SEP</button>
                      <input type="text" class="form-control" id="montglsep" placeholder="Pilih Tanggal" onfocus="(this.type='date')" onblur="if(!this.value){this.type='text'}">
                    </div>
                  </div>
                  <div class="col-md-4 form-group" id="formkunjungantableContainers" style="display: none;">
                    <div class="input-group">
                      <select class="form-select form-select-sm" id="monjeniskunjungan" aria-label="Example select with button addon">
                        <option selected>Pilih Jenis Kunjungan</option>
                        <option value="2">Rawat Jalan</option>
                        <option value="1">Rawat Inap</option>
                      </select>
                      <button class="btn btn-primary btn-sm" id="btnmonkunjungan"><i class="bi bi-search"></i> Detail</button>
                      <button type="button" class="btn btn-success btn-sm" id="clearkunjunganForm"><i class="bi bi-arrow-repeat"></i> Reset</button>
                    </div>
                  </div>
                  <div id="kunjungantableContainer" class="mt-3" style="display: none;">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">SEP</th>
                          <th class="text-center">Tanggal SEP</th>
                          <th class="text-center">Jenis<br>Pelayanan</th>
                          <th class="text-center">Kelas<br>Rawat</th>
                          <th>Poli</th>
                          <th>No Kartu</th>
                          <th>Nama</th>
                          <th>Diagnosa</th>
                          <th>No Rujukan</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                  <!-- END RIWAYAT SEP -->
                  <!-- HISTRORY KUNJUNGAN  -->
                  <div class="col-md-3 form-group" id="monnokartu" style="display: none;">
                    <div class="input-group">
                      <button class="btn btn-secondary btn-sm" type="button" id="button-addon1">Nomor Kartu</button>
                      <input type="text" class="form-control" id="nokartu_history" placeholder="Input Nomor Kartu" required>
                    </div>
                  </div>
                  <div class="col-md-5 form-group" id="montgl1" style="display: none;">
                    <div class="input-group">
                      <input type="text" class="form-control" id="montglawal" placeholder="Pilih Tanggal Awal" onfocus="(this.type='date')" onblur="if(!this.value){this.type='text'}">
                      <input type="text" class="form-control" id="montglakhir" placeholder="Pilih Tanggal Akhir" onfocus="(this.type='date')" onblur="if(!this.value){this.type='text'}">
                      <button class="btn btn-primary btn-sm" id="btnmonhistory"><i class="bi bi-search"></i> Detail</button>
                      <button type="button" class="btn btn-success btn-sm" id="clearkunjunganForm"><i class="bi bi-arrow-repeat"></i> Reset</button>
                    </div>
                  </div>
                  <div id="historykunjungantableContainer" class="mt-3" style="display: none;">
                    <table id="datahistory" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">SEP</th>
                          <th class="text-center">Tanggal SEP</th>
                          <th class="text-center">Jenis<br>Pelayanan</th>
                          <th class="text-center">Kelas<br>Rawat</th>
                          <th>Poli</th>
                          <th>No Kartu</th>
                          <th>Nama</th>
                          <th>Diagnosa</th>
                          <th>No Rujukan</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                    <!-- </div> -->
                    <!-- END HISTRORY KUNJUNGAN -->
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
    $('#peserta').on('click', function() {
      const nik = $('#nik').val();
      const niks = $('#niks').val();
      $.ajax({
        url: '<?= site_url('vclaim/peserta/') ?>' + nik,
        // url: '<?= env('WEBSERVICE_VCLAIM') ?>vclaim/peserta-nik/' + nik,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          if (data.status) {
            const peserta = data.data.peserta; // Pastikan untuk menyesuaikan dengan struktur data
            $('#noKartu').val(peserta.noKartu);
            $('#niks').val(peserta.nik);
            $('#nama').val(peserta.nama);
            $('#sex').val(peserta.sex === 'L' ? 'Laki-laki' : 'Perempuan');
            $('#pisa').val(peserta.pisa);
            $('#noMR').val(peserta.mr.noMR);
            $('#noTelepon').val(peserta.mr.noTelepon);
            $('#tglLahir').val(peserta.tglLahir);
            $('#umur').val(peserta.umur.umurSekarang);
            $('#statusPeserta').val(peserta.statusPeserta.keterangan);
            $('#provider').val(peserta.provUmum.nmProvider);
            $('#jenisPeserta').val(peserta.jenisPeserta.keterangan);
            $('#hakKelas').val(peserta.hakKelas.keterangan);
            $('#pesertaFormContainer').show();
          } else {
            alert('Error: ' + data.message);
            $('#pesertaFormContainer').hide(); // Sembunyikan form jika ada error
          }
        },
        error: function(response) {
          console.log(response);
          alert('Gagal memuat data. Silakan coba lagi.');

          $('#pesertaFormContainer').hide(); // Sembunyikan form jika ada error
        }
      });
    });
    //SEP
    $('#sep').on('click', function() {
      const nomorsep = $('#nomorsep').val();
      const tglLahirsep = $('#tglLahirsep').val();
      $.ajax({
        url: '<?= site_url('vclaim/seppelayanan/') ?>' + nomorsep,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          if (data.status) {
            const sep = data.data; // Sesuaikan dengan struktur data
            const icdname = `${sep.codes} - ${sep.diagnosa}`;
            $('#noSep').val(sep.noSep);
            $('#tglSep').val(sep.tglSep);
            $('#jnsPelayanan').val(sep.jnsPelayanan);
            $('#kelasRawat').val(sep.kelasRawat);
            $('#diagnosa').val(sep.diagnosa);
            $('#noRujukan').val(sep.noRujukan);
            $('#poli').val(sep.poli);
            $('#nmStatusKecelakaan').val(sep.nmstatusKecelakaan);
            $('#noKartusep').val(sep.peserta.noKartu);
            $('#namaPeserta').val(sep.peserta.nama);
            $('#tglLahirsep').val(sep.peserta.tglLahir);
            $('#kelamin').val(sep.peserta.kelamin === 'P' ? 'Perempuan' : 'Laki-laki');
            $('#jnsPeserta').val(sep.peserta.jnsPeserta);
            $('#hakKelassep').val(sep.peserta.hakKelas);
            $('#dpjp').val(sep.dpjp.nmDPJP);
            $('#tujuanKunj').val(sep.tujuanKunj.nama);
            $('#codes').val(sep.codes);
            $('#codesx').val(icdname);
            $('#sepFormContainer').show(); // Tampilkan form setelah data berhasil diambil
          } else {
            swal("Error!", data.message, "error");
            $('#sepFormContainer').hide();
          }
        },
        error: function(response) {
          console.log(response);
          swal("Gagal!", "Gagal memuat data. Silakan coba lagi.", "error");
          $('#sepFormContainer').hide();
        }
      });
    });
    //MONITORING KUNJUNGAN
    $('#btnmonkunjungan').on('click', function() {
      const montglsep = $('#montglsep').val();
      const monjeniskunjungan = $('#monjeniskunjungan').val();

      $.ajax({
        url: '<?= site_url('vclaim/datakunjungan/') ?>' + montglsep + '/' + monjeniskunjungan,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          const tbody = document.querySelector('#datatable tbody');
          tbody.innerHTML = ''; // Bersihkan tabel sebelum menambahkan data baru

          if (data.status) {
            const sepData = data.data.sep; // Pastikan ini sesuai dengan struktur JSON Anda

            // Loop melalui setiap item di sepData
            sepData.forEach((item, index) => {
              const row = document.createElement('tr');
              row.innerHTML = `
              <td class="text-center">${index + 1}</td>
                        <td class="text-center">${item.noSep}</td>
                        <td class="text-center">${item.tglSep}</td>
                        <td class="text-center">${item.jnsPelayanan}</td>
                        <td class="text-center">${item.kelasRawat}</td>
                        <td>${item.poli}</td>
                        <td>${item.noKartu}</td>
                        <td>${item.nama}</td>
                        <td>${item.diagnosa}</td>
                        <td>${item.noRujukan}</td>
                    `;
              tbody.appendChild(row);
            });

            $('#kunjungantableContainer').show(); // Tampilkan form setelah data berhasil diambil
          } else {
            swal("Error!", data.message, "error");
            $('#kunjungantableContainer').hide();
          }
        },
        error: function(response) {
          console.log(response);
          swal("Gagal!", "Gagal memuat data. Silakan coba lagi.", "error");
          $('#kunjungantableContainer').hide();
        }
      });
    });
    //HISTORY KUNJUNGAN
    $('#btnmonhistory').on('click', function() {
      const nokartu_history = $('#nokartu_history').val();
      const montglawal = $('#montglawal').val();
      const montglakhir = $('#montglakhir').val();

      $.ajax({
        url: '<?= site_url('vclaim/historykunjungan/') ?>' + nokartu_history + '/' + montglawal + '/' + montglakhir,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          const tbody = document.querySelector('#datahistory tbody');
          tbody.innerHTML = ''; // Bersihkan tabel sebelum menambahkan data baru

          if (data.status) {
            const historiData = data.data.histori; // Pastikan ini sesuai dengan struktur JSON Anda

            // Loop melalui setiap item di sepData
            historiData.forEach((item, index) => {
              const row = document.createElement('tr');
              row.innerHTML = `
              <td class="text-center">${index + 1}</td>
                        <td class="text-center">${item.noSep}</td>
                        <td class="text-center">${item.tglSep}</td>
                        <td class="text-center">${item.jnsPelayanan === '1' ? 'R.Jalan' : item.jnsPelayanan === '2' ? 'R.Inap' : ''}</td>
                        <td>${item.kelasRawat}</td>
                        <td>${item.poli}</td>
                        <td>${item.noKartu}</td>
                        <td>${item.namaPeserta}</td>
                        <td>${item.diagnosa}</td>
                        <td>${item.noRujukan}</td>
                    `;
              tbody.appendChild(row);
            });

            $('#historykunjungantableContainer').show(); // Tampilkan form setelah data berhasil diambil
          } else {
            swal("Error!", data.message, "error");
            $('#historykunjungantableContainer').hide();
          }
        },
        error: function(response) {
          console.log(response);
          swal("Gagal!", "Gagal memuat data. Silakan coba lagi.", "error");
          $('#historykunjungantableContainer').hide();
        }
      });
    });
    //END HISTORY

    $('#clearsepForm').on('click', function() {
      $('#sepForm')[0].reset(); // Reset form inputs
      $('#sepFormContainer').hide(); // Sembunyikan form
      $('#nomorsep').val(''); // Kosongkan input No SEP
    });
    $('#clearForm').on('click', function() {
      $('#pesertaForm')[0].reset(); // Reset form inputs
      $('#pesertaFormContainer').hide(); // Sembunyikan form
      $('#nik').val(''); // Kosongkan input No SEP
    });
    $('#clearkunjunganForm').on('click', function() {
      $('#kunjungantableContainer').hide(); // Sembunyikan form
      $('#monjeniskunjungan').val(''); // Kosongkan input No SEP
      $('#montglsep').val(''); // Kosongkan input No SEP
    });
    $('#monkunjungan').on('click', function() {
      $('#formkunjungantableContainer').show();
      $('#formkunjungantableContainers').show();
      $('#monnokartu').hide();
      $('#montgl1').hide();
      $('#historykunjungantableContainer').hide();
    });
    $('#monklaim').on('click', function() {
      $('#formkunjungantableContainer').hide();
      $('#formkunjungantableContainers').hide();
    });
    $('#monhistory').on('click', function() {
      $('#monnokartu').show();
      $('#montgl1').show();
      $('#formkunjungantableContainers').hide();
      $('#formkunjungantableContainer').hide();
      $('#kunjungantableContainer').hide();
    });



    function showDetail() {
      const nik = document.getElementById('nik').value;
      if (nik) {
        // Lakukan sesuatu dengan nilai NIK
        console.log('Nilai NIK:', nik);
        // Jika ingin mengarahkan ke URL dengan NIK sebagai parameter:
        window.location.href = '<?= site_url('vclaim/peserta/') ?>' + nik;
      } else {
        alert('Silakan masukkan NIK.');
      }
    }
  })
</script>
<?= $this->endsection() ?>