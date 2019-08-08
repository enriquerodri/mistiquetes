<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           Capmvehi.php
//Descripción:      Vehiculos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App;

use Illuminate\Database\Eloquent\Model;

class Capmvehi extends Model
{
	//Administrador de Cargos
	protected $table = "capmvehi";
	protected $primaryKey = 'm_nucodig';
	protected $fillable = ['m_nucodig','m_caplaca','m_canuint','m_caviemp','m_catipos',
                            'm_caestad','m_fevincu','m_feestad','m_cadesta','m_caopres',
                            'm_feinsuv','m_fetesuv','m_nucomar','m_nucolin','m_numodel',
                            'm_nuantig','m_camorea','m_cacilin','m_nucolor','m_caservi',
                            'm_nucogru','m_nucosrv','m_nucocar','m_nucocbl','m_nucapci',
                            'm_nucodis','m_canumot','m_canuvin','m_canuser','m_canucha',
                            'm_canurun','m_cacofdh','m_nucocir','m_nuancho','m_nualtos',
                            'm_nulargo','m_nuvolpo','m_nupesva','m_nucapdi','m_nukiact',
                            'm_nukiprv','m_nucorut','m_nucocib','m_carodam','m_nusires',
                            'm_nusipre','m_nusiweb','m_caencon','m_caencob','m_caencre',
                            'm_caencor','m_caproju','m_caidpac','m_caidpan','m_caidten',
                            'm_nuavalu','m_cacopuc','m_cacenco','m_calidep','m_calants',
                            'm_nulvtas','m_nulvcas','m_nulvpas','m_nulvaas','m_calpadc',
                            'm_nulvtpa','m_nulvcpa','m_nulpcpa','m_nulvapa','m_calvppd',
                            'm_nulvcpd','m_nulpcpd','m_nulvapd','m_calsrjo','m_nulvtsj',
                            'm_nulvcsj','m_nulpcsj','m_nulvasj','m_calsspz','m_nulvtsp',
                            'm_nulvcsp','m_nulpcsp','m_nulvasp','m_caliper','m_calic01',
                            'm_calid01','m_nuliv01','m_calic02','m_calid02','m_nuliv02',
                            'm_calic03','m_calid03','m_nuliv03','m_calic04','m_calid04',
                            'm_nuliv04','m_calic05','m_calid05','m_nuliv05','m_calic06',
                            'm_calid06','m_nuliv06','m_calic07','m_calid07','m_nuliv07',
                            'm_calic08','m_calid08','m_nuliv08','m_calic09','m_calid09',
                            'm_nuliv09','m_calic10','m_calid10','m_nuliv10','m_nulivto',
                            'm_caadmin','m_nuvaadm','m_nupoadm','m_canomco','m_nuvanco',
                            'm_nuponco','m_cassoco','m_nuvasco','m_nuposco','m_cafdoin',
                            'm_nuvafdi','m_nupofdi','m_cafdomu','m_nuvafdm','m_nupofdm',
                            'm_caldvpr','m_nuldvvc','m_nuldvpc','m_capapel','m_nuvapap',
                            'm_nupopap','m_capdcpr','m_nupdcvc','m_nupdcpc','m_capoliz',
                            'm_nuvaplz','m_nupoplz','m_canomrv','m_nuvanrv','m_nuponrv',
                            'm_cassorv','m_nuvasrv','m_nuposrv','created_at','m_causreg',
                            'updated_at','m_causact'];

	//Relación con la modelo Division
    public function division(){
        return $this->belongsTo('App\Capmdivi','m_nucodiv');
    }

    //Buscador de cargos por nombre
    public function scopeNombre($query,$nombre){
        return $query->where('m_canuint','LIKE','%'.$nombre.'%');
    }

    //Buscador de cargos por division
    public function scopetipo_cargo($query,$tipo_cargo){
        return $query->where('m_caticar','LIKE',$tipo_cargo);
    }

    //Buscador de cargos por division
    public function scopeDivision($query,$m_nucodiv){
        return $query->where('m_nucodiv','LIKE',$m_nucodiv);
    }

    //Buscador de vehiculos por propietario
    public function scopePropietariovehiculo($query,$m_caidpac){
        return $query->where('m_caidpac','LIKE',$m_caidpac);
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
    public function scopeNuipe($query,$m_caplaca){
        return $query->where('m_caplaca','LIKE',$m_caplaca);
    }

    //Buscador de //Buscador de Asociados - Conductores - Propietarios por id - LLAVE (BUSQUEDA EXACTA)
    public function scopeNumerointerno($query,$m_canuint){
        return $query->where('m_canuint','LIKE',$m_canuint);
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