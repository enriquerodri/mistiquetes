<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmciud.php
//Descripción:      Ubicación regional ciudades
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       


namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmciud extends Model
{
	//Administrador de Ciudades
	protected $table = "capmciud";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canombr','m_canomco','m_cacodna','m_nucodep','m_canuind',
					'm_caestad','m_causreg','m_causact'];

	//Relación con el modelo Departamento
    public function departamento(){
        return $this->belongsTo('App\Capmdepa','m_nucodep');
    }

    //Relacion con el modelo usuario (Registra)
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

    //Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Buscador de ciudades por nombre
    public function scopeNombre($query,$nombre){
        return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    }

    //Buscador de ciudades por departamento 
    public function scopeDepartamento($query,$nombre){
        return $query->where('m_nucodep','LIKE',$Departamento);
    }

    //Filtro de ciudades por departamento (BUSQUEDA EXACTA)
    public function scopeNombre_departamento($query,$m_nucodep){
        return $query->where('m_nucodep','LIKE',$m_nucodep);
    }

    //Filtro de Divisiones codigo nacional
    public function scopeCodigo_nacional($query,$m_cacodna){
        return $query->where('m_cacodna','LIKE','%'.$m_cacodna.'%');
    }

    //Filtro de Anulaciones por Estado Activo / Inactivo (BUSQUEDA EXACTA)
    public function scopeEstado($query,$m_caestad){
        return $query->where('m_caestad','LIKE',$m_caestad);
    }

   //APLICAR A TODOS LOS MODELOS BUSQUEDA EXACTA DE USUARIO REGISTRA - ACTUALIZA
   //Filtro de Divisiones por Usuario registra
    public function scopeUsuario_registra($query,$m_causreg){
        return $query->where('m_causreg','LIKE',$m_causreg);
    }

    //Filtro de Divisiones por Usuario actualiza
    public function scopeUsuario_actualiza($query,$m_causact){
        return $query->where('m_causact','LIKE',$m_causact);
    }
}
