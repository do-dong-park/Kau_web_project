<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>회원 정보 조회</title>
    <?php
    include $_SERVER['DOCUMENT_ROOT']."/KAU/base/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="/KAU/base/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="css/check-my-profile.css">
    <script src="/KAU/base/nav_bar/my-nav-bar-bootstrap.js" defer></script>
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/KAU/base/nav_bar/my-navbar-bootstrap.php"
?>

<?php
//페이지에서 받은 별명으로부터, 회원정보를 추출하여, 표에 값으로 뿌려줌.
///데이터베이스 연결.////
$conn = mysqli_connect("dongdong-db.ctrzurlhmfdw.ap-northeast-2.rds.amazonaws.com", "admin", 'tpwnd2315!');
mysqli_select_db($conn, 'kau_web_project');

//post로 받은 id을 조건으로 table로부터, 해당 열을 추출.

session_start();
$id = $_SESSION['user_id'];

$find_my_info = mysqli_query($conn, "SELECT * FROM kau_web_project.User WHERE id = '".$id."' ");

$row_my_info = mysqli_fetch_assoc($find_my_info);
?>

<section class="check-my-profile-section">

    <script>
        var my_id = "<?php echo $row_my_info['id']; ?>";
        var my_pw = "<?php echo $row_my_info['pw']; ?>";
        var my_name = "<?php echo $row_my_info['name']; ?>";
        var my_nickname = "<?php echo $row_my_info['nickname']; ?>";
        var my_email = "<?php echo $row_my_info['email']; ?>";
        var url = "https://dongdong-24.shop/KAU/users/mypage-modify/modify-my-profile.php";
        var show_my_profile = { id: my_id , pw: my_pw , name: my_name, nickname : my_nickname, email: my_email};
    </script>

    <div class="check-my-profile-title">
        <h1 class="title">내 회원정보 <span>확인</span></h1>
        <button class="modify-my-profile-btn btn btn-outline-secondary btn-sm" onclick = post_to_url(url,show_my_profile)>회원 정보 수정</button>
        <button class="modify-my-profile-btn btn btn-outline-secondary btn-sm" onclick ='location.href = "https://dongdong-24.shop/KAU/users/mypost/delete_my_post.php"' >회원 탈퇴</button>
    </div>

    <!--    class : table은 테두리 만들어주는 친구 / striped 줄마다 색 다르게 / table-hover - 마우스 위에 있을 때 반응! -->
    <!--    있다가 게시판 만들 때는 striped 옵션 꺼야 해요!-->

    <table class="check-my-profile-table table table-striped table-hover">

        <!--    colgroup 태그는 표의 열을 묶는 역할을 수행한다. 인덱스 / 정보1 /정보2 등등 묶어서 스타일 지정하는데 쓴다.-->
        <colgroup>
            <col span="1" class="my-profile-info-index">
            <col span="1" class="my-profile-info-value">
        </colgroup>

        <!--    thead (table head) 태그는 표의 열 인덱스 값을 지정할 것이라고 선언하는데 사용합니다., 박스의 역할임-->
        <!--    thead 안에 tr(table row element)가 들어가는데, 셀의 행을 정의하는 역할을 수행합니다. td와 th을 섞어 쓰면서 내용을 채웁니다.-->
        <!--    th는 tr안에 들어갑니다. 행과 열의 인덱스 값을 채워 넣는데 사용됩니다. scope="col or row"를 통해 행요소인지, 열 요소인지 지정합니다.-->
        <!--    td는 행 열 인덱스를 제외한 나머지 부분에 값을 채워 놓는데 사용합니다.-->

        <tbody>

        <tr class="my-info-img" id="profile-image-area">
            <th scope="row">사진</th>
            <td>

                <!--기본 이미지가 들어갈 공간-->
                <img src="../img/유저-기본이미지.png" class="my-profile-image" alt="사진이 없습니다." width="80">

            </td>
        </tr>

        <tr>
            <th scope="row">ID</th>
            <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
            <td><?php echo $row_my_info['id']; ?></td>
        </tr>

        <tr>
            <th scope="row">PW</th>
            <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
            <td>********</td>
        </tr>

        <tr>
            <th scope="row">이름</th>
            <td><?php echo $row_my_info['name']; ?></td>
        </tr>

        <tr>
            <th scope="row">닉네임</th>
            <td><?php echo  $row_my_info['nickname']; ?></td>
        </tr>

        <tr>
            <th scope="row">이메일</th>
            <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
            <td><?php echo $row_my_info['email']; ?></td>
        </tr>

        </tbody>
    </table>


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