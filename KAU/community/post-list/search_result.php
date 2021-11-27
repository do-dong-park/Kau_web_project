<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QnA 게시판</title>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT']."/KAU/base/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="/KAU/base/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="/KAU/community/post-list/css/search_result.css">
    <link rel="stylesheet" href="/KAU/base/footer/common_footer.css">
    <script src="/KAU/base/nav_bar/my-nav-bar-bootstrap.js" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/KAU/base/nav_bar/my-navbar-bootstrap.php"
?>

<section class="QnA-section">

    <?php

    /* 검색 변수 */
    $category = $_GET['category'];
    $search_con = $_GET['search'];

    ?>

    <?php if($category=='title'){
        $categoryName = '제목';
    } else if($category=='name'){
        $categoryName = '작성자';
    } else {
        $categoryName = '내용';
    } ?>

    <div class="QnA-main-title">
        <h3 class="title"><?php echo $category; ?>      >     <?php echo $categoryName; ?>     :     <?php echo $search_con; ?>    검색결과</h3>
        <!--        검색구역-->
        <div id="search_box">
            <form class="search_box" action="https://dongdong-24.shop/KAU/community/post-list/search_result.php"<?php echo $category; ?> method="get">
                <select name="catgo">
                    <option value="title">제목</option>
                    <option value="name">글쓴이</option>
                    <option value="content">내용</option>
                </select>
                <input class="search_input" type="text" name="search" size="40" required="required" /> <input class="btn btn-outline-secondary btn-sm" type="submit" value="검색">
            </form>
        </div>
        <!--        검색구역 끝-->

        <?php
        include $_SERVER['DOCUMENT_ROOT']."/KAU/community/post-list/bulletin_module.php"
        ?>

    </div>
        <!--    class : table은 테두리 만들어주는 친구 / striped 줄마다 색 다르게 / table-hover - 마우스 위에 있을 때 반응! -->
        <!--    있다가 게시판 만들 때는 striped 옵션 꺼야 해요!-->



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

