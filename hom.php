<?php
/**
 * Created by PhpStorm.
 * User: Server64
 * Date: 11/11/2017
 * Time: 23:26
 */

include_once ('cm/pages/cgi/bd3.php');
$X=0;
if(isset($_GET["A"])){ $X=intval($_GET["A"]);}


	$SQL="SELECT `idArt`,`Articulo`,`Codigo`,`Oferta`,`Visible`,`Precio`,`Detalle`, `Logo`, (SELECT `rubro` FROM `trubro` WHERE `idru`=`RubroID`) AS `rubro`,(SELECT `Marca` FROM `t_marca` WHERE `idMarca`= `MarcaID`) AS `Marca` FROM `t_artweb` WHERE `idArt`=". $X  ;

	$segmento =  mysqli_query($mysqli,  $SQL);

	while ($row = mysqli_fetch_array($segmento)) {
		echo '<div id="slidingDiv" class="toggleDiv row-fluid single-project">';
		echo '<div class="span6"><img src="' . substr( $row['Logo'], 6 ) . '" alt="' . $row['Articulo'] . '" /></div>';
	 	echo '<div class="span6"><div class="project-description"><div class="project-title clearfix">';
		echo '<h3>' . $row['Articulo'] . '</h3><span class="show_hide close"><i class="icon-cancel"></i></span></div>';
		echo '<div class="project-info"><div><span>Marca: </span>' . $row['Marca'] . '</div>';
		echo '<div><span>Categoria: </span>' . $row['rubro'] . '</div>';
		echo '<div><span>Codigo: </span>' . $row['Codigo'] . '</div>';
		echo '<div><span>Precio: $ </span>' . (($row['Precio']>0)? $row['Precio']:"Consultar" ). '</div></div>';
		echo '<p> <a href="Listado/index.php?P=' . $row['Articulo'] . '" class="btn btn-primary">VER MAS</a> </p>';
		//<p>Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy.</p>
		echo '</div></div></div>';
	}
   mysqli_free_result($segmento);
   mysqli_close($mysqli);
?>

