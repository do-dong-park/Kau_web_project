<?php
include $_SERVER['DOCUMENT_ROOT'] . "/KAU/base/connect_db.php";
$rno = $_POST['rno'];//댓글번호

$bno = $_POST['bno']; //게시글 번호


$sql3 = mq("UPDATE kau_web_project.Comment SET content='".$_POST['reply_content']."' WHERE idx = '".$rno."'"); ?>

<script type="text/javascript">alert('수정되었습니다.');
    location.replace("https://dongdong-24.shop/KAU/community/post-item/view-post.php?idx=<?php echo $bno; ?>");
</script>