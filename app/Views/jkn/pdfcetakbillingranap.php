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
            padding: 5px;
        }

        .table-no-border {
            border: none;
        }


        .text-center {
            text-align: center;
        }

        hr.dashed {
            border: 0;
            border-top: 2px dashed #000;
            margin: 20px 0;
        }
    </style>
</head>

<body>

    <table style="padding: 0px;border:none;" width="100%">
        <tr>
            <td class="text-center">
                <b style="font-size:12px">RINCIAN BIAYA PELAYANAN PASIEN</b><br><b style="font-size:14px"> RSUD INDRAMAYU</b>
                <br>
                JL Murah Nara No 7 Indramayu Website : rsud.indramayukab.go.id <br>Telp. 0234272655 Fax. 0234272655

            </td>
        </tr>
    </table>
    <hr>
    <table width="100%" style="font-size: 9px;padding: 1px;border:none;margin-top: 1px;">
        <?php
        // Display the first row details
        $firstRow = $billing[0];
        ?>
        <tr>
            <td width="22%">No. Rekam Medis </td>
            <td width="31%">: <?php echo $firstRow['NORM']; ?></td>
            <td width="20%">No. Tagihan</td>
            <td width="27%">: <?php echo $firstRow['TAGIHAN']; ?></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>: <?php echo $firstRow['NAMALENGKAP']; ?></td>
            <td>Tgl. Tagihan</td>
            <td>: <?php echo $firstRow['TANGGALTAGIHAN']; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin / Umur</td>
            <td>: <?php echo $firstRow['UMUR']; ?></td>
            <td>Cara Bayar</td>
            <td>: <?php echo $firstRow['CARABAYAR']; ?></td>
        </tr>
        <tr>
            <td>Tanggal Registerasi</td>
            <td>: <?php echo $firstRow['TANGGALREG']; ?></td>
            <td>No. Jaminan</td>
            <td>: <?php echo $firstRow['NOMORKARTU']; ?></td>
        </tr>
        </tbody>
    </table>

    <table width="98%" style="font-size: 9px;border-collapse: collapse;border: 0px solid black;margin-top: 20px;padding: 1px">
        <tr style="background-color: #ddd; font-weight: bold;">
            <td width="66%" style="border-left: border:0px solid black ;border-bottom:0px solid black;border-top:border:0px solid black ;">UNIT LAYANAN </td>
            <!-- <td width="44%" style="border-bottom: 0px solid black;border-top: border:0px solid black ;">TINDAKAN PEMERIKSAAN </td> -->
            <td width="8%" class="text-center" style="border-bottom: 0px solid black;border-top:border:0px solid black;">JML</td>
            <td width="14%" class="text-center" style="border-bottom: 0px solid black;border-top:border:0px solid black;">HARGA</td>
            <td width="15%" align="right" style="border-bottom: 0px solid black;border-top:border:0px solid black ;border-right:border:0px solid black;">TOTAL</td>
        </tr>
        <?php
        $ruanganGrouped = []; // Array untuk menyimpan data berdasarkan ruangan
        $tottagihan = 0;
        // Mengelompokkan data berdasarkan ruangan
        foreach ($billing as $row) {
            $ruanganGrouped[$row['RUANGAN']][] = $row;
            $tottagihan += $row['TARIF'] * $row['JUMLAH'];
        }
        // Menampilkan data per ruangan
        foreach ($ruanganGrouped as $ruangan => $rows) {
            // Menampilkan header ruangan
            echo '<tr><td colspan="5" style="font-weight: bold;">&nbsp;' .
                ($ruangan == 'Depo Rajal' || $ruangan == 'Depo IGD' ? 'FARMASI - ' : '') .
                $ruangan . '</td></tr>';
            // Menampilkan detail untuk tiap layanan dalam ruangan
            foreach ($rows as $row) {
                echo '<tr>';
                // echo '<td>' .
                //     ($row['RUANGAN'] == 'Depo Rajal' || $row['RUANGAN'] == 'Depo IGD' ? 'FARMASI - ' : '') .
                //     $row['RUANGAN'] .
                //     '</td>';
                echo '<td>&nbsp;&nbsp;&nbsp;' . $row['LAYANAN'] . '</td>';
                echo '<td align="center">' . $row['JUMLAH'] . '</td>';
                echo '<td align="right">' . number_format($row['TARIF'], 0, ',', '.') . '</td>';
                echo '<td align="right" style="border-collapse: collapse;border-right: 0px solid black;">' .
                    number_format($row['TARIF'] * $row['JUMLAH'], 0, ',', '.') .
                    '</td>';
                echo '</tr>';
            }
        }
        ?>
        <tr style="background-color: #ddd; border: 0px solid black;font-weight: bold">
            <td colspan="3" align="right" style="border-top: border:0px solid black ;border-left: border:0px solid black;border-bottom: 0px solid black;">JUMLAH</td>
            <td align="right" style="border-top: border:0px solid black ;border-right: border:0px solid black;border-bottom: 0px solid black; "><?= number_format($tottagihan, 0, ',', '.') ?></td>
        </tr>
    </table>
</body>

</html>