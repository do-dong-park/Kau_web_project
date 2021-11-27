/* 많이 사용하는 함수 모음 */

/*1. 페이지 뒤로가기 */
function history_back(message) {
    alert(message);
    history.back();
}

/*2. 페이지 이동 */
function move_page(message, link) {
    alert(message);
    document.location.href = link;
}

//3. 태그 비활성화/활성화
function Tag_disabled(Tag_id, boolean) {
    // 비활성화 하려는 태그의 id를 가져온다
    const target = document.getElementById(Tag_id);
    // 태그의 아이디로 해당 태그 비활성화/활성화
    target.disabled = boolean;
}

//4.Post방식으로 데이터 넘겨주기
//-함수의 입력값에 배열을 넣어서 배열에 post로 보낼 값(key : value)을 담는다.
//함수 예시) post_to_url("/sports_shop/web_page/additempage.php", {'edit': 1,'id':<?=$id?>})
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

/* 5. yes or No  다이얼로그*/
function alert_yes_No(message, yes_link, No_link) {
    //1)yes
    if (confirm(message) == true) {
        //페이지 이동
        document.location.href = yes_link;
    } //2)No
    else {
        document.location.href = No_link;
        return;
    }
}


/* 6.img태그에서 이미지 이름만 불러오는 정규식 함수 */
function get_ImageName(img_url){
    return img_url.replace(/^.*\//, "");
}



