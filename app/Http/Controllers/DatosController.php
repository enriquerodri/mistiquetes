<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           CapacitacionesControler.php
//Descripción:      Variables globales aplicativo
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Session;
use App\Capmreep;
use App\Capmsucu;
use App\Capmciud;
use App\Capmdepa;
use App\Capmpais;
use App\User;
//
//use App\Users;

class DatosController extends Controller
{
    //Constructor: Función para validar usuarios
    public function __construct(){
        $this->middleware('auth');
    }

    public function consultarDatos(){
        //  1- CONFIGURACION EMPRESARIAL
        $empresa = Capmreep::find(1);
        //  1.1- RAZON SOCIAL
        $emp_raz_soc = $empresa->m_carazso;
        Session::put('emp_raz_soc',$emp_raz_soc);
        //  1.2- NOMBRE CORTO
        $emp_nom_cor = $empresa->m_canomco;
        Session::put('emp_nom_cor',$emp_nom_cor);
        //  1.3- NUIP
        $emp_nui_p00 = $empresa->m_canuipe;
        Session::put('emp_nui_p00',$emp_nui_p00);

        //  1.3- NUIP
        $emp_esl_oga = $empresa->m_caeslog;
        Session::put('emp_esl_oga',$emp_esl_oga);

        //  2- OFICINA USUARIO
        //      OBTIENE ID OFICINA DEL USUARIO ACTIVO
        //          VARIABLE IDU OFICINA USUARIO OBTIENE    - $idu_ofi_usu_obt
        $idu_ofi_usu_obt = Auth::user()->m_nuofici;
        //
        //      USUARIO CUENTA INICIO
        $usu_cue_ent_ini = Auth::user()->m_feinici;
        //      ASIGNA VARIABLE ENTORNO GLOBAL USUARIO CUENTA INICIO
        $glo_usu_cue_ini = $usu_cue_ent_ini;
        //      CARGA VARIABLE ENTORNO GLOBAL USUARIO CUENTA INICIO
        Session::put('glo_usu_cue_ini',$glo_usu_cue_ini);


        //      USUARIO CUENTA FINALIZA
        
        $usu_cue_ent_fin = Auth::user()->m_fevenci;

        //      USUARIO CUENTA FINALIZA
        $usu_cue_ent_fin = Auth::user()->m_fevenci;
        //      ASIGNA VARIABLE ENTORNO GLOBAL USUARIO CUENTA INICIO
        $glo_usu_cue_fin = $usu_cue_ent_fin;
        //      CARGA VARIABLE ENTORNO GLOBAL USUARIO CUENTA INICIO
        Session::put('glo_usu_cue_fin',$glo_usu_cue_fin);


        //      BUSCA EN OFICINAS POR
        //          VARIABLE IDU OFICINA USUARIO OBTIENE    - $idu_ofi_usu_obt
        //          VARIABLE IDU OFICINA USUARIO ALMACENA   - $idu_ofi_usu_alm
        $idu_ofi_usu_alm = Capmsucu::find($idu_ofi_usu_obt);
        //      OBTIENE ID CIUDAD DE LA OFICINA HALLADA
        //          VARIABLE ID CIUDAD OFICINA OBTIENE      - $idu_ciu_ofi_obt
        //          VARIABLE NOMBRE OFICINA ALMACENA        - $nom_bre_ofi_alm
        //          VARIABLE GLOBAL NOMBRE OFICINA          - $glo_nom_ofi_cin
        $idu_ciu_ofi_obt = $idu_ofi_usu_alm->m_nucociu;
        //      ASIGNA NOMBRE OFICINA HALLADA
        $glo_nom_ofi_cin = $idu_ofi_usu_alm->m_canombr;
        //  INICIO INFORMACION DIRECTA OFICINA
        //      CARGA VARIABLE DE ENTORNO GLOBAL NOMBRE OFICINA
        Session::put('glo_nom_ofi_cin',$glo_nom_ofi_cin);
        
        //      OFICINA CENTRO DE COSTOS
        $glo_cen_con_ofi = $idu_ofi_usu_alm->m_nucecon;
        //      CARGA VARIABLE DE ENTORNO GLOBAL CENTRO DE COSTOS OFICINA
        Session::put('glo_cen_con_ofi',$glo_cen_con_ofi);
        
        //      OFICINA DIRECCION
        $glo_dir_ecc_ofi = $idu_ofi_usu_alm->m_cadirec;
        //      CARGA VARIABLE DE ENTORNO GLOBAL CENTRO DE COSTOS OFICINA
        Session::put('glo_dir_ecc_ofi',$glo_dir_ecc_ofi);
        
        //      OFICINA TELEFONO FIJO
        $glo_tel_fij_ofi = $idu_ofi_usu_alm->m_catelfi;
        //      CARGA VARIABLE DE ENTORNO GLOBAL CENTRO DE COSTOS OFICINA
        Session::put('glo_tel_fij_ofi',$glo_tel_fij_ofi);

        //      OFICINA TELEFONO MOVIL
        $glo_tel_mov_ofi = $idu_ofi_usu_alm->m_camovil;
        //      CARGA VARIABLE DE ENTORNO GLOBAL CENTRO DE COSTOS OFICINA
        Session::put('glo_tel_mov_ofi',$glo_tel_mov_ofi);

        //      OFICINA CORREO ELECTRONICO
        $glo_cor_ele_ofi = $idu_ofi_usu_alm->m_cacorel;
        //      CARGA VARIABLE DE ENTORNO GLOBAL CENTRO DE COSTOS OFICINA
        Session::put('glo_cor_ele_ofi',$glo_cor_ele_ofi);

        //      OFICINA JEFE
        $idu_ofi_jef_obt = $idu_ofi_usu_alm->m_nuidjof;
        $idu_ofi_jef_alm = User::find($idu_ofi_jef_obt);
        $glo_jef_nom_ofi = $idu_ofi_jef_alm->name;
        //      CARGA VARIABLE DE ENTORNO GLOBAL JEFE OFICINA
        Session::put('glo_jef_nom_ofi',$glo_jef_nom_ofi);

        //      OFICINA REVISOR
        $idu_ofi_rev_obt = $idu_ofi_usu_alm->m_nuidrev;
        $idu_ofi_rev_alm = User::find($idu_ofi_rev_obt);
        $glo_rev_nom_ofi = $idu_ofi_rev_alm->name;
        //      CARGA VARIABLE DE ENTORNO GLOBAL REVISOR OFICINA
        Session::put('glo_rev_nom_ofi',$glo_rev_nom_ofi);        

        //  FIN INFORMACION DIRECTA OFICINA

        //  INICIO INFORMACION RELACIONADA OFICINA
        //  2.1- OFICINA CIUDAD
        //      BUSCA EN CIUDADES POR ID CIUDAD DE LA OFICINA
        $idu_ciu_ofi_alm = Capmciud::find($idu_ciu_ofi_obt);
        //      ASIGNA NOMBRE CIUDAD HALLADA
        $glo_nom_bre_ciu = $idu_ciu_ofi_alm->m_canombr;
        //      OBTIENE ID DEPARTAMENTO DE LA CIUDAD HALLADA
        $idu_dep_ciu_obt = $idu_ciu_ofi_alm->m_nucodep;
        //      CARGA VARIABLE ENTORNO GLOBAL NOMBRE CIUDAD
        Session::put('glo_nom_bre_ciu',$glo_nom_bre_ciu);

        //  2.2- OFICINA CIUDAD DEPARTAMENTO
        //      BUSCA EN DEPARTAMENTOS POR ID DEPARTAMENTO DE LA CIUDAD HALLADA
        $idu_dep_ciu_alm = Capmdepa::find($idu_dep_ciu_obt);
        //      ASIGNA NOMBRE DEPARTAMENTO HALLADO
        $glo_nom_bre_dep = $idu_dep_ciu_alm->m_canombr;
        //      OBTIENE ID PAIS DEL DEPARTAMENTO HALLADO
        $idu_pai_dep_obt = $idu_dep_ciu_alm->m_nucopai;
        //      CARGA VARIABLE ENTORNO GLOBAL NOMBRE DEPARTAMENTO
        Session::put('glo_nom_bre_dep',$glo_nom_bre_dep);

        //  2.3- OFICINA CIUDAD DEPARTAMENTO PAIS NOMBRE
        //      BUSCA EN PAISES POR ID DEL DEPARTAMENTO HALLADO
        $idu_pai_dep_alm = Capmpais::find($idu_pai_dep_obt);
        //      ASIGNA NOMBRE PAIS HALLADO
        $glo_nom_bre_pai = $idu_pai_dep_alm->m_canombr;
        //      CARGA VARIABLE ENTORNO GLOBAL NOMBRE PAIS   
        Session::put('glo_nom_bre_pai',$glo_nom_bre_pai);

        //      UBICACION REGIONAL OFICINA
        $ofi_ubi_001 = Session::get('glo_nom_bre_ciu');
        $ofi_ubi_002 = Session::get('glo_nom_bre_dep');
        $ofi_ubi_003 = Session::get('glo_nom_bre_pai');
        $ofi_ubi_004 = substr($ofi_ubi_003,0,3);
        $glo_ofi_ubi_reg = ($ofi_ubi_001 . ' - ' .$ofi_ubi_002. ' (' .$ofi_ubi_004). '.)';
        //      CARGA VARIABLE ENTORNO GLOBAL NOMBRE PAIS
        Session::put('glo_ofi_ubi_reg',$glo_ofi_ubi_reg);

        //  FIN INFORMACION RELACIONADA OFICINA

        //          ENRUTA A INICIO
        return redirect()->route('inicio');
    }

}