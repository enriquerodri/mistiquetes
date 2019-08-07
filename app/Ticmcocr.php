<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Ticmcocr.php
//Descripción:      Contratos clientes crédito
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticmcocr extends Model
{
	//Administrador Tipos de contratos crédito
	protected $table = "ticmcocr";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canuico','m_canuipe','m_caobjet','m_caticon',
				'm_cacoven','m_fefeini','m_fevenci','m_nuvalco','m_nuvalti',
				'm_nusaldo','m_caautor','m_caestad','m_causreg','m_causact'];

    //Buscador de Tipos de contratos crédito por id
    public function scopeNuipe($query,$nuipe){
        return $query->where('m_canuipe','LIKE','%'.$nuipe.'%');
    }
}