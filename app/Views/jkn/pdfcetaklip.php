<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      border: 0px solid black;
      padding-left: 8px;
      padding: 3px;

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


  <?php foreach ($lip as $row) : ?>
    <table class="table-no-border">
      <tr>
        <td width="10%">
          <img src="/assets/img/kemenkes.png" width="330px" height="330px">
        </td>
        <td width="65%" style="font-size: 14px; font-weight: bold text-align:center">
          KEMENTRIAN KESEHATAN REPUBLIK <BR>
          <i style="color:#666666">Berkas Klaim Indiviual Pasien </i>
        </td>
        <td width="25%" style="text-align:center;font-size:14px;font-weight:bold;display: block; letter-spacing:1px" valign="bottom"><br><br><?= esc($row['TGLKELUAR']) ?></td>
      </tr>
    </table>
    <hr>
    <table width="100%" class="table-no-border">
      <tr>
        <td width="17%">Kode RS</td>
        <td width="33%">: 3212016 </td>
        <td width="15%">Kelas RS </td>
        <td width="35%">: B </td>
      </tr>
      <tr>
        <td>Nama RS </td>
        <td>: RSUD INDRAMAYU </td>
        <td>Jenis Tarif </td>
        <td>: TARIF RS KELAS B PEMERINTAH </td>
      </tr>
    </table>
    <hr>
    <table width="100%" class="table-no-border">
      <tr>
        <td width="17%">Nomor Peserta </td>
        <td width="33%">: <?= esc($row['NOKARTU']) ?></td>
        <td width="15%">Nomor SEP </td>
        <td width="35%">: <?= esc($row['NOMORSEP']) ?></td>
      </tr>
      <tr>
        <td>No.Rekam Medis </td>
        <td>: <?= esc($row['NORM']) ?></td>
        <td>Tgl Masuk </td>
        <td>:
          <?php $datetime = $row['TGLREG']; // Contoh datetime
          $formattedDate = date("d/m/Y", strtotime($datetime));

          echo $formattedDate; ?> </td>
      </tr>
      <tr>
        <td>Umur (tahun) </td>
        <td>: <?= esc($row['UMURTAHUN']) ?></td>
        <td>Tgl Keluar </td>
        <td>: <?= esc($row['TGLKELUAR']) ?></td>
      </tr>
      <tr>
        <td>Umur (hari) </td>
        <td>: <?= esc($row['UMURHARI']) ?></td>
        <td>Jenis Perawatan </td>
        <td>: <?= esc($row['JENISPASIEN']) ?></td>
      </tr>
      <tr>
        <td>Tgl.Lahir</td>
        <td>: <?php $datetime = $row['TANGGAL_LAHIR']; // Contoh datetime
              $formattedDate = date("d/m/Y", strtotime($datetime));

              echo $formattedDate; ?></td>
        <td>Cara Pulang </td>
        <td>: <?= esc($row['CARAPULANG']) ?></td>
      </tr>

      <tr>
        <td>Jenis Kelamin</td>
        <td>: <?= esc($row['JENISKELAMIN']) ?></td>
        <td>LOS</td>
        <td>: <?= esc($row['LOS']) ?></td>
      </tr>
      <tr>
        <td>Kelas Hak</td>
        <td>: <?= esc($row['KELASHAK']) ?></td>
        <td>Berat Lahir </td>
        <td>: <?= esc($row['BERATLAHIR']) ?></td>
      </tr>
    </table>
    <hr>
    <table width="100%" class="table-no-border">
      <tr>
        <td width="17%">Diagnosa Utama</td>
        <td width="13%">: <?= esc($row['KODEDIAGNOSAUTAMA']) ?> &nbsp;&nbsp;</td>
        <td width="70%"><?= esc($row['DIAGNOSAUTAMA']) ?></td>
      </tr>
      <tr>
        <td>Diagnosa Sekunder</td>
        <td>: <?= esc($row['KODEDIAGNOSASEKUNDER']) ?> &nbsp;&nbsp;</td>
        <td><?= esc($row['DIAGNOSASEKUNDER']) ?></td>
      </tr>
      <tr>
        <td style="height: 130px;">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <table width="100%" class="table-no-border">
      <tr>
        <td width="17%">Prosedur</td>
        <td width="13%">: <?= esc($row['KODETINDAKAN']) ?></td>
        <td width="70%"><?= esc($row['TINDAKAN']) ?></td>
      </tr>
      <tr>
        <td style="height: 130px;">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
    </table>
    <table width="100%" class="table-no-border">
      <tr>
        <td width="17%">ADL Sub Acute </td>
        <td width="33%">: <?= esc($row['ADLAKUT']) ?></td>
        <td width="15%">ADL Chronic </td>
        <td width="35%">:
          <?= esc($row['ADLKRONIK']) ?></td>
      </tr>
      <tr>
        <td><b>Hasil Grouping</b> </td>
        <td colspan="3"></td>
      </tr>
    </table>
    <hr>
    <table width="100%" class="table-no-border">
      <tr>
        <td width="17%">INA - CBG </td>
        <td width="13%">: <?= esc($row['INACBG']) ?></td>
        <td width="50%"><?= esc($row['DESKRIPSIINACBG']) ?></td>
        <td width="5%" align="right">Rp</td>
        <td width="15%" align="right"><?= esc(number_format($row['TARIFINACBG'], 2, ',', '.')); ?></td>
      </tr>
      <tr>
        <td>Sub Acute </td>
        <td colspan="2">: <?= esc($row['ADLAKUT']) ?></td>
        <td align="right">Rp</td>
        <td align="right"><?= esc(number_format($row['TARIFUNUSA'], 2, ',', '.')); ?></td>
      </tr>
      <tr>
        <td>Chronic</td>
        <td colspan="2">:
          <?= esc($row['UNUSA']) ?></td>
        <td align="right">Rp</td>
        <td align="right"><?= esc(number_format($row['TARIFUNUSC'], 2, ',', '.')); ?></td>
      </tr>
      <tr>
        <td>Special CMG</td>
        <td colspan="2"><?= esc($row['KODESPESIAL']) ?></td>
        <td align="right">Rp</td>
        <td align="right"><?= esc($row['TARIFKODE']); ?></td>
      </tr>
    </table>
    <hr>
    <table width="100%" class="table-no-border">
      <tr>
        <td width="17%">Total Tarif </td>
        <td width="13%">&nbsp;</td>
        <td width="50%">&nbsp;</td>
        <td width="5%" align="right">Rp</td>
        <td width="15%" align="right"><?= esc(number_format($row['TOTALTARIFINACBG'], 2, ',', '.')); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <hr>
    <table width="100%" class="table-no-border" style="font-size: 8px;">
      <tr>
        <td width="86%">Generated <?php
                                  $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                  $bulan = [
                                    1 => 'Januari',
                                    'Februari',
                                    'Maret',
                                    'April',
                                    'Mei',
                                    'Juni',
                                    'Juli',
                                    'Agustus',
                                    'September',
                                    'Oktober',
                                    'November',
                                    'Desember'
                                  ];
                                  $day = $hari[date('w')];
                                  $date = date('d');
                                  $month = $bulan[date('n')];
                                  $year = date('Y');
                                  $time = date('H:i:s');
                                  echo "$day, $date $month $year $time";
                                  ?> &nbsp; <?= esc($row['VERIFIKATOR']) ?> &nbsp; <?= esc($row['RUANG_RAWAT']) ?> </td>
        <td width="14%" align="right">Lembar 1/1</td>
      </tr>
    </table>




  <?php endforeach; ?>


</body>

</html>