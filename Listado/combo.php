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

include_once ('../cm/pages/cgi/bd3.php');

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

// ************************************  Fin  Marcas *** ***********************  //



if ($Modo==100) { // Marcas OPTION
    $sql = "SELECT `idMarca`, `Marca` FROM `t_marca` ORDER BY `Marca`;";
    $segmento = mysqli_query($conexion, $sql);

    while ($row = mysqli_fetch_array($segmento)) {
        $OPT= $OPT."<option value='".$row['Marca']."'>".$row['Marca']."</option>";
    }
    $OPT= $OPT."<option value='' selected> TODAS </option>";
    print $OPT;
    mysqli_close($conexion);
}


if ($Modo==101) { // RUBRO OPTION
    $sql = "SELECT `idru`, `rubro` FROM `trubro` ORDER BY `rubro`;";
    $segmento = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_array($segmento)) {
        $OPT= $OPT."<option value='".$row['rubro']."'>".$row['rubro']."</option>";
    }
    $OPT= $OPT."<option value='' selected> TODAS </option>";
    print $OPT;
    mysqli_close($conexion);
}

?>