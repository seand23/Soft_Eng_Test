//when the user scrolls the page execute stickyNavbar
window.onscroll = function() {stickyNavbar()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

//add the sticky class to the navbar when you reach its scroll position 
//remove sticky when you leave the scroll position
function stickyNavbar() {
  if (window.scrollY >= sticky) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}

//p.s IT DOESNT WORK -SD