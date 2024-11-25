<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            width: 100%;

            border-collapse: collapse;
            border: 1px solid black;
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
    </style>
</head>

<body>


    <!-- SEP -->

    <?php foreach ($spri as $row) : ?>
        <table style="padding: 0; font-size:12px; font-weight: bold;font-family: Arial, sans-serif;" class="table-no-border">
            <tr>
                <td width="8%"><img src="/assets/img/rs.jpg" width="35px"></td>
                <td width="50%">RSUD INDRAMAYU<BR><?php echo $row['HEADERBPJS']; ?></td>
                <td width="42%">No.Surat RS : <?php echo $row['NOSURAT']; ?><br><?php echo $row['NOSBPJS']; ?></td>
            </tr>
        </table>

        <table style="padding: 1; font-size:9px; font-family: Arial, sans-serif;" class="table-no-border" ;>

            <tbody>
                <tr>
                    <td width="100%" colspan="2">Surat Keterangan Rencana Inap ini digunakan 1 (Satu) kali kunjungan pada tanggal :<br><?php echo $row['TGLSO']; ?> untuk pasien dengan : </td>
                    <!-- <td width="70%"></td> -->

                </tr>
                <tr>
                    <td width="20%">No. Kartu - RM</td>
                    <td width="80%">: <?php echo $row['NOMORKARTU']; ?></td>

                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: <?php echo $row['NAMA_LENGKAP']; ?></td>

                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: <?php echo $row['TANGGAL_LAHIR']; ?></td>

                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?php echo $row['ALPASIEN']; ?></td>

                </tr>
                <tr>
                    <td>No.Telepon</td>
                    <td>: <?php echo $row['NAMA_LENGKAP']; ?></td>

                </tr>
                <tr>
                    <td>Tujuan</td>
                    <td>: Ruang Rawat Inap <?php echo $row['SMF']; ?></td>

                </tr>
                <tr>
                    <td>Diagnosa</td>
                    <td>: <?php echo $row['DIAGNOSIS']; ?></td>

                </tr>
                <tr>
                    <td>Berlaku Rujuan</td>
                    <td>: <?php echo $row['MASABERLAKU']; ?></td>

                </tr>

                <tr>
                    <td>Rencana Pelayanan / Indikasi Rawat Inap </td>
                    <td>: <?php echo $row['KETSO']; ?></td>

                </tr>
                <tr>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td align="center" colspan="2"><?php echo $row['KOTA'], ', ', $row['TGLSO']; ?>
                        <br><br><br><br><?php echo $row['DRSEP']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


</body>

</html>