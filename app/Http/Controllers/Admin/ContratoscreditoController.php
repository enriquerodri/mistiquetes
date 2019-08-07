<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           ContratoscreditoControler.php
//Descripción:      Contratos clientes crédito
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Ticmcocr;
use App\Capmdepa;
use App\Capmciud;

class ContratoscreditoController extends Controller
{
    //Constructor: Función para validar usuarios
    public function __construct(){
        $this->middleware('auth');
    }

    //Index: Función para mostrar registros tabla de pagina principal
    public function index(Request $request){
        $contratoscredito = Ticmcocr::nombre($request->m_canombr)->paginate(20);
        return view('admin.programador.contratoscredito.index',compact('contratoscredito'));
    }

    //Create: Función para agregar registros a tabla
    public function create(){
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        return view('admin.programador.contratoscredito.crear',compact('departamentos','ciudades'));
    }

    //Store: Función para validar datos y luego insertarlos en tabla
    public function store(Request $request){
        //Validar los campos
        $request->validate([
            'm_canombr' => 'required',
            'm_cacodna' => 'required',
        ]);

        //Insertar los datos
        $contratocredito = Ticmcocr::create([
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
        $mensaje = $contratocredito?'Registro creado satisfactoriamente':'No se pudo crear el registro';
        return redirect()->route('contratoscredito.index')->with('mensaje',$mensaje);

    }

    //Edit: Función para actualizar campos de registros
    public function edit($id){
        $contratocredito = Ticmcocr::find($id);
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        return view('admin.programador.contratoscredito.editar',compact('contratocredito','departamentos','ciudades'));
    }

    //Show: Función para mostrar campos de registros
    public function show($id){
        $contratocredito = Ticmcocr::find($id);
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        return view('admin.programador.contratoscredito.consultar',compact('contratocredito','departamentos','ciudades'));
    }
    
    //Update: Función para validar y actualizar campos de registros en tabla
    public function update(Request $request, $id){
        //Validar los campos
        $request->validate([
            'm_canombr' => 'required',
            'm_cacodna' => 'required'
        ]);

        //Actualizar el usuario
        $contratocredito = Ticmcocr::find($id);
        $contratocredito->m_nutipdo = $request->m_nutipdo;
        $contratocredito->m_cacodna = $request->m_cacodna;
        $contratocredito->m_canombr = $request->m_canombr;
        $contratocredito->m_caprnom = $request->m_caprnom;
        $contratocredito->m_casenom = $request->m_casenom;
        $contratocredito->m_caprape = $request->m_caprape;
        $contratocredito->m_caseape = $request->m_caseape;
        $contratocredito->m_cadirec = $request->m_cadirec;
        $contratocredito->m_nucociu = $request->m_nucociu;
        $contratocredito->m_catelfi = $request->m_catelfi;
        $contratocredito->m_camovil = $request->m_camovil;
        $contratocredito->m_casitew = $request->m_casitew;
        $contratocredito->m_cacorel = $request->m_cacorel;
        $contratocredito->m_cadacon = $request->m_cadacon;
        $contratocredito->m_caestad = $request->m_caestad;
        $contratocredito->m_causact = Auth::user()->id;
        $contratocredito->save();

        //Mensaje de resultados
        $mensaje = $contratocredito?'Registro actualizado satisfactoriamente':'No se pudo actualizar';
        return redirect()->route('contratoscredito.index')->with('mensaje',$mensaje);
    }

    //Destroy: Función para eliminar registros en tabla
    public function destroy($id){
        $contratocredito = Ticmcocr::find($id);
        $contratocredito->delete();

        //Mensaje de resultados
        $mensaje = $contratocredito?'Registro eliminado satisfactoriamente':'No se pudoeliminar';
        return redirect()->route('contratoscredito.index')->with('mensaje',$mensaje);
    }
}