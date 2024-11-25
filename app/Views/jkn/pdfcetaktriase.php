<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
td, th {
    border: 0px solid black; /* Menghilangkan semua border pada td dan th */
    padding: 3px;
    text-align: center;
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
	.kiri {
	border-collapse:collapse;
    border-left: none;
}
.kanan {
	border-collapse:collapse;
    border-right:none;
}
  </style>
</head>

<body>
  <?php foreach ($triase as $row) : ?>
<table width="100%" style="font-size:9px;padding:5px;border-collapse:collapse;border:0px solid black;">
  <tr>
    <td colspan="3" rowspan="3"><b style="font-size: 12px;">TRIASE <br>INSTALASI GAWAT DARURAT</b> </td>
    <td colspan="2" align="left" style="border: none;">No. Rekam Medis </td> <!-- No border -->
    <td colspan="2" align="left" style="border: none;">: <?php echo $row['NORM']; ?></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="border: none;">Nama Lengkap </td> <!-- No border -->
    <td colspan="2" align="left" style="border: none;">: <?php echo $row['NAMA']; ?></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="border-bottom:0px solid black;border:0px none black;">Tanggal lahir / Umur</td>
    <td colspan="2" align="left" style="border-bottom:0px solid black;border:0px none black;">: <?php echo $row['TGLLHR'], ' / ', $row['UMUR']; ?></td>
  </tr>
      <tr>
        <td align="left" style="border: none;">Tanggal</td>
        <td colspan="6" align="left" style="border: none;">: <?php echo $row['TGL']; ?></td>
      </tr>
      <tr>
        <td align="left"style="border-bottom:0px solid black;border:0px none black;">Alamat</td>
        <td colspan="6" align="left" style="border-bottom:0px solid black;border:0px none black;">: <?php echo $row['ALAMAT']; ?></td>
      </tr>
      <tr>
        <td align="left"  style="border: none;">Pekerjaan</td>
        <td colspan="2" align="left"  style="border: none;">: <?php echo $row['PEKERJAAN']; ?></td>
        <td colspan="2" align="left"  style="border: none;">Status Perkawinan </td>
        <td colspan="2" align="left"  style="border: none;">: <?php echo $row['KAWIN']; ?></td>
      </tr>
      <tr>
        <td align="left" style="border: none;" >Pendidikan</td>
        <td colspan="2" align="left" style="border: none;">: <?php echo $row['PENDIDIKAN']; ?></td>
        <td colspan="2" align="left" style="border: none;">Nama Suami / Isteri </td>
        <td colspan="2" align="left" style="border: none;">: <?php echo $row['PASANGAN']; ?></td>
      </tr>
      <tr>
        <td align="left" style="border: none;">Agama</td>
        <td colspan="2" align="left" style="border: none;">: <?php echo $row['AGAMA']; ?></td>
        <td colspan="2" align="left" style="border: none;">&nbsp;</td>
        <td colspan="2" align="left" style="border: none;">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7" align="center"><b>Identitas Penanggung Jawab</b></td>
      </tr>
      <tr>
        <td style="border-bottom:0px solid black;border:0px none black;" align="left">Nama</td>
        <td colspan="2" align="left" style="border-bottom:0px solid black;border:0px none black;">: <?php echo $row['PAS']; ?></td>
        <td align="left" style="border-bottom:0px solid black;border:0px none black;">Umur</td>
        <td align="left" style="border-bottom:0px solid black;border:0px none black;">: <?php echo $row['USIA']; ?></td>
        <td align="left" style="border-bottom:0px solid black;border:0px none black;">&nbsp;</td>
        <td align="left" style="border-bottom:0px solid black;border:0px none black;">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="border: none;">Alamat</td>
        <td colspan="6" align="left" style="border: none;">: <?php echo $row['ALAMAT']; ?></td>
      </tr>
      <tr>
        <td colspan="7" align="center"><b>KRITERIA TRIASE</b></td>
      </tr>
      <tr>
        <td rowspan="5" align="center"><b>CARA <br>KEDATANGAN</b></td>
        <td colspan="2" align="left" style="border-bottom:0px solid black;border:0px none black;">Tgl.Kedatangan</td>
        <td colspan="4" align="left" style="border-bottom:0px solid black;border:0px none black;">:
          <?php
                                      $string = $row['TGL_DATANG'];
                                      $string = str_replace('"', '', $string);
                                      echo $string;
                                      ?></td>
      </tr>
      <tr>
        <td colspan="2" align="left" style="border-bottom:0px solid black;border:0px none black;">Alat Transportasi</td>
        <td colspan="4" align="left" style="border-bottom:0px solid black;border:0px none black;">:
          <?php
                                      $string = $row['ALAT_TRANSPORTASI'];
                                      $string = str_replace('"', '', $string);
                                      echo $string;
                                      ?></td>
      </tr>
      <tr>
        <td colspan="2" align="left" style="border-bottom:0px solid black;border:0px none black;">Datang Sendiri, diantar</td>
        <td colspan="4" style="border-bottom:0px solid black;border:0px none black;" align="left">:
        <?php
                                      $string = $row['PENGANTAR'];
                                      $string = str_replace('"', '', $string);
                                      echo $string;
                                      ?></td>
      </tr>
      <tr>
        <td colspan="2" align="left" style="border-bottom:0px solid black;border:0px none black;">Rujukan Dari</td>
        <td colspan="4" style="border-bottom:0px solid black;border:0px none black;" align="left">:
        <?php
                                      $string = $row['ASAL_RUJUKAN'];
                                      $string = str_replace('"', '', $string);
                                      echo $string;
                                      ?></td>
      </tr>
      <tr>
        <td colspan="2" align="left" style="border-bottom:0px solid black;border:0px none black;">Dikirim Oleh Polisi dari</td>
        <td colspan="4" style="border-bottom:0px solid black;border:0px none black;" align="left">:
        <?php
                                      $string = $row['KEPOLISIAN'];
                                      $string = str_replace('"', '', $string);
                                      echo $string;
                                      ?></td>
      </tr>
      <tr>
        <td rowspan="3" align="center"><b>JENIS <br> KASUS</b></td>
        <td rowspan="3" align="left" style="border-bottom:0px solid black;border:0px none black;">Trauma</td>
        <td colspan="2" align="left" style="border: none;"><input type="checkbox" name="checkbox2" value="checkbox" <?php echo ($row['LAKA_LANTAS'] == 1) ? 'checked' : ''; ?>> Kecelakaan Lalulintas</td>
        <td rowspan="3" align="left" style="border-bottom:0px solid black;border:0px none black;">Non Trauma</td>
        <td colspan="2" align="left" style="border: none;"><input type="checkbox" name="checkbox" value="checkbox">
          Riwayat Ke Daerah</td>
      </tr>
      <tr>
        <td colspan="2" align="left" style="border: none;"><input type="checkbox" name="checkbox3" value="checkbox"> Kecelakaan Kerja</td>
        <td colspan="2" align="left" style="border: none;">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="left" style="border: none;"><input type="checkbox" name="checkbox4" value="checkbox"> Kasus Perempuan &amp; Anak</td>
        <td colspan="2" style="border: none;"></td>
      </tr>
      <tr>
        <td rowspan="2" align="center"><b>ANAMNESE</b></td>
        <td colspan="3" align="left">Keluhan Utama</td>
        <td colspan="3" align="left">Terpimpin</td>
      </tr>
      <tr>
        <td colspan="3" align="left"><?php
                                      $string = $row['KELUHAN_UTAMA'];
                                      $string = str_replace('"', '', $string);
                                      echo $string;
                                      ?></td>
        <td colspan="3" align="left"><?php
                                      $string = $row['KELUHAN_UTAMA'];
                                      $string = str_replace('"', '', $string);
                                      echo $string;
                                      ?></td>
      </tr>
      <tr>
        <td rowspan="3" align="center"><b>TANDA VITAL</b></td>
        <td colspan="2" align="left">Tekanan Darah (Sistolik /Distolik)</td>
        <td><?php
            $string = $row['SISTOLE'];
            $string = str_replace('"', '', $string);
            echo $string;
            ?>
          /
          <?php
          $string = $row['DIASTOLE'];
          $string = str_replace('"', '', $string);
          echo $string;
          ?></td>
        <td colspan="2" align="left">Suhu (OC)</td>
        <td><?php
            $string = $row['SUHU'];
            $string = str_replace('"', '', $string);
            echo $string;
            ?></td>
      </tr>
      <tr>
        <td height="18" colspan="2" align="left">Frekuensi Nafas(RR)(X/Menit)</td>
        <td><?php
            $string = $row['FREK_NAFAS'];
            $string = str_replace('"', '', $string);
            echo $string;
            ?></td>
        <td colspan="2" align="left">Skala Nyeri</td>
        <td><?php
            $string = $row['SKALA_NYERI'];
            $string = str_replace('"', '', $string);
            echo $string;
            ?></td>
      </tr>
      <tr>
        <td colspan="2" align="left">Frekuensi Nadi(HR)(X/Menit)</td>
        <td><?php
            $string = $row['FREK_NADI'];
            $string = str_replace('"', '', $string);
            echo $string;
            ?></td>
        <td colspan="2" align="left">Metode Ukur</td>
        <td><?php
            $string = $row['METODE_UKUR'];
            $string = str_replace('"', '', $string);
            echo $string;
            ?></td>
      </tr>
      <tr>
        <td rowspan="2" align="center"><b>KHUSUS OBGYN</b></td>
        <td colspan="2" align="left">Usia Genetasi (Minggu)</td>
        <td align="left"><?php
                          $string = $row['USIA_GESTASI'];
                          $string = str_replace('"', '', $string);
                          echo $string;
                          ?></td>
        <td colspan="2" align="left">Kontrasi Uterus</td>
        <td><?php
            $string = $row['KONTRAKSI_UTERUS'];
            $string = str_replace('"', '', $string);
            echo $string;
            ?></td>
      </tr>
      <tr>
        <td colspan="2" align="left">Detak Jantung Janin(X/Menit)</td>
        <td align="left"><?php
                          $string = $row['DETAK_JANTUNG'];
                          $string = str_replace('"', '', $string);
                          echo $string;
                          ?></td>
        <td colspan="2" align="left">Dilatasi Serviks</td>
        <td><?php
            $string = $row['DILATASI_SERVIKS'];
            $string = str_replace('"', '', $string);
            echo $string;
            ?></td>
      </tr>
      <tr>
        <td rowspan="2" align="center"><b>KEBUTUHAN KHUSUS</b></td>
        <td colspan="3" align="left">Airbone</td>
        <td colspan="3" align="left">Dekontaminan</td>
      </tr>
      <tr>
        <td colspan="3" align="center"><?php
                                        $string = $row['AIRBONE'];
                                        $string = str_replace('"', '', $string);
                                        echo $string;
                                        ?></td>
        <td colspan="3" align="center"><?php
                                        $string = $row['DEKONTAMINAN'];
                                        $string = str_replace('"', '', $string);
                                        echo $string;
                                        ?></td>
      </tr>
      <tr>
        <td rowspan="2" align="center"><b>PEMERIKSAAN</b></td>
        <td bgcolor="#00CCFF" align="center">Resusitasi<br>(P1)</td>
        <td bgcolor="#CC3300" align="center">Emergency <br>(P2)</td>
        <td bgcolor="#FFFF00" align="center">Urgent<br> (P3)</td>
        <td bgcolor="#99CC33" align="center">Less<br> Urgent (P4)</td>
        <td bgcolor="#FFFFCC" align="center">Non<br>Urgent (P5)</td>
        <td bgcolor="#999999" align="center">DOA (P6)</td>
      </tr>
      <tr>
        <td><?php if ($row['RESUSITASI'] == 1) {
              echo "YA";
            } else {
              echo "-";
            } ?></td>
        <td><?php if ($row['EMERGENCY'] == 1) {
              echo "YA";
            } else {
              echo "-";
            } ?></td>
        <td><?php if ($row['URGENT'] == 1) {
              echo "YA";
            } else {
              echo "-";
            } ?></td>
        <td><?php if ($row['LESS_URGENT'] == 1) {
              echo "YA";
            } else {
              echo "-";
            } ?></td>
        <td><?php if ($row['NON_URGENT'] == 1) {
              echo "YA";
            } else {
              echo "-";
            } ?></td>
        <td><?php if ($row['DOA'] == 1) {
              echo "YA";
            } else {
              echo "-";
            } ?></td>
      </tr>
      <tr>
        <td align="center">KRITERIA TRIASE</td>
        <td></td>
        <td></td>
        <td align="center">HANDOVER JAGA</td>
        <td align="center">&nbsp;</td>
        <td colspan="2" align="center"><b><?php echo $row['ZONA']; ?></b></td>
      </tr>
      <tr>
        <td colspan="4" style="border: none;"></td>
        <td colspan="3" align="center" style="border: none;">
          Dokter / Perawat Triase<br>

          <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo urlencode($row['NAMA_LENGKAP']); ?>" alt="QR Code" width="40" height="40">
          <br>
          <b><?php echo $row['NAMA_LENGKAP']; ?></b>        </td>
      </tr>
    </table>
  <?php endforeach; ?>
</body>

</html>