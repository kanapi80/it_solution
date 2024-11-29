<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\API;

/**
 * @var RouteCollection $routes
 */


//API
$routes->resource('products');

$routes->get('/', 'Home::index');

$routes->get('/admin/login-admin', 'Admin::index');
// $routes->post('/admin/cek-login-admin', 'Admin::cek_login_admin');
$routes->post('/admin/cek-login-admin', 'Admin::getLogin');
$routes->get('/admin/dashboard-admin', 'Admin::dashboard');
$routes->get('/layout/template', 'Admin::dashboard');
$routes->get('admin/forms', 'Admin::forms');
$routes->get('admin/widget', 'Admin::widget');
$routes->get('/admin/logout-admin', 'Admin::logout');
// $routes->get('page/pengguna', 'Pengguna::pengguna');
$routes->get('page/pengguna', 'Pengguna::penggunaruangan');
$routes->post('page/getpengguna', 'Pengguna::getPengguna');
$routes->get('page/modul', 'Modul::modul');
// $routes->get('page/pegawai', 'Pegawai::pegawai');
$routes->get('page/pegawai', 'Pegawai::index');
$routes->get('page/getpegawai', 'Pegawai::getPegawai');
//Ruangan
$routes->get('page/ruangan', 'RuanganController::index');
$routes->get('page/getruangan', 'RuanganController::getRuangan');
//Tindakan
$routes->get('page/alltindakan', 'TindakanController::index');
$routes->post('page/gettindakan', 'TindakanController::getTindakan');
//Tindakan
$routes->get('page/pasien', 'PasienController::index');
$routes->post('page/getpasien', 'PasienController::getPasien');


$routes->get('sipayu/registerrajal', 'Registerrajal::registerrajal');
$routes->get('sipayu/registerigd', 'Registerigd::registerigd');
$routes->get('sipayu/registerranap', 'Registerranap::registerranap');
$routes->get('sipayu/cariranap', 'Registerranap::cariranap');
$routes->get('sipayu/cari', 'Registerigd::cari');
$routes->get('sipayu/update', 'Registerigd::update');
$routes->get('sipayu/delete', 'Registerigd::delete');
// $routes->get('sipayu/bersama', 'Registerigd::getKebersamaan');
$routes->post('sipayu/kebersamaan', 'Kebersamaan::getKebersamaan');
$routes->get('sipayu/kebersamaan', 'Kebersamaan::getKebersamaan');
$routes->get('sipayu/exportKebersamaan', 'Kebersamaan::exportKebersamaan');
$routes->post('sipayu/doktergp', 'Kebersamaan::getdokterGP');
$routes->get('sipayu/exportgp', 'Kebersamaan::exportDokterGP');
$routes->get('sipayu/doktergp', 'Kebersamaan::getdokterGP');
$routes->post('sipayu/alldokter', 'Kebersamaan::getAllDokter');
$routes->get('sipayu/alldokter', 'Kebersamaan::getAllDokter');
$routes->get('sipayu/exportalldokter', 'Kebersamaan::exportAllDokter');
// $routes->get('sipayu/kebersamaan', 'Kebersamaan::getBulan');
// $routes->get('sipayu/tindakan', 'Tindakan::getBulan');
$routes->post('sipayu/tindakan', 'Tindakan::getTindakan');
$routes->get('sipayu/tindakan', 'Tindakan::getTindakan');


$routes->get('users/users', 'Admin::add');
$routes->get('users/addusers', 'Admin::addusers');
$routes->post('users/simpanusers', 'Admin::simpanusers');
$routes->get('users/dokumentasi', 'Admin::dokumentasi');
// $routes->get('users/delusers', 'Admin::delusers');
$routes->get('users/delusers/(:num)', 'Admin::delusers/$1');


//Export Excel
// $routes->get('export-excel', 'ExportExcel::exportExcel');
$routes->get('users/export-excel', 'Admin::exportExcel');

$routes->get('users/cetak_pdf', 'Admin::cetakPdf');
$routes->get('users/cetak_user', 'Admin::cetakUser');
// $routes->get('users/getUsers', 'Admin::getUsers');

// SERVERSIDE
$routes->get('users/viewUsers', 'Admin::viewUsers');
$routes->post('users/getUsers', 'Admin::getUsers');


//PROBLEM
//APS FARMASI
$routes->get('problem/getstatusAps', 'Aps::getstatusAps');
$routes->get('problem/unLunas', 'Aps::unLunas');

//REPORT RADIOLOGI
$routes->get('problem/getReport', 'Report::getReport');
// $routes->get('problem/unReport', 'Report::unReport');
$routes->get('problem/unreport', 'Report::unReport');


//JKN 
$routes->get('jkn/listpasien', 'Sep::listPasien');
// $routes->post('jkn/listpasien', 'Sep::listPasien');
$routes->get('jkn/pdfdownload', 'Sep::printPDF');
$routes->get('jkn/cetaksep', 'Sep::cetakSep');
$routes->post('jkn/cetaksep', 'Sep::cetakSep');
$routes->get('jkn/cetakresume', 'Sep::cetakResume');
$routes->get('jkn/pdfBPJS', 'Sep::printPDF');

$routes->get('jkn/pdfcetaksep', 'Sep::printPDF');
$routes->get('jkn/pdfcetakbilling', 'Sep::printPDF');
$routes->get('jkn/pdfcetaklaboratorium', 'Sep::printPDF');
$routes->get('jkn/cetakbilling', 'Sep::cetakBilling');
$routes->get('jkn/cetaklaboratorium', 'Sep::cetakLaboratorium');
$routes->get('jkn/pdfcetakcppt', 'Sep::printPDF');
//CPPT
$routes->get('jkn/cetakcppt', 'Sep::cetakCPPT');
$routes->get('jkn/cetakradiologi', 'Sep::cetakRadiologi');
// $routes->post('jkn/cetakresume', 'Sep::cetakResume');

//QR CODE
$routes->get('/qrcode/(:any)', 'QrCodeController::generate/$1');

//UPLOAD
$routes->get('jkn/image-upload', 'ImageUpload::index');
$routes->post('jkn/image-upload/upload', 'ImageUpload::upload');
$routes->get('jkn/image-upload/testSave', 'ImageUpload::testSave');
$routes->post('jkn/image-hapus/(:any)', 'ImageUpload::delGambar/$1');


//Merger PDF
$routes->get('jkn/merge-pdf', 'PdfMergerController::index');
$routes->post('jkn/merge-pdf', 'PdfMergerController::merge');

//BRIDGING VCLAIM
$routes->get('vclaim/seppersonal', 'GetSep::index');
$routes->get('vclaim/signature', 'GetSep::Signature');
$routes->get('vclaim/peserta/(:any)', 'PesertaController::getPesertaByNIK/$1');
$routes->get('vclaim/pesertanokartu/(:any)', 'PesertaController::getPesertaByNoKartu/$1');
$routes->get('vclaim/seppelayanan/(:any)', 'SepController::getSepPelayanan/$1');
$routes->get('vclaim/datakunjungan/(:any)/(:num)', 'MonitoringController::getDataKunjungan/$1/$2');
$routes->get('vclaim/historykunjungan/(:any)/(:any)/(:any)', 'MonitoringController::getHistoryKunjungan/$1/$2/$3');
$routes->get('vclaim/klaimjasaraharja/(:any)/(:any)/(:any)', 'MonitoringController::getKlaimJasaRaharja/$1/$2/$3');


//JKN RANAP
$routes->get('jkn/listpasienranap', 'SepRanap::listPasienRanap');
$routes->get('jkn/pdfbpjsranap', 'SepRanap::printPDFRanap');

//SIPAYU
$routes->get('sipayu/getregisterrajal', 'Registerrajal::getRegisterrajal');
// $routes->get('page/getpegawai', 'Pegawai::getPegawai');


//JASPEL
$routes->get('jaspel/jasaranap', 'JaspelController::index');
$routes->get('jaspel/getjasaranap', 'JaspelController::getJasaRanap');
$routes->get('jaspel/getasuransi', 'JaspelController::getAsuransi');
$routes->get('jaspel/getPeriodByAsuransi/(:any)', 'JaspelController::getPeriodByAsuransi/$1');
$routes->get('jaspel/getYearsByAsuransi/(:any)', 'JaspelController::getYearsByAsuransi/$1');
//JASPEL-RAJAL
$routes->get('jaspel/jasarajal', 'JaspelController::getRajal');
$routes->get('jaspel/getjasarajal', 'JaspelController::getJasaRajal');
//JASPEL-IGD
$routes->get('jaspel/jasaigd', 'JaspelController::getIGD');
$routes->get('jaspel/getjasaigd', 'JaspelController::getJasaIGD');
