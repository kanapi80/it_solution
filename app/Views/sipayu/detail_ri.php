<?= $this->extend('layout/template_detil_jasa'); ?>
<!-- <?= $this->section('content'); ?> -->

<main id="main" class="main mt-0 bg-white g-0">

    <section class="section ">
        <div class="row g-0">
            <div class="col-12 col-md-12 col-lg-12">
                <!-- <div class="card text-dark bg-light"> -->
                <div class="card-header p-0 m-0" style="background-color:#e9ebee;">
                    <i class="bi bi-person-square text-success"></i>
                    <b class="text-dark ps-1" style="font-size:9px;"> IDENTITAS PASIEN</b>
                </div>
                <div class="card-body p-1 mb-1 bg-light" style="border-bottom: 3px solid #009900;">
                    <table width="100%" style="font-size:9px" cellspacing="0px" cellpadding="1px">
                        <?php if (count($summary) > 0) {
                            foreach ($summary as $row) :
                                $pembagianJasa = $row['NilaiRealisasi'] * 40 / 100;
                        ?>
                                <tr>
                                    <td width="16%" class="ps-4">Nomor Rekam Medis</td>
                                    <td width="18%" class="fw-bold">: <?= $row['NomorRekamMedis'] ?></td>
                                    <td width="10%">Register Kunjungan</td>
                                    <td width="23%">:
                                        <?= $row['IdRegisterKunjungan'] ?></td>
                                    <td width="10%">Nilai Real Cost</td>
                                    <td width="20%" class="fw-bold">: Rp. <?php
                                                                            if (isset($summaryTransaction))  echo number_format($summaryTransaction, 2, ",", ".");
                                                                            else echo number_format($row['NilaiRealCost'], 2, ",", "."); ?> </td>
                                </tr>
                                <tr>
                                    <td class="ps-4">Nama Pasien</td>
                                    <td class="fw-bold">: <?= $row['NamaPasien'] ?></td>
                                    <td>Penjamin</td>
                                    <td>:
                                        <?= $row['NamaAsuransi'] ?> </td>
                                    <td>Nilai Klaim</td>
                                    <td style="font-weight: 600;">: Rp. <?= number_format($row['NilaiRealisasi'], 2, ",", ".") ?></td>
                                </tr>
                                <tr>
                                    <td class="ps-4">Tanggal Masuk</td>
                                    <td>:
                                        <?= $row['TanggalMasuk'] ?></td>
                                    <td>Nomor SEP</td>
                                    <td>:
                                        <?= $row['NomorSEP'] ?></td>
                                    <?php if ($row['NamaAsuransi'] == 'BPJS / JKN') {
                                        echo '<td width="15%">Realisasi Jasa Pelayanan (40 %)</td>
                                 <td style="font-weight:bold;">: Rp. <span class="badge bg-success" style="font-size:10px; border-radius:2px">' . number_format($pembagianJasa, 2, ",", ".") . '</span> </td>';
                                    } ?>
                                </tr>
                                <tr>
                                    <td class="ps-4">Tanggal Pulang</td>
                                    <td>:
                                        <?= $row['TanggalPulang'] ?></td>
                                    <td>Nama Ruangan</td>
                                    <td>:
                                        <?= $row['Ruangan'] ?></td>
                                    <td>Tanggal Realisasi</td>
                                    <td>: <?= $row['created_at'] ?></td>
                                </tr>

                        <?php
                            endforeach;
                        } ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </section>
    <!-- <hr> -->
    <section class="section mb-1">
        <div class="row g-0">
            <div class="col-12 col-md-12 col-lg-12">
                <!-- <div class="card text-dark bg-light"> -->
                <div class="card-header p-0 m-0">
                    <i class="bi bi-credit-card-2-front-fill text-success"></i>
                    <b class="text-dark ps-1" style="font-size:9px;"> RUANG PERAWATAN</b>
                </div>
                <div class="card-body p-1 ps-0">
                    <table bgcolor="#000000" width="100%" cellspacing="1px" cellpadding="3px" style="font-size:9px;padding-right:2px;padding-left:2px;" id="myTable1">
                        <tr class="bg-success text-center text-white" style="font-weight:bold;">
                            <td width="3%" rowspan="2" class="text-center">NO</td>
                            <td width="10%" rowspan="2" class="text-start">JENIS TINDAKAN</td>
                            <td width="28%" rowspan="2" class="text-start">URAIAN</td>
                            <td width="10%" rowspan="2" class="text-start">RUANGAN</td>
                            <td width="20%" rowspan="2" class="text-start">PELAKSANA</td>
                            <td width="6%" rowspan="2">TARIF</td>
                            <td width="6%" rowspan="2">JASA PELAYANAN</td>
                            <td width="8%" rowspan="2">JASA RVU</td>
                            <td colspan="6" align="center">PORSI JASA PELAYANAN</td>
                            <td width="8%" rowspan="2">TOTAL</td>
                        </tr>
                        <tr class="bg-success text-center text-white" style="font-weight:bold;">
                            <td width="10%">JTL</td>
                            <td width="10%">MEDIS</td>
                            <td width="22%">MEDIS_UMUM</td>
                            <td width="10%">PARAMEDIS</td>
                            <td width="10%">KEBERSAMAAN</td>
                            <td width="10%">RM</td>
                        </tr>
                        <?php if (count($jasamedis) > 0) {
                            $no = 0;
                            foreach ($jasamedis as $row) :

                                $no++;
                                $sumTarif = [
                                    $row['Tarif']
                                ];
                                $sumPelayanan = [
                                    $row['jasaPelayanan']
                                ];
                                $sumRS = [
                                    $row['PundiRemunRvu']
                                ];
                                $sumMedis = [
                                    $row['JasaMedisRvu'] + $row['JasaMedisTindakanRvu']
                                ];
                                $sumMedisUmum = [
                                    $row['JasaMedisTindakanDokterUmumRvu']
                                ];
                                $sumAsisten = [
                                    $row['JasaAsistenRvu']
                                ];
                                $sumAdmin = [
                                    $row['JasaAdmRvu'] + $row['jasaAsisten_kebersamaan']
                                ];
                                $sumRM = [
                                    $row['JasaRM_rvu']
                                ];
                                $sumTotal = [
                                    $row['PundiRemunRvu'] + $row['JasaMedisRvu'] + $row['JasaMedisTindakanRvu'] + $row['JasaAsistenRvu'] + $row['JasaAdmRvu'] + $row['jasaAsisten_kebersamaan'] + $row['JasaRM_rvu'] + $row['JasaMedisTindakanDokterUmumRvu']
                                ];
                                $sumJasPelRvu = [
                                    $row['JasaPelayananRvu']
                                ];

                                $tarif = array_sum($sumTarif);
                                $pelayanan = array_sum($sumPelayanan);
                                $rs = array_sum($sumRS);
                                $medis = array_sum($sumMedis);
                                $medisUmum = array_sum($sumMedisUmum);
                                $asisten = array_sum($sumAsisten);
                                $kebersamaan = array_sum($sumAdmin);
                                $rm = array_sum($sumRM);
                                $total = array_sum($sumTotal);
                                $totalJaspelRvu = array_sum($sumJasPelRvu);

                                $totalPelayanan[] = $pelayanan;
                                $totalTarif[] = $tarif;
                                $totalRS[] = $rs;
                                $totalMedis[] = $medis;
                                $totalMedisUmum[] = $medisUmum;
                                $totalAsisten[] = $asisten;
                                $totalKebersamaan[] = $kebersamaan;
                                $totalRM[] = $rm;
                                $totalJasa[] = $total;
                                $totalJasaPelayananRvu[] = $totalJaspelRvu;

                        ?>
                                <tr bgcolor="#FFFFFF">
                                    <td align="center" valign="top"><?= $no; ?></td>
                                    <td align="left"><?= $row['KelompokTindakan'] ?></td>
                                    <td><?= $row['NamaTindakan']; ?></td>
                                    <td width="10%"><?= $row['Poliklinik']; ?></td>
                                    <td><?= $row['Dokter']; ?></td>
                                    <td align="right"><?= number_format($row['Tarif'], 2, ",", ".") ?></td>
                                    <td align="right"><?= number_format($row['jasaPelayanan'], 2, ",", ".") ?></td>
                                    <td width="10%" align="right"><?= number_format($row['JasaPelayananRvu'], 2, ",", ".") ?></td>
                                    <td width="10%" align="right"><?= number_format($row['PundiRemunRvu'], 2, ",", ".") ?></td>
                                    <td width="10%" align="right"><?= number_format($row['JasaMedisRvu'] + $row['JasaMedisTindakanRvu'], 2, ",", ".") ?></td>
                                    <td width="10%" align="right"><?= number_format($row['JasaMedisTindakanDokterUmumRvu'], 2, ",", "."); ?></td>
                                    <td width="10%" align="right"><?= number_format($row['JasaAsistenRvu'], 2, ",", ".") ?></td>
                                    <td width="10%" align="right"><?= number_format($row['JasaAdmRvu'] + $row['jasaAsisten_kebersamaan'], 2, ",", ".") ?></td>
                                    <td width="10%" align="right"><?= number_format($row['JasaRM_rvu'], 2, ",", ".") ?></td>
                                    <td width="10%" align="right"><?= number_format($row['PundiRemunRvu'] + $row['JasaMedisRvu'] + $row['JasaMedisTindakanRvu'] + $row['JasaAsistenRvu'] + $row['JasaAdmRvu'] + $row['jasaAsisten_kebersamaan'] + $row['JasaRM_rvu'] + $row['JasaMedisTindakanDokterUmumRvu'], 2, ",", ".") ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr style="font-weight:bold" bgcolor="#e9ebee">
                                <td bgcolor="e9ebee" colspan="5" align="right" cellspacing="1px" cellpadding="2px" height="25px">
                                    Sub Total </td>
                                <td width="10%" align="right" cellspacing="1px" cellpadding="2px"><?= number_format(array_sum($totalTarif), 2, ",", ".") ?></td>
                                <td width="10%" align="right" cellspacing="1px" cellpadding="2px"><?= number_format(array_sum($totalPelayanan), 2, ",", ".") ?></td>
                                <td width="10%" align="right" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalJasaPelayananRvu), 2, ",", ".") ?></td>
                                <td width="10%" align="right" cellspacing="1px" cellpadding="2px"><?= number_format(array_sum($totalRS), 2, ",", ".") ?></td>
                                <td width="10%" align="right" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalMedis), 2, ",", ".") ?></td>
                                <td width="10%" align="right" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalMedisUmum), 2, ",", ".") ?></td>
                                <td width="10%" align="right" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalAsisten), 2, ",", ".") ?></td>
                                <td width="10%" align="right" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalKebersamaan), 2, ",", ".") ?></td>
                                <td width="10%" align="right" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalRM), 2, ",", ".") ?></td>
                                <td width="10%" align="right" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalJasa), 2, ",", ".") ?></td>
                            </tr>

                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>

    <?php if (count($jasalab) > 0) { ?>
        <section class="section mt-0">
            <div class="row g-0">
                <div class="col-12 col-md-12 col-lg-12">
                    <!-- <div class="card text-dark bg-light"> -->
                    <div class="card-header p-0 m-0">
                        <i class="bi bi-hourglass-split text-success"></i>
                        <b class="text-dark ps-1" style="font-size:9px;"> LABORATORIUM</b>
                    </div>
                    <div class="card-body p-1 ps-0">
                        <table bgcolor="#000000" width="100%" cellspacing="1px" cellpadding="3px" style="font-size:9px;padding-right:2px;padding-left:2px;" id="myTable1">
                            <tr class="bg-success text-center text-white" style="font-weight:bold;">
                                <td width="3%" rowspan="2" class="text-center">NO</td>
                                <td width="12%" rowspan="2" class="text-start">JENIS TINDAKAN</td>
                                <td width="26%" rowspan="2" class="text-start">URAIAN</td>
                                <td width="12%" rowspan="2" class="text-start">UNIT LAYANAN</td>
                                <td width="20%" rowspan="2" class="text-start">PELAKSANA</td>
                                <td width="8%" rowspan="2" class="text-center">TARIF</td>
                                <td width="8%" rowspan="2" class="text-center">JASA PELAYANAN</td>
                                <td width="8%" rowspan="2" class="text-center">JASA RVU</td>
                                <td colspan="4" class="text-center">JASA PELAYANAN </td>
                                <td width="8%" rowspan="2">TOTAL</td>
                            </tr>
                            <tr class="bg-success text-center text-white" style="font-weight:bold;">
                                <td width="10%" class="text-center">JTL</td>
                                <td width="10%" class="text-center">MEDIS</td>
                                <td width="10%" class="text-center">PARAMEDIS</td>
                                <td width="10%" class="text-center">KEBERSAMAAN</td>
                            </tr>
                            <?php
                            $no = 0;
                            foreach ($jasalab as $row) :
                                $no++;
                                $jp = $row['jasaPelayanan'];

                                $sumTarifLab = [
                                    $row['Tarif']
                                ];
                                $sumJP = [$jp];
                                $sumJasPelRvu = [$row['JasaPelayananRvu']];
                                $sumRSLab = [
                                    $row['PundiRemunRvu']
                                ];
                                $sumMedisLab = [
                                    $row['JasaMedisRvu']
                                ];
                                $sumAsistenLab = [
                                    $row['JasaAsistenRvu']
                                ];
                                $sumAdminLab = [
                                    $row['JasaAdmRvu']
                                ];
                                $sumTotalLab = [
                                    $row['PundiRemunRvu'] + $row['JasaMedisRvu'] + $row['JasaAsistenRvu'] + $row['JasaAdmRvu']
                                ];

                                $JPLab = array_sum($sumJP);
                                $JasPelRvuLab = array_sum($sumJasPelRvu);
                                $tarifLab = array_sum($sumTarifLab);
                                $rsLab = array_sum($sumRSLab);
                                $medisLab = array_sum($sumMedisLab);
                                $asistenLab = array_sum($sumAsistenLab);
                                $kebersamaanLab = array_sum($sumAdminLab);
                                $totalLab = array_sum($sumTotalLab);

                                $totalJPLab[] = $JPLab;
                                $totalJasPelRvuLab[] = $JasPelRvuLab;
                                $totalTarifLab[] = $tarifLab;
                                $totalRSLab[] = $rsLab;
                                $totalMedisLab[] = $medisLab;
                                $totalAsistenLab[] = $asistenLab;
                                $totalKebersamaanLab[] = $kebersamaanLab;
                                $totalJasaLab[] = $totalLab;

                            ?>
                                <tr bgcolor="#FFFFFF">
                                    <td class="text-center" valign="top"><?= $no; ?></td>
                                    <td class="text-start"><?= $row['KelompokTindakan']; ?></td>
                                    <td><?= $row['NamaTindakan']; ?></td>
                                    <td><?= $row['poliklinik']; ?></td>
                                    <td><?= $row['Dokter']; ?></td>
                                    <td class="text-end"><?= number_format($row['Tarif'], 2, ",", ".") ?></td>
                                    <td class="text-end"><?= number_format($jp, 2, ",", ".") ?></td>
                                    <td class="text-end"><?= number_format($row['JasaPelayananRvu'], 2, ",", ".") ?></td>
                                    <td width="10%" class="text-end"><?= number_format($row['PundiRemunRvu'], 2, ",", ".") ?></td>
                                    <td width="10%" class="text-end"><?= number_format($row['JasaMedisRvu'], 2, ",", ".") ?></td>
                                    <td width="10%" class="text-end"><?= number_format($row['JasaAsistenRvu'], 2, ",", ".") ?></td>
                                    <td width="10%" class="text-end"><?= number_format($row['JasaAdmRvu'], 2, ",", ".") ?></td>
                                    <td width="10%" class="text-end"><?= number_format($row['PundiRemunRvu'] + $row['JasaMedisRvu'] + $row['JasaAsistenRvu'] + $row['JasaAdmRvu'], 2, ",", ".") ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr style="font-weight:bold" bgcolor="#e9ebee">
                                <td bgcolor="e9ebee" colspan="5" class="text-end" cellspacing="1px" cellpadding="3px" height="25px">
                                    Sub Total </td>
                                <td width="10%" class="text-end" cellspacing="1px" cellpadding="3px"><?= number_format(array_sum($totalTarifLab), 2, ",", ".") ?></td>
                                <td width="10%" class="text-end" cellspacing="1px" cellpadding="3px"><?= number_format(array_sum($totalJPLab), 2, ",", ".") ?></td>
                                <td width="10%" class="text-end" cellspacing="1px" cellpadding="3px"><?= number_format(array_sum($totalJasPelRvuLab), 2, ",", ".") ?></td>
                                <td width="10%" class="text-end" cellspacing="1px" cellpadding="3px"><?= number_format(array_sum($totalRSLab), 2, ",", ".") ?></td>
                                <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalMedisLab), 2, ",", ".") ?></td>
                                <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalAsistenLab), 2, ",", ".") ?></td>
                                <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalKebersamaanLab), 2, ",", ".") ?></td>
                                <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalJasaLab), 2, ",", ".") ?></td>
                            </tr>
                        </table>

                    <?php } ?>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <?php if (count($jasarad) > 0) { ?>
            <section class="section mt-0">
                <div class="row g-0">
                    <div class="col-12 col-md-12 col-lg-12">
                        <!-- <div class="card text-dark bg-light"> -->
                        <div class="card-header p-0 m-0 ps-2">
                            <i class="bi bi-image-fill text-success"></i>
                            <b class="text-dark ps-1" style="font-size:9px;"> RADIOLOGI</b>
                        </div>
                        <div class="card-body p-1 ps-0">
                            <table bgcolor="#000000" width="100%" cellspacing="1px" cellpadding="3px" style="font-size:9px;padding-right:2px;padding-left:2px;" id="myTable1">
                                <tr class="bg-success text-center text-white" style="font-weight:bold;">
                                    <td width="3%" rowspan="2" align="center">NO</td>
                                    <td width="12%" rowspan="2">JENIS TINDAKAN</td>
                                    <td width="26%" rowspan="2">URAIAN</td>
                                    <td width="10%" rowspan="2">RUANGAN</td>
                                    <td width="20%" rowspan="2">PELAKSANA</td>
                                    <td width="8%" rowspan="2">TARIF</td>
                                    <td width="8%" rowspan="2">JASA PELAYANAN</td>
                                    <td width="8%" rowspan="2">JASA RVU</td>
                                    <td colspan="4" align="center">PORSI JASA PELAYANAN</td>
                                    <td width="8%" rowspan="2">TOTAL</td>
                                </tr>
                                <tr class="bg-success text-center text-white" style="font-weight:bold;">
                                    <td width="10%" align="center">JTL</td>
                                    <td width="10%" align="center">MEDIS</td>
                                    <td width="10%" align="center">RADIOGRAFER</td>
                                    <td width="10%" align="center">KEBERSAMAAN</td>
                                </tr>
                                <?php
                                $no = 0;
                                foreach ($jasarad as $row) :
                                    $no++;

                                    $sumTarifRad = [
                                        $row['Tarif']
                                    ];
                                    $sumJPRad = [
                                        $row['jasaPelayanan']
                                    ];
                                    $sumRSRad = [
                                        $row['PundiRemunRvu']
                                    ];
                                    $sumMedisRad = [
                                        $row['JasaMedisRvu']
                                    ];
                                    $sumAsistenRad = [
                                        $row['JasaAsistenRvu']
                                    ];
                                    $sumAdminRad = [
                                        $row['JasaAdmRvu']
                                    ];
                                    $sumTotalRad = [
                                        $row['PundiRemunRvu'] + $row['JasaMedisRvu'] + $row['JasaAsistenRvu'] + $row['JasaAdmRvu']
                                    ];
                                    $sumJasPelRvuRad = [
                                        $row['JasaPelayananRvu']
                                    ];

                                    $tarifRad = array_sum($sumTarifRad);
                                    $JPRad = array_sum($sumJPRad);
                                    $rsRad = array_sum($sumRSRad);
                                    $medisRad = array_sum($sumMedisRad);
                                    $asistenRad = array_sum($sumAsistenRad);
                                    $kebersamaanRad = array_sum($sumAdminRad);
                                    $totalRad = array_sum($sumTotalRad);
                                    $JasPelRvuRad = array_sum($sumJasPelRvuRad);

                                    $totalTarifRad[] = $tarifRad;
                                    $totalJPRad[] = $JPRad;
                                    $totalRSRad[] = $rsRad;
                                    $totalMedisRad[] = $medisRad;
                                    $totalAsistenRad[] = $asistenRad;
                                    $totalKebersamaanRad[] = $kebersamaanRad;
                                    $totalJasaRad[] = $totalRad;
                                    $totalJasPelRvuRad[] = $JasPelRvuRad;

                                ?>
                                    <tr bgcolor="#FFFFFF">
                                        <td align="center" valign="top"><?= $no; ?></td>
                                        <td align="left"><?= $row['KelompokTindakan']; ?></td>
                                        <td><?= $row['NamaTindakan']; ?></td>
                                        <td><?= $row['poliklinik']; ?></td>
                                        <td><?= $row['Dokter']; ?></td>
                                        <td align="right"><?= number_format($row['Tarif'], 2, ",", ".") ?></td>
                                        <td align="right"><?= number_format($row['jasaPelayanan'], 2, ",", ".") ?></td>
                                        <td align="right"><?= number_format($row['JasaPelayananRvu'], 2, ",", ".") ?></td>
                                        <td width="10%" align="right"><?= number_format($row['PundiRemunRvu'], 2, ",", ".") ?></td>
                                        <td width="10%" align="right"><?= number_format($row['JasaMedisRvu'], 2, ",", ".") ?></td>
                                        <td width="10%" align="right"><?= number_format($row['JasaAsistenRvu'], 2, ",", ".") ?></td>
                                        <td width="10%" align="right"><?= number_format(0, 2, ",", ".") ?></td>
                                        <td width="10%" align="right"><?= number_format($row['PundiRemunRvu'] + $row['JasaMedisRvu'] + $row['JasaAsistenRvu'] + $row['JasaAdmRvu'], 2, ",", ".") ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                <tr style="font-weight:bold" bgcolor="#e9ebee">
                                    <td bgcolor="e9ebee" colspan="5" align="right" cellspacing="1px" cellpadding="2px" height="25px">
                                        Sub Total </td>
                                    <td width="10%" align="right" cellspacing="1px" cellpadding="2px"><?= number_format(array_sum($totalTarifRad), 2, ",", ".") ?></td>
                                    <td width="10%" align="right" cellspacing="1px" cellpadding="2px"><?= number_format(array_sum($totalJPRad), 2, ",", ".") ?></td>
                                    <td width="10%" align="right" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalJasPelRvuRad), 2, ",", ".") ?></td>
                                    <td width="10%" align="right" cellspacing="1px" cellpadding="2px"><?= number_format(array_sum($totalRSRad), 2, ",", ".") ?></td>
                                    <td width="10%" align="right" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalMedisRad), 2, ",", ".") ?></td>
                                    <td width="10%" align="right" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalAsistenRad), 2, ",", ".") ?></td>
                                    <td width="10%" align="right" cellspacing="0px" cellpadding="0px"><?= number_format(0, 2, ",", ".") ?></td>
                                    <td width="10%" align="right" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalJasaRad), 2, ",", ".") ?></td>
                                </tr>
                            </table>

                        <?php } ?>
                        </div>
                    </div>
                </div>
                </div>
            </section>

            <?php if (count($jasaoperasi) > 0) { ?>
                <section class="section mt-0">
                    <div class="row g-0">
                        <div class="col-12 col-md-12 col-lg-12">
                            <!-- <div class="card text-dark bg-light"> -->
                            <div class="card-header p-0 m-0 ps-2">
                                <i class="bi bi-house-fill text-success"></i>
                                <b class="text-dark ps-1" style="font-size:9px;"> KAMAR OPERASI</b>
                            </div>
                            <div class="card-body p-1 ps-0">
                                <table width="100%" cellspacing="1px" cellpadding="3px" style="font-size:9px;padding-right:2px;padding-left:2px;" id="myTable1">
                                    <tr class="bg-success text-center text-white" style="font-weight:bold;">
                                        <td width="3%" rowspan="2" class="text-center">NO</td>
                                        <td width="12%" rowspan="2" class="text-start">JENIS TINDAKAN</td>
                                        <td width="26%" rowspan="2" class="text-start">URAIAN</td>
                                        <td width="26%" rowspan="2" class="text-start">UNIT LAYANAN</td>
                                        <td width="20%" rowspan="2" class="text-start">PELAKSANA</td>
                                        <td width="8%" rowspan="2">TARIF</td>
                                        <td width="8%" rowspan="2">JASA PELAYANAN</td>
                                        <td width="8%" rowspan="2">JASA RVU</td>
                                        <td colspan="6" class="text-center">JASA PELAYANAN </td>
                                        <td width="8%" rowspan="2">TOTAL</td>
                                    </tr>
                                    <tr class="bg-success text-center text-white" style="font-weight:bold;">
                                        <td width="10%" class="text-center">JTL</td>
                                        <td width="10%" class="text-center">DOKTER OPERATOR</td>
                                        <td width="10%" class="text-center">DOKTER ANASTESI</td>
                                        <td width="10%" class="text-center">PERAWAT BEDAH</td>
                                        <td width="10%" class="text-center">PENATA ANASTESI</td>
                                        <td width="10%" class="text-center">KEBERSAMAAN</td>
                                    </tr>
                                    <?php
                                    $no = 0;
                                    foreach ($jasaoperasi as $row) :
                                        $no++;

                                        $jp = $row['jasaPelayanan'];

                                        $sumTarifOp = [
                                            $row['Tarif']
                                        ];
                                        $sumJasPelRvuOp = [$row['JasaPelayananRvu']];
                                        $sumJPOp = [
                                            $jp
                                        ];
                                        $sumRSOp = [
                                            $row['PundiRemunRvu']
                                        ];
                                        $sumMedisOp = [
                                            $row['JasaMedisDokterRvu']
                                        ];
                                        $sumMedisAnastesiOp = [
                                            $row['JasaMedisDokterAnestesiRvu']
                                        ];
                                        $sumPerawatOp = [
                                            $row['JasaMedisPerawatBedahRvu']
                                        ];
                                        $sumPenataOp = [
                                            $row['JasaMedisPenataAnestesiRvu']
                                        ];
                                        $sumKebersamaanOp = [
                                            $row['jasaAsisten_kebersamaan']
                                        ];
                                        $sumTotalOp = [
                                            $row['PundiRemunRvu'] + $row['JasaMedisDokterRvu'] + $row['JasaMedisDokterAnestesiRvu'] + $row['JasaMedisPerawatBedahRvu'] + $row['JasaMedisPenataAnestesiRvu'] + $row['jasaAsisten_kebersamaan']
                                        ];

                                        $tarifOp = array_sum($sumTarifOp);
                                        $JPOp = array_sum($sumJPOp);
                                        $JasPelRvuOp = array_sum($sumJasPelRvuOp);
                                        $rsOp = array_sum($sumRSOp);
                                        $medisOperatorOp = array_sum($sumMedisOp);
                                        $medisAnastesiOp = array_sum($sumMedisAnastesiOp);
                                        $perawatBedahOp = array_sum($sumPerawatOp);
                                        $penataOp = array_sum($sumPenataOp);
                                        $kebersamaanOp = array_sum($sumKebersamaanOp);
                                        $totalOp = array_sum($sumTotalOp);

                                        $totalTarifOp[] = $tarifOp;
                                        $totalJPOp[] = $JPOp;
                                        $totalJasPelRvuOp[] = $JasPelRvuOp;
                                        $totalRSOp[] = $rsOp;
                                        $totalMedisOperatorOp[] = $medisOperatorOp;
                                        $totalMedisAnastesiOp[] = $medisAnastesiOp;
                                        $totalPerawatOp[] = $perawatBedahOp;
                                        $totalPenataOp[] = $penataOp;
                                        $totalKebersamaanOp[] = $kebersamaanOp;
                                        $totalJasaOp[] = $totalOp;

                                    ?>
                                        <tr bgcolor="#FFFFFF">
                                            <td class="text-center" valign="top"><?= $no; ?></td>
                                            <td class="text-start"><?= $row['KelompokTindakan']; ?></td>
                                            <td><?= $row['NamaTindakan']; ?></td>
                                            <td><?= $row['Poliklinik']; ?></td>
                                            <td><?= $row['Dokter']; ?></td>
                                            <td class="text-end"><?= number_format($row['Tarif'], 2, ",", ".") ?></td>
                                            <td class="text-end"><?= number_format($jp, 2, ",", ".") ?></td>
                                            <td class="text-end"><?= number_format($row['JasaPelayananRvu'], 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end"><?= number_format($row['PundiRemunRvu'], 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end"><?= number_format($row['JasaMedisDokterRvu'], 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end"><?= number_format($row['JasaMedisDokterAnestesiRvu'], 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end"><?= number_format($row['JasaMedisPerawatBedahRvu'], 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end"><?= number_format($row['JasaMedisPenataAnestesiRvu'], 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end"><?= number_format($row['jasaAsisten_kebersamaan'], 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end"><?= number_format($row['PundiRemunRvu'] + $row['JasaMedisDokterRvu'] + $row['JasaMedisDokterAnestesiRvu'] + $row['JasaMedisPerawatBedahRvu'] + $row['JasaMedisPenataAnestesiRvu'] + $row['jasaAsisten_kebersamaan'], 2, ",", ".") ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                    <tr style="font-weight:bold" bgcolor="#e9ebee">
                                        <td bgcolor="e9ebee" colspan="5" class="text-end" cellspacing="1px" cellpadding="3px" height="25px">
                                            Sub Total </td>
                                        <td width="10%" class="text-end" cellspacing="1px" cellpadding="3px"><?= number_format(array_sum($totalTarifOp), 2, ",", ".") ?></td>
                                        <td width="10%" class="text-end" cellspacing="1px" cellpadding="3px"><?= number_format(array_sum($totalJPOp), 2, ",", ".") ?></td>
                                        <td width="10%" class="text-end" cellspacing="1px" cellpadding="3px"><?= number_format(array_sum($totalJasPelRvuOp), 2, ",", ".") ?></td>
                                        <td width="10%" class="text-end" cellspacing="1px" cellpadding="3px"><?= number_format(array_sum($totalRSOp), 2, ",", ".") ?></td>
                                        <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalMedisOperatorOp), 2, ",", ".") ?></td>
                                        <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalMedisAnastesiOp), 2, ",", ".") ?></td>
                                        <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalPerawatOp), 2, ",", ".") ?></td>
                                        <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalPenataOp), 2, ",", ".") ?></td>
                                        <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalKebersamaanOp), 2, ",", ".") ?></td>
                                        <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalJasaOp), 2, ",", ".") ?></td>
                                    </tr>
                                </table>

                            <?php } ?>

                            </div>
                        </div>
                    </div>
                    </div>
                </section>

                <?php if (count($jasafarmasi) > 0) { ?>
                    <section class="section mt-0">
                        <div class="row g-0">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card-header p-0 m-0">
                                    <i class="bi bi-rss-fill text-success"></i>
                                    <b class="text-dark ps-1" style="font-size:9px;"> FARMASI</b>
                                </div>
                                <div class="card-body p-1 ps-0">
                                    <table width="100%" cellspacing="1px" cellpadding="3px" style="font-size:9px;padding-right:2px;padding-left:2px;" id="myTable1">
                                        <tr class="bg-success text-center text-white" style="font-weight:bold;">
                                            <td width="3%" rowspan="2" class="text-center">NO</td>
                                            <td width="12%" rowspan="2" class="text-start">JENIS TINDAKAN</td>
                                            <td width="26%" rowspan="2" class="text-start">URAIAN</td>
                                            <td width="26%" rowspan="2" class="text-start">UNIT LAYANAN</td>
                                            <td width="20%" rowspan="2" class="text-start">PELAKSANA</td>
                                            <td width="8%" rowspan="2">TARIF</td>
                                            <td width="8%" rowspan="2"> JASA PELAYANAN</td>
                                            <td width="8%" rowspan="2">JASA RVU</td>
                                            <td colspan="4" class="text-center">JASA PELAYANAN </td>
                                            <td width="8%" rowspan="2">TOTAL</td>
                                        </tr>
                                        <tr class="bg-success text-center text-white" style="font-weight:bold;">
                                            <td width="10%" class="text-center">JTL</td>
                                            <td width="10%" class="text-center">MEDIS</td>
                                            <td width="10%" class="text-center">PARAMEDIS</td>
                                            <td width="10%" class="text-center">APOTEKER</td>
                                        </tr>
                                        <?php
                                        $no = 0;
                                        foreach ($jasafarmasi as $row) :

                                            $jp = $row['JasaPelayanan'];
                                            // if ($row['NamaTindakan'] != 'Resep Farmasi /R') {
                                            //     $jp = $row['Tarif'] * (2 / 100);
                                            // } else {
                                            //     $jp = $row['Tarif'] * (75 / 100);
                                            // }

                                            $no++;
                                            $sumTarifFar = [
                                                $row['Tarif']
                                            ];
                                            $sumJPFar = [
                                                $jp
                                            ];
                                            $sumJasPelRvuFar = [
                                                $row['JasaPelayananRvu']
                                            ];
                                            $sumRSFar = [
                                                $row['PundiRemunRvu']
                                            ];
                                            $sumMedisFar = [
                                                $row['JasaMedisRvu']
                                            ];
                                            $sumAsistenFar = [
                                                $row['JasaAsistenRvu']
                                            ];
                                            $sumAdminFar = [
                                                $row['JasaAdmRvu']
                                            ];
                                            $sumTotalFar = [
                                                $row['PundiRemunRvu'] + $row['JasaMedisRvu'] + $row['JasaAsistenRvu'] + $row['JasaAdmRvu']
                                            ];

                                            $tarifFar = array_sum($sumTarifFar);
                                            $JPFar = array_sum($sumJPFar);
                                            $JasPelRvuFar = array_sum($sumJasPelRvuFar);
                                            $rsFar = array_sum($sumRSFar);
                                            $medisFar = array_sum($sumMedisFar);
                                            $asistenFar = array_sum($sumAsistenFar);
                                            $apotekerFar = array_sum($sumAdminFar);
                                            $totalFar = array_sum($sumTotalFar);

                                            $totalTarifFar[] = $tarifFar;
                                            $totalJasPelRvuFar[] = $JasPelRvuFar;
                                            $totalJPFar[] = $JPFar;
                                            $totalRSFar[] = $rsFar;
                                            $totalMedisFar[] = $medisFar;
                                            $totalAsistenFar[] = $asistenFar;
                                            $totalApotekerFar[] = $apotekerFar;
                                            $totalJasaFar[] = $totalFar;

                                        ?>
                                            <tr bgcolor="#FFFFFF">
                                                <td class="text-center" valign="top"><?= $no; ?></td>
                                                <td class="text-start"><?= $row['KelompokTindakan']; ?></td>
                                                <td><?= $row['NamaTindakan']; ?></td>
                                                <td><?= $row['poliklinik']; ?></td>
                                                <td><?= $row['Dokter']; ?></td>
                                                <td class="text-end"><?= number_format($row['Tarif'], 2, ",", ".") ?></td>
                                                <td class="text-end"><?= number_format($jp, 2, ",", ".") ?></td>
                                                <td class="text-end"><?= number_format($row['JasaPelayananRvu'], 2, ",", ".") ?></td>
                                                <td width="10%" class="text-end"><?= number_format($row['PundiRemunRvu'], 2, ",", ".") ?></td>
                                                <td width="10%" class="text-end"><?= number_format($row['JasaMedisRvu'], 2, ",", ".") ?></td>
                                                <td width="10%" class="text-end"><?= number_format($row['JasaAsistenRvu'], 2, ",", ".") ?></td>
                                                <td width="10%" class="text-end"><?= number_format($row['JasaAdmRvu'], 2, ",", ".") ?></td>
                                                <td width="10%" class="text-end"><?= number_format($row['PundiRemunRvu'] + $row['JasaMedisRvu'] + $row['JasaAsistenRvu'] + $row['JasaAdmRvu'], 2, ",", ".") ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                        <tr style="font-weight:bold" bgcolor="#e9ebee">
                                            <td bgcolor="e9ebee" colspan="5" class="text-end" cellspacing="1px" cellpadding="3px" height="25px">
                                                Sub Total </td>
                                            <td width="10%" class="text-end" cellspacing="1px" cellpadding="3px"><?= number_format(array_sum($totalTarifFar), 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end" cellspacing="1px" cellpadding="3px"><?= number_format(array_sum($totalJPFar), 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end" cellspacing="1px" cellpadding="3px"><?= number_format(array_sum($totalJasPelRvuFar), 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end" cellspacing="1px" cellpadding="3px"><?= number_format(array_sum($totalRSFar), 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalMedisFar), 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalAsistenFar), 2, ",", ".") ?></td>
                                            <td width="10%" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalApotekerFar), 2, ",", ".") ?></td>
                                            <td width="10%" bgcolor="#e9ebee" class="text-end" cellspacing="0px" cellpadding="0px"><?= number_format(array_sum($totalJasaFar), 2, ",", ".") ?></td>
                                        </tr>
                                    </table>

                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        </div>
                    </section>


                    <section class="section mt-0">
                        <div class="row g-0">
                            <div class="col-12 col-md-12 col-lg-12">

                                <div class="card-body p-1 ps-0">
                                    <?php
                                    $JPJasa = 0;
                                    $JPLab = 0;
                                    $JPRad = 0;
                                    $JPFar = 0;
                                    $JPOp = 0;

                                    $JPel = 0;
                                    $JPelLab = 0;
                                    $JPelRad = 0;
                                    $JPelOp = 0;
                                    $JPelFar = 0;

                                    $RSJasa = 0;
                                    $RSLab = 0;
                                    $RSRad = 0;
                                    $RSFar = 0;
                                    $RSOp = 0;

                                    $jasa = 0;
                                    $lab = 0;
                                    $rad = 0;
                                    $far = 0;
                                    $op = 0;
                                    if (count($jasamedis) > 0) {
                                        $JPJasa = array_sum($totalPelayanan);
                                        $sumJasa = [
                                            array_sum($totalMedis) + array_sum($totalAsisten) + array_sum($totalKebersamaan) + array_sum($totalRM)
                                        ];
                                        $JPel = array_sum($sumJasa);
                                        $RSJasa = array_sum($totalRS);
                                        $jasa = array_sum($totalJasa);
                                    }

                                    if (count($jasalab) > 0) {
                                        $JPLab = array_sum($totalJPLab);
                                        $sumJasaLab = [
                                            array_sum($totalMedisLab) + array_sum($totalAsistenLab) + array_sum($totalKebersamaanLab)
                                        ];
                                        $JPelLab = array_sum($sumJasaLab);
                                        $RSLab = array_sum($totalRSLab);
                                        $lab = array_sum($totalJasaLab);
                                    }

                                    if (count($jasarad) > 0) {
                                        $JPRad = array_sum($totalJPRad);
                                        $sumJasaRad = [
                                            array_sum($totalMedisRad) + array_sum($totalAsistenRad) + array_sum($totalKebersamaanRad)
                                        ];
                                        $JPelRad = array_sum($sumJasaRad);
                                        $RSRad = array_sum($totalRSRad);
                                        $rad = array_sum($totalJasaRad);
                                    }

                                    if (count($jasafarmasi) > 0) {
                                        $JPFar = array_sum($totalJPFar);
                                        $sumJasaFar = [
                                            array_sum($totalMedisFar) + array_sum($totalAsistenFar) + array_sum($totalApotekerFar)
                                        ];
                                        $JPelFar = array_sum($sumJasaFar);
                                        $RSFar = array_sum($totalRSFar);
                                        $far = array_sum($totalJasaFar);
                                    }

                                    if (count($jasaoperasi) > 0) {
                                        $JPOp = array_sum($totalJPOp);
                                        $sumJasaOp = [
                                            array_sum($totalMedisOperatorOp) + array_sum($totalMedisAnastesiOp) + array_sum($totalPerawatOp) + array_sum($totalPenataOp)
                                        ];
                                        $JPelOp = array_sum($sumJasaOp);
                                        $RSOp = array_sum($totalRSOp);
                                        $op = array_sum($totalJasaOp);
                                    }

                                    ?>
                                    <table bgcolor="#000000" width="100%" cellspacing="1px" cellpadding="3px" style="font-size:9px;padding-right:2px;padding-left:2px;" id="myTable1">
                                        <tr style="font-weight:bold" bgcolor="#e9ebee">
                                            <td bgcolor="e9ebee" colspan="9" align="right" cellspacing="1px" cellpadding="2px" height="25px">
                                                Total Jasa Pelayanan</td>

                                            <td width="10%" align="right" cellspacing="0px" cellpadding="0px" style="font-weight: 600;"><?= number_format($JPJasa + $JPLab + $JPFar + $JPRad + $JPOp, 2, ",", "."); ?></td>
                                        </tr>
                                        <tr style="font-weight:bold" bgcolor="#e9ebee">
                                            <td bgcolor="e9ebee" colspan="9" align="right" cellspacing="1px" cellpadding="2px" height="25px">
                                                Total Jasa RS</td>

                                            <td width="10%" align="right" cellspacing="0px" cellpadding="0px" style="font-weight: 600;"><?= number_format($RSJasa + $RSLab + $RSRad + $RSFar + $RSOp, 2, ",", "."); ?></td>
                                        </tr>
                                        <tr style="font-weight:bold" bgcolor="#e9ebee">
                                            <td bgcolor="e9ebee" colspan="9" align="right" cellspacing="1px" cellpadding="2px" height="25px">
                                                Total Jasa Pelaksana</td>

                                            <td width="10%" align="right" cellspacing="0px" cellpadding="0px" style="font-weight: 600;"><?= number_format($JPel + $JPelLab + $JPelRad + $JPelFar + $JPelOp, 2, ",", "."); ?></td>
                                        </tr>
                                        <tr style="font-weight:bold" bgcolor="#e9ebee">
                                            <td bgcolor="e9ebee" colspan="9" align="right" cellspacing="1px" cellpadding="2px" height="25px">
                                                Total Pembagian Jasa</td>

                                            <td width="10%" align="right" cellspacing="0px" cellpadding="0px" style="font-weight: 600;"><span class="badge bg-success" style="border-radius: 2px;font-size:10px"><?= number_format($jasa + $lab + $rad + $far + $op, 2, ",", "."); ?></span></td>
                                        </tr>
                                    </table>


                                </div>
                            </div>
                        </div>
                        </div>
                    </section>
</main>

<?= $this->endsection() ?>