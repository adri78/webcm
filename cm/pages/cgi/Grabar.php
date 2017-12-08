<?php
  // error_reporting(0); 
date_default_timezone_set('America/Argentina/Buenos_Aires');
$HOY = date("Y-m-d H:i:s");

include_once ('bd3.php');

  $modo="";
  $Obs="";
  $UNUM=1;
  $Y2=0;

if(isset($_POST["M"])){ $M=$_POST["M"];}
if(isset($_POST["Local"])){ $Local=$_POST["Local"]; }
if(isset($_POST["Cliente"])){ $Cliente=$_POST["Cliente"]; }
if(isset($_POST["DNI"])){ $DNI=$_POST["DNI"]; }
if(isset($_POST["Email"])){ $Email=$_POST["Email"]; }
if(isset($_POST["Total"])){ $Total=$_POST["Total"]; }
if(isset($_POST["Control"])){ $Control=$_POST["Control"]; }
if(isset($_POST["Fecha"])){ $Fecha=$_POST["Fecha"]; }
if(isset($_POST["Num"])){ $Num=$_POST["Num"]; }
if(isset($_POST["ID"])){ $ID=$_POST["ID"];}
if(isset($_POST["IDGraba"])){ $IDGraba=$_POST["IDGraba"];}
if(isset($_POST["Precio"])){ $Precio=$_POST["Precio"];}
if(isset($_POST["Obs"])){ $Obs=$_POST["Obs"];}
if(isset($_POST["Serial"])){ $Serial=$_POST["Serial"];}
if(isset($_POST["Stock"])){ $Stock=$_POST["Stock"];}
if(isset($_POST["X2"])){ $X2=$_POST["X2"];}
//{M:1,Local:Local,Cliente:Cliente,DNI:DNI,Email:Email,Control:Control,Total:Total };

 
if ($M==1) { // Graba la venta
      // Actuliza Num
    $sql="SELECT max(`Num`)+1 as U FROM `t_venta` WHERE Local='".$Local."';";  
    $segmento = mysqli_query($conexion,$sql);
    while ($row = mysqli_fetch_array($segmento)){ $UNUM=$row['U'] ;}

    if($UNUM < 1){
        $UNUM=1;
    }

    $sql= "INSERT INTO `t_venta`( `Fecha`, `Cliente`, `DNI`, `Email`, `Total`, `Control`, `Local`,`Num`,`estado`) VALUES (";
    $sql= $sql . "CURRENT_TIMESTAMP,'".$Cliente."','".$DNI ."','".$Email."','".$Total."','".$Control."','".$Local."','". $UNUM."','1');";
   // echo $sql;
    $segmento = mysqli_query($conexion,$sql);  
    //$sql="select LAST_INSERT_ID;";

    //$sql="SELECT max(`IdV`) as U FROM `t_venta` WHERE Local='".$Local."';";
    $segmento = mysqli_query($conexion,"SELECT LAST_INSERT_ID() ;");
    while ($row = mysqli_fetch_array($segmento)){ $ID=$row[0] ;}
    //$ID=mysql_insert_id();

    print $ID;
   mysqli_close($conexion);
      
}// Fin Grabar
if ($M==2) { // Graba Articulos

// {M:2,IDGraba:IDGraba,ID:idArt,Precio:Precio,Obs:Obs,Serial:Serial }; 
// `IdD`, `Vid`, `ArtID`, `Precio`, `OBS`, `Serial`

                $sql= "INSERT INTO `t_detalle` (`IdD`, `Vid`, `ArtID`, `Precio`, `OBS`, `Serial`) VALUES (NULL, '";
                $sql= $sql .$IDGraba. "','".$ID."','".$Precio."','".$Obs."','". $Serial."');";

                $segmento = mysqli_query($conexion,$sql);
                mysqli_close($conexion);

}// Fin Grabar Articulos
if ($M==3) { // Descarga -Stock     {M:3,Local:Local,ID:ArtID,Stock:Cant}; 
    if ($Local==1){  $sql= "UPDATE `t_art` SET `S1`= S1-".$Stock ." WHERE `idart`=".$ID ." ;";  }
    if ($Local==2){  $sql= "UPDATE `t_art` SET `S2`= S2-".$Stock ." WHERE `idart`=".$ID ." ;";  }
    if ($Local==3){  $sql= "UPDATE `t_art` SET `S3`= S3-".$Stock ." WHERE `idart`=".$ID ." ;";  }

    $segmento = mysqli_query($conexion,$sql);  
    mysqli_close($conexion);     
}// // Descarga Stock
if ($M==4) { // Descarga +Stock     {M:3,Local:Local,ID:ArtID,Stock:Cant}; 
    if ($Local==1){  $sql= "UPDATE `t_art` SET `S1`= S1+".$Stock ." WHERE `idart`=".$ID ." ;";  }
    if ($Local==2){  $sql= "UPDATE `t_art` SET `S2`= S2+".$Stock ." WHERE `idart`=".$ID ." ;";  }
    if ($Local==3){  $sql= "UPDATE `t_art` SET `S3`= S3+".$Stock ." WHERE `idart`=".$ID ." ;";  }

    $segmento = mysqli_query($conexion,$sql);  
    mysqli_close($conexion);     
}// // Descarga Stock
if ($M==5){// Borrar Pedido.
    $sql="DELETE FROM `t_pedir` WHERE `idP`=".$ID.";";
    $segmento = mysqli_query($conexion,$sql);
    mysqli_close($conexion);
}
if ($M==6){// Grabar Pedido.
    $sql="INSERT INTO `t_pedir`( `ArtID`, `C`, `L`, `Q`, `Estado`, `FP`, `FB`) VALUES ('";
    $sql= $sql.$ID."','".$Total."','".$Local."','".$Cliente."','1',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP );";
    $segmento = mysqli_query($conexion,$sql);
    mysqli_close($conexion);
}
if ($M==7){// Grabar Compras.
    $sql="INSERT INTO `t_compras` (`idProve`, `Fecha`, `Compro`, `Total`, `Pago`) VALUES ('";
    $sql= $sql.$ID."','".$Fecha."','".$Serial."','".$Total."','".$Precio."');";
    $segmento = mysqli_query($conexion,$sql);
    $segmento = mysqli_query($conexion,"SELECT LAST_INSERT_ID() ;");
    while ($row = mysqli_fetch_array($segmento)){ $ID=$row[0] ;}
    //$ID=mysql_insert_id();

    print $ID;
    mysqli_close($conexion);
}
if ($M==8){// Grabar Compras. detalle // IDGraba: IDGraba, ID: idArt, Precio: Costo, Stock: cantidad,Local:Lugar};
    $sql="INSERT INTO `t_dc` ( `Cid`, `ArtID`, `Cantidad`, `Costo`, `Destino`) VALUES ( '";
    $sql= $sql.$IDGraba."','".$ID."','".$Stock."','".$Precio."','".$Local."');";
    $segmento = mysqli_query($conexion,$sql);

    //print $sql;
    mysqli_close($conexion);
}
if ($M==9){// Levanta info de garantia
    //*********************************************************************
    $sql="SELECT `IdD`,`Articulo`, `Precio`, `OBS`, `Serial`, `Fecha`, `Cliente`, `Local`, `Num` FROM `t_detalle`,`t_venta`,`t_art` WHERE ((`IdV`=`Vid`) AND (`ArtID`=`idart`))";
    $sql=$sql." AND ( `IdD`='".$ID."') ";

   $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

    $segmento = mysqli_query($conexion,$sql);
     $row = mysqli_fetch_array($segmento);

        if ($row["Local"] == 1) {
            $LOC = "Adrogue";
        };
        if ($row["Local"] == 2) {
            $LOC = "Burzaco";
        };
        if ($row["Local"] == 3) {
            $LOC = "Deposito";
        };

        $id=$row["IdD"];
        $art=$row["Articulo"];
        $precio=  $row["Precio"] ;
        $obs=$row["OBS"];
        $serial=$row["Serial"];
        $fecha= substr ($row["Fecha"],0,10) ;
        $cliente= $row["Cliente"];
        $num=str_pad($row["Num"], 6, "0", STR_PAD_LEFT) ;

        print "$id|$art|$precio|$obs|$serial|$fecha|$cliente|$LOC|$num" ;

    mysqli_close($conexion);
}
if ($M==10){// Grabar clientes NC.

    //M:10,Num:dni,Serial:tel,ID:id,Precio:estimado,Total:Local,Cliente:cliente,Obs:nota,Email:email,Local:Local};
     if($ID<1){
         $sql="INSERT INTO `t_cliente`(`dni`, `tel`, `email`, `Cliente`, `Estado`, `Local`, `Nota`, `Cuenta`, `OpLiquida`, `FechLiqui`) VALUES ('";
         $sql= $sql.$Num."','".$Serial."','".$Email."','".$Cliente ."','1','".$Local."','".$Obs."',0,'0','".$HOY."');";
        // echo $sql;
     }

    $segmento = mysqli_query($conexion,$sql);
    $segmento = mysqli_query($conexion,"SELECT LAST_INSERT_ID() ;");
    while ($row = mysqli_fetch_array($segmento)){ $ID=$row[0] ;}
    //$ID=mysql_insert_id();

    print $ID;
    mysqli_close($conexion);
}

if ($M==11){// Grabar Pago clientes NC.  ID:idCli, Precio:monto, Serial:nota};
    $sql="SELECT max(`nnc`)+1 as U FROM `t_nc` WHERE `Local` ='".$Local."';";
    $segmento = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_array($segmento);
    if(isset($row['U'])){ $UNUM=$row['U'];}else {$UNUM=1;}

    $sql="INSERT INTO `t_nc`( `cliid`, `opid`, `nnc`, `fecha`, `monto`, `Nota`,`Local`,`estado`) VALUES ('";
    $sql= $sql.$ID."','".$Control."','".$UNUM."',CURRENT_TIMESTAMP,'".$Total."','".$Obs."','".$Local."','1');";
  // print $sql. "// ";
    $segmento = mysqli_query($conexion,$sql);
    $segmento = mysqli_query($conexion,"SELECT LAST_INSERT_ID() ;");
    while ($row = mysqli_fetch_array($segmento)){ $ID=$row[0] ;}
    //$ID=mysql_insert_id();

    print $ID;
    mysqli_close($conexion);
}

if ($M==12){// Leer Nota del Pie
    $sql="SELECT `Pie` FROM `varios` WHERE `idVarios`='1';";
    $segmento = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_array($segmento);
    if(isset($row['Pie'])){ $UNUM=$row['Pie'];}else {$UNUM="*****";}
    $segmento = mysqli_query($conexion,$sql);
    print $UNUM;
    mysqli_close($conexion);
}// FIN Leer Nota del Pie

if ($M==13){// Graba Nueva Nota Pie;
    $sql="UPDATE `varios` SET `Pie`='".$Serial ."' WHERE `idVarios`='1'; ;";
    
    $segmento = mysqli_query($conexion,$sql);

    mysqli_close($conexion);
}// Fin Graba Nueva Nota Pie;

if ($M==1000){// Graba Nueva Nota Pie;
    $sql="UPDATE `t_venta` SET `estado`='2' WHERE `IdV`='".$ID."' ;"; // Anula factura.
    $segmento = mysqli_query($conexion,$sql);
        if($Local=="1") {$ajustar="`S1`=(`S1`+1)";}
        if($Local=="2") {$ajustar="`S2`=(`S2`+1)";}
        if($Local=="3") {$ajustar="`S3`=(`S3`+1)";}

    $segmento = mysqli_query($conexion,"SELECT `ArtID` FROM `t_detalle` WHERE `Vid`='".$ID."'");
    while ($row = mysqli_fetch_array($segmento)){
           echo "**".$row[0]."/";
            $sql2="UPDATE `t_art` SET ".$ajustar." WHERE `idart`='".$row[0]."'; " ;
           echo $sql2;
            $segmento2 = mysqli_query($conexion,$sql2);
        }

  /*  $sql="UPDATE `t_art` SET ".$ajustar." WHERE `idart`=(SELECT `ArtID` FROM `t_detalle` WHERE `Vid`='".$ID."')";
        print $sql;
    $segmento = mysqli_query($conexion,$sql);// buscar x num y devolver x id de articulo +1 stock x local
*/
     print "Factura Anulada";

    mysqli_close($conexion);
}//