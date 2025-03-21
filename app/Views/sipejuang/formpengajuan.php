<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <!-- <h6 class="fw-bold">SIPEJUANG</h6> -->
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-dark fw-bold"> SIPEJUANG</li>
                <li class="breadcrumb-item">Form Pengajuan</li>
                <!-- <li class="breadcrumb-item active">Pengajuan Permohonan</li> -->
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section mt-2">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card text-dark bg-light">
                    <!-- <div class="card-header p-1 m-0 ps-3">
                        <i class="bi bi-journal-plus text-success"></i>
                        <b class="text-dark ps-1"> Pengajuan Permohonan </b>
                    </div> -->
                    <div class="card-body p-3 ps-3 pe-3">
                        <div class="col-lg-12 mb-2">
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Dashboard" class="btn btn-success btn-xsl p-2 btn-shadow" onclick="window.location.href='<?= base_url('sipejuang/dashboardpengajuan') ?>'">
                                <i class="bi bi-house"></i>
                            </button>
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Form Permohonan" class="btn btn-success btn-xsl p-2 btn-shadow" onclick="window.location.href='<?= base_url('sipejuang/formpengajuan') ?>'">
                                <i class="bi bi-plus-square"></i> Form Pengajuan
                            </button>
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Pengajuan Permohonan" class="btn btn-outline-light btn-xsl p-2 btn-shadow text-success" onclick="window.location.href='<?= base_url('sipejuang/listpengajuan') ?>'">
                                <i class="bi bi-record-circle"></i> List Pengajuan
                            </button>
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Riwayat Pengajuan" class="btn btn-outline-light btn-xsl p-2 btn-shadow text-success" onclick="window.location.href='<?= base_url('sipejuang/riwayatpengajuan') ?>'">
                                <i class="bi bi-record-circle"></i> Riwayat Pengajuan
                            </button>
                        </div>

                        <section class="section mt-3 mb-0">
                            <div class="row align-items-end">
                                <div class="col-lg-12">
                                    <div class="card mb-2" id="card-form-pemesanan">
                                        <div class="card-header p-1 m-0 ps-2 pe-2 bg-secondary text-white">
                                            <h6 class="fw-bold fs-custom mt-2 pe-1" style="font-size: 11px; margin: 1;padding-left:8px;">
                                                <i class="bi bi-pencil-square pe-1"></i> FORM PENGAJUAN PERMOHONAN
                                            </h6>
                                        </div>
                                        <form class="row g-2 needs-validation p-2" novalidate>
                                            <div class="col-md-2 ">
                                                <label for="penyedia" class="form-label sms mb-0">Jenis Pengajuan</label>
                                                <select name="jenis" class="form-select form-select-sm" id="jenis">
                                                    <option value="Barang">Rumah Tangga</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="penyedia" class="form-label sms mb-0">Koordinator</label>
                                                <select name="kordinator" class="form-select form-select-sm" id="kordinator">
                                                    <option value="">Pilih Kordinator</option>
                                                    <?php foreach ($kordinator as $items => $item) : ?>
                                                        <option value="<?= $item['id'] ?>"> <?= $item['nama'] ?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="nomor" class="form-label sms mb-0">Jenis Barang</label>
                                                <!-- <select name="jenis_barang" class="form-select form-select-sm" id="jenis_barang">
                                                    <option value="Barang">Barang</option>
                                                </select> -->
                                                <select name="kategori" class="form-select form-select-sm" id="kategori-obat">
                                                    <option value="">Pilih kategori barang</option>
                                                    <?php foreach ($jenis as $key => $value) : ?>
                                                        <option value="<?= $value['jenis'] ?>"> <?= $value['jenis'] ?></option>
                                                    <?php endforeach; ?>
                                                </select> <input type="hidden" name="ruangan_id" id="ruangan_id" class="form-control" value="<?php echo (session('Ses_Pejuang')); ?>">
                                            </div>
                                            <div class="col-md-2 align-self-end gap-2">
                                                <button class="btn btn-success btn-sm form-select-sm" id="proses-pemesanan" data-bs-toggle="tooltip" data-bs-placement="right" title="Proses">
                                                    <i class="bi bi-caret-right-fill"></i> Proses
                                                </button>
                                                <button class="btn btn-danger btn-sm form-select-sm" id="batal-pemesanan" data-bs-toggle="tooltip" data-bs-placement="right" title="Batal">
                                                    <i class="bi bi-reply-fill"></i> Batal
                                                </button>
                                            </div>
                                        </form><!-- End Custom Styled Validation -->
                                    </div>



                                    <div class="card g-2 p-2 mt-0 mb-2" id="tambah-item-barang">
                                        <div class="card-body mt-0 p-0 mb-2">
                                            <h6 class="fw-bold"><i class="bi bi-bootstrap text-success"></i> Item Barang</h6>
                                            <form class="row g-2 needs-validation" novalidate>
                                                <div class="col-md-5">
                                                    <select name="namabarang" id="namabarang" class="form-select form-select-sm">
                                                    </select>
                                                    <input type="hidden" id="text-nama-barang" class="form-control">
                                                    <input type="hidden" id="harga-barang" class="form-control">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" id="satuan" class="form-control form-control-sm bg-light" readonly placeholder="Satuan">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="number" class="form-control form-control-sm" id="isibox" placeholder="Jumlah" required>
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="number" class="form-control form-control-sm" id="stok" placeholder="Stok" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control form-control-sm" id="keterangan" placeholder="Keterangan" required>
                                                </div>
                                                <div class="col-md-1">
                                                    <button class="btn btn-primary btn-sm" id="tambah-item" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Barang"><i class="bi bi-plus"></i></button>
                                                </div>
                                                <!-- TAMBAHAN  -->


                                                <!-- <div class="col-md-2">
                                                    <label for="satuan-barang" class="form-label">Satuan</label>
                                                    <input type="text" id="satuan-barang" class="form-control form-control-sm" readonly>
                                                </div> -->
                                                <!-- END TAMBAHAN  -->
                                            </form>

                                            <table class="table table-striped mt-2" id="table-item-pesanan" style="font-size: 11px;padding:0px">
                                                <thead>
                                                    <tr>
                                                        <th class="bg-success text-white text-center" width="3%"><b>No</b></th>
                                                        <th class="bg-success text-white" width="35%">Nama Barang</th>
                                                        <th class="bg-success text-white" width="5%">Satuan</th>
                                                        <th class="bg-success text-white text-center" width="15%">Jum Diminta </th>
                                                        <th class="bg-success text-white text-center" width="10%">Sisa Stok</th>
                                                        <th class="bg-success text-white" width="20%">Keterangan</th>
                                                        <th class="bg-success text-white text-center" width="10%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="item-barang">
                                                </tbody>
                                            </table>
                                            <!-- End Table with stripped rows -->
                                            <div class="row d-flex justify-content-end ">
                                                <div class="spinner-border text-success" id="loading" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                                <div class="col-md-2 text-end">
                                                    <!-- <a class="btn btn-success button-simpan-pemesanan btn-sm" id="simpan" style="margin-right: 10px;"><i class="bi bi-save"></i> Simpan</a> -->
                                                    <button class="btn btn-success btn-sm" id="simpan" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kirim Pengajuan"><i class="bi bi-save"></i> Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script type="text/javascript">
    $(document).ready(function() {

        $('[data-bs-toggle="tooltip"]').tooltip();


        $('#kategori-obat').select2({
            placeholder: "Pilih kategori barang",
            allowClear: true
        });
        $('#kordinator').select2({
            placeholder: "Pilih Koordinator",
            allowClear: true
        });

        //pilih nama barang
        $('#namabarang').select2({
            placeholder: 'Pilih nama barang',
            allowClear: true,
            ajax: {
                url: '<?= base_url('sipejuang/baranglist') ?>',
                type: "POST",
                dataType: 'json',
                delay: 250,
                // data: function(params) {
                //     return {
                //         // value: params.term, // Pencarian barang berdasarkan input
                //         // value: params.term.toLowerCase(),
                //         value: params.term ? params.term.toLowerCase() : '',
                //         kategori: $('#kategori-obat').val() // Kirim kategori yang dipilih
                //     };
                // },
                data: function(params) {
                    console.log(params.term); // Cek apakah parameter terkirim di Console
                    return {
                        value: params.term ? params.term.toLowerCase() : '',
                        kategori: $('#kategori-obat').val()
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.id, // Wajib ada ID untuk Select2
                                text: item.nama_barang,
                                kategori: item.kategori,
                                satuan: item.satuan
                            };
                        })
                    };
                },
                cache: true
            },
            minimumInputLength: 1
        });
        $('#kategori-obat').on('change', function() {
            $('#namabarang').val(null).trigger('change'); // Reset select2
        });

        $('#namabarang').on('select2:select', function(e) {
            var namaBarang = e.params.data.text;
            var hargaBarang = e.params.data.harga;
            $('#text-nama-barang').val(namaBarang).addClass('small');
            $('#harga-barang').val(hargaBarang);
        });

        //hide element
        var cardTambahItemBarang = $('#tambah-item-barang');
        var cardDaftarBarang = $('#list-barang');
        var btnProses = $('#proses-pemesanan');
        var btnBatal = $('#batal-pemesanan');
        var btnSimpan = $('#simpan');
        var loading = $('#loading');
        var nomor = 0;
        cardDaftarBarang.hide();
        cardTambahItemBarang.hide();
        btnSimpan.hide();
        btnBatal.hide();
        loading.hide();

        //Proses pemesanan
        $('#proses-pemesanan').on('click', function(e) {
            e.preventDefault();
            let jenisSpVal = $('#jenis').val();
            let kordinatorVal = $('#kordinator').val();
            let jenis_barangVal = $('#jenis_barang').val();
            // let jenisVal = $('#jenis').val();
            // let keteranganVal = $('#ket').val();

            if (jenisSpVal == '' || kordinatorVal == '' || jenis_barangVal == '') {
                return showAlert('warning', 'Lengkapi data terlebih dahulu');
            }
            btnProses.hide();
            btnBatal.show();
            cardDaftarBarang.show();
            cardTambahItemBarang.show();
        })

        $('#batal-pemesanan').on('click', function(e) {
            e.preventDefault();
            clearFormPemesanan();
        })

        //Tambah item barang
        $('#tambah-item').on('click', function(e) {
            e.preventDefault();

            let idBarang = $('#namabarang').val();
            let namaBarang = $('#namabarang').find(':selected').text();
            let satuan = $('#satuan').val();
            let isiBox = $('#isibox').val();
            let stok = $('#stok').val();
            let keterangan = $('#keterangan').val();
            let listBarangWrapper = $('#item-barang');
            $('#simpan').show();


            if (namaBarang == '' || isiBox == '' || namaBarang == null) {
                return showAlert('warning', 'Lengkapi item barang terlebih dahulu');
            }

            let nomor = $('#item-barang tr').length + 1;

            let itemBarang = `
        <tr>
            <td class="text-center">${nomor}</td>
            <td style="display:none;">${idBarang}</td>
            <td>${namaBarang}</td>
            <td class="text-center">${satuan}</td>
            <td class="text-center">${isiBox}</td>
            <td class="text-center">${stok}</td>
            <td>${keterangan}</td>
            <td align="center">
                <a href="#" class="btn btn-danger remove btn-xsx" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kirim Pengajuan"  onmouseover="bootstrap.Tooltip.getOrCreateInstance(this).show();"><i class="bi bi-trash"></i></a>
            </td>
        </tr>`;

            $(listBarangWrapper).append(itemBarang);
            clearFormItemBarang();
        });
        //cLEAR ITEM
        $(document).on('click', '.remove', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });

        function clearFormItemBarang() {
            $('#namabarang').val(null).trigger('change'); // Reset Select2
            $('#isibox').val('');
            $('#stok').val('');
            $('#keterangan').val('');
            $('#satuan').val('');
        }
        $('#namabarang').on('select2:select', function(e) {
            let data = e.params.data;

            // Set nilai kategori dan satuan ke input
            $('#kategori-barang').val(data.jenis);
            $('#satuan').val(data.satuan);
            // $('#satuan-barang').text(data.satuan);
        });

        // ==========================

        //Clear form pemesanan
        function clearFormPemesanan() {
            $('#jenis').val(null).trigger('change');
            $('#kordinator').val('');
            $('#jenis_barang').val('');
            $('#tglsp').val('');
            $('#ket').val('');
            $('#kategori-obat').val(null).trigger('change');
            clearFormItemBarang();
            $("#table-item-pesanan tbody tr").remove();
            cardDaftarBarang.hide();
            cardTambahItemBarang.hide();
            btnProses.show();
            btnBatal.hide();
            // generateNomorSP();
        }

        //Remove item
        $("#item-barang").on("click", ".remove", function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            if ($('#item-barang tr').length === 0) btnSimpan.hide();
        });
        //Simpan pemesanan barang
        $('#simpan').on('click', function(e) {
            e.preventDefault();
            let items = [];
            $('#table-item-pesanan tbody tr').each(function() {
                let currentRow = $(this).closest("tr");
                let namaBarang = currentRow.find("td:eq(1)").html();
                let jmlhPsn = currentRow.find("td:eq(3)").html();
                let isiBox = currentRow.find("td:eq(4)").html();
                let stok = currentRow.find("td:eq(5)").html();
                let keterangan = currentRow.find("td:eq(6)").html();
                let itemObj = {
                    'namaBarang': namaBarang,
                    'jmlhPsn': jmlhPsn,
                    'isiBox': isiBox,
                    'stok': stok,
                    'keterangan': keterangan
                }
                items.push(itemObj);
            })
            loading.show();
            btnSimpan.hide();
            $.ajax({
                url: "<?= base_url('sipejuang/simpanpengajuan') ?>",
                method: 'POST',
                data: {
                    'jenis_pengajuan': $('#jenis_pengajuan').val(),
                    'ruangan_id': $('#ruangan_id').val(),
                    'kordinator': $('#kordinator').val(),
                    // 'created_at': $('#jenis').val(),
                    'items': items
                },
                success: function(response) {
                    console.log(response);
                },

                dataType: 'JSON',
                success: function(response) {
                    loading.hide();
                    btnSimpan.show();
                    if (response.status) {
                        clearFormPemesanan();
                        console.log(response);
                        showAlert('success', response.message);
                    } else {
                        showAlert('error', response.message);
                    }
                },
                error: function(response) {
                    loading.hide();
                    btnSimpan.show();
                    var res = JSON.parse(response.responseText);
                    showAlert('error', JSON.stringify(res.message));
                }
            })
        });

        function sumTotal(items) {
            var sum = 0;
            items.map((item) => {
                sum += parseFloat(item.total);
            })
            return sum;
        }
        //Alert
        function showAlert(type, message) {
            switch (type) {
                case 'success':
                    return customSwal.fire({
                        title: 'BERHASIL !',
                        text: message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    })
                    break;
                case 'error':
                    return customSwal.fire({
                        title: 'GAGAL !',
                        text: message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                    break;
                case 'warning':
                    return customSwal.fire({
                        title: 'PERINGATAN !',
                        html: 'Lengkapi data terlebih dahulu!',
                        icon: 'warning',
                        confirmButtonText: 'OK'

                    });
                    break;
            }
        }
    })
</script>
<?= $this->endSection(); ?>