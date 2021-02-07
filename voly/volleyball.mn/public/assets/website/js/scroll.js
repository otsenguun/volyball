// Start Scroll Top

//Get the button
var mybutton = document.getElementById("scrollTopp");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTopp > 20 || document.documentElement.scrollTopp > 20) {
    // mybutton.style.display = "block";
    mybutton.style.display = "none !important";
  } else {
    mybutton.style.display = "none !important";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

// End Scroll Top