// JavaScript Document

function sizeValidate()
{
	var name=document.getElementById("name").value;
	var email=document.getElementById("email").value;
	var comment=document.getElementById("comment").value;
	
	if((name.length>50||email.length>250) || comment.length>500)
		{
			event.preventDefault();
			alert("Make it Small");
		}
	else
		{
			alert("done");
		}
}



var slideIndex = 0;
function showSlides() {
	
    var i;
    var slides = document.getElementsByClassName("mySlides");
   // var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
   if (slideIndex > slides.length) {slideIndex = 1}    
  /*  for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }*/
    slides[slideIndex-1].style.display = "block";  
  // dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 4000); 
}

