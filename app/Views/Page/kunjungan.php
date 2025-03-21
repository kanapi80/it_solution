<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h6 class="fw-bold">KUNJUNGAN PASIEN</h6>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">SIMRS</li>
                <li class="breadcrumb-item active">Kunjungan</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-4">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="norm" class="form-control form-control-sm" id="norm" placeholder="Cari Norm ..." aria-label="Search">
                                    <span class="input-group-text">
                                        <i class="bi bi-search"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="nama" class="form-control form-control-sm" id="nama" placeholder="Nama Pasien ...">
                            </div>
                            <div class="col-md-2">
                                <input type="date" name="tanggal" id="tanggal" value="<?= (session()->get('Ses_Tupoksi') == 'RAWAT INAP' || session()->get('Ses_Tupoksi') == 'LABORATORIUM' || session()->get('Ses_Tupoksi') == 'RADIOLOGI' || session()->get('Ses_Tupoksi') == 'KAMAR OPERASI') ? '' : date('Y-m-d'); ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-2">
                                <select id="status" class="form-select form-select-sm">
                                    <option value="Dilayani">Dilayani</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Batal">Batal</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <?php if (session('Ses_Level') === '1') : ?>
                                    <select name="ruangan" class="form-select form-select-sm" id="ruangan">
                                        <option value=""><?= session('Ses_UserName'); ?></option>
                                    </select>
                                <?php else: ?>
                                    <input type="hidden" name="ruangan" id="ruangan" value="<?= session('Ses_UserName'); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <table id="kunjungan" class="display mt-2" style="font-size: 11px;">
                            <thead>
                                <tr>
                                    <th class="text-center bg-success text-white" width="2%">NO</th>
                                    <th class="text-start bg-success text-white" width="5%">NOPEN</th>
                                    <th class="text-start bg-success text-white" width="30%">NORM</th>
                                    <th class="text-start bg-success text-white" width="26%">RUANGAN</th>
                                    <th class="text-start bg-success text-white" width="17%">ASURANSI</th>
                                    <th class="text-start bg-success text-white" width="23%">MASUK</th>
                                    <th class="text-start bg-success text-white" width="10%">AKSI</th>
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
</main>
<script>
    $(document).ready(function() {
        let table = $('#kunjungan').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            lengthChange: false,
            ajax: {
                url: '<?= base_url('page/getkunjungan') ?>',
                type: 'post',
                data: function(d) {
                    d.status = $('#status').val();
                    d.nama = $('#nama').val();
                    d.norm = $('#norm').val();
                    d.tanggal = $('#tanggal').val();
                    d.ruangan = $('#ruangan').val();
                }
            },
            columns: [{
                    "data": null,
                    "className": "text-center",
                    "sortable": false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: null,
                    className: 'text-start',
                    render: function(data, type, row) {
                        function nl2br(str) {
                            return str.replace(/\n/g, '<br>');
                        }
                        // Gabungkan field Periode dan Tahun dengan pemisah "-"
                        return '<b>' + row.NOPEN + '</b>' + '<br>' + row.NOKUN;
                    }
                },
                {
                    data: null,
                    className: 'text-start',
                    render: function(data, type, row) {
                        function nl2br(str) {
                            return str.replace(/\n/g, '<br>');
                        }
                        return '<b>' + row.NOPASIEN + '</b>' + '<br>' + row.PASIEN;
                    }
                },
                // {
                //     data: 'PASIEN',
                //     className: 'text-start'
                // },
                {
                    data: null,
                    className: 'text-start',
                    render: function(data, type, row) {
                        function nl2br(str) {
                            return str.replace(/\n/g, '<br>');
                        }
                        return '<b>' + row.NAMARUANGAN + '</b>' + '<br>' + row.DOKTER;
                    }
                },
                {
                    data: null,
                    className: 'text-start',
                    render: function(data, type, row) {
                        function nl2br(str) {
                            return str.replace(/\n/g, '<br>');
                        }
                        return '<b>' + row.ASURANSI + '</b>' + '<br>' + row.NOSEP;
                    }
                },

                {
                    data: null,
                    className: 'text-start',
                    render: function(data, type, row) {
                        function nl2br(str) {
                            return str.replace(/\n/g, '<br>');
                        }
                        // Tentukan warna badge berdasarkan status
                        let badgeClass = 'bg-secondary'; // Default warna abu-abu jika tidak cocok
                        if (row.ST === 'Dilayani') {
                            badgeClass = 'bg-success'; // Hijau untuk Dilayani
                        } else if (row.ST === 'Selesai') {
                            badgeClass = 'bg-primary'; // Biru untuk Selesai
                        } else if (row.ST === 'Batal') {
                            badgeClass = 'bg-danger'; // Merah untuk Batal
                        }

                        return row.TGLMASUK + '<br>' + `<span class="badge ${badgeClass}">${row.ST}</span>`;
                    }
                },
                {
                    data: null,
                    className: 'text-center text-middle',
                    render: function(data, type, row) {
                        // return '<button class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Lihat Detail" type="button" onclick="window.location.href=\'<?= base_url('pasien/detilpasien') ?>?nopen=' + row.NOPEN + '&nokun=' + row.NOKUN + '&norm=' + row.NOPASIEN + '&nama=' + row.PASIEN + '&tagihan=' + row.TAGIHAN + '&keylab1=' + row.KEYLAB1 + '&keylab2=' + row.KEYLAB2 + '&tujuan_order=' + row.TUJUAN_ORDER + '&keyrad=' + row.KEYRAD + '\', \'_blank\'"> <i class="bi bi-eye-fill"></i> </button>';
                        return '<button class="btn btn-outline-success btn-xsx" data-bs-toggle="tooltip" data-bs-placement="left" title="Lihat Detail" type="button" onclick="window.open(\'<?= base_url('pasien/detilpasien') ?>?nopen=' + row.NOPEN + '&nokun=' + row.NOKUN + '&norm=' + row.NOPASIEN + '&nama=' + encodeURIComponent(row.PASIEN) + '&tagihan=' + row.TAGIHAN + '&keylab1=' + encodeURIComponent(row.KEYLAB1) + '&keylab2=' + encodeURIComponent(row.KEYLAB2) + '&tujuan_order=' + encodeURIComponent(row.TUJUAN_ORDER) + '&keyrad=' + encodeURIComponent(row.KEYRAD) + '&nosep=' + encodeURIComponent(row.NOSEP) + '\', \'_blank\')"> <i class="bi bi-eye-fill"></i> </button>';
                    }
                }


            ],

            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 75, 100],
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
                $('#kunjungan').css('font-size', '10px');
                $('#kunjungan thead th').css({
                    'background-color': '#28a745',
                    'color': 'white'
                });
                $('#kunjungan td, #kunjungan th').css('text-align', 'center');
                $('.dataTables_filter input').css('margin-bottom', '10px').css('font-size', '14px').addClass('form-control form-control-sm');
                $('.dataTables_length select').css('margin-bottom', '10px').css('font-size', '14px').addClass('form-select form-select-sm');
                $('.dt-info').css('font-size', '13px');
                $('.dt-input').css('font-size', '13px').css('padding', '5px').css('padding-right', '10px').css('padding-left', '10px');
                $('.dataTables_paginate').css('font-size', '11px');
                $('.dt-paging-button.current').css('font-size', '12px');
            }
        });

        // Event listener untuk dropdown status
        $('#status').change(function() {
            table.ajax.reload(); // Reload tabel saat status berubah
        });
        $('#nama').keyup(function() {
            table.ajax.reload();
        });
        $('#norm').keyup(function() {
            table.ajax.reload();
        });
        $('#tanggal').change(function() {
            table.ajax.reload();
        });
        $('#ruangan').change(function() {
            table.ajax.reload();
        });

        $('#ruangan').select2({
            placeholder: '<?= (session('Ses_Level') === '1') ? 'Pilih Ruangan' : session('Ses_UserName'); ?>',
            allowClear: true,
            // theme: 'bootstrap4',
            ajax: {
                url: '<?= base_url('page/getruanganall') ?>',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        value: params.term // Sesuaikan dengan parameter yang dikirim di Controller
                    };
                },
                processResults: function(data) {
                    console.log(data); // Debugging untuk melihat data yang diterima
                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.DESKRIPSI, // Pastikan ID sesuai dengan database
                                text: item.DESKRIPSI
                            };
                        })
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
        });
        if (<?= session('Ses_Level') ?> != '1') {
            $('#ruangan').hide();
        }



    });
</script>
<?= $this->endSection(); ?>