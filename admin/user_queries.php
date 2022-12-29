<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

if (isset($_GET['seen'])) {
    $frm_data = filteration($_GET);
    if ($frm_data['seen'] == 'all') {
        $q = "UPDATE `user_queries` SET `seen`=?";
        $values = [1];
        if (update($q, $values, 'i')) {
            alert('success', 'Marked all as read');
        } else {
            alert('error', 'Operation Failed');
        }
    } else {
        $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
        $values = [1, $frm_data['seen']];
        if (update($q, $values, 'ii')) {
            alert('success', 'Marked as read');
        } else {
            alert('error', 'Operation Failed');
        }
    }
}


if (isset($_GET['del'])) {
    $frm_data = filteration($_GET);
    if ($frm_data['del'] == 'all') {
        $q = "DELETE FROM `user_queries`";
        if (mysqli_query($con, $q)) {
            alert('success', 'All Data Deleted');
        } else {
            alert('error', 'Operation Failed');
        }
    } else {
        $q = "DELETE FROM `user_queries` WHERE `sr_no`=?";
        $values = [$frm_data['del']];
        if (delete($q, $values, 'i')) {
            alert('success', 'Data Deleted');
        } else {
            alert('error', 'Operation Failed');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - User_Queries</title>
    <?php require('inc/link.php'); ?>
    <?php require('inc/scripts.php'); ?>

</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">

        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <!-- <h3 class="mb-4"><i class="bi bi-people text-primary"></i> USER QUERIES</h3> -->
            <!-- features section -->
            <div class="card border-0 shadow-sm mb-4" style="background:rgba(231, 231, 231, 1)">
                <!-- carousel section -->
                <div class="card-body">
                    <div class="d-flex align-self-center justify-content-between">
                        <h3 class="mt-1" style="font-family: 'Josefin Sans', sans-serif; color:rgba(15, 74, 78, 1); font-weight: 700;">USER QUERIES</h3>



                    <div class="text-end mb-4">
                        <a href="?seen=all" class="btn btn-success rounded-pill shadow-none btn-sm">
                            <i class="bi bi-check-all"></i> Mark all read
                        </a>
                        <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-sm">
                            <i class="bi bi-trash"></i> Delete all read
                        </a>
                    </div>
                    </div>
                    <div class="table-responsive-md" style="height:450px; border-radius: 10px;background:white">
                        <table class="table table-hover border">
                            <thead class="sticky-top">
                                <tr class="text-dark">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" width:20%;>Subject</th>
                                    <th scope="col" width:30%;>Message</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q = "SELECT * FROM `user_queries` ORDER BY `sr_no` DESC";
                                $data = mysqli_query($con, $q);
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($data)) {
                                    $seen = '';
                                    if ($row['seen'] != 1) {
                                        $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-success' style='margin-right: 10px'>Mark as read</a>";
                                    }
                                    $seen .= "<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger'>Delete</a>";
                                    echo <<<query
                                <tr>
                                <td>$i</td>
                                <td>$row[name]</td>
                                <td>$row[email]</td>
                                <td>$row[subject]</td>
                                <td>$row[message]</td>
                                <td>$row[date]</td>    
                                <td>$seen</td>                   
                                </tr>
                                query;
                                    $i++;
                                }

                                ?>

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
</body>

</html>