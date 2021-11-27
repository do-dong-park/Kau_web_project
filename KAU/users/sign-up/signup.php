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
    <title>회원가입</title>
    <link rel="stylesheet" href="css/signup.css">

</head>

<body>
<section class="signup">
    <!--로그인 로고-->
    <div class="signup_logo">
        <Strong>카페 토성</Strong>
    </div>

    <form name="register" action="register-member.php" method="post" class="signup-form">
        <!-- signup input -->
        <div class="signup_input">
            <div class="signup_id">
                <!--input id에 대해 label을 적용합니다.-->
                <label for="id_input" class="form-label">ID *</label>
                <div class="input-group mb-3">
                    <!--                    중복확인 눌렀을 때 name= id 변수에 input value가 들어간 채로 중복확인 페이지로 전달-->
                    <input type="text" class="form-control" name="id" id="id_input"
                           placeholder="아이디 (6-12자 이내,영문,숫자 사용 가능)">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="checkid()">중복
                        확인
                    </button>
                </div>
            </div>

            <div class="signup_password">
                <label for="pw_input" class="form-label">Password *</label>
                <input type="password" class="form-control" name="pw" id="pw_input"
                       placeholder="비밀번호 (8자 이상,영문,숫자 사용 가능)">
            </div>

            <div class="signup_confirm_password">
                <label for="pw_conf_input" class="form-label">Password Confirm *</label>
                <input type="password" class="form-control" name="pw_conf" id="pw_conf_input" placeholder="비밀번호 확인">
            </div>

            <div class="signup_name">
                <!--input id에 대해 label을 적용합니다.-->
                <label for="name_input" class="form-label">Name *</label>
                <input type="text" class="form-control" name="name" id="name_input" placeholder="이름">
            </div>

            <div class="signup_nickname">
                <!--input id에 대해 label을 적용합니다.-->
                <label for="nickname_input" class="form-label">Nick Name *</label>
                <div class="input-group mb-3">
                    <!--                    중복확인 눌렀을 때 name= id 변수에 input value가 들어간 채로 중복확인 페이지로 전달-->
                    <input type="text" class="form-control" name="nickname" id="nickname_input"
                           placeholder="닉네임 (6-12자 이내,영문,숫자 사용 가능)">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="checknick()">중복
                        확인
                    </button>
                </div>
            </div>

            <div class="signup_email">
                <!--input id에 대해 label을 적용합니다.-->
                <label for="email_input" class="form-label">Email address *</label>

                <div class="input-group mb-3">
                    <!--                    중복확인 눌렀을 때 name= id 변수에 input value가 들어간 채로 중복확인 페이지로 전달-->
                    <input type="email" class="form-control" name="email" id="email_input" placeholder="name@example.com">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="checknick()">이메일 인증
                    </button>
                </div>

            </div>

        </div>

        <script>
            function selectAll(selectAll)  {
                const checkboxes
                    = document.querySelectorAll('input[type="checkbox"]');

                checkboxes.forEach((checkbox) => {
                    checkbox.checked = selectAll.checked
                })
            }
        </script>

        <div class="signup_option">
            <div class="auto_option">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" value="select_all" onclick="selectAll(this)" id="auto_option_radio1">
                <label class="form-check-label" for="auto_option_radio1">
                    약관 전체 동의
                </label>
            </div>

            <div class="auto_option">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="auto_option_radio2">
                <label class="form-check-label" for="auto_option_radio2">
                    개인정보 수집 이용동의 (필수)
                </label>
                <button type="button" class="link"><a
                            href="https://dongdong-24.shop/KAU/users/sign-up/signup_agreement.php">약관보기</a></button>
            </div>

            <div class="auto_option">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="auto_option_radio3">
                <label class="form-check-label" for="auto_option_radio3">
                    카페 토성 이용약관 (필수)
                </label>
                <button type="button" class="link"><a
                            href="https://dongdong-24.shop/KAU/users/sign-up/signup_agreement.php">약관보기</a></button>
            </div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
            <input class="btn btn-primary" type="submit" value="회원가입">
        </div>
    </form>

</section>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

<script>
    function checkid() {
        var userid = document.register.id.value;
        if (userid) {
            url = "check_id_duplicate.php?userid=" + userid;
            window.open(url, "checkID", "width=300,height=100");
        } else {
            alert("아이디를 입력하세요");
        }
    }
</script>

<script>
    function checknick() {
        var usernick = document.register.nickname.value;
        if (usernick) {
            url = "check_nickname_duplicate.php?usernick=" + usernick;
            window.open(url, "checkNick", "width=300,height=100");
        } else {
            alert("닉네임을 입력하세요");
        }
    }


</script>

</body>
</html>