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

        input[type=text] {
            width: 100%;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ddd;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>

    <table style="padding: 0px;border:none;margin-bottom:2px;">
        <tr>
            <td class="text-center">
                <b>RINCIAN BIAYA PELAYANAN PASIEN<BR> RSUD INDRAMAYU</b>
                <br>
                <hr>
            </td>
        </tr>
    </table>

    <br><br>

    <?php if (!empty($billing)) : ?>
        <table width="100%" style="font-size: 10px;padding: 0px;border:none;margin-top: 1px;">
            <?php foreach ($billing as $index => $row) : ?>
                <?php if ($index == 0) : // Menampilkan hanya baris pertama 
                ?>
                    <tr>
                        <td width="22%">No. Rekam Medis </td>
                        <td width="31%">: <?php echo $row['NORM']; ?></td>
                        <td width="22%">No. Tagihan</td>
                        <td width="25%">: <?php echo $row['TAGIHAN']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>: <?php echo $row['NAMALENGKAP']; ?></td>
                        <td>Tgl. Tagihan</td>
                        <td>: <?php echo $row['TANGGALTAGIHAN']; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin / Umur</td>
                        <td>: <?php echo $row['UMUR']; ?></td>
                        <td>Cara Bayar</td>
                        <td>: <?php echo $row['CARABAYAR']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Registerasi</td>
                        <td>: <?php echo $row['TANGGALREG']; ?></td>
                        <td>No. Jaminan</td>
                        <td>: <?php echo $row['NOMORKARTU']; ?></td>
                    </tr>
                    <?php break; // Hentikan loop setelah baris pertama 
                    ?>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <br> <br>
    <table width="100%" style="font-size: 10px;border: 0px solid black;margin-top: 20px;padding: 2px">
        <tr style="background-color: #ddd; font-weight: bold; align: center">
            <td width="22%">UNIT LAYANAN </td>
            <td width="44%">TINDAKAN PEMERIKSAAN </td>
            <td width="8%" class="text-center">JML</td>
            <td width="14%" class="text-center">HARGA</td>
            <td width="15%" align="right">TOTAL</td>
        </tr>
        <?php $tottagihan = 0;
        foreach ($billing as $row) : $tottagihan += $row['TARIF']; ?>
            <tr>
                <td>
                    <?php
                    if ($row['RUANGAN'] == 'Depo Rajal' or $row['RUANGAN'] == 'Depo IGD') {
                        echo 'FARMASI - ' . $row['RUANGAN'];
                    } else {
                        echo $row['RUANGAN'];
                    }
                    ?></td>
                <td><?php echo $row['LAYANAN']; ?> </td>
                <td align="center"><?php echo $row['JUMLAH']; ?></td>
                <td align="right"><?= number_format($row['TARIF'], 0, ',', '.') ?></td>
                <td align="right"><?= number_format($row['TARIF'] * $row['JUMLAH'], 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
        <tr style="background-color: #ddd; border: 1px solid black;font-weight: bold">
            <td colspan="4" align="right">JUMLAH</td>
            <td align="right"><?= number_format($row['TOTALTAGIHAN'], 0, ',', '.') ?></td>
        </tr>

    </table>


</body>

</html>