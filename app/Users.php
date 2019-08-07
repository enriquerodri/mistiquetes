<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           User.php
//Descripción:      Contratos clientes crédito
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $primaryKey = 'id';
    protected $fillable = ['m_canuipe','m_nudiver','m_nutipdo',
                'name','m_caprnom','m_casenom','m_caprape','m_caseape',
                'm_fenacim','m_nuedada','m_catipsa','m_catisex',
                'm_cadirec','m_nucociu','m_catelfi','m_camovil',
                'm_nuofici','m_nucocar','m_caestad','m_canivel','m_feinici','m_fevenci','m_feactco',
                'email','password','remember_token',
                'm_causreg','m_causact',
                'm_caprenu','m_capreed','m_capreel','m_capreex','m_capreep',
                'm_capap01','m_capap02','m_capap03','m_capap04','m_capap05',
                'm_capap06','m_capap07','m_capap08','m_capap09','m_capap10',
                'm_capap11','m_capap12','m_capap13','m_capap14','m_capap15',
                'm_capap16','m_capap17','m_capap18','m_capap19','m_capap20',
                'm_capap21','m_capap22','m_capap23','m_capap24','m_capap25',
                'm_capapus','m_capauco','m_capacgv','m_capaceg','m_capacin',
                'm_capacnc','m_capacnd','m_capaeco','m_capaecb','m_capaecr',
                'm_capaeci','m_capaepc','m_capagen','m_capagpa','m_capatco',
                'm_capatcr','m_capatca','m_capatrm','m_capatwb','m_capatrv',
                'm_capaldv','m_capreti','m_capabti','m_capvdtm','m_caprpoa','m_caprpop',
                'm_caprpva','m_caprpvp','m_caprplo','m_caprtlo','m_caprtli',
                'm_caprrgv','m_capcc01','m_capcc02','m_capcc03','m_capcc04','m_capcavt',
                'm_capcius','m_nuplenc','m_nuplgir','m_nupltiq','m_nuplotr','m_nucoemp'];
    
    protected $hidden = ['password', 'remember_token',];

    //Relación con la modelo Oficina - Campsucu
    //public function oficina(){
    //    return $this->belongsTo('App\Capmsucu','m_nuofici');
    //}

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

    //Relación con la modelo Empresa - Campsucu
        public function empresa(){
            return $this->belongsTo('App\Capmreep','m_nucoemp');
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

    //Buscador de Usuarios por id - LLAVE (BUSQUEDA EXACTA) 
    public function scopeNuipe($query,$m_canuipe){
        return $query->where('m_canuipe','LIKE',$m_canuipe);
    }

    //Buscador de Usuarios por email - LLAVE (BUSQUEDA EXACTA)
    public function scopeEmail($query,$email){
        return $query->where('email','LIKE',$email);
    }

    //Buscador de Usuarios por nombre
    public function scopeNombre($query,$nombre){
        return $query->where('name','LIKE','%'.$nombre.'%');
    }

    //Filtro de Usuarios por nombre por ciudades (BUSQUEDA EXACTA 
    public function scopeNombre_ciudad($query,$m_nucociu){
        return $query->where('m_nucociu','LIKE',$m_nucociu);
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
