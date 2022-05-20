<?php
include "config.php";
if (isset($_POST['login'])) {

    $usuari =  mysqli_real_escape_string($link,$_POST['usuari']);
    $Contrassenya =  mysqli_real_escape_string($link,md5($_POST['Contrassenya']));
    $error = "Usuari o Contrassenya incorrectes";
    $error2 = "No estas donat de alta";
    $query2 = $link -> query ("select * from client");
    $valores = mysqli_fetch_array($query2);
    $contra = $valores['contrasenya'];
    $usuari3 = $valores['usuari'];
    if($usuari3==null && $contra==null){
        header('Location: index.php');
    }
    if($usuari==$usuari3 && $contra==$Contrassenya){
    $query = $link -> query ("select * from client where usuari='$usuari' AND contrasenya='$Contrassenya'");
        $result = mysqli_fetch_array($query);
        $_SESSION['usuari'] = $usuari;
        
           
        
      }else{

        echo "<span class=\"error\">".$error."</span";
    }
}


// // logout
// if(isset($_POST['logout'])){
//     session_destroy();
//     header('Location: index.php');
// }
?>


<html lang="ca">
<head>
<meta charset="utf-8">
    <title>GymBros</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="sala.css">
    <script src="sala.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                        <li style="width: 5%;"><a href="cursos.php">Cursos</a></li>
                        <li  style="position: absolute; float: right; right: 35%; " ><a onmouseover="mostrar2()" onmouseout="amagar2()" href="#"><i class="fa-solid fa-user"></i></a>
                            <ul id="perfil">
                                <li><a href="#">COMPTE</a></li>
                                <li><a href="#">MATERIAL</a></li>
                                <li><a href="#">CURSOS</a></li>
                                <li name="logout" ><a href="logout.php" class="logout">Tancar Sessió</a></li>
                            </ul>
                        </li>
                        <li  style="position: absolute; float: right; right: 30%; width: 5%;" ><a onmouseover="mostrar()" onmouseout="amagar()" href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="login">
    <form method="post" action="" name="signin-form" onmouseover="mostrar2()" onmouseout="amagar2()" >
        <section class="form-login">
            <h5><i class="fa-solid fa-person-skiing"></i> Inicia Sessió <i class="fa-solid fa-person-skiing"></i></h5>
          <input class="controls" type="text" name="usuari" value="" placeholder="&#128231; USUARI" required>
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
    <?php
if(isset($_SESSION['usuari'])){
    echo '<script type="text/javascript">',
        'sessio();',
        '</script>';
        
        echo '<script type="text/javascript">',
        'sessio4();',
        '</script>';

        
}else{
        echo '<script type="text/javascript">',
            'sessio2();',
            '</script>';
            
            echo '<script type="text/javascript">',
            'sessio3();',
            '</script>';}
  



if(isset($_POST['logout'])){
    session_destroy();
    header('Location: index.php');
    
   
 }
 ?> 
    <div id="dades">
        <div id="titoldades">
            <span class="cart-item cart-header cart-column">Item</span>
            <span class="cart-preu cart-header cart-column">Preu</span>
            <span class="cart-quantity cart-header cart-column">Unitats</span>
        </div>
    <div class="productes_carr" id="productes_carr">
    <?php 
      $num = 0;
      $user = "";
      if(isset($_SESSION['usuari'])){
      $user = $_SESSION['usuari'];
      $query_usuari = $link -> query ("SELECT dni_usuari from client WHERE usuari='$user'");
      $valores2 = mysqli_fetch_array($query_usuari);
      $dni_user = $valores2['dni_usuari'];
      $query = $link -> query ("SELECT * FROM client c, lloguer_producte le, producte p WHERE c.dni_usuari='$dni_user' AND p.id_producte=le.id_producte AND le.dni_usuari=c.dni_usuari");
 
      $valores = mysqli_fetch_array($query);
      
    if($valores!=null){
        $imatge = $valores['img'];
        $marca = $valores['marca'];
        $model = $valores['model'];
        $preu = $valores['preu'];
//Aqui es on hem afegit el codi html dins php apart de mes variables creader
    foreach($query as $row){
        $num = $num + 1;
    ?>
    <div class="productes_carro3" id="<?=$num?>">
        <div class="cart-item cart-column">
            <img class="cart-item-image" src="<?= $row['img']?>" width="80" height="80">
            <span class="cart-item-marca"><?=$row['marca']?></span>
            <span class="cart-item-model"><?=$row['model']?></span>
        </div>
        <span class="cart-preu cart-column"><?=$row['preu']?></span>
        <div class="cart-quantity cart-column">
            <input id="cart-quantity-input" class="cart-quantity-input" type="number" value="1">
            <button  type="button" class="btn-danger2">
                <span class="icon-cross"></span>
                <span class="visually-hidden"></span>
            </button>
        </div>
    </div>
    <?php }
}
}else{
    echo "No has iniciat sessió";
}?>
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
    
<script>
var b = localStorage.getItem("producte");
</script>  
    <?php
        $var_PHP = "<script> document.writeln(localStorage.getItem('producte')); </script>"; // igualar el valor de la variable JavaScript a PHP 

    echo $var_PHP;   // muestra el resultado 
   
            
            $user;
            if(isset($_SESSION['usuari'])){
                $user = $_SESSION['usuari'];
                $query_usuari = $link -> query ("SELECT dni_usuari from client WHERE usuari='$user'");
                $valores2 = mysqli_fetch_array($query_usuari);
                $dni_user = $valores2['dni_usuari'];
                echo $var_PHP;
                $sql = "SELECT le.id_producte FROM client c, lloguer_producte le, producte p WHERE c.dni_usuari='$dni_user' AND p.id_producte=le.id_producte AND le.dni_usuari=c.dni_usuari AND p.model='$var_PHP'";
            }else{
                echo "No ha iniciat sessió";
            }
            ?>

</body>
</html>