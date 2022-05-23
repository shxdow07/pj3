<html>

<head>
    <meta charset="utf-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="prova.css">
    <script src="prova.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<?php
$boto = $_GET['boto'];

if($boto==null){
	header("Location: index.php");
} 
$num = 0;
$taula = "";
if($boto == 1){
    $taula = "client_colectiu";
    $num = 1;
}elseif($boto == 2){
	$taula = "client_federat";
    $num = 2;
}elseif($boto == 3){
	$taula = "client_individual";
    $num = 3;
}

// Include config file
include "config.php";
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $nom = $cognom = $cognom2 = $dni = $email = $sexe = $numf = $numfam ="";
$username_err = $password_err = $confirm_password_err = $nom_err = $cognom_err = $cognom2_err = $dni_err = $email_err = $sexe_err = $numf_err = $numfam_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "El nom d'usuari sol pot contenir numeros, lletres i barres espaciadores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT usuari FROM client WHERE usuari = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "<i class='fas fa-exclamation-triangle' style='color:red'></i> El nom d'usuari ja està agafat.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Algo ha anat malamanet, torni a intentar-ho més tard.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "<i class='fas fa-exclamation-triangle' style='color:red'></i> La contrassenya ha de contenir 6 caràcters com a mínim.";
    } else{
        $password = trim($_POST["password"]);
		$param_password = mysqli_real_escape_string($link,md5($_POST['password']));
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "<i class='fas fa-exclamation-triangle' style='color:red'></i> Les contrassenyes no concorden.";
        }
    }

	if(empty(trim($_POST["nom"]))){
        $nom_err = "Introdueixi el nom.";     
    } elseif(strlen(trim($_POST["nom"])) < 1){
        $nom_err = "<i class='fas fa-exclamation-triangle' style='color:red'></i> El nom ha de tenir almenys 1 caracter.";
    } else{
        $nom = trim($_POST["nom"]);
		$param_nom = trim($_POST["nom"]);
    }

	if(empty(trim($_POST["cognom"]))){
        $cognom_err = "<i class='fas fa-exclamation-triangle' style='color:red'></i> Introdueixi el primer cognom.";     
    } elseif(strlen(trim($_POST["cognom"])) < 1){
        $nom_err = "El cognom ha de tenir almenys 1 caracter.";
    } else{
        $cognom = trim($_POST["cognom"]);
		$param_cognom = trim($_POST["cognom"]);
    }

	if(empty(trim($_POST["cognom2"]))){
        $cognom2_err = "<i class='fas fa-exclamation-triangle' style='color:red'></i> Introdueixi el segon cognom.";     
    } elseif(strlen(trim($_POST["cognom2"])) < 1){
        $nom_err = "El 2n Cognom ha de tenir almenys 1 caracter.";
    } else{
        $cognom2 = trim($_POST["cognom2"]);
		$param_cognom2 = trim($_POST["cognom2"]);
    }
    
	if(empty(trim($_POST["dni"]))){
        $dni_err = "Introdueixi el DNI.";     
    } elseif(strlen(trim($_POST["dni"])) < 9){
        $dni_err = "<i class='fas fa-exclamation-triangle' style='color:red'></i> El DNI ha de tenir almenys 9 caracter.";
    } else{
        // Prepare a select statement
        $sql = "SELECT dni_usuari FROM client WHERE dni_usuari = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_dni);
            
            // Set parameters
            $param_dni = trim($_POST["dni"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $dni_err = "<i class='fas fa-exclamation-triangle' style='color:red'></i> DNI ja registrat.";
                } else{
                    $dni = trim($_POST["dni"]);
                }
            } else{
                echo "Oops! Algo ha anat malamanet, torni a intentar-ho més tard.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

	if(empty(trim($_POST["email"]))){
        $email_err = "Introdueixi el Correu.";     
    } elseif(strlen(trim($_POST["email"])) < 11){
        $email_err = "<i class='fas fa-exclamation-triangle' style='color:red'></i> El email ha de tenir almenys 9 caracter.";
    } else{
        $email = trim($_POST["email"]);
		$param_email = trim($_POST["email"]);
    }

	if(empty(trim($_POST["sexe"]))){
        $sexe_err = "Ha de escollir un sexe.";     
    } else{
        $sexe = trim($_POST["sexe"]);
		$param_sexe = trim($_POST["sexe"]);
    }

    if($num==1){
        if(empty(trim($_POST["numfam"]))){
            $numfam_err = "<i class='fas fa-exclamation-triangle' style='color:red'></i> Introdueixi el numero familiar.";     
        } elseif(strlen(trim($_POST["cognom2"])) < 1){
            $numfam_err = "Numero Familiar Incorrecte.";
        } else{
            $numfam = trim($_POST["numfam"]);
            $param_numf = trim($_POST["numfam"]);
        }
    }elseif($num==2){
        if(empty(trim($_POST["numf"]))){
            $numf_err = "<i class='fas fa-exclamation-triangle' style='color:red'></i> Introdueixi el numero de federació.";     
        } elseif(strlen(trim($_POST["numf"])) < 1){
            $numf_err = "El 2n Cognom ha de tenir almenys 1 caracter.";
        } else{
            $numf = trim($_POST["numf"]);
            $param_numf = trim($_POST["numf"]);
        }
    }
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($nom_err) && empty($cognom_err) && empty($cognom2_err) && empty($dni_err) && empty($email_err) && empty($sexe_err) && empty($numf_err) && empty($numfam_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO client (dni_usuari, nom, cognom, cognom2, usuari, contrasenya, sexe, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$sql2 = "INSERT INTO $taula (dni_usuari) VALUES (?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 'ssssssss', $param_dni, $param_nom, $param_cognom,  $param_cognom2, $param_username, $param_password, $param_sexe, $param_email);
            
            // Set parameters
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }if($stmt2 = mysqli_prepare($link, $sql2)){
			mysqli_stmt_bind_param($stmt2, 's', $param_dni);
            // Set parameters
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt2)){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt2);
		}
    }else if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($nom_err) && empty($cognom_err) && empty($cognom2_err) && empty($dni_err) && empty($email_err) && empty($sexe_err) && empty($numf_err) && empty($numfam_err)){
        
        // Prepare an insert statement
        if($num==3){
		$sql2 = "INSERT INTO $taula (dni_usuari) VALUES (?)";
        if($stmt2 = mysqli_prepare($link, $sql2)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt2, 's', $param_dni);
            
            // Set parameters
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt2)){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt2);
        }}else if($num==1 || $num==2){
            $sql2 = "INSERT INTO $taula (dni_usuari) VALUES (?, ?)";
            if($stmt2 = mysqli_prepare($link, $sql2)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt2, 'ss', $param_dni, $param_numf);
                
                // Set parameters
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt2)){
                    // Redirect to login page
                    header("location: index.php");
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
    
                // Close statement
                mysqli_stmt_close($stmt2);
            }}
    }
    
    // Close connection
    mysqli_close($link);
}
?>             
            <?php if($num==3){?>
			<div id="container" style="height: 36rem;"><?php }else{?><div id="container">
                <?php }?>
			   <header>Registra't</header>
			   <form method="post">
				  <fieldset>
					  <div id="tot">
					  <div id="part1">
					 <br/>
					 
					 <input type="text" class="form-control<?php echo (!empty($dni_err)) ? 'is-invalid' : ''; ?>" name="dni" id="dni" placeholder="DNI" required autofocus>
					 <br/><br/><span class="invalid-feedback"><?php echo $dni_err; ?></span>
					 <br/><br/>
					 <input type="text" class="form-control<?php echo (!empty($nom_err)) ? 'is-invalid' : ''; ?>" name="nom" id="nom" placeholder="NOM" required autofocus>
					 <br/><br/><span class="invalid-feedback"><?php echo $nom_err; ?></span>
					 <br/><br/>
					 <input type="text" class="form-control<?php echo (!empty($cognom_err)) ? 'is-invalid' : ''; ?>" name="cognom" id="cognom" placeholder="COGNOM" required autofocus>
					 <br/><br/><span class="invalid-feedback"><?php echo $cognom_err; ?></span>
					 <br/><br/>
					 <input type="text" class="form-control<?php echo (!empty($cognom2_err)) ? 'is-invalid' : ''; ?>" name="cognom2" id="cognom2" placeholder="2n COGNOM" required autofocus>
					 <br/><br/><span class="invalid-feedback"><?php echo $cognom2_err; ?></span>
					 <br/><br/>
					 </div>
					 <div id="part2">
					 <br/>
					 <input type="text" class="form-control<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="USUARI" required autofocus>
					 <br/><br/><span class="invalid-feedback"><?php echo $username_err; ?></span>
					 <br/><br/>
					 <input type="email" class="form-control<?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="CORREU" required>
					 <br/><br/><span class="invalid-feedback"><?php echo $email_err; ?></span>
					 <br/><br/>
					 <input type="password" class="form-control<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="CONTRASSENYA" required>
					 <br/><br/><span class="invalid-feedback"><?php echo $password_err; ?></span>
					 <br/><br/>
					 <input type="password" class="form-control<?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" name="confirm_password" id="confirm_password" placeholder="REPETIR CONTRASSENYA" required>
					 <br/><br/><span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
					 <br/> <br/>
                     <?php if($num==1){?>
                     <input type="text" class="form-control<?php echo (!empty($numfam_err)) ? 'is-invalid' : ''; ?>" name="numfam" id="numfam" placeholder="NUM FAMILIAR" required>
                     <br/><br/><span class="invalid-feedback"><?php echo $numfam_err; ?></span>
                     <br/> <br/>
                     <?php }elseif($num==2){?>
                     <input type="text" class="form-control<?php echo (!empty($numf_err)) ? 'is-invalid' : ''; ?>" name="numf" id="numf" placeholder="NUM FEDERACIÓ" required>
                     <br/><br/><span class="invalid-feedback"><?php echo $numf_err; ?></span>
                     <br/> <br/>
                     <?php } ?>
                     
					 </div>
					 </div>
					 <label><input class="sexe" type="radio"  value="Home" name="sexe" id="sexe"> <label class="sexe" for="sexe">Home</label>
					<label><input class="sexe" type="radio" value="Dona" name="sexe" id="sexe"> <label class="sexe"  for="sexe">Dona</label>
					<span class="invalid-feedback"><?php echo $sexe_err; ?></span>
					 <br/><br/>
					
					 <label for="submit"></label>
					 <input type="submit" name="submit" id="submit" value="REGISTRAR-SE">
				  </fieldset>
			   </form>
			</div>
		 </body>
</html>