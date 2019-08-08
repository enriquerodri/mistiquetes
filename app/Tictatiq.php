<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Tictatiq.php
//Descripción:      Compañias aseguradoras
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tictatiq extends Model
{

    //Administrador Compañías aseguradoras
    protected $table = "tictatiq"; 
    protected $primaryKey = 'm_nucodig';
    protected $fillable = ['m_canuivi','m_canovij',
                'm_causet1','m_fehoet1','m_fefevia',
                'm_causreg', 'm_causact'];


    //Relación con la modelo Tiposdocumento
    public function tiposdocumentos(){
        return $this->belongsTo('App\Capmtido','m_nutipdo');
    }

    //Relación con la modelo Oficina
    public function oficina_registro(){
        return $this->belongsTo('App\Capmsucu','m_nuofici');
    }

    
    //Relacion con el modelo Ciudades
    public function ciudades(){
        return $this->belongsTo('App\Capmciud','m_nucoori');
    }

    //Relacion con el modelo Trayectos
    public function Trayectos(){
        return $this->belongsTo('App\Capmtati','m_nucocio','m_nucocid');
    }

    //Relacion con el modelo Tarifas
    public function Tarifas(){
        return $this->belongsTo('App\Capmtato','m_nucotra','m_nutipve');
    }

    //Filtro de Rodamientos por plano vhiculo (BUSQUEDA EXACTA)
    public function scopeplano_vehicul($query,$m_nucodis){
        return $query->where('m_nucodis','LIKE',$m_nucodis);
    }

    //Relacion con el modelo usuario (Registra)
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

    //Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Filtro de Rodamientos por ciudad origen (BUSQUEDA EXACTA)
    public function scopeNombre_ciudad_origen($query,$m_nucoori){
        return $query->where('m_nucoori','LIKE',$m_nucoori);
    }

    //Filtro de Rodamientos por oficina origen (BUSQUEDA EXACTA)
    public function scopeNombre_oficina_origen($query,$m_nuofici){
        return $query->where('m_nuofici','LIKE',$m_nuofici);
    }

    //Filtro de Rodamientos por fecha de ida (BUSQUEDA EXACTA)
    public function scopeFecha_ida($query,$m_feferod){
        return $query->where('m_feferod','LIKE',$m_feferod);
    }

    //Filtro de Rodamientos por ciudad destino (BUSQUEDA EXACTA)
    public function scopeNombre_ciudad_destino($query,$m_nucodes){
        return $query->where('m_nucodes','LIKE',$m_nucodes);
    }

    //Filtro de Rodamientos por oficina destino (BUSQUEDA EXACTA)
    public function scopeNombre_oficina_destino($query,$m_nuofire){
        return $query->where('m_nuofici','LIKE',$m_nuofire);
    }

    //Filtro de Rodamientos por fecha de regreso (BUSQUEDA EXACTA)
    public function scopeFecha_reg($query,$m_fefereg){
        return $query->where('m_feferod','LIKE',$m_fefereg);
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
