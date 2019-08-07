<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmpais.php
//Descripción:      Ubicación regional paises
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmpais extends Model
{
	//Administrador de Paises
	protected $table = "capmpais";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canombr','m_canomof','m_canomca','m_camoned',
				'm_nuvalca','m_cacodna','m_cacotel','m_caprede','m_caestad',
				'm_causreg','m_causact'];

	//Relacion con el modelo Departamentos
    public function departamentos(){
        return $this->hasMany('App\Capmdepa');
    }

    //Relacion con el modelo usuario (Registra)
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

	//Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Buscador de Paises por nombre
    public function scopeNombre($query,$nombre){
        return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    }

    //Filtro de Paises nombre oficial
    public function scopeNombre_oficial($query,$m_canomof){
        return $query->where('m_canomof','LIKE','%'.$m_canomof.'%');
    }

    //Filtro de Paises nombre capital
    public function scopeNombre_capital($query,$m_canomca){
        return $query->where('m_canomca','LIKE','%'.$m_canomca.'%');
    }

    //Filtro de Paises nombre moneda
    public function scopeNombre_moneda($query,$m_camoned){
        return $query->where('m_camoned','LIKE','%'.$m_camoned.'%');
    }

    //Filtro de Paises codigo internacional
    public function scopeCodigo_nacional($query,$m_cacodna){
        return $query->where('m_cacodna','LIKE','%'.$m_cacodna.'%');
    }

    //Filtro de Paises por Estado Activo / Inactivo (BUSQUEDA EXACTA)
    public function scopeEstado($query,$m_caestad){
        return $query->where('m_caestad','LIKE',$m_caestad);
    }

    //Filtro de Paises por Usuario registra
    public function scopeUsuario_registra($query,$m_causreg){
        return $query->where('m_causreg','LIKE','%'.$m_causreg.'%');
    }

    //Filtro de Paises por Usuario actualiza
    public function scopeUsuario_actualiza($query,$m_causact){
        return $query->where('m_causact','LIKE','%'.$m_causact.'%');
    }
}
