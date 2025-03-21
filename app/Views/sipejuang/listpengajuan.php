<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <!-- <h6 class="fw-bold">SIPEJUANG</h6> -->
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-dark fw-bold"> SIPEJUANG</li>
                <li class="breadcrumb-item">List Pengajuan</li>
                <!-- <li class="breadcrumb-item active">Pengajuan Permohonan</li> -->
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <!-- MUTU NASIONAL  -->


    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card text-dark bg-light">
                    <!-- <div class="card-header p-1 m-0 ps-3">
                        <i class="bi bi-journal-plus text-success"></i>
                        <b class="text-dark ps-1"> Pengajuan Permohonan </b><?php echo $_SESSION['Ses_Pejuang']; ?>
                    </div> -->
                    <div class="card-body p-3 ps-3 pe-3">
                        <div class="col-lg-12 mb-2">
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Dashboard" class="btn btn-success btn-xsl p-2 btn-shadow" onclick="window.location.href='<?= base_url('sipejuang/dashboardpengajuan') ?>'">
                                <i class="bi bi-house"></i>
                            </button>
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Form Permohonan" class="btn btn-outline-light btn-xsl p-2 btn-shadow text-success" onclick="window.location.href='<?= base_url('sipejuang/formpengajuan') ?>'">
                                <i class="bi bi-record-circle"></i> Form Pengajuan
                            </button>
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Pengajuan Permohonan" class="btn btn-success btn-xsl p-2 btn-shadow" onclick="window.location.href='<?= base_url('sipejuang/listpengajuan') ?>'">
                                <i class="bi bi-plus-square"></i> List Pengajuan
                            </button>
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Riwayat Pengajuan" class="btn btn-outline-light btn-xsl p-2 btn-shadow text-success" onclick="window.location.href='<?= base_url('sipejuang/riwayatpengajuan') ?>'">
                                <i class="bi bi-record-circle"></i> Riwayat Pengajuan
                            </button>
                        </div>
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
                "type": "get",
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
                    "orderable": false,
                    render: function(data, type, row, meta) {
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
                    "data": "pptk",
                },
                {
                    "data": "tgl_pengajuan",
                    "className": "text-center",
                    "orderable": false
                    // "visible": false
                },

                {
                    "data": "status",
                    "orderable": true,
                    "render": function(data, type, row) {
                        let badgeClass = "bg-primary";

                        if (data === "Barang Ready") {
                            badgeClass = "bg-success";
                        } else if (data === "Ditolak PPTK") {
                            badgeClass = "bg-danger";
                        } else if (data === "Pengajuan ke PPTK") {
                            badgeClass = "bg-warning text-dark";
                        }

                        return `<span class="badge ${badgeClass}" style="border-radius: 2px; padding:5px; font-weight: normal;font-size: 10px">${data}</span>`;
                    }
                },
                {
                    "data": null,
                    "className": "text-center",
                    "render": function(data, type, row) {
                        console.log(row);

                        // Tombol "Detil Pengajuan" (selalu tampil)
                        let detailButton = `
            <button class='btn btn-outline-success btn-xsx btn-shadow' 
                    data-bs-toggle='tooltip' 
                    data-bs-placement='left' 
                    title='Detil Pengajuan' 
                    onclick='hibah(${row.id})' 
                    data-id='${row.id}'> 
                <i class='bi bi-eye-fill'></i>
            </button>`;

                        // Tombol "Hapus Pengajuan" (hanya jika status = "Pengajuan ke Koordinator")
                        let deleteButton = "";
                        if (row.status === "Pengajuan ke Koordinator") {
                            deleteButton = `
                <button class='btn btn-danger btn-xsx btn-shadow' 
                        data-bs-toggle='tooltip' 
                        data-bs-placement='left' 
                        title='Hapus Pengajuan' 
                        onclick='confirmDelete(${row.id})' 
                        data-id='${row.id}'> 
                    <i class='bi bi-trash'></i>
                </button>`;
                        }

                        // Gabungkan tombol dalam satu return
                        return detailButton + " " + deleteButton;
                    },
                    "orderable": false
                }

            ],
            "order": [
                [4, "desc"]
            ],
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 75, 100],
            language: {
                "lengthMenu": " _MENU_ ",
                "search": "",
                "searchPlaceholder": "Cari data...",
                paginate: {
                    first: '<button class="btn btn-outline-success btn-xsx"> <i class="ri ri-rewind-fill"></i> </button>',
                    last: '<button class="btn btn-outline-success btn-xsx"> <i class="ri ri-rewind-fill" style="transform: scaleX(-1); display: inline-block;"></i> </button>',
                    next: '<button class="btn btn-outline-success btn-xsx"> <i class="ri ri-play-fill"></i> </button>',
                    previous: '<button class="btn btn-outline-success btn-xsx"> <i class="ri ri-play-fill" style="transform: scaleX(-1); display: inline-block;"></i> </button>',
                    current: '<button class="btn btn-success btn-xsx"> <i class="bi bi-skip-backward-fill"></i> </button>'
                },
                pagingType: "simple",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ Data",
                infoEmpty: "Menampilkan 0 - 0 dari 0 data",
                infoFiltered: "(filtered from _MAX_ total entries)",

            },
            "deferRender": true,
            "initComplete": function() {
                $('[data-bs-toggle="tooltip"]').tooltip();
                $('#listpengajuan').css('font-size', '11px');
                $('#listpengajuan thead th').css({
                    'background-color': '#28a745',
                    'color': 'white'
                });
                $('.dataTables_filter input').css('margin-bottom', '10px').css('font-size', '11px').addClass('form-control form-control-xsx');
                $('.dataTables_length select').css('margin-bottom', '10px').css('font-size', '11px').addClass('form-control form-control-xsx');
                $('.paginate_button').css('color', 'white').css('font-size', '10px');
                $('.dt-info').css('font-size', '11px');
                // $('.dt-input').css('font-size', '11px').css('padding', '5px').css('padding-right', '10px').css('padding-left', '10px');
            },
            "drawCallback": function() {
                $('[data-bs-toggle="tooltip"]').tooltip(); // Inisialisasi tooltip setiap kali tabel di-draw
            },
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
                // "search": "Cari ",
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
                    // $('.dataTables_filter label').hide();
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

    function confirmDelete(id) {
        console.log("ID yang akan dikirim:", id); // Debugging
        customSwal.fire({
            title: "Konfirmasi",
            text: "Apakah Anda yakin ingin menghapus data ini?",
            icon: "warning",
            width: '400px',
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('sipejuang/hapuspengajuan') ?>",
                    type: "POST",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log("Response dari server:", response);
                        if (response.status === "success") {
                            customSwal.fire("Berhasil!", response.message, "success");
                            $('#listpengajuan').DataTable().ajax.reload();
                        } else {
                            customSwal.fire("Gagal!", response.message, "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        console.log(xhr.responseText);
                        customSwal.fire("Error!", "Terjadi kesalahan pada server.", "error");
                    }
                });
            }
        });
    }
</script>



<?= $this->endSection(); ?>