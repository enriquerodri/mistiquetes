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
        $id_oficina = Auth::user()->m_nuofici;
        $oficina = Capmsucu::find($id_oficina);
        $id_ciudad = $oficina->m_nucociu;
        $nombre_oficina = $oficina->m_canombr;
        Session::put('nombre_oficina',$nombre_oficina);
        //  2.1- OFICINA CIUDAD

        $datos_ciudad = Capmciud::find($id_ciudad);
        $nombre_ciudad = $datos_ciudad->m_canombr;
        $id_departamento = $datos_ciudad->m_nucodep;
        Session::put('nombre_ciudad',$nombre_ciudad);

        //  2.2- OFICINA CIUDAD DEPARTAMENTO
        $datos_departamento = Capmdepa::find($id_departamento);
        $nombre_departamento = $datos_departamento->m_canombr;
        $id_pais = $datos_departamento->m_nucopai;
        Session::put('nombre_departamento',$nombre_departamento);

        //  2.3- OFICINA CIUDAD DEPARTAMENTO PAIS NOMBRE
        $datos_pais = Capmpais::find($id_pais);
        $nombre_pais = $datos_pais->m_canombr;
        Session::put('nombre_pais',$nombre_pais);

        return redirect()->route('inicio');
    }

}