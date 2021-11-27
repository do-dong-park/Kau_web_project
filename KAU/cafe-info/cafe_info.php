<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>카페 정보</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/KAU/base/nav_bar/nav_bar.css">
    <link rel="stylesheet" href="/KAU/cafe-info/css/cafe_info.css">
    <link rel="stylesheet" href="/KAU/base/footer/common_footer.css">


</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT']."/KAU/base/nav_bar/navbar-nonbootstrap.php"
?>

<section class="Info_box">

    <ul class="Info_text">
        <li id="Info_title"><strong>Information</strong></li>
        <li>☕주소 : 충북 청주시 청원구 토성로 163-1</li>
        <li>⏰ 10:00-19:00 월-일 연중무휴</li>
        <li>👩🏻‍🍳 매장에서 직접 굽는 베이커리& all day brunch</li>
        <li>🌿700평규모야외정원,애견동반🆓입장료는없어요</li>
        <li>🚗주차 ~20대 가능</li>
    </ul>

    <div class="Info_map">
        <div id="daumRoughmapContainer1623262074092" class="root_daum_roughmap root_daum_roughmap_landing"></div>
    </div>

</section>

<?php
include $_SERVER['DOCUMENT_ROOT']."/KAU/base/footer/common_footer.php"
?>

</body>

<script charset="UTF-8" class="daum_roughmap_loader_script"
        src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

<!-- 3. 실행 스크립트 -->
<script charset="UTF-8">
    new daum.roughmap.Lander({
        "timestamp": "1623262074092",
        "key": "26653",
        "mapWidth": "640",
        "mapHeight": "360"
    }).render();
</script>
<script src="/KAU/base/nav_bar/navbar.js" defer></script>
<script src="https://kit.fontawesome.com/1059f71d3d.js" crossorigin="anonymous"></script>
</html>