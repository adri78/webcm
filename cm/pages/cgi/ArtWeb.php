<?php
/**
 * Created by PhpStorm.
 * User: Server64
 * Date: 09/11/2017
 * Time: 2:44
 */
session_start();
// error_reporting(0);
date_default_timezone_set('America/Argentina/Buenos_Aires');
$HOY = date("Y-m-d H:i:s");

include_once ('bd3.php');

$M="";
//{M:1,ID:id,COD:Cod,Ima:ima,Art:Art,Marca:Marca,Cat:Cat,Oferta:Oferta,Visible:Visible,DETA:Deta};

if(isset($_POST["ID"])){ $ID=$_POST["ID"];  }
if(isset($_POST["M"])){ $M=$_POST["M"]; }
if(isset($_POST["COD"])){ $COD=$_POST["COD"]; }
if(isset($_POST["Ima"])){ $Ima=$_POST["Ima"]; }
if(isset($_POST["Art"])){ $Art=$_POST["Art"]; }
if(isset($_POST["Pre"])){ $Pre=$_POST["Pre"]; }
if(isset($_POST["Marca"])){ $Marca=$_POST["Marca"]; }
if(isset($_POST["Cat"])){ $Cat=$_POST["Cat"]; }
if(isset($_POST["Oferta"])){ $Oferta=$_POST["Oferta"]; }
if(isset($_POST["Visible"])){ $Visible=$_POST["Visible"]; }
if(isset($_POST["DETA"])){ $DETA= (($_POST["DETA"])); } //addslashes htmlentities



if ($M==1) { // Graba  articulo
	if ( $ID < 1 ) { // Nuevo
		$sql = "INSERT INTO `t_artweb`(`Articulo`, `Codigo`, `Oferta`, `Visible`, `Precio`, `Detalle`, `Logo`, `RubroID`, `MarcaID`) VALUES ('" ;
		$sql = $sql . $Art."','". $COD. "',".$Oferta.",".$Visible.",'".$Pre."','".$DETA."','".$Ima."','".$Cat."','".$Marca ."');";
	} else {// Actulizar
		$sql = "UPDATE `t_artweb` SET `Articulo`='".$Art."',`Codigo`='".$COD."',`Oferta`=".$Oferta.",`Visible`=".$Visible.",`Precio`='".$Pre."',`Detalle`='".$DETA."',`Logo`='".$Ima."',`RubroID`='".$Cat."',`MarcaID`='".$Marca ."' WHERE `idArt`=".$ID." ;";
	}
	//echo $sql;
	$segmento = mysqli_query($conexion,$sql);
	mysqli_close($conexion);
}

if ($M==2) { // Borrar articulo
		$sql = "DELETE FROM `t_artweb` WHERE `idArt`=".$ID." ;";
		$segmento = mysqli_query($conexion,$sql);
	    mysqli_close($conexion);
}

if ($M==3) { // ver articulo X Codigo
	$sql = "SELECT `Articulo`, `Codigo`, `Oferta`, `Visible`, `Precio`, `Detalle`, `Logo`, `RubroID`, `MarcaID` FROM `t_artweb` WHERE `idArt`='" . $ID . "';";

	$segmento = mysqli_query($conexion, $sql);
	while ($row = mysqli_fetch_array($segmento)) {
		$Articulo = $row['Articulo'];
		$Codigo = $row['Codigo'];
		$Oferta = $row['Oferta'];
		$Visible= $row['Visible'];
		$MarcaID= $row['MarcaID'];
		$Precio = $row['Precio'];
		$Detalle = $row['Detalle'];
		$Logo = $row['Logo'];
		$RubroID= $row['RubroID'];

		print "$ID|$Articulo|$Codigo|$Oferta|$Visible|$MarcaID|$Precio|$Detalle|$Logo|$RubroID";

	}
	mysqli_close($conexion);
}

/*/ ************************************  ABM RUBROS *** ***********************  //
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
*/

?>