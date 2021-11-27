<?php
include $_SERVER['DOCUMENT_ROOT']."/KAU/base/connect_db.php";

session_start();



//각 변수에 write.php에서 input name값들을 저장한다
$title = $_POST['title'];
$content = $_POST['content'];

if(isset($_POST['lock_post'])) {
    $lock_post = 'Y';
} else {
    $lock_post = 'N';
}

$post_type = $_POST['post_type'];

$location = 'https://dongdong-24.shop/KAU/community/post-list/Community.php';


echo $post_type;

?>

    <script> var location = <?=$location ?></script>
<?php
if($title && $content){

    $find_member_no = mq("SELECT idx FROM kau_web_project.User where id = '".$_SESSION['user_id']."' ");
    $member_no = $find_member_no->fetch_array();
    $mno = $member_no['idx'];

    $sql = mq("insert into kau_web_project.Post(userIdx,title,content,isSecret) values('".$mno."','".$title."','".$content."','".$lock_post."')");
    ?>
    <script>alert('글쓰기 완료되었습니다.');
    location.href='<?php echo $location; ?>'</script>
<?php
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>