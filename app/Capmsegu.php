<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmsegu.php
//Descripción:      Seguros para control por fecha de vencimiento (humanos - robots - vehículos)
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmsegu extends Model
{
	//Administrador Seguross
	protected $table = "capmsegu";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_canombr','m_cacodna','m_nuorden','m_caresol',
				'm_feresol','m_cadescr','m_caapper','m_caapvpa','m_caapvca',
				'm_caaprem','m_cacoven','m_nudiapv','m_caacmav','m_caapesv',
				'm_caacrma','m_caestad','m_causreg','m_causact'];

    //Relacion con el modelo usuario (Registra)
    public function usuario_registra(){
        return $this->belongsTo('App\User','m_causreg');
    }

	//Relacion con el modelo usuarios (Actualiza)
    public function usuario_actualiza(){
        return $this->belongsTo('App\User','m_causact');
    }

    //Buscador de Documentos por nombre
    public function scopeNombre($query,$nombre){
        return $query->where('m_canombr','LIKE','%'.$nombre.'%');
    }

    //Filtro de Documentos por descripcion
    public function scopeDocumento_descripcion($query,$m_cadescr){
        return $query->where('m_cadescr','LIKE','%'.$m_cadescr.'%');
    }

    //Filtro de Documentos aplica a personas
    public function scopeDocumento_a_personas($query,$m_caapper){
        return $query->where('m_caapper','LIKE','%'.$m_caapper.'%');
    }

    //Filtro de Documentos aplica a vehiculos de pasajeros
    public function scopeDocumento_a_v_pasajeros($query,$m_caapvpa){
        return $query->where('m_caapvpa','LIKE','%'.$m_caapvpa.'%');
    }

    //Filtro de Documentos aplica a vehiculos de carga
    public function scopeDocumento_a_v_carga($query,$m_caapvca){
        return $query->where('m_caapvca','LIKE','%'.$m_caapvca.'%');
    }

    //Filtro de Documentos aplica a remolques
    public function scopeDocumento_a_remolques($query,$m_caaprem){
        return $query->where('m_caaprem','LIKE','%'.$m_caaprem.'%');
    }

    //Filtro de Documentos por resolucion
    public function scopeDocumento_resolucion($query,$m_caresol){
        return $query->where('m_caresol','LIKE','%'.$m_caresol.'%');
    }

    //Filtro de Documentos Controla vencimiento
    public function scopeDocumento_c_vencimiento($query,$m_cacoven){
        return $query->where('m_cacoven','LIKE','%'.$m_cacoven.'%');
    }

    //Filtro de Documentos actualizaciones masivas
    public function scopeDocumento_a_masivas($query,$m_caacmav){
        return $query->where('m_caacmav','LIKE','%'.$m_caacmav.'%');
    }

    //Filtro de Documentos plan estrategico de seguridad vial - PESV
    public function scopeDocumento_pesv($query,$m_caapesv){
        return $query->where('m_caapesv','LIKE','%'.$m_caapesv.'%');
    }

    //Filtro de Documentos cronograma de mantenimiento
    public function scopeDocumento_cronograma($query,$m_caacrma){
        return $query->where('m_caacrma','LIKE','%'.$m_caacrma.'%');
    }

    //Filtro de Documentos codigo nacional
    public function scopeCodigo_nacional($query,$m_cacodna){
        return $query->where('m_cacodna','LIKE','%'.$m_cacodna.'%');
    }

    //Filtro de Documentos por Estado Activo / Inactivo (BUSQUEDA EXACTA)
    public function scopeEstado($query,$m_caestad){
        return $query->where('m_caestad','LIKE',$m_caestad);
    }

    //Filtro de Documentos por Usuario registra
    public function scopeUsuario_registra($query,$m_causreg){
        return $query->where('m_causreg','LIKE','%'.$m_causreg.'%');
    }

    //Filtro de Documentos por Usuario actualiza
    public function scopeUsuario_actualiza($query,$m_causact){
        return $query->where('m_causact','LIKE','%'.$m_causact.'%');
    }
}
