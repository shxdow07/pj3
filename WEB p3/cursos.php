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
    <title>AvalanchaINC</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="sala.css">
    <script src="cursos2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
<header>
<header>
        <?php include "header.php"?>
    </header>
    </header>
    <?php include "login.php"?>
      <?php include "dades2.php"?>
    <?php
if(isset($_SESSION['usuari'])){
    echo '<script type="text/javascript">',
        'sessio();',
        '</script>';
        
        echo '<script type="text/javascript">',
        'sessio4();',
        '</script>';

        
}else{
    header("Location: index.php");
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
            <span class="cart-item cart-header cart-column">Descripcio</span>
            <span class="cart-preu cart-header cart-column">Preu</span>
            <span class="cart-quantity cart-header cart-column">Data</span>
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
      $query = $link -> query ("SELECT *, cu.nom as cursnom , m.nom as monitorm, m.cognom as cognomm FROM client c, curs cu, monitor m, lloguercurs_colectiu lc, lloguercurs_competitiu lco, lloguercurs_individual li WHERE c.dni_usuari='$dni_user'  AND li.dni_usuari=c.dni_usuari AND lco.dni_usuari=c.dni_usuari AND lc.dni_usuari=c.dni_usuari AND cu.dni_monitor=m.dni_monitor");
 
      $valores = mysqli_fetch_array($query);
      
    if($valores!=null){
        $nomm = $valores['nom'];
        $cognomm = $valores['cognom'];
        $model = $valores['descripcio'];
        $preu = $valores['preu'];
//Aqui es on hem afegit el codi html dins php apart de mes variables creader
    foreach($query as $row){
        $num = $num + 1;
    ?>
    <div class="productes_carro3" id="<?=$num?>">
        <div class="cart-item cart-column">
            <span class="cart-item-image" style="border:none;"> <?= $row['cursnom']?></span>
            <span class="cart-item-model"><?=$row['descripcio']?></span>
        </div>
        <span class="cart-preu cart-column"><?=$row['preu']?></span>
        <div class="cart-quantity cart-column">
            <span id="cart-quantity-input" class="cart-quantity-input"><?=$row['data_inici']?></span>
            
        </div>
    </div>
    <?php }
}
}else{
    echo "No has iniciat sessi??";
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
            </div>
    </div>
    

</body>
</html>