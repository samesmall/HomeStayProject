<?php
require('inc/essentials.php');
adminLogin();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - DASHBOARD</title>
    <?php require('inc/link.php'); ?>
    <link rel="stylesheet" href="admin/css/style.css">
</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <!-- features section -->
                <div class="card border-0 shadow-sm mb-4" style="background:rgba(231, 231, 231, 1)">
                    <div class="card-body">
                        <div class="d-flex align-self-center justify-content-between">
                            <h3 class="mt-1" style="font-family: 'Josefin Sans', sans-serif; color:rgba(15, 74, 78, 1); font-weight: 700;">DASHBOARD</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>