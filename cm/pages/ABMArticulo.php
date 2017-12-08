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
    <style>
        .alta{
          /* padding-top: 1em;*/
            width: 90%;
            position: relative;
            padding: 1em 0.5em;
            font-size: 1.2em;
        }
        .centrar{
            margin-right: auto;
            margin-left: auto;
        }
        table.paleBlueRows {
            font-family: "Times New Roman", Times, serif;
            border: 1px solid #FFFFFF;
            background: white;
            width: 90%;
            padding: 0.9em;
            text-align: center;
            border-collapse: collapse;
            max-height: 360px;
            overflow: scroll;
            padding-top: 1em;

        }
        table.paleBlueRows td, table.paleBlueRows th {
            border: 1px solid #FFFFFF;
            padding: 3px 2px;
        }
        table.paleBlueRows tbody td {
            font-size: 13px;
        }
        table.paleBlueRows tr:nth-child(even) {
            background: #D0E4F5;
        }
        table.paleBlueRows thead {
            background: #04a47f;
            border-bottom: 5px solid #FFFFFF;
        }
        table.paleBlueRows thead th {
            font-size: 17px;
            font-weight: bold;
            color: #FFFFFF;
            text-align: center;
            border-left: 2px solid #FFFFFF;
        }
        table.paleBlueRows thead th:first-child {
            border-left: none;
        }
        table.paleBlueRows img{
            width: 100px;
            height: 100px;
        }
        table.paleBlueRows td:nth-child(2) {
           font-size: 1.5em;
        }
       #contenido{
           background: turquoise;
           height: 100vh;
       }
        #BTArt tr:hover{background: #c6ffba !important;}
        #BTArt tr:nth-child(even){ background: #1ed1ff; }
        #BTArt td:nth-child(1){ width: 100px;font-size: 18px;}
        #BTArt td:nth-child(2),#BTArt td:nth-child(3){ width: 140px; font-size: 18px;}
        #BTArt td:nth-child(4){  font-size: 20px;}
        #BTArt td:nth-child(6){ width: 70px;font-size: 18px;}
        #BTArt td:nth-child(5){ width: 110px;text-align: right;color:darkred;font-size: 18px;padding-right:15px; }
        SELECT{ font-size: 18px;}
    </style>


</head>
<body style="margin: 10px;">
<?php
    include 'menu.php';
?> 
    <div class="row">
        <div id="contenido">
   <!-- **********************************************************************************************************-->
  <!-- *********************************************************************************************************** -->

            <div class="centrar alta">
                <div class="col-lg-1"> <a href="Articulo.php" class="btn btn-danger"> Nuevo </a></div>
                <div class="col-lg-6">
                    <div class=" form-group input-group">
                        <span class="input-group-addon">Buscar:</span>
                        <input type="text" class="form-control" placeholder="Buscar" id="BUS" autocomplete="off" >
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class=" form-group input-group">
                        <span class="input-group-addon">Marca</span>
                            <select name="MARCA" id="MARCA">
                                <option value="">Todas</option>
                            </select>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class=" form-group input-group">
                        <span class="input-group-addon">Rubro</span>
                        <select name="Categoria" id="Categoria" >
                                <option value="">Todas</option>
                        </select>
                    </div>
                </div>


            </div>


            <table id="Art" class="paleBlueRows centrar sortable">
                <thead>
                <tr><th>Ima</th> <th>Marca</th> <th>Rubro </th><th>Articulo </th><th>Precio </th><th>Menu</th</tr>
                </thead>
                <tbody id="BTArt">
                <tr> <td><img src="../WebMaq/NoImagen.png" ></td><td>Marca </td><td>Rubro </td><td>Articulo base </td><td> 0.00 </td><td> <a class="btn"> Eliminar</a></td></tr>

                </tbody>
            </table>

   <!-- ******************************************************************************************************* **  -->
   <!-- *********************************************************************************************************** -->

        </div>
    </div>
    <!-- fin row -->

    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../js/comun.js"></script>
     <script src="../js/sorttable.js"></script>
    <!-- DataTables JavaScript
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>-->
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js?1"></script>

<!-- ***********************************************************************************  -->

<script>
    function VArt(id) {
        window.location='Articulo.php?A='+id;
    }
    function BArt(id) {
        var d = {M: 2, ID: id};
        $.post("cgi/ArtWeb.php", d, function (result) {
            alert("Borrado");
            location.reload();
        });
    }
    function DetaArt(){
            let X= document.querySelectorAll('#BTArt tr');
            let B= document.querySelectorAll('#BTArt .B');
  console.log( X.length);
             for(let y=0;y < X.length; y++ ) {
                X[y].addEventListener("click", function (e) {
                    e.preventDefault();
                    VArt(this.getAttribute('data-id'));
                });

                B[y].addEventListener("click", function (e) {
                    e.preventDefault();
                    e.cancelBubble = true;
                    if (e.stopPropagation) e.stopPropagation();
                    if(confirm("Seguro que quiere borrar el ARTICULO?")){
                        BArt( B[y].parentNode.parentNode.getAttribute('data-id'));
                    }
                });
            }
    }
  (function () {
      $('#MARCA').load('cgi/CWeb.php?T=100');
      $('#Categoria').load('cgi/CWeb.php?T=101');
      $('#BTArt').load('cgi/tweb.php?T=4');

      document.getElementById("BUS").focus();
    } )();
</script>
<script>
    jQuery.extend(jQuery.expr[":"],
        {
            "contiene-palabra": function (elem, i, match, array) {
                return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
            }
        });

    $("#BUS").keyup(function () {/* ******************    Motor del Buscador      ******************************************** */
        if (jQuery(this).val() != "") {
            jQuery("#Art tbody>tr").hide();
            jQuery("#Art td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();

        }
        else {
            jQuery("#Art tbody>tr").show();
        }
    });
</script>

</body>
</html>