<?php 
// require('admin/inc/db_config.php');
// require('admin/inc/essentials.php');


$contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
$values = [1];
$contact_r = mysqli_fetch_assoc(select($contact_q,$values,'i')); 
?>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <img src="images/logo/logo.png" width="130px;" height="90px;">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">SNK-HOMESTAY</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="index.php"><i class="bi bi-house-heart-fill"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="rooms.php"><i class="bi bi-hospital-fill"></i> Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="facilities.php"><i class="bi bi-hdd-rack-fill"></i> Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="contact.php"><i class="bi bi-envelope-paper-heart-fill"></i> Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="about.php"><i class="bi bi-exclamation-square-fill"></i> About</a>
                </li>
            </ul>
            <div class="d-flex">
                <?php 
                 if(isset($_SESSION['login']) && $_SESSION['login']==true)
                 {
                  echo<<<data
                 
                data;
               
                 }
                 else{
                    echo<<<data
                        <button type="button" class="btn btn-sm text-white btn-danger shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                        </button>
                        <button type="button" class="btn btn-sm text-white btn-success shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#registerModal">
                            Register
                        </button>
                    <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                       <img src="images/users/user1.png" style="width:30px; height: 30px;" clas="me-1">
                      
                    </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="bookings.php">Booking</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    data;
                 }
                ?>
              
            </div>
        </div>
    </div>
</nav>

<!-- Login -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email / Mobile</label>
                        <input type="email" name="email_mob" required class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" required class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-success shadow-none">LOGIN</button>
                        <button type="button" class="btn text-secondary text-decoration-none shadow-none" data-bs-toggle="modal" data-bs-target="#forgotModal" data-bs-dismiss="modal">
                           Forgot Password?
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- fORGET -->
<div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="forgot-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> Forgot Password
                    </h5>
                </div>
                <div class="modal-body">
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        Note: A link will be sent to your email to reset your password!
                    </span>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" required class="form-control shadow-none">
                    </div>
                    <div class="mb-2 text-end">
                        <button type="button" class="btn  shadow-none p-0 me-2" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">
                           CANCEL
                        </button>
                        <button type="submit" class="btn btn-success shadow-none">SEND LINK</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Register -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-lines-fill fs-3 me-2"></i> User Registration
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        Note: Your details must match with your ID (passport, driving license, etc.)
                        that will be required during check-in.
                    </span> -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input name="phonenum" type="text" class="form-control shadow-none" required>
                            </div>
                            <!-- <div class="col-md-6 p-0 ">
                                <label class="form-label">Picture</label>
                                <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none">
                            </div> -->
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Password</label>
                                <input name="pass" type="password" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input name="cpass" type="password" class="form-control shadow-none" required>
                            </div>

                        </div>
                    </div>
                    <div class="text-center my-1">
                        <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>