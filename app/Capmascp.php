<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmascp.php
//Descripción:      Asociados Conductores y Propietarios vehículos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmascp extends Model
{
	//Administrador Asociados - Conductores - Propietarios 
	protected $table = "capmascp";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canuipe','m_nudiver','m_nutipdo','m_cacodna',
                            'm_canombr','m_caprnom','m_casenom','m_caprape','m_caseape',
                            'm_fenacim','m_nuedada','m_catipsa','m_catisex',
                            'm_cadirec','m_nucociu','m_catelfi','m_camovil','m_casitew',
							'm_cacorel','m_caenvco','m_cadacon','m_caautna','m_caestad',
                            'm_nuofici','m_caviemp',
                            'm_caasoci','m_fevinas','m_caestas','m_feestas','m_cadeeas','m_caorpas',
                            'm_capropi','m_fevinpr','m_caestpr','m_feestpr','m_cadeepr','m_caorppr',
							'm_cacondu','m_fevinco','m_caestco','m_feestco','m_cadeeco','m_caorpco',
                            'm_feinsco','m_fetesco','m_feincon','m_nuexper',
							'm_nucocol','m_nucocar','m_nucogrt',
                            'm_cavehac','m_fevehac','m_camovac','m_caorvco','m_cavehan',
                            'm_catienc','m_cadienc',
							'm_nucienv','m_nuesciv','m_canomyu','m_nuhijos','m_caescol',
							'm_canotas','m_causreg','m_causact'];

    //Relación con el modelo Tiposdocumento
    public function tiposdocumentos(){
        return $this->belongsTo('App\Capmtido','m_nutipdo');
    }

    //Relación con el modelo Oficina
    public function oficina_registro(){
        return $this->belongsTo('App\Capmsucu','m_nuofici');
    }

    //Relacion con el modelo Ciudades
    public function ciudades(){
        return $this->belongsTo('App\Capmciud','m_nucociu');
    }

    //Relación con el modelo Documentos personas
    public function documentospersonas(){
        return $this->belongsTo('App\Capmdopp','m_nucodig');
    }


    //Relación con el modelo Maestro documentos personas
    public function maestrodocumentos(){
        return $this->belongsTo('App\Capmdocu','m_nucodig');
    }


    //Relación con el modelo Maestro seguros personas
    public function maestroseguros(){
        return $this->belongsTo('App\Capmsegu','m_nucodig');
    }

    //Relación con el modelo Documentos personas
    public function vehiculospropietarios(){
        return $this->belongsTo('App\Capmvehi','m_nucodig');
    }

    //Relación con el modelo ´Conductor Vehiculo actual 
    public function condcutorvehiculoactual(){
        return $this->belongsTo('App\Capmvehi','m_nucodig');
    }

    //Relación con el modelo Cargo
    public function cargo(){
        return $this->belongsTo('App\Capmcarg','m_nucocar');
    }

    //Relación con el modelo Division
    public function division(){
        return $this->belongsTo('App\Capmdivi','m_nucodiv');
    }

    //Relacion con el modelo usuario (Registra)
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

    //Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Buscador de //Buscador de Asociados - Conductores - Propietarios por id - LLAVE (BUSQUEDA EXACTA)
    public function scopeNuipe($query,$m_canuipe){
        return $query->where('m_canuipe','LIKE',$m_canuipe);
    }

    //Buscador de Asociados - Conductores - Propietarios por nombre
    public function scopeNombre($query,$nombre){
        return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    }

    //Filtro de Asociados - Conductores - Propietarios por nombre por ciudades (BUSQUEDA EXACTA)
    public function scopeNombre_ciudad($query,$m_nucociu){
        return $query->where('m_nucociu','LIKE',$m_nucociu);
    }

    //Buscador de Asociados - Conductores - Propietarios por nombre por nombre contacto
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