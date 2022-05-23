


  function placeholderActive() {
    var el = document.querySelector('.controls');
    if (el.getAttribute('placeholder') && el.value === '') {
      return true;
    }
    return false;
  }
  

var amagarr2;

function mostrar(){
    
    clearTimeout(amagarr2);
    var x = document.getElementById(`dades2`);
    adeu3();
    
     
      x.style.right = "10px";
      x.style.transition = "all .3s linear";
      
}

function amagar(){
     amagarr2 = setTimeout(adeu, 1500);

}


function adeu(){
    var x = document.getElementById(`dades2`);
            x.style.right = "-1000px";
            x.style.transition = "all .3s linear";
}


var amagar3;
var amagar4;
function mostrar2(){
    adeu();
    var a = placeholderActive('DNI');
    var b = placeholderActive('Contrassenya');
    var ignoreClickOnMeElement = document.getElementById('login');
    var isClickInsideElement;
    document.addEventListener('click', function(event) {
    isClickInsideElement = ignoreClickOnMeElement.contains(event.target);
    if (isClickInsideElement && (a || b)==false) {
        clearTimeout(amagar3);
    }else if(!isClickInsideElement && (a || b)==false){
        amagar3 = setTimeout(adeu2, 1500);
      }

})  

    clearTimeout(amagar3);
    clearTimeout(amagar4);
    var x = document.getElementById(`login`);
    
  
      x.style.right = "50px";
      x.style.transition = "all .3s linear";
      
}

function amagar2(){
    var a = placeholderActive('DNI');
    var b = placeholderActive('Contrassenya');
    if ((a || b)==false) {
        clearTimeout(amagar3);
    }else{
     amagar3 = setTimeout(adeu2, 1500);
    }  
}

function adeu2(){
    document.querySelector('.controls').value = '';
    document.querySelector('.controls2').value = '';
    var x = document.getElementById(`login`);
            x.style.right = "-1000px";
            x.style.transition = "all .3s linear";
}

function adeu3(){
    var x = document.getElementById(`login`);
            x.style.right = "-1000px";
            x.style.transition = "all .3s linear";
}


function sessio(){
    var x = document.getElementById(`login`);
            x.style.display = "none";
}

function sessio2(){
    var x = document.getElementById(`login`);
            x.style.display = "display";
}

function sessio3(){
    var x = document.getElementById(`perfil`);
            x.style.display = "none";
}

function sessio4(){
    var x = document.getElementById(`perfil`);
            x.style.display = "display";
}

