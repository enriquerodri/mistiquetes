<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmcarg.php
//Descripción:      Cargos humanos y robots vinculados a la organización
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmcarg extends Model
{
	//Administrador de Cargos
	protected $table = "capmcarg";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canombr','m_caticar','m_nucodiv','m_cacodna',
                'm_caestad','m_causreg','m_causact'];

	//Relación con la modelo Division
    public function division(){
        return $this->belongsTo('App\Capmdivi','m_nucodiv');
    }

    //Buscador de cargos por nombre
    public function scopeNombre($query,$nombre){
        return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    }

    //Buscador de cargos por division
    public function scopetipo_cargo($query,$tipo_cargo){
        return $query->where('m_caticar','LIKE',$tipo_cargo);
    }

    //Buscador de cargos por division
    public function scopeDivision($query,$m_nucodiv){
        return $query->where('m_nucodiv','LIKE',$m_nucodiv);
    }

    //Relacion con el modelo usuario (Registra)
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

    //Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Filtro de Divisiones codigo nacional
    public function scopeCodigo_nacional($query,$m_cacodna){
        return $query->where('m_cacodna','LIKE','%'.$m_cacodna.'%');
    }

    //Filtro de Divisiones por Estado Activo / Inactivo (BUSQUEDA EXACTA)
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