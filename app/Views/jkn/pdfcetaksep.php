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

    <?php foreach ($sep as $row) : ?>
        <table style="padding: 0; font-size:12px; font-weight: bold;" class="table-no-border">
            <tr>
                <td><img src="/assets/img/sepbpjs.png" width="200px"></td>
                <td>SURAT ELEGIBILITAS PESERTA<BR>RSUD INDRAMAYU</td>
                <td><?php echo $row['PRB']; ?></td>
            </tr>
        </table>

        <table style="padding: 0; font-size:9px;" class="table-no-border" ;>

            <tbody>
                <tr>
                    <td width="15%">No.SEP</td>
                    <td width="38%">: <?php echo $row['NOMORSEP']; ?></td>
                    <td width="15%">Peserta</td>
                    <td width="32%">: <?php echo $row['PESERTA']; ?></td>
                </tr>
                <tr>
                    <td>Tgl.SEP</td>
                    <td>: <?php echo $row['TGLSEP']; ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>No. Kartu</td>
                    <td>: <?php echo $row['NOMORKARTU']; ?></td>
                    <td>Jns Rawat</td>
                    <td>: <?php echo $row['JENISRAWAT']; ?></td>
                </tr>
                <tr>
                    <td>Nama Peserta</td>
                    <td>: <?php echo $row['NAMALENGKAP']; ?></td>
                    <td>Jns Kunjungan</td>
                    <td>: <?php echo $row['TJKUNJ']; ?></td>
                </tr>
                <tr>
                    <td>Tgl.Lahir</td>
                    <td>: <?php echo $row['TGL_LAHIR']; ?></td>
                    <td>Prosedur</td>
                    <td>: <?php echo $row['PROC']; ?></td>
                </tr>
                <tr>
                    <td>No.Telepon</td>
                    <td>: <?php echo $row['NOTELP']; ?></td>
                    <td>Assesment Plyn</td>
                    <td>: <?php echo $row['ASPEL']; ?></td>
                </tr>
                <tr>
                    <td>Sub/ Spesialis</td>
                    <td>: <?php echo $row['poliTujuan']; ?></td>
                    <td>Poli Perujuk</td>
                    <td>: <?php echo $row['POLIPERUJUK']; ?></td>
                </tr>
                <tr>
                    <td>Dokter</td>
                    <td>: <?php echo $row['DOKTER']; ?></td>
                    <td>Kelas Hak</td>
                    <td>: <?php echo $row['klsRawat']; ?></td>
                </tr>
                <tr>
                    <td>Faskes Perujuk</td>
                    <td>: <?php echo $row['RUJUKAN']; ?></td>
                    <td>Kelas Rawat</td>
                    <td>: <?php echo $row['KELAS']; ?></td>
                </tr>
                <tr>
                    <td>Diagnosa Awal</td>
                    <td>: <?php echo $row['DIAGNOSA']; ?></td>
                    <td>Penjamin</td>
                    <td>: <?php echo $row['PENJAMIN']; ?></td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>: <?php echo $row['CATATAN']; ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: smaller;">* Saya Menyetujui BPJS Kesehatan menggunakan Informasi Media pasien jika diperlukan<br>
                        * SEP bukan sebagai bukti penjamin peserta<br>
                        ** Dengan diterbitkannya SEP ini, Peserta rawat inap telah mendapatkan informasi dan menempati<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kelas rawat sesuai hak kelasnya (terkecuali kelas penuh atau naik kelas sesuai aturan yang berlaku)
                        <br> <br><?php echo $row['CETAKAN']; ?>
                    </td>
                    <td align="center" colspan="2">Pasien/ Keluarga Pasien

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


</body>


</html>