<!DOCTYPE HTML>
<html>
  
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
<head>
    <meta charset="utf-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="css2.css">
    <script src="localStorage.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <header>
        <?php include "header.php"?>
    </header>
        <?php include "login.php"?>
        <?php include "dades2.php"?>
    
    <main>
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
</main>
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


<footer>
<?php include "footer.php"?>
</footer>
</body>
</html>