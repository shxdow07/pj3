


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
    <link rel="stylesheet" href="compte.css">
    <script src="compte.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <?php include "header.php"?>
        <?php include "login.php"?>
    </header>
    
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
    <main>

        <div id="opcio1">
            <div class="titol1">
                <h1>FAMILIAR</h1>
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