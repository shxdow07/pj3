if (document.readyState == 'loading') {
  document.addEventListener('DOMContentLoaded', getXML)
  
  
} else {
  getXML()
}

//var appid = "479092b77bcf850403cb2aeb1a302425";
var document = "temps.html";
var ciudad = document.getElementById('comarca');

var urlWeather ="https://static-m.meteo.cat/content/opendata/ctermini_comarcal.xml";

// función que devuelve  de manera asíncronada el resultado del API REST
function getXML() {
  var xhttp = new XMLHttpRequest();
  xhttp.addEventListener("readystatechange", manageResponse);
  xhttp.open("GET", urlWeather, true);
  xhttp.send();
}

function manageResponse(event) {
  if (this.readyState == 4 && this.status == 200) {
    procesarXML(this);
  }
}

function temps2(event){
    var buttonClicked = event.target
    var tarda2 = buttonClicked.innerText;
    console.log(tarda2)
    if(tarda2.match(/^Tarda.*$/)){
        tarda();

    }
}


function procesarXML(xml) {



  var i;
  var xmlDoc = xml.responseXML;
  var p = xmlDoc.getElementsByTagName("prediccio");
  var v = xmlDoc.getElementsByTagName("variable");
  var x = xmlDoc.getElementsByTagName("smc");
  var e = xmlDoc.getElementsByTagName("comarca");
    
    g = 0;
    h = 0;
    //document.write(diasSemana[f.getDay()] + ", " + f.getDate());
    //console.log(numeroDia)
    for(a = 0; a < p.length; a++){
    z = 0;
    h=0;
    var diasSemana = new Array("Diumenge","Dilluns","Dimarts","Dimecres","Dijous","Divendres","Dissabte");
    var f=new Date();
    //console.log(v[g])
    if(z==0 &&(p[a].getAttribute('idcomarca')==4 || p[a].getAttribute("idcomarca")==5 || p[a].getAttribute("idcomarca")==15 || p[a].getAttribute("idcomarca")==26 || p[a].getAttribute("idcomarca")==39)){
    if(v[g].getAttribute("probprecipitaciomati")==1){
        var prob = 0;
    }else if(v[g].getAttribute("probprecipitaciomati")==2){
        var prob = 20;
    }else if(v[g].getAttribute("probprecipitaciomati")==3){
        var prob = 50;
    }else if(v[g].getAttribute("probprecipitaciomati")==4){
        var prob = 70;
    }else if(v[g].getAttribute("probprecipitaciomati")==5){
        var prob = 90;
    }

    if(v[g].getAttribute("probcalamati")==1){
        var prob2 = 0;
    }else if(v[g].getAttribute("probcalamati")==2){
        var prob2 = 30;
    }else if(v[g].getAttribute("probcalamati")==3){
        var prob2 = 60;
    }else if(v[g].getAttribute("probcalamati")==4){
        var prob2 = 80;
    }


    if(v[g].getAttribute("probprecipitaciotarda")==1){
        var prob3 = 0;
    }else if(v[g].getAttribute("probprecipitaciotarda")==2){
        var prob3 = 20;
    }else if(v[g].getAttribute("probprecipitaciotarda")==3){
        var prob3 = 50;
    }else if(v[g].getAttribute("probprecipitaciotarda")==4){
        var prob3 = 70;
    }else if(v[g].getAttribute("probprecipitaciotarda")==5){
        var prob3 = 90;
    }

    if(v[g].getAttribute("probcalatarda")==1){
        var prob4 = 0;
    }else if(v[g].getAttribute("probcalatarda")==2){
        var prob4 = 30;
    }else if(v[g].getAttribute("probcalatarda")==3){
        var prob4 = 60;
    }else if(v[g].getAttribute("probcalatarda")==4){
        var prob4 = 80;
    }

    var imgm = v[g].getAttribute("simbolmati");
    var imgt = v[g].getAttribute("simboltarda");
    
    console.log(imgt)
  }
    


  

    if(z==0 &&(p[a].getAttribute("idcomarca")==4 || p[a].getAttribute("idcomarca")==5 || p[a].getAttribute("idcomarca")==15 || p[a].getAttribute("idcomarca")==26 || p[a].getAttribute("idcomarca")==39)){
 
      
    document.getElementById("temps_cont").innerHTML += ` 
    <div class="container">
    <div class="weather-side">
      <div class="weather-gradient"></div>
      <div class="date-container">
        <h2 class="date-dayname" style="display: inline-block">${diasSemana[f.getDay() + 1]}</h2><span class="icono"><img src="https://static-m.meteo.cat/assets-w3/images/meteors/estatcel/${imgm}" class="img"/><img src="https://static-m.meteo.cat/assets-w3/images/meteors/estatcel/${imgt}" style="display:none;" class="img"/></span><span class="date-day">${v[z].getAttribute("data")}</span><i class="location-icon" data-feather="map-pin"></i><span class="location">${e[a].getAttribute("nomCOMARCA")}<br/>${e[a].getAttribute("nomCAPITALCO")}</span>
        </div>
      
      <div class="weather-container">
      <h2 class="weather-temp">${v[g].getAttribute("tempmax")}   <i class="fa-solid fa-temperature-arrow-up" style="color: red"></i></h2>
      <h2 class="weather-temp">${v[g].getAttribute("tempmin")}   <i class="fa-solid fa-temperature-arrow-down" style="color: blue"></i></h2>
      </div>
    </div>
    <div class="info-side">
      <div class="today-info-container">
        <div class="today-info">
          <div class="precipitation"> <span class="title">PRECIP.</span><span id="mati" class="value">${prob}%</span><span id="tarda" style="display:none;" class="value">${prob3}%</span>
            <div class="clear"></div>
          </div>
          <div class="humidity"> <span class="title">CALAMARSA</span><span id="mati" class="value">${prob2}%</span><span id="tarda" style="display:none;" class="value">${prob4}%</span>
            <div class="clear"></div>
          </div>
            <div class="clear"></div>
        </div>
      </div>
      <div class="week-container">
        <ul class="week-list">
        <button id="tempsb" class="tempsb" style="background-color: white; color: black;"><img src="https://static-m.meteo.cat/assets-w3/images/meteors/estatcel/${imgm}" class="icono2"/><span class="day-name">Dematí</span><span class="day-temp">${v[g].getAttribute("tempmax")}°C</span></button>
              
        <button id="tempsb" class="tempsb"><img src="https://static-m.meteo.cat/assets-w3/images/meteors/estatcel/${imgt}" class="icono2"/><span class="day-name">Tarda</span><span class="day-temp">${v[g].getAttribute("tempmin")*1.25}°C</span></button>
          
          <div class="clear"></div>
        </ul>
      </div>
      <div class="location-container">
      </div>
    </div>
  </div>`;
  feather.replace()
  z=1;

    }g++;
    if(z==1 &&(p[a].getAttribute("idcomarca")==4 || p[a].getAttribute("idcomarca")==5 || p[a].getAttribute("idcomarca")==15 || p[a].getAttribute("idcomarca")==26 || p[a].getAttribute("idcomarca")==39)){
      if(v[g].getAttribute("probprecipitaciomati")==1){
          var prob = 0;
      }else if(v[g].getAttribute("probprecipitaciomati")==2){
          var prob = 20;
      }else if(v[g].getAttribute("probprecipitaciomati")==3){
          var prob = 50;
      }else if(v[g].getAttribute("probprecipitaciomati")==4){
          var prob = 70;
      }else if(v[g].getAttribute("probprecipitaciomati")==5){
          var prob = 90;
      }
  
      if(v[g].getAttribute("probcalamati")==1){
          var prob2 = 0;
      }else if(v[g].getAttribute("probcalamati")==2){
          var prob2 = 30;
      }else if(v[g].getAttribute("probcalamati")==3){
          var prob2 = 60;
      }else if(v[g].getAttribute("probcalamati")==4){
          var prob2 = 80;
      }
  
  
      if(v[g].getAttribute("probprecipitaciotarda")==1){
          var prob3 = 0;
      }else if(v[g].getAttribute("probprecipitaciotarda")==2){
          var prob3 = 20;
      }else if(v[g].getAttribute("probprecipitaciotarda")==3){
          var prob3 = 50;
      }else if(v[g].getAttribute("probprecipitaciotarda")==4){
          var prob3 = 70;
      }else if(v[g].getAttribute("probprecipitaciotarda")==5){
          var prob3 = 90;
      }
  
      if(v[g].getAttribute("probcalatarda")==1){
          var prob4 = 0;
      }else if(v[g].getAttribute("probcalatarda")==2){
          var prob4 = 30;
      }else if(v[g].getAttribute("probcalatarda")==3){
          var prob4 = 60;
      }else if(v[g].getAttribute("probcalatarda")==4){
          var prob4 = 80;
      }

      var imgm = v[g].getAttribute("simbolmati");
    var imgt = v[g].getAttribute("simboltarda");
    console.log(imgt)
    }

    if(z==1 &&(p[a].getAttribute("idcomarca")==4 || p[a].getAttribute("idcomarca")==5 || p[a].getAttribute("idcomarca")==15 || p[a].getAttribute("idcomarca")==26 || p[a].getAttribute("idcomarca")==39)){
      
        document.getElementById("temps_cont").innerHTML += ` 
        <div class="container">
        <div class="weather-side">
          <div class="weather-gradient"></div>
          <div class="date-container">
            <h2 class="date-dayname" style="display: inline-block">${diasSemana[f.getDay() + 2]}</h2><span class="icono"><img src="https://static-m.meteo.cat/assets-w3/images/meteors/estatcel/${imgm}" class="img"/><img src="https://static-m.meteo.cat/assets-w3/images/meteors/estatcel/${imgt}" style="display:none;" class="img"/></span><span class="date-day">${v[z].getAttribute("data")}</span><i class="location-icon" data-feather="map-pin"></i><span class="location">${e[a].getAttribute("nomCOMARCA")}<br/>${e[a].getAttribute("nomCAPITALCO")}</span>
          </div>
          <div class="weather-container">
            <h2 class="weather-temp">${v[g].getAttribute("tempmax")}   <i class="fa-solid fa-temperature-arrow-up" style="color: red"></i></h2>
            <h2 class="weather-temp">${v[g].getAttribute("tempmin")}   <i class="fa-solid fa-temperature-arrow-down" style="color: blue"></i></h2>
          </div>
        </div>
        <div class="info-side">
          <div class="today-info-container">
            <div class="today-info">
              <div class="precipitation"> <span class="title">PRECIP.</span><span id="mati" class="value">${prob}%</span><span id="tarda" style="display:none;" class="value">${prob3}%</span>
                <div class="clear"></div>
              </div>
              <div class="humidity"> <span class="title">CALAMARSA</span><span id="mati" class="value">${prob2}%</span><span id="tarda" style="display:none;" class="value">${prob4}%</span>
                <div class="clear"></div>
              </div>
                <div class="clear"></div>
            </div>
          </div>
          <div class="week-container">
            <ul class="week-list">
              <button id="tempsb" class="tempsb" style="background-color: white; color: black;"><img src="https://static-m.meteo.cat/assets-w3/images/meteors/estatcel/${imgm}" class="icono2"/><span class="day-name">Dematí</span><span class="day-temp">${v[g].getAttribute("tempmax")}°C</span></button>
              
              <button id="tempsb" class="tempsb"><img src="https://static-m.meteo.cat/assets-w3/images/meteors/estatcel/${imgt}" class="icono2"/><span class="day-name">Tarda</span><span class="day-temp">${v[g].getAttribute("tempmin")*1.25}°C</span></button>
              
              <div class="clear"></div>
            </ul>
          </div>
          <div class="location-container">
          </div>
        </div>
      </div>`;
      feather.replace()

    }g++;
    


    
    
    //console.log(tot.getElementsByClassName('value').innerText)
    
    

     
    
    
    // var b = 0;
    
    // //console.log(document.getElementsByClassName(`tempsb${[g]}`))
    // var tarda = document.getElementsByClassName('week-list')
    // for(b = 0; b < v.length; b++){
    //     console.log(b)
    //     console.log(document.getElementsByClassName(`tempsb${g}`))
    //     //const btn = document.getElementsByClassName(`tempsb${g}`);
    //     var precipitacions = document.getElementsByClassName("precipitation")
    //     tarda.getElementsByClassName(`tempsb${g}`)[b].addEventListener('click', function tarda(){
    //     //const initialText = 'Click me';

    //     precipitacions.innerHTML = `<span class="title">PRECIP.</span><span class="value">${prob3}%</span>`;
    //     });
    //     }
    
    
    
  }

  var temps = document.getElementsByClassName('tempsb')
  temps3 = document.getElementsByClassName('today-info')
  var tot = document.getElementsByClassName('temps_cont')[0]
  //console.log(document.getElementsByClassName('tempsb')[19])
  for(var c = 0; c < temps.length; c++){
  //     console.log(c)
  
  tot.getElementsByClassName('tempsb')[c].addEventListener('click', function temps(event){
    var buttonClicked = event.target
    tarda3 = buttonClicked.parentElement;
    canvi = buttonClicked.parentElement.parentElement.parentElement.parentElement;
    canvi2= buttonClicked.parentElement.parentElement.parentElement.parentElement.parentElement;
    if((buttonClicked.parentElement.className)==('week-list')){
      tarda3 = buttonClicked;
      canvi = buttonClicked.parentElement.parentElement.parentElement;
      canvi2 = buttonClicked.parentElement.parentElement.parentElement.parentElement;
    }
    //console.log(canvi.getElementsByClassName('value')[0].id)
    //console.log(canvi2.getElementsByClassName('img')[1])
  //   if((canvi.getElementsByClassName('value')[0].id).match(/^mati.*$/)){

  // }
  var mati = canvi.getElementsByClassName('value')
  var boto = canvi.getElementsByClassName('tempsb')
  var imatge = canvi2.getElementsByClassName('img')
  // var mati2 = canvi.getElementsByClassName('value')[2].id
  // var tarda = canvi.getElementsByClassName('value')[1].id
  // var tarda2 = canvi.getElementsByClassName('value')[3].id
    //console.log((mati[0].style.display))

  //console.log(canvi.getElementsByClassName('value')[2])
    if((tarda3.innerText).match(/^Dematí/)){
      if (mati[0].style.display === "none") {
        mati[0].style.display = "block";
        mati[2].style.display = "block";
        imatge[0].style.display = "block";
        boto[0].style.backgroundColor = "white";
        boto[0].style.color = "black";
      } else {
        mati[0].style.display = "display";
        mati[2].style.display = "display";
        imatge[0].style.display = "display";
        boto[0].style.backgroundColor = "white";
        boto[0].style.color = "black";
      }
      //var tarda = canvi.getElementsByClassName('value')[1].id
      if (mati[1].style.display == "none") {
        mati[1].style.display = "none";
        mati[3].style.display = "none";
        imatge[1].style.display = "none";
        boto[1].style.backgroundColor = "#222831 ";
        boto[1].style.color = "white";
      } else {
        mati[1].style.display = "none";
        mati[3].style.display = "none";
        imatge[1].style.display = "none";
        boto[1].style.backgroundColor = "#222831 ";
        boto[1].style.color = "white";
      }
    }else if((tarda3.innerText).match(/^Tarda/)){
      if (mati[0].style.display === "none") {
        mati[0].style.display = "none";
        mati[2].style.display = "none";
        imatge[0].style.display = "none";
        boto[0].style.backgroundColor = "black";
        boto[0].style.color = "white";
      } else {
        mati[0].style.display = "none";
        mati[2].style.display = "none";
        imatge[0].style.display = "none";
        boto[0].style.backgroundColor = "#222831 ";
        boto[0].style.color = "white";
      }
      //var tarda = canvi.getElementsByClassName('value')[1].id
      if (mati[1].style.display === "none") {
        mati[1].style.display = "block";
        mati[3].style.display = "block";
        imatge[1].style.display = "block";
        boto[1].style.background = "white";
        boto[1].style.color = "black";
      } else {
        mati[1].style.display = "display";
        mati[3].style.display = "display";
        imatge[1].style.display = "display";
        boto[1].style.backgroundColor = "white";
        boto[1].style.color = "black";
      }
    }
    console.log(document.getElementById(canvi.getElementsByClassName('value')))
    console.log(canvi)
    //console.log(document.getElementById(canvi.getElementsByClassName('value')[0].id))

  })
  }
  
}



function tarda() {
    if(document.getElementById(`mati`)==null){
        console.log((`mati`))
    }else{
    var x = document.getElementById(`mati`);
    if (x.style.display === "none") {
      x.style.display = "none";
    } else {
      x.style.display = "none";
    }

    var x2 = document.getElementById(`tarda`);
    if (x2.style.display === "none") {
      x2.style.display = "block";
    } else {
      x2.style.display = "display";
    }
    }   }



  function myFunction7() {
    var x2 = document.getElementById("mati");
    if (x2.style.display === "none") {
      x2.style.display = "block";
    } else {
      x2.style.display = "display";
    }

    var x = document.getElementById("tarda");
    if (x.style.display === "none") {
      x.style.display = "none";
    } else {
      x.style.display = "none";
    }
  }
  



  if (document.readyState == 'loading') {
    console.log(localStorage.getItem("carro2"));
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
    }else if(buttonClicked.className=="btn-danger" && buttonClicked.parentElement.parentElement.parentElement.className=="productes_carr2"){
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

