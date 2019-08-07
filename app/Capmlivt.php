<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmlivt.php
//Descripción:      Líneas para clasificación vehículos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       


namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmlivt extends Model
{
	//Administrador Líneas de Vehículos 
	protected $table = "capmlivt";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canombr','m_cacodna','m_nucomar','m_caestad',
							'm_causreg','m_causact'];


    //Relación con la modelo Marca
    public function marca_vehiculo(){
        return $this->belongsTo('App\Capmmave','m_nucomar');
    }

    //Relacion con el modelo usuario (Registra)
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

	//Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Buscador de Líneas de Vehículos por nombre
    public function scopeNombre($query,$nombre){
        return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    }

    //Filtro de Compañías aseguradoras por ciudades (BUSQUEDA EXACTA)
    public function scopemarcas_vehiculos($query,$m_nucomar){
        return $query->where('m_nucomar','LIKE',$m_nucomar);
    }

    //Filtro de Anulaciones codigo nacional
    public function scopeCodigo_nacional($query,$m_cacodna){
        return $query->where('m_cacodna','LIKE','%'.$m_cacodna.'%');
    }

    //Filtro de Anulaciones por Estado Activo / Inactivo (BUSQUEDA EXACTA)
    public function scopeEstado($query,$m_caestad){
        return $query->where('m_caestad','LIKE',$m_caestad);
    }

    //Filtro de Anulaciones por Usuario registra
    public function scopeUsuario_registra($query,$m_causreg){
        return $query->where('m_causreg','LIKE','%'.$m_causreg.'%');
    }

    //Filtro de Anulaciones por Usuario actualiza
    public function scopeUsuario_actualiza($query,$m_causact){
        return $query->where('m_causact','LIKE','%'.$m_causact.'%');
    }

}