<?php
/**
 * Created by PhpStorm.
 * User: Server64
 * Date: 27/10/2017
 * Time: 21:49
 */

  session_start();
  // error_reporting(0);
date_default_timezone_set('America/Argentina/Buenos_Aires');
$HOY = date("Y-m-d H:i:s");

include_once ('bd3.php');

  $Modo="";
$OPT="";
if(isset($_GET["ID"])){ $ID=$_GET["ID"]; }
if(isset($_GET["T"])){ $Modo=$_GET["T"]; }



if(isset($_POST["ID"])){ $ID=$_POST["ID"];  }
if(isset($_POST["T"])){ $Modo=$_POST["T"]; }
if(isset($_POST["Titulo"])){ $Titulo= ( trim ( $_POST["Titulo"])); }
if(isset($_POST["Stitulo"])){ $Stitulo=( trim ( $_POST["Stitulo"])); }
if(isset($_POST["Detalle"])){ $Detalle=(trim ( $_POST["Detalle"])); }

if(isset($_POST["imagen"])) {$imagen=$_POST["imagen"] ;}else{ $imagen= "../WebMaq/NoImagen.png";}
if(isset($_POST["Link"])) { $Link=$_POST["Link"]; }else { $Link= "";}

if(isset($_POST["P1"])){ $P1=$_POST["P1"]; }
if(isset($_POST["P2"])){ $P2=$_POST["P2"]; }
if(isset($_POST["P3"])){ $P3=$_POST["P3"]; }
if(isset($_POST["S1"])){ $S1=$_POST["S1"]; }
if(isset($_POST["S2"])){ $S2=$_POST["S2"]; }
if(isset($_POST["S3"])){ $S3=$_POST["S3"]; }
if(isset($_POST["Cat"])){ $Cat=$_POST["Cat"]; }

 // *******************************  Maqeuesina ***************************** //
if ($Modo==1) { // ver articulo Borrar
	$sql= "DELETE FROM `t_maque` WHERE `id_maq`=".$ID.";";
	$segmento = mysqli_query($conexion,$sql);

	mysqli_close($conexion);
}// Fin Ver Articulo

if ($Modo==2) { // ver articulo Alta
	if ( $ID < 1 ) { // Nuevo
		$sql = "INSERT INTO `t_maque`(`Titulo`, `Stitulo`, `Detalle`, `imagen`, `Link`) VALUES ('" . $Titulo;
		$sql = $sql . "','" . $Stitulo . "','" . $Detalle . "','" . $imagen . "','" . $Link . "');";
	} else {// Actulizar
		$sql = "UPDATE `t_maque` SET `Titulo`='" . $Titulo . "',`Stitulo`='" . $Stitulo . "',`Detalle`='" . $Detalle . "',`imagen`='" . $imagen . "',`Link`='" . $Link . "' WHERE `id_maq`=" . $ID . " ;";
	}
	echo $Detalle."****".$sql;
	$segmento = mysqli_query($conexion,$sql);
	mysqli_close($conexion);
}//  Fin o Alta

if ($Modo==3) { // ver articulo X Codigo
		$sql = "SELECT `id_maq`, `Titulo`, `Stitulo`, `Detalle`, `imagen`, `Link` FROM `t_maque` WHERE `id_maq`='" . $ID . "';";

	$segmento = mysqli_query($conexion, $sql);
	while ($row = mysqli_fetch_array($segmento)) {
		$ID = $row['id_maq'];
		$Titulo = $row["Titulo"];
		$Stitulo = $row["Stitulo"];
		$Detalle = $row["Detalle"];
		$imagen = $row["imagen"];
		$Link = $row["Link"];

		print "$ID|$Titulo|$Stitulo|$Detalle|$imagen|$Link";
	}
	mysqli_close($conexion);
}
// ***********************************  Fin Marquesina ************************ //

// ************************************  ABM RUBROS *** ***********************  //
if ($Modo==5) { // ver Rubros
	$sql = "DELETE FROM `trubro` WHERE `idru`=" . $ID . ";";
	print $sql;
	$segmento = mysqli_query($conexion,$sql);
	mysqli_close($conexion);
}

if ($Modo==6) { // ver articulo Alta
	if ( $ID < 1 ) { // Nuevo
		$sql = "INSERT INTO `trubro`(`rubro`) VALUES ('" . $Titulo. "');";
	} else {// Actulizar
		$sql = "UPDATE `trubro` SET `rubro`='" . $Titulo . "' WHERE `idru`=" . $ID . " ;";
	}
	$segmento = mysqli_query($conexion,$sql);
	mysqli_close($conexion);
}//  Fin o Alta

if ($Modo==7) { // ver articulo X Codigo
	$sql = "SELECT `idru`, `rubro` FROM `trubro` WHERE `idru`='" . $ID . "';";

	$segmento = mysqli_query($conexion, $sql);
	while ($row = mysqli_fetch_array($segmento)) {
		$ID = $row['idru'];
		$Rubro = $row['rubro'];

		print "$ID|$Rubro";
	}
	mysqli_close($conexion);
}
// ************************************  Fin  RUBROS *** ***********************  //

// ************************************  ABM Marcas *** ***********************  //
if ($Modo==10) { // ver Rubros
	$sql = "DELETE FROM `t_marca` WHERE `idMarca`=" . $ID . ";";
	print $sql;
	$segmento = mysqli_query($conexion,$sql);
	mysqli_close($conexion);
}

if ($Modo==11) { // ver articulo Alta
	if ( $ID < 1 ) { // Nuevo
		$sql = "INSERT INTO `t_marca`( `Marca`, `Logo`) VALUES ('" . $Titulo. "','". $imagen ."');";
	} else {// Actulizar
		$sql = "UPDATE `t_marca` SET `Marca`='" . $Titulo . "',`Logo`='". $imagen ."' WHERE `idMarca`=" . $ID . " ;";
	}
	$segmento = mysqli_query($conexion,$sql);
	mysqli_close($conexion);
}//  Fin o Alta

if ($Modo==12) { // ver articulo X Codigo
	$sql = "SELECT `idMarca`, `Marca`, `Logo` FROM `t_marca` WHERE `idMarca`='" . $ID . "';";

	$segmento = mysqli_query($conexion, $sql);
	while ($row = mysqli_fetch_array($segmento)) {
		$ID = $row['idMarca'];
		$Marca = $row['Marca'];
		$IMA = $row['Logo'];

		print "$ID|$Marca|$IMA";
	}
	mysqli_close($conexion);
}
// ************************************  Fin  Marcas *** ***********************  //



if ($Modo==100) { // Marcas OPTION
    $sql = "SELECT `idMarca`, `Marca` FROM `t_marca` ORDER BY `Marca`;";
    $segmento = mysqli_query($conexion, $sql);

    while ($row = mysqli_fetch_array($segmento)) {
        $OPT= $OPT."<option value='".$row['idMarca']."'>".$row['Marca']."</option>";
    }
    print $OPT;
    mysqli_close($conexion);
}


if ($Modo==101) { // RUBRO OPTION
    $sql = "SELECT `idru`, `rubro` FROM `trubro` ORDER BY `rubro`;";
    $segmento = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($segmento)) {
        $OPT= $OPT."<option value='".$row['idru']."'>".$row['rubro']."</option>";
    }
    print $OPT;
    mysqli_close($conexion);
}

?>