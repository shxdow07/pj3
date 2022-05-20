<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="css.css">
    <script src="localStorage.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <header>
        <div class="head_container">
            <div class="header_tot">
                <div class="logo">
                    <a href="index.php"><img src="img/logo.png"></a>
                </div>
                <div class="menu" id="myTopnav">
                    <ul>
                       
                        <li style="width: 4%;"><a href="index.php">Inici</a></li>
                        <li style="width: 4%;"><a href="#">Tenda</a></li>
                        <li style="width: 10%;"><a href="#">Sobre Nosaltres</a></li>
                        <li style="width: 10%;"><a href="temps.php">Temps Comarques</a></li>
                        <li style="width: 5%;"><a href="#">Contact</a></li>
                        <li  style="position: absolute; float: right; right: 30%; width: 5%;" ><a onmouseover="mostrar()" onmouseout="amagar()" href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    
    <div id="dades">
        <div id="titoldades">
            <span class="cart-item cart-header cart-column">Item</span>
            <span class="cart-preu cart-header cart-column">Preu</span>
            <span class="cart-quantity cart-header cart-column">Unitats</span>
        </div>
            <div class="productes_carr" id="productes_carr">
            </div>
            <hr class="uno">
            <div class="cart-total">
                <div class="totalunitats">
                <strong class="cart-total-title">Total</strong>
                <span class="unitats" id="unitats"></span>
                </div>
                <div class="preu">
                <span class="cart-total-price">$0</span>
                </div>
            </div>
            <div class="buidar">
            <input type="button" value="Buidar Carrito" class="Buidar Carrito" id="buidarcarrito">
            </div>
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
</body>
</html>