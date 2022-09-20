<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh HomeStay - about us</title>
    <?php require('inc/link.php') ?>
    <style>
        .box {
            border-top-color: var(--teal) !important;
        }
    </style>
</head>

<body class="bg-light">

    <!-- navbar -->
    <?php require('inc/header.php') ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">about us</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Iure dicta molestiae repudiandae <br> magnam quidem qui
            assumenda eos fuga commodi eligendi.
        </p>
    </div>
    <div class="container">
        <div class="row justify-content-between align-item-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1  order-2">
                <h3 class="mb-3">Lorem ipsum dolor sit amet consectetur</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Numquam dolorum cumque, quo cum suscipit Lorem ipsum dolor sit amet.
                    Esse non enim eum odio laborum,Lorem ipsum dolor sit amet consectetur.
                    quia incidunt omnis error a perspiciatis velit molestias similique?
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="images/about/8.jpg" class="w-100">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rouded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/8.jpg" width="70px">
                    <h4 class="mt-3">100+ ROOMS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rouded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/8.jpg" width="70px">
                    <h4 class="mt-3">200+ CUSTOMER</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rouded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/8.jpg" width="70px">
                    <h4 class="mt-3">150+ REVIEWS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rouded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/8.jpg" width="70px">
                    <h4 class="mt-3">200+ STAFFS</h4>
                </div>
            </div>
        </div>
    </div>

    <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/8.jpg" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/8.jpg" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/8.jpg" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/8.jpg" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/8.jpg" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/8.jpg" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/8.jpg" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- footer -->
    <? require('inc/footer.php') ?>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 40,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>




    <!-- Initialize Swiper -->




</body>

</html>