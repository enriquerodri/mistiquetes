<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmcapa.php
//Descripción:      Capacitaciones conductores
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmcapa extends Model
{
	//Administrador de Capacitaciones
	protected $table = "capmcapa";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canombr','m_cacodna','m_caapesv','m_caestad',
					'm_causreg','m_causact'];

    //Relacion con el modelo usuario (Registra)
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

	//Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Buscador de Capacitaciones por Nombre
    public function scopeNombre($query,$nombre){
        return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    }

        //Filtro de Capacitaciones codigo nacional 
    public function scopeCodigo_nacional($query,$m_cacodna){
        return $query->where('m_cacodna','LIKE','%'.$m_cacodna.'%');
    }

    //Filtro de Capacitaciones aplica PESV SI / NO
    public function scopePesv($query,$m_caapesv){
        return $query->where('m_caapesv','LIKE','%'.$m_caapesv.'%');
    }

    //Filtro de Capacitaciones por Estado Activo / Inactivo
    public function scopeEstado($query,$m_caestad){
        return $query->where('m_caestad','LIKE',$m_caestad);
    }

    //Filtro de Capacitaciones por Usuario registra
    public function scopeUsuario_registra($query,$m_causreg){
        return $query->where('m_causreg','LIKE','%'.$m_causreg.'%');
    }

    //Filtro de Capacitaciones por Usuario actualiza
    public function scopeUsuario_actualiza($query,$m_causact){
        return $query->where('m_causact','LIKE','%'.$m_causact.'%');
    }
}
