<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh HomeStay - BOOKING STATUS</title>
    <?php require('inc/link.php') ?>
</head>

<body class="bg-light">

    <!-- navbar -->
    <?php require('inc/header.php') ?>



    <div class="container">
        <div class="row">
            <div class="col-12 my-5 mb-3 px-4">
                <h2 class="fw-bold">PAYMENT STATUS</h2>
            </div>
            
            <?php 
            $frm_data = filteration($_GET);
            if(!(isset($_SESSION['login']) && $_SESSION['login']== true)){
                redirect('index.php');
            }
            $booking_q ="SELECT bo.*,bd.* FROM `booking_order` bo 
            INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
            WHERE bo.oder_id=? AND bo.user_id=? AND bo.booking_status!=?";

            $booking_res = select($booking_q,[$frm_data['order'],$_SESSION['uId'],'pending'],'sis');

            if(mysqli_num_rows($booking_res)==0){
                redirect('index.php');
            }

            $booking_fetch = mysqli_fetch_assoc($booking_res);
            if($booking_fetch['trans_status']=="TXN_SUCCESS")
            {
              echo<<<data
              <div class="col-12 px-4">
              <p class="fw-bold alert alert-success">
                 <i class="bi bi-check-circle-fill"></i>
                 Payment done! Booking successful.
                 <br><br>
                 <a href='bookings.php'>Go to bookings</a>
              </p>
              </div>
              data;
            }
            else{
                echo<<<data
                <div class="col-12 px-4">
                <p class="fw-bold alert alert-danger">
                   <i class="bi bi-exclamation-triangle-fill"></i>
                   Payment failed! $booking_fetch[trans_resp_msg]
                   <br><br>
                   <a href='bookings.php'>Go to bookings</a>
                </p>
                </div>
                data;
            }
            ?>
            <div class="col-lg-7 col-md-12 px-4">
               
            </div>
            
            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <form action="pay_now.php" method="POST" id="booking_form">
                              <h6 class="mb-3">BOOKING DETAILS</h6>
                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label class="form-label ">Name</label>
                                      <input name="name" type="text" value="<?php echo $user_data['name']?>" class="form-control shadow-none" required>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label class="form-label ">Phone Number</label>
                                      <input name="phonenum" type="number" value="<?php echo $user_data['phonenum']?>" class="form-control shadow-none" required>
                                  </div>
                                  <div class="col-md-12 mb-3">
                                      <label class="form-label ">Address</label>
                                      <textarea name="address" class="form-control shadow-none" row="1" required><?php echo $user_data['address']?></textarea>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label class="form-label ">Check-in</label>
                                      <input name="checkin" onchange="check_availability()" type="date" class="form-control shadow-none" required>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label class="form-label ">Check-out</label>
                                      <input name="checkout" onchange="check_availability()" type="date" class="form-control shadow-none" required>
                                  </div>
                                  <div class="col-12">
                                    <div class="spinner-border text-info mb-3 d-none" id="info_loader" role="status">
                                         <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <h6 class="mb-3 text-danger" id="pay_info">Provide check-in & check-out date!</h6>
                                  <button name="pay_now" class="btn w-100 text-white custom-bg shadow-none mb-1" disabled>Play_Now</button>
                                  </div>
            
                              </div>
                        </form>
                    </div>
                </div>
            </div>

       
        </div>
        </div>
        <!-- footer -->
        <?php require('inc/footer.php') ?>
        <script>
            let booking_form = document.getElementById('booking_form');
            let info_loader = document.getElementById('info_loader');
            let pay_info = document.getElementById('pay_info');

            function check_availability(){
               let checkin_val = booking_form.elements['checkin'].value;
               let checkout_val = booking_form.elements['checkout'].value;

               booking_form.elements['pay_now'].setAttribute('disabled',true);
               if(checkin_val!='' && checkin_val!='')
               {
                 pay_info.classList.add('d-none');
                 pay_info.classList.replace('text-dark','text-danger');
                 info_loader.classList.remove('d-none');

                 let data = new FormData();
                 data.append('check_availability','');
                 data.append('checkin',checkin_val);
                 data.append('check_out',checkout_val);
               
               let xhr = new XMLHttpRequest();
               xhr.open("POST", "ajax/confirm_booking.php", true);

               xhr.onload = function() {
                let data = JSON.parse(this.responseText);
                if(data.status == 'check_in_out_equal'){
                    pay_info.innerText="You cannot check-out on the same day!";
                }
                else if(data.status == 'check_out_earlier'){
                    pay_info.innerText="Check-out date is earlier than check-in date!";
                }
                else if(data.status == 'check_in_earlier'){
                    pay_info.innerText="Check-in date is earlier than today's date!";
                }
                else if(data.status == 'unavailable'){
                    pay_info.innerText="Room not available for this check-in date!";
                }
                else{
                    pay_info.innerHTML = "No. of Days: "+data.days+"<br>Total Amount to pay: "+data.payment;
                    pay_info.classList.replace('text-danger','text-dark');
                    booking_form.elements['pay_now'].removeAttribute('disabled');
                }
                  pay_info.classList.remove('d-none');
                  info_loader.classList.add('d-none');
               }
               xhr.send(data);
            }
        }
            
        </script>
</body>

</html>