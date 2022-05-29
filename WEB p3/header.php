<?php
include "config.php";

if(isset($_SESSION['usuari'])){
    $user = "fas fa-skiing-nordic";
    $user2 ="Logged In";

        
}else{
    $user = "fa-solid fa-user";
    $user2 ="";
}
  

?>
<div class="head_container">
            <div class="header_tot">
                <div class="logo">
                    <a href="index.php"><img src="img/logo.png"></a>
                </div>
                <div class="menu" id="myTopnav">
                    <ul>
                       
                        <li class="in"><a href="index.php">Inici</a></li>
                        <li class="in2"><a href="index.php#productes">Productes</a></li>
                        <li class="in2"><a href="index.php#sobrenos">Sobre Nosaltres</a></li>
                        <li class="in2"><a href="temps.php">Temps Comarques</a></li>
                        <li  class="in3" ><a onmouseover="mostrar2()" onmouseout="amagar2()" href="#"><i class="<?=$user?>"></i> <?=$user2?></a>
                            <ul id="perfil">
                                <li><a href="cuenta.php">COMPTE</a></li>
                                <li><a href="cursos.php">CURSOS</a></li>
                                <li><a href="productes.php">PRODUCTES</a></li>
                                <li name="logout" ><a href="logout.php" class="logout">Tancar Sessió</a></li>
                            </ul>
                        </li>
                        <li  class="in4" ><a onmouseover="mostrar()" onmouseout="amagar()" href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        