<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            padding: 3px;
            font-size: 10px;
        }

        .table-no-border {
            border: none;
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
        }

        .container {
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
    <?php if (!empty($lab)) : ?>
        <table class="table-no-border">
            <tr>
                <td width="15%" align="center"><img src="/assets/img/rs.jpg" width="50px" alt="Logo">
                </td>
                <td width="85%"><b style="font-size:12px">HASIL PEMERIKSAAN LABORATORIUM</b><br><b style="font-size:14px">RSUD INDRAMAYU</b><br>JL Murah Nara No 7 Indramayu Website : rsud.indramayukab.go.id <br>Telp. 0234272655 Fax. 0234272655
                </td>
            </tr>
        </table>
        <hr>

        <?php
        // Display the first row details
        $firstRow = $lab[0];
        ?>
        <table class="table-no-border" style="padding: 1px;font-size:9px">
            <tr>
                <td width="20%">No. Rekam Medis</td>
                <td width="30%">: <?php echo htmlspecialchars($firstRow['NORM']); ?></td>
                <td width="15%">No. Registrasi</td>
                <td width="35%">: <?php echo htmlspecialchars($firstRow['NOPEN']); ?></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>: <?php echo htmlspecialchars($firstRow['NAMALENGKAP']); ?></td>
                <td>Tgl. Registrasi</td>
                <td>: <?php echo htmlspecialchars($firstRow['TGLREG']); ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin / Tgl.Lahir</td>
                <td>: <?php echo htmlspecialchars($firstRow['JKTGLALHIR']); ?></td>
                <td>Tgl.Hasil</td>
                <td>: <?php echo htmlspecialchars($firstRow['TANGGALHASIL']); ?></td>
            </tr>
            <tr>
                <td>No.Laboratorium</td>
                <td>: <?php echo htmlspecialchars($firstRow['KUNJUNGAN']); ?></td>
                <td>Unit Pengantar</td>
                <td>: <?php echo htmlspecialchars($firstRow['UNITPENGANTAR']); ?></td>
            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>: <?php echo htmlspecialchars($firstRow['DIAGNOSA']); ?></td>
                <td>Dokter Perujuk</td>
                <td>: <?php echo htmlspecialchars($firstRow['DOKTERASAL']); ?></td>
            </tr>
        </table>
        <br>
        <table width="100%" style="font-size:9px">
            <tr class="fw-bold" style="background-color: #ededf0;">
                <td width="40%" style="border-bottom: 0px solid black; border-top: 0px solid black;">PEMERIKSAAN</td>
                <td width="15%" style="border-bottom: 0px solid black; border-top: 0px solid black;">HASIL</td>
                <td width="25%" style="border-bottom: 0px solid black; border-top: 0px solid black;">NILAI RUJUKAN</td>
                <td width="20%" style="border-bottom: 0px solid black; border-top: 0px solid black;">SATUAN</td>
            </tr>

            <tr>
                <td colspan="4" class="fw-bold" style="border-bottom: 0px dashed black;">
                    <?php echo htmlspecialchars($firstRow['NAMATINDAKAN']); ?>
                </td>
            </tr>
            <?php foreach ($labs as $row) : ?>
                <tr>
                    <td style="border-bottom: 0px dashed black;"><?php echo nl2br(htmlspecialchars($row['PEMERIKSAAN'])); ?></td>
                    <td style="border-bottom: 0px dashed black;"><?php echo nl2br(htmlspecialchars($row['HASIL'])); ?></td>
                    <td style="border-bottom: 0px dashed black;"><?php echo nl2br(htmlspecialchars($row['NILAI_RUJUKAN'])); ?></td>
                    <td style="border-bottom: 0px dashed black;"><?php echo nl2br(htmlspecialchars($row['SATUAN'])); ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
        <br>
        <br>

        <table class="table-no-border" style="font-size:9px">
            <tr>
                <td width="50%"></td>
                <td width="50%" align="center">
                    Indramayu, <?php echo htmlspecialchars($firstRow['TGLSKRG2']); ?><br>
                    Dokter Yang Memeriksa<br>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo urlencode($firstRow['DOKTER']); ?>" alt="QR Code" width="40" height="40"><br>
                    <u><?php echo htmlspecialchars($firstRow['DOKTER']); ?></u><br>
                    NIP. <?php echo htmlspecialchars($firstRow['NIPDPJP']); ?>
                </td>
            </tr>
        </table>
    <?php endif; ?>
</body>

</html>