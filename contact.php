<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh HomeStay - Contact</title>
    <?php require('inc/link.php') ?>
</head>

<body class="bg-light">

    <!-- navbar -->
    <?php require('inc/header.php') ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Iure dicta molestiae repudiandae <br> magnam quidem qui
            assumenda eos fuga commodi eligendi.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15543.843241811737!2d109.3173248!3d13.10166925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1663430775376!5m2!1svi!2s"></iframe>
                <h5>Address</h5>
                <a href="https://goo.gl/maps/WyyEdrq2WEfqEoBe9" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                 <i class="bi bi-geo-alt-fill"></i>  18 Trần Phú, Việt Nam, 4835+6Q Tuy Hòa, Phú Yên, Việt Nam
                </a>
                <h5 class="mt-4">Call us</h5>
                    <a href="tel: +0376657843" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+0376657843
                    </a>
                    <br>
                    <a href="tel: +0376653453" class="d-inline-block  text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+0376653453
                    </a>
                    
                    <h5 class="mt-4">Email</h5>
                    <a href="" class="d-inline-block text-decoration-none text-dark mb-2">
                    <i class="bi bi-envelope-fill"></i> sipaserdsame@gmail.com
                    </a>

                    <h5 class="mt-4">Follow us</h5>
                    <a href="#" class="d-inline-block  text-dark fs-5 me-2">
                            <i class="bi bi-twitter me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block  text-dark fs-5 me-2">
                            <i class="bi bi-facebook me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block  text-dark fs-5">
                            <i class="bi bi-instagram me-1"></i>
                    </a> 
                </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST"> 
                        <h5>Send a message</h5>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input name="name" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input name="email" required type="email" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input name="subject" required type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea name="message" required class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" name="send" class="btn text-white custom-bg mt-3">SEND</button>     
                    </form>
                        
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php require('inc/footer.php') ?>


    <!-- Initialize Swiper -->




</body>

</html>