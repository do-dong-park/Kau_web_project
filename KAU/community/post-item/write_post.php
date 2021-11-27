<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>글 작성</title>
    <?php
    include $_SERVER['DOCUMENT_ROOT']."/KAU/base/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="/KAU/base/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="css/write_post.css">
    <script src="/KAU/base/nav_bar/my-nav-bar-bootstrap.js" crossorigin="anonymous"></script>

<!--    ckeditor 기본적인 빌드-->
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/KAU/base/nav_bar/my-navbar-bootstrap.php"
?>

<section class="QnA-write-section">


    <form action="register_post.php" method="post">
        <div class="QnA-write-main-title">
            <h3 class="title">글 작성</h3>
            <button class="register-post btn btn-outline-secondary btn-sm" type="submit">등록</button>
        </div>

        <div class="QnA-input-area">
            <input class="form-control QnA-input-title" name="title" type="text" placeholder="제목을 입력해주세요."
                   aria-label="">

            <div class="QnA-input-description">
                <!-- 2. TEXT 편집 툴을 사용할 textarea -->
                <textarea class="description" name="content" id="editor"></textarea>
            </div>

            <div class="is_secret form-check">
                <input class="form-check-input" type="checkbox" name="lock_post" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    비밀글 설정
                </label>
            </div>

        </div>


    </form>


</section>


</body>
</html>
