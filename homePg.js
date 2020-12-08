var slideIndex = 0;
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

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var d = document.getElementsByClassName("dot");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
        d[i].className = d[i].className.replace(" active", "");
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}
    x[slideIndex-1].style.display = "block";
    d[slideIndex-1].className += " active";
  setTimeout(carousel, 5000); // Change image every 2 seconds
}

$(function(){
    
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            console.log("Server ready");
            $(".container").empty();
            var xmlDoc = xmlHttp.responseXML;
            console.dir(xmlDoc);
            var photos = xmlDoc.getElementsByTagName("photo");
            console.dir(photos);
            var PicOutput = "";
            var DotOutput = "";
            var counter = 1;
            for(var i = 0; i < photos.length; i++){
                PicOutput += 
                    "<div class='mySlides fade'><div class='numbertext'>"+counter+"/"+photos.length+"</div><img src="+photos[i].children[0].innerHTML+" style='width:100%'><div class='text'>"+photos[i].children[1].innerHTML+"</div></div>";
                DotOutput += "<span class='dot' onclick='currentSlide("+counter+")'></span>";
                ++counter;
            }
            PicOutput += "<a class='prev' onclick='plusSlides(-1)'>&#10094;</a><a class='next' onclick='plusSlides(1)'>&#10095;</a>";
            
            console.log(PicOutput);
            console.log(DotOutput);
            var slideshow = document.getElementById('slideshow');
            slideshow.innerHTML = PicOutput;
            var dotCont = document.getElementById('dotContainer');
            dotCont.innerHTML = DotOutput;
            carousel();
        }
    }
    /* Add the loader class */
    $(".slideshow").append('<div class="loader"></div>');
    
    xmlHttp.open("GET", "http://ec2-18-212-175-179.compute-1.amazonaws.com/CyberTigers/openingSlideshow/photos.xml", true);
    xmlHttp.send();
});