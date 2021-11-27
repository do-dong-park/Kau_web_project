<?php include $_SERVER['DOCUMENT_ROOT'] . "/KAU/base/connect_db.php"; ?>
session_start(); ?>

<?php
$bno = $_GET['idx']; /* bno함수에 게시글 idx값을 받아와 넣음*/
//게시글 정보에서, 유저의 id를 받아냄
$sql = mq("select Post.idx, User.id from kau_web_project.Post left join kau_web_project.User on Post.userIdx = User.idx"); /* 받아온 idx값을 선택 */
$board = $sql->fetch_array();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="EUC-KR">
        <title></title>

    </head>
    <body>
    </body>
    </html>

<?php
if( $_SESSION['user_id'] === $board['id'] || $_SESSION['user_id'] === 'admin') { ?>
    <script>location.href='https://dongdong-24.shop/KAU/community/post-item/view-post.php??idx=<?php echo $bno; ?>'</script>
<?php } else { ?>
    <script type="text/javascript">alert('작성자 혹은 관리자만 조회 가능한 글입니다.'); history.back(); </script>
<?php } ?>