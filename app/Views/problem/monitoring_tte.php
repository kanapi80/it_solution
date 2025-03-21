<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<main id="main" class="main">
    <div class="pagetitle">
        <h6 class="fw-bold">MONITORING <SPAN class="badge bg-success rounded-1 fw-bold">TTE</SPAN></h6>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">PROBLEM</li>
                <li class="breadcrumb-item active">Monitoring TTE</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body fs-6 text">
                        <div class="mb-3">
                            <div class="row text-end">
                                <div class="col-md-2 px-1 d-flex align-items-end mt-3">
                                    <button onclick="window.location.reload();" class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="bi bi-arrow-clockwise"></i></button>
                                    <!-- <button type="submit" class="btn btn-outline-success btn-sm fs-7"><i class="bx bxs-search"></i>Cari</button> -->
                                </div>
                                <div class="col-md-10 mt-3 text-end" style="font-size: 12px;">
                                    <button type="button" class="btn btn-outline-success btn-sm fs-7" id="btn-filter">
                                        <?php $url = $configtte['URL'];
                                        $url = str_replace('"', '', $url);
                                        echo $url; ?></button>
                                    <input type="hidden" name="id" value="87" id="id">

                                    <?php
                                    $status = str_replace('"', '', trim($configtte['ST_STATUS']));
                                    ?>

                                    <button type="button" id="toggleButton"
                                        class="btn btn-<?= ($status === 'true') ? 'success' : 'danger'; ?> btn-sm fs-7 <?= ($status === 'true') ? 'blink' : ''; ?>"
                                        onclick="updateGrouping()"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="<?= ($status === 'true') ? 'Non Aktifkan' : 'Aktifkan'; ?>">
                                        <i class="bi <?= ($status === 'true') ? 'bi-circle-fill' : 'bi-circle'; ?>"></i>
                                        <?= ($status === 'true') ? 'Aktif' : 'Non Aktif'; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-striped w-100" style="font-size: 10px;">
                                <tr>
                                    <th class="text-center bg-success  text-white">NO</th>
                                    <th class="bg-success  text-white">ID</th>
                                    <th class="bg-success  text-white">TANGGAL</th>
                                    <th class="bg-success  text-white text-center">STATUS CODE</th>
                                    <th class="bg-success  text-white">RESPONSE</th>
                                    <th class="bg-success  text-white">DOKTER</th>
                                </tr>
                                <?php
                                $no = 1;
                                foreach ($tte as $row) : ?>
                                    <tr class="align-middle">
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $row['ID'] ?></td>
                                        <td><?= $row['TANGGAL'] ?></td>
                                        <td class="text-center"><?php if ($row['STATUS_CODE'] == '200') : ?> <span class="badge bg-success rounded-1"><?= $row['STATUS_CODE'] ?></span> <?php else : ?> <span class="badge bg-danger rounded-1"><?= $row['STATUS_CODE'] ?></span><?php endif; ?></td>
                                        <td><?php if ($row['STATUS_CODE'] == '200') : ?> <i class="bi bi-check2-square text-success"></i> <?php $string = $row['DOK'];
                                                                                                                                            $string = str_replace('"', '', $string);
                                                                                                                                            echo $string; ?><?php else : ?><?= $row['ERROR'] ?> <span class="badge bg-danger rounded-1"><?= $row['ST_CODE'] ?></span><?php endif; ?></td>
                                        <td><?= $row['DPJP'] ?></td>

                                    </tr>
                                <?php endforeach; ?>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->
<script>
    function updateGrouping() {
        let id = document.querySelector('input[name="id"]').value;

        if (!id) {
            customSwal.fire({
                icon: "warning",
                title: "Peringatan!",
                text: "Silakan masukkan ID terlebih dahulu.",
                confirmButtonColor: "#f39c12",
                confirmButtonText: "OK"
            });
            return;
        }

        fetch(`<?= base_url('problem/update_monitoring') ?>`)
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    customSwal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: data.message,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(() => {
                        window.location.reload(true); // Reload halaman setelah update sukses
                    });
                } else {
                    customSwal.fire({
                        icon: "error",
                        title: "Gagal!",
                        text: data.message,
                        confirmButtonColor: "#d33",
                        confirmButtonText: "OK"
                    });
                }
            })
            .catch(error => {
                customSwal.fire({
                    icon: "error",
                    title: "Kesalahan!",
                    text: "Terjadi kesalahan saat mengupdate data.",
                    confirmButtonColor: "#d33",
                    confirmButtonText: "OK"
                });
            });


        function updateGrouping() {
            let button = document.getElementById("toggleButton");

            // Toggle class 'blink'
            if (button.classList.contains("blink")) {
                button.classList.remove("blink");
            } else {
                button.classList.add("blink");
            }

            // AJAX atau Fetch untuk update status di backend
        }

    }
</script>


<?= $this->endsection() ?>