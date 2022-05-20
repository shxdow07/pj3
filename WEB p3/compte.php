<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>GymBros</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="compte.css">
    <script src="compte.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="head_container">
            <div class="header_tot">
                <div class="logo">
                    <a href="index.html"><img src="img/logo.png"></a>
                </div>
                <div class="menu" id="myTopnav">
                    <ul>
                       
                        <li style="width: 4%;"><a href="index.html">Inici</a></li>
                        <li style="width: 4%;"><a href="#">Tenda</a></li>
                        <li style="width: 10%;"><a href="#">Sobre Nosaltres</a></li>
                        <li style="width: 10%;"><a href="temps.html">Temps Comarques</a></li>
                        <li style="width: 5%;"><a href="#">Contact</a></li>
                        <li  style="position: absolute; float: right; right: 33%; width: 5%;" ><a onmouseover="mostrar2()" onmouseout="amagar2()" href="#"><i class="fa-solid fa-user"></i></a></li>
                        <li  style="position: absolute; float: right; right: 30%; width: 5%;" ><a onmouseover="mostrar()" onmouseout="amagar()" href="carrito.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="login">
    <form method="post" action="" name="signin-form" onmouseover="mostrar2()" onmouseout="amagar2()" >
        <section class="form-login">
            <h5><i class="fa-solid fa-person-skiing"></i> Inicia Sessió <i class="fa-solid fa-person-skiing"></i></h5>
          <input class="controls" type="text" name="DNI" value="" placeholder="&#128231; DNI" required>
          <input class="controls2" type="password" name="Contrassenya" value="" placeholder="&#128274; Contrasenya" required>
          <input class="buttons" type="submit" name="login" value="Ingresar">
          <span><a href="compte">Crear Compte</a></span>
        </section>
      </form>
      </div>
    <div id="dades2" onmouseover="mostrar()" onmouseout="amagar()">
        
        <div class="productes_carr2" id="productes_carr2">
        </div>
        <hr class="dos">
        <div class="cart-total2">
            <div class="totalunitats2">
            <strong class="cart-total-title2">Total</strong>
            <span class="unitats2" id="unitats2"></span>
            </div>
            <div class="preu2">
            <span class="cart-total-price2">$0</span>
            </div>
        </div>
        <div class="buidar2">
        <input type="button" value="Buidar Carrito" class="Buidar Carrito2" id="buidarcarrito2">
        </div>
    </div>
    <main>
        <div id="opcio1">
            <div class="titol1">
                <h1>PROVA 1</h1>

            </div>
        </div>

    </main>    
</body>
</html>