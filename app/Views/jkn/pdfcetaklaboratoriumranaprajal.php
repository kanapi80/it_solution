<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            padding: 5px;
            font-size: 9px;
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
    <?php if (!empty($labigd)) : ?>
        <table class="table-no-border">
            <tr>
                <td width="15%" align="center"><img src="/assets/img/rs.jpg" width="50px" alt="Logo">
                </td>
                <td width="85%"><b style="font-size:12px">HASIL PEMERIKSAAN LABORATORIUM</b><br><b style="font-size:14px">RSUD INDRAMAYU</b><br><span style="font-size:9px">JL Murah Nara No 7 Indramayu Website : rsud.indramayukab.go.id <br>Telp. 0234272655 Fax. 0234272655</span>
                </td>
            </tr>
        </table>
        <hr>

        <?php
        $firstRow = $labigd[0];
        ?>
        <br>


        <table class="table-no-border" style="padding:1px;font-size:9px;">
            <tr>
                <td width="15%">No. Rekam Medis</td>
                <td width="35%">: <?php echo $firstRow['NORM']; ?></td>
                <td width="15%">No. Registrasi</td>
                <td width="35%">: <?php echo $firstRow['NOPEN']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <?php echo $firstRow['NAMALENGKAP']; ?></td>
                <td>Tgl. Registrasi</td>
                <td>: <?php echo $firstRow['TGLREG']; ?></td>
            </tr>
            <tr>
                <td>JK / Tgl.Lahir</td>
                <td>: <?php echo $firstRow['JKTGLALHIR']; ?></td>
                <td>Tgl.Hasil</td>
                <td>: <?php echo $firstRow['TANGGALHASIL']; ?></td>
            </tr>
            <tr>
                <td>No.Laboratorium</td>
                <td>: <?php echo $firstRow['KUNJUNGAN']; ?></td>
                <td>Unit Pengantar</td>
                <td>: <?php echo $firstRow['UNITPENGANTAR']; ?></td>
            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>: <?php echo htmlspecialchars($firstRow['DIAGNOSA']); ?></td>
                <td>Dokter Perujuk</td>
                <td>: <?php echo htmlspecialchars($firstRow['DOKTERASAL']); ?></td>
            </tr>
        </table>
        <br>

        <?php
        // Mengelompokkan data berdasarkan REFF
        $groupedLabs = [];
        foreach ($labigd as $row) {
            $groupedLabs[$row['NAMATINDAKAN']][] = $row; // Mengelompokkan berdasarkan REF
        }
        ?>

        <table style="font-size: 9px;">
            <tr class="fw-bold" style="background-color: #ededf0;">
                <td width="40%" style="border-bottom: 0px solid black; border-top: 0px solid black;">PEMERIKSAAN</td>
                <td width="15%" style="border-bottom: 0px solid black; border-top: 0px solid black;">HASIL</td>
                <td width="25%" style="border-bottom: 0px solid black; border-top: 0px solid black;">NILAI RUJUKAN</td>
                <td width="20%" style="border-bottom: 0px solid black; border-top: 0px solid black;">SATUAN</td>
            </tr>

            <?php
            // Loop melalui setiap grup REFF
            foreach ($groupedLabs as $PARAMETER => $rows) :
                $firstRows = $rows[0];
            ?>
                <!-- Tampilkan Nama Tindakan dan Tanggal berdasarkan baris pertama dalam grup -->
                <tr>
                    <td colspan="4" class="fw-bold" style="border-bottom: 0px dashed black;"><?php echo htmlspecialchars($firstRows['NAMATINDAKAN']); ?> | <?php echo htmlspecialchars($firstRows['TANGGALHASIL']); ?>
                    </td>
                </tr>

                <?php
                // Loop untuk menampilkan data dalam setiap grup REFF
                foreach ($rows as $row) :
                ?>
                    <tr>
                        <td style="border-bottom: 0px dashed black;"> &nbsp;<?php echo nl2br(htmlspecialchars($row['PARAMETER'])); ?></td>
                        <td style="border-bottom: 0px dashed black;"><?php echo nl2br(htmlspecialchars($row['HASIL'])); ?></td>
                        <td style="border-bottom: 0px dashed black;"><?php echo nl2br(htmlspecialchars($row['NILAI_RUJUKAN'])); ?></td>
                        <td style="border-bottom: 0px dashed black;"><?php echo nl2br(htmlspecialchars($row['SATUAN'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </table>

        <br><br>
        <table class="table-no-border" style="font-size: 9px;">
            <tr>
                <td width="50%"></td>
                <td width="50%" align="center">
                    Indramayu, <?php echo htmlspecialchars($firstRow['TGLSKRG']); ?><br>
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