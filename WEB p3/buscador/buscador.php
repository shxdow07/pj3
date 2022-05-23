<?php 
include("../config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
<link rel="stylesheet" href="index.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900&display=swap"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="http://fonts.cdnfonts.com/css/haettenschweiler" rel="stylesheet">
<script src="../Alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../Alert/sweetalert.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

 <!-- ESTILO CURSOS DE PROGRAMACION -->
 <link rel="stylesheet" href="../css/style_cp.css">


<title>Consulta basica</title>
</head>
<body>







<header>
<?php include("header.php"); ?>
</header>

<style>
  th, td{
    text-align: left;
  }
  .h2g{
    color: blue;
    font-size: 26px;
  }
  .pg{
    line-height: 2px;
  }
</style>








<!-- buscador basico -->
<div class="center mt-5">
    <div class="card pt-3" >
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Filtro de buscador</p>
        <div class="container-fluid mt-2 p-4">


        
 
      

       
     

            <div class="card col-12 mt-2">
                <div class="card-body">

                    <div class="table-responsive">
                

<?php 
if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
if (!isset($_POST['buscacategoria'])){$_POST['buscacategoria'] = '';}
if (!isset($_POST['carac'])){$_POST['carac'] = '';}
if (!isset($_POST['buscafechadesde'])){$_POST['buscafechadesde'] = '';}
if (!isset($_POST['buscafechahasta'])){$_POST['buscafechahasta'] = '';}
if (!isset($_POST['buscapreciodesde'])){$_POST['buscapreciodesde'] = '';}
if (!isset($_POST['buscapreciohasta'])){$_POST['buscapreciohasta'] = '';}
if (!isset($_POST["orden"])){$_POST["orden"] = '';} 
?>



     


    <form id="form2" name="form2" method="POST" action="index.php">
            <div class="col-12 row m-0 p-0">

                <div class="mb-3">
                        <label  class="form-label">Palabra a buscar</label>
                        <input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>" >
                </div>

                <h4 class="card-title">Filtro de búsqueda</h4>  
                
                <div class="col-12">

                            <table class="table">
                                    <thead>
                                            <tr class="filters">
                                                    <th>
                                                            Categoría
                                                            <select id="assigned-tutor-filter" id="buscacategoria" name="buscacategoria" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                    <?php if ($_POST["buscacategoria"] != ''){ ?>
                                                                    <option value="<?php echo $_POST["buscacategoria"]; ?>"><?php echo $_POST["buscacategoria"]; ?></option>
                                                                    <?php } ?>
                                                                    <option value="">Todos</option>
                                                                    <option value="esqui">Esqui</option>
                                                                    <option value="pals">Pals</option>
                                                                    <option value="botes">Botes</option>
                                                            </select>
                                                    </th>
                                                    <th>
                                                            Preu desde:
                                                            <input type="number" id="buscapreciodesde" name="buscapreciodesde" class="form-control mt-2" value="<?php echo $_POST["buscapreciodesde"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                    </th>
                                                    <th>
                                                            Preu fins a:
                                                            <input type="number" id="buscapreciohasta" name="buscapreciohasta" class="form-control mt-2" value="<?php echo $_POST["buscapreciohasta"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                    </th>
                                            

                                                    <th>
                                                            Caracteristica
                                                            <select id="subject-filter" id="carac" name="carac" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                    <?php if ($_POST["carac"] != ''){ ?>
                                                                    <option value="<?php echo $_POST["carac"]; ?>"><?php echo $_POST["carac"]; ?></option>
                                                                    <?php } ?>
                                                                    <option value="">Todos</option>
                                                                    <option style="color: blue;" value="Mida">Mida</option>
                                                                    <option style="color: red;" value="Altura">Altura</option>
                                                                    <option style="color: orange;" value="Talla">Talla</option>
                                                            </select>
                                                    </th>
                                            </tr>
                                    </thead>
                            </table>
                    </div>


                    <h4 class="card-title">Ordenar perr</h4>  
                
                <div class="col-11">

                            <table class="table">
                                    <thead>
                                            <tr class="filters">
                                                    <th>
                                                            Selecciona el orden
                                                            <select id="assigned-tutor-filter" id="orden" name="orden" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                    <?php if ($_POST["orden"] != ''){ ?>
                                                                    <option value="<?php echo $_POST["orden"]; ?>">
                                                                    <?php 
                                                                    if ($_POST["orden"] == '1'){echo 'Ordenar per marca';} 
                                                                    if ($_POST["orden"] == '2'){echo 'Ordenar per model';} 
                                                                    if ($_POST["orden"] == '3'){echo 'Ordenar por carac';} 
                                                                    if ($_POST["orden"] == '4'){echo 'Ordenar per preu de menor a major';} 
                                                                    if ($_POST["orden"] == '5'){echo 'Ordenar per preu de major a menor';} 
                                                                    ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                    <option value=""></option>
                                                                    <option value="1">Ordenar per marca</option>
                                                                    <option value="2">Ordenar per model</option>
                                                                    <option value="3">Ordenar por carac</option>
                                                                    <option value="4">Ordenar per preu de menor a major</option>
                                                                    <option value="5">Ordenar per preu de major a menor</option>
                                                            </select>
                                                    </th>
                                              
                                                  
                                          
                                            </tr>
                                    </thead>
                            </table>
                    </div>


                    <div class="col-1">
                            <input type="submit" class="btn " value="Buscar" style="margin-top: 38px; background-color:midnightblue; color: white;">
                    </div>
            </div>


            <?php 
            /*FILTRO de busqueda////////////////////////////////////////////*/
            if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
            $aKeyword = explode(" ", $_POST['buscar']);
            
          
            if ($_POST["buscar"] == '' AND $_POST['buscacategoria'] == '' AND $_POST['carac'] == '' AND $_POST['buscafechadesde'] == '' AND $_POST['buscafechahasta'] == ''AND $_POST['buscapreciodesde'] == '' AND $_POST['buscapreciohasta'] == ''){ 
                $query2 ="SELECT p.*, pa.altura, e.mida, b.talla, p.id_producte as producteid, e.id_producte as esquiid, pa.id_producte as palsid, b.id_producte as botesid FROM producte p LEFT JOIN esqui e ON e.id_producte = p.id_producte LEFT JOIN pals pa ON pa.id_producte = p.id_producte LEFT JOIN botes b ON b.id_producte = p.id_producte";   
                    $query ="SELECT * FROM producte ";
            }else{
                $query2 ="SELECT p.*, pa.altura, e.mida, b.talla, p.id_producte as producteid, e.id_producte as esquiid, pa.id_producte as palsid, b.id_producte as botesid FROM producte p LEFT JOIN esqui e ON e.id_producte = p.id_producte LEFT JOIN pals pa ON pa.id_producte = p.id_producte LEFT JOIN botes b ON b.id_producte = p.id_producte";    
                    $query ="SELECT * FROM producte ";

            if ($_POST["buscar"] != '' ){ 
                    $query .= "WHERE (model LIKE LOWER('%".$aKeyword[0]."%') OR marca LIKE LOWER('%".$aKeyword[0]."%')) ";
            for($i = 1; $i < count($aKeyword); $i++) {
              if(!empty($aKeyword[$i])) {
                  $query .= " OR model LIKE '%" . $aKeyword[$i] . "%' OR marca LIKE '%" . $aKeyword[$i] . "%'";
              }
            }

            }
            if ($_POST["buscacategoria"] == '' ){
                $query3 = " SELECT p.*, pa.altura, e.mida, b.talla, p.id_producte as producteid, e.id_producte as esquiid, pa.id_producte as palsid, b.id_producte as botesid FROM producte p LEFT JOIN esqui e ON e.id_producte = p.id_producte LEFT JOIN pals pa ON pa.id_producte = p.id_producte LEFT JOIN botes b ON b.id_producte = p.id_producte";
                }
                elseif ($_POST["buscacategoria"] == 'esqui' ){
                $query3 = "SELECT p.*, pa.altura, e.mida, b.talla, p.id_producte as producteid, e.id_producte as esquiid, pa.id_producte as palsid, b.id_producte as botesid FROM producte p, esqui e, pals pa, botes b WHERE e.id_producte=p.id_producte";
                }
                elseif ($_POST["buscacategoria"] == 'pals' ){
                        $query3 = " SELECT p.*, pa.altura, e.mida, b.talla, p.id_producte as producteid, e.id_producte as esquiid, pa.id_producte as palsid, b.id_producte as botesid FROM producte p, esqui e, pals pa, botes b WHERE pa.id_producte=p.id_producte";
                }
                elseif ($_POST["buscacategoria"] == 'botes' ){
                        $query3 = " SELECT p.*, pa.altura, e.mida, b.talla, p.id_producte as producteid, e.id_producte as esquiid, pa.id_producte as palsid, b.id_producte as botesid FROM producte p, esqui e, pals pa, botes b WHERE b.id_producte=p.id_producte";
                }elseif ($_POST["buscacategoria"] == 'esqui' && $_POST["carac"] != ''){
                        $query3 = "SELECT p.*, pa.altura, e.mida, b.talla, p.id_producte as producteid, e.id_producte as esquiid, pa.id_producte as palsid, b.id_producte as botesid FROM producte p, esqui e, pals pa, botes b WHERE e.id_producte=p.id_producte ORDER by '".$_POST["carac"]."' ASC";
                }elseif ($_POST["buscacategoria"] == 'botes' && $_POST["carac"] != ''){
                         $query3 = "SELECT p.*, pa.altura, e.mida, b.talla, p.id_producte as producteid, e.id_producte as esquiid, pa.id_producte as palsid, b.id_producte as botesid FROM producte p, esqui e, pals pa, botes b WHERE b.id_producte=p.id_producte ORDER by '".$_POST["carac"]."' ASC";
                 }elseif ($_POST["buscacategoria"] == 'pals' && $_POST["carac"] != ''){
                        $query3 = "SELECT p.*, pa.altura, e.mida, b.talla, p.id_producte as producteid, e.id_producte as esquiid, pa.id_producte as palsid, b.id_producte as botesid FROM producte p, esqui e, pals pa, botes b WHERE pa.id_producte=p.id_producte ORDER by '".$_POST["carac"]."' ASC";
                }elseif ($_POST["buscacategoria"] == '' && $_POST["carac"] != ''){
                        $query3 = "SELECT p.*, pa.altura, e.mida, b.talla, p.id_producte as producteid, e.id_producte as esquiid, pa.id_producte as palsid, b.id_producte as botesid FROM producte p LEFT JOIN esqui e ON e.id_producte = p.id_producte LEFT JOIN pals pa ON pa.id_producte = p.id_producte LEFT JOIN botes b ON b.id_producte = p.id_producte ORDER by '".$_POST["carac"]."' ASC";
                        }

            if ($_POST["buscafechadesde"] != '' ){
                    $query .= " AND fecha BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."' ";
            }

            if ( $_POST['buscapreciodesde'] != '' ){
                    $query .= " AND preu >= '".$_POST['buscapreciodesde']."' ";
            }

            if ( $_POST['buscapreciohasta'] != '' ){
                    $query .= " AND preu <= '".$_POST['buscapreciohasta']."' ";
            }
                  


            if ($_POST["orden"] == '1' ){
                    $query3 .= " ORDER BY marca ASC ";
            }

            if ($_POST["orden"] == '2' ){
                    $query3 .= " ORDER BY model ASC ";
            }

            if ($_POST["orden"] == '4' ){
                    $query3 .= " ORDER BY preu ASC ";
            }

            if ($_POST["orden"] == '5' ){
                    $query3 .= " ORDER BY preu DESC ";
            }
            
          
        }


            $sql = $link->query($query);
            $sql2 = $link->query($query2);
            $sql3 = $link->query($query3);
            $numeroSql = mysqli_num_rows($sql);

            ?>
            <p style="font-weight: bold; color:midnightblue;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
    </form>


    <div class="table-responsive">
            <table class="table">
                    <thead>
                            <tr style="background-color:midnightblue; color:#FFFFFF;">
                                    <th style=" text-align: center;"> Imatge </th>
                                    <th style=" text-align: center;"> Model </th>
                                    <th style=" text-align: center;"> Marca </th>
                                    <th style=" text-align: center;"> Preu </th>
                                    <th style=" text-align: center;"> Caracteristica </th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php While(($rowSql = $sql->fetch_assoc()) && ($rowSql2 = $sql2->fetch_assoc())&& ($rowSql3 = $sql3->fetch_assoc())) {   
                            if($rowSql3['producteid']==$rowSql3['palsid']){
                        $carac = $rowSql3['altura'];
                        $valor = "ALTURA";
                        }elseif($rowSql3['producteid']==$rowSql3['esquiid']){
                        $carac = $rowSql3['mida'];
                        $valor = "MIDA";
                        }elseif($rowSql3['producteid']==$rowSql3['botesid']){
                        $carac = $rowSql3['talla'];
                        $valor = "TALLA";
                        }?>
                                
                            <tr>
                            <td style="text-align: center;"><img src="<?php echo $rowSql3["img"]; ?>" style="width: 80px; height: 80px"/></td>
                            <td style="text-align: center;"><?php echo $rowSql3["model"]; ?></td>
                            <td style="text-align: center;"><?php echo $rowSql3["marca"]; ?></td>
                            <td style=" text-align: center;"><?php echo $rowSql3["preu"]; ?> €</td>
                            <td style=" text-align: center;"><?php echo $carac; ?> <?php echo $valor; ?></td>
                            </tr>
                  
                  <?php } ?>
                    </tbody>
            </table>
    </div>




















                    </div>

                </div>
            </div>

        </div>



      </div>
</div>
<!-- END buscador basico -->







</body>
</html>








