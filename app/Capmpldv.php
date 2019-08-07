<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmpldv.php
//Descripción:      Planos de distribucion (vehículos)
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmpldv extends Model
{
	//Administrador Gastos de Viaje
	protected $table = "capmpldv";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canombr','m_nucapci','m_cacodna',
				'm_causreg','m_causact'];

    //Buscador de Gastos de Viaje por nombre
    public function scopeNombre($query,$nombre){
        return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    }
}