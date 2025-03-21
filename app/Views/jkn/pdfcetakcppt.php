<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
            padding: 0px;
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

        table td.column-padding {
            padding: 15px;
        }

        /* Optional: Styling for table headers */
        table th {
            background-color: #f2f2f2;
            text-align: center;
        }

        /* Optional: Styling for table cells */
        table td {
            padding: 8px;
            text-align: left;
            vertical-align: middle;
        }

        .rata {
            text-align: justify;
        }
    </style>
</head>

<body>

    <?php foreach ($cpptm as $row) : ?>
        <table width="98%" style="border: 0px solid black;font-size:9px">
            <tr>
                <td width="15%" rowspan="5" style="border-collapse:collapse;border-left: 0px solid black">
                    <div style="vertical-align: middle;text-align:center;line-height:70%;"><img src="/assets/img/rs.jpg" width="50px" height="50px"></div>
                </td>
                <td width="30%" rowspan="5">
                    <div style="vertical-align: middle;"><b style="font-size:16px">RSUD INDRAMAYU</b><br>JL Murah Nara No 7 Indramayu<br>Indramayu Jawa Barat</div>
                </td>
                <td width="16%" style="text-align:left;border-collapse: collapse;border-left: 0px solid black">
                    No.RM
                </td>
                <td width="39%" style="text-align:left;">
                    : <?php echo $row['NORM']; ?>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;border-collapse: collapse;border-left: 0px solid black">
                    Nama Pasien
                </td>
                <td style="text-align:left;">
                    : <?php echo htmlspecialchars($row['NAMALENGKAP']); ?>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;border-collapse: collapse;border-left: 0px solid black">
                    Tgl.Lahir
                </td>
                <td style="text-align:left;">
                    : <?php echo $row['TANGGAL_LAHIR']; ?>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;border-collapse: collapse;border-left: 0px solid black">
                    Umur / JK
                </td>
                <td style="text-align:left;">
                    : <?php echo $row['UMUR']; ?> /
                    <?php echo ($row['JK'] == 'L') ? 'Laki-laki' : 'Perempuan'; ?>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;border-collapse: collapse;border-left: 0px solid black">
                    No. KTP
                </td>
                <td style="text-align:left;">
                    : <?php echo $row['KTP']; ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="font-size: 10px; font-weight:bold; text-align:center;border-collapse: collapse;border-top: 0px solid black;border-left: 0px solid black">
                    <div style="vertical-align: middle;text-align:center;line-height:80%;">CATATAN PERKEMBANGAN PASIEN TERINTEGRASI</div><br>
                </td>
            </tr>
        </table>
    <?php endforeach; ?>
    <!-- <table width="100%" style="border: 0px solid black;font-size: 9px">
        <tr style="font-weight: bold;font-size: 9px;text-align: center;">
            <td width="11%" align="center" style="border-collapse: collapse;border-right: 0px solid black">
                <div style="vertical-align: middle;">TGL / JAM</div>
            </td>
            <td width="10%" align="center" style="border-collapse: collapse;border-right: 0px solid black">
                <div style="vertical-align: middle;">PROFESI (PPA)</div>
            </td>
            <td width="40%" align="center" style="border-collapse: collapse;border-right: 0px solid black">
                <div style="vertical-align: middle;">HASIL ASSESSMENT PENATALAKSANAAN PASIEN/SOAP</div>
            </td>
            <td width="24%" align="center" style="border-collapse: collapse;border-right: 0px solid black">
                <div style="vertical-align: middle;">INSTRUKSI</div>
            </td>
            <td width="15%" align="center" style="border-collapse: collapse;border-right: 0px solid black">
                <div style="vertical-align: middle;">PROFESI & VERIFIKASI DPJP</div>
            </td>
        </tr>
        <?php foreach ($cppt as $item) : ?>
            <tr>
                <td align="center" style="collapse;border-top: 0px solid black;border-left: 0px solid black"><?php echo ($item['TANGGAL']); ?></td>
                <td align="center" style="collapse;border-top: 0px solid black;border-left: 0px solid black"><?php echo ($item['JNSPPA']); ?></td>
                <td style="collapse;border-top: 0px solid black;border-left: 0px solid black"><?php echo strip_tags($item['CATATAN']); ?></td>
                <td style="collapse;border-top: 0px solid black;border-left: 0px solid black"><?php echo strip_tags($item['INSTRUKSI']); ?></td>
                <td align="center" valign="center" style="collapse;border-top: 0px solid black;border-left: 0px solid black">

                    <?php
                    $pelaksana = htmlspecialchars($item['DOKTER'] . '' . $item['PERAWAT'] . ' | ' . $item['TGLVERIFIKASI']);
                    $namapelaksana = htmlspecialchars($item['DOKTER'] . '' . $item['PERAWAT']);
                    ?>
                     <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=<?php echo urlencode($pelaksana); ?>"
                        alt="QR Code Perawat" width="30" height="30"><br> 
    <?php echo $namapelaksana; ?>
    </td>
    </tr> <?php endforeach; ?>
</table> -->


</body>

</html>