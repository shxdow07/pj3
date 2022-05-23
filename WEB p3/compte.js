
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', carregarDades2)

    
} else {
    carregarDades2()
}


function quantityChanged(event) {
    var input = event.target
    console.log(input.parentElement.parentElement.parentElement)
    input.setAttribute('value', input.value)
    //document.getElementById("cart-quantity-input").value = input.value;
    //console.log( document.getElementById("cart-quantity-input").value)
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
        input.setAttribute('value', input.value)
    }if(input.parentElement.parentElement.parentElement.className=="productes_carr2"){
    var cartItems2 = document.getElementsByClassName('productes_carr2')[0]
    localStorage.setItem("carro2", cartItems2.innerHTML);
    carregarDades2()
    updateCartTotal()
    }
    //console.log(cartItems.innerHTML);
    
}

function removeCartItem(event) {
    var buttonClicked = event.target

    if(buttonClicked.className=="icon-cross" && buttonClicked.parentElement.parentElement.parentElement.parentElement.className=="productes_carr2"){
        console.log(buttonClicked.parentElement.parentElement.parentElement)
        buttonClicked.parentElement.parentElement.parentElement.remove()
        var cartItems2 = document.getElementsByClassName('productes_carr2')[0]
        localStorage.setItem("carro2", cartItems2.innerHTML);
        carregarDades2()
        updateCartTotal()
    }else if(buttonClicked.className=="icon-cross" && buttonClicked.parentElement.parentElement.parentElement.className=="productes_carr2"){
        console.log(buttonClicked.parentElement.parentElement)
        buttonClicked.parentElement.parentElement.remove()
        var cartItems2 = document.getElementsByClassName('productes_carr2')[0]
        localStorage.setItem("carro2", cartItems2.innerHTML);
        carregarDades2()
        updateCartTotal()
    }
    
    
    //console.log(buttonClicked)
   
    
    
    // var cartItems2 = document.getElementsByClassName('productes_carr2')[0]
    // localStorage.setItem("carro2", cartItems2.innerHTML);
    //console.log(cartItems.innerHTML);
    

    updateCartTotal()
}


function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('productes_carr2')[0]
    var cartRows = cartItemContainer.getElementsByClassName('productes_carro')
    var total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-preu')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('$', ''))
        var quantity = quantityElement.value
        
        total = total + (price * quantity)
    }
    total = Math.round(total * 100) / 100
    document.getElementsByClassName('cart-total-price2')[0].innerText = '$' + total
    
}







function carregarDades2(cantitat){
    
const element = document.getElementById("buidarcarrito2");
element.addEventListener("click", esborrarDades);
    // var x = document.getElementById(`dades2`);
    //   x.style.display = "none";
    //   x.style.opacity = "0";
    //console.log(cantitat)
    //localStorage.clear()
 
    var cartRow = document.getElementsByClassName('productes_carro')
    
    var cartItems2 = document.getElementsByClassName('productes_carr2')[0]
    var cartRowContents = localStorage.getItem('carro2')
    cartItems2.innerHTML = cartRowContents

    var productes = 0;
    for(i = 0; i < cartRow.length; i++){
    cartItems2.getElementsByClassName('btn-danger')[i].addEventListener('click', removeCartItem)
    cartItems2.getElementsByClassName('cart-quantity-input')[i].addEventListener('change', quantityChanged)
    
    localStorage.setItem("carro2", cartItems2.innerHTML);
    productes = productes + +cartItems2.getElementsByClassName('cart-quantity-input')[i].value;
    
    console.log(productes)
    updateCartTotal()}
    document.getElementById("unitats2").innerHTML = `${productes} Productes`    
    
    //console.log(cartItemNames)
    //console.log(localStorage.setItem("carro2"));
    
}



function esborrarDades() {
    if(confirm("Estas segur de que vols esborrar les dades?¿"))
      localStorage.clear()
      console.log(localStorage.getItem('carro2'))
      carregarDades2();
      updateCartTotal();
 //     esborrarCamps();
 
  }
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

function canvi(){
    var x = document.getElementById(`contingut`);
    if(x.style.height == "400px"){
        x.style.position ="absolute";
        x.style.cursor ="pointer";
        x.style.fontFamily ="Open Sans";
        x.style.width ="80%";
        x.style.height ="50%";
        x.style.display ="flex";
        x.style.fontSize ="16px";
        x.style.textAlign ="center";
        x.style.alignItems ="center";
        x.style.backgroundColor ="rgba(255, 255, 255, 0.5)";
        x.style.boxShadow ="7px 13px 37px #000";
        x.style.paddingLeft ="10px";
        x.style.paddingRight ="10px";
        x.style.borderRadius ="20px";
        x.style.color ="rgb(0, 0, 0)";

    }else{
        x.style.height ="400px";
        x.style.fontSize ="25px";
    x.style.width = "500px";
    }

    

    
}

function canvi3(){
    var x2 = document.getElementById(`contingut2`);
    if(x2.style.height == "400px"){
        x2.style.position ="absolute";
        x2.style.cursor ="pointer";
        x2.style.fontFamily ="Open Sans";
        x2.style.width ="80%";
        x2.style.height ="50%";
        x2.style.display ="flex";
        x2.style.textAlign ="center";
        x2.style.alignItems ="center";
        x2.style.backgroundColor ="rgba(255, 255, 255, 0.5)";
        x2.style.boxShadow ="7px 13px 37px #000";
        x2.style.paddingLeft ="10px";
        x2.style.paddingRight ="10px";
        x2.style.borderRadius ="20px";
        x2.style.color ="rgb(0, 0, 0)";
        x2.style.fontSize ="16px";

    }else{
        x2.style.height ="400px";
    x2.style.width = "500px";
    x2.style.fontSize ="25px";
    }
}

function canvi4(){
    var x3 = document.getElementById(`contingut3`);
    if(x3.style.height == "400px"){
        x3.style.position ="absolute";
        x3.style.cursor ="pointer";
        x3.style.fontFamily ="Open Sans";
        x3.style.width ="80%";
        x3.style.height ="50%";
        x3.style.display ="flex";
        x3.style.textAlign ="center";
        x3.style.fontSize ="16px";
        x3.style.alignItems ="center";
        x3.style.backgroundColor ="rgba(255, 255, 255, 0.5)";
        x3.style.boxShadow ="7px 13px 37px #000";
        x3.style.paddingLeft ="10px";
        x3.style.paddingRight ="10px";
        x3.style.borderRadius ="20px";
        x3.style.color ="rgb(0, 0, 0)";

    }else{
        x3.style.height ="400px";
    x3.style.width = "500px";
    x3.style.fontSize ="25px";
    }
}

function canvi2(){
    var x = document.getElementById(`contingut`);
        x.style.position ="absolute";
        x.style.cursor ="pointer";
        x.style.fontFamily ="Open Sans";
        x.style.width ="80%";
        x.style.height ="50%";
        x.style.display ="flex";
        x.style.textAlign ="center";
        x.style.alignItems ="center";
        x.style.backgroundColor ="rgba(255, 255, 255, 0.5)";
        x.style.boxShadow ="7px 13px 37px #000";
        x.style.paddingLeft ="10px";
        x.style.paddingRight ="10px";
        x.style.borderRadius ="20px";
        x.style.color ="rgb(0, 0, 0)";
        x.style.fontSize ="16px";
    
        var x2 = document.getElementById(`contingut2`);
        x2.style.position ="absolute";
        x2.style.cursor ="pointer";
        x2.style.fontFamily ="Open Sans";
        x2.style.width ="80%";
        x2.style.height ="50%";
        x2.style.display ="flex";
        x2.style.textAlign ="center";
        x2.style.alignItems ="center";
        x2.style.backgroundColor ="rgba(255, 255, 255, 0.5)";
        x2.style.boxShadow ="7px 13px 37px #000";
        x2.style.paddingLeft ="10px";
        x2.style.paddingRight ="10px";
        x2.style.borderRadius ="20px";
        x2.style.color ="rgb(0, 0, 0)";
        x2.style.fontSize ="16px";

        var x3 = document.getElementById(`contingut3`);
        x3.style.position ="absolute";
        x3.style.cursor ="pointer";
        x3.style.fontFamily ="Open Sans";
        x3.style.width ="80%";
        x3.style.height ="50%";
        x3.style.display ="flex";
        x3.style.textAlign ="center";
        x3.style.alignItems ="center";
        x3.style.backgroundColor ="rgba(255, 255, 255, 0.5)";
        x3.style.boxShadow ="7px 13px 37px #000";
        x3.style.paddingLeft ="10px";
        x3.style.paddingRight ="10px";
        x3.style.borderRadius ="20px";
        x3.style.color ="rgb(0, 0, 0)";
        x3.style.fontSize ="16px";
    
}