<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           index.blade.php
//Descripción:      Página principal: Venta de tiquetes
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
//http://localhost:82/ticket/index.php 
-->

<html>
<head>
<style type="text/css">

    table td{
        border: 0px;
        min-width:50px;
        min-height:50px;
        text-align:center;
        margin-top: 15px;
        margin-left: 15px;
        margin-right: 15px;
        margin-bottom: 15px;
        font-size: 24px;
        font-weight:bold;
    }

</style>
</head>
    <body>
        <?php

        $aSala=array('id_sala'=>1,'fila'=>5,'columna'=>5);
        $aReservacion[]=array('id_reservacion'=>1,'id_sala'=>1,'cliente'=>'SARAI RODRIGUEZ CAICEDO','butaca'=>'0:1');
        $aReservacion[]=array('id_reservacion'=>7,'id_sala'=>1,'cliente'=>'ENRIQUE RODRIGUEZ VIVAS','butaca'=>'1:4');
         
        function pComprobarReservacion($aReservacion,$butaca=""){
            $aDatosButaca=array();
            foreach($aReservacion as $row){
                if($row['butaca']==$butaca){
                    $aDatosButaca=$row;break;
                }
            }
            return $aDatosButaca;
        }
         
         
        $fila=$aSala['fila'];$columna=$aSala['columna'];
        echo '<table border="1" style="border-collapse:collapse;">';
        for($f=0;$f<$fila;$f++){
            echo '<tr>';
            for($c=0;$c<$columna;$c++){
                $butaca_temp=$f.":".$c;
                $aDatosButaca=pComprobarReservacion($aReservacion,$butaca_temp);
                $estilo="";$titulo="";
                if(count($aDatosButaca)>0){
                    $estilo='style="position: relative;
                        background-color:#FFFFFF;
                        display: inline-block;
                        background: transparent url(sc_10.png) no-repeat 0 0;
                        background-size: 100%;
                        cursor: pointer;
                        width: 38px;
                        height: 38px;
                        vertical-align: middle;
                        "';
                    $titulo='title="'.$aDatosButaca['cliente'].'"';
                    $objeto='class="incluir";
                        input type="checkbox";
                        id="silla_01";
                        title="SELECCIONAR";
                        style="border:1px solid white; float: left; color: black;";
                        ';
                    }
                else
                    {
                        $estilo='style="position: relative;
                            background-color:#1DE039;
                            display: inline-block;
                            background: transparent url(sc_1.png) no-repeat 0 0;
                            background-size: 100%;
                            cursor: pointer;"';
                        $titulo='title="Libre"';
                        $objeto='class="incluir";
                            input type="checkbox";
                            id="silla_01";
                            title="SELECCIONAR";
                            style="border:1px solid white; float: left; color: black;";
                            ';
                    }
                
                echo '<td '.$estilo.' '.$titulo.' '.$objeto.' >'.$butaca_temp.'</td>';
            }
            echo '</tr>';
        }
        echo '<table>';

        ?>
    </body>
</html>