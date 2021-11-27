<!--링크통해 post 방식으로 정보 넘기기-->
<script>
    var my_name = "<?php echo $_POST['nickname']; ?>";
    var url = "http://192.168.56.1/front_end/html/login/check-my-profile.php";
    var show_my_profile = {who: my_name};
</script>

<?php
if ($_POST["logined"]) {
    $nickname = $_POST['nickname'];
//            a 링크 태그에 post 넣기
    echo '
                    <div class="logined_profile">
                        <div class="helloUser">' . $_POST['nickname'] . '님 환영합니다.</div>
                        <div class="outAndUpdate">
                     
                            <a href="javascript:void(0);" onclick="post_to_url(url,show_my_profile);">내 정보</a> |
                            <a href="http://192.168.56.1/front_end/html/cafe/main_page.php">로그아웃</a>  
                        </div>
                    </div>';
} else {
    echo '<li><a href="http://192.168.56.1/front_end/html/login/login.php"><i class="fas fa-sign-in-alt"></i></a></li>';
}
?>

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

<!--2.input text 없이도, 정보를 전송할 수 있게 해주는 구조-->
<!--<th scope="row">ID</th>-->
<!--           colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
<!--<td>-->
<!--    <input type="hidden" class="form-control" name="id"-->
<!--           value="--><?//= $id ?><!--">-->
<!--    --><?//= $id ?>
<!--</td>-->
