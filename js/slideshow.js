var slideIndex = 0;
var timechange = 2000;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("slideEduvin");
    for ( i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}
    x[slideIndex-1].style.display = "block";
    setTimeout(carousel, timechange);
}