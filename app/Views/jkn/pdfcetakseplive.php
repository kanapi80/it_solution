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

    <h1>Data SEP</h1>
    <p>Nomor SEP: <?= esc($seplive->noSep ?? 'Tidak tersedia') ?></p>
    <p>Nomor SEP: <?= esc($data->tglSep ?? 'Tidak tersedia') ?></p>
    <p>Nomor SEP: <?= esc($data->kontrol->noSurat ?? 'Tidak tersedia') ?></p>


    <!-- SEP -->


    <table style="padding: 0; font-size:12px; font-weight: bold;" class="table-no-border">
        <tr>
            <td><img src="/assets/img/sepbpjs.png" width="200px"></td>
            <td>SURAT ELEGIBILITAS PESERTA<BR>RSUD INDRAMAYU</td>
            <td></td>
        </tr>
    </table>

    <table style="padding: 0; font-size:9px;" class="table-no-border" ;>

        <tbody>
            <tr>
                <td width="15%">No.SEP</td>
                <td width="38%">: </td>
                <td width="15%">Peserta</td>
                <td width="32%">: </td>
            </tr>
            <tr>
                <td>Tgl.SEP</td>
                <td>: </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>No. Kartu</td>
                <td>: </td>
                <td>Jns Rawat</td>
                <td>: </td>
            </tr>
            <tr>
                <td>Nama Peserta</td>
                <td>: </td>
                <td>Jns Kunjungan</td>
                <td>: </td>
            </tr>
            <tr>
                <td>Tgl.Lahir</td>
                <td>: </td>
                <td>Prosedur</td>
                <td>: </td>
            </tr>
            <tr>
                <td>No.Telepon</td>
                <td>: </td>
                <td>Assesment Plyn</td>
                <td>: </td>
            </tr>
            <tr>
                <td>Sub/ Spesialis</td>
                <td>: </td>
                <td>Poli Perujuk</td>
                <td>: </td>
            </tr>
            <tr>
                <td>Dokter</td>
                <td>: </td>
                <td>Kelas Hak</td>
                <td>: </td>
            </tr>
            <tr>
                <td>Faskes Perujuk</td>
                <td>: </td>
                <td>Kelas Rawat</td>
                <td>: </td>
            </tr>
            <tr>
                <td>Diagnosa Awal</td>
                <td>: </td>
                <td>Penjamin</td>
                <td>: </td>
            </tr>
            <tr>
                <td>Catatan</td>
                <td>: </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2" style="font-size: smaller;">* Saya Menyetujui BPJS Kesehatan menggunakan Informasi Media pasien jika diperlukan<br>
                    * SEP bukan sebagai bukti penjamin peserta<br>
                    ** Dengan diterbitkannya SEP ini, Peserta rawat inap telah mendapatkan informasi dan menempati<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kelas rawat sesuai hak kelasnya (terkecuali kelas penuh atau naik kelas sesuai aturan yang berlaku)
                    <br> <br>
                </td>
                <td align="center" colspan="2">Pasien/ Keluarga Pasien
                    <br><br><br><br>_______________
                </td>
            </tr>

        </tbody>
    </table>


</body>


</html>