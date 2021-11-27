<?php

///데이터베이스 연결.////
$conn = mysqli_connect("dongdong-db.ctrzurlhmfdw.ap-northeast-2.rds.amazonaws.com", "admin", 'tpwnd2315!');
mysqli_select_db($conn, 'kau_web_project');
$result = mysqli_query($conn, 'SELECT * FROM kau_web_project.User');

$userid = $_GET['userid'];

while ($row = mysqli_fetch_assoc($result)) {

    if ($row['id'] == $userid) {
        $id_duplic = true;
        break;

    } else {
        $id_duplic = false;
    }

}

if ($id_duplic == true) {

?>

<div style='font-family:"malgun gothic"; color:red;'><?php echo $userid; ?> 중복된아이디입니다.


    <?php

    } else {

        ?>
        <div style='font-family:"malgun gothic"' ;><?php echo $userid; ?> 는 사용가능한 아이디입니다.</div>
        <?php
    } ?>


    <button value="닫기" onclick="window.close()">닫기</button>