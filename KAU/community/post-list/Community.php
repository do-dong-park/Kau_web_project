<?php
session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>자유 게시판</title>
    <?php
    include $_SERVER['DOCUMENT_ROOT']."/KAU/base/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="/KAU/base/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="css/Community.css">
    <link rel="stylesheet" href="/KAU/base/footer/common_footer.css">
    <script src="/KAU/base/nav_bar/my-nav-bar-bootstrap.js" crossorigin="anonymous"></script>

</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/KAU/base/nav_bar/my-navbar-bootstrap.php"
?>

<section class="community-section">

    <div class="community-main-title">
        <h1 class="title">자유 게시판</h1>
        <button class="add-post btn btn-outline-secondary btn-sm"
            <?php
            if (isset($_SESSION['user_id'])) { ?>
                onclick="location.href = 'https://dongdong-24.shop/KAU/community/post-item/write_post.php'"
            <?php } else { ?>
                onclick="alert('로그인 후 글을 작성할 수 있습니다.'); return false;"
            <?php } ?>
        >글 작성
        </button>

        <!--        검색구역-->
        <div id="search_box">

            <form class="search_box" action="https://dongdong-24.shop/KAU/community/post-list/search_result.php"
                  method="get">
                <input type="hidden" name="board_type" value="1">
                <select name="category">
                    <option value="title">제목</option>
                    <option value="nickname">글쓴이</option>
                    <option value="content">내용</option>
                </select>
                <input class="search_input" type="text" name="search" size="40" required="required"/> <input
                        class="btn btn-outline-secondary btn-sm" type="submit" value="검색">
            </form>
        </div>
        <!--        검색구역 끝-->

    </div>

    <!--    class : table은 테두리 만들어주는 친구 / striped 줄마다 색 다르게 / table-hover - 마우스 위에 있을 때 반응! -->
    <!--    있다가 게시판 만들 때는 striped 옵션 꺼야 해요!-->

    <table class="community-table table table-hover">

        <!--    colgroup 태그는 표의 열을 묶는 역할을 수행한다. 인덱스 / 정보1 /정보2 등등 묶어서 스타일 지정하는데 쓴다.-->
        <colgroup>
            <col span="1" class="community-num" width="10%">
            <col span="1" class="community-title">
            <col span="1" class="community-writer" width="10%">
            <col span="1" class="community-date" width="10%">
            <col span="1" class="community-visited" width="10%">
        </colgroup>

        <!--    thead (table head) 태그는 표의 열 인덱스 값을 지정할 것이라고 선언하는데 사용합니다., 박스의 역할임-->
        <!--    thead 안에 tr(table row element)가 들어가는데, 셀의 행을 정의하는 역할을 수행합니다. td와 th을 섞어 쓰면서 내용을 채웁니다.-->
        <!--    th는 tr안에 들어갑니다. 행과 열의 인덱스 값을 채워 넣는데 사용됩니다. scope="col or row"를 통해 행요소인지, 열 요소인지 지정합니다.-->
        <!--    td는 행 열 인덱스를 제외한 나머지 부분에 값을 채워 놓는데 사용합니다.-->

        <thead class="community-table-thead">
        <tr>
            <th scope="col">번호</th>
            <th scope="col">제목</th>
            <th scope="col">작성자</th>
            <th scope="col">작성일</th>
            <th scope="col">조회수</th>
        </tr>
        </thead>


        <!--서버로부터, 정보를 불러옵니다-->
        <?php
        // board테이블에서 idx를 기준으로 내림차순해서 10개까지 표시
        //            $sql = mq("select * from php_real_project.board_info where category=0 order by board_no desc limit 0,10");
        $sql = mq("select Post.*, U.nickname from kau_web_project.Post join User U on Post.userIdx = U.idx  order by Post.idx desc limit 0,10");

        while ($board = $sql->fetch_array()) {

            //title변수에 DB에서 가져온 title을 선택
            $title = $board['title'];

            $sql2 = mq("select * from kau_web_project.Comment where postIdx = '".$board['idx']."' ");
            $rep_count = mysqli_num_rows($sql2);

            //                시간 설정 포맷
            date_default_timezone_set("Asia/Seoul");

            //                오늘날짜와 비교하여, 게시판에 보일 시간 양식 선택
            $time = DateTime::createFromFormat('Y-m-d H:i:s', $board['createdAt']);
            $time = date_format($time, 'Y-m-d');
            //
            $now = date('Y-m-d', time());

            if ($time === $now) {
                $time = DateTime::createFromFormat('Y-m-d H:i:s', $board['createdAt']);
                $time = date_format($time, 'H:i');
            } else {
                $time = DateTime::createFromFormat('Y-m-d H:i:s', $board['createdAt']);
                $time = date_format($time, 'Y-m-d');
            }
            //                시간처리 끝

            ?>

            <tbody class="community-table-body">
            <tr>
<!--                게시판 인덱스를 표현.-->
                <th scope="row"><?php echo $board['idx']; ?></th>

                <td>

<!--                    게시글이 비밀 글일 경우,-->
                    <?php
                    if ($board['isSecret'] == 'Y') {

//                        게시글이 비밀글이고, 댓글 수가 0 이상일 때. 비밀번호 입력창을 팝업시킨다.
                        if ($rep_count > 0) { ?>
                            <a href="#"
                               onclick="location.replace('https://dongdong-24.shop/KAU/community/post-item/unlock_post.php?idx=<?php echo $board['idx']; ?>');">
                                <i class="fas fa-lock"></i> <?php echo $board['title']; ?> <span
                                        class="re_ct"> [<?php echo $rep_count; ?>]</span></a>
                            <?php
                        } else { ?>
                            <a href="#"
                               onclick="location.replace('https://dongdong-24.shop/KAU/community/post-item/unlock_post.php?idx=<?php echo $board['idx']; ?>');">
                                <i class="fas fa-lock"></i> <?php echo $board['title']; ?></a>
                            <?php
                        } ?>

<!--                        비밀 글이 아닐 경우,-->
                    <?php } else {
                        if ($rep_count > 0) { ?>
                            <a href="https://dongdong-24.shop/KAU/community/post-item/view-post.php?idx=<?php echo $board['idx']; ?>"><?php echo $board['title']; ?>
                                <span class="re_ct"> [<?php echo $rep_count; ?>]</span></a>
                        <?php } else { ?> <a
                                href="https://dongdong-24.shop/KAU/community/post-item/view-post.php?idx=<?php echo $board['idx']; ?>"><?php echo $board['title']; ?></a> <?php }
                    } ?>
                </td>
                <td><?php echo $board['nickname']; ?></td>
                <td><?php echo $time; ?></td>
                <td><?php echo $board['hit']; ?></td>
            </tr>
            </tbody>
        <?php } ?>
    </table>

    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">이전</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">다음</a>
            </li>
        </ul>
    </nav>


</section>

<?php
include $_SERVER['DOCUMENT_ROOT']."/KAU/base/footer/common_footer.php";
?>

</body>
</html>