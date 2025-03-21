<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<main id="main" class="main">
    <div class="pagetitle">
        <h6 class="fw-bold">MONITORING <SPAN class="badge bg-success rounded-1 fw-bold">GROUPING INACBG</SPAN></h6>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">DASHBOARD</li>
                <li class="breadcrumb-item active">Monitoring Grouping INACBG</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

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
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-dark bg-light">
                    <div class="card-header p-1 m-0 ps-3">
                        <i class="bi bi-journal-plus text-success"></i>
                        <b class="card-title fs-6">List Grouping <span>| Today</span> </b>
                        <!-- <h6 class="card-title fs-6">List Grouping <span>| Today</span></h6> -->

                    </div>
                    <div class="card">
                        <div class="card-body fs-6 text">
                            <div class="mb-3">
                                <div class="row text-end">
                                    <div class="col-md-2 px-1 d-flex align-items-end mt-3 pe-2">
                                        <button onclick="window.location.reload();" class="btn btn-success btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="bi bi-arrow-clockwise"></i></button>
                                        <button class="btn btn-sm btn-secondary" id="copyButton">
                                            <i class="bi bi-copy fw-bold" data-bs-toggle="tooltip" data-bs-placement="right" title="Copy Table"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-10 mt-3 text-end" style="font-size: 12px;">

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-auto">
                            <button class="btn btn-sm btn-secondary" id="copyButton">
                                <i class="bi bi-copy fw-bold" data-bs-toggle="tooltip" data-bs-placement="left" title="Copy Table"></i>
                            </button>
                        </div> -->
                            <div class="row">
                                <table class="table table-striped w-100" style="font-size: 10px;" id="getlistgrouping">
                                    <tr>
                                        <th class="text-center bg-success  text-white" Width="2%">NO</th>
                                        <th class="bg-success  text-white" width="8%">TANGGAL</th>
                                        <th class="bg-success  text-white" width="10%">NOSEP</th>
                                        <th class="bg-success  text-white text-center" width="8%">TARIF RS</th>
                                        <th class="bg-success  text-white" width="8%">TARIF INACBG</th>
                                        <th class="bg-success  text-white" width="8%">DIAGNOSA</th>
                                        <th class="bg-success  text-white" width="38%">DESKRIPSI</th>
                                        <th class="bg-success  text-white" width="12%">PETUGAS</th>
                                    </tr>
                                    <?php
                                    $totalTarifRS = 0;
                                    $totalTarifINACBG = 0;
                                    $no = 1;
                                    foreach ($jkn as $row) :
                                        $totalTarifRS += $row['TARIFRS'];
                                        $totalTarifINACBG += $row['TARIFINACBG']; ?>
                                        <tr class="align-middle">
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $row['TANGGAL'] ?></td>
                                            <td><?= $row['NOSEP'] ?></td>
                                            <td class="text-end"><?= number_format($row['TARIFRS'], 0, ',', '.'); ?></td>
                                            <td class="text-end"> <?php
                                                                    if ($row['TARIFINACBG'] == 0) {
                                                                        echo '<span class="badge bg-warning rounded-1 text-black">CEK GROUPING</span>';
                                                                    } else {
                                                                        if ($row['TARIFINACBG'] < $row['TARIFRS']) {
                                                                            $badgeClass = "danger";
                                                                        } elseif ($row['TARIFINACBG'] == $row['TARIFRS']) {
                                                                            $badgeClass = "primary";
                                                                        } else {
                                                                            $badgeClass = "success";
                                                                        }
                                                                        echo '<span class="badge bg-' . $badgeClass . ' rounded-1">' . number_format($row['TARIFINACBG'], 0, ',', '.') . '</span>';
                                                                    }
                                                                    ?>
                                            </td>
                                            <td class="text-start" style="font-size: 8px;"><?= $row['DIAGNOSA'] ?></td>
                                            <td class="text-start" style="font-size: 8px;"><?= $row['RES'] ?></td>
                                            <td><?= $row['NAMA'] ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                    <tfoot class="fw-bold table-light">
                                        <td class="fw-bold"></td>
                                        <td class="fw-bold text-start">JUMLAH</td>
                                        <td class="text-end"></td>
                                        <td class="text-end"><?= number_format($totalTarifRS, 0, ',', '.') ?></td>
                                        <td class="text-end"><?= number_format($totalTarifINACBG, 0, ',', '.') ?></td>
                                        <td class="text-end"></td>
                                        <td class="text-end"></td>
                                        <td class="text-end"></td>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <script>
        document.getElementById("copyButton").addEventListener("click", function() {
            // Pilih tabel yang ingin disalin
            var table = document.getElementById("getlistgrouping");

            // Salin tabel ke clipboard
            var range = document.createRange();
            range.selectNode(table);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);

            try {
                document.execCommand('copy');
                customSwal.fire({
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
        });
    </script>
</main><!-- End #main -->



<?= $this->endsection() ?>