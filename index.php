<!DOCTYPE html>
<html lang="es">
<?php
    include_once ('cm/pages/cgi/bd3.php');
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Conexiones Moviles</title>
        <!-- Load Roboto font -->
        <link href="https://fonts.googleapis.com/css?family=Acme|EB+Garamond|Crimson+Text|Spectral+SC" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css?v2" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <style>
            #service .span4{
                height: 370px;
            }

            .client-slider img{
                 background: #f8f8f8;
                 height: 200px;
                 width: 350px;
            }
            #portfolio-grid img{
                width: 370px;
                height: 283px
            }
            .thumbnail h3:hover{
                color: #04eafe !important;
            }
            .Formulario1 input{
                text-align: center;
            }
            .Formulario1 input:focus{
                background: aqua;
            }
            .map-wrapper a{
                font-family: 'Oswald', sans-serif;
            }

            .map-wrapper a:hover{
                color:royalblue;
            }

            #Respuesta{
                width: 100%;
                display: none;
                min-height: 250px;
                background: #ffffff;
                border-radius: 20px;
                border: 2px solid #166dba;
                color:black;
                padding-left: 15px;
                font-family: 'Acme', sans-serif;
            }
            .FEB{
                font-family: 'EB Garamond', serif;
            }
            .FSUB{
                 text-decoration: underline;
                padding-right: 1em;
            }
            .R2{
                color:darkred;
            }
            .da-img img{
                max-height: 80vh;
                min-height: 30vh;
            }
            .pa6{
                padding: 6px;
            }

            .thumbnail{
                height: 415px;
                overflow: hidden;
            }
        </style>
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="images/logo.png" width="140" height="50" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li class="active"><a href="#home">INICIO</a></li>
                            <li><a href="#Servicios">Servicios</a></li>
                            <li><a href="/Listado/index.php">Tienda</a></li>
                            <li><a href="#Ofertas">Ofertas</a></li>
                            <li><a href="#Reparacion">Reparaciones</a></li>
                            <li><a href="#Contacto">Contacto</a></li>
                        </ul>

                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- Start home section -->
        <div id="home">
            <!-- Start cSlider -->
            <div id="da-slider" class="da-slider">
                <div class="triangle"></div>
                <!-- mask elemet use for masking background image -->
                <div class="mask"></div>
                <!-- All slides centred in container element -->
                <div class="container">
                    <!-- Start first slide -->

                    <?php
                        if (mysqli_connect_errno($mysqli)) {
                            echo 'Falló al conectar a MySQL: ' . mysqli_connect_error();
                        }

                    $resultado = mysqli_query($mysqli, "SELECT `id_maq`, `Titulo`, `Stitulo`, `Detalle`, `imagen`, `Link` FROM `t_maque` ");

                    /* Imprimir filas */
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                      ?>
                      <div class="da-slide">
                        <h2 class="fittext2" style="font-family: 'Spectral SC', serif;"> <?php echo $fila['Titulo'] ."</h2>";
                        echo "<h4>" . $fila['Stitulo']."</h4>";
                        echo "<p style='font-family: 'Crimson Text', serif'>".$fila['Detalle']."</p>";
                        if ((strlen ($fila['Link']))>2){
	                            echo '<a href="'.$fila['Link'].'" class="da-link button">Ver Tienda</a>';
                        }

                        echo '<div class="da-img"><img src="'.substr ($fila['imagen'],6).'" alt="'.$fila['Titulo'].'" > </div> </div>';


                    }
	                        mysqli_free_result($resultado);

	                        ?>

                    <!-- Start cSlide navigation arrows -->
                    <div class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </div>
                    <!-- End cSlide navigation arrows -->
                </div>
            </div>
        </div>
        <!-- End home section -->
        <!-- Service section start -->
        <div class="section primary-section" id="Servicios">
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <h1>Quienes somos?</h1>
                    <!-- Section's title goes here -->
                    <p>Somos una empresa dedicada a mejorar y aconsejar en el area de telecomunicaciones  e informatica .</p>
                    <!--Simple description for section goes here. -->
                </div>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="images/Service1.png" alt="service 1">
                            </div>
                            <h3>Locales a la calle</h3>
                            <p>Años de experiencia, con cientos de clientes satifechos,tanto de equipos nuevos como de reparaciones, dan fe de nuestro buen trato y responsabilidad.</p>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="images/Service2.png" alt="service 2" />
                            </div>
                            <h3>Cuentas claras</h3>
                            <p>Nuestros presupuestos y costos son claros, tanto con equipos nuevos, como en reparaciones. Evitando sorpresas desagradables o gastos extras por malas reparaciones</p>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="images/Service3.png" alt="service 3">
                            </div>
                            <h3>Documeto impreso</h3>
                            <p>Cada operacion posee un documento, remito o factura que lo respalda.Podiendo evacuar cualquier duda </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service section end -->
        <!-- Portfolio section start -->
        <div class="section secondary-section " id="Ofertas">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1 style="font-family: 'Crimson Text', serif;">OFERTAS</h1>
                    <p>Estas son ofertas expecialmente selecionadas para nuestros clientes.</p>
                </div>
                <ul class="nav nav-pills">
                    <li class="filter" data-filter="all">
                        <a href="#noAction">Todos</a>
                    </li>
	                <?php
	                $resultado = mysqli_query($mysqli, "SELECT `idru`, `rubro` FROM `trubro` order BY `rubro` ");
	                while ($fila = mysqli_fetch_assoc($resultado)) {

		                echo '<li class="filter" data-filter="' . $fila['rubro'] . '"><a href="#noAction">' . $fila['rubro'] . '</a></li>';
	                }
	                mysqli_free_result($resultado);
	                ?>
                </ul>
                <!-- Start details for portfolio project 1 -->
                <div id="single-project">



                    <!-- End details for portfolio project 1 -->
                </div>

                    <ul id="portfolio-grid" class="thumbnails row">
 <?php
     $SQL="SELECT `idArt`,`Articulo`,`Codigo`,`Oferta`,`Visible`,`Precio`,`Detalle`, `Logo`, (SELECT `rubro` FROM `trubro` WHERE `idru`=`RubroID`) AS `rubro`, `MarcaID` FROM `t_artweb` WHERE `Oferta`= 1 AND `Visible`=1" ;
     $resultado = mysqli_query($mysqli,  $SQL);
        while ($fila = mysqli_fetch_assoc($resultado)) {
             echo ' <li class="span4 mix '. $fila['rubro']. '"><div class="thumbnail">';
             echo '<img src="'.substr ($fila['Logo'],6) . '" alt="'. $fila['Articulo']. '">';
             echo ' <a href="#single-project" class="more show_hide" rel="#slidingDiv" onclick="FART('. $fila['idArt']. ')"> <i class="icon-plus"></i></a>';
            echo '<h3>'. $fila['Articulo']. '</h3> <p> COD: '. $fila['Codigo']. '</p><div class="mask"></div></div></li>';
         //    echo ' <a href="#single-project" class="more show_hide" rel="#slidingDiv"> <i class="icon-plus"></i></a>';
         //    echo '<h3>'. $fila['Articulo']. '</h3> <p> COD: '. $fila['Codigo']. '</p><div class="mask"></div></div></li>';


        }
        mysqli_free_result($resultado);
 ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Portfolio section end -->

        <!-- About us section start -->
        <div class="section primary-section">
            <div class="triangle"></div>
            <!-- ************************************************************************ -->
            <div class="section third-section">
                <div class="container centered">
                    <div class="sub-section">
                        <div class="title clearfix">
                            <div class="pull-left">
                                <h3>Marcas y lineas de equipos</h3>
                            </div>
                            <ul class="client-nav pull-right">
                                <li id="client-prev"></li>
                                <li id="client-next"></li>
                            </ul>
                        </div>

                        <ul class="row client-slider" id="clint-slider">
	                        <?php
                                $resultado = mysqli_query($mysqli, "SELECT `idMarca`, `Marca`, `Logo` FROM `t_marca` ORDER BY `Marca`;");
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                   echo '<li><a href="Listado/index.php?P='. $fila['Marca'] . '">';
                                   echo '<img src="'.substr ($fila['Logo'],6) . '" alt="'. $fila['Marca'] . '"></a></li>;';
                                }
                                mysqli_free_result($resultado);
	                        ?>
                        </ul>
                    </div>
                    <a href="Listado/index.php" style="margin-top: 2em;color:#168efe;">
                        <h2> Visite Nuestro catalogo online</h2>
                        <img src="Listado/cata.jpg" alt="Ver Catalogo OnLine" style="width: 70%;border-radius: 15px;">
                    </a>
                
                </div>
            </div>
            <hr>
            <!-- *********************************************************************** -->


            <div class="container"  id="Reparacion">
                <div class="title">
                    <h1>Reparaciones</h1>
                    <p>Técnicos especialistas, repuestos originales, rapidez, calidad y responsabilidad.</p>
                </div>
                <div class="row-fluid team">
                    <div class="span4" id="first-person">
                        <div class="thumbnail">
                            <img src="images/orden.jpg" alt="team 1">
                            <h3>Orden ejemplo</h3>

                            <div class="mask">
                                <h2>Ve el estado de tu equipo</h2>
                                <p>Solo coloca el Numero de Orden </p> <p> y el Nº de serie de tu equipo </p><p> que estan en la Orden de Trabajo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span8" id="second-person">
                        <div class="thumbnail" style="background: whitesmoke">

                            <h3 class="Formulario1" >Nº de Orden: <input type="text" name="NOrden" id="NOrden" maxlength="5"></h3>
                            <h3 class="Formulario1" >Nº de Serie: <input type="text" name="NSerie" id="NSerie" maxlength="5"></h3>
                            <br>
                            <a class="button" id="BVerEstado" onclick="VerEstaTel()">Ver Estado</a>
                            <br>
                        </div>
                        <hr>
                        <div id="Respuesta">
                            <h2><span class="FSUB">Cliente:</span> <span id="Cliente" class="FEB"></span></h2>
                            <h3><span class="FSUB">El equipo:</span> <span id="Equipo" class="FEB"></span></h3>
                            <h2><span class="FSUB">Falla:</span> <span id="Falla" class="FEB"></span></h2>
                            <h3><span class="FSUB">Estado:</span><span id="Estado" class="btn btn-success"></span> <span class="FSUB">  Tecnico </span><span id="Tecnico" class="FEB R2"></span></h3>
                            <h4 style="text-align: center;"><span class="FSUB">Debe:</span> <span id="Debe" class="FEB"></span></h4>
                        </div>

                        <h4 style="text-align: center">Recuerde que por su seguridad ningun equipo se entregara sin su Orden de Servicio Impresa</h4>

                    </div>

                </div>

                <div class="row-fluid">

                </div>
            </div>
        </div>
        <!-- About us section end -->
        <div class="section secondary-section">
            <div class="triangle"></div>

        <!-- Contact section start -->
        <div id="Contacto" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>Contacto</h1>
                        <p>No dude en conocernos, nuestros locles esperan su visita, donde muchas otras ofertas lo esperan.</p>
                    </div>
                </div>
                <div class="map-wrapper">


                      <h4  style="ext;text-align: center;" >
                          <div class="span4">
                             Email:  <a href="mailto:info@conexionesmoviles.com.ar">info@conexionesmoviles.com.ar</a>
                          </div>
                          <div class="span4">
                              <a href="https://www.facebook.com/conexionesmoviles1/" target="_blank">
                                  <span> <img src="images/facebook_circle_color-256.png" height="35" width="35"/> </span> conexionesmoviles1
                              </a>
                          </div>
                          <div class="span4">
                              <a href="https://www.instagram.com/conexionesmoviles/" target="_blank">
                                  <span> <img src="images/instagram.png" height="35" width="35"/></span> /conexionesmoviles
                              </a>
                          </div>
                      </h4>

                    <div class="span6" style="ext;text-align: center;">
                        <h2>Salta 1391, San Jose (Adrogue)</h2>
                         <p><a href="tel:01142363568"> (011) 4236-3568 </a></p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6554.608825872617!2d-58.35535146829224!3d-34.77311111757526!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a32cde9634e0c5%3A0x8d12001d2cacb01a!2sSalta+1391%2C+B1844GWQ+San+Jose%2C+Buenos+Aires%2C+Argentina!5e0!3m2!1ses-419!2sus!4v1508858812398" width="90%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="span6" style="ext;text-align: center;">
                        <h2>Ricardo Rojas 973 (Burzaco)</h2>
                        <p><a href="tel:0113870-700"> (011) 3870-700 </a></p>

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3275.264628715147!2d-58.3916772843238!3d-34.82443847671802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcd4a3f02f6c43%3A0xbe85f5a22d38d91!2sRicardo+Rojas+973%2C+Burzaco%2C+Buenos+Aires%2C+Argentina!5e0!3m2!1ses-419!2sus!4v1508859368475" width="90%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                </div>
                <div class="container" style="display: block">

                </div>
            </div>
        </div>
        <!-- Contact section edn -->
        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; Power by  <a href="#">Adri78</a></p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script async="" defer="" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/app.js"></script>
            <script>
                function FART(id) {
                    location.href='/Listado/index.php?A='+id;
                    //$("#single-project").load("hom.php?A="+id, function (res){});//
                }

                function VerEstaTel(){

                    let NOreden= document.getElementById('NOrden').value;
                    let NSerie= document.getElementById('NSerie').value;

                    var d={NOreden:NOreden,NSerie:NSerie};
                    $.post("VTel.php", d, function(result) {
                        console.log (result);
                        let estado="En espera";
                        let DClass ="";
                        if(  result== "NO...NO...NO" ){
                            alert(" Por favor verifique los datos ingresados o comuniquese con la surcursal");
                        }else{
                            var Datos = result.split("|");
                            document.getElementById('Cliente').innerHTML=Datos[0];
                            document.getElementById('Equipo').innerHTML=Datos[1];
                            document.getElementById('Falla').innerHTML=Datos[2];

                            switch(parseInt(Datos[3])) {
                                case 0:
                                    estado="En espera";
                                    DClass =" btn-primary";
                                    break;
                                case 1:
                                    estado="Sin Reparación";
                                    DClass ="btn-danger ";
                                    break;
                                case 2:
                                    estado="Re presupuestar";
                                    DClass =" btn-warning ";
                                    break;
                                case 4:
                                    estado="Reparado";
                                    DClass =" btn-success";
                                    break;
                                case 5:
                                    estado="Entregado";
                                    DClass =" btn-success";
                                    break;
                                default:
                                    estado=" Sin datos";
                                    DClass =" btn-info";

                            }

                            document.getElementById('Estado').innerHTML=estado;
                            document.getElementById('Estado').className = DClass + " pa6" ;
                            document.getElementById('Tecnico').innerHTML= Datos[4];
                            document.getElementById('Debe').innerHTML=" $ " + Datos[5];
                            document.getElementById('Respuesta').style.display="block";
                        } // Fin if

                    }); //fin ajax

                }

            </script>

            <!--Start of Tawk.to Script-->
            <script type="text/javascript">
                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                (function(){
                    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                    s1.async=true;
                    s1.src='https://embed.tawk.to/59ef8de2c28eca75e4627f29/default';
                    s1.charset='UTF-8';
                    s1.setAttribute('crossorigin','*');
                    s0.parentNode.insertBefore(s1,s0);
                })();
            </script>
            <!--End of Tawk.to Script-->

           <?php  mysqli_close($mysqli);    ?>
    </body>
</html>