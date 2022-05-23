

// document.addEventListener("DOMContentLoaded", iniciar);
// document.addEventListener("DOMContentLoaded", carregarDades);
// document.addEventListener("DOMContentLoaded", unitats);
// function iniciar() {
//     // let btnConsulta = document.getElementById("consulta");
//     // btnConsulta.addEventListener("click", carregarDades);
//     // let btnGuardar = document.getElementById("guardar");
//     // btnGuardar.addEventListener("click", guardarDades);
//     // let btnBorrar = document.getElementById("borrar");
//     // btnBorrar.addEventListener("click", esborrarDades);
//     let btne = document.getElementById("buidar");
//     btne.addEventListener("click", esborrarDades);
//     let btnsComprar = document.querySelectorAll(".comprar");
//     for(i=0;i<btnsComprar.length;i++){
//         btnsComprar[i].addEventListener("click", carregarDades);
//         btnsComprar[i].addEventListener("click", (e)=>{
//         console.log(e.target.parentElement.children[0]),
//         console.log(e.target.parentElement.children[1].innerText),
//         console.log(e.target.parentElement.children[2].innerText),
//         console.log(e.target.parentElement.children[3])
//         console.log(e.target.closest(".producte"))
        
//     })
//     }
// }

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
    var cartItems = document.getElementsByClassName('productes_carr')[0]
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
    var cartRow2 = document.createElement('div')
    cartRow2.classList.add('productes_carro2')
    var cartItems = document.getElementsByClassName('productes_carr')[0]
    var cartItems2 = document.getElementsByClassName('productes_carr2')[0]
    var cartItemNames = cartItems.getElementsByClassName('cart-item-model')
    var cartItemNames2 = cartItems.getElementsByClassName('cart-item-model2')
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == model) {
            cartItems.getElementsByClassName('cart-quantity-input')[i].value = ++cartItems.getElementsByClassName('cart-quantity-input')[i].value;
            var input = document.getElementsByClassName('cart-quantity-input')[i]
            input.setAttribute('value', cartItems.getElementsByClassName('cart-quantity-input')[i].value)
            console.log(cartItems.getElementsByClassName('cart-quantity-input')[i])
            var cartItems = document.getElementsByClassName('productes_carr')[0]
            localStorage.setItem("carro2", cartItems.innerHTML);
            return
        }
    }
    
    var cartRowContents = `
        <div class="cart-item cart-column">
            <img class="cart-item-image" src="${imageSrc}" width="80" height="80">
            <span class="cart-item-marca">${marca}</span>
            <span class="cart-item-model">${model}</span>
        </div>
        <span class="cart-preu cart-column">${preu}</span>
        <div class="cart-quantity cart-column">
            <input id="cart-quantity-input" class="cart-quantity-input" type="number" value="1">
            <button class="btn btn-danger" type="button">&#10060</button>
        </div>`
    console.log(imageSrc)
        var cartRowContents2 = `
        <div class="cart-item2 cart-column2">
            <img class="cart-item-image2" src="${imageSrc}" width="80" height="80">
            <span class="cart-item-marca2">${marca}</span>
            <span class="cart-item-model2">${model}</span>
        </div>
        <span class="cart-preu2 cart-column2">${preu}</span>
        <div class="cart-quantity2 cart-column2">
            <input id="cart-quantity-input2" class="cart-quantity-input" type="number" value="1">
            <button class="btn btn-danger2" type="button">&#10060</button>
        </div>`
    cartRow.innerHTML += cartRowContents
    cartRow2.innerHTML += cartRowContents2
    cartItems.append(cartRow)
    cartItems2.append(cartRow2)
    console.log(cartItems.innerHTML)
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
    localStorage.setItem("carro2", cartItems.innerHTML);
    localStorage.setItem("carro3", cartItems2.innerHTML);
    var items = cartRow.length;
    document.getElementById("unitats").innerHTML = `<br>${items} Productes`
    //console.log(cartItemNames)
    console.log(localStorage.getItem("carro2"));
    
}



function carregarDades2(cantitat){
    //console.log(cantitat)
    //localStorage.clear()
    var cartRow = document.getElementsByClassName('productes_carro')
    var cartRow2 = document.getElementsByClassName('productes_carro2')
    //console.log(cartRow)
    //cartRow.classList.add('productes_carro')
    var cartItems = document.getElementsByClassName('productes_carr')[0]
    var cartItems2 = document.getElementsByClassName('productes_carr2')[0]
    var quantitat = document.getElementsByClassName('cart-quantity-input')
    quantitat.value = localStorage.getItem('cantitat')
    console.log(quantitat.value)
    //var cartItemNames = cartItems.getElementsByClassName('cart-item-model')
    var cartRowContents = localStorage.getItem('carro2')
    var cartRowContents2 = localStorage.getItem('carro3')
    //console.log(localStorage.getItem('carro2'))
    cartItems.innerHTML = cartRowContents
    cartItems2.innerHTML = cartRowContents2
    //cartItems.append(cartRow)
    //console.log(cartRow.innerHTML)
    //console.log(cartRow.length)
    for(i = 0; i < cartRow.length; i++){
    cartItems.getElementsByClassName('btn-danger')[i].addEventListener('click', removeCartItem)
    cartItems.getElementsByClassName('cart-quantity-input')[i].addEventListener('change', quantityChanged)
    
    localStorage.setItem("carro2", cartItems.innerHTML);
    localStorage.setItem("carro3", cartItems2.innerHTML);
    updateCartTotal()}

    var items = cartRow.length;
    document.getElementById("unitats").innerHTML = `${items} Productes`
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




















// function iniciar() {
    
//     numero = 1;
//     let btnsComprar = document.querySelectorAll(".comprar");
//     //console.log(localStorage.getItem("unitats2"));
    
//     for (i = 0; i < btnsComprar.length; i++) {
//         btnsComprar[i].addEventListener("click", (e)=>{ 
//         document.getElementById("productes_carr").innerHTML += `<div class="productes_car" id="productes_car${e.target.id}"><img id="${e.target.id}" src="${e.target.parentElement.children[0].src}" height="80px" width="80px" />
//                                                         <p id="${e.target.id}">${e.target.parentElement.children[1].innerText}</p>
//                                                      <p id="${e.target.id}">${e.target.parentElement.children[2].innerText}</p>
//                                                       <p id="${e.target.id}">${e.target.parentElement.children[3].innerText}</p>
//                                                       <div class="unitats" id="unitat${e.target.id}"><input type="button" value="&#10134" class="restar" id="${e.target.id}"><span class="quantitat" id="quantitat${e.target.id}">1</span><input type="button" value="&#10133" class="sumar" id="${e.target.id}" ></div>
//                                                       <input type="button" value="&#10060" class="eliminar" id="${e.target.id}" ></div>`;
//                                                     //e.target.addEventListener("click", guardarDades)   
//                                                     localStorage.setItem(`unitats${e.target.id}`, numero);
//                                                                                           })
//         btnsComprar[i].addEventListener("click", guardarDades);
//         btnsComprar[i].addEventListener("click", unitats);
        
         

//     }
    
//     const element = document.getElementById("buidarcarrito");
//     element.addEventListener("click", esborrarDades);



// }

// function unitats(){
//     let sumar = document.querySelectorAll(".sumar");
//     let restar = document.querySelectorAll(".restar");
//     let quantitat = document.querySelectorAll(".quantitat");
//     let eliminar = document.querySelectorAll(".eliminar");
//     number = 1;
//     min =1;
//     max = 50;
//     console.log(eliminar.length)
//     for (i = 0; i < sumar.length; i++) {
//         sumar[i].addEventListener("click", (e)=>{
//             sumar = document.getElementById(`${e.target.id}`);
//             quantitat.id = document.getElementById(`quantitat${e.target.id}`);
//             //console.log(quantitat.id.innerText);
//             quantitat.id.innerText++ ;
//             localStorage.setItem(`unitats${e.target.id}`, quantitat.id.innerText);
//             //console.log(localStorage.getItem("unitats2"));
//             //console.log(quantitat.id.innerText);

                
            
            
//         })
//         restar[i].addEventListener("click", (e)=>{
//             restar = document.getElementById(`${e.target.id}`);
//             quantitat.id = document.getElementById(`quantitat${e.target.id}`);
//             if(quantitat.id.innerText>min){
//             quantitat.id.innerText--;
//             localStorage.setItem(`unitats${e.target.id}`, quantitat.id.innerText);
//             }
            
//         })
//         eliminar[i].addEventListener("click", (e)=>{
//             //console.log(`eliminar${e.target.id}`)
//             eliminar = document.getElementById(`${e.target.id}`);
//             console.log(`productes_car${e.target.id}`)
//             eliminar.onclick = document.getElementById(`productes_car${e.target.id}`).innerHTML = "";
//             eliminar.onclick = guardarDades();
//         })

//     }    
// }

// function guardarDades() {
//     //let img = document.getElementById("productes_car2").innerHTML;

//     let carrito = document.getElementById(`productes_carr`).innerHTML;
//     let clau = localStorage.length + 1;
//     console.log(`Carrito: ${carrito}`)

//     const carro = {
//         carrito: carrito
//     };
//     const myJSON = JSON.stringify(carro);

//     localStorage.setItem("clau", carrito);
//     //console.log(clau, myJSON);
    

//     carregarDades();
//     //esborrarCamps();
// }

// function carregarDades(){
//     document.getElementById("productes_carr").innerHTML = localStorage.getItem("clau");
//     let productes = document.querySelectorAll(".producte");
    
// }

// function esborrarDades() {
//     if(confirm("Estas segur de que vols esborrar les dades?¿"))
//     localStorage.clear()
//     //carregarDades();
//     esborrarCamps();

// }

// function esborrarProd(){
//     let productes = document.querySelectorAll(".producte");
//     for (i = 0; i < productes.length; i++) {
//     if(document.getElementById(`productes_car${i+1}`)==null){
//             continue;
//     }else{
//     document.getElementById(`productes_car${i+1}`).innerHTML = "";
//     }}
// }
// function esborrarCamps(){
//     // document.getElementById("nom").value="";
//     // document.getElementById("edat").value="";
//     // document.getElementById("ciutat").value="";
//     document.getElementById("productes_carr").innerHTML = "";
// }
// function esborrarItem(id){
//     if(confirm("Estas segur que vols esborrar aquest registre??¿?"))    {
//     localStorage.removeItem(id);
//     //carregarDades();
//     esborrarCamps();
//     }}