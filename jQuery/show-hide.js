https://www.w3schools.com/howto/howto_js_toggle_hide_show.asp



<button onclick="myFunction()">Click Me</button>

<div id="myDIV">
  This is my DIV element.
</div>



function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

Other options: 

x.style.height = "auto" ;
x.classList.add("open");

In css, set default to closed/hidden/etc