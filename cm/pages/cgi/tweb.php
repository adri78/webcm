<?php

// error_reporting(0);
date_default_timezone_set('America/Argentina/Buenos_Aires');
$HOY = date("Y-m-d H:i:s");

include_once ('bd3.php');

$modo="";
$Total=0;
$x=0;

if(isset($_GET["T"])){ $modo=$_GET["T"]; }
if(isset($_GET["L"])){ $Local=$_GET["L"];}
if(isset($_GET["D"])){ $D=$_GET["D"]; }
if(isset($_GET["desde"])){ $Desde=$_GET["desde"] ." 00:00:00" ; }
if(isset($_GET["hasta"])){ $Hasta=$_GET["hasta"]." 23:59:59"  ; }


if ($modo==1) { // Tabla maquesina
	$sql = "SELECT `id_maq`, `Titulo`, `Stitulo`, `Detalle`, `imagen`, `Link` FROM `t_maque` ORDER BY `id_maq`";
	$segmento = mysqli_query( $conexion, $sql );
	$tabla = "";
	while ( $row = mysqli_fetch_array( $segmento ) ) {
		$tabla = $tabla . '<tr data-id="' . $row['id_maq']. '"> <td><img src="../WebMaq/' . $row["imagen"] . '"></td><td><h3>' . $row["Titulo"] . '</h3></td><td> <a
                                class="btn btn-danger borra">Borrar</a> </td></tr>';
	}

	echo $tabla;
}

if ($modo==2) { // Tabla Rubro
	$sql = "SELECT `idru`, `rubro` FROM `trubro` ORDER BY `rubro` ASC";
	$segmento = mysqli_query( $conexion, $sql );
	$tabla = "";
	while ( $row = mysqli_fetch_array( $segmento ) ) {
		$tabla = $tabla . '<tr data-id="' . $row["idru"]. '"> <td> ' . $row["rubro"] . '  <a
                                class="btn btn-danger borra2">Borrar</a> </td></tr>';
	}

	echo $tabla;
}


if ($modo==3) { // Tabla Rubro
	$sql = "SELECT `idMarca`, `Marca`, `Logo` FROM `t_marca`ORDER BY `Marca` ASC";
	$segmento = mysqli_query( $conexion, $sql );
	$tabla = "";
	while ( $row = mysqli_fetch_array( $segmento ) ) {
		$tabla = $tabla . '<tr data-id="' . $row["idMarca"]. '"><td><img src="' . $row["Logo"] . '" alt="' . $row["Marca"] . '"></td>   <td> ' . $row["Marca"] . '</td> <td> <a
                                class="btn btn-danger borra3">Borrar</a> </td></tr>';
	}

	echo $tabla;
}

if ($modo==4) { // Tabla Rubro
    $sql = "SELECT `idArt`, `Articulo`, `Codigo`, `Oferta`, `Visible`, `Precio`, `Logo`, ( SELECT `rubro` FROM `trubro` WHERE `idru`=`RubroID`) as rubro, (SELECT `Marca` FROM `t_marca` WHERE `idMarca`=`MarcaID`) as marca FROM `t_artweb` ORDER BY `Articulo` ASC";
    $segmento = mysqli_query( $conexion, $sql );
    $tabla = "";
    while ( $row = mysqli_fetch_array( $segmento ) ) {

        $tabla = $tabla .  '<tr data-id="'.$row["idArt"].'"> <td><img src="'.$row["Logo"].'" ></td><td>' . $row["marca"] . '</td><td>' . $row["rubro"] . ' </td><td>' . $row["Articulo"] . '</td><td>'.$row["Precio"].'</td><td><a class="btn btn-danger B"> Eliminar</a></td></tr>';
        
    }

    echo $tabla."<script> DetaArt(); </script>";
}

mysqli_close($conexion);
?>