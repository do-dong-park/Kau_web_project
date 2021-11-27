<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>카페 토성에 오신 것을 환영합니다!</title>
    <link rel="stylesheet" href="css/main_frame.css">
    <link rel="stylesheet" href="/KAU/base/nav_bar/nav_bar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="/KAU/base/footer/common_footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1059f71d3d.js" crossorigin="anonymous"></script>
    <script src="/KAU/base/nav_bar/navbar.js" defer></script>
    <script src="js/main_frame.js" defer></script>
</head>

<body>

<?php
require_once "../base/nav_bar/navbar-nonbootstrap.php"
?>

<section>
    <div class="slideshow-container">
        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="img/카페사진1.jpg" style="width:100%" alt="카페사진">
            <!--            <div class="text">주간 전경</div>-->
        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="img/카페사진2.jpg" style="width:100%" alt="카페사진">
            <!--            <div class="text">카페 조경</div>-->
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="img/카페사진3.jpg" style="width:100%" alt="카페사진">
            <!--            <div class="text">야간 전경</div>-->
        </div>

        <!-- Next and previous buttons -->
        <!--onclick은, 이벤트 핸들러로, js의 변수값을 변화시킨다.-->
        <!--저 &10094는 무슨 뜻인지 모르겠내-->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <!-- The dots/circles -->
    <div class="fucking_dots" style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

</section>

<?php
include "../base/footer/common_footer.php"
?>

 <!-- END footer -->
</body>
</html>