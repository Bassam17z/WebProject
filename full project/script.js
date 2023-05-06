function validateForm() {
  
    const password=document.getElementById("password");
    
    const passwordError=document.getElementById("passwordError");
   
  /*  if (password.value.length<8) {
        passwordError.style.fontSize="18px";
        passwordError.style.fontFamily="sans-serif";
        passwordError.innerText="password should be at least 8 characters";
        return false;
    }
    else if (!/\d/.test(password.value)) {
        passwordError.style.fontSize="18px";
        passwordError.style.fontFamily="sans-serif";
        passwordError.innerText="password should contain at least 1 digit";
    } 
    else 
    {
        passwordError.innerText=" ";
    }
   */
}

function test(){


    alert("worked");
}



var pos = 'left';

function transform() {
  var left = document.getElementById('left');
  var img = document.getElementById('bg-img');

  if (pos == 'left') {
    left.style.transform = 'translate(960px, 0px)';
    img.style.transform = 'translate(-960px, 0px)';
    pos = 'right';
    setTimeout(function() {
        img.setAttribute("src", "images/vitalijus-daukantas-ZuvX5hRqt2I-unsplash.jpg");
    }, 510);
    
  } 
  
  else if (pos == 'right') {
    left.style.transform = 'translate(0px, 0px)';
    img.style.transform = 'translate(0px, 0px)';
    pos = 'left';
    setTimeout(function() {
        img.setAttribute("src", "images/futc-SuQqLL-VUs4-unsplash.jpg");
    }, 500);

  }



}





