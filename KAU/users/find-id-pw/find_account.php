<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/find_account.css">
    <title>회원 정보 찾기</title>

</head>
<body>
<section class="signup">
    <div class="goBack">

    </div>

    <!--로그인 로고-->
    <div class="find_account_title">
        <Strong>카페 토성</Strong>
    </div>

    <!--  아이디 비밀번호 찾기 탭바 메뉴 -->
    <!--    <div class="select_tab">-->
    <!--        <ul class="nav nav-tabs">-->
    <!--            <li class="nav-item">-->
    <!--                <a class="nav-link active" aria-current="page" href="#">ID 찾기</a>-->
    <!--            </li>-->
    <!--            <li class="nav-item">-->
    <!--                <a class="nav-link" href="#">PW 찾기</a>-->
    <!--            </li>-->
    <!--        </ul>-->
    <!--    </div>-->

    <!-- 회원 정보 찾는 부분 -->
    <div class="find_account">


        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">아이디 찾기
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">비밀번호 찾기
                </button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="find_id">

                    <div class="name">
                        <!--input id에 대해 label을 적용합니다.-->
                        <label for="name_input" class="form-label">Name</label>
                        <input type="email" class="form-control" id="name_input" placeholder="이름">
                    </div>

                    <div class="email">
                        <!--input id에 대해 label을 적용합니다.-->
                        <label for="email_input" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email_input" placeholder="name@example.com">
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="button">아이디 찾기</button>
                    </div>

                </div>

            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="find_pw">

                    <div class="Id">
                        <label for="id_input" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id_input" placeholder="아이디">
                    </div>

                    <div class="name">
                        <!--input id에 대해 label을 적용합니다.-->
                        <label for="name_input" class="form-label">Name</label>
                        <input type="email" class="form-control" id="name_input" placeholder="이름">
                    </div>

                    <div class="email">
                        <!--input id에 대해 label을 적용합니다.-->
                        <label for="email_input" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email_input" placeholder="name@example.com">
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="button">비밀번호 찾기</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>


</body>
</html>