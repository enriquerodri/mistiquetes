<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmreep.php
//Descripción:      Capacitaciones conductores
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmreep extends Model
{
	//Administrador de Capacitaciones
    // TODOS LOS CAMPOS DE LA TABLA
	protected $table = "capmreep";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canuipe','m_carazso ','m_canomco',
					'm_causreg','m_causact'];

    //Relacion con el modelo Users
    public function usuarios(){
        return $this->hasMany('App\User','m_nucoemp','m_nucodig');
    }

    ////Relacion con el modelo usuario (Registra)
    //public function usuario_registra(){
    //    return $this->belongsTo('App\User','m_causreg');
    //}

	////Relacion con el modelo usuarios (Actualiza)
    //public function usuario_actualiza(){
    //    return $this->belongsTo('App\User','m_causact');
    //}

    ////Buscador de Capacitaciones por nombre
    //public function scopeNombre($query,$nombre){
    //    return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    //}
}