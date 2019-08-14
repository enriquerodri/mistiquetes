<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmascp.php
//Descripción:      Asociados Conductores y Propietarios vehículos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmdopv extends Model
{
	//Administrador Asociados - Conductores - Propietarios 
	protected $table = "capmdopv";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canombr','m_feexped','m_feinici','m_fevenci',
                            'm_canumer','m_cacateg','m_cadetal','m_cacodig',
                            'm_nuidper','m_nuidexp','m_nuidtom','m_nucodoc',
                            'm_nucocie','m_nuordoc','m_nucociu','m_cainact',
                            'm_nudiapv','m_causreg','m_causact'];

    //Relación con el modelo Documentos personas
    public function documentospersonas(){
        return $this->belongsTo('App\Capmdopv','m_nuidper');
    }

    //Relacion con el modelo usuario (Registra)
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

    //Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Filtro de Anulaciones por Estado Activo / Inactivo (BUSQUEDA EXACTA)
    public function scopeEstado($query,$m_caestad){
        return $query->where('m_caestad','LIKE',$m_caestad);
    }

   //Filtro de Divisiones por Usuario registra
    public function scopeUsuario_registra($query,$m_causreg){
        return $query->where('m_causreg','LIKE','%'.$m_causreg.'%');
    }

    //Filtro de Divisiones por Usuario actualiza
    public function scopeUsuario_actualiza($query,$m_causact){
        return $query->where('m_causact','LIKE','%'.$m_causact.'%');
    }

}