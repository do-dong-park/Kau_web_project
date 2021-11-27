<?php include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php";
session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>게시글 보기</title>
    <?php
    include $_SERVER['DOCUMENT_ROOT']."/KAU/base/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="/KAU/base/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="/KAU/community/post-item/css/view-post.css">
    <link rel="stylesheet" href="/KAU/community/comment/css/reply.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="/KAU/base/nav_bar/my-nav-bar-bootstrap.js" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/KAU/community/comment/js/reply.js"></script>

</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/KAU/base/nav_bar/my-navbar-bootstrap.php"
?>

<?php
$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
//이 글에 대한 정보를 DB로부터, 가져옴.
$sql = mq("select * from kau_web_project.Post join kau_web_project.User where Post.idx='".$bno."' and User.idx = Post.userIdx "); /* 받아온 idx값을 선택 */
$board = $sql->fetch_array();

$sql2 = mq("select User.nickname, User.id, Comment.idx, Comment.createdAt, Comment.content  from kau_web_project.Comment join kau_web_project.User on User.idx = Comment.uerIdx  where postIdx = '". $bno."' order by Comment.createdAt DESC ");
$rep_count = mysqli_num_rows($sql2);

$hit = mq("UPDATE kau_web_project.Post set hit=hit+1 where idx = '".$bno."'");

$board_category = $board['board_category'];
?>

<section class="QnA-view-section">

    <!--    글 제목 위에 있는 버튼들-->
    <div class="control_post">

        <!--        내가! 관리자거나, 작성자라면, 글을 편집할 수 있는 권한을 갖습니다.-->
        <?php
        //        닉네임은 변경이 가능 하기 때문에, 아이디로 게시글의 권한을 파악한다.
        if ( $_SESSION['user_id'] === $board['id'] || $_SESSION['user_id'] === 'admin') { ?>

            <!--        내가 쓴 글이거나 관리자라면, 수정 삭제가 가능해야 함.-->
            <div class="left_btn">
                <form action="https://dongdong-24.shop/KAU/community/post-item/modify_post.php" method="post">
                    <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                    <input type="submit" class="modify-post btn btn-sm btn-outline-secondary" value="수정">
                </form>

                <form action="https://dongdong-24.shop/KAU/community/post-item/delete_post.php" method="post">
                    <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                    <input type="submit" class="modify-post btn btn-sm btn-outline-secondary" value="삭제">
                </form>
            </div>

        <?php } ?>





        <!--이전글 다음글-->
        <?php

        $gotoList = 'https://dongdong-24.shop/KAU/community/post-list/Community.php';

        $next=mq("SELECT * FROM kau_web_project.Post WHERE idx > '".$bno."' ORDER BY idx LIMIT 1");
        $next = $next->fetch_array();
        $next_no=$next['board_no'];

        $prev=mq("SELECT * FROM kau_web_project.Post WHERE idx < '".$bno."' ORDER BY idx LIMIT 1");
        $prev = $prev->fetch_array();
        $prev_no=$prev['board_no'];

        if(!$bno) {
            echo "<script>
    alert('글이 존재하지 않습니다.');
    history.back();</script>";
        }?>

        <div class="right_btn">
            <button class="right_btn list-post btn btn-sm btn-outline-secondary"
                    onclick="location.href = '<?php echo $gotoList ?>' ">목록
            </button>

            <button class="right_btn next-post btn btn-sm btn-outline-secondary" onclick="location.href = 'https://dongdong-24.shop/KAU/community/post-item/view-post.php?idx=<?php echo $next_no; ?>'">

                다음 글
            </button>

            <button class="right_btn previous-post btn btn-sm btn-outline-secondary" onclick="location.href = 'https://dongdong-24.shop/KAU/community/post-item/view-post.php?idx=<?php echo $prev_no; ?>'">
                이전 글
            </button>

        </div>
    </div>

    <!--    글 제목 부분-->
    <div class="QnA-view-main-title">
        <h2 class="title"><?php echo $board['title']; ?></h2>
    </div>
    <!--    글 제목 아래에 있는 작성자 정보-->
    <div class="writer_info">
        <p>작성자 : <?php echo $board['nickname']; ?> / 등록일자 : <?php echo $board['createdAt']; ?> / 댓글수
            : <?php echo $rep_count; ?> / 조회수 : <?php echo $board['hit']; ?>  </p>
    </div>

    <div class="QnA-view-area">
        <div class="QnA-view-description">
            <?php echo nl2br("$board[content]"); ?>
        </div>

        <div class="QnA-view-comment">
            <div class="card-header bg-light">
                <i class="fa fa-comment fa"></i> 댓글
            </div>

            <div class="reply_input">
                <form action="https://dongdong-24.shop/KAU/community/comment/register_reply.php" method="post">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">

                            <!--댓글 작성할 때 내 정보 부분.-->
                            <?php if(isset($_SESSION['user_id'])) {
//                                    로그인만 하면, 작성 가능합니다.
                                if($_SESSION['user_name']) { ?>
                                    <div class="form-inline mb-2">
                                        <div><i class="fa fa-user-circle-o fa-2x"></i><b><?php echo $_SESSION['user_name']; ?></b></div>
                                        <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                  name="reply_content"
                                                  placeholder="내용을 입력해주세요."></textarea>
                                        <input type="submit" class="btn btn-sm btn-outline-secondary mt-3" value="등록">
                                    </div>
                                <?php }  ?>
                            <?php } else { ?>

                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                          name="reply_content"
                                          placeholder="로그인 이후에 댓글 작성이 가능합니다."  disabled></textarea>
                                <input type="submit" class="btn btn-sm btn-outline-secondary mt-3 disabled" value="등록" disabled>
                            <?php } ?>
                        </li>
                    </ul>
                </form>
            </div>


            <!--                        댓글 입력부분.-->


            <!--            댓글 목록-->
            <?php
            // board테이블에서 idx를 기준으로 내림차순해서 10개까지 표시

            while ($reply = $sql2->fetch_array()) {

            $commenter_nickname = $reply['nickname'];
            $commenter_id = $reply['id'];
            $rno = $reply['idx'];
            $time = $reply['createdAt'];
            $content = $reply['content']; ?>

            <!--                    댓글 목록 및 수정 부분-->
            <div class="reply_list" >

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-inline mb-2">
                            <div><i class="fa fa-user-circle-o fa-2x"></i><b><?php echo $commenter_nickname; ?></b></div>
                        </div>
                        <div class="dap_to comt_edit"><?php echo nl2br($content); ?></div>
                        <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                        <div><?php echo $time; ?> </div>
                        <div class="reply_control">
                            <?php if(isset($_SESSION['user_id'])) { ?>

                            <?php } ?>
                            <!--        내가! 관리자거나, 댓글 작성자라면, 댓글을 편집할 수 있는 권한을 갖습니다.-->
                            <?php
                            //        닉네임은 변경이 가능 하기 때문에, 아이디로 게시글의 권한을 파악한다.
                            if ( $_SESSION['user_id'] === 'admin' || $_SESSION['user_id'] === $commenter_id) { ?>

                                <form action="https://dongdong-24.shop/KAU/community/comment/modify_reply.php"
                                      method="POST">
                                    <a class="modify_reply" href="#" onclick="return false">수정</a>
                                </form>

                                <form action="https://dongdong-24.shop/KAU/community/comment/delete_reply.php"
                                      method="POST">
                                    <input type="hidden" name="bno" value="<?php echo $bno; ?>"/>
                                    <input type="hidden" name="rno" value="<?php echo $rno; ?>"/>
                                    <a href="#" onclick="this.parentNode.submit()">삭제</a>
                                </form>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
                <!--                    < 댓글 수정 폼 dialog-->
                <div class="reply_modify_input">
                    <form action="https://dongdong-24.shop/KAU/community/comment/modify_reply"
                          method="post">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-inline mb-2">
                                    <div><i class="fa fa-user-circle-o fa-2x"></i><b><?php echo $commenter_nickname; ?></b></div>
                                </div>
                                <input type="hidden" name="rno" value="<?php echo $rno; ?>"/>
                                <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                          name="reply_content"
                                          placeholder="내용을 입력해주세요."><?php echo $content; ?></textarea>
                                <input type="submit" class="btn btn-sm btn-outline-secondary mt-3" value="수정">
                                <input type="button" onclick="window.location.reload()"
                                       class="btn btn-sm btn-outline-secondary mt-3" value="취소">
                            </li>
                        </ul>
                    </form>

                </div>

                <?php } ?>

            </div>

        </div>

        <div class="board_bottom_btn">
            <button class="modify-post btn btn-outline-secondary"
                <?php
                if(isset($_SESSION['user_id'])) { ?>
                    onclick="location.href = 'https://dongdong-24.shop/KAU/community/post-item/write_post.php'"
                <?php } else { ?>
                    onclick = "alert('로그인 후 글을 작성할 수 있습니다.'); return false;"
                <?php } ?> >글쓰기
            </button>
        </div>


</section>

</body>


</html>