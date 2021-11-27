var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    // 3번 사진에서 1번사진으로 넘겨줌. 0번 사진으로가면, 3번으로 넘어감.
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    //내가 보는 사진 아닌 사진들은, 안보여야 함.
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    //내가 보는 사진의 위치가 아닌 점들은 비활성화 되어야 함.
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    //내 위치에 존재하는 사진들을 보여주고 점을 활성화 시킴
    // 배열이기 때문에 위치 -1 로 현 위치를 표현.
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}