<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmruta.php
//Descripción:      Rutas regitradas organización empresarial
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmruta extends Model
{
	//Administrador Rutas autorizadas
	protected $table = "capmruta";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canombr','m_camapas','m_cacodna','m_caestad',
				'm_nucoori','m_nucodes','m_cacondu',
				'm_nukilom','m_catiemp','m_catipos','m_caclase',
				'm_caresol','m_feresol',
				'm_causreg','m_causact'];

    //Relacion con el modelo Ciudades origen
    public function ciudades_origen(){
        return $this->belongsTo('App\Capmciud','m_nucoori');
    }

    //Relacion con el modelo Ciudades origen
    public function ciudades_destino(){
        return $this->belongsTo('App\Capmciud','m_nucodes');
    }

	//Buscador de Rutas autorizadas por nombre
    public function scopeNombre($query,$nombre){
        return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    }

    //Filtro de Rutas por nombre por ciudades (BUSQUEDA EXACTA)
    public function scopeNombre_ciudad_origen($query,$m_nucociu){
        return $query->where('m_nucoori','LIKE',$m_nucociu);
    }

    //Filtro de Rutas por nombre por ciudades (BUSQUEDA EXACTA)
    public function scopeNombre_ciudad_destino($query,$m_nucociu){
        return $query->where('m_nucodes','LIKE',$m_nucociu);
    }

    //Relacion con el modelo usuario (Registra)
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

    //Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Filtro de Rutas autorizadas codigo nacional
    public function scopeCodigo_nacional($query,$m_cacodna){
        return $query->where('m_cacodna','LIKE','%'.$m_cacodna.'%');
    }

    //Filtro de Rutas autorizadas por Estado Activo / Inactivo (BUSQUEDA EXACTA)
    public function scopeEstado($query,$m_caestad){
        return $query->where('m_caestad','LIKE',$m_caestad);
    }

   //APLICAR A TODOS LOS MODELOS BUSQUEDA EXACTA DE USUARIO REGISTRA - ACTUALIZA
   //Filtro de Rutas autorizadas por Usuario registra
    public function scopeUsuario_registra($query,$m_causreg){
        return $query->where('m_causreg','LIKE',$m_causreg);
    }

    //Filtro de Rutas autorizadas por Usuario actualiza
    public function scopeUsuario_actualiza($query,$m_causact){
        return $query->where('m_causact','LIKE',$m_causact);
    }

}