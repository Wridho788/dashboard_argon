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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
                        <h2 class="text-white col-10">Dashboard 5R</h2>                        
                        <div class="dropdown col-1">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <div class="col-3">
                            <div class="card">
                            <form action="" method="get">
                                    <div class="col" style="padding: 8px">
                                        <h2>LAST UPDATE 5R</h2>
                                        <input type="date" name="tanggal" class="form-control datepicker">
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
                 <!-- RS PRODUCTIVE area -->
                 <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row" style="text-align:center;">
                                <div class="col">
                                    <h3 class="mb-0">RS PRODUCTIVE AREA</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>AREA</th>
                                        <th>M1 SA</th>
                                        <th>MTD SA</th>
                                        <th>MOM</th>
                                        <th>M1 RS SA</th>
                                        <th>MTD RS SA</th>
                                        <th>MOM RS SA</th>
                                        <th>RS PJP</th>
                                        <th>RASIO RS SA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-primary">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- RS PRODUCTIVE region -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row" style="text-align:center;">
                                <div class="col">
                                    <h3 class="mb-0">RS PRODUCTIVE REGION</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>REGION</th>
                                        <th>M1 SA</th>
                                        <th>MTD SA</th>
                                        <th>MOM</th>
                                        <th>M1 RS SA</th>
                                        <th>MTD RS SA</th>
                                        <th>MOM RS SA</th>
                                        <th>RS PJP</th>
                                        <th>RASIO RS SA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-primary">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- RS PRODUCTIVE CLUSTER -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row" style="text-align:center;">
                                <div class="col">
                                    <h3 class="mb-0">RS PRODUCTIVE CLUSTER</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>CLUSTER</th>
                                        <th>M1 SA</th>
                                        <th>MTD SA</th>
                                        <th>MOM</th>
                                        <th>M1 RS SA</th>
                                        <th>MTD RS SA</th>
                                        <th>MOM RS SA</th>
                                        <th>RS PJP</th>
                                        <th>RASIO RS SA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-primary">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- RS PRODUCTIVE KABUPATEN -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row" style="text-align:center;">
                                <div class="col">
                                    <h3 class="mb-0">RS PRODUCTIVE KABUPATEN</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>KABUPATEN</th>
                                        <th>M1 SA</th>
                                        <th>MTD SA</th>
                                        <th>MOM</th>
                                        <th>M1 RS SA</th>
                                        <th>MTD RS SA</th>
                                        <th>MOM RS SA</th>
                                        <th>RS PJP</th>
                                        <th>RASIO RS SA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-primary">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                 <!-- RS AGREESIVITY area -->
                 <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row" style="text-align:center;">
                                <div class="col">
                                    <h3 class="mb-0">RS AGREESIVITY AREA</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>AREA</th>
                                        <th>M1 SA</th>
                                        <th>MTD SA</th>
                                        <th>MOM</th>
                                        <th>M1 RS SA</th>
                                        <th>MTD RS SA</th>
                                        <th>MOM RS SA</th>
                                        <th>RS PJP</th>
                                        <th>RASIO RS SA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-primary">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- RS AGREESIVITY region -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row" style="text-align:center;">
                                <div class="col">
                                    <h3 class="mb-0">RS AGREESIVITY REGION</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>REGION</th>
                                        <th>M1 SA</th>
                                        <th>MTD SA</th>
                                        <th>MOM</th>
                                        <th>M1 RS SA</th>
                                        <th>MTD RS SA</th>
                                        <th>MOM RS SA</th>
                                        <th>RS PJP</th>
                                        <th>RASIO RS SA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-primary">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- RS AGREESIVITY CLUSTER -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row" style="text-align:center;">
                                <div class="col">
                                    <h3 class="mb-0">RS AGREESIVITY CLUSTER</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>CLUSTER</th>
                                        <th>M1 SA</th>
                                        <th>MTD SA</th>
                                        <th>MOM</th>
                                        <th>M1 RS SA</th>
                                        <th>MTD RS SA</th>
                                        <th>MOM RS SA</th>
                                        <th>RS PJP</th>
                                        <th>RASIO RS SA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-primary">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- RS AGREESIVITY KABUPATEN -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row" style="text-align:center;">
                                <div class="col">
                                    <h3 class="mb-0">RS AGREESIVITY KABUPATEN</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-striped table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>KABUPATEN</th>
                                        <th>M1 SA</th>
                                        <th>MTD SA</th>
                                        <th>MOM</th>
                                        <th>M1 RS SA</th>
                                        <th>MTD RS SA</th>
                                        <th>MOM RS SA</th>
                                        <th>RS PJP</th>
                                        <th>RASIO RS SA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-primary">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>