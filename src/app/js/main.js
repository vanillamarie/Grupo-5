$(document).ready(function(){
	var altura = $('.menu').offset().top;
	
	//Si la ventana baja de la parte superior de la página hace que el menu se vuelva fijo
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('.menu').addClass('menu-fixed');
		} else {
			$('.menu').removeClass('menu-fixed');
		}
	});

});

/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function myFunction() {
	var x = document.getElementById("myLinks");
	if (x.style.display === "block") {
	  x.style.display = "none";
	} else {
	  x.style.display = "block";
	}
  }

