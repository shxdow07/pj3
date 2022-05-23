
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', carregarDades2)
    document.addEventListener('DOMContentLoaded', ready)
    
    
} else {
    carregarDades2()
    ready()
}

function ready() {


    
    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToCartButtons = document.getElementsByClassName('producte-button')
    console.log(addToCartButtons.length)
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        console.log(button)
        button.addEventListener('click', addToCartClicked)
    }

    const element = document.getElementById("buidarcarrito");
     element.addEventListener("click", esborrarDades);
    //document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
}


function quantityChanged(event) {
    var input = event.target
    console.log(input)
    input.setAttribute('value', input.value)
    //document.getElementById("cart-quantity-input").value = input.value;
    //console.log( document.getElementById("cart-quantity-input").value)
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
        input.setAttribute('value', input.value)
    }
    var cartItems = document.getElementsByClassName('Cart-Items')[0]
    localStorage.setItem("carro2", cartItems.innerHTML);
    console.log(cartItems.innerHTML);
    updateCartTotal()
}

function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    //console.log(buttonClicked)
    //console.log(buttonClicked.parentElement.parentElement)
    var cartItems = document.getElementsByClassName('productes_carr')[0]
    localStorage.setItem("carro2", cartItems.innerHTML);
    console.log(cartItems.innerHTML);
    
    carregarDades2()
    updateCartTotal()
}


function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('productes_carr')[0]
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
    document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total
    
}

function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement
    var marca = shopItem.getElementsByClassName('producte-marca')[0].innerText
    var model = shopItem.getElementsByClassName('producte-model')[0].innerText
    var preu = shopItem.getElementsByClassName('producte-preu')[0].innerText
    var imageSrc = shopItem.getElementsByClassName('producte-imatge')[0].src
    //var cantitat2=0
    localStorage.setItem('cantitat', 1)
    var cantitat = localStorage.getItem('cantitat')
    console.log(shopItem)
    addItemToCart(shopItem, marca, model, preu, imageSrc, cantitat)
    carregarDades2(cantitat)
    updateCartTotal()
}


function addItemToCart(shopItem, marca, model, preu, imageSrc, cantitat) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('productes_carro')
    var cartItems = document.getElementsByClassName('Cart-Items')[0]
    var cartItemNames = cartItems.getElementsByClassName('subtitle')

    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == model) {
            cartItems.getElementsByClassName('cart-quantity-input')[i].value = ++cartItems.getElementsByClassName('cart-quantity-input')[i].value;
            var input = document.getElementsByClassName('cart-quantity-input')[i]
            input.setAttribute('value', cartItems.getElementsByClassName('cart-quantity-input')[i].value)
            console.log(cartItems.getElementsByClassName('cart-quantity-input')[i])
            var cartItems = document.getElementsByClassName('Cart-Items')[0]
            localStorage.setItem("carro2", cartItems.innerHTML);
            return
        }
    }
    
    var cartRowContents = `
        
        <div class="image-box">
                  <img src="${imageSrc}"  style=" height: 120px;" />
              </div>
              <div class="about">
                  <h1 class="title">${marca}</h1>
                  <h3 class="subtitle">${model}</h3>
                  <img src="${imageSrc}"  style=" height: 30px;"/>
              </div>
              <div class="counter">
                  <div class="btn">+</div>
                  <div class="count">2</div>
                  <div class="btn">-</div>
              </div>
              <div class="prices">
                  <div class="amount">${preu}</div>
                  <div class="save"><u>Save for later</u></div>
                  <div class="remove"><u>Remove</u></div>
              </div>`
    cartRow.innerHTML += cartRowContents
    cartItems.append(cartRow)
    console.log(cartItems.innerHTML)
    cartRow.getElementsByClassName('remove')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
    localStorage.setItem("carro2", cartItems.innerHTML);
    //console.log(cartItemNames)
    console.log(localStorage.getItem("carro2"));
    
}



function carregarDades2(cantitat){
    //console.log(cantitat)
    //localStorage.clear()
    var cartRow = document.getElementsByClassName('productes_carro')
    //console.log(cartRow)
    //cartRow.classList.add('productes_carro')
    var cartItems = document.getElementsByClassName('Cart-Items')[0]
    var quantitat = document.getElementsByClassName('cart-quantity-input')
    quantitat.value = localStorage.getItem('cantitat')
    console.log(quantitat.value)
    //var cartItemNames = cartItems.getElementsByClassName('subtitle')
    var cartRowContents = localStorage.getItem('carro2')
    //console.log(localStorage.getItem('carro2'))
    cartItems.innerHTML = cartRowContents
    //cartItems.append(cartRow)
    //console.log(cartRow.innerHTML)
    //console.log(cartRow.length)
    for(i = 0; i < cartRow.length; i++){
    cartItems.getElementsByClassName('remove')[i].addEventListener('click', removeCartItem)
    cartItems.getElementsByClassName('cart-quantity-input')[i].addEventListener('change', quantityChanged)
    
    localStorage.setItem("carro2", cartItems.innerHTML);
    updateCartTotal()}
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