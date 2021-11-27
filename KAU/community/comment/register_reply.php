<?php
include $_SERVER['DOCUMENT_ROOT']."/KAU/base/connect_db.php";

session_start();

$bno = $_POST['bno'];
$content = $_POST['reply_content'];

if($bno && $_POST['reply_content']){

    $find_member_no = mq("SELECT idx FROM kau_web_project.User where id = '".$_SESSION['user_id']."' ");
    $member_no = $find_member_no->fetch_array();
    $mno = $member_no['idx'];

    $sql = mq("insert into kau_web_project.Comment(postIdx, uerIdx, content) values('".$bno."', '".$mno."', '".$content."')");

    echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='https://dongdong-24.shop/KAU/community/post-item/view-post.php?idx=$bno';</script>";
}else{
    echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
}
?>