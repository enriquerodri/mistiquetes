<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Captaudi.php
//Descripción:      UbicaciónCaptaudiregional ciudades
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App;

use Illuminate\Database\Eloquent\Model;

class Captauco extends Model
{
	//Administrador de Ciudades
	protected $table = "captauco";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canombr','m_caestad','m_causreg','m_causact'];

}
