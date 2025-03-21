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
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Dashboard" class="btn btn-outline-success btn-xsl p-2 btn-shadow" onclick="window.location.href='<?= base_url('sipejuang/formpengajuan') ?>'">
                                <i class="bi bi-house-fill "></i>
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
                        <!-- Form Pengajuan -->
                        <section class="section">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12 mt-2">
                                    <div class="card text-dark bg-light">
                                        <div class="card-header p-1 m-0 ps-2 pe-2 bg-secondary text-white">
                                            <h6 class="fw-bold fs-custom mt-2 pe-1" style="font-size: 11px; margin: 1;padding-left:8px;">
                                                <i class="bi bi-pencil-square pe-1"></i> FORM PENGAJUAN PERMOHONAN
                                            </h6>
                                        </div>

                                        <div class="modal-body p-0 ps-2 pe-2">
                                            <form class="row g-2 mb-2 form-control-sm" id="hargaForm" style="font-size: 11px;">
                                                <div class="col-md-4">Pemohon
                                                    <input type="text" class="form-control form-control-sm fw-bold" id="pemohon" value="<?php echo $_SESSION['Ses_Ruangan']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">Jenis Pengajuan
                                                    <input type="text" class="form-control form-control-sm fw-bold" id="jenis_pengajuan">
                                                </div>
                                                <div class="col-md-4">Koordinator
                                                    <input type="text" class="form-control form-control-sm fw-bold" name="kordinator">
                                                </div>

                                                <div class="col-md-4">Jenis Barang
                                                    <input type="text" class="form-control form-control-sm fw-bold" id="jenis_barang">
                                                </div>
                                                <div class="col-md-4">Nama Barang
                                                    <input type="text" class="form-control form-control-sm fw-bold" id="nama_barang">
                                                </div>
                                                <div class="col-md-4">Satuan
                                                    <input type="text" class="form-control form-control-sm fw-bold" id="satuan">
                                                </div>

                                                <div class="col-md-4">Jumlah Permintaan
                                                    <input type="text" class="form-control form-control-sm fw-bold" id="jumlah">
                                                </div>
                                                <div class="col-md-4">Sisa Stok
                                                    <input type="text" class="form-control form-control-sm fw-bold" id="stok">
                                                </div>
                                                <div class="col-md-4">Keterangan
                                                    <input type="text" class="form-control form-control-sm fw-bold" id="keterangan">
                                                </div>
                                                <div class="col-md-12 text-end mt-2">
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Simpan Pengajuan" class="btn btn-primary btn-xsl p-2 btn-shadow w-100" onclick="window.location.href='<?= base_url('sipejuang/riwayatpengajuan') ?>'">
                                                        <i class="bi bi-save"></i> Simpan
                                                    </button>
                                                </div>
                                                <input type="hidden" id="formItemID">
                                                <!-- </form> -->

                                                <!-- <div class="w-100 mt-3">
                                        <h6 class="fw-bold text-start text-secondary"><i class="bi bi-card-checklist text-success"></i> Detail Barang</h6>
                                    </div> -->
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
                    </div>
                </div>
    </section>
    <!-- End Form Pengajuan  -->
</main>
<?= $this->endSection(); ?>