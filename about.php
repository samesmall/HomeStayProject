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
            A wonderful Home stay, that combines a perfect location <br> and a beautiful, historic place.
        </p>
    </div>
    <div class="container">
        <div class="row justify-content-between align-item-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1  order-2">
                <h3 class="mb-3">Our story</h3>
                <p>
                    Founded in 2013 by travel industry veterans Same and Noy (Lao Partners & A Star Hostels Group), with a vision of taking an offline industry online and making homestays and private room rental a popular accommodation choice. <br>
                    When travel to a new place, besides getting to know the city, you will like to get out of the tourist area and get to know places that only local people know about and go to, like neture, parks, beaches and feel a little more of the local culture. You know the gems only the locals know about? That's where I like to go. 
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
                    <img src="images/about/hotel.svg" width="70px">
                    <h4 class="mt-3">100+ ROOMS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rouded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/customers.svg" width="70px">
                    <h4 class="mt-3">200+ CUSTOMER</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rouded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/rating.svg" width="70px">
                    <h4 class="mt-3">150+ REVIEWS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rouded shadow p-4 border-top border-4 text-center box">
                    <img src="images/about/staff.svg" width="70px">
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
                    <img src="images/about/1.jpg" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/2.jpg" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/3.jpg" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/IMG_11892.png" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/IMG_16569.jpeg" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/IMG_42663.png" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
                <div class="swiper-slide bg-white text-cewnter overflow-hidden rounded">
                    <img src="images/about/IMG_65019.png" class="w-100">
                    <h5 class="mt-2">Random name</h5>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- footer -->
    <?php require('inc/footer.php') ?>


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