<?php

///데이터베이스 연결.////
$conn = mysqli_connect("dongdong-db.ctrzurlhmfdw.ap-northeast-2.rds.amazonaws.com", "admin", 'tpwnd2315!');
mysqli_select_db($conn, 'kau_web_project');


//회원가입 조건 충족 못하면,
if ($_POST["id"] == "" || $_POST["pw"] == "" || $_POST["name"] == "" || $_POST["nickname"] == "" || $_POST["email"] == "") {
    echo '<script> alert("필수 정보를 모두 입력해주세요"); history.back(); </script>';
    return;
} else if ($_POST["pw"] != $_POST["pw_conf"]) {
    echo '<script> alert("비밀번호가 일치하지 않습니다."); history.back(); </script>';
    return;
} else {
    echo '<script> alert("회원가입을 완료했습니다."); location.href="https://dongdong-24.shop/KAU/main-page/main_page.php"; </script>';

    //닉네임 입력 안하면, 이름을 닉네임으로, 데이터 베이스 저장 (중복되지 않을 임의 값을 닉네임으로 주는 것도 생각할 것.) ///////
    $sql = "INSERT INTO kau_web_project.User  (name, email, nickname, id, pw) VALUES( '{$_POST['name']}', '{$_POST['email']}','{$_POST['nickname']}','{$_POST['id']}','{$_POST['pw']}')";


    $result = mysqli_query($conn, $sql);

    $conn->close();
}








