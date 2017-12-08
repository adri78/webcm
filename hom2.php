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
if(isset($_GET["M"])){ $M=intval($_GET["M"]);}

	$SQL="SELECT `idArt`,`Articulo`,`Codigo`,`Oferta`,`Visible`,`Precio`,`Detalle`, `Logo`, (SELECT `rubro` FROM `trubro` WHERE `idru`=`RubroID`) AS `rubro`,(SELECT `Marca` FROM `t_marca` WHERE `idMarca`= `MarcaID`) AS `Marca` FROM `t_artweb` ORDER BY `rubro`,`Marca`,`Codigo` DESC ";

	$segmento =  mysqli_query($mysqli,  $SQL);

	while ($row = mysqli_fetch_array($segmento)) {


	echo '<div class="item  col-xs-4 col-lg-4"><div class="thumbnail"><img class="group list-group-image" src="' . substr( $row['Logo'], 6 ) . '" alt="' . $row['Articulo'] . '" />';
    echo '<div class="caption"><h4 class="group inner list-group-item-heading">' . $row['Articulo'] . '</h4>' ;
		echo '<div><span>Codigo: </span>' . $row['Codigo'] . '</div> / <div><span>Marca: </span>' . $row['Marca'] . '</div>// <div><span>Categoria: </span>' . $row['rubro'] . '</div>';
		echo '<p class="group inner list-group-item-text">';
   // Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
    echo '<div class="row">';
    echo '<div class="col-xs-12 col-md-6"><p class="lead">$  ' . (($row['Precio']>0)? $row['Precio']:"Consultar" ). ' </p></div><div class="col-xs-12 col-md-6">';
    echo '<a class="btn btn-success" href="#"> Ficha </a></div></div></div></div> </div>';

	}
   mysqli_free_result($segmento);
   mysqli_close($mysqli);
?>

