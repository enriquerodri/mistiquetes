<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           CapacitacionesControler.php
//Descripción:      Capacitaciones conductores
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

        //  2- OFICINA USUARIO
        //      OBTIENE ID OFICINA DEL USUARIO ACTIVO
        //          VARIABLE ID OFICINA USUARIO OBTIENE   - $idu_ofi_usu_obt
        //              $id_oficina = Auth::user()->m_nuofici;
        $idu_ofi_usu_obt = Auth::user()->m_nuofici;
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
        //      CARGA VARIABLE DE ENTORNO GLOBAL NOMBRE OFICINA
        //Session::put('nombre_oficina',$nombre_oficina);
        Session::put('glo_nom_ofi_cin',$glo_nom_ofi_cin);

        //  2.1- OFICINA CIUDAD
        //      BUSCA EN CIUDADES POR ID CIUDAD DE LA OFICINA
        //$datos_ciudad = Capmciud::find($id_ciudad);
        $idu_ciu_ofi_alm = Capmciud::find($idu_ciu_ofi_obt);
        //      ASIGNA NOMBRE CIUDAD HALLADA
        //$nombre_ciudad = $datos_ciudad->m_canombr;
        $glo_nom_bre_ciu = $idu_ciu_ofi_alm->m_canombr;
        //      OBTIENE ID DEPARTAMENTO DE LA CIUDAD HALLADA
        //$id_departamento = $datos_ciudad->m_nucodep;
        $idu_dep_ciu_obt = $idu_ciu_ofi_alm->m_nucodep;
        //      CARGA VARIABLE ENTORNO GLOBAL NOMBRE CIUDAD
        //Session::put('nombre_ciudad',$nombre_ciudad);
        Session::put('glo_nom_bre_ciu',$glo_nom_bre_ciu);

        //  2.2- OFICINA CIUDAD DEPARTAMENTO
        //      BUSCA EN DEPARTAMENTOS POR ID DEPARTAMENTO DE LA CIUDAD HALLADA
        //$datos_departamento = Capmdepa::find($id_departamento);
        $idu_dep_ciu_alm = Capmdepa::find($idu_dep_ciu_obt);
        //      ASIGNA NOMBRE DEPARTAMENTO HALLADO
        //$nombre_departamento = $datos_departamento->m_canombr;
        $glo_nom_bre_dep = $idu_dep_ciu_alm->m_canombr;
        //      OBTIENE ID PAIS DEL DEPARTAMENTO HALLADO
        //$id_pais = $datos_departamento->m_nucopai;
        $idu_pai_dep_obt = $idu_dep_ciu_alm->m_nucopai;
        //      CARGA VARIABLE ENTORNO GLOBAL NOMBRE DEPARTAMENTO
        //Session::put('nombre_departamento',$nombre_departamento);
        Session::put('glo_nom_bre_dep',$glo_nom_bre_dep);

        //  2.3- OFICINA CIUDAD DEPARTAMENTO PAIS NOMBRE
        //      BUSCA EN PAISES POR ID DEL DEPARTAMENTO HALLADO
        //$datos_pais = Capmpais::find($id_pais);
        $idu_pai_dep_alm = Capmpais::find($idu_pai_dep_obt);
        //      ASIGNA NOMBRE PAIS HALLADO
        //$nombre_pais = $datos_pais->m_canombr;
        $glo_nom_bre_pai = $idu_pai_dep_alm->m_canombr;
        //      CARGA VARIABLE ENTORNO GLOBAL NOMBRE PAIS   
        //Session::put('nombre_pais',$nombre_pais);
        Session::put('glo_nom_bre_pai',$glo_nom_bre_pai);

        //          ENRUTA A INICIO
        return redirect()->route('inicio');
    }

}