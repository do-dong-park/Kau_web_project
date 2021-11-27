<script>
    var my_id = "<?php echo $_POST['id']; ?>";
    var modified_info = {id: my_id};

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
        //body라는 태그를 인식 못해서 에러가 발생함.
        document.body.appendChild(form);
        //8)post로 값 보내기
        form.submit();
    }
</script>

<?php
//페이지에서 받은 별명으로부터, 회원정보를 추출하여, 표에 값으로 뿌려줌.
///데이터베이스 연결.////
$conn = mysqli_connect("dongdong-db.ctrzurlhmfdw.ap-northeast-2.rds.amazonaws.com", "admin", 'tpwnd2315!');
mysqli_select_db($conn, 'kau_web_project');

$id = $_POST['id'];
$pw_origin_correct = $_POST['origin_pw'];
$pw_origin = $_POST['current-pw'];
$pw = $_POST['new-pw'];
$pw2 = $_POST['new-pw-conf'];
$name = $_POST['name'];
$nickname = $_POST['nickname'];
$email = $_POST['email'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>


<?php

//회원가입 조건 충족 못하면,
if ($id == "" || $pw_origin == "" || $pw == "" || $pw2 == "" || $name == "" || $nickname == "" || $email == "") {
    echo '<script> alert("수정 정보를 모두 입력해주세요"); history.back(); </script>';
    return;
}else if ($pw_origin_correct != $pw_origin) {
    echo '<script> alert("현재 비밀번호가 일치하지 않습니다."); history.back(); </script>';
    return;
} else if ($pw != $pw2) {
    echo '<script> alert("신규 비밀번호와 재입력 비밀번호가 같지 않습니다."); history.back(); </script>';
    return;
} else if ($pw_origin != $pw) {
    echo '<script> alert("현재 비밀번호와 신규 비밀번호가 동일합니다."); history.back(); </script>';
    return;
} else {
    echo  '<script> post_to_url("http://192.168.56.1/front_end/html/login/check-my-profile.php", {id: my_id}); alert("정보 수정을 완료했습니다."); </script>';

    $query = mysqli_query($conn, "UPDATE kau_web_project.User SET pw= '$pw', name='$name',  nickname='$nickname', email='$email' WHERE id = '$id' ");

    return;
}

?>



