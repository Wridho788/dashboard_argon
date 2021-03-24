<?php
include("conf/conn.php");

// revenue
$hasil_rupiah = '';
$hasil_rupiahsms = '';

$hasil_rupiahsms_regionsumbagut = '';
$hasil_rupiahsms_regionsumbagteng = '';
$hasil_rupiahsms_regionsumbagsel = '';

$hasil_rupiahvoice = '';

$hasil_rupiahvoice_regionsumbagut = '';
$hasil_rupiahvoice_regionsumbagteng = '';
$hasil_rupiahvoice_regionsumbagsel = '';

// $revenue_ib = '';
// $revenue_others = '';
// $revenue_ds = '';

// selected region
// $selected_region = '';

// mom
$mom = '';
$mom_sms = '';
$mom_voice = '';
// $mom_ib = '';
// $mom_others = '';
// $mom_ds = '';

// yoy
$yoy = '';
$yoy_sms = '';
$yoy_voice = '';
// $yoy_ib = '';
// $yoy_others = '';
// $yoy_ds = '';

// ytd
$ytd = '';
$ytd_sms = '';
$ytd_voice = '';
// $ytd_ib = '';
// $ytd_others = '';
// $ytd_ds = '';

$duMtd = '';
$hasil_rupiahlastmonth = '';

error_reporting(0);

if (isset($_GET['tanggal'])) {
    $tgl = $_GET['tanggal'];
    $tgl2 = $_GET['tanggal2'];

    // revenue mtd, du mtd,ytd 2020
    $sql = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_mtd from sheet3 where sheet3.date between '$tgl' and '$tgl2'");
    // table l1
    $sqlsms = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_sms from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 = 'SMS P2P' ");
    $sqlsms_regionsumbagut = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_sms from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 = 'SMS P2P' and sheet3.region = 'SUMBAGUT' ");
    $sqlsms_regionsumbagteng = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_sms from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 = 'SMS P2P' and sheet3.region = 'SUMBAGTENG' ");
    $sqlsms_regionsumbagsel = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_sms from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 = 'SMS P2P' and sheet3.region = 'SUMBAGSEL' ");
    
    $sqlvoice = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_voice from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 = 'Voice P2P' ");
    $sqlvoice_regionsumbagut = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_voice from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 = 'Voice P2P' and sheet3.region = 'SUMBAGUT'");
    $sqlvoice_regionsumbagteng = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_voice from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 = 'Voice P2P' and sheet3.region = 'SUMBAGTENG'");
    $sqlvoice_regionsumbagsel = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_voice from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 = 'Voice P2P' and sheet3.region = 'SUMBAGSEL'");
    // last month, du last month
    $sqllastmonth = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_lm from sheet3 where sheet3.date between DATE_SUB('$tgl', INTERVAL 1 MONTH) and DATE_SUB('$tgl2', INTERVAL 1 MONTH)");
    $sqlsmslastmonth = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_smslm from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 MONTH) and DATE_SUB('$tgl2', INTERVAL 1 MONTH) and sheet3.l1 = 'SMS P2P' ");
    $sqlvoicelastmonth = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_voicelm from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 MONTH) and DATE_SUB('$tgl2', INTERVAL 1 MONTH) and sheet3.l1 = 'Voice P2P' ");

    // last year, ytd 2019
    $sqllastyear = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_ly from sheet3 where sheet3.date between DATE_SUB('$tgl', INTERVAL 1 YEAR) and DATE_SUB('$tgl2', INTERVAL 1 YEAR)");
    $sqllastyear_sms = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_lysms from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 YEAR) and DATE_SUB('$tgl2', INTERVAL 1 YEAR) and sheet3.l1 = 'SMS P2P'");
    $sqllastyear_voice = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_lyvoice from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 YEAR) and DATE_SUB('$tgl2', INTERVAL 1 YEAR) and sheet3.l1 = 'Voice P2P'");


    // fetch
    $data = mysqli_fetch_array($sql);
    $datasms = mysqli_fetch_array($sqlsms);
    $datasms_regionsumbagut = mysqli_fetch_array($sqlsms_regionsumbagut);
    $datasms_regionsumbagteng = mysqli_fetch_array($sqlsms_regionsumbagteng);
    $datasms_regionsumbagsel = mysqli_fetch_array($sqlsms_regionsumbagsel);
    $datavoice = mysqli_fetch_array($sqlvoice);
    $datavoice_regionsumbagut = mysqli_fetch_array($sqlvoice_regionsumbagut);
    $datavoice_regionsumbagteng = mysqli_fetch_array($sqlvoice_regionsumbagteng);
    $datavoice_regionsumbagsel = mysqli_fetch_array($sqlvoice_regionsumbagsel);

    $datalastmonth = mysqli_fetch_array($sqllastmonth);
    $datasmslm = mysqli_fetch_array($sqlsmslastmonth);
    $datavoicelm = mysqli_fetch_array($sqlvoicelastmonth);

    $datalastyear = mysqli_fetch_array($sqllastyear);
    $dataly_sms = mysqli_fetch_array($sqllastyear_sms);
    $dataly_voice = mysqli_fetch_array($sqllastyear_voice);


    $data['revenue_mtd'];
    $datasms['revenue_sms'];
    $datasms_regionsumbagut['revenue_sms'];
    $datasms_regionsumbagsel['revenue_sms'];
    $datasms_regionsumbagteng['revenue_sms'];
    $datavoice['revenue_voice'];
    $datavoice_regionsumbagut['revenue_voice'];
    $datavoice_regionsumbagteng['revenue_voice'];
    $datavoice_regionsumbagsel['revenue_voice'];

    $datalastmonth['revenue_lm'];
    $datasmslm['revenue_smslm'];
    $datavoicelm['revenue_voicelm'];

    $datalastyear['revenue_ly'];
    $dataly_sms['revenue_lysms'];
    $dataly_voice['revenue_lyvoice'];


    // revenue mtd, du mtd, ytd 2020
    $revenue = " " . number_format($data['revenue_mtd'], 2, ',', '.');
    $revenue;

    $hasil_rupiah = " " . number_format($data['revenue_mtd'], 2, ',', '.');
    round($hasil_rupiah, 1);
    $hasil_rupiah;

    $hasil_rupiahsms = " " . number_format($datasms['revenue_sms'], 2, ',', '.');
    $hasil_rupiahsms;
// region
    $hasil_rupiahsms_regionsumbagut = " " . number_format($datasms_regionsumbagut['revenue_sms'], 2, ',', '.');
    $hasil_rupiahsms_regionsumbagut;
    $hasil_rupiahsms_regionsumbagteng = " " . number_format($datasms_regionsumbagteng['revenue_sms'], 2, ',', '.');
    $hasil_rupiahsms_regionsumbagteng;
    $hasil_rupiahsms_regionsumbagsel = " " . number_format($datasms_regionsumbagsel['revenue_sms'], 2, ',', '.');
    $hasil_rupiahsms_regionsumbagsel;

    $hasil_rupiahvoice = " " . number_format($datavoice['revenue_voice'], 2, ',', '.');
    $hasil_rupiahvoice;
// region
    $hasil_rupiahvoice_regionsumbagut = " " . number_format($datavoice_regionsumbagut['revenue_voice'], 2, ',', '.');
    $hasil_rupiahvoice_regionsumbagut;
    $hasil_rupiahvoice_regionsumbagteng = " " . number_format($datavoice_regionsumbagteng['revenue_voice'], 2, ',', '.');
    $hasil_rupiahvoice_regionsumbagteng;
    $hasil_rupiahvoice_regionsumbagsel = " " . number_format($datavoice_regionsumbagsel['revenue_voice'], 2, ',', '.');
    $hasil_rupiahvoice_regionsumbagsel;

    // last month, du last month
    $hasil_rupiahlastmonth = " " . number_format($datalastmonth['revenue_lm'], 2, ',', '.');
    $hasil_rupiahlastmonth;

    $hasil_rupiahlastmonthsms = " " . number_format($datasmslm['revenue_smslm'], 2, ',', '.');
    $hasil_rupiahlastmonthsms;

    $hasil_rupiahlastmonthvoice = " " . number_format($datavoicelm['revenue_voicelm'], 2, ',', '.');
    $hasil_rupiahlastmonthvoice;

    // last year, ytd 2019
    $hasil_rupiahlastyear = " " . number_format($datalastyear['revenue_ly'], 2, ',', '.');
    $hasil_rupiahlastyear;

    $hasil_rupiahlastyear_sms = " " . number_format($dataly_sms['revenue_lysms'], 2, ',', '.');
    $hasil_rupiahlastyear_sms;

    $hasil_rupiahlastyear_voice = " " . number_format($dataly_voice['revenue_lyvoice'], 2, ',', '.');
    $hasil_rupiahlastyear_voice;
    // MoM
    $mom = (($hasil_rupiah / $hasil_rupiahlastmonth - 2) * 100);
    $mom;

    $mom_sms = (($hasil_rupiahsms / $hasil_rupiahlastmonthsms - 2) * 100);
    $mom_sms;

    $mom_voice = (($hasil_rupiahvoice / $hasil_rupiahlastmonthvoice - 2) * 100);
    $mom_voice;

    // yoy
    $yoy = (($hasil_rupiah / $hasil_rupiahlastyear - 2) * 100);
    $yoy;

    $yoy_sms = (($hasil_rupiahsms / $hasil_rupiahlastyear_sms - 2) * 100);
    $yoy_sms;

    $yoy_voice = (($hasil_rupiahvoice / $hasil_rupiahlastyear_voice - 2) * 100);
    $yoy_voice;

    // ytd
    $ytd = (($hasil_rupiah / $hasil_rupiahlastyear - 2) * 100);
    $ytd;

    $ytd_sms = (($hasil_rupiahsms / $hasil_rupiahlastyear_sms - 2) * 100);
    $ytd_sms;

    $ytd_voice = (($hasil_rupiahvoice / $hasil_rupiahlastyear_voice - 2) * 100);
    $ytd_voice;


    // du mtd
    $tglawal = new DateTime("$tgl");
    $tglakhir = new DateTime("$tgl2");
    $d = $tglakhir->diff($tglawal)->days + 1;
    $d;

    $duMtd = ($hasil_rupiah / $d);
    $duMtd;
} else
 if (isset($_GET['tanggal'], $_GET['region'])) {
    $tgl = $_GET['tanggal'];
    $tgl2 = $_GET['tanggal2'];
    $select_Region = $_GET['region'];

    // revenue mtd, du mtd,ytd 2020
    $sql = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_mtd from sheet3 where sheet3.date between '$tgl' and '$tgl2' and sheet3.region = '$selectRegion'");
    // table l1
    $sqlsms = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_sms from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 = 'SMS P2P' and sheet3.region = '$selectRegion'");
    $sqlvoice = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_voice from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 = 'Voice P2P' and sheet3.region = '$selectRegion'");

    // last month, du last month
    $sqllastmonth = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_lm from sheet3 where sheet3.date between DATE_SUB('$tgl', INTERVAL 1 MONTH) and DATE_SUB('$tgl2', INTERVAL 1 MONTH)and sheet3.region = '$selectRegion'");
    $sqlsmslastmonth = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_smslm from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 MONTH) and DATE_SUB('$tgl2', INTERVAL 1 MONTH) and sheet3.l1 = 'SMS P2P' and sheet3.region = '$selectRegion'");
    $sqlvoicelastmonth = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_voicelm from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 MONTH) and DATE_SUB('$tgl2', INTERVAL 1 MONTH) and sheet3.l1 = 'Voice P2P' and sheet3.region = '$selectRegion'");

    // last year, ytd 2019
    $sqllastyear = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_ly from sheet3 where sheet3.date between DATE_SUB('$tgl', INTERVAL 1 YEAR) and DATE_SUB('$tgl2', INTERVAL 1 YEAR)and sheet3.region = '$selectRegion'");
    $sqllastyear_sms = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_lysms from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 YEAR) and DATE_SUB('$tgl2', INTERVAL 1 YEAR) and sheet3.l1 = 'SMS P2P'and sheet3.region = '$selectRegion'");
    $sqllastyear_voice = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_lyvoice from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 YEAR) and DATE_SUB('$tgl2', INTERVAL 1 YEAR) and sheet3.l1 = 'Voice P2P'and sheet3.region = '$selectRegion'");


    // fetch
    $data = mysqli_fetch_array($sql);
    $datasms = mysqli_fetch_array($sqlsms);
    $datavoice = mysqli_fetch_array($sqlvoice);

    $datalastmonth = mysqli_fetch_array($sqllastmonth);
    $datasmslm = mysqli_fetch_array($sqlsmslastmonth);
    $datavoicelm = mysqli_fetch_array($sqlvoicelastmonth);

    $datalastyear = mysqli_fetch_array($sqllastyear);
    $dataly_sms = mysqli_fetch_array($sqllastyear_sms);
    $dataly_voice = mysqli_fetch_array($sqllastyear_voice);


    $data['revenue_mtd'];
    $datasms['revenue_sms'];
    $datavoice['revenue_voice'];

    $datalastmonth['revenue_lm'];
    $datasmslm['revenue_smslm'];
    $datavoicelm['revenue_voicelm'];

    $datalastyear['revenue_ly'];
    $dataly_sms['revenue_lysms'];
    $dataly_voice['revenue_lyvoice'];


    // revenue mtd, du mtd, ytd 2020
    $revenue = " " . number_format($data['revenue_mtd'], 2, ',', '.');
    $revenue;

    $hasil_rupiah = " " . number_format($data['revenue_mtd'], 2, ',', '.');
    round($hasil_rupiah, 1);
    $hasil_rupiah;

    $hasil_rupiahsms = " " . number_format($datasms['revenue_sms'], 2, ',', '.');
    $hasil_rupiahsms;

    $hasil_rupiahvoice = " " . number_format($datavoice['revenue_voice'], 2, ',', '.');
    $hasil_rupiahvoice;

    // last month, du last month
    $hasil_rupiahlastmonth = " " . number_format($datalastmonth['revenue_lm'], 2, ',', '.');
    $hasil_rupiahlastmonth;

    $hasil_rupiahlastmonthsms = " " . number_format($datasmslm['revenue_smslm'], 2, ',', '.');
    $hasil_rupiahlastmonthsms;

    $hasil_rupiahlastmonthvoice = " " . number_format($datavoicelm['revenue_voicelm'], 2, ',', '.');
    $hasil_rupiahlastmonthvoice;

    // last year, ytd 2019
    $hasil_rupiahlastyear = " " . number_format($datalastyear['revenue_ly'], 2, ',', '.');
    $hasil_rupiahlastyear;

    $hasil_rupiahlastyear_sms = " " . number_format($dataly_sms['revenue_lysms'], 2, ',', '.');
    $hasil_rupiahlastyear_sms;

    $hasil_rupiahlastyear_voice = " " . number_format($dataly_voice['revenue_lyvoice'], 2, ',', '.');
    $hasil_rupiahlastyear_voice;
    // MoM
    $mom = (($hasil_rupiah / $hasil_rupiahlastmonth - 2) * 100);
    $mom;

    $mom_sms = (($hasil_rupiahsms / $hasil_rupiahlastmonthsms - 2) * 100);
    $mom_sms;

    $mom_voice = (($hasil_rupiahvoice / $hasil_rupiahlastmonthvoice - 2) * 100);
    $mom_voice;

    // yoy
    $yoy = (($hasil_rupiah / $hasil_rupiahlastyear - 2) * 100);
    $yoy;

    $yoy_sms = (($hasil_rupiahsms / $hasil_rupiahlastyear_sms - 2) * 100);
    $yoy_sms;

    $yoy_voice = (($hasil_rupiahvoice / $hasil_rupiahlastyear_voice - 2) * 100);
    $yoy_voice;

    // ytd
    $ytd = (($hasil_rupiah / $hasil_rupiahlastyear - 2) * 100);
    $ytd;

    $ytd_sms = (($hasil_rupiahsms / $hasil_rupiahlastyear_sms - 2) * 100);
    $ytd_sms;

    $ytd_voice = (($hasil_rupiahvoice / $hasil_rupiahlastyear_voice - 2) * 100);
    $ytd_voice;


    // du mtd
    $tglawal = new DateTime("$tgl");
    $tglakhir = new DateTime("$tgl2");
    $d = $tglakhir->diff($tglawal)->days + 1;
    $d;

    $duMtd = ($hasil_rupiah / $d);
    $duMtd;
} else 
    if (isset($_GET['tanggal'], $_GET['L1'])) {
    $tgl = $_GET['tanggal'];
    $tgl2 = $_GET['tanggal2'];
    $select_l1 = $_GET['L1'];

    // revenue mtd, du mtd,ytd 2020
    $sql = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_mtd from sheet3 where sheet3.date between '$tgl' and '$tgl2'");
    // table l1
    $sqlsms = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_sms from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 '$l1' ");
    $sqlvoice = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_voice from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 '$l1' ");

    // last month, du last month
    $sqllastmonth = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_lm from sheet3 where sheet3.date between DATE_SUB('$tgl', INTERVAL 1 MONTH) and DATE_SUB('$tgl2', INTERVAL 1 MONTH)");
    $sqlsmslastmonth = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_smslm from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 MONTH) and DATE_SUB('$tgl2', INTERVAL 1 MONTH) and sheet3.l1 '$l1' ");
    $sqlvoicelastmonth = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_voicelm from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 MONTH) and DATE_SUB('$tgl2', INTERVAL 1 MONTH) and sheet3.l1 '$l1' ");

    // last year, ytd 2019
    $sqllastyear = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_ly from sheet3 where sheet3.date between DATE_SUB('$tgl', INTERVAL 1 YEAR) and DATE_SUB('$tgl2', INTERVAL 1 YEAR)");
    $sqllastyear_sms = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_lysms from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 YEAR) and DATE_SUB('$tgl2', INTERVAL 1 YEAR) and sheet3.l1 '$l1' ");
    $sqllastyear_voice = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_lyvoice from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 YEAR) and DATE_SUB('$tgl2', INTERVAL 1 YEAR) and sheet3.l1 '$l1' ");


    // fetch
    $data = mysqli_fetch_array($sql);
    $datasms = mysqli_fetch_array($sqlsms);
    $datavoice = mysqli_fetch_array($sqlvoice);

    $datalastmonth = mysqli_fetch_array($sqllastmonth);
    $datasmslm = mysqli_fetch_array($sqlsmslastmonth);
    $datavoicelm = mysqli_fetch_array($sqlvoicelastmonth);

    $datalastyear = mysqli_fetch_array($sqllastyear);
    $dataly_sms = mysqli_fetch_array($sqllastyear_sms);
    $dataly_voice = mysqli_fetch_array($sqllastyear_voice);


    $data['revenue_mtd'];
    $datasms['revenue_sms'];
    $datavoice['revenue_voice'];

    $datalastmonth['revenue_lm'];
    $datasmslm['revenue_smslm'];
    $datavoicelm['revenue_voicelm'];

    $datalastyear['revenue_ly'];
    $dataly_sms['revenue_lysms'];
    $dataly_voice['revenue_lyvoice'];


    // revenue mtd, du mtd, ytd 2020
    $revenue = " " . number_format($data['revenue_mtd'], 2, ',', '.');
    $revenue;

    $hasil_rupiah = " " . number_format($data['revenue_mtd'], 2, ',', '.');
    round($hasil_rupiah, 1);
    $hasil_rupiah;

    $hasil_rupiahsms = " " . number_format($datasms['revenue_sms'], 2, ',', '.');
    $hasil_rupiahsms;

    $hasil_rupiahvoice = " " . number_format($datavoice['revenue_voice'], 2, ',', '.');
    $hasil_rupiahvoice;

    // last month, du last month
    $hasil_rupiahlastmonth = " " . number_format($datalastmonth['revenue_lm'], 2, ',', '.');
    $hasil_rupiahlastmonth;

    $hasil_rupiahlastmonthsms = " " . number_format($datasmslm['revenue_smslm'], 2, ',', '.');
    $hasil_rupiahlastmonthsms;

    $hasil_rupiahlastmonthvoice = " " . number_format($datavoicelm['revenue_voicelm'], 2, ',', '.');
    $hasil_rupiahlastmonthvoice;

    // last year, ytd 2019
    $hasil_rupiahlastyear = " " . number_format($datalastyear['revenue_ly'], 2, ',', '.');
    $hasil_rupiahlastyear;

    $hasil_rupiahlastyear_sms = " " . number_format($dataly_sms['revenue_lysms'], 2, ',', '.');
    $hasil_rupiahlastyear_sms;

    $hasil_rupiahlastyear_voice = " " . number_format($dataly_voice['revenue_lyvoice'], 2, ',', '.');
    $hasil_rupiahlastyear_voice;
    // MoM
    $mom = (($hasil_rupiah / $hasil_rupiahlastmonth - 2) * 100);
    $mom;

    $mom_sms = (($hasil_rupiahsms / $hasil_rupiahlastmonthsms - 2) * 100);
    $mom_sms;

    $mom_voice = (($hasil_rupiahvoice / $hasil_rupiahlastmonthvoice - 2) * 100);
    $mom_voice;

    // yoy
    $yoy = (($hasil_rupiah / $hasil_rupiahlastyear - 2) * 100);
    $yoy;

    $yoy_sms = (($hasil_rupiahsms / $hasil_rupiahlastyear_sms - 2) * 100);
    $yoy_sms;

    $yoy_voice = (($hasil_rupiahvoice / $hasil_rupiahlastyear_voice - 2) * 100);
    $yoy_voice;

    // ytd
    $ytd = (($hasil_rupiah / $hasil_rupiahlastyear - 2) * 100);
    $ytd;

    $ytd_sms = (($hasil_rupiahsms / $hasil_rupiahlastyear_sms - 2) * 100);
    $ytd_sms;

    $ytd_voice = (($hasil_rupiahvoice / $hasil_rupiahlastyear_voice - 2) * 100);
    $ytd_voice;


    // du mtd
    $tglawal = new DateTime("$tgl");
    $tglakhir = new DateTime("$tgl2");
    $d = $tglakhir->diff($tglawal)->days + 1;
    $d;

    $duMtd = ($hasil_rupiah / $d);
    $duMtd;
} else
    if (isset($_GET['tanggal'], $_GET['region'], $_GET['l1'])) {
    $tgl = $_GET['tanggal'];
    $tgl2 = $_GET['tanggal2'];
    $region = $_GET['region'];
    $l1 = $_GET['l1'];

    // revenue mtd, du mtd,ytd 2020
    $sql = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_mtd from sheet3 where sheet3.date between '$tgl' and '$tgl2'and sheet3.region = '$selectRegion'");
    // table l1
    $sqlsms = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_sms from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.region = '$selectRegion' and sheet3.l1 '$l1' ");
    $sqlvoice = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_voice from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.region = '$selectRegion' and sheet3.l1 '$l1' ");

    // last month, du last month
    $sqllastmonth = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_lm from sheet3 where sheet3.date between DATE_SUB('$tgl', INTERVAL 1 MONTH) and DATE_SUB('$tgl2', INTERVAL 1 MONTH)and sheet3.region = '$selectRegion'");
    $sqlsmslastmonth = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_smslm from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 MONTH) and DATE_SUB('$tgl2', INTERVAL 1 MONTH) and sheet3.region = '$selectRegion' and sheet3.l1 '$l1' ");
    $sqlvoicelastmonth = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_voicelm from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 MONTH) and DATE_SUB('$tgl2', INTERVAL 1 MONTH) and sheet3.region = '$selectRegion'and sheet3.l1 '$l1' ");

    // last year, ytd 2019
    $sqllastyear = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_ly from sheet3 where sheet3.date between DATE_SUB('$tgl', INTERVAL 1 YEAR) and DATE_SUB('$tgl2', INTERVAL 1 YEAR)");
    $sqllastyear_sms = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_lysms from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 YEAR) and DATE_SUB('$tgl2', INTERVAL 1 YEAR) and sheet3.region = '$selectRegion'and sheet3.l1 '$l1' ");
    $sqllastyear_voice = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_lyvoice from sheet3 WHERE sheet3.date between DATE_SUB('$tgl', INTERVAL 1 YEAR) and DATE_SUB('$tgl2', INTERVAL 1 YEAR) and sheet3.region = '$selectRegion'and sheet3.l1 '$l1' ");

    // fetch
    $data = mysqli_fetch_array($sql);
    $datasms = mysqli_fetch_array($sqlsms);
    $datavoice = mysqli_fetch_array($sqlvoice);

    $datalastmonth = mysqli_fetch_array($sqllastmonth);
    $datasmslm = mysqli_fetch_array($sqlsmslastmonth);
    $datavoicelm = mysqli_fetch_array($sqlvoicelastmonth);

    $datalastyear = mysqli_fetch_array($sqllastyear);
    $dataly_sms = mysqli_fetch_array($sqllastyear_sms);
    $dataly_voice = mysqli_fetch_array($sqllastyear_voice);


    $data['revenue_mtd'];
    $datasms['revenue_sms'];
    $datavoice['revenue_voice'];

    $datalastmonth['revenue_lm'];
    $datasmslm['revenue_smslm'];
    $datavoicelm['revenue_voicelm'];

    $datalastyear['revenue_ly'];
    $dataly_sms['revenue_lysms'];
    $dataly_voice['revenue_lyvoice'];


    // revenue mtd, du mtd, ytd 2020
    $revenue = " " . number_format($data['revenue_mtd'], 2, ',', '.');
    $revenue;

    $hasil_rupiah = " " . number_format($data['revenue_mtd'], 2, ',', '.');
    round($hasil_rupiah, 1);
    $hasil_rupiah;

    $hasil_rupiahsms = " " . number_format($datasms['revenue_sms'], 2, ',', '.');
    $hasil_rupiahsms;

    $hasil_rupiahvoice = " " . number_format($datavoice['revenue_voice'], 2, ',', '.');
    $hasil_rupiahvoice;

    // last month, du last month
    $hasil_rupiahlastmonth = " " . number_format($datalastmonth['revenue_lm'], 2, ',', '.');
    $hasil_rupiahlastmonth;

    $hasil_rupiahlastmonthsms = " " . number_format($datasmslm['revenue_smslm'], 2, ',', '.');
    $hasil_rupiahlastmonthsms;

    $hasil_rupiahlastmonthvoice = " " . number_format($datavoicelm['revenue_voicelm'], 2, ',', '.');
    $hasil_rupiahlastmonthvoice;

    // last year, ytd 2019
    $hasil_rupiahlastyear = " " . number_format($datalastyear['revenue_ly'], 2, ',', '.');
    $hasil_rupiahlastyear;

    $hasil_rupiahlastyear_sms = " " . number_format($dataly_sms['revenue_lysms'], 2, ',', '.');
    $hasil_rupiahlastyear_sms;

    $hasil_rupiahlastyear_voice = " " . number_format($dataly_voice['revenue_lyvoice'], 2, ',', '.');
    $hasil_rupiahlastyear_voice;
    // MoM
    $mom = (($hasil_rupiah / $hasil_rupiahlastmonth - 2) * 100);
    $mom;

    $mom_sms = (($hasil_rupiahsms / $hasil_rupiahlastmonthsms - 2) * 100);
    $mom_sms;

    $mom_voice = (($hasil_rupiahvoice / $hasil_rupiahlastmonthvoice - 2) * 100);
    $mom_voice;

    // yoy
    $yoy = (($hasil_rupiah / $hasil_rupiahlastyear - 2) * 100);
    $yoy;

    $yoy_sms = (($hasil_rupiahsms / $hasil_rupiahlastyear_sms - 2) * 100);
    $yoy_sms;

    $yoy_voice = (($hasil_rupiahvoice / $hasil_rupiahlastyear_voice - 2) * 100);
    $yoy_voice;

    // ytd
    $ytd = (($hasil_rupiah / $hasil_rupiahlastyear - 2) * 100);
    $ytd;

    $ytd_sms = (($hasil_rupiahsms / $hasil_rupiahlastyear_sms - 2) * 100);
    $ytd_sms;

    $ytd_voice = (($hasil_rupiahvoice / $hasil_rupiahlastyear_voice - 2) * 100);
    $ytd_voice;


    // du mtd
    $tglawal = new DateTime("$tgl");
    $tglakhir = new DateTime("$tgl2");
    $d = $tglakhir->diff($tglawal)->days + 1;
    $d;

    $duMtd = ($hasil_rupiah / $d);
    $duMtd;
} else {
    $sql = mysqli_query($koneksi, "SELECT * from sheet3");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4." />
    <meta name="author" content="Creative Tim" />
    <title>Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/img/brand/favicon.png" type="image/png" />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css" />
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css" />
</head>

<body>
    <!-- side nav -->

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row py-4">
                        <h2 class="text-white col-10">Dashboard</h2>
                        <div class="dropdown col-1">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index2.php">Revenue</a></li>
                                <li><a class="dropdown-item" href="vf.php">Voucher Fisik</a></li>
                                <li><a class="dropdown-item" href="5s.php">5S</a></li>
                                <li><a class="dropdown-item" href="5r.php">5R</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <form class="form-inline" action="" method="get">
                                    <div class="col col-lg-2 form-group is-filled" style="padding: 8px">
                                        <h6>Update Date</h6>
                                        <input type="date" name="tanggal" class="form-control datepicker" value="">
                                    </div>
                                    <div class="col col-lg-2 form-group is-filled" style="padding: 8px">
                                        <h6>Start Date</h6>
                                        <input type="date" name="tanggal2" class="form-control datepicker" value="">
                                    </div>
                                    <div class="col col-md-1 form-group">
                                        <h6>Revenue Type</h6>
                                        <select class="form-control" aria-label="select">
                                            <option value="1">L1</option>
                                        </select>
                                    </div>
                                    <div class="col col-md-1 form-group" style="padding: 10px;">
                                        <h6>Select Area</h6>
                                        <select class="form-control">
                                            <option>Area 1</option>
                                        </select>
                                    </div>
                                    <div class="col col-md-2 form-group">
                                        <h6>Select Region</h6>
                                        <select class="form-control" name="region">
                                            <option>All</option>
                                            <option value="SUMBAGUT">SUMBAGUT</option>
                                            <option value="SUMBAGTENG">SUMBAGTENG</option>
                                            <option value="SUMBAGSEL">SUMBAGSEL</option>
                                        </select>
                                    </div>
                                    <div class="col col-md-1 form-group">
                                        <h6>Select L1 </h6>
                                        <select class="form-control" name="l1">
                                            <option>All</option>
                                            <option value="SMS_P2P">SMS P2P</option>
                                            <option value="Voice_P2P">Voice P2P</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-danger"
                                        style="margin-left : 40px">Tampilkan</button>
                                        <?php
                                            if(isset($_GET['submit'])){
                                                if(!empty($_GET['region'])) {
                                                    $selected = $_GET['region'];
                                                } else {
                                                    echo 'Please select the value.';
                                                }
                                                if(!empty($_GET['l1'])) {
                                                    $selected = $_GET['l1'];
                                                } else {
                                                    echo 'Please select the value.';
                                                }
                                            }
                                            ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">
                                                Revenue MTD
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">Rp. <?php
                                                // echo var_dump($hasil_rupiah);
                                                echo round($hasil_rupiah, 1);
                                                ?>
                                                B</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">
                                                Growth MoM
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0"><?php
                                            echo round($mom, 1);
                                            ?>%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">
                                                Growth YoY
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0"><?php
                                                echo round($yoy, 1);
                                                ?>%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">
                                                Growth YTD
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0"><?php
                                                echo round($ytd, 1);
                                                ?>%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">
                                                DU MTD
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">Rp.
                                                <?php
                                            echo round($duMtd, 1);
                                            ?>B</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">
                                                DU Last Month
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">Rp.
                                                <?php
                                            echo round($hasil_rupiahlastmonth, 1);
                                            ?>B</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <!-- revenue area -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row" style="text-align:center;">
                                <div class="col">
                                    <h3 class="mb-0">REVENUE REGION</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>Region</th>
                                        <th>Broadband</th>
                                        <th>Digital Services</th>
                                        <th>SMS P2P</th>
                                        <th>Voice P2P</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>SUMBAGUT</td>
                                        <td></td>
                                        <td></td>
                                        <td>Rp.
                            <?php
                            echo round($hasil_rupiahsms_regionsumbagut, 1);
                            ?>
                            B</td>
                                        <td>Rp.
                            <?php
                            echo round($hasil_rupiahvoice_regionsumbagut, 1);
                            ?>
                            B</td>
                                    </tr>
                                    <!-- sumbagteng -->
                                    <tr>
                                    <td>SUMBAGTENG</td>
                                        <td></td>
                                        <td></td>
                                        <td>Rp.
                            <?php
                            echo round($hasil_rupiahsms_regionsumbagteng, 1);
                            ?>
                            B</td>
                                        <td>Rp.
                            <?php
                            echo round($hasil_rupiahvoice_regionsumbagteng, 1);
                            ?>
                            B</td>
                                    </tr>
                                    <!-- sumbagsel -->
                                    <tr>
                                    <td>SUMBAGSEL</td>
                                        <td></td>
                                        <td></td>
                                        <td>Rp.
                            <?php
                            echo round($hasil_rupiahsms_regionsumbagsel, 1);
                            ?>
                            B</td>
                                        <td>Rp.
                            <?php
                            echo round($hasil_rupiahvoice_regionsumbagsel, 1);
                            ?>
                            B</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- REVENUE VOICE -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row" style="text-align:center;">
                                <div class="col">
                                    <h3 class="mb-0">REVENUE REGION VOICE</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>REGION</th>
                                        <th>MTD</th>
                                        <th>MOM</th>
                                        <th>YOY</th>
                                        <th>YTD</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- REVENUE DATA -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">REVENUE REGION DATA</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>REGION</th>
                                        <th>MTD</th>
                                        <th>MOM</th>
                                        <th>YOY</th>
                                        <th>YTD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- REVENUE DIGITAL -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">REVENUE REGION DIGITAL</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>REGION</th>
                                        <th>MTD</th>
                                        <th>MOM</th>
                                        <th>YOY</th>
                                        <th>YTD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="assets/js/argon.js?v=1.2.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>