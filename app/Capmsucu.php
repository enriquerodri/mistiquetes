<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmsucu.php
//Descripción:      Puntos de servicio organización empresarial
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmsucu extends Model
{
	//Administrador de Oficinas 
	protected $table = "capmsucu";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_nucecon','m_canombr','m_canomco','m_cadirec',
                'm_nucociu','m_catelfi','m_camovil','m_cacorel','m_nuidjof',
                'm_nuidrev','m_cacoco1','m_cacoco2','m_cacoco3','m_cacoco4',
                'm_cacoco5','m_nucoter','m_cacoter','m_catoken','m_caizter',
                'm_catiofi','m_caclofi','m_caproce','m_cacodna','m_caestad',
                'm_caencon','m_caencob','m_caencre',
                'm_caencoi','m_cagienv','m_cagirec','m_caticon','m_caticre',
                'm_caticor','m_catirem','m_catiweb','m_cativip','m_catides',
                'm_catimic','m_catires','m_cativig','m_catiabo','m_catidco',
                'm_cacagdv','m_cacaegr','m_cacaing','m_cacancr','m_cacandb',
                'm_cacadma','m_capradp','m_caprcco','m_caprccu','m_caprcgd',
                'm_caprigi','m_caprtan','m_catttab','m_caprtdv','m_caprtdm',
                'm_caprtcv','m_caprtpp','m_cappdav','m_cappdaw','m_capdbal',
                'm_capdcam','m_capdlhu','m_capdlrf','m_capdlnu','m_cargeco',
                'm_cargecb','m_cargecr','m_cargtco','m_cargtcr','m_cargtrm',
                'm_cargtwb','m_carggen','m_carggpa','m_caimrea','m_nuimrea',
                'm_caimstb','m_nuimstb','m_cacbcgv','m_cacbceg','m_cacbcin',
                'm_cacbcnc','m_cacbcnd','m_cacbeco','m_cacbecb','m_cacbecr',
                'm_cacbeci','m_cacbepc','m_cacbtco','m_cacbtcr','m_cacbtcs',
                'm_cacbtrm','m_cacbtwb','m_cacbtvp','m_cacbtlv','m_cacbpda',
                'm_causreg','m_causact',];

	//Relacion con el modelo Users
    public function usuarios(){
        return $this->hasMany('App\User','m_nucecon','m_nucodig');
    }

    //Relacion con el modelo Ciudades
    public function ciudades(){
        return $this->belongsTo('App\Capmciud','m_nucociu');
    }

    //Relacion con el modelo Terminales de transporte
    public function TerminalesTransporte(){
        return $this->hasMany('App\Capmterm','m_nucoter','m_nucodig');
    }

    //Buscador de //Buscador de Oficinas por id Centro de Costos - LLAVE (BUSQUEDA EXACTA)
    public function scopeCentrocostos($query,$m_nucecon){
        return $query->where('m_nucecon','LIKE',$m_nucecon);
    }

    //Buscador de Oficinas por nombre 
    public function scopeNombre($query,$nombre){
        return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    }

    //Relacion con el modelo usuario (jefe de oficina)
    public function jefe_oficina(){
        return $this->belongsTo('App\User','m_nuidjof');
    }

    //Relacion con el modelo usuario (revisor de oficina)
    public function revisor_oficina(){
        return $this->belongsTo('App\User','m_nuidrev');
    }

    //Relacion con el modelo usuario (Registra) 
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

    //Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Filtro de Oficinas por nombre por ciudades (BUSQUEDA EXACTA)
    public function scopeNombre_ciudad($query,$m_nucociu){
        return $query->where('m_nucociu','LIKE',$m_nucociu);
    }

   //Filtro de Oficinas por Usuario registra
    public function scopeUsuario_registra($query,$m_causreg){
        return $query->where('m_causreg','LIKE','%'.$m_causreg.'%');
    }

    //Filtro de Oficinas por Usuario actualiza
    public function scopeUsuario_actualiza($query,$m_causact){
        return $query->where('m_causact','LIKE','%'.$m_causact.'%');
    }

   //Filtro de Oficinas por Usuario registra
    public function scopejefe_oficina($query,$m_nuidjof){
        return $query->where('m_nuidjof','LIKE','%'.$m_nuidjof.'%');
    }

    //Filtro de Oficinas por Usuario actualiza
    public function scoperevisor_oficina($query,$m_nuidrev){
        return $query->where('m_nuidrev','LIKE','%'.$m_nuidrev.'%');
    }

    //Filtro de Oficinas por Usuario actualiza
    public function scopeTerminal_Transporte($query,$m_nucoter){
        return $query->where('m_nucoter','LIKE','%'.$m_nucoter.'%');
    }

    //Filtro de Anulaciones por Estado Activo / Inactivo (BUSQUEDA EXACTA)
    public function scopeEstado($query,$m_caestad){
        return $query->where('m_caestad','LIKE',$m_caestad);
    }

}