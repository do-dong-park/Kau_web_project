<?php

include $_SERVER['DOCUMENT_ROOT'] . "/KAU/base/nav_bar/my-navbar-bootstrap.php";


//각 변수에 write.php에서 input name값들을 저장한다

$bno = $_POST['bno'];



$gotoList = 'https://dongdong-24.shop/KAU/community/post-list/Community.php';


$sql = mq("delete from kau_web_project.Comment where postIdx='$bno';");
$sql = mq("delete from kau_web_project.Post where idx='$bno';");

?>

<script type="text/javascript">alert("삭제되었습니다."); location.href='<?php echo $gotoList ?>'</script>
