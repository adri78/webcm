<?php  include 'contenido.php' ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Control de Stock // <?php echo $_SESSION['real']; ?></title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet"> 
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css?2" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- ****************************************************************************************************** -->
    <!-- ****************************************************************************************************** -->



</head>
<body style="margin: 10px;">
<?php
    include 'menu.php';
?> 
    <div class="row">
        <div style="margin-bottom: 12px;text-align: center;">
            <a class="btn btn-success" onclick="$('#contenido').load('webs/Marquesina.html');">Marquesina</a>
            <a class="btn btn-info" onclick="$('#contenido').load('webs/abm_rubro.html');">ABM Marcas</a>
            <a class="btn btn-primary" onclick="$('#contenido').load('webs/ABM_Articulos.html');">ABM Articulos</a>
            <a class="btn btn-primary" onclick="$('#contenido').load('webs/abm_Marca.html');">ABM Marcas</a>
        </div>
        <div id="contenido">
   <!-- **********************************************************************************************************-->
  <!-- *********************************************************************************************************** -->


            <style>
                body{
                    background: #00b8ff;
                }
                input:focus,textarea:focus{
                    background: rgb(214, 255, 163);
                }
                table{
                    background: #b2ff68;
                }

                .backED {
                    background: #fff;
                    padding: 4em; }

                .ed-modal-container {
                    position: fixed;
                    width: 100%;
                    height: 100%;
                    left: 0;
                    top: 0;
                    background: rgba(0, 0, 0, 0.9);
                    display: flex; }
                .ed-modal-container::before, .ed-modal-container::after {
                    content: "";
                    width: 2rem;
                    height: 2px;
                    background: #FFF;
                    position: absolute;
                    top: 2rem;
                    transform: rotate(45deg);
                    opacity: .6; }
                .ed-modal-container::before {
                    right: 1rem; }
                .ed-modal-container::after {
                    right: 1rem;
                    transform: rotate(-45deg); }

                .ed-modal-content {
                    width: 90%;
                    max-width: 1000px;
                    margin: auto; }
                #Visible:checked   ,#Oferta:active{
                    background-color: #4CAF50;;
                }

            </style>
            <div  id="FNArt">
                <form>

                    <h4>Articulos <span id="id">0</span></h4>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="cod">Codigo</label>
                            <input type="text" class="form-control col-lg-6" id="cod" placeholder="Codigo" style="width: 170px;float: initial;display: inline">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Mac"> <a class="btn btn-info">Marca:</a> </label>
                            <select name="Mac" id="Mac" style="font-size: 1.5em;width: 170px;">
                                <option value="Apple"> Apple </option>
                                <option value="Samgsung"> Samgsung </option>
                                <option value="LG"> LG </option>
                                <option value="Sony"> Sony </option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Rubro"> <a class="btn btn-warning">Rubro:</a> </label>
                            <select name="Rubro" id="Rubro" style="font-size: 1.5em;width: 170px;">
                                <option value="Apple"> Celulares </option>
                                <option value="Samgsung"> Accesorios </option>
                                <option value="LG"> Informatica </option>
                                <option value="Sony"> Fundas </option>

                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="Art">Articulo:</label>
                        <input type="text" class="form-control" id="Art" placeholder="Articulo">
                    </div>


                    <div class="form-group">
                        <textarea id="Detalle" rows="5" style="width: 100%;"></textarea>

                    </div>
                    <div class="col-lg-4">
                        <div class="form-group" >
                            <label for="Precio">Precio:</label>
                            <input type="text" class="form-control" id="Precio" placeholder="0.00" style="text-align: right; display: inline; width: 200px;">
                        </div>
                        <label class="btn btn-info"><input type="checkbox" id="Visible" value="1">Disponible</label><br>
                        <label class="btn btn-info"><input type="checkbox" id="Oferta" value="1">Esta en Oferta</label>
                    </div>
                    <a class="btn btn-success" id="btnGraArt"> Graba </a>
                    <a class="btn btn-danger" id="btnSalir"> Salir </a>
                </form>
            </div> <!-- Fin alta -->


            <div class="col-lg-8" >
                <a class="btn btn-primary" style="float: right;top:1px;" id="NArticulo" href="FNArt">Nuevo</a >
                <h3 id="Video">hola</h3>


                <div  id="contenido1"  class="EdModalContent">
                    <h2> jaaaaa </h2>
                    <a class="Close">Close</a>
                    <buton  class="EdClose"> aaa </buton>
                </div>

                <div  id="contenido"  class="EdModalContent">
                    <h2> AAAA </h2>
                </div>

            </div>





   <!-- ******************************************************************************************************* **  -->
   <!-- *********************************************************************************************************** -->

        </div>
    </div>
    <!-- fin row -->

    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/jquery/jquery-ui.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../js/comun.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js?1"></script>

<!-- ***********************************************************************************  -->

<script src="../js/helpers.js"></script>
<script src="../js/modal.js"></script>
<script>

    //EDModal('btnGraArt','FNArt');

</script>
<!-- ********************************************************************************** -->

<script>
    $( document ).ready(function () {
        EDModal('NArticulo' );
        $('#contenido').load('webs/Marquesina.html');
    });
</script>



</body>
</html>