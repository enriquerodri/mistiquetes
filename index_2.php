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
//http://localhost:82/ticket/index_2.php 
-->

<html>
<head>

<style type="text/css">

    table td{
        border: 0px solid black;
        width:60px;
        height:60px;
        min-width:50px;
        min-height:50px;
        text-align:center;
        font-size: 22px;
        font-weight:bold;
        vertical-align: middle;
        cursor: pointer;
    }

    .grupo_01 {
        border:0px solid black;
        margin-top: 5px;
        margin-bottom: 5px;
        width:50px;
        height:50px;
        line-height:45px;
        font-size: 20px;
        font-weight:bold;
        vertical-align: middle;
        cursor: pointer;
    }

    .incluir {
        position: relative;
    }

    .incluir input {
        -webkit-appearance: none;   
        -moz-appearance: window;   
        -ms-appearance: window;  
        appearance: window; 
        position: absolute;
        cursor: pointer;
        top: 0;
        width: 38px;
        height: 38px;
    }

    .incluir input + label::before {
        position: relative;
        display: inline-block;
        background: transparent url(sc_1.png) no-repeat 0 0;
        background-size: 100%;
        cursor: pointer;
        width: 55px;
        height: 55px;
        content: "" attr(value) "";
        vertical-align: middle;
    }
    .incluir input:checked + label::before {
        background: transparent url(sc_10.png) no-repeat 0 0;
        background-size: 100%;
        cursor: pointer;
        content: "" attr(value) "";
    }

</style>
</head>
    <body>

    <?php
        echo '<table border="1" style="border-collapse:collapse;">';
        $conta = 1;
        for ($i = 1; $i <= 16; $i++){
            echo "
            <tr>
                <td>
                    <div class='grupo_01' style='margin-left: 15px; margin-right: 10px;'>
                        <div class='incluir'>
                            <input 
                                type=checkbox
                                id=".$conta."
                                title=".$conta."
                                style='border:0px solid white; float: center; color: black;'
                                value=".$conta."
                            />
                            <label
                                for =".$conta."
                                title=".$conta."
                                value=".$conta++."
                            </label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class='grupo_01'>
                        <div class='incluir'>
                            <input 
                                type=checkbox
                                id=".$conta."
                                title=".$conta."
                                style='border:0px solid white; float: center; color: black;'
                                value=".$conta."
                            />
                            <label
                                for =".$conta."
                                title=".$conta."
                                value=".$conta++."
                            </label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class='grupo_01'>
                        <div class='incluir'>
                            <input 
                                type=checkbox
                                id=".$conta."
                                title=".$conta."
                                style='border:0px solid white; float: center; color: black;'
                                value=".$conta."
                            />
                            <label
                                for =".$conta."
                                title=".$conta."
                                value=".$conta++."
                            </label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class='grupo_01'>
                        <div class='incluir'>
                            <input 
                                type=checkbox
                                id=".$conta."
                                title=".$conta."
                                style='border:0px solid white; float: center; color: black;'
                                value=".$conta."
                            />
                            <label
                                for =".$conta."
                                title=".$conta."
                                value=".$conta++."
                            </label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class='grupo_01' style='margin-right: 20px;'>
                        <div class='incluir'>
                            <input 
                                type=checkbox
                                id=".$conta."
                                title=".$conta."
                                style='border:0px solid white; float: center; color: black;'
                                value=".$conta."
                            />
                            <label
                                for =".$conta."
                                title=".$conta."
                                value=".$conta++."
                            </label>
                        </div>
                    </div>
                </td>
            </tr>";
        }
        echo "</table>";
    ?>

    </body>
</html>