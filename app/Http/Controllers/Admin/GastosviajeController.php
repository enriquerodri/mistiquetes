<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           GastosviajeControler.php
//Descripción:      Gastos de viaje (vehículos)
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Capmplan;


class GastosviajeController extends Controller
{
    //Constructor: Función para validar usuarios
    public function __construct(){
        $this->middleware('auth');
    }

    //Index: Función para mostrar registros tabla de pagina principal
    public function index(Request $request){
        $gastosviaje = Capmplan::nombre($request->m_canombr)->paginate(20);
        return view('admin.programador.gastosviaje.index',compact('gastosviaje'));
    }

    //Create: Función para agregar registros a tabla
    public function create(){
        $tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        return view('admin.programador.gastosviaje.crear',compact('tiposdocumentos','departamentos','ciudades'));
    }

    //Store: Función para validar datos y luego insertarlos en tabla
    public function store(Request $request){
        //Validar los campos
        $request->validate([
            'm_canombr' => 'required',
            'm_cacodna' => 'required',
        ]);

        //Insertar los datos
        $gastoviaje = Capmplan::create([
            'm_canuipe'=>'PEND',
            'm_nudiver'=>$request->m_nudiver,
            'm_nutipdo'=>$request->m_nutipdo,
            'm_cacodna'=>$request->m_cacodna,            
            'm_canombr'=>$request->m_canombr,            
            'm_caprnom'=>$request->m_caprnom,
            'm_caprnom'=>$request->m_caprnom,
            'm_casenom'=>$request->m_casenom,
            'm_caprape'=>$request->m_caprape,
            'm_caseape'=>$request->m_caseape,
            'm_cadirec'=>$request->m_cadirec,
            'm_nucociu'=>$request->m_nucociu,
            'm_catelfi'=>$request->m_catelfi,
            'm_camovil'=>$request->m_camovil,
            'm_cadacon'=>$request->m_cadacon,
            'm_casitew'=>$request->m_casitew,
            'm_cacorel'=>$request->m_cacorel,
            'm_caestad'=>$request->m_caestad,
            'm_causreg'=>Auth::user()->id,
            'm_causact'=>'',
        ]);

        //$mensaje: Mensaje de resultados
        $mensaje = $gastoviaje?'Registro creado satisfactoriamente':'No se pudo crear el registro';
        return redirect()->route('gastosviaje.index')->with('mensaje',$mensaje);

    }

    //Edit: Función para actualizar campos de registros
    public function edit($id){
        $gastoviaje = Capmplan::find($id);
        $tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        return view('admin.programador.gastosviaje.editar',compact('gastoviaje','departamentos','ciudades'));
    }

    //Show: Función para mostrar campos de registros
    public function show($id){
        $gastoviaje = Capmplan::find($id);
        $tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        return view('admin.programador.gastosviaje.consultar',compact('gastoviaje','departamentos','ciudades'));
    }

    //Update: Función para validar y actualizar campos de registros en tabla
    public function update(Request $request, $id){
        //Validar los campos
        $request->validate([
            'm_canombr' => 'required',
            'm_cacodna' => 'required'
        ]);

        //Actualizar el usuario
        $gastoviaje = Capmplan::find($id);
        $gastoviaje->m_nutipdo = $request->m_nutipdo;
        $gastoviaje->m_cacodna = $request->m_cacodna;
        $gastoviaje->m_canombr = $request->m_canombr;
        $gastoviaje->m_caprnom = $request->m_caprnom;
        $gastoviaje->m_casenom = $request->m_casenom;
        $gastoviaje->m_caprape = $request->m_caprape;
        $gastoviaje->m_caseape = $request->m_caseape;
        $gastoviaje->m_cadirec = $request->m_cadirec;
        $gastoviaje->m_nucociu = $request->m_nucociu;
        $gastoviaje->m_catelfi = $request->m_catelfi;
        $gastoviaje->m_camovil = $request->m_camovil;
        $gastoviaje->m_casitew = $request->m_casitew;
        $gastoviaje->m_cacorel = $request->m_cacorel;
        $gastoviaje->m_cadacon = $request->m_cadacon;
        $gastoviaje->m_caestad = $request->m_caestad;
        $gastoviaje->m_causact = Auth::user()->id;
        $gastoviaje->save();

        //Mensaje de resultados
        $mensaje = $gastoviaje?'Registro actualizado satisfactoriamente':'No se pudo actualizar';
        return redirect()->route('gastosviaje.index')->with('mensaje',$mensaje);
    }

    //Destroy: Función para eliminar registros en tabla
    public function destroy($id){
        $gastoviaje = Capmplan::find($id);
        $gastoviaje->delete();

        //Mensaje de resultados
        $mensaje = $gastoviaje?'Registro eliminado satisfactoriamente':'No se pudo eliminar';
        return redirect()->route('gastosviaje.index')->with('mensaje',$mensaje);
    }
}