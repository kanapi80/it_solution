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

    <table style="padding: 0px;border:none;margin-bottom:2px;" width="100%">
        <tr>
            <!-- <td width="20%">&nbsp;</td> -->
            <td width="100%" align="center"><b style="font-size:12px">PEMERINTAH KABUPATEN INDRAMAYU<br>DINAS KESEHATAN<br>
                    UPTD RUMAH SAKIT UMUM DAERAH KABUPATEN INDRAMAYU </b> <br>
                <span style="font-size:10px;font-weight: normal">JL Murah Nara No 7 Indramayu Website : rsud.indramayukab.go.id <br>
                    Telp. 0234272655 Email : rsudkabindramayu@yahoo.do.id Fax. 0234272655</span>
                <hr>
            </td>
        </tr>


        <tr>
            <td colspan="2" align="center" style="font-size:10px"><b>LEMBAR FORMULIR RAWAT JALAN <br>
                    Layanan Kedokteran Fisik dan Rehabilitasi</b> </td>
        </tr>
    </table>
    <br>
    <br>
    <?php
    $firstRow = $billing[0];
    ?>
    <table style="padding: 2px;border:none;margin-bottom:2px;font-size:10px" width="100%">
        <tr>
            <td width="15%" style="border-top: border:0px solid black ;border-left: border:0px solid black;">No. RM </td>
            <td width="30%" style="border-top: border:0px solid black ;">: <?= $firstRow['NORM'] ?></td>
            <td width="25%" style="border-top: border:0px solid black ;">Hubungan dg tertanggung </td>
            <td width="30%" style="border-top: border:0px solid black; border-right: border:0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Nama Pasien </td>
            <td>: <?php echo $firstRow['NAMALENGKAP']; ?></td>
            <td>Tanggal Pemeriksaan </td>
            <td style="border-right: border:0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Tanggal Lahir </td>
            <td>: <?php echo date('Y-m-d', strtotime($firstRow['TANGGAL_LAHIR'])); ?>
            </td>
            <td>Diagnosa Fungsional </td>
            <td style="border-right: border:0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Alamat</td>
            <td>:</td>
            <td>Diagnosa Medis </td>
            <td style="border-right: border:0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;border-bottom: border:0px solid black;">Telp/ HP </td>
            <td style="border-bottom: border:0px solid black;">:</td>
            <td style="border-bottom: border:0px solid black;">&nbsp;</td>
            <td style="border-bottom: border:0px solid black;border-right: border:0px solid black;">&nbsp;</td>
        </tr>
    </table><br>
    <br>
    <table style="padding: 2px;border:none;margin-bottom:2px;font-size:10px" width="100%">
        <tr>
            <td width="34%" style="border-left: border:0px solid black;border-top: border:0px solid black;">Anamnesa</td>
            <td width="66%" style="border-right: border:0px solid black;border-top: border:0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Pemeriksaan Fisik dan Uji Fungsi </td>
            <td style="border-right: border:0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Diagnosa Medis (ICD-10)</td>
            <td style="border-right: border:0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Diagnosa Fungsi (ICD-10) </td>
            <td style="border-right: border:0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Pemeriksaan Penunjang </td>
            <td style="border-right: border:0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Tata Laksana KFR (ICD 9CM) </td>
            <td style="border-right: border:0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Anjuran</td>
            <td style="border-right: border:0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Evaluasi</td>
            <td style="border-right: border:0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;border-bottom: border:0px solid black;">Suspek Penyakit Akibat Kerja </td>
            <td style="border-right: border:0px solid black;border-bottom: border:0px solid black;">:</td>
        </tr>
    </table>
    <br><br>
    <table style="padding: 2px;border:none;margin-bottom:2px;Font-size:10px" width="100%">
        <tr>
            <td width="100%" colspan="2" style="border-left: border:0px solid black ;border-top: border:0px solid black ;border-right:border:0px solid black; ">Lembar Hasil Tindakan Uji Fungsi / Prosedur KFR </td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Instrumen Uji Fungsi / Prosedur KFR </td>
            <td colspan="2" style="border-right: 0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">&nbsp;</td>
            <td colspan="2" style="border-right: 0px solid black;">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Kesimpulan</td>
            <td colspan="2" style="border-right: 0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">&nbsp;</td>
            <td colspan="2" style="border-right: 0px solid black;">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;">Rekomendasi</td>
            <td colspan="2" style="border-right: 0px solid black;">:</td>
        </tr>
        <tr>
            <td style="border-left: border:0px solid black;border-bottom: border:0px solid black;">&nbsp;</td>
            <td colspan="2" style="border-bottom: border:0px solid black;border-right: 0px solid black;">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td width="35%"> </td>
            <td width="31%">Indramayu, <br>
                Dokter<br></td>
        </tr>
    </table>
</body>

</html>