var slideIndex = 1;
//call show slides for the first slide
//showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
    console.log("showSlides called");
    var i;
    //Acess the slides and call them "slides"
    var slides = document.getElementsByClassName("mySlides");
    //Access the dots and call them "dots"
    var dots = document.getElementsByClassName("dot");
    //After the last slide, go back to the begining
    if (n > slides.length) {slideIndex = 1}
    //Before the first slide, go to the end
    if (n < 1) {slideIndex = slides.length}
    //hide all slides
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    //remove the "active" class from all dots
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    //show slide n
    slides[slideIndex-1].style.display = "block";
    console.log(n);
    //mark dot n as "active"
    dots[slideIndex-1].className += " active";
}