<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmaseg.php
//Descripción:      Compañias aseguradoras
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmaseg extends Model
{
	//Administrador Compañías aseguradoras
	protected $table = "capmaseg";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canuipe','m_nudiver','m_nutipdo','m_canombr',
                'm_cadirec','m_nucociu','m_catelfi','m_camovil','m_casitew',
                'm_cacorel','m_cadacon','m_caautna','m_cacodna','m_caestad',
                'm_causreg','m_causact'];

    //Relación con la modelo Tiposdocumento
    public function tiposdocumentos(){
        return $this->belongsTo('App\Capmtido','m_nutipdo');
    }

    //Relacion con el modelo Ciudades
    public function ciudades(){
        return $this->belongsTo('App\Capmciud','m_nucociu');
    }

    /*
    //Relacion con el modelo Departamentos
    public function departamentos(){
        return $this->belongsTo('App\Capmdepa','m_nucodep');
    }

    //Relacion con el modelo Paises
    public function paises(){
        return $this->belongsTo('App\Capmpais','m_nucopai');
    }

    //Relacion con el modelo Departamentos
    public function departamentosorigen(){
        return $this->hasManyThrough(
            'App\Capmciud',
            'App\Capmdepa',
            'm_nucodig',    // Llave local en departamentos
            'm_nucodep'     // Llave foranea de departamento en tabla ciudades
        );
    }
    */

    //Relacion con el modelo usuario (Registra)
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

    //Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Buscador de Compañías aseguradoras por id - LLAVE (BUSQUEDA EXACTA)
    public function scopeNuipe($query,$m_canuipe){
        return $query->where('m_canuipe','LIKE',$m_canuipe);
    }

    //Buscador de Compañías aseguradoras por razon social
    public function scopeNombre($query,$nombre){
        return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    }

    //Filtro de Compañías aseguradoras por ciudades (BUSQUEDA EXACTA)
    public function scopeNombre_ciudad($query,$m_nucociu){
        return $query->where('m_nucociu','LIKE',$m_nucociu);
    }

    //Buscador de Compañías aseguradoras por nombre contacto
    public function scopeNombre_contacto($query,$m_cadacon){
        return $query->where('m_cadacon','LIKE','%'.$m_cadacon.'%');
    }

    //Filtro de Divisiones codigo nacional
    public function scopeCodigo_nacional($query,$m_cacodna){
        return $query->where('m_cacodna','LIKE','%'.$m_cacodna.'%');
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
