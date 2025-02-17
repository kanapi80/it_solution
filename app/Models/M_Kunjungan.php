<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kunjungan extends Model
{
    protected $DBGroup          = 'pendaftaran';
    protected $table            = 'kunjungan';
    protected $primaryKey = 'ID';
    protected $returnType = 'array';
    protected $allowedField     = ['NOMOR', 'NOPEN', 'MASUK', 'KELUAR', 'STATUS'];

    public function getCetakResumeAdd($nokun)
    {
        $query = $this->db->query("CALL pendaftaran.jkn_resume(?)", [$nokun]);
        return $query->getResultArray();
    }
    public function getKunjunganPasien($status = null, $nama = null, $norm = null, $tanggal = null, $ruangan = null, $keylab1 = null, $keylab2 = null, $keyrad = null)
    {
        $query = $this->select(
            "kunjungan.NOMOR as NOKUN, kunjungan.NOPEN, kunjungan.STATUS,
            CASE 
                WHEN kunjungan.STATUS = 1 THEN 'Dilayani'
                WHEN kunjungan.STATUS = 2 THEN 'Selesai'
                WHEN kunjungan.STATUS = 0 THEN 'Batal'
                ELSE 'Tidak Diketahui'
            END AS ST, 
            mr.DESKRIPSI AS NAMARUANGAN, 
            mp.NAMA AS PASIEN, 
            mpeg.NAMA AS DOKTER,  
            mref.DESKRIPSI AS ASURANSI,
            DATE_FORMAT(kunjungan.MASUK, '%d-%m-%Y') AS TGLMASUK, 
            DATE_FORMAT(kunjungan.KELUAR, '%d-%m-%Y') AS TGLKELUAR, 
            pp.NORM as NOPASIEN,
            ppen.NOMOR as NOSEP,
            ptp.TAGIHAN,
            pkn.NOMOR AS KEYLAB1,
        mrn.DESKRIPSI AS TUJUAN_ORDER,
        lodl.REF AS KEYLAB2,
        lor.`TUJUAN` AS TUJU_RADIOLOGI, 
	mrr.`DESKRIPSI` AS ORDERAD, 
	lodr.`REF` AS KEYRAD"
        )
            ->join('master.ruangan mr', 'kunjungan.RUANGAN = mr.ID', 'left')
            ->join('pendaftaran.pendaftaran pp', 'kunjungan.NOPEN = pp.NOMOR', 'left')
            ->join('master.pasien mp', 'pp.NORM = mp.NORM', 'left')
            ->join('master.dokter md', 'kunjungan.DPJP = md.ID', 'left')
            ->join('master.pegawai mpeg', 'md.NIP = mpeg.NIP', 'left')
            ->join('pendaftaran.penjamin ppen', 'kunjungan.NOPEN = ppen.NOPEN', 'left')
            ->join('master.referensi mref', 'ppen.JENIS = mref.ID AND mref.JENIS = 10', 'left')
            ->join('pembayaran.tagihan_pendaftaran ptp', 'ptp.PENDAFTARAN = kunjungan.NOPEN', 'left')
            ->join('pembayaran.penjamin_tagihan ppt', 'ppt.TAGIHAN = ptp.TAGIHAN', 'left')
            ->join('layanan.order_lab lol', 'lol.KUNJUNGAN = kunjungan.NOMOR', 'left')
            ->join('master.ruangan mrn', 'mrn.ID = lol.TUJUAN', 'left')
            ->join('layanan.order_detil_lab lodl', 'lodl.ORDER_ID = lol.NOMOR', 'left')
            ->join('pendaftaran.kunjungan pkn', 'lol.`NOMOR`=pkn.REF', 'left')
            //Radiologi
            ->join('layanan.order_rad lor', 'lor.KUNJUNGAN=kunjungan.NOMOR', 'left')
            ->join('master.ruangan mrr', 'mrr.ID=lor.TUJUAN`', 'left')
            ->join('layanan.`order_detil_rad` lodr', 'lodr.`ORDER_ID`=lor.`NOMOR`', 'left')
            ->join('pendaftaran.kunjungan pkr', 'pkr.REF = lor.NOMOR', 'left')
            // LEFT JOIN layanan.`order_rad` lor ON lor.`KUNJUNGAN`=pk.`NOMOR`
            // LEFT JOIN master.ruangan mrr ON mrr.ID=lor.`TUJUAN`
            // LEFT JOIN layanan.`order_detil_rad` lodr  ON lodr.`ORDER_ID`=lor.`NOMOR`
            // LEFT JOIN pendaftaran.`kunjungan` pkr ON pkr.REF = lor.NOMOR
            ->whereIn('mr.JENIS_KUNJUNGAN', [1, 2, 3, 4, 5, 6])
            ->groupBy('kunjungan.NOPEN');

        // Jika status ada, tambahkan filter
        if (!is_null($status) && $status !== '') {
            $query->where('kunjungan.STATUS', $status);
        }
        // Jika nama pasien tidak kosong, tambahkan filter pencarian (LIKE)
        if (!is_null($nama) && $nama !== '') {
            $query->like('mp.NAMA', $nama);
        }
        if (!is_null($norm) && $norm !== '') {
            $query->like('pp.NORM', $norm);
        }
        if (!is_null($tanggal) && $tanggal !== '') {
            $query->like('kunjungan.MASUK', $tanggal);
        }
        if (!is_null($ruangan) && $ruangan !== '') {
            $query->like('mr.DESKRIPSI', $ruangan);
        }

        return $query;
    }
}
