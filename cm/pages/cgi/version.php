<?php 
	//error_reporting(0);

include_once ('bd3.php');
     $Dato=intval($_GET["V"]);

  $sql="SELECT `ver` FROM `t_version` WHERE `idv`='".$Dato."' LIMIT 1;";

         $segmento = mysqli_query($conexion,$sql);
             while ($row = mysqli_fetch_array($segmento)){
                        $Ver=$row['ver'] ;
  					    print "$Ver";
                   }    
     mysqli_close($conexion);
             print "5";
 ?>