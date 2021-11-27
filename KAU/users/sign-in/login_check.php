<!-- 많이쓰는 함수 js파일 (제일 위 <?php ?>영역 밖에 입력 )-->
<script>
    //4.Post방식으로 데이터 넘겨주기
    //-함수의 입력값에 배열을 넣어서 배열에 post로 보낼 값(key : value)을 담는다.
    //함수 예시) post_to_url("/sports_shop/web_page/additempage.php", {'edit': 1,'id':""})
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
    }</script>;

<?php


function Encrypt($str, $secret_key = 'secret key', $secret_iv = 'secret iv')

{

    $key = hash('sha256', $secret_key);

    $iv = substr(hash('sha256', $secret_iv), 0, 32);

    return str_replace("=", "", base64_encode(

            openssl_encrypt($str, "AES-256-CBC", $key, 0, $iv))

    );

}

?>

<?php
///////MYSQL 연결///////
$conn = mysqli_connect("dongdong-db.ctrzurlhmfdw.ap-northeast-2.rds.amazonaws.com", "admin", 'tpwnd2315!');
mysqli_select_db($conn, 'kau_web_project');
$result = mysqli_query($conn, 'SELECT * FROM kau_web_project.User');


$id = $_POST["login_id"];
$pw = $_POST["login_pw"];
$auto_login = $_POST['auto_login'];

$get_info = mysqli_query($conn, "SELECT * FROM kau_web_project.User WHERE id = '".$id."' ");

$row_info = mysqli_fetch_assoc($get_info);


?>

<script>
    var login_nickname = "<?php echo $row_info['nickname']; ?>";
    var login_id = "<?php echo $row_info['id']; ?>";
</script>

<?php
if ($_POST["login_id"] == "" || $_POST["login_pw"] == "") {
    echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
    return;
}
while ($row = mysqli_fetch_assoc($result)) {

    if ($row['id'] == $_POST["login_id"] && $row['pw'] == $_POST["login_pw"]) {
        session_start();
        $_SESSION['user_id'] = $_POST["login_id"];
        $_SESSION['user_pw'] = $_POST["login_pw"];
        $_SESSION['user_name'] = $row_info['nickname'];


//        복호화 가능한 암호화
        $str =  $_SESSION['user_id'];

        $secret_key = "123456789";

        $secret_iv = "#@$%^&*()_+=-";

        $encrypted = Encrypt($str, $secret_key, $secret_iv);

        if(isset($auto_login)){
//            쿠키에 자동로그인 설정
            setcookie("user_id",$encrypted,(time()+3600*24*30),"/");
        }

        echo '<script> alert("로그인에 성공하였습니다."); var login_info = {id: login_id, nickname: login_nickname, logined: "true"}; post_to_url("https://dongdong-24.shop/KAU/main-page/main_page.php",login_info); </script>';
    }
}

if ($row['id'] != $_POST["login_id"] || $row['pw'] != $_POST["login_pw"]) {
    echo '<script> alert("아이디, 비밀번호를 확인해주세요."); history.back(); </script>';

}
?>







