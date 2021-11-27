<?php

include $_SERVER['DOCUMENT_ROOT'] . "/KAU/base/connect_db.php";

//각 변수에 write.php에서 input name값들을 저장한다
$bno = $_POST['bno'];
$title = $_POST['title'];
$content = $_POST['content'];

if(isset($_POST['lock_post'])) {
    $lock_post = 'Y';
} else {
    $lock_post = 'N';
}
?>
    <script>
        var index = "<?php echo $bno; ?>";
    </script>

<?php
if($title && $content){
    $sql = mq("update kau_web_project.Post set title='".$title."',content='".$content."',updatedAt=now(), isSecret='".$lock_post."' where idx='".$bno."'");
    echo "<script>
    alert('글 수정이 완료되었습니다.');
    location.href='https://dongdong-24.shop/KAU/community/post-item/view-post.php?idx='+index;</script>";
}else{
    echo "<script>
    alert('제목과 내용을 입력하세요.');
    history.back();</script>";
}
?>