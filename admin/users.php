<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Users</title>
    <?php require('inc/link.php'); ?>
    <?php require('inc/scripts.php'); ?>

</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">

        <div class="col-lg-10 ms-auto p-4 overflow-hidden">

            <!-- features section -->
            <div class="card border-0 shadow-sm mb-4" style="background:rgba(231, 231, 231, 1)">
                <div class="card-body">

                    <div class="d-flex align-self-center justify-content-between">
                        <h3 class="mt-1" style="font-family: 'Josefin Sans', sans-serif; color:rgba(15, 74, 78, 1); font-weight: 700;">USERS</h3>
                        <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25" placeholder="Search By Name">
                    </div>

                    <div class="mt-3 table-responsive" style="border-radius: 10px;background:white">
                        <table class="table table-hover border" style="width: 100%">
                            <thead>
                                <tr class="text-dark " >
                                    <th scope="col-sm">ID</th>
                                    <th scope="col-sm">Name</th>
                                    <th scope="col-sm">Email</th>
                                    <th scope="col-sm">Phone</th>
                                    <th scope="col-sm">Verified</th>
                                    <th scope="col-sm">Status</th>
                                    <th scope="col-sm">Date</th>
                                    <th scope="col-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody id="users-data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



    <?php require('inc/scripts.php') ?>
    <script src="scripts/users.js"></script>
</body>

</html>