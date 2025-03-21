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
        <!-- <h6 class="fw-bold">REKON RAWAT JALAN</h6> -->
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-black fw-bold">SIPAYU</li>
                <li class="breadcrumb-item">I G D</li>
                <!-- <li class="breadcrumb-item active">Data Jasa Rawat Jalan</li> -->
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
                                <?php if (session('Ses_Level') == '1') : ?>
                                    <div class="col-auto">
                                        <select name="ruangan" id="ruangan" class="form-control form-control-sm">
                                            <option value="">RUANGAN</option>
                                            <?php foreach ($ruangan as $row) : ?>
                                                <option value="<?= $row['DESKRIPSI'] ?>" <?= ($row['DESKRIPSI'] == esc($ruangan)) ? 'selected="selected"' : '' ?>>
                                                    <?= $row['DESKRIPSI'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php else: ?>
                                    <input type="hidden" name="ruangan" id="ruangan" value="<?php echo (session('Ses_UserName')); ?>">
                                <?php endif; ?>

                                <div class="col-auto">
                                    <select name="asuransi" class="form-control form-control-sm" id="asuransi">
                                        <option value="">ASURANSI</option>
                                        <?php foreach ($modelAsuransi as $asuransi): ?>
                                            <option value="<?= $asuransi['paymentname']; ?>"><?= $asuransi['paymentname']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-auto">
                                    <select name="fpk" id="fpk" class="form-control form-control-sm">
                                        <option value="">FPK</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>

                                <div class="col-auto">
                                    <select name="bulan" id="bulan" class="form-control form-control-sm">
                                        <option value="">BULAN</option>
                                        <?php foreach ($bulan as $row) : ?>
                                            <option value="<?= $row['month'] ?>" <?= ($row['month'] == esc($bulan)) ? 'selected="selected"' : '' ?>>
                                                <?= $row['month'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-auto">
                                    <select name="tahun" class="form-control form-control-sm" id="tahun"></select>
                                </div>

                                <div class="col-auto">
                                    <input type="text" name="norm" class="form-control form-control-sm" id="norm" placeholder="NORM">
                                </div>

                                <div class="col-auto">
                                    <input type="text" name="nama" class="form-control form-control-sm" id="nama" placeholder="Nama Pasien">
                                </div>

                                <div class="col-auto">
                                    <button type="button" class="btn btn-sm btn-outline-success" id="btn-filter">
                                        <i class="bi bi-search"></i> Filter
                                    </button>
                                </div>

                                <div class="col-auto">
                                    <button class="btn btn-sm btn-secondary" id="copyButton">
                                        <i class="bi bi-copy fw-bold" data-bs-toggle="tooltip" data-bs-placement="left" title="Copy Table"></i>
                                    </button>
                                </div>
                            </div>

                        </div>

                        <table class="table table-striped w-100 table-sm table-borderless" id="getjasarajal" style="font-size: 9px;">
                            <thead>
                                <tr>
                                    <th class="bg-success text-white text-center" width="1%">NO</th>
                                    <th class="bg-success text-white text-start" width="5%">NOMR</th>
                                    <th class="bg-success text-white text-start" width="15%">NAMA</th>
                                    <th class="bg-success text-white text-start" width="23%">NAMA TINDAKAN</th>
                                    <th class="bg-success text-white text-start" width="15%">DOKTER</th>
                                    <th class="bg-success text-white text-start" width="6%">TANGGAL</th>
                                    <th class="bg-success text-white text-start" width="11%">RUANGAN</th>
                                    <th class="bg-success text-white text-center" width="7%">TARIF</th>
                                    <th class="bg-success text-white text-start" width="8%">MEDIS</th>
                                    <th class="bg-success text-white text-start" width="8%">PARAMEDIS</th>
                                    <th class="bg-success text-white text-start" width="6%">KEBERSAMAAN</th>
                                    <th class="bg-success text-white text-start" width="6%">DETAIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data akan diisi oleh DataTables -->
                            </tbody>
                            <tfoot>
                                <tr class="bg-success">
                                    <th class="bg-success text-white"></th>
                                    <th class="bg-success text-white"></th>
                                    <th class="bg-success text-white"></th>
                                    <th class="bg-success text-white"></th>
                                    <th class="bg-success text-white"></th>
                                    <th class="bg-success text-white"></th>
                                    <th colspan="2" class="text-end bg-success text-white">JUMLAH</th>
                                    <th class="bg-success text-white text-end"></th>
                                    <th class="bg-success text-white text-end"></th>
                                    <th class="bg-success text-white text-end"></th>
                                    <th class="bg-success text-white text-end"></th>
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
        var table = $('#getjasarajal').DataTable({
            "processing": true,
            "serverSide": true,
            "paging": false, // Aktifkan pagination
            "searching": false,
            "info": false, // Aktifkan pencarian
            "order": true,
            "ajax": {
                "url": "<?= base_url('sipayu/getjasaigd') ?>",
                "type": "GET",
                "data": function(d) {
                    d.ruangan = $('#ruangan').val(); // Filter Ruangan
                    d.bulan = $('#bulan').val();
                    d.asuransi = $('#asuransi').val();
                    d.tahun = $('#tahun').val();
                    d.nama = $('#nama').val();
                    d.fpk = $('#fpk').val();
                    d.norm = $('#norm').val();
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
                    "data": "NomorRekamMedis",
                    "className": "text-start"
                },
                {
                    "data": "NamaPasien",
                    "className": "text-start"
                },

                {
                    "data": "NamaTindakan",
                    "className": "text-start"
                },
                {
                    "data": "Dokter"
                },
                {
                    "data": "TanggalPelayanan"
                },
                {
                    "data": "poliklinik"
                },
                {
                    "data": "Tarif",
                    "searchable": false,
                    "className": "text-center"
                },
                {
                    "data": "JasaMedisRvu",
                    "className": "text-end",
                    "searchable": false,
                    "render": function(data, type, row) {
                        if (data === null || data === undefined || isNaN(parseFloat(data))) {
                            return "0.00";
                        }
                        return new Intl.NumberFormat('id-ID', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }).format(data);
                    }
                },
                {
                    "data": "JasaAsistenRvu",
                    "className": "text-end",
                    "searchable": false,
                    "render": function(data, type, row) {
                        if (data === null || data === undefined || isNaN(parseFloat(data))) {
                            return "0.00";
                        }
                        return new Intl.NumberFormat('id-ID', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }).format(data);
                    }
                },
                {
                    "data": "jasaAsisten_kebersamaan",
                    "className": "text-end",
                    "searchable": false,
                    "render": function(data, type, row) {
                        if (data === null || data === undefined || isNaN(parseFloat(data))) {
                            return "0.00";
                        }
                        return new Intl.NumberFormat('id-ID', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }).format(data);
                    }
                },
                {
                    data: null,
                    className: 'text-center text-middle',
                    render: function(data, type, row) {
                        return '<button class="btn btn-outline-success btn-xsx" data-bs-toggle="tooltip" data-bs-placement="left" title="Lihat Detail" type="button" onclick="window.open(\'<?= base_url('sipayu/detail_igd') ?>?idx=' + row.IdRegisterKunjungan + '\', \'_blank\')" style="font-size: 10px;padding: 0px 4px"> <i class="bi bi-eye-fill"></i> </button>';
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
                $('.dataTables_empty').addClass('bg-white text-white');
            },

            "footerCallback": function(row, data, start, end, display) {
                let api = this.api();

                let intVal = function(i) {
                    if (typeof i === 'string') {
                        i = i.replace(/[\$,]/g, ''); // Hilangkan tanda dolar/koma jika ada
                    }
                    let parsed = parseFloat(i); // Konversi ke angka desimal
                    return isNaN(parsed) ? 0 : parsed; // Jika NaN, ubah ke 0
                };

                // Hitung total untuk masing-masing kolom
                let totalmedis = api.column(8).data().reduce((a, b) => intVal(a) + intVal(b), 0);
                let totaldokterumum = api.column(9).data().reduce((a, b) => intVal(a) + intVal(b), 0);
                let totalparamedis = api.column(10).data().reduce((a, b) => intVal(a) + intVal(b), 0);

                // Format angka: dua digit di belakang koma + pemisah ribuan
                $(api.column(8).footer()).html(new Intl.NumberFormat('id-ID', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(totalmedis));
                $(api.column(9).footer()).html(new Intl.NumberFormat('id-ID', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(totaldokterumum));
                $(api.column(10).footer()).html(new Intl.NumberFormat('id-ID', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(totalparamedis));
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
        var table = document.getElementById("getjasarajal");

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
        $("#bulan").chained("#asuransi");

    });
    document.addEventListener("DOMContentLoaded", function() {
        document.body.classList.add("toggle-sidebar");
    });
</script>

<?= $this->endsection() ?>