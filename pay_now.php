<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

// require('inc/paytm/config_paytm.php');
// require('inc/paytm/encdec_paytm.php');

date_default_timezone_set("Asia/kolkata");
session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
    redirect('index.php');
}
if (isset($_POST['pay_now'])) {
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");

    $checkSum = "";
    $ORDER_ID = 'ORD_' . $_SESSION['uId'] . random_int(11111, 9999999);
    $CUST_ID = $_SESSION['uId'];
    // $INDUSTRY_TYPE_ID =INDUSTRY_TYPE_ID;
    // $CHANNEL_ID = CHANNEL_ID;
    $TXN_AMOUNT = $_SESSION['room']['payment'];

    //create an array having all required parameters for creating checksum.


    $paramList = array();
    // $paramList["MID"] = PAYTM_MERCHANT_MID;
    $paramList["ORDER_ID"] = $ORDER_ID;
    $paramList["CUST_ID"] = $CUST_ID;
    // $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
    // $paramList["CHANNEL_ID"] = $CHANNEL_ID;
    $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
    // $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
    $paramList["CALLBACK_URL"] = 'http://localhost/homestayproject/pay_response.php';

    //Here checksum string will return by getChecksumFromArray() function.
    //$checkSum = getChecksumFromArray($paramList,'a1l&MRLBLOrmuDGD');

    //Insert payment data into database
    $frm_data = filteration($_POST);

    $query1 = "INSERT INTO `booking_order`(`user_id`, `room_id`, `check_in`, `check_out`, `order_id`) 
    VALUES (?,?,?,?,?)";

    insert($query1, [$CUST_ID, $_SESSION['room']['id'], $frm_data['checkin'], $frm_data['checkout'], $ORDER_ID], 'issss');

    $booking_id = mysqli_insert_id($con);

    $query2 = "INSERT INTO `booking_details`(`booking_id`, `room_name`, `price`, `total_pay`, 
    `user_name`, `phonenum`, `address`) VALUES (?,?,?,?,?,?,?)";

    $res = insert($query2, [
        $booking_id, $_SESSION['room']['name'], $_SESSION['room']['price'],
        $TXN_AMOUNT, $frm_data['name'], $frm_data['phonenum'], $frm_data['address']
    ], 'issssss');



    if ($res == 1) {
        alert('success', 'Payment successful!');
    } else {
        alert('error', 'payment dont successful!');
    }
}


?>

<html>

<head>
    <title>Processing</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="row d-flex justify-content-center " style="margin-top: 200px;">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header bg-info">
                     <h5 class="card-title text-center text-white">Thank you for booking with hotel...</h5>
                </div>
                <div class="card-body ">
                <div class="d-flex justify-content-center">
                    <i><h5 class="card-text mt-3">Click button to back home page</h5></i>
                </div>
                    <div class="d-flex justify-content-center">
                         <a href="index.php" class="btn btn-sm btn-primary mt-5">Click here</a>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

</body>

</html>