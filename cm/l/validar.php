<?php session_start(); ?>

<?php

$usuario = substr ( $_POST['nn'],0,10);
$pass = md5( substr (  $_POST['np'],0,10));


if(empty($usuario) || empty($pass)){
	header("Location:../index.php");
    echo'<script>window.location="../index.php" </script> ';
	exit();
}

$sql="SELECT * from ver where (( U='" . $usuario . "') and (P='".$pass."'));";

//echo $sql;

include('../pages/cgi/bd3.php');



$segmento =  mysqli_query($mysqli,  $sql);

while ($row = mysqli_fetch_array($segmento)) {

   if($row['P'] ==  $pass ){

		$_SESSION['usuario'] = $usuario;
        $_SESSION['ok1'] = 1;
        $_SESSION['Local1'] =$row['L'];
        $_SESSION['real'] =$row['nreal'];
        $_SESSION['AMSJ']=$row['idver'];

		header("Location:../pages/index.php");

        echo'<script>window.location="../pages/index.php" </script> ';

   	exit();
   }else{

	   header("Location: ../index.php");

	   echo'<script>window.location="../index.php" </script> ';
	   exit();
   }
}

	 header("Location: ../index.php");

    echo'<script>window.location="../index.php" </script> ';
	exit();



// SELECT `idver`, `U`, `P`, `L`, `A` FROM `ver` WHERE 1
/*
header("Location: ../index.php");
session_start();
$_SESSION['usuario'] = $usuario;
$_SESSION['ok1'] = 1;
$_SESSION['Local1'] =2;
header("Location: ../pages/index.php");
/* */

/*
  // CIERRE DE SESIONES POR INACTIVIDAD

    $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");

    if(isset($_SESSION['usuario'])){
    $fechaGuardada = $_SESSION['ultimoAcceso'];
    $ahora = date("Y-n-j H:i:s");
    $tiempoTranscurrido = (strtotime($ahora)-strtotime($fechaGuardada);
    if($tiempo_transcurrido >= 2000) {   // 2 minutos
        session_destroy();
      header("Location: logout.php");
    }
    else {
        $_SESSION['ultimoAcceso'] = $ahora;
    }
    }

// FIN CIERRE DE SESIONES POR INACTIVIDAD
 *
 */
?>