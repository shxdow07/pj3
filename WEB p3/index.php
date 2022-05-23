<!DOCTYPE HTML>


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
<html>
<head>
    <meta charset="utf-8">
    <title>GymBros</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="neu2.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="localStorage.js"></script>
    <script src="index.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900&display=swap"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="http://fonts.cdnfonts.com/css/haettenschweiler" rel="stylesheet">
</head>
<body>
<header>
        <?php include "header.php"?>
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

<div class='parent'>
		<div class='slider'>
			<button type="button" id='right' class='right' name="button">

				<svg version="1.1" id="Capa_1" width='40px' height='40px ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
					<g>
						<path style='fill: #9d9d9d;' d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
          c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
          " />
					</g>

				</svg>

			</button>
			<button type="button" id='left' class='left' name="button">
				<svg version="1.1" id="Capa_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
					<g>
						<path style='fill: #9d9d9d;' d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
          c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z" />
					</g>
				</svg>
			</button>
			<svg id='svg2' class='up2' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<circle id='circle1' class='circle1 steap' cx="58px" cy="47%" r="130" />
				<circle id='circle2' class='circle2 steap' cx="58px" cy="47%" r="370" />
				<circle id='circle3' class='circle3 steap' cx="58px" cy="47%" r="570" />
				<circle id='circle4' class='circle4 steap' cx="58px" cy="47%" r="770" />
				<circle id='circle5' class='circle5 steap' cx="58px" cy="47%" r="970" />
				<circle id='circle6' class='circle6 steap' cx="58px" cy="47%" r="1170" />
				<circle id='circle7' class='circle7 steap' cx="58px" cy="47%" r="1370" />
				<circle id='circle8' class='circle8 steap' cx="58px" cy="47%" r="1570" />
				<circle id='circle9' class='circle9 steap' cx="58px" cy="47%" r="1770" />
			</svg>
			<svg id='svg1' class='up2' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<circle id='circle10' class='circle10 steap' cx="1690px" cy="47%"r="130" />
				<circle id='circle11' class='circle11 steap' cx="1690px" cy="47%" r="370" />
				<circle id='circle12' class='circle12 steap' cx="1690px" cy="47%" r="570" />
				<circle id='circle13' class='circle13 steap' cx="1690px" cy="47%" r="770" />
				<circle id='circle14' class='circle14 steap' cx="1690px" cy="47%" r="970" />
				<circle id='circle15' class='circle15 steap' cx="1690px" cy="47%" r="1170" />
				<circle id='circle16' class='circle16 steap' cx="1690px" cy="47%" r="1370" />
				<circle id='circle17' class='circle17 steap' cx="1690px" cy="47%" r="1570" />
				<circle id='circle18' class='circle18 steap' cx="1690px" cy="47%" r="1770" />
			</svg>
			<div id='slide1' class='slide1 up1'>AVALANCHA INC</div>
			<div id='slide2' class='slide2'>TELECAVINES</div>
			<div id='slide3' class='slide3'>ESQUÍ</div>
			<div id='slide4' class='slide4'>PAISATGES</div>
		</div>
	</div>
<main>
    <div class="titol">
        <span>PRODUCTES</span>
                <div class="fons"><div class="snow"></div>
                <div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div>
                <div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div>
            </div>
    </div>
        

<div class="owl-carousel owl-theme" id="productes">
    
<?php 

      $query = $link -> query ("SELECT p.*, pa.altura, e.mida, b.talla, p.id_producte as producteid, e.id_producte as esquiid, pa.id_producte as palsid, b.id_producte as botesid FROM producte p LEFT JOIN esqui e ON e.id_producte = p.id_producte LEFT JOIN pals pa ON pa.id_producte = p.id_producte LEFT JOIN botes b ON b.id_producte = p.id_producte");
 
      $valores = mysqli_fetch_array($query);
      
    if($valores!=null){
        $id = $valores['producteid'];
        $idp = $valores['palsid'];
        $idb = $valores['botesid'];
        $ide = $valores['esquiid'];
        $imatge = $valores['img'];
        $marca = $valores['marca'];
        $model = $valores['model'];
        $preu = $valores['preu'];
//Aqui es on hem afegit el codi html dins php apart de mes variables creader
    foreach($query as $row){

        if($row['producteid']==$row['palsid']){
            $carac = $row['altura'];
            $valor = "ALTURA";
        }else if($row['producteid']==$row['esquiid']){
            $carac = $row['mida'];
            $valor = "MIDA";
        }else if($row['producteid']==$row['botesid']){
            $carac = $row['talla'];
            $valor = "TALLA";
        }
    ?>      
            <div class="producte">
            
                <img class="producte-imatge" src="<?= $row['img']?>" alt="Producte" >
                <h2 class="producte-marca"><?= $row['marca']?></h2>
                <span class="producte-model"><?= $row['model']?></span>
                <span class="producte-preu"><?= $row['preu']?></span>
                <span class="producte-carac"><?= $carac?></span>
                
                <button class="btn btn-primary producte-button" type="button" value="COMPRAR">COMPRAR</button>
                
                
            </div><?php }

} ?>

</div>
<div class="titol2">
        <span><a href="buscador.php" style="text-decoration: none; color: white;">MÉS PRODUCTES</a></span>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript">

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsive:{
        0:{
            margintop: 300,
            items:1
        },
        600:{
            margintop: 500,
            items:3
        },
        1000:{
            margintop: 1500,
            items:5
        }
    }
})
</script>
<script src="prova2.js"></script>
<div class="about-section" id="sobrenos">
  <div class="inner-container">
    <h1>Sobre Nosaltes</h1>
    <p class="text">
      Som una petita empresa dedicada al lloguer d'articles i material per activitas en neu. Dins la nostra botiga podreu trobar productes per poder llogar, activitats, cursos i més coses. El nostre objectiu es conseguir que gent com vosté obtingui el millor tracte possible al igual que el millor material per a realitzar qualsevol tipus d'activitat relacionades amb la neu.
    </p>
    <div class="skills">
      <span>+34 650 54 26 35</span>
      <span>avalanchainc@gmail.com</span>
      <span>C/ Lleida, Andorra La Vella</span>
    </div>
  </div>
</div>

</main>


<div id="dades" style="display: none">
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


<footer>
<?php include "footer.php"?>
</footer>           
</body>
</html>