//Start Of sidebar Code

function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";}
    

//End Of sidebar Code

//dropwdown menu
var btn=document.getElementsByClassName("dropbtn");
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    
  }
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');

        }
      }
    }
  }
//dropdown menu

let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 7000); // Change image every 2 seconds
}

function search() {
  var input, filter, ul, li, i;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
      var brand = li[i].querySelector("#brand");
      if (brand && brand.textContent.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
      } else {
          li[i].style.display = "none";
      }
  }
}

var visitorCount = 1;
var targetCount = (Math.floor(Math.random() * 100000))+1;
var counterElement = document.getElementById("visitor-count");
counterElement.innerText = "0";

function incrementCounter() {
  if (visitorCount <= targetCount) {
    visitorCount += Math.floor(Math.random() * 5000);
    if (visitorCount > targetCount) {
      visitorCount = targetCount;
    }
    counterElement.innerText = visitorCount.toLocaleString();
    requestAnimationFrame(incrementCounter);
  }
}

var options = {
  root: null,
  rootMargin: "0px",
  threshold: 0.5
};

var observer = new IntersectionObserver(function(entries) {
  entries.forEach(function(entry) {
    if (entry.isIntersecting) {
      incrementCounter();
      observer.unobserve(entry.target);
    }
  });
}, options);

observer.observe(document.getElementById("footer"));
