


<!DOCTYPE HTML>
<?php



$boto = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Something posted
    if (isset($_POST['boto1'])) {
      $boto = 1;
      header("Location: prova.php?boto=1");
    } else if(isset($_POST['boto2'])){
        $boto = 2;
        header("Location: prova.php?boto=2");
    }else if(isset($_POST['boto3'])){
        $boto = 3;
        header("Location: prova.php?boto=3");
      }
      
  }
?>  
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
                    <a href="index.php"><img src="img/logo.png"></a>
                </div>
                <div class="menu" id="myTopnav">
                    <ul>
                       
                        <li ><a href="index.php">Inici</a></li>
                        <li ><a href="#">Tenda</a></li>
                        <li class="nos"><a href="#">Sobre Nosaltres</a></li>
                        <li class="tmps"><a href="temps.php">Temps Comarques</a></li>
                        <li ><a href="#">Contact</a></li>
                        <li class="carr" ><a onmouseover="mostrar2()" onmouseout="amagar2()" href="#"><i class="fa-solid fa-user"></i></a></li>
                        <li  class="carr2"  ><a onmouseover="mostrar()" onmouseout="amagar()" href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
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
          <span><a href="compte2.php">Crear Compte</a></span>
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
                <h1>COLECTIU</h1>
            </div>
            <div class="contingut" id="contingut" onmouseover="canvi2()" onClick = "canvi()">
                <span >Lorem Ipsum is simply dummy text of the printing and typesetting industry. LLorem Ipsum is simLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galleyprinter took a galleyown printer took a galley</span>
            </div>

            <div class="boton">
            <form method="post">
                <input name="boto1" class="boto" type="submit" value="ESCOLLIR" >
            </form>
            </div>
        </div>

        <div id="opcio2">
            <div class="titol1">
                <h1>FEDERAT</h1>
            </div>
            <div class="contingut" id="contingut2" onmouseover="canvi2()" onClick = "canvi3()">
                <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. LLorem Ipsum is simLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galleyprinter took a galleyown printer took a galley</span>
            </div>
            <div class="boton">
            <form method="post">
                <input name="boto2" class="boto" type="submit" value="ESCOLLIR" >
            </form>
            </div>
        </div>

        <div id="opcio3">
            <div class="titol1">
                <h1>INDIVIDUAL</h1>
            </div>
            <div class="contingut" id="contingut3" onmouseover="canvi2()" onClick = "canvi4()">
                <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. LLorem Ipsum is simLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galleyprinter took a galleyown printer took a galley</span>
            </div>
            <div class="boton">
            <form method="post">
                <input name="boto3" class="boto" type="submit" value="ESCOLLIR" >
            </form>
            </div>
        </div>

    </main>  

</body>
</html>