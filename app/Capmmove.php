<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmmove.php
//Descripción:      Clases o gupos de vehículos (clasificación gobierno)
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       


namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmmove extends Model
{
	//Administrador Clases de Vehículos
	protected $table = "capmmove";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canombr','m_canomse','m_cacodna','m_caestad',
				'm_nuporce','m_nupor01','m_nuval01','m_nupor02','m_nuval02',
				'm_nupor03','m_nuval03','m_nupor04','m_nuval04','m_nupor05',
				'm_nuval05','m_nupor06','m_nuval06','m_nupor07','m_nuval07',
				'm_causreg','m_causact'];

    //Buscador de Clases de Vehículos por nombre
    public function scopeNombre($query,$nombre){
        return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    }

    //Buscador de Clases de Vehículos por servicio
    public function scopeServicio($query,$m_canomse){
        return $query->where('m_canomse','LIKE','%'.$m_canomse.'%');
    }

    //Relacion con el modelo usuario (Registra)
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

    //Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Filtro de Clases de Vehículos codigo nacional
    public function scopeCodigo_nacional($query,$m_cacodna){
        return $query->where('m_cacodna','LIKE','%'.$m_cacodna.'%');
    }

    //Filtro de Clases de Vehículos por Estado Activo / Inactivo (BUSQUEDA EXACTA)
    public function scopeEstado($query,$m_caestad){
        return $query->where('m_caestad','LIKE',$m_caestad);
    }

   //APLICAR A TODOS LOS MODELOS BUSQUEDA EXACTA DE USUARIO REGISTRA - ACTUALIZA
   //Filtro de Clases de Vehículos por Usuario registra
    public function scopeUsuario_registra($query,$m_causreg){
        return $query->where('m_causreg','LIKE',$m_causreg);
    }

    //Filtro de Clases de Vehículos por Usuario actualiza
    public function scopeUsuario_actualiza($query,$m_causact){
        return $query->where('m_causact','LIKE',$m_causact);
    }
}
