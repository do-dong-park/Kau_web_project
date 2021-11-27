<?php

$conn = mysqli_connect("dongdong-db.ctrzurlhmfdw.ap-northeast-2.rds.amazonaws.com", "admin", 'tpwnd2315!');
mysqli_select_db($conn, 'kau_web_project');

//각 변수에 write.php에서 input name값들을 저장한다
@session_start();
$user_id = $_SESSION['user_id'];

$sql = mq("delete from kau_web_project.User where id='".$user_id."'");

if($sql) {
    ?>
    <script type="text/javascript">alert("탈퇴가 완료되었습니다."); location.href='https://dongdong-24.shop/KAU/main-page/main_page.php'</script>
    <?php
}

?>

<?php

$result = session_destroy(); //세션을 닫아준다
//저장된 쿠키도 삭제시킴....
setcookie("user_id","",time(),"/");
setcookie("user_pw","",time(),"/");

?>


