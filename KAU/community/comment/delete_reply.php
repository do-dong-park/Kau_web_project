<?php
include $_SERVER['DOCUMENT_ROOT'] . "/KAU/base/connect_db.php";

$rno = $_POST['rno'];
$sql = mq("select * from kau_web_project.Comment where idx='" . $rno . "'");//reply테이블에서 idx가 rno변수에 저장된 값을 찾음
$reply = $sql->fetch_array();

$bno = $_POST['bno'];
$sql2 = mq("select * from kau_web_project.Comment where postIdx='" . $bno . "'");//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$board = $sql2->fetch_array();

$sql = mq("delete from kau_web_project.Comment where idx='" . $rno . "'"); ?>

<script type="text/javascript">alert('댓글이 삭제되었습니다.');
    location.replace("https://dongdong-24.shop/KAU/community/post-item/view-post.php?idx=<?php echo $bno; ?>");
</script>
