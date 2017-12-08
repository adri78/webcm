<?php
/**
 * Created by PhpStorm.
 * User: Server64
 * Date: 12/11/2017
 * Time: 13:54
 */
include_once ('cm/pages/cgi/bd3.php');
$NOreden="";
$NSerie="";

if(isset($_POST["NOreden"])){ $NOreden= substr($_POST["NOreden"],0,5) ;}
if(isset($_POST["NSerie"])){ $NSerie= substr( $_POST["NSerie"],0,5);}

$sql="SELECT `idEqui`, `Cliente`, `Telefono`, `Equipo`, `Emai`, `Num`, `Monto`, `Senia`, `Restan`, `UE`, `UT`, `UV`, `Falla`, `Tecnico`, `FE`, `FT`, `FV`, `Chip`, `Tapa`, `Bateria`, `Memo`, `Local`, `Estado` FROM `t_equipo` WHERE `Num`= '".$NOreden."' AND `Emai`='".$NSerie."' ORDER BY `idEqui` DESC LIMIT 1";

$segmento =  mysqli_query($mysqli,$sql);
while ($row = mysqli_fetch_array($segmento)) {
	print $row['Cliente']."|".$row['Equipo']."|".$row['Falla']."|".$row['Estado']."|".$row['Tecnico']."|".$row['Restan']."|" ;

	//print $row['idEqui']."|".$row['Cliente']."|".$row['Equipo']."|".$row['Monto']."|".$row['Senia']."|".$row['Restan']."|".$row['Falla']."|".$row['Estado']."|".$row['FT'] ;
}
print "NO...NO...NO";
mysqli_free_result($segmento);
mysqli_close($mysqli);

?>