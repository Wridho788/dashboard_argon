<?php
include("conf/conn.php");

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
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row py-4">
                        <h2 class="text-white col-10">Dashboard Voucher Fisik</h2>
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
                                <form>
                                    <div class="form-row align-items-center">
                                        <div class="col-4" style="padding:8px;">
                                            <h4>MONTH VF</h4>
                                            <input type="date" name="tanggal" class="form-control datepicker">
                                        </div>
                                        <div class="col-3" style="padding:8px;">
                                            <h4>date used</h4>
                                            <input type="date" name="tanggal" class="form-control datepicker">
                                        </div>
                                        <div class="col-4" style="padding:8px;">
                                            <h4>date used mtd</h4>
                                            <input type="date" name="tanggal" class="form-control datepicker">
                                        </div>
                                        <div class="col-4" style="padding:8px;">
                                            <h4>date m1</h4>
                                            <input type="date" name="tanggal" class="form-control datepicker">
                                        </div>
                                        <div class="col-3" style="padding:8px;">
                                            <h4>date used m1</h4>
                                            <input type="date" name="tanggal" class="form-control datepicker">
                                        </div>
                                        <div class="col-2" style="padding: 8px;">
                                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <!-- VF AREA -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">VF AREA</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>AREA</th>
                                        <th>DIST</th>
                                        <th>AKTIF</th>
                                        <th>PAIRING</th>
                                        <th>PAIRING INNER CLUSTER</th>
                                        <th>AKTIF TO DIST</th>
                                        <th>PAIRING TO AKTIF</th>   
                                        <th>PAIRING INNER</th>
                                        <th>STOCK ACTIF NO REDEEM</th>
                                        <th>STOCK SEGEL</th>
                                        <th>DAILY PAIRING</th>
                                        <th>SD INJECT</th>
                                        <th>SD SEGEL</th>
                                        <th>REVENUE MTD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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

                <!-- VF REGION -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">VF REGION</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead class="text-blue">
                                    <th>REGION</th>
                                    <th>DIST</th>
                                    <th>AKTIF</th>
                                    <th>PAIRING</th>
                                    <th>PAIRING INNER CLUSTER</th>
                                    <th>AKTIF TO DIST</th>
                                    <th>PAIRING TO AKTIF</th>   
                                    <th>PAIRING INNER</th>
                                    <th>STOCK ACTIF NO REDEEM</th>
                                    <th>STOCK SEGEL</th>
                                    <th>DAILY PAIRING</th>
                                    <th>SD INJECT</th>
                                    <th>SD SEGEL</th>
                                    <th>REVENUE MTD</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
                <!-- VF BANCH -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">VF BRANCH</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead class="text-blue">
                                    <th>BRANCH</th>
                                    <th>DIST</th>
                                    <th>AKTIF</th>
                                    <th>PAIRING</th>
                                    <th>PAIRING INNER CLUSTER</th>
                                    <th>AKTIF TO DIST</th>
                                    <th>PAIRING TO AKTIF</th>   
                                    <th>PAIRING INNER</th>
                                    <th>STOCK ACTIF NO REDEEM</th>
                                    <th>STOCK SEGEL</th>
                                    <th>DAILY PAIRING</th>
                                    <th>SD INJECT</th>
                                    <th>SD SEGEL</th>
                                    <th>REVENUE MTD</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
                <!-- VF CLUSTER -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">VF CLUSTER</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead class="text-blue">
                                    <th>CLUSTER</th>
                                    <th>DIST</th>
                                    <th>AKTIF</th>
                                    <th>PAIRING</th>
                                    <th>PAIRING INNER CLUSTER</th>
                                    <th>AKTIF TO DIST</th>
                                    <th>PAIRING TO AKTIF</th>   
                                    <th>PAIRING INNER</th>
                                    <th>STOCK ACTIF NO REDEEM</th>
                                    <th>STOCK SEGEL</th>
                                    <th>DAILY PAIRING</th>
                                    <th>SD INJECT</th>
                                    <th>SD SEGEL</th>
                                    <th>REVENUE MTD</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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