<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            width: 100%;

            border-collapse: collapse;
            border: 0px solid black;
            padding-left: 8px;
            padding: 5px;

        }

        .table-no-border {
            border: none;
        }

        input[type=text] {
            width: 100%;
            /* padding: 12px 20px; */
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ddd;
            ;

        }

        .fw-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>


    <?php
    // Display the first row details
    $firstRow = $nokun[0];
    ?>
    <br>
    <?php foreach ($resume as $row) : ?>
        <table>
            <tr>
                <td width="10%" rowspan="3"><br><br>
                    <img src="/assets/img/rs.jpg" width="350px" height="350px">
                </td>
                <td width="65%" rowspan="3" style="font-size: 14px; font-weight: bold text-align:center"><br><br>IDENTITAS PASIEN RAWAT JALAN<BR>RSUD INDRAMAYU
                </td>
                <td width="25%" style="text-align:center; font-weight: border-collapse; border-left: 0px solid black;border-bottom: 0px solid black">
                    <?php echo strtoupper($firstRow['RUANGAN']); ?>
                </td>
            </tr>
            <tr>
                <td style="text-align:center; font-weight: border-collapse; border-left: 0px solid black;border-bottom: 0px solid black">
                    <?php echo $row['NAMAINSTANSI']; ?>
                </td>
            </tr>
            <tr>
                <td style="text-align:center; font-weight: border-collapse; border-left: 0px solid black;border-bottom: 0px solid black">
                    <b>Rp. <?php echo number_format($row['TAGIHAN'], 0, ',', '.'); ?></b>
                </td>
            </tr>
        </table>
        <br>
        <br>

        <table width=" 100%" class="table-no-border">
            <tr>
                <td width="75%" class="fw-bold">Diisi oleh Adm Rawat Jalan</td>
                <td width="25%" class="fw-bold">Tanggal : <?php echo $row['TGLREG']; ?>
                </td>
            </tr>
        </table>

        <table width="100%">
            <tr>
                <td width="17%">No. RM </td>
                <td width="58%">: <?php echo $row['NORM']; ?></td>
                <td width="25%"><?php echo $row['CARABAYAR']; ?></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>: <?php echo $row['NAMALENGKAP']; ?></td>
                <td>No. Kartu</td>
            </tr>
            <tr>
                <td>Tgl Lahir/ Umur</td>
                <td>: <?php echo $row['TGL_LAHIR']; ?></td>
                <td><?php echo $row['NOMORKARTU']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: <?php echo $row['JENISKELAMIN']; ?></td>
                <td>NO. SEP</td>
            </tr>
            <tr>
                <td>Alamat Pasien</td>
                <td>: <?php echo $row['ALAMAT']; ?></td>
                <td><?php echo $row['NOMORSEP']; ?></td>
            </tr>
        </table>
        <br>
        <br>
        <table width="100%" class="table-no-border">
            <tr>
                <td width="75%" class="fw-bold">Diisi oleh Dokter</td>
                <td width="25%" class="fw-bold">ICD 10 / ICD 9 CM</td>
            </tr>
        </table>

        <br>
        <table width="100%">
            <tr>
                <td width="27%">Diagnosa Utama </td>
                <td width="48%">: <?php echo $row['DIAGNOSA']; ?></td>
                <td width="25%" style="text-align:center; font-weight: border-collapse; border-left: 0px solid black;border-bottom: 0px solid black"><input type="text" value="<?php echo $row['KODE']; ?>"><?php echo $row['KODE']; ?></td>
            </tr>
            <tr>
                <td>Diagnosa Tambahan</td>
                <td>: <?php echo $row['KODE_PROSEDUR']; ?></td>
                <td style="text-align:center; font-weight: border-collapse; border-left: 0px solid black;border-bottom: 0px solid black">
                    <input type="text" value="" style="text-align:center; font-weight: border-collapse; border-left: 0px solid black;border-bottom: 0px solid black">
                </td>
            </tr>
            <tr>
                <td>Penyebab Luar Kesakitan/Kematian</td>
                <td>: <?php echo $row['DIAGNOSA_MENINGGAL']; ?></td>
                <td style="text-align:center; font-weight: border-collapse; border-left: 0px solid black;border-bottom: 0px solid black"><input type="text" value="<?php echo $row['KODE_MENINGGAL']; ?>"></td>
            </tr>
            <tr>
                <td><b>Tindakan / Operasi</b></td>
                <td></td>
                <td style="text-align:center; font-weight: border-collapse; border-bottom: 0px solid black"></td>
            </tr>
            <tr>
                <td> - Utama</td>
                <td>: <?php echo $row['TINDAKAN_MEDIS']; ?></td>
                <td style="text-align:center; font-weight: border-collapse; border-left: 0px solid black;border-bottom: 0px solid black"> <input type="text" value="<?php echo $row['KODE_PROSEDUR']; ?>"></td>
            </tr>
            <tr>
                <td> - Tambahan</td>
                <td>: </td>
                <td style="text-align:center; font-weight: border-collapse; border-left: 0px solid black;border-bottom: 0px solid black"> <input type="text" value=""></td>
            </tr>
            <tr>
                <td><b>Pemeriksaan Penunjang</b></td>
                <td></td>
                <td style="text-align:center; font-weight: border-collapse; border-bottom: 0px solid black"></td>
            </tr>
            <tr>
                <td>RADIOLOGI</td>
                <td>: <?php echo $row['TINDAKAN_RAD']; ?></td>
                <td style="text-align:center; font-weight: border-collapse; border-left: 0px solid black;border-bottom: 0px solid black"> <input type="text" value=""></td>
            </tr>
            <tr>
                <td>LABORATORIUM</td>
                <td>: <?php echo $row['TINDAKAN_LAB']; ?></td>
                <td style="text-align:center; font-weight: border-collapse; border-left: 0px solid black;border-bottom: 0px solid black"> <input type="text" value=""></td>
            </tr>
            <tr>
                <td>FARMASI</td>
                <td>: Terlampir dalam rincian tagihan</td>
                <td style="text-align:center; font-weight: border-collapse; border-left: 0px solid black;border-bottom: 0px solid black"></td>
            </tr>
        </table>
        <br>
        <br>
        <table class="table-no-border">
            <tr>
                <td width="50%">
                </td>
                <td width="50%" align="center">Indramayu, <?php echo $row['TGLREG']; ?><br>Dokter Yang Memeriksa<br>
                    <br>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo strtoupper($firstRow['DPJP']); ?>" alt="QR Code" width="70" height="70"><br>
                    <u><?php echo $firstRow['DPJP']; ?></u><br>
                    NIP. <?php echo $row['NIPDPJP']; ?>

                </td>
            </tr>
        <?php endforeach; ?>
        </table>



</body>

</html>