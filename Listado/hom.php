<?php
/**
 * Created by PhpStorm.
 * User: Server64
 * Date: 11/11/2017
 * Time: 23:26
 */

include_once ('../cm/pages/cgi/bd3.php');
$X=0;
if(isset($_POST["A"])){ $X=intval($_POST["A"]);}

  if($X>0) {
    $SQL="SELECT `idArt`,`Articulo`,`Codigo`,`Oferta`,`Visible`,`Precio`,`Detalle`, `Logo`, (SELECT `rubro` FROM `trubro` WHERE `idru`=`RubroID`) AS `rubro`,(SELECT `Marca` FROM `t_marca` WHERE `idMarca`= `MarcaID`) AS `Marca` FROM `t_artweb` WHERE `idArt`=". $X  ;
 //print $SQL;
    $segmento =  mysqli_query($mysqli,  $SQL);

    $row = mysqli_fetch_array($segmento);
    print $row['idArt'].'|'. $row['Articulo'] .'|'.$row['Codigo'] .'|'.(($row['Precio']>0)? $row['Precio']:"Consultar" ).'|' . $row['Marca'] .'|'. $row['rubro'] .'|'. substr( $row['Logo'], 6 ) . '|'.html_entity_decode($row['Detalle']);

    mysqli_close($mysqli);
  }

?>

