
//js breakpoint navbar
const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('nav ul');

menuToggle.addEventListener('click', function(){
    nav.classList.toggle('slide');
})

// js active page
var header = document.getElementById('ul');
var page = header.getElementsByClassName('activepage');
for (var i = 0; i < page.length; i++) {
    page[i].addEventListener('click', function() {
  var current = document.getElementsByClassName('active');
  current[0].className = current[0].className.replace(' active', '');
  this.className += ' active';
  });
}
// js menu profile

        // var main = document.querySelector(".main");

        // main.addEventListener("click", function() {
        //     this.classList.toggle("active");
        // })

