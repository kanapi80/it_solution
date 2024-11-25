<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border: 0px solid black;
            padding: 5px;
            font-size: 10px;
            ;
        }

        .table-no-border {
            border: none;
            padding: 0px;
        }

        input[type=text] {
            width: 100%;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ddd;
        }

        .text-center {
            text-align: center;
        }

        .text-tengah {
            text-align: left;
            vertical-align: middle;
        }

        .fw-bold {
            font-weight: bold;
        }

        .kh-height {
            height: 50px;
            /* Menetapkan tinggi baris */
        }

        .container {
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .qr-code {
            width: 150px;
            height: 150px;
        }

        .tr {
            border-collapse: collapse;
            border-bottom: 1px solid black;
        }

        hr.dashed {
            border: 0;
            border-top: 2px dashed #000;
            margin: 20px 0;
        }
    </style>
</head>

<body>

    <?php if (!empty($rad)) : ?>
        <table class="table-no-border">
            <tr>
                <td width="15%" class="text-tengah"> <img src="/assets/img/rs.jpg" width="50px"> </td>
                <td width="85%" class="text-tengah"><b><br>HASIL PEMERIKSAAN RADIOLOGI<br>RSUD INDRAMAYU</b><br>JL Murah Nara No 7 indramayu Website : rsud.indramayukab.go.id Telp. 0234272655 Fax. 0234272655
                </td>
            </tr>
        </table>
        <hr>
        <?php foreach ($rad as $row) : ?>
            <table width="100%" class="table-no-border">
                <tr><br>
                    <td width="15%">No. RM</td>
                    <td width="35%">: <?php echo htmlspecialchars($row['NORM'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td width="15%">No. Registrasi</td>
                    <td width="35%">: <?php echo htmlspecialchars($row['NOPEN'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>: <?php echo htmlspecialchars($row['NAMALENGKAP'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>Tgl. Registrasi</td>
                    <td>: <?php echo htmlspecialchars($row['TGLREG'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td>JK / Umur</td>
                    <td>: <?php echo htmlspecialchars($row['JKTGLALHIR'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>Tgl. Hasil</td>
                    <td>: <?php echo htmlspecialchars($row['TANGGAL'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?php echo htmlspecialchars($row['ALAMAT'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>Nama Tindakan</td>
                    <td>: <?php echo htmlspecialchars($row['NAMATINDAKAN'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td>Unit Pengantar</td>
                    <td>: <?php echo htmlspecialchars($row['UNITPENGANTAR'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td rowspan="2">Diagnosa</td>
                    <td rowspan="2">: <?php echo htmlspecialchars($row['DIAGNOSA'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td>Dokter Perujuk</td>
                    <td>: <?php echo htmlspecialchars($row['DOKTERASAL'], ENT_QUOTES, 'UTF-8'); ?></td>

                </tr>
            </table> <br>
            <hr>
            <table width="100%" class="table-no-border">

                <tr> <br>
                    <td class="fw-bold">HASIL PEMERIKSAAN :

                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo nl2br(htmlspecialchars($row['HASIL'], ENT_QUOTES, 'UTF-8')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="fw-bold">KESAN PEMERIKSAAN :</td>
                </tr>
                <tr>
                    <td>
                        <?php echo nl2br(htmlspecialchars($row['KESAN'], ENT_QUOTES, 'UTF-8')); ?>
                    </td>
                </tr>
            </table>
            <table width="100%" class="table-no-border">
                <tr> <br> <br>
                    <td width="50%" class="align-middle text-center">
                    </td>
                    <td class="text-center" width="50%">Indramayu, <?php echo $row['TANGGAL']; ?><br>
                        Konsulen <br>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo $row['DOKTER']; ?>" alt="QR Code" width="70" height="70"><br>
                        <u><?php echo $row['DOKTER']; ?></u><br>
                        NIP. <?php echo $row['NIPDOKTER']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>


        <?php else : ?>
            <p>Pasien Tidak Melakukan Pemeriksaan Radiologi</p>
        <?php endif; ?>



</body>

</html>