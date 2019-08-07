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
        echo '<table border="1" style="border-collapse:collapse;">';
        $conta = 1;
        for ($i = 1; $i <= 10; $i++){
            echo "
            <tr>
                <td>
                    <div style='border:0px solid black;
                                width:65px;
                                height:65px;
                                margin-left: 15px;
                                margin-right: 15px;
                                line-height:50px;
                                font-size: 24px;
                                font-weight:bold;
                                background: transparent url(sc_1.png) no-repeat 0 0;
                                background-size: 100%;
                                vertical-align: middle;
                                cursor: pointer;'
                                >".$conta++."
                    </div>
                </td>
                <td>
                    <div style='border:1px solid black; width:50px; height:50px; margin-right:50px; text-align:center; line-height:50px;'>".$conta++."</div>
                </td>
                <td>
                    <div style='border:1px solid black; width:50px; height:50px; text-align:center; line-height:50px;'>".$conta++."</div>
                </td>
                <td>
                    <div style='border:1px solid black; width:50px; height:50px; text-align:center; line-height:50px;'>".$conta++."</div>
                </td>
            </tr>";
        }
        echo "</table>";
    ?>

    </body>
</html>