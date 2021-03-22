<?php
include("conf/conn.php");

// revenue
$hasil_rupiah = '';
$hasil_rupiahsms = '';
$hasil_rupiahvoice = '';

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
    $sqlvoice = mysqli_query($koneksi, "SELECT SUM(revenue) as revenue_voice from sheet3 WHERE sheet3.date BETWEEN '$tgl' and '$tgl2' and sheet3.l1 = 'Voice P2P' ");

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
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="Start your development with a Dashboard for Bootstrap 4."
    />
    <meta name="author" content="Creative Tim" />
    <title>Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/img/brand/favicon.png" type="image/png" />
    <!-- Fonts -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
    />
    <!-- Icons -->
    <link
      rel="stylesheet"
      href="assets/vendor/nucleo/css/nucleo.css"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
      type="text/css"
    />
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link
      rel="stylesheet"
      href="assets/css/argon.css?v=1.2.0"
      type="text/css"
    />
		<link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body>
    <!-- Sidenav -->
    <div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<h1><a href="index.php" class="logo">M.</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="#"><span class="fa fa-home"></span> Home</a>
          </li>
          <li>
              <a href="#"><span class="fa fa-user"></span> About</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-sticky-note"></span> Blog</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-cogs"></span> Services</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-paper-plane"></span> Contacts</a>
          </li>
        </ul>
    	</nav>
    
 
    <!-- Main content -->
    <div class="main-content" id="panel">
      <!-- Topnav -->
      
      <!-- Header -->
      <!-- Header -->
      <div class="header bg-primary pb-6" >
        <div class="container-fluid">
        
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
              </div>
            </div>
            <!-- Card stats -->
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
          <div class="col-xl-8">
            <div class="card">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Table L1</h3>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                  <thead class="text-blue">
                    <th>Broadband</th>
                    <th>Digital Services</th>
                    <th>SMS P2P</th>
                    <th>Voice P2P</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Revenue MTD</td>
                        <td>Revenue MTD</td>
                        <td>Revenue MTD</td>
                        <td>Revenue MTD</td>
                    </tr>
                    <!-- revenue mtd -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Rp.
                            <?php
                            echo round($hasil_rupiahsms, 1);
                            ?>
                            B</td>
                        <td>Rp.
                            <?php
                            echo round($hasil_rupiahvoice, 1);
                            ?>
                            B</td>
                    </tr>
                    <!-- mom -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <?php
                            echo round($mom_sms, 1);
                            ?>
                            %
                        </td>
                        <td>
                            <?php
                            echo round($mom_voice, 1);
                            ?>
                            %
                        </td>
                    </tr>
                    <!-- yoy -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <?php
                            echo round($yoy_sms, 1);
                            ?>
                            %
                        </td>
                        <td>
                            <?php
                            echo round($yoy_voice, 1);
                            ?>
                            %
                        </td>
                    </tr>
                    <!-- ytd -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <?php
                            echo round($ytd_sms, 1);
                            ?>
                            %
                        </td>
                        <td>
                            <?php
                            echo round($ytd_voice, 1);
                            ?>
                            %
                        </td>
                    </tr>
                </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="card">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Form</h3>
                  </div>
                </div>
              </div>
              <div
                class="form-group bmd-form-group is-filled"
                style="margin: 0px 15px 15px"
              >
                <form method="get" action="">
                  <label>Update Date:</label>
                  <input
                    type="date"
                    name="tanggal"
                    class="form-control datepicker"
                  />
                  <label>Start Date:</label>
                  <input
                    type="date"
                    name="tanggal2"
                    class="form-control datepicker"
                  />

                  <h6 style="margin-top: 10px">Revenue Type</h6>
                  <select class="revenue form-control">
                    <option>L1</option>
                  </select>
                  <br />
                  <h6 style="margin-top: 10px">Select Area</h6>
                  <select class="form-control">
                    <option>Area 1</option>
                  </select>
                  <br />
                  <h6 style="margin-top: 10px">Select Region</h6>
                  <select class="form-control" id="region" name="select_Region">
                    <option>All</option>
                    <option value="SUMBAGUT">SUMBAGUT</option>
                    <option value="SUMBAGTENG">SUMBAGTENG</option>
                    <option value="SUMBAGSEL">SUMBAGSEL</option>
                  </select>
                  <br />
                  <h6 style="margin-top: 10px">Select L1</h6>
                  <select class="form-control" id="l1" name="l1">
                    <option>All</option>
                    <option value="SMS_P2P">SMS P2P</option>
                    <option value="Voice_P2P">Voice P2P</option>
                  </select>
                  <br />
                  <button
                    type="submit"
                    class="btn btn-danger"
                    style="margin: 0px; line-height: 1"
                  >
                    Tampilkan
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
       
        <!-- Footer -->
        <footer class="footer pt-0">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
              <div class="copyright text-center text-lg-left text-muted">
                &copy; 2020
                <a
                  href="https://www.creative-tim.com"
                  class="font-weight-bold ml-1"
                  target="_blank"
                  >Creative Tim</a
                >
              </div>
            </div>
            <div class="col-lg-6">
              <ul
                class="nav nav-footer justify-content-center justify-content-lg-end"
              >
                <li class="nav-item">
                  <a
                    href="https://www.creative-tim.com"
                    class="nav-link"
                    target="_blank"
                    >Creative Tim</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    href="https://www.creative-tim.com/presentation"
                    class="nav-link"
                    target="_blank"
                    >About Us</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    href="http://blog.creative-tim.com"
                    class="nav-link"
                    target="_blank"
                    >Blog</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                    class="nav-link"
                    target="_blank"
                    >MIT License</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </footer>
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
  </body>
</html>
