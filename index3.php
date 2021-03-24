<?php
include("conf/conn.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            
            <form action="" method="get">
                <select class="form-select" name="l1">
                    <option disabled selected>Open this select menu</option>
                    
                    <option value="SMS P2P">SMS P2P</option>
                    <option value="VOICE P2P">VOICE P2P</option>
                </select>
                <select class="form-select" name="region">
                    <option disabled selected>Open this select menu</option>
                    <option value="SUMBAGUT">SUMBAGUT</option>
                    <option value="SUMBAGTENG">SUMBAGTENG</option>
                    <option value="SUMBAGSEL">SUMBAGSEL</option>
                </select>
                <input type="submit" name="submit" vlaue="Choose options">
            </form>
        </div>
    </div>

    <?php
      if(isset($_GET['submit'])){
        if(!empty($_GET['region'])) {
          $selected = $_GET['region'];
          echo 'You have chosen: ' . $selected;
        } else {
          echo 'Please select the value.';
        }
        if(!empty($_GET['l1'])) {
            $selected = $_GET['l1'];
            echo ' and ' . $selected;
          } else {
            echo 'Please select the value.';
          }
      }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>