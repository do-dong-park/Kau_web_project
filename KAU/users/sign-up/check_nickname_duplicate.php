<?php

///데이터베이스 연결.////
$conn = mysqli_connect("dongdong-db.ctrzurlhmfdw.ap-northeast-2.rds.amazonaws.com", "admin", 'tpwnd2315!');
mysqli_select_db($conn, 'kau_web_project');
$result = mysqli_query($conn, 'SELECT * FROM kau_web_project.User');

$usernick = $_GET['usernick'];

while ($row = mysqli_fetch_assoc($result)) {

    if ($row['nickname'] == $usernick) {
        $nick_duplic = true;
        break;

    } else {
        $nick_duplic = false;
    }

}

if ($nick_duplic == true) {

?>

<div style='font-family:"malgun gothic"; color:red;'><?php echo $usernick; ?> 중복된 닉네임입니다.


    <?php

    } else {

        ?>
        <div style='font-family:"malgun gothic"' ;><?php echo $usernick; ?> 는 사용가능한 닉네임입니다.</div>
        <?php
    } ?>


    <button value="닫기" onclick="window.close()">닫기</button>