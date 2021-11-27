<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <title>로그인</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
<section class="login">
    <!--로그인 로고-->
    <div class="login_logo">
        <Strong><a class="login_logo_link" href="https://dongdong-24.shop/KAU/main-page/main_page.php">카페 토성</a></Strong>
    </div>

    <!-- Login input -->
    <!--이 구역 내에 있는 것들을 내 정보 보기라는 페이지로 POST 방식으로 보낼것입니다.-->
    <form action="login_check.php" method="post">

        <div class="login_input">
            <div class="login_id">
                <!--input id에 대해 label을 적용합니다.-->
                <label for="id_input" class="form-label">ID</label>
                <input type="text" class="form-control" name="login_id" id="id_input" placeholder="아이디">
            </div>

            <div class="login_password">
                <label for="pw_input" class="form-label">Password</label>
                <input type="password" class="form-control" name="login_pw" id="pw_input" placeholder="비밀번호">
            </div>
        </div>

        <!--    로그인 옵션 부분 시작-->
        <div class="login_option">
            <div class="auto_option">
                <input class="form-check-input" type="checkbox" name="auto_login" id="auto_option_radio" value="1">
                <label class="form-check-label" for="auto_option_radio">
                    자동 로그인
                </label>
            </div>

            <ul class="another_option">
                <li><a href="http://192.168.56.1/front_end/html/login/find_account.php#">아이디 / 비밀번호 찾기</a></li>
                <li><a href="https://dongdong-24.shop/KAU/users/sign-up/signup.php">회원가입</a></li>
            </ul>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
            <input class="btn btn-primary" type="submit" value="로그인">
        </div>
    </form>

</section>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>



</body>
</html>