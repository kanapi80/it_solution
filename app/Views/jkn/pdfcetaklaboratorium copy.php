<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            /* padding: 10px; */
            font-size: 10px;
            background: #f1f1f1;
        }

        /* Header/Blog Title */
        .header {
            padding: 2px;
            text-align: left;
            background: white;
        }

        /* Add a card effect for articles */
        .container {
            width: 210mm;
            /* Lebar kertas A4 */
            height: 297mm;
            /* Tinggi kertas A4 */
            position: absolute;
            border: 1px solid #ddd;
            margin: 0 auto;
            padding: 10mm;
            box-sizing: border-box;
        }

        .card {
            width: 100%;
            /* Lebar card sama dengan lebar container */
            height: 100%;
            /* Tinggi card 50% dari tinggi container */
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10mm;
            box-sizing: border-box;
        }

        /* Footer */
        .footer {
            padding: 1120px;
            text-align: center;
            background: #ddd;
            margin-top: 5px;
        }

        .fw-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>


    <table class="table-no-border">
        <tr>
            <td width="15%"> <img src="/assets/img/rs.jpg" width="50px"> </td>
            <td style="margin-top: 10px;width: 85%"><br><br><b>HASIL PEMERIKSAAN LABORATORIUM<BR>RSUD INDRAMAYU</b><br>JL Murah Nara No 7 indramayu Website : rsud.indramayukab.go.id Telp. 0234272655 Fax. 0234272655
            </td>
        </tr>
    </table>
    <hr>


    <?php if (!empty($lab)) : ?>
        <?php foreach ($lab as $index => $row) : ?>
            <?php if ($index == 0) : // Menampilkan hanya baris pertama 1010501012408080187  24080802963
            ?>
                <table class="table-no-border"><br><br>
                    <tr>
                        <td width="20%">No. Rekam Medis </td>
                        <td width="30%">: <?php echo $row['NORM']; ?></td>
                        <td width="15%">No. Registrasi</td>
                        <td width="35%">: <?php echo $row['NOPEN']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>: <?php echo $row['NAMALENGKAP']; ?></td>
                        <td>Tgl. Registrasi</td>
                        <td>: <?php echo $row['TGLREG']; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin / Tgl.Lahir</td>
                        <td>: <?php echo $row['JKTGLALHIR']; ?></td>
                        <td>Tgl.Hasil</td>
                        <td>: <?php echo $row['TANGGALHASIL']; ?></td>
                    </tr>
                    <tr>
                        <td>No.Laboratorium</td>
                        <td>: <?php echo $row['KUNJUNGAN']; ?></td>
                        <td>Unit Pengantar</td>
                        <td>: <?php echo $row['UNITPENGANTAR']; ?></td>
                    </tr>
                    <tr>
                        <td>Diagnosa</td>
                        <td>: <?php echo $row['DIAGNOSA']; ?></td>
                        <td>Dokter Perujuk</td>
                        <td>: <?php echo $row['DOKTERASAL']; ?></td>
                    </tr>

                    </tbody>
                </table>
                <hr>
                <div class="container">
                    <div class="card">
                        <table width="100%">
                            <tr class="fw-bold"><br>
                                <td width="40%">PEMERIKSAAN </td>
                                <td width="15%">HASIL </td>
                                <td width="25%">NILAI RUJUKAN</td>
                                <td width="20%">SATUAN</td>
                            </tr>
                            <tr>
                                <td><b><?php echo $row['NAMATINDAKAN']; ?></b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php break; // Hentikan loop setelah baris pertama 
                            ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <tr>
                        <?php foreach ($lab as $row) : ?>
                            <td> <?php echo $row['PARAMETER']; ?></td>
                            <td><?php echo $row['HASIL']; ?> </td>
                            <td><?php echo $row['NILAI_RUJUKAN']; ?></td>
                            <td><?php echo $row['SATUAN']; ?></td>
                    </tr>
                    <tr>
                        <td> <?php echo $row['PARAMETER']; ?></td>
                        <td><?php echo $row['HASIL']; ?> </td>
                        <td><?php echo $row['NILAI_RUJUKAN']; ?></td>
                        <td><?php echo $row['SATUAN']; ?></td>
                    </tr>
                    <tr>
                        <td> <?php echo $row['PARAMETER']; ?></td>
                        <td><?php echo $row['HASIL']; ?> </td>
                        <td><?php echo $row['NILAI_RUJUKAN']; ?></td>
                        <td><?php echo $row['SATUAN']; ?></td>
                    </tr>
                    <tr>
                        <td> <?php echo $row['PARAMETER']; ?></td>
                        <td><?php echo $row['HASIL']; ?> </td>
                        <td><?php echo $row['NILAI_RUJUKAN']; ?></td>
                        <td><?php echo $row['SATUAN']; ?></td>
                    </tr>
                <?php endforeach; ?>
                        </table>
                    <?php else : ?>
                        <p>Data tidak tersedia.</p>
                    <?php endif; ?>
                    </div>
                </div>



                <table class="table table-no-border">
                    <tr>
                        <td width="50%">
                        </td>
                        <td width="50%" align="center">Indramayu, <?php echo $row['TGLSKRG2']; ?><br>
                            Dokter Yang Memeriksa<br><br><br><br>

                            <U><?php echo $row['DOKTER']; ?></U><br>
                            NIP. <?php echo $row['NIPDPJP']; ?>

                        </td>
                    </tr>

                </table>

</body>

</html>