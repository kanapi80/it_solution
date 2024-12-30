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
    <table style="padding: 0; font-size:12px; font-weight: bold;" class="table-no-border">
        <tr>
            <td><img src="/assets/img/sepbpjs.png" width="200px"></td>
            <td>SURAT ELEGIBILITAS PESERTA<BR>RSUD INDRAMAYU</td>
            <td><?= esc($seplive->peserta->jnsPeserta ?? 'Tidak tersedia') ?></td>
        </tr>
    </table>

    <table style="padding: 0; font-size:9px;" class="table-no-border" ;>

        <tbody>
            <tr>
                <td width="15%">No.SEP</td>
                <td width="38%">: <?= esc($seplive->noSep ?? 'Tidak tersedia') ?> </td>
                <td width="15%">Peserta</td>
                <td width="32%">: <?= esc($seplive->peserta->jnsPeserta ?? 'Tidak tersedia') ?></td>
            </tr>
            <tr>
                <td>Tgl.SEP</td>
                <td>: <?= esc($seplive->tglSep ?? 'Tidak tersedia') ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>No. Kartu</td>
                <td>: <?= esc($seplive->peserta->noKartu ?? 'Tidak tersedia') ?> ( MR : <?= esc(($seplive->peserta->noMr ?? 'Tidak tersedia')) ?> ) </td>
                <td>Jns Rawat</td>
                <td>: <?= esc($seplive->jnsPelayanan ?? 'Tidak tersedia') ?></td>
            </tr>
            <tr>
                <td>Nama Peserta</td>
                <td>: <?= esc($seplive->peserta->nama ?? 'Tidak tersedia') ?></td>
                <td>Jns Kunjungan</td>
                <td>: </td>
            </tr>
            <tr>
                <td>Tgl.Lahir</td>
                <td>: <?= esc($seplive->peserta->tglLahir ?? 'Tidak tersedia') ?> Kelamin : <?= esc(($seplive->peserta->kelamin ?? 'Tidak tersedia') === 'P' ? 'Perempuan' : 'Laki-laki') ?>
                </td>
                <td>Prosedur</td>
                <td>: <?= esc($seplive->flagProcedure->nama ?? 'Tidak tersedia') ?> </td>
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
                <td>: <?= esc($seplive->kontrol->nmDokter ?? 'Tidak tersedia') ?></td>
                <td>Kelas Hak</td>
                <td>: <?= esc($seplive->kelasRawat ?? 'Tidak tersedia') ?></td>
            </tr>
            <tr>
                <td>Faskes Perujuk</td>
                <td>: </td>
                <td>Kelas Rawat</td>
                <td>: <?= esc($seplive->klsRawat->klsRawatHak ?? 'Tidak tersedia') ?></td>
            </tr>
            <tr>
                <td>Diagnosa Awal</td>
                <td>: <?= esc($seplive->diagnosa ?? 'Tidak tersedia') ?></td>
                <td>Penjamin</td>
                <td>: </td>
            </tr>
            <tr>
                <td>Catatan</td>
                <td>: <?= esc($seplive->catatan ?? 'Tidak tersedia') ?></td>
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

                    <br>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=<?= esc($seplive->peserta->nama ?? 'Tidak tersedia') ?>" alt="QR Code" width="40" height="40">
                </td>
            </tr>

        </tbody>
    </table>


</body>


</html>