
if (document.readyState == 'loading') {
    
    console.log(localStorage.getItem("carro2"));
    document.addEventListener('DOMContentLoaded', carregarDades2)

    
} else {
    carregarDades2()
    ready()
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

function updateCartTotal2() {
    var cartItemContainer2 = document.getElementsByClassName('productes_carr')[0]
    var cartRows2 = cartItemContainer2.getElementsByClassName('productes_carro3')
    var total2 = 0
    for (var i = 0; i < cartRows2.length; i++) {
        var cartRow2 = cartRows2[i]
        var priceElement2 = cartRow2.getElementsByClassName('cart-preu')[0]
        var quantityElement2 = cartRow2.getElementsByClassName('cart-quantity-input')[0]
        var price2 = parseFloat(priceElement2.innerText.replace('$', ''))
        var quantity2 = quantityElement2.value
        
        total2 = total2 + (price2 * quantity2)
    }
    total2 = Math.round(total2 * 100) / 100
    document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total2
    
}







function carregarDades2(cantitat){
    
    updateCartTotal2()
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
    console.log(productes2)
    updateCartTotal()
}
    document.getElementById("unitats2").innerHTML = `${productes} Productes`;

    var cartItems = document.getElementsByClassName('productes_carr')[0]
    var cartRows2 = cartItems.getElementsByClassName('productes_carro3')
    var productes2 = 0;
    for(i = 0; i < cartRows2.length; i++){
        productes2 = productes2 + +cartItems.getElementsByClassName('cart-quantity-input')[i].value;
    }
    document.getElementById("unitats").innerHTML = `${productes2} Productes`; 
    
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
    adeu();
  
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

// function ready() {
//     localStorage.setItem('producte', "null")
//     // var x = document.getElementById(`dades2`);
//     //   x.style.visibility = "hidden";
//     // x.style.opacity = "0";
//     var addToCartButtons = document.getElementsByClassName('btn-danger2')
//     console.log(addToCartButtons.length)
//     for (var i = 0; i < addToCartButtons.length; i++) {
//         var button = addToCartButtons[i]
//         console.log(button)
//         button.addEventListener('click', removeCartItem2)
//     }

// }
// function removeCartItem2(event) {
//     var buttonClicked = event.target
//     if(buttonClicked.className=="icon-cross" && buttonClicked.parentElement.parentElement.parentElement.parentElement.className=="productes_carr"){
       
//          var si = document.getElementById(buttonClicked.parentElement.parentElement.parentElement.id)
//          var item = si.getElementsByClassName('cart-item-model')[0].innerHTML
//          buttonClicked.parentElement.parentElement.parentElement.remove()
//         updateCartTotal2()
//         localStorage.setItem('producte', item)
//         window.location.href="cursos.php";
//         // producte(item)
//         //var cartItems = document.getElementsByClassName('productes_carr')[0]
//         // var cartItems = document.getElementsByClassName('productes_carr')[0]
  
        
        
//     }else if(buttonClicked.className=="btn-danger2" && buttonClicked.parentElement.parentElement.parentElement.className=="productes_carr"){
//         var si = document.getElementById(buttonClicked.parentElement.parentElement.id)
//         var item = si.getElementsByClassName('cart-item-model')[0].innerHTML
//         buttonClicked.parentElement.parentElement.remove()
//         updateCartTotal2()
//         localStorage.setItem('producte', item)
//         window.location.href="cursos.php";
//         // var cartItems = document.getElementsByClassName('productes_carr')[0]
//         // producte(item)
//         //var cartItems = document.getElementsByClassName('productes_carr')[0]
        
//     }

   
// } 

// function producte(item){
//     var item2 = item;
//     localStorage.setItem('producte', item2)
//     console.log(item2);
//     console.log(localStorage.getItem('producte'))
   
// }

function waitForLocalStorage(key, cb, timer) {
	if ( ! localStorage.getItem( key ) ) {
		return timer = setTimeout(
			waitForLocalStorage.bind( null, key, cb ),
			100
		)
	}
	clearTimeout( timer )
	if ( typeof cb !== 'function' ) {
		return localStorage.getItem( key )
	}
	return cb( localStorage.getItem( key ) )
}