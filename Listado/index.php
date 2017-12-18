<?php
$P="";
$A="";
$Articulo="";

  if(isset($_GET["P"])){ $P= trim($_GET["P"]);}
  if(isset($_GET["productos"])){ $P= trim($_GET["productos"]);}
  if(isset($_GET["A"])){ $A= $_GET["A"] ;}


?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Slabo+27px" rel="stylesheet">

    <style>
         body{ background:  #03A9F4;}
        .glyphicon {
            margin-right: 5px;
        }
        input:focus{
            background: rgb(3, 247, 254);
            border: 2px solid royalblue;
        }
        .thumbnail {
            margin-bottom: 20px;
            padding: 0px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
             height: 400px;
             overflow: hidden;
         }
         .list-group-item .thumbnail{
            height: 230px;
         }

        .item.list-group-item {
            float: none;
            width: 100%;
            background-color: #fff;
            margin-bottom: 10px;
        }
        
        .item.list-group-item:nth-of-type(odd):hover,
        .item.list-group-item:hover {
            background: #428bca;
        }
        
        .item.list-group-item .list-group-image {
            margin-right: 10px;
        }
        
        .item.list-group-item .thumbnail {
            margin-bottom: 0px;
        }
        
        .item.list-group-item .caption {
            padding: 9px 9px 0px 9px;
        }
        
        .item.list-group-item:nth-of-type(odd) {
            background: #eeeeee;
        }
        
        .item.list-group-item:before,
        .item.list-group-item:after {
            display: table;
            content: " ";
        }
        
        .item.list-group-item img {
            float: left;
        }
        
        .item.list-group-item:after {
            clear: both;
        }
        
        .list-group-item-text {
            margin: 0 0 11px;
        }

          .list-group-image{
            height: 224px !important;
            width: 258px !important;
        }
        #MARCA,#Categoria {
            line-height: 18px;
        }
        h4{
            font-family: 'Slabo 27px', serif;
        }
        .NV{ display: none;}
        #Articulos{
            min-height: 95vh;
            background: #ffffff;
            margin-left: 0.3em;
            margin-right: 0.3em;
           /* border-radius: 10px;*/
            margin-top: -20px;
        }
        .btn2{
            text-decoration: none;
            background: black;
            color: white;
            vertical-align: -webkit-baseline-middle;
            padding: 0.5em;
            border: 1px solid black;
            border-radius: 5px;
        }
         .btn2:hover{
             text-decoration: none;
             background: #0695fe;
             color: #060606;
         }
        select {
            font-size: 1.6em;
        }

    </style>


    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Roboto+Slab|Rozha+One|Timmana|Vollkorn+SC" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="well well-sm" style="min-height: 9em;">
             <div class="col-md-3">
                 <img src="../images/logo_white.png" alt="Conexiones Moviles .com.ar" style="height: 8em;">
             </div>
            <div class="col-md-9">
                <div class="col-md-8 form-group input-group">
                    <span class="input-group-addon">Buscar:</span>
                    <input type="text" class="form-control"  placeholder="Buscar" id="Buscar"  value="<?php echo $P ; ?>" autocomplete="off" onkeyup="Buscar()">
                </div>
                <div class="col-md-4">
                    <div class=" form-group input-group">
                        <span class="input-group-addon">Rubro</span>
                        <select name="Categoria" id="Categoria" >
                            <option value="">Todas</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class=" form-group input-group">
                        <span class="input-group-addon">Marca</span>
                        <select name="MARCA" id="MARCA">
                            <option value="">Todas</option>
                        </select>
                    </div>
                </div>


                    <div class="btn-group" style="float: right;">
                        <a href="../index.php" class="btn2">Menu</a>
                        <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                        </span>Lista</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span>Ficha</a>
                    </div>



            </div>
        </div>

        <div id="Articulos" class="row NV" >
<!-- **************************************************************************************************** -->
            <style>
                #Articulos img{
                    width: 100%;
                    margin-top: 20px;
                    max-height: 45em;
                    padding: 12px;
                    border: 5px solid #0cbffe;
                }

                #DTitulo{
                   font-family: 'Abril Fatface', cursive;
                    color:darkred;
                }

                .Subs{
                    font-family: 'Vollkorn SC', serif;
                }
                #TFicha{
                    font-size:24px;
                    font-family: 'Vollkorn SC', serif;
                    margin: auto;
                }
                #TFicha td:nth-child(1){
                    text-align: right;
                }

                h2{
                    font-family: 'Timmana', sans-serif;
                }
                .TC{
                     text-align: center;
                }

                /*

font-family: 'Roboto Slab', serif;
font-family: 'Vollkorn SC', serif;
font-family: 'Rozha One', serif;
font-family: 'Abril Fatface', cursive;
font-family: 'Timmana', sans-serif;

 */

            </style>

            <div class="col-md-5">
                <img src="img.jpg" alt="" id="artIMA">
            </div>
            <div class="col-md-7">
                <div class="TC">
                    <br>
                    <h1 id="DTitulo"> Articulo</h1>
                    <table id="TFicha">
                        <tr> <td> Marca:</td><td id="ArtMarca">  marca </td> </tr>
                        <tr> <td> Categoria:</td><td id="ArtCategoria"> Categoria </td> </tr>
                    </table>
                        <br>
                    <h2> Precio:$  <span id="ArtPrecio">00.00</span></h2>
                    <h4 onclick="ListaArt()" class="btn btn-success btn-lg">Volver / Comprar</h4>

                    <br>
                 <!--                ************************************************************** -->
                    <a href="whatsapp://send?text=http://www.anerbarrena.com/boton-compartir-whatsapp-4801/" data-action="share/whatsapp/share">
                        <img border="0" src="../images/whatsapp.png" style="width: 100px;height: 100px;">
                    </a>

                 <!-- /////////////////////////////////////////////////////////////////////////////// -->

                    <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
                    <meta property="og:type"          content="website" />
                    <meta property="og:title"         content="Your Website Title" />
                    <meta property="og:description"   content="Your description" />
                    <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />

                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>

                    <!-- Your like button code -->
                    <div class="fb-like"
                         data-href="https://www.your-domain.com/your-page.html"
                         data-layout="standard"
                         data-action="like"
                         data-show-faces="true">
                    </div>

                  <!--
                   <img src="redes.jpg" alt="" style="width: 95%; border: none;">
                   -->

                </div>
            </div>
            <br>
            <div class="col-md-12" style="padding: 2em;">
                <p id="ArtData"> </p>
            </div>

 <!-- **************************************************************************************************** -->
            <hr>
        </div>




        <div id="products" class="row list-group">

	    <?php
	        include_once ('../cm/pages/cgi/bd3.php');
	        $X=0;
	        $SQL="SELECT `idArt`,`Articulo`,`Codigo`,`Oferta`,`Visible`,`Precio`,`Detalle`, `Logo`, (SELECT `rubro` FROM `trubro` WHERE `idru`=`RubroID`) AS `rubro`,(SELECT `Marca` FROM `t_marca` WHERE `idMarca`= `MarcaID`) AS `Marca` FROM `t_artweb` ORDER BY `rubro`,`Marca`,`Codigo` DESC ";
	        $segmento =  mysqli_query($mysqli,  $SQL);

	        while ($row = mysqli_fetch_array($segmento)) {
		        echo '<div class="item  col-md-4 col-lg-4 X"><div class="thumbnail"  onclick="FA('.$row['idArt'] .')"><img class="group list-group-image" src="../' . substr( $row['Logo'], 6 ) . '" alt="' . $row['Articulo'] . '" />';
		        echo '<p class="Y NV">' .strtoupper($row['Articulo'] ." | ".$row['Marca']." | ". $row['rubro']) . ' </p>';
                echo '<p class="MM NV">' .$row['Marca']. '<p>';
                echo '<p class="CAT NV">' .$row['rubro']. '<p>';
		        echo '<div class="caption"><h4 class="group inner list-group-item-heading">' . $row['Articulo'] . '</h4>' ;
		        echo '<div><span>Codigo: </span>' . $row['Codigo'] . '</div><div><span>Marca: </span>' . $row['Marca'] . '</div> <div><span>Categoria: </span>' . $row['rubro'] . '</div>';
		        echo '<p class="group inner list-group-item-text">';
		        echo '<div class="row">';
		        echo '<div class="col-xs-12 col-md-6"><p class="lead"> ' . (($row['Precio']>0)? "$ ".$row['Precio']:"Consultar" ). ' </p></div><div class="col-xs-12 col-md-6">';
		        echo '<a class="btn btn-info btn-lg"> Ficha </a></div></div></div></div> </div>';

	        }
	        mysqli_free_result($segmento);
	        mysqli_close($mysqli);
	    ?>

        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
    <script>
        function Buscar() {
            var texto= document.getElementById('Buscar').value.toUpperCase().trim();
            var x= document.querySelectorAll('.X');
            var y= document.querySelectorAll('.Y');
            var Mar= document.querySelectorAll('.MM');
            var Cat= document.querySelectorAll('.CAT');
            let x1=0;
            let x2=0;
            let x3=0;
            ListaArt();

          //  if (texto.length <2){
         //       for (let i = 0; i < x.length; ++i) { x[i].style.display = "block";}
         //   }else{
                for (let i = 0; i < x.length; ++i) {
                     x[i].style.display = "none";
                     x1=0;
                     x2=0;
                     x3=0;

                   if (MM !=""){
                       if (Mar[i].innerText.indexOf(MM) > -1 ) {
                            x1=1;
                           console.log("No vio  " + Mar[i].innerText)
                       }
                   }else{

                       x1=1;
                   }


                    if (CAT !=""){
                        if (Cat[i].innerText.indexOf(CAT) > -1 ) {
                            x2=1;
                        }
                    }else{
                        x2=1;
                    }
                    if (texto !=""){
                        if (y[i].innerText.indexOf(texto) > -1 ) {
                            x3=1;
                        }
                    }else{
                        x3=1;
                    }


                    if(((x1==1) && (x2==1)) && ( x3==1)){
                        x[i].style.display = "block";
                    }

                    console.log("X1"+ x1 +" X2"+ x2 +" X3"+ x3  );

                }
           // }
        }
    </script>
    <script>
        function FA(id) {

            var d = {A: id};
            $.post("hom.php", d, function (result) {

                var Datos = result.split("|");
                document.getElementById("DTitulo").innerHTML=Datos[1];
                document.getElementById("ArtCategoria").innerHTML=Datos[5];
                document.getElementById("ArtMarca").innerHTML=Datos[2];
                document.getElementById("ArtPrecio").innerHTML=Datos[3];
                document.getElementById("artIMA").setAttribute("src","../" + Datos[6]);
                document.getElementById("ArtData").innerHTML=(Datos[7]);


                //64|Pen Drive Sandisk Cruzer Fit 16gb|Pendrive 1|360.00|Otras|Accesorios|
                // Imagen/1512613082.png|&#60;&#112;&#62;&#60;&#98;&#114;&#62;&#60;&#47;&#112;&#62;

            });
        }
        function MuestraArt(){
            var DD1;
              DD1 = <?php echo $A; ?> ;
              console.log(id);
            if ( DD1 >0) {
                FA(DD1);
                console.log("entreo");
            }
        }
     </script>
    <script>
        var MM="";
        var CAT="";
        function FichaArt() {
            var x= document.querySelectorAll('.X');
            for (let i = 0; i < x.length; ++i) {
                x[i].addEventListener("click",function () {

                    document.getElementById('Articulos').style.display="block";
                    document.getElementById('products').style.display="none";

                });
            }
        }
        function ListaArt(){
            document.getElementById('Articulos').style.display="none";
            document.getElementById('products').style.display="block";
        }

        function inicial() {
            let z= document.getElementById('Buscar');
            (z.value.length>2)? Buscar():z.focus();
        }
        $(document).ready(function() {
            $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
            inicial();
            $('#MARCA').load('combo.php?T=100');
            $('#Categoria').load('combo.php?T=101');

            document.querySelector("#MARCA").addEventListener("change", function(){
                MM=document.getElementById("MARCA").value;
                document.getElementById("Buscar").value="";
                Buscar() ;
            }, false);

            document.querySelector("#Categoria").addEventListener("change", function(){
                CAT= document.getElementById("Categoria").value;
                document.getElementById("Buscar").value="";
                Buscar();
            }, false);

            FichaArt();

            MuestraArt();

        });
    </script>

</body>

</html>