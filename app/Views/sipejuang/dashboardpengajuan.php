<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>
    /* Menghilangkan semua garis pada tabel */
    #listpengajuan,
    #listpengajuan thead,
    #listpengajuan tbody,
    #listpengajuan th,
    #listpengajuan td,
    #listpengajuan tr {
        border: none !important;
    }

    #example thead th {
        border-bottom: none !important;
    }

    #example tbody tr {
        border-bottom: none !important;
    }
</style>

<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-dark fw-bold"> SIPEJUANG</li>
                <li class="breadcrumb-item">Dashboard</li>
            </ol>
        </nav>
    </div>
    <div class="card-body p-3 ps-3 pe-3">
        <div class="col-lg-12 mb-2">
            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Dashboard" class="btn btn-success btn-xsl p-2 btn-shadow" onclick="window.location.href='<?= base_url('sipejuang/dashboardpengajuan') ?>'">
                <i class="bi bi-house"></i>
            </button>
            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Form Permohonan" class="btn btn-outline-light btn-xsl p-2 btn-shadow text-success" onclick="window.location.href='<?= base_url('sipejuang/formpengajuan') ?>'">
                <i class="bi bi-record-circle"></i> Form Pengajuan
            </button>
            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Pengajuan Permohonan" class="btn btn-outline-light btn-xsl p-2 btn-shadow text-success" onclick="window.location.href='<?= base_url('sipejuang/listpengajuan') ?>'">
                <i class="bi bi-record-circle"></i> List Pengajuan
            </button>
            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Riwayat Pengajuan" class="btn btn-outline-light btn-xsl p-2 btn-shadow text-success" onclick="window.location.href='<?= base_url('sipejuang/riwayatpengajuan') ?>'">
                <i class="bi bi-record-circle"></i> Riwayat Pengajuan
            </button>
        </div>
        <div class="row mt-3 mb-0">
            <!-- ALL AJUAN  -->
            <div class="col-xxl-3 col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <div class="mt-2">
                            <h6 class="subtitle fw-bold">AJUAN</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <button type="button" class="btn btn-primary btn-sm fw-bold" id="all">0</button>
                            <i class="bi bi-journal-arrow-up fs-3 text-primary" data-bs-toggle="tooltip" data-bs-placement="left" title="Jumlah Pengajuan"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PROSES  -->
            <div class="col-xxl-3 col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <div class="mt-2">
                            <h6 class="subtitle fw-bold">DIPROSES</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <button type="button" class="btn btn-warning btn-sm fw-bold" id="pengajuan">0</button>
                            <i class="bi bi-journal-plus fs-3 text-warning" data-bs-toggle="tooltip" data-bs-placement="left" title="Pengajuan dalam Poses"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DISETUJUI -->
            <div class="col-xxl-3 col-md-3 mb-0">
                <div class="card info-card revenue-card">
                    <div class="card-body mb-0">
                        <div class="mt-2">
                            <h6 class="subtitle fw-bold">DISETUJUI</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <button type="button" class="btn btn-success btn-sm fw-bold" id="barang_ready">0</button>
                            <i class="bi bi-journal-check fs-3 text-success" data-bs-toggle="tooltip" data-bs-placement="left" title="Pengajuan disetujui"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DITOLAK -->
            <div class="col-md-3 mb-0">
                <div class="card info-card customers-card mb-0 mt-0 g-0">
                    <div class="card-body mb-0">
                        <div class="mt-2">
                            <h6 class="subtitle fw-bold">DITOLAK</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <button type="button" class="btn btn-danger btn-sm fw-bold" id="ditolak">0</button>
                            <i class="bi bi-journal-x fs-3 text-danger" data-bs-toggle="tooltip" data-bs-placement="left" title="Pengajuan ditolak"></i>
                        </div>
                    </div>
                </div>
            </div> <!-- End Customers Card -->
        </div>

        <section class="section">
            <div class="row"> <!-- Tambahkan row untuk menyatukan Grafik & Activity -->

                <!-- GRAFIK (Lebar 8 kolom) -->
                <div class="col-12 col-md-8">
                    <div class="card text-dark bg-light">
                        <div class="card-header p-2 m-0 ps-3">
                            <i class="bi bi-journal-plus text-success"></i>
                            <b class="text-dark ps-1">STATISTIK PENGAJUAN</b>
                        </div>
                        <div class="card-body text-secondary">
                            <div id="grafikPengajuan" style="height: 200px; width: 100%;"></div>
                            <!-- <div id="grafikPengajuan"></div> -->
                        </div>
                    </div>
                </div>
                <!-- END GRAFIK -->

                <!-- ACTIVITY (Lebar 4 kolom) -->
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header p-2 m-0 ps-3">
                            <i class="bi bi-journal-plus text-success"></i>
                            <b class="text-dark ps-1 ">JENIS AJUAN TERBANYAK </b>
                        </div>
                        <div class="card-body p-2 m-0 pe-3 ps-3">
                            <table class="table table-borderless" style="font-size: 11px;">
                                <thead>
                                    <tr class="bg-success" style="line-height: 1.6; padding: 3px 5px;">
                                        <th class="text-secondary" style="padding: 3px 5px; ">NAMA BARANG</th>
                                        <th class="text-center text-secondary" style="padding: 3px 5px;">JUMLAH</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($top as $index => $barang) : ?>
                                        <tr style="line-height: 1.6; padding: 2px 0;">
                                            <td class="text-secondary" style="padding: 1.5px 5px;"><?= esc($barang['nama_barang']) ?></td>
                                            <td class="text-center text-secondary" style="padding: 1.5px 5px;font-size:14px;"><button class="btn btn-xsx btn-outline-success p-1 pe-2 fw-bold"> <?= esc($barang['total']) ?> </button></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- END ACTIVITY -->
                </div> <!-- END ROW -->
        </section>


        <section class="section mt-0 mb-2">
            <div class="row g-0 mt-0">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card text-dark bg-light">
                        <div class="card-header p-2 m-0 pe-3 d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bi bi-journal-plus text-success"></i>
                                <b class="text-dark ps-1"> RIWAYAT AJUAN</b>
                            </div>
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Pengajuan Permohonan"
                                class="btn btn-danger btn-xsl p-1 btn-shadow"
                                onclick="window.location.href='<?= base_url('sipejuang/listpengajuan') ?>'">
                                Lihat Selengkapnya <i class="bi bi-arrow-right-circle-fill smooth-blink"></i>
                            </button>
                        </div>

                        <div class="card-body p-2 ps-3 pe-3 text-secondary">
                            <table class="table table-borderless w-100 table-sm table-striped" style="font-size: 10px;" id="listpengajuan">
                                <thead>
                                    <tr class="align-middle bg-success text-white">
                                        <th class="text-center bg-success text-white" width="3%">NO</th>
                                        <th class="text-start bg-success text-white ps-2" width="10%">JENIS BARANG</th>
                                        <th class="text-start bg-success text-white" width="12%">KORDINATOR</th>
                                        <th class="text-start bg-success text-white" width="15%">PPTK</th>
                                        <th class="text-center bg-success text-white" width="8%">TGL PENGAJUAN</th>
                                        <th class="text-start bg-success text-white" width="10%">STATUS</th>
                                        <th class="text-center bg-success text-white" width="5%">AKSI</th>
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
        <!-- DETIL PENGAJUAN -->
        <div class="modal fade modal-xl" id="detilhibah" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white py-1">
                        <h6 class="fw-bold fs-custom mt-1" style="font-size: 12px; margin: 1;">
                            <i class="bi bi-bootstrap"></i> DETIL PENGAJUAN PERMOHONAN
                        </h6>
                        </h6>
                        <button type="button" id="closehibah" data-bs-toggle="tooltip" data-bs-placement="right" title="Close" class="btn-close btn-success btn-xsl p-2">
                            <!-- <button type="button" id="closehibah" data-bs-toggle="tooltip" data-bs-placement="right" title="Close" class="btn-close btn-success btn-xsl p-2" onclick="window.location.href='<?= base_url('sipejuang/listpengajuan') ?>'"> -->
                            <i class="bi bi-x"></i>
                        </button>
                        <!-- <button type="button" class="btn-close btn-close-white" id="closehibah"></button> -->
                    </div>


                    <div class="modal-body p-0 ps-2 pe-2">
                        <div id="alerts-container">
                        </div>
                        <form class="row g-1 mb-2 form-control-sm" id="hargaForm" style="font-size: 10px;">
                            <div class="col-md-4">Pemohon
                                <!-- <label id="pemohonLabel"></label> -->
                                <input type="text" class="form-control form-control-xsx fw-bold border-0 p-0" id="pemohon" readonly>
                            </div>
                            <div class="col-md-4">Ruangan
                                <input type="text" class="form-control form-control-xsx fw-bold border-0 p-0" id="unit" readonly>
                            </div>
                            <div class="col-md-4">Status<br>
                                <!-- <input type="text" class="form-control form-control-xsx fw-bold border-0 p-0" readonly> -->
                                <button type="button" class="btn btn-xsx" id="myButton"></button>
                            </div>

                            <div class="col-md-4">Tgl.Pengajuan
                                <input type="text" class="form-control form-control-xsx fw-bold" id="tgl_pengajuan" readonly>
                            </div>
                            <div class="col-md-4">Tgl.Proses Kordinator
                                <input type="text" class="form-control form-control-xsx fw-bold" id="tgl_kordinator" readonly>
                            </div>
                            <div class="col-md-4">Tgl.Proses PPTK
                                <input type="text" class="form-control form-control-xsx fw-bold" id="tgl_pptk" readonly>
                            </div>

                            <div class="col-md-4">Jenis Pengajuan
                                <input type="text" class="form-control form-control-xsx fw-bold" id="jenis" disabled>
                            </div>
                            <div class="col-md-4">Kordinator
                                <input type="text" class="form-control form-control-xsx fw-bold" id="kordinator" disabled>
                            </div>
                            <div class="col-md-4">PPTK
                                <input type="text" class="form-control form-control-xsx fw-bold" id="pptk" disabled>
                            </div>
                            <input type="hidden" id="formItemID">
                            <!-- </form> -->

                            <!-- <div class="w-100 mt-3">
                                        <h6 class="fw-bold text-start text-secondary"><i class="bi bi-card-checklist text-success"></i> Detail Barang</h6>
                                    </div> -->
                            <table class="table table-striped w-100 table-sm table-borderless mt-2 m-0" id="dethibah" style="font-size: 10px;">
                                <thead>
                                    <tr>
                                        <th class="text-center bg-success text-white align-middle" width="1%">No</th>
                                        <th class="bg-success text-white align-middle" width="10%">Jenis</th>
                                        <th class="text-start bg-success text-white align-middle" width="15%">Nama Barang</th>
                                        <th class="bg-success text-white align-middle text-center" width="5%">Sat</th>
                                        <th class="bg-success text-white align-middle text-center" width="5%">Jum Diminta</th>
                                        <th class="bg-success text-white align-middle text-center" width="5%">ACC Kordinator</th>
                                        <th class="bg-success text-white align-middle text-center" width="5%">ACC PPTK</th>
                                        <th class="bg-success text-white align-middle text-center" width="5%">Sisa Stok</th>
                                        <th class="bg-success text-white align-middle text-center" width="15%">Ket Ruangan</th>
                                        <th class="bg-success text-white align-middle text-center" width="15%">Ket Kordinator</th>
                                        <th class="bg-success text-white align-middle text-center" width="15%">Ket PPTK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END  -->




</main>
<script>
    $(document).ready(function() {
        $('#listpengajuan').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                "url": "<?= base_url('sipejuang/getlistpengajuan') ?>",
                "type": "GET",
                "dataSrc": function(json) {
                    console.log(json);
                    fetchData();
                    return json.data;
                },
                "error": function(xhr, error, thrown) {
                    console.error('Error:', error, thrown);
                }
            },
            "pageLength": 5,
            "lengthChange": false,
            "paging": true,
            "info": false,
            "searching": false,
            "ordering": false,
            "columns": [{
                    "data": null,
                    "className": "text-center",
                    "orderable": false,
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "jenis",
                    "orderable": true
                },
                {
                    "data": "kordinator",
                    "className": "text-start",
                    "orderable": false
                },
                {
                    "data": "pptk"
                },
                {
                    "data": "tgl_pengajuan",
                    "className": "text-center",
                    "orderable": false
                },
                {
                    "data": "status",
                    "orderable": true,
                    "render": function(data) {
                        let badgeClass = "bg-primary";
                        if (data === "Barang Ready") badgeClass = "bg-success";
                        else if (data.startsWith("Ditolak")) badgeClass = "bg-danger";
                        else if (data.startsWith("Pengajuan")) badgeClass = "bg-warning text-dark";

                        return `<span class="badge ${badgeClass}" style="border-radius: 2px; padding:5px; font-weight: normal; font-size: 10px">${data}</span>`;
                    }
                },
                {
                    "data": null,
                    "className": "text-center",
                    "orderable": false,
                    "render": function(data, type, row) {
                        let detailButton = `
                        <button class='btn btn-outline-success btn-xsx' 
                                data-bs-toggle='tooltip' 
                                title='Detil Pengajuan' 
                                onclick='hibah(${row.id})'> 
                            <i class='bi bi-eye-fill'></i>
                        </button>`;

                        return detailButton;
                    }
                }
            ],
            "drawCallback": function() {
                $('[data-bs-toggle="tooltip"]').tooltip('dispose').tooltip();
            },

        });
        $('.dataTables_paginate').hide();
    });

    //detil
    window.hibah = function(id) {
        $('#detilhibah').modal('show');
        document.getElementById('formItemID').value = id;
        console.log(id);
        getdetilhibah(id);
        // getdetilhibah();

    }
    // $('#closehibah').on('click', function() {
    //     $('#dethibah').DataTable().destroy();
    //     $('#detilhibah').modal('hide');
    //     // getdetilhibah(id);
    // });
    $('#closehibah').on('click', function() {
        $('#dethibah').DataTable().clear().destroy();
        $('#detilhibah').modal('hide');
    });



    function getdetilhibah(id) {
        getdetilhibahselect(id);
        $('#dethibah').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                "url": "<?= base_url('sipejuang/getdetilpengajuan/') ?>",
                "data": {
                    "id": id
                },
                "type": "get"
            },
            "language": {
                "searchPlaceholder": "Search...",
                "emptyTable": "Data Barang tidak ditemukan"
            },
            language: {
                info: "",
                infoEmpty: "",
                infoFiltered: ""
            },
            searching: false,
            lengthChange: false,
            "columns": [{
                    "data": null,
                    "className": "text-center",
                    "sortable": false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "jenis",
                    "className": 'text-start'
                },
                {
                    "data": "barang",
                    "className": 'text-start'

                },
                {
                    "data": "satuan",
                    "className": 'text-center'
                },
                {
                    "data": "jumlah_diminta",
                    "className": 'text-end'
                },
                {
                    "data": "jumlah_disetujui_koordinator",
                    "className": 'text-center'
                },
                {
                    "data": "jumlah_disetujui",
                    "className": 'text-center'
                },
                {
                    "data": "sisa_stok",
                    "className": 'text-center'
                },
                {
                    "data": "keterangan",
                    "className": 'text-start'
                },
                {
                    "data": "keterangan_koordinator",
                    "className": 'text-start'
                },
                {
                    "data": "keterangan_pptk",
                    "className": 'text-start'
                }
            ],
            "initComplete": function(settings, json) {
                // Menambahkan jarak di bawah input pencarian setelah DataTables diinisialisasi
                setTimeout(function() {
                    $('.dataTables_filter input').addClass('form-control form-control-sm').css('font-size', '12px').css('margin-bottom', '10px');
                    $('.dataTables_length select').addClass('form-control form-control-sm').css('font-size', '12px').css('margin-bottom', '10px');
                    $('.dataTables_length label').css('display', 'none');
                    $('.dataTables_filter label').css('display', 'none');
                    $('.dataTables_info').css('font-size', '12px');
                    $('.dataTables_paginate').css('font-size', '12px');
                }, 100);
                var searchInput = $('.dataTables_filter input');
            },
        });
    }

    function getdetilhibahselect(id) {
        let jenis = $('#jenis');
        let tgl_kordinator = $('#tgl_kordinator');
        let tgl_pptk = $('#tgl_pptk');
        let status = $('#status');
        let tgl_pengajuan = $('#tgl_pengajuan');
        let kordinator = $('#kordinator');
        let pptk = $('#pptk');
        let pemohon = $('#pemohon');
        let unit = $('#unit');
        let myButton = $('#myButton');
        let idb = $('#idb');
        $.ajax({
            url: '<?= site_url('sipejuang/detilhibahselect/') ?>' + id,
            type: 'get',
            success: function(response) {
                $('#jenisText').text(response.jenis_pengajuan);
                $('#tgl_kordinatorText').text(response.tanggal_proses_koordinator);
                jenis.val(response.jenis_pengajuan);
                tgl_kordinator.val(response.tanggal_proses_koordinator);
                tgl_pptk.val(response.tanggal_proses_pptk);
                status.val(response.status);
                tgl_pengajuan.val(response.created_at);
                kordinator.val(response.kordinator);
                pptk.val(response.pptk);
                pemohon.val(response.pemohon);
                $('#pemohonLabel').text(response.pemohon);
                $('#myButton').text(response.status);

                unit.val(response.unit);
                myButton.text(response.status);
                myButton.removeClass('btn-primary btn-success btn-danger');
                if (response.status === 'Pengajuan ke Rumah Tangga') {
                    myButton.addClass('btn-primary');
                } else if (response.status === 'Barang Ready') {
                    myButton.addClass('btn-success');
                } else if (response.status === 'Pengajuan ke Koordinator') {
                    myButton.addClass('btn-primary');
                } else if (response.status === 'Ditolak PPTK') {
                    myButton.addClass('btn-danger');
                } else if (response.status === 'Pengajuan ke PPTK') {
                    myButton.addClass('btn-warning');
                }
                idb.val(response.ID);
            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    function fetchData() {
        $.ajax({
            url: "<?= base_url('sipejuang/countpengajuan') ?>",
            type: "GET",
            dataType: "json",
            success: function(response) {
                $("#barang_ready").text(response.barang_ready);
                $("#pengajuan").text(response.pengajuan);
                $("#ditolak").text(response.ditolak);
                $("#all").text(response.all);
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        });
    }
    // Fungsi AJAX untuk menampilkan grafik pengajuan

    // Array nama bulan
    let ruangan_id = <?php echo session('Ses_Pejuang'); ?>; // Sesuaikan dengan kebutuhan

    $.ajax({
        url: "<?= base_url('sipejuang/getgrafikpengajuan') ?>/" + ruangan_id,
        type: "GET",
        dataType: "json",
        success: function(response) {
            console.log("Data dari server:", response); // Debugging data

            if (response.status) {
                let labels = response.data.map(item => item.bulan); // Nama bulan
                let values = response.data.map(item => parseInt(item.jumlah)); // Konversi jumlah ke angka

                console.log("Labels (Bulan):", labels); // Debugging label sumbu X
                console.log("Values (Jumlah):", values); // Debugging nilai sumbu Y

                let options = {
                    chart: {
                        type: 'area',
                        height: 300
                    },
                    series: [{
                        name: "Jumlah Pengajuan",
                        data: values
                    }],
                    xaxis: {
                        categories: labels
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                        colors: ['#f74608']
                    },
                    markers: {
                        size: 6, // Ukuran marker normal
                        colors: ['#198754'], // Warna marker default
                        strokeWidth: 3, // Tebal garis lingkaran saat hover
                        strokeColors: '#ffffff', // Warna garis luar saat hover
                        hover: {
                            sizeOffset: 2 // Perubahan ukuran yang lebih kecil agar tidak berkedip
                        }


                    },

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

                let chart = new ApexCharts(document.querySelector("#grafikPengajuan"), options);
                chart.render();
            }
        },
        error: function(xhr, status, error) {
            console.error("Terjadi kesalahan:", error);
        }
    });
</script>
<!-- End #main -->
<?= $this->endSection(); ?>`