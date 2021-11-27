<?php include $_SERVER['DOCUMENT_ROOT'] . "/KAU/base/connect_db.php"; ?>

<?php
session_start();

function Decrypt($str, $secret_key = 'secret key', $secret_iv = 'secret iv')

{

    $key = hash('sha256', $secret_key);

    $iv = substr(hash('sha256', $secret_iv), 0, 32);

    return openssl_decrypt(

        base64_decode($str), "AES-256-CBC", $key, 0, $iv

    );

}

$encrypted = $_COOKIE['user_id'];

$secret_key = "123456789";

$secret_iv = "#@$%^&*()_+=-";

$decrypted = Decrypt($encrypted, $secret_key, $secret_iv);

?>

<nav class="my-navbar">
    <ul class="my-navbar_menu">
        <li><a href="https://dongdong-24.shop/KAU/cafe-info/cafe_info.php">카페 정보</a></li>
        <li><a href="https://dongdong-24.shop/KAU/menus/menu-list/menu_list.php">메뉴</a></li>
        <li><a href="https://dongdong-24.shop/KAU/community/post-list/Community.php">커뮤니티</a></li>
    </ul>

    <div class="my-navbar_logo">
        <i class="fas fa-coffee"></i>
        <a href="https://dongdong-24.shop/KAU/main-page/main_page.php">카페 토성</a>
    </div>

    <ul class="my-navbar_icons">
        <li><a href="#" onclick="window.open('https://www.instagram.com/tosung_village/')"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fas fa-share-alt-square"></i></a></li>
        <script>
            var my_nickname = "<?php echo $_POST['nickname']; ?>";
            var my_id = "<?php echo $_POST['id']; ?>";
            var url = "https://dongdong-24.shop/KAU//users/mypage/check-my-profile.php";
            var show_my_profile = {id:my_id, nickname: my_nickname};
        </script>

        <?php

//        자동로그인 상태면, 쿠키에서 복호화시킨 값을 아이디로 갖는다.
        if(isset($_COOKIE['user_id'])) {
            $_SESSION['user_id'] =  $decrypted;
            $nickname = $_SESSION['user_id'];
            $get_info = mq( "SELECT nickname FROM kau_web_project.User WHERE id = '".$_SESSION['user_id']."' ");

            $row_info =  $get_info->fetch_array();
            $user_name = $row_info['nickname'];
        }

//자동로그인이 아닌 상황이라면, 세션에 있는 아이디를 사용한다.
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            if(!isset($_COOKIE['user_id'])) {
                $user_name = $_SESSION['user_name'];
            }
            echo '
                    <div class="logined_profile">
                        <div class="helloUser">' .$user_name. '님 환영합니다.</div>
                        <div class="outAndUpdate">
                     
                            <a href="https://dongdong-24.shop/KAU/users/mypage/check-my-profile.php">내 정보</a> |
                            <a href="https://dongdong-24.shop/KAU/users/sign-out/logout.php">로그아웃</a>  
                        </div>
                    </div>';
        } else {
            echo '<li><a href="https://dongdong-24.shop/KAU/users/sign-in/login.php"><i class="fas fa-sign-in-alt"></i></a></li>';
        }
        ?>
    </ul>

    <a href="#" class="my-navbar_toggleBtn">
        <i class="fas fa-bars"></i>
    </a>
</nav>
