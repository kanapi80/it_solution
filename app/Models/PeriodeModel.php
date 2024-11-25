<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $DBGroup = 'sipayu';
    protected $table = 'js_settingklaim'; // Nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['periode', 'NamaAsuransi', 'Tahun', 'KdCrb'];

    public function getperiode()
    {
        return $this->select('js_settingklaim.periode, payment.paymentname')
            ->join('payment', 'js_settingklaim.KdCrb = payment.kode')
            ->where('payment.status', 2)
            ->groupBy('periode')
            ->orderBy('periode', 'desc')
            ->findAll();
    }
    public function getperiodeselect($asuransi)
    {
        return $this->select('js_settingklaim.periode')
            ->where('NamaAsuransi', $asuransi)
            ->orderBy('periode', 'desc')
            ->findAll();
    }
    public function getPeriodByAsuransi($asuransi)
    {
        $periods = $this->model->getperiodeselect($asuransi);
        $options = [];
        foreach ($periods as $period) {
            $options[] = ['periode' => $period['periode']];
        }
        return $this->response->setJSON($options);
    }
    public function getYearsSelect($asuransi)
    {
        return $this->select('Tahun') // Ambil tahun unik
            ->where('NamaAsuransi', $asuransi)
            ->where('Tahun !=', '(null)')
            ->groupBy('Tahun')
            ->orderBy('Tahun', 'desc')
            ->findAll();
    }
}
