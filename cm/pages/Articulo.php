<?php
    include 'contenido.php' ;
    $ID =0;
    if(isset($_GET["A"])){ $ID = intval($_GET["A"]); }
    
?>

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
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/codemirror.min.css">
    <link href="css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="css/froala_style.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/jquery.atwho.min.css">
    <style>

        input[type="checkbox"]+ label {
            background: #cbcbcb;
            color: #fff;
            width: 100%;
            padding: 5px 15px;
            border-radius: 20px;
            text-align: center;
        }
         label:before {
            border-radius: 3px;
        }
         input[type="checkbox"] {
            display: none;
             background: #75c02a;
        }
         input[type="checkbox"]:checked + label:before {
             background: #d94d09;
            /*display: none;*/
        }
        input[type="checkbox"]:checked + label {
            background: #d96a0d;
            color: #fff;
            padding: 5px 15px;
            border-radius: 20px;
        }
        input:focus, select:hover {
            background: #eebec4;
        }

    </style>


</head>
<body style="margin: 10px;background: #92c230">
<?php
    include 'menu.php';
?> 
    <div class="row">

        <div id="contenido">
   <!-- **********************************************************************************************************-->
  <!-- *********************************************************************************************************** -->

            <h3>ABM Articulos - <span id="id"><?php echo $ID; ?></span></h3>

            <div class="col-lg-3">
                <img src="../WebMaq/NoImagen.png" alt="Articulo" id="eImg" style="width: 100%;">
                <input type="file" id="Cima">
            </div>

            <div class="col-lg-9"  style="padding: 0px 25px 30px 0px;">
                <h3><div class=" form-group input-group">
                        <span class="input-group-addon">Articulo</span>
                        <input type="text" name="Articulo" id="Articulo" style="width:100%;">
                    </div>
                </h3>

                <div class="col-lg-4">
                    <h3>
                        <div class=" form-group input-group">
                            <span class="input-group-addon">Marca</span>
                            <select name="MARCA" id="MARCA">
                                <option value="">Todas</option>
                            </select>
                        </div>
                     </h3>
                </div>
                <div class="col-lg-4">
                    <h3>
                        <div class=" form-group input-group">
                            <span class="input-group-addon">Rubro</span>
                            <select name="Categoria" id="Categoria" >
                                <option value="">Todas</option>
                            </select>
                        </div>
                    </h3>
                </div>
                <div class="col-lg-4">
                    <h3><div class=" form-group input-group">
                            <span class="input-group-addon">Precio</span>
                            <input type="text" name="PRECIO" id="PRECIO"  style="width:200px;text-align: right;" maxlength="14">
                        </div>
                    </h3>
                </div>
                <div class="col-lg-4">
                    <h3><div class=" form-group input-group">
                            <span class="input-group-addon">Codigo</span>
                            <input type="text" name="COD" id="COD"  style="width:200px;text-align: center;" maxlength="14">
                        </div>
                    </h3>
                </div>
                <div class="col-lg-4">
                    <h3> <input  type="checkbox" name="Oferta" id="Oferta"> <label for="Oferta">OFERTA</label></h3>
                </div>
                <div class="col-lg-4">
                    <h3><input  type="checkbox" name="Visible" id="Visible"><label for="Visible">Visible</label> </h3>
                </div>


               <!-- <textarea name="Descripcio" id="Descripcio" style="width: 100%" rows="10"></textarea> -->
            </div></div>



   <!-- ******************************************************************************************************* **  -->
   <!-- *********************************************************************************************************** -->

        </div>
    </div>
    <!-- fin row -->

<div id="froala-editor">
    <p></p>
</div>
<hr>
<style>
    .anchos{
        width: 40%;
        min-width: 200px;
    }
</style>
<div style="text-align: center">
<a class="btn btn-success btn-lg anchos" onclick="GrabarArt();">GRABAR</a> <a href="ABMArticulo.php"  class="btn btn-danger btn-lg anchos"> Salir</a></div>
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
<script type="text/javascript" src="js/jquery.atwho.min.js"></script>
<script type="text/javascript" src="js/codemirror.min.js"></script>
<script type="text/javascript" src="js/xml/xml.min.js"></script>
<script type="text/javascript" src="js/froala_editor.pkgd.min.js"></script>
<script>
    function uploadAjax(F,C) {
        let inputFileImage = document.getElementById(F);
        let file = inputFileImage.files[0];
        var data = new FormData();
        data.append('archivo', file);
        let url = "upload.php?c="+ C ;
        $.ajax({
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            processData: false,
            cache: false
        }).done(function(data){
            //alert(data.msg);
            document.getElementById('eImg').setAttribute("src",data.msg);

        });
    }
    function FileAjax(F,C) {
        const a= document.getElementById(F).addEventListener("change",function () {
            uploadAjax(F,C);
        });
    }
</script>
<script>
    $(function() {
        var datasource = ["info", "ventas", "charly" ];

        var names = $.map(datasource, function (value, i) {
            return {
                'id': i, 'name': value, 'email': value + "@conexionesmoviles.com.ar"
            };
        });

        // Define config for At.JS.
        var config = {
            at: "@",
            data: names,
            displayTpl: '<li>${name} <small>${email}</small></li>',
            limit: 200
        }
        // Initialize editor.
        $('#froala-editor')
            .on('froalaEditor.initialized', function (e, editor) {
                editor.$el
                    .atwho(config)
                    .on('inserted.atwho', function () {
                        editor.$el.find('.atwho-inserted').removeAttr('contenteditable');
                    })

                editor.events.on('keydown', function (e) {
                    if (e.which == $.FroalaEditor.KEYCODE.ENTER && editor.$el.atwho('isSelecting')) {
                        return false;
                    }
                }, true);
            })
            .froalaEditor()
    });
</script>
<script>
    var encodeHtmlEntity = function(str) {
        var buf = [];
        for (var i=str.length-1;i>=0;i--) {
            buf.unshift(['&#', str[i].charCodeAt(), ';'].join(''));
        }
        return buf.join('');
    };
    var decodeHtmlEntity = function(str) {
        return str.replace(/&#(\d+);/g, function(match, dec) {
            return String.fromCharCode(dec);
        });
    };
</script>
<script>

    function VerArt(id) {
        var d = {M: 3, ID: id};



        $.post("cgi/ArtWeb.php", d, function (result) {

            let Datos = result.split("|"); //"$ID|$Articulo|$Codigo|$Oferta|$Visible|$MarcaID|$Precio|$Detalle|$Logo|$RubroID";
            document.getElementById('id').innerHTML = Datos[0];
            document.getElementById('Articulo').value = Datos[1];
            document.getElementById('COD').value = Datos[2];
            document.getElementById('Oferta').checked = Datos[3];
            document.getElementById('Visible').checked = Datos[4];
            document.getElementById('MARCA').value = Datos[5];
            document.getElementById('PRECIO').value = Datos[6];
            //document.getElementById('froala-editor').value =Datos[7];
           document.getElementsByClassName("fr-view")[0].innerHTML=decodeHtmlEntity(Datos[7]);
            document.getElementById('eImg').setAttribute("src", Datos[8]);
            document.getElementById('Categoria').value = Datos[9];

        });
    }

    function GrabarArt(e) {
        let id= document.getElementById('id').innerHTML;
        let Cod= document.getElementById('COD').value;
        let ima=document.getElementById('eImg').getAttribute("src");
        let Art= document.getElementById('Articulo').value;
        let Marca= document.getElementById('MARCA').value;
        let Cat= document.getElementById('Categoria').value;
        let Pre= document.getElementById('PRECIO').value;
        let Oferta=document.getElementById('Oferta').checked ;
        let Visible=document.getElementById('Visible').checked ;

        var x = document.getElementsByClassName("fr-view");
        var Deta=encodeHtmlEntity(x[0].innerHTML);

        var d={M:1,ID:id,COD:Cod,Ima:ima,Art:Art,Marca:Marca,Cat:Cat,Oferta:Oferta,Visible:Visible,DETA:Deta,Pre:Pre};

        $.post("cgi/ArtWeb.php", d, function(result) { window.location="ABMArticulo.php"});
    }
</script>
<script>
    (function () {
         $('#MARCA').load('cgi/CWeb.php?T=100');
         $('#Categoria').load('cgi/CWeb.php?T=101');
         FileAjax( "Cima",3);
         let x=parseInt(document.getElementById('id').innerHTML);
         if (x>0){  VerArt(x); }
    } )();
</script>

</body>
</html>