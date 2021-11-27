<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>회원 정보 수정</title>
    <?php
    include $_SERVER['DOCUMENT_ROOT']."/KAU/base/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="/KAU/base/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="css/modify-my-profile.css">
    <script src="/KAU/base/nav_bar/my-nav-bar-bootstrap.js" defer></script>
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/KAU/base/nav_bar/my-navbar-bootstrap.php"
?>

<?php
//수정하러 들어갔을 때 처음 보이게 되는 값
$id = $_POST['id'];
$pw = $_POST['pw'];
$name = $_POST['name'];
$nickname = $_POST['nickname'];
$email = $_POST['email'];

//만약, 버튼이 눌리면, 입력되어 있는 값 그대로 DB로 직행함.
?>

<section class="check-my-profile-section">

    <script>
        var my_id = "<?php echo $id; ?>";
        var my_pw = "<?php echo $pw; ?>";
        var my_name = "<?php echo $name; ?>";
        var my_nickname = "<?php echo $nickname; ?>";
        var my_email = "<?php echo $email; ?>";
        var url = "https://dongdong-24.shop/KAU/users/mypage-modify/modify_register-my-profile.php";
        var show_my_profile = {id: my_id, pw: my_pw, name: my_name, nickname: my_nickname, email: my_email};
    </script>



    <!--    class : table은 테두리 만들어주는 친구 / striped 줄마다 색 다르게 / table-hover - 마우스 위에 있을 때 반응! -->
    <!--    있다가 게시판 만들 때는 striped 옵션 꺼야 해요!-->

    <form name="register" action="modify_register-my-profile.php" method="post" class="signup-form">

        <div class="check-my-profile-title">
            <h1 class="title">내 회원정보 <span>수정</span></h1>
            <input  type="submit" class="modify-my-profile-btn btn btn-outline-secondary btn-sm" value="수정 정보 저장">
        </div>

        <table class="check-my-profile-table table table-striped table-hover">

            <!--    colgroup 태그는 표의 열을 묶는 역할을 수행한다. 인덱스 / 정보1 /정보2 등등 묶어서 스타일 지정하는데 쓴다.-->
            <colgroup>
                <col span="1" class="my-profile-info-index">
                <col span="1" class="my-profile-info-value">
                <col span="1" class="my-profile-info-mf-btn">
            </colgroup>

            <!--    thead (table head) 태그는 표의 열 인덱스 값을 지정할 것이라고 선언하는데 사용합니다., 박스의 역할임-->
            <!--    thead 안에 tr(table row element)가 들어가는데, 셀의 행을 정의하는 역할을 수행합니다. td와 th을 섞어 쓰면서 내용을 채웁니다.-->
            <!--    th는 tr안에 들어갑니다. 행과 열의 인덱스 값을 채워 넣는데 사용됩니다. scope="col or row"를 통해 행요소인지, 열 요소인지 지정합니다.-->
            <!--    td는 행 열 인덱스를 제외한 나머지 부분에 값을 채워 놓는데 사용합니다.-->

            <tbody>

            <tr class="my-info-img" id="profile-image-area">
                <th scope="row">사진 변경</th>
                <td>

                    <img src="../img/유저-기본이미지.png" class="my-profile-image" alt="사진이 없습니다." width="80">

                    <div class="mb-3">
                        <!--기본 이미지가 들어갈 공간-->

                        <input class="form-control form-control-sm" id="formFileSm" type="file">

                        <button type="button" class="btn btn-outline-secondary btn-sm">기본 이미지로 변경</button>
                    </div>

                </td>
            </tr>

            <tr>
                <th scope="row">ID</th>
                <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
                <td>
                    <input type="hidden" class="form-control" name="id"
                           value="<?= $id ?>">
                    <?= $id ?>
                </td>
            </tr>

            <tr>
                <th scope="row">PW 변경</th>

                <td>
                    <table class="table modify-my-pw-table">
                        <tr>
                            <!--                        <th>-->
                            <!--                            현재 비밀번호-->
                            <!--                        </th>-->
                            <td>
                                <input type="hidden" name="origin_pw" value="<?= $pw ?>">
                                <input type="password" class="form-control current-pw" name="current-pw"
                                       placeholder="현재 비밀번호">
                                <button type="button" class="btn btn-outline-secondary btn-sm">비밀번호 변경</button>
                            </td>
                        </tr>
                        <tr>
                            <!--                        <th>-->
                            <!--                            새 비밀번호-->
                            <!--                        </th>-->
                            <td>
                                <input type="password" class="form-control new-pw" name="new-pw"
                                       placeholder="새 비밀번호 (8자 이상,영문,숫자 사용 가능)">
                            </td>
                        </tr>
                        <tr>
                            <!--                        <th>-->
                            <!--                            비밀번호 다시 입력-->
                            <!--                        </th>-->
                            <td>
                                <input type="password" class="form-control new-pw-confirm" name="new-pw-conf" placeholder="비밀번호 다시 입력">
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>

            <tr>
                <th scope="row">이름 변경</th>
                <td>
                    <input type="text" class="form-control mf-name" placeholder="이름" name="name" value=<?= $name ?>>
                </td>
            </tr>

            <tr>
                <th scope="row">닉네임 변경</th>
                <td>
                    <input type="text" class="form-control mf-nickname" placeholder="새 닉네임 (6-12자 이내,영문,숫자 사용 가능)"
                           name="nickname" value=<?= $nickname ?>>
                    <button type="button" class="btn btn-outline-secondary btn-sm">중복 확인</button>
                </td>
            </tr>

            <tr>
                <th scope="row">이메일</th>
                <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
                <td>
                    <input type="text" class="form-control mf-email" placeholder="새 이메일" name="email"
                           value=<?= $email ?>>
                    <button type="button" class="btn btn-outline-secondary btn-sm">이메일 인증</button>
                </td>
            </tr>

            </tbody>
        </table>
    </form>


    <!--    비밀번호 변경할 때 쓰는 양식입니다.-->


</section>

</body>
</html>

<script>
    function post_to_url(path, params, method) {
        //1)get, post 설정
        method = method || "post";
        //2)post를 보내기 위한 form 태그 생성
        var form = document.createElement("form");
        //3)form 태그 속성 설정
        //  -method 방식 설정
        //  -action: 경로 설정
        form.setAttribute("method", method);
        form.setAttribute("action", path);

        //4)post로 보낼 데이터 배열의 갯수 만큼 반복
        for (var key in params) {
            //5)값을 담을 input태그 생성
            var hiddenField = document.createElement("input");
            //6)인풋 태그 속성 설정
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key); //키
            hiddenField.setAttribute("value", params[key]); //value
            //form 태그에 input태그를 넣는다.
            form.appendChild(hiddenField);
        }
        //7)전체 boby에 form태그를 넣는다.
        document.body.appendChild(form);
        //8)post로 값 보내기
        form.submit();
    }


</script>
