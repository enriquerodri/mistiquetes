<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           ClasesvehiculosControler.php
//Descripción:      Clases o gupos de vehículos (clasificación gobierno)
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;
use DateTime;
use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D;
use App\Capmmove;
use App\Captaudi;
use App\User;

setlocale(LC_TIME,"es_ES"); date_default_timezone_set ('America/Bogota');

class ClasesvehiculosController extends Controller
{

    //ORDENAMIENTO
    // ASCENDENTE - DESCENTE
    private $m_canombr_ordene="asc";
    // NOMBRE CAMPO
    private $m_canombr_campos="m_canombr";
    //FILTROS
    private $m_canombr_filtro="";
    private $m_canomse_filtro="";
    private $m_cacodna_filtro="";
    private $m_caestad_filtro="";
    private $m_causreg_filtro="";
    private $m_causact_filtro="";
    
    //  1- CONSTRUCTOR
    //Constructor: Función para validar usuarios
    public function __construct(){
        $this->middleware('auth');
    }

    //  2- INDICES
    //Index: Función para mostrar registros tabla de pagina principal
    public function index(Request $request){
        if(Auth::user()->m_capap10=="SI"){

            //ORDENAMIENTO
            // ASCENDENTE - DESCENTE
            $m_canombr_ordene="asc";
            // NOMBRE CAMPO
            $m_canombr_campos="m_canombr";
            // LIMPIA FILTROS
            $m_canombr_filtro="";
            $m_canomse_filtro="";
            $m_cacodna_filtro="";
            $m_caestad_filtro="";
            $m_causreg_filtro="";
            $m_causact_filtro="";
            //  VALIDA RESULTADO
            if(count($request->all())>0){

                //return count($request->all());
                //return $m_canombr_ordene;

                //  CARGA VALORES
                //ORDENAMIENTO
                // ASCENDENTE - DESCENTE
                $m_canombr_ordene = $request->m_canombr_ordene;
                // NOMBRE CAMPO
                if($request->m_canombr_campos==null)
                    $m_canombr_campos = "m_canombr";
                else
                    $m_canombr_campos = $request->m_canombr_campos;
                // FILTROS
                $m_canombr_filtro = $request->m_canombr;
                $m_canomse_filtro = $request->m_canomse;
                $m_cacodna_filtro = $request->m_cacodna;
                $m_caestad_filtro = $request->m_caestad;
                $m_causreg_filtro = $request->m_causreg;
                $m_causact_filtro = $request->m_causact;
            }
            
            //  return $m_canombr_ordene;
            //  return $m_canombr_campos;
            //  /*
            //  CLASES
            if($m_canombr_campos=="llave_compuesta"){
                $clases = Capmmove::nombre($request->m_canombr)->
                    Servicio($request->m_canomse)->
                    Codigo_nacional($request->m_cacodna)->
                    estado($request->m_caestad)->
                    usuario_registra($request->m_causreg)->
                    usuario_actualiza($request->m_causact)->
                    orderBy('m_canombr',$m_canombr_ordene)->paginate(20);

            }else{
                $clases = Capmmove::nombre($request->m_canombr)->
                    Servicio($request->m_canomse)->
                    Codigo_nacional($request->m_cacodna)->
                    estado($request->m_caestad)->
                    usuario_registra($request->m_causreg)->
                    usuario_actualiza($request->m_causact)->
                    orderBy($m_canombr_campos,$m_canombr_ordene)->paginate(20);
            }

            //  USUARIOS
            $usuarios = User::orderBy('name','asc')->pluck('name','id');
            //  VISTA
            return view('admin.vehiculos.vehiculos.clases.index',
                compact('clases','usuarios','m_canombr_filtro','m_canomse_filtro',
                'm_cacodna_filtro','m_caestad_filtro',
                'm_causreg_filtro','m_causact_filtro',
                'm_canombr_ordene','m_canombr_campos'));

            // */
        } else{
            //  MENSAJE
            $mensaje = 'Propiedad inactiva';
            return redirect()->back()->with('mensaje',$mensaje);
        }
    }

    //  3- CREAR
    //Create: Función para agregar registros a tabla
    public function create(){
        return view('admin.vehiculos.vehiculos.clases.crear');
    }

    //  4- ALMACENAR
    //Store: Función para validar datos y luego insertarlos en tabla
    public function store(Request $request){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 1;
        $aud_nom_pag = 'Clase';

        //2- CONSULTA SI EL NOMBRE YA EXISTE
        //$clases = Capmmove::where('m_canombr',$request->m_canombr)->get();
        $clases = Capmmove::where('m_canombr',$request->m_canombr)->get();

        if(count($clases)>0){

            //2-1 EL NUEVO NOMBRE YA ESTA EN LA TABLA
            //2-2 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Clase: ';
            $tx1_men_res_err = 'Nombre: '.$request->m_canombr.' ';
            $tx2_men_res_err = '';
            $tx3_men_res_err = '';
            $tx4_men_res_err = '';
            $tx5_men_res_err = '';
            $fo1_men_res_err = 'Ya existe un registro con estos parámetros';
            $fo2_men_res_err = 'Veámoslo ahora';
            $fo3_men_res_err = '';
            $fo4_men_res_err = '';
            $fo5_men_res_err = '';
            
            //2-3 RESULTADO ERROR: PARAMETROS
            $par_men_res_err = ['tit_men_res_err' => $tit_men_res_err,
                                'tx1_men_res_err' => $tx1_men_res_err,
                                'tx2_men_res_err' => $tx2_men_res_err,
                                'tx3_men_res_err' => $tx3_men_res_err,
                                'tx4_men_res_err' => $tx4_men_res_err,
                                'tx5_men_res_err' => $tx5_men_res_err,
                                'fo1_men_res_err' => $fo1_men_res_err,
                                'fo2_men_res_err' => $fo2_men_res_err,
                                'fo3_men_res_err' => $fo3_men_res_err,
                                'fo4_men_res_err' => $fo4_men_res_err,
                                'fo5_men_res_err' => $fo5_men_res_err];
            
            //2-4 RESULTADO ERROR: ENVIA
            //return redirect()->route('clases.index',['m_canombr'=>$request->m_canombr])->with($par_men_res_err);
            return redirect()->route('clases.index',
                    ['m_canombr'=>$request->m_canombr])->with($par_men_res_err);
        }
        else{
            
            //2-1 EL NOMBRE NUEVO NO EXISTE
            //2-2 INSERTAR LOS DATOS
            $clase= Capmmove::create([
                'm_canombr'=>$request->m_canombr,
                'm_canomse'=>$request->m_canomse,
                'm_cacodna'=>$request->m_cacodna,
                'm_nuval01'=>$request->m_nuval01,
                'm_nuval02'=>$request->m_nuval02,
                'm_nuval03'=>$request->m_nuval03,
                'm_nupor05'=>$request->m_nupor05,
                'm_nuval07'=>$request->m_nuval07,
                'm_causreg'=>Auth::user()->id,
                'm_causact'=>Auth::user()->id
            ]);
            
            //2-3 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_ini = $clase;

            //2-3 AUDITORIA: INSERTA REGISTRO POR NUEVO REGISTRO
            $audi_editar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_callave'=>$request->m_canombr,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$con_dat_ini]);

            //2-4 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Clase: ';
            $tx1_men_res_cor = 'Nombre: '.$request->m_canombr.' ';
            $tx2_men_res_cor = '';
            $tx3_men_res_cor = '';
            $tx4_men_res_cor = '';
            $tx5_men_res_cor = '';
            $fo1_men_res_cor = 'Registrado satisfactoriamente';
            $fo2_men_res_cor = '';
            $fo3_men_res_cor = '';
            $fo4_men_res_cor = '';
            $fo5_men_res_cor = '';

            //2-5 RESULTADO CORRECTO: PARAMETROS
            $par_men_res_cor = ['tit_men_res_cor' => $tit_men_res_cor, 
                                'tx1_men_res_cor' => $tx1_men_res_cor,
                                'tx2_men_res_cor' => $tx2_men_res_cor,
                                'tx3_men_res_cor' => $tx3_men_res_cor,
                                'tx4_men_res_cor' => $tx4_men_res_cor,
                                'tx5_men_res_cor' => $tx5_men_res_cor,
                                'fo1_men_res_cor' => $fo1_men_res_cor,
                                'fo2_men_res_cor' => $fo2_men_res_cor,
                                'fo3_men_res_cor' => $fo3_men_res_cor,
                                'fo4_men_res_cor' => $fo4_men_res_cor,
                                'fo5_men_res_cor' => $fo5_men_res_cor];
            
            //2-6 RESULTADO CORRECTO: ENVIA
            return redirect()->route('clases.index')->with($par_men_res_cor);
        }
    }

    //  5- EDITAR
    //Edit: Función para actualizar campos de registros
    public function edit($id){
        //1- PREPARA
        $clase= Capmmove::find($id);
        $causreg = User::find($clase->m_causreg);
        $nombre_usuario_causreg = $causreg->name;
        $clase['nombre_causreg'] = $nombre_usuario_causreg;

        //2-1 RESULTADOS: ENVIA
        return response()->json($clase);
    }
    
    //  6- MOSTRAR
    //Show: Función para mostrar campos de registros
    public function show($id){
        $clase= Capmmove::find($id);
        //return response()->json($clase);
        return view('admin.vehiculos.vehiculos.clases.consultar',compact('contrato'));
    }

    //  7- ACTUALIZAR
    //Update: Función para validar y actualizar campos de registros en tabla
    public function update(Request $request, $id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 11;
        $aud_nom_pag = 'clase';
        //2- BUSCA EL REGISTRO POR EL ID PARA VERIFICAR SI TIENE EL MISMO NOMBRE (LLAVE)
        $clase= Capmmove::find($id);

        //2-1 BUSCA EL REGISTRO POR EL ID TOMA VALORES INICIALES (AUDITORIA)
        $con_dat_ini = Capmmove::find($id);

        //2-2 COMPARA NOMBRE (LLAVE) REGISTRO HALLADO CON NOMBRE (LLAVE) DE LA RESPUESTA
        if($clase->m_canombr==$request->m_canombr){

            //2-3 CORRESPONDE AL MISMO NOMBRE (LLAVE) - NO FUE MODIFICADO - ACTUALIZA TODOS LOS CAMPOS
            $clase= Capmmove::find($id);
            $clase->m_canombr = $request->m_canombr;
            $clase->m_canomse = $request->m_canomse;
            $clase->m_cacodna = $request->m_cacodna;
            $clase->m_nuval01 = $request->m_nuval01;
            $clase->m_nuval02 = $request->m_nuval02;
            $clase->m_nuval03 = $request->m_nuval03;
            $clase->m_nupor05 = $request->m_nupor05;
            $clase->m_nuval07 = $request->m_nuval07;
            $clase->m_causact = Auth::user()->id;
            $clase->save();
            
            //2-4 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_fin = Capmmove::find($id);

            //2-5 COMPARA VALORES INICIALES VS VALORES FINALES
            if($con_dat_ini != $con_dat_fin){
                
                //CAMBIOS HALLADOS EN VALORES DE CAMPOS
                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                $audi_editar = Captaudi::create([
                    'm_nuidope'=>$aud_idu_ope,
                    'm_canombr'=>$aud_nom_pag,
                    'm_callave'=>$request->m_canombr,
                    'm_nuidusu'=>Auth::user()->id,
                    'm_cadeini'=>$con_dat_ini,
                    'm_cadefin'=>$con_dat_fin]);
            
                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Clase: ';
                $tx1_men_res_cor = 'Nombre: '.$request->m_canombr.' ';
                $tx2_men_res_cor = '';
                $tx3_men_res_cor = '';
                $tx4_men_res_cor = '';
                $tx5_men_res_cor = '';
                $fo1_men_res_cor = 'Actualizado satisfactoriamente';
                $fo2_men_res_cor = '';
                $fo3_men_res_cor = '';
                $fo4_men_res_cor = '';
                $fo5_men_res_cor = '';
                
                //2-8 RESULTADO CORRECTO: PARAMETROS
                $par_men_res_cor = ['tit_men_res_cor' => $tit_men_res_cor,
                                    'tx1_men_res_cor' => $tx1_men_res_cor,
                                    'tx2_men_res_cor' => $tx2_men_res_cor,
                                    'tx3_men_res_cor' => $tx3_men_res_cor,
                                    'tx4_men_res_cor' => $tx4_men_res_cor,
                                    'tx5_men_res_cor' => $tx5_men_res_cor,
                                    'fo1_men_res_cor' => $fo1_men_res_cor,
                                    'fo2_men_res_cor' => $fo2_men_res_cor,
                                    'fo3_men_res_cor' => $fo3_men_res_cor,
                                    'fo4_men_res_cor' => $fo4_men_res_cor,
                                    'fo5_men_res_cor' => $fo5_men_res_cor];
                
                //2-9 RESULTADO CORRECTO: ENVIA
                return redirect()->route('clases.index')->with($par_men_res_cor);
                
            } else{
                // NO HALLO CAMBIOS EN VALORES DE CAMPOS: ENVIA
                return redirect()->route('clases.index');
            }

        } else if($clase->m_canombr!==$request->m_canombr){
            
            //2-3 EL NOMBRE FUE MODIFICADO
            //2-4 CONSULTA PARA REVISAR QUE EL NUEVO NOMBRE NO ESTÉ YA EN LA TABLA
            $validar = Capmmove::where('m_canombr',$request->m_canombr)->get();
            if(count($validar)>0){
                
                //2-5 ERROR EL NUEVO NOMBRE YA ESTA EN LA TABLA
                //2-6 RESULTADO ERROR: MENSAJES
                $tit_men_res_err = 'Clase: ';
                $tx1_men_res_err = 'Nombre: '.$request->m_canombr.' ';
                $tx2_men_res_err = '';
                $tx3_men_res_err = '';
                $tx4_men_res_err = '';
                $tx5_men_res_err = '';
                $fo1_men_res_err = 'Ya existe un registro con estos parámetros';
                $fo2_men_res_err = 'Veámoslo ahora';
                $fo3_men_res_err = '';
                $fo4_men_res_err = '';
                $fo5_men_res_err = '';
                
                //2-7 RESULTADO ERROR: PARAMETROS
                $par_men_res_err = ['tit_men_res_err' => $tit_men_res_err,
                                    'tx1_men_res_err' => $tx1_men_res_err,
                                    'tx2_men_res_err' => $tx2_men_res_err,
                                    'tx3_men_res_err' => $tx3_men_res_err,
                                    'tx4_men_res_err' => $tx4_men_res_err,
                                    'tx5_men_res_err' => $tx5_men_res_err,
                                    'fo1_men_res_err' => $fo1_men_res_err,
                                    'fo2_men_res_err' => $fo2_men_res_err,
                                    'fo3_men_res_err' => $fo3_men_res_err,
                                    'fo4_men_res_err' => $fo4_men_res_err,
                                    'fo5_men_res_err' => $fo5_men_res_err];
                
                //2-8 RESULTADO ERROR: ENVIA
                return redirect()->route('clases.index',
                        ['m_canombr'=>$request->m_canombr])->with($par_men_res_err);
               
            } else{
                
                //2-5 EL NUEVO NOMBRE NO ESTA EN LA TABLA
                $clase= Capmmove::find($id);
                $clase->m_canombr = $request->m_canombr;
                $clase->m_canomse = $request->m_canomse;
                $clase->m_cacodna = $request->m_cacodna;
                $clase->m_nuval01 = $request->m_nuval01;
                $clase->m_nuval02 = $request->m_nuval02;
                $clase->m_nuval03 = $request->m_nuval03;
                $clase->m_nupor05 = $request->m_nupor05;
                $clase->m_nuval07 = $request->m_nuval07;
                $clase->m_causact = Auth::user()->id;
                $clase->save();

                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                $audi_editar = Captaudi::create([
                    'm_nuidope'=>$aud_idu_ope,
                    'm_canombr'=>$aud_nom_pag,
                    'm_callave'=>$request->m_canombr,
                    'm_nuidusu'=>Auth::user()->id,
                    'm_cadeini'=>$con_dat_ini,
                    'm_cadefin'=>$clase]);

                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Clase: ';
                $tx1_men_res_cor = 'Nombre: '.$request->m_canombr.' ';
                $tx2_men_res_cor = '';
                $tx3_men_res_cor = '';
                $tx4_men_res_cor = '';
                $tx5_men_res_cor = '';
                $fo1_men_res_cor = 'Actualizado satisfactoriamente';
                $fo2_men_res_cor = '';
                $fo3_men_res_cor = '';
                $fo4_men_res_cor = '';
                $fo5_men_res_cor = '';

                //2-8 RESULTADO CORRECTO: PARAMETROS
                $par_men_res_cor = ['tit_men_res_cor' => $tit_men_res_cor,
                                    'tx1_men_res_cor' => $tx1_men_res_cor,
                                    'tx2_men_res_cor' => $tx2_men_res_cor,
                                    'tx3_men_res_cor' => $tx3_men_res_cor,
                                    'tx4_men_res_cor' => $tx4_men_res_cor,
                                    'tx5_men_res_cor' => $tx5_men_res_cor,
                                    'fo1_men_res_cor' => $fo1_men_res_cor,
                                    'fo2_men_res_cor' => $fo2_men_res_cor,
                                    'fo3_men_res_cor' => $fo3_men_res_cor,
                                    'fo4_men_res_cor' => $fo4_men_res_cor,
                                    'fo5_men_res_cor' => $fo5_men_res_cor];
                
                //2-9 RESULTADO CORRECTO: ENVIA
                return redirect()->route('clases.index')->with($par_men_res_cor);
            }
        }
    }

    //  8- ELIMINAR
    //Destroy: Función para eliminar registros en tabla
    public function destroy($id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 21;
        $aud_nom_pag = 'clase';

        //2- BUSCA EL REGISTRO POR EL ID POR SI YA HA SIDO ELIMINADO (SEGURIDAD)
        $clase= Capmmove::find($id);
        if($clase){
            //REGISTRO HALLADO EN LA TABLA - PUEDE ELIMINARLO

            //2-1 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Clase: ';
            $tx1_men_res_cor = 'Nombre: '.$clase->m_canombr.' ';
            $tx2_men_res_cor = '';
            $tx3_men_res_cor = '';
            $tx4_men_res_cor = '';
            $tx5_men_res_cor = '';
            $fo1_men_res_cor = 'Eliminado satisfactoriamente';
            $fo2_men_res_cor = '';
            $fo3_men_res_cor = '';
            $fo4_men_res_cor = '';
            $fo5_men_res_cor = '';

            //2-2 RESULTADO CORRECTO: PARAMETROS
            $par_men_res_cor = ['tit_men_res_cor' => $tit_men_res_cor,
                                'tx1_men_res_cor' => $tx1_men_res_cor,
                                'tx2_men_res_cor' => $tx2_men_res_cor,
                                'tx3_men_res_cor' => $tx3_men_res_cor,
                                'tx4_men_res_cor' => $tx4_men_res_cor,
                                'tx5_men_res_cor' => $tx5_men_res_cor,
                                'fo1_men_res_cor' => $fo1_men_res_cor,
                                'fo2_men_res_cor' => $fo2_men_res_cor,
                                'fo3_men_res_cor' => $fo3_men_res_cor,
                                'fo4_men_res_cor' => $fo4_men_res_cor,
                                'fo5_men_res_cor' => $fo5_men_res_cor];
            
            //2-3 AUDITORIA: INSERTA REGISTRO POR REGISTRO ELIMINADO
            $aud_nom_pag = 'clase';
            $audi_borrar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_callave'=>$clase->m_canombr,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$clase]);

            //2-4 ELIMINA REGISTRO
            $clase->delete();

            //2-5 RESULTADO CORRECTO: ENVIA
            return redirect()->route('clases.index')->with($par_men_res_cor);

        }else{
            //REGISTRO NO HALLADO EN LA TABLA
            
            //3-1 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Clase: ';
            $tx1_men_res_err = '';
            $tx2_men_res_err = '';
            $tx3_men_res_err = '';
            $tx4_men_res_err = '';
            $tx5_men_res_err = '';
            $fo1_men_res_err = 'Registro no hallado';
            $fo2_men_res_err = ' ¡Ups! ';
            $fo3_men_res_err = '';
            $fo4_men_res_err = '';
            $fo5_men_res_err = '';
            
            //3-2 RESULTADO ERROR: PARAMETROS
            $par_men_res_err = ['tit_men_res_err' => $tit_men_res_err,
                                'tx1_men_res_err' => $tx1_men_res_err,
                                'tx2_men_res_err' => $tx2_men_res_err,
                                'tx3_men_res_err' => $tx3_men_res_err,
                                'tx4_men_res_err' => $tx4_men_res_err,
                                'tx5_men_res_err' => $tx5_men_res_err,
                                'fo1_men_res_err' => $fo1_men_res_err,
                                'fo2_men_res_err' => $fo2_men_res_err,
                                'fo3_men_res_err' => $fo3_men_res_err,
                                'fo4_men_res_err' => $fo4_men_res_err,
                                'fo5_men_res_err' => $fo5_men_res_err];
            
            //3-3 RESULTADO ERROR: ENVIA
            return redirect()->route('clases.index')->with($par_men_res_err);
        }
    }

    //  9- EXPORTAR: PDF
    // Funcion para exportar PDF
    public function exportarpdf(Request $request){

        //return $request;
        ///*
        
        // 0- ORDEN FILTROS
        //ORDENAMIENTO
        // ASCENDENTE - DESCENTE
        $this->m_canombr_ordene=$request->m_canombr_ordene;
        // NOMBRE CAMPO
        $this->m_canombr_campos=$request->m_canombr_campos;
        // FILTROS
        $this->m_canombr_filtro=$request->m_canombr;
        $this->m_canomse_filtro=$request->m_canomse;
        $this->m_cacodna_filtro=$request->m_cacodna;
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;

        // 0- CONSULTA
        if($this->m_canombr_campos=="llave_compuesta"){
            $clases = Capmmove::nombre($this->m_canombr_filtro)->
                            Servicio($this->m_canomse_filtro)->
                            Codigo_nacional($this->m_cacodna_filtro)->
                            estado($this->m_caestad_filtro)->
                            usuario_registra($this->m_causreg_filtro)->
                            usuario_actualiza($this->m_causact_filtro)->
                            orderBy(' Capmmove.m_canombr',$this->m_canombr_ordene)->get();
        }else{
            $clases = Capmmove::nombre($this->m_canombr_filtro)->
                            Servicio($this->m_canomse_filtro)->
                            Codigo_nacional($this->m_cacodna_filtro)->
                            estado($this->m_caestad_filtro)->
                            usuario_registra($this->m_causreg_filtro)->
                            usuario_actualiza($this->m_causact_filtro)->
                            orderBy($this->m_canombr_campos,$this->m_canombr_ordene)->get();
        }

        $barra = new DNS1D();
        $pdf = \App::make('dompdf.wrapper');
        $vista = \view('admin.vehiculos.vehiculos.clases.exportarpdf',compact('clases'))->render();
        
        $pdf->loadHTML($vista);
        // Obtiene fecha y hora actual
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'clase_'.$cadena_fecha_actual.'.pdf';
        //  Resultados
        return $pdf->download($nombre_archivo);

        //*/

    }

    //  10- EXPORTAR: HOJA DE CALCULO
    // Funcion para exportar HOJA DE CALCULO
    public function exportarexcel(Request $request){

        // 0- ORDEN FILTROS
        //ORDENAMIENTO
        // ASCENDENTE - DESCENTE
        $this->m_canombr_ordene=$request->m_canombr_ordene;
        // NOMBRE CAMPO
        $this->m_canombr_campos=$request->m_canombr_campos;
        // FILTROS
        $this->m_canombr_filtro=$request->m_canombr;
        $this->m_canomse_filtro=$request->m_canomse;
        $this->m_cacodna_filtro=$request->m_cacodna;
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;
        
        // Obtiene fecha y hora actual
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'clase_'.$cadena_fecha_actual;

        Excel::create($nombre_archivo, function($excel) {
            $excel->sheet('clase', function($sheet) {

                // 0- CONSULTA
                if($this->m_canombr_campos=="llave_compuesta"){
                    $clases = Capmmove::nombre($this->m_canombr_filtro)->
                                    Servicio($this->m_canomse_filtro)->
                                    Codigo_nacional($this->m_cacodna_filtro)->
                                    estado($this->m_caestad_filtro)->
                                    usuario_registra($this->m_causreg_filtro)->
                                    usuario_actualiza($this->m_causact_filtro)->
                                    orderBy(' Capmmove.m_canombr',$this->m_canombr_ordene)->get();
                }else{
                    $clases = Capmmove::nombre($this->m_canombr_filtro)->
                                    Servicio($this->m_canomse_filtro)->
                                    Codigo_nacional($this->m_cacodna_filtro)->
                                    estado($this->m_caestad_filtro)->
                                    usuario_registra($this->m_causreg_filtro)->
                                    usuario_actualiza($this->m_causact_filtro)->
                                    orderBy($this->m_canombr_campos,$this->m_canombr_ordene)->get();
                }

                // 1- EMPRESA RAZON SOCIAL
                $emp_raz_soc = Auth::user()->empresa->m_carazso;
                // 2- EMPRESA NUIPE
                $emp_nui_pes = Auth::user()->empresa->m_canuipe;
                // 3- OFICINA NOMBRE
                $ofi_nom_bre = Auth::user()->oficina->m_canombr;
                // 4- OFICINA UBICACION REGIONAL - VARIABLE GLOBAL
                //      Session::get('glo_ofi_ubi_reg'
                // 5- APLICATIVO NOMBRE
                $app_nom_bre = 'mistiquetes.com';
                // 6- TITULO CONSULTA
                $tit_con_sul = 'CONSULTA CLASE VEHICULOS';

                // 20- TOTAL REGISTROS
                $tot_reg_ist = $clases->Count();
                // 21- GENERADO FECHA HORA
                $fecha_hora = new DateTime();

                setlocale(LC_TIME,"es_ES");
                date_default_timezone_set ('America/Bogota');
                $fec_hor_gen = strftime("El %A, %d de %B del %Y - %r - Spreadsheet (Hoja de calculo)");
                // 22- GENERADO USUARIO
                $usu_gen_era = Auth::user()->name;
                // 23- GENERADO NOTICIA
                $not_cla_con = 'Aplican cláusulas de confidencialidad en el manejo de información';


                // 1- EMPRESA RAZON SOCIAL
                $sheet->row(1, array($emp_raz_soc));
                //      ESTILO
                $sheet->mergeCells('A1:L1');
                $sheet->row(1, function ($row) {
                    $row->setFontFamily('Arial');
                    $row->setFontSize(14);
                });

                // 2- EMPRESA NUIPE
                $sheet->row(2, array($emp_nui_pes));
                //      ESTILO
                $sheet->mergeCells('A2:L2');
                $sheet->row(2, function ($row) {
                    $row->setFontFamily('Arial');
                    $row->setFontSize(12);
                });

                // 3- OFICINA NOMBRE
                $sheet->row(3, array($ofi_nom_bre));
                //      ESTILO
                $sheet->mergeCells('A3:L3');
                $sheet->row(3, function ($row) {
                    $row->setFontFamily('Arial');
                    $row->setFontSize(12);
                });

                // 4- OFICINA UBICACION REGIONAL
                $sheet->row(4, array(Session::get('glo_ofi_ubi_reg')));
                //      ESTILO
                $sheet->mergeCells('A4:L4');
                $sheet->row(4, function ($row) {
                    $row->setFontFamily('Arial');
                    $row->setFontSize(12);
                });

                // 5- APLICATIVO NOMBRE
                $sheet->row(5, array($app_nom_bre));
                //      ESTILO
                $sheet->mergeCells('A5:L5');
                $sheet->row(5, function ($row) {
                    $row->setFontFamily('Arial');
                    $row->setFontSize(12);
                });

                // 6- TITULO CONSULTA
                $sheet->row(6, array($tit_con_sul));
                //      ESTILO
                $sheet->mergeCells('A6:L6');
                $sheet->row(6, function ($row) {
                    $row->setFontFamily('Arial');
                    $row->setFontSize(12);
                });

                // ENCABEZADOS
                $sheet->row(7, [
                        'Identificador', 'Clase','Servicio',
                        'Código nacional', 'Estado',
                        'Registro', 'Usuario', 'actualizado', 'Usuario',
                        'Total registros', 'Generado fecha - hora', 'Generado usuario', 'Noticia'
                    ]);

                //      ESTILO
                $sheet->Cells('A7:Z7');
                $sheet->row(7, function ($row) {
                    // Fuente
                    $row->setFontFamily('Arial');
                    // Negrita
                    $row->setFontWeight('bold');
                    // Tamaño
                    $row->setFontSize(10);
                    // Alineamiento
                    $row->setAlignment('center');
                    // Fondo
                    $row->setBackground('#4eb24d');
                    // Bordes - Set all borders (top, right, bottom, left)
                    $row->setBorder('thin','thin','thin','thin');
                });

                // REGISTROS
                foreach($clases as $index => $clase) {

                    //      ESTILO
                    $sheet->Cells('A8:Z100000');
                    $sheet->row($index+8, function ($row) {
                        $row->setFontFamily('Arial');
                        $row->setFontSize(10);
                    });

                    if ($index) {
                            $sheet->row($index+8, [
                            $clase->m_nucodig, $clase->m_canombr, $clase->m_canomse,
                            $clase->m_cacodna, $clase->m_caestad,
                            $clase->created_at, $clase->usuario_registra->name,
                            $clase->updated_at, $clase->usuario_actualiza->name,
                        ]);
                    } else {
                        $sheet->row($index+8, [
                            $clase->m_nucodig, $clase->m_canombr, $clase->m_canomse,
                            $clase->m_cacodna, $clase->m_caestad,
                            $clase->created_at, $clase->usuario_registra->name,
                            $clase->updated_at, $clase->usuario_actualiza->name,
                            $tot_reg_ist, $fec_hor_gen, $usu_gen_era, $not_cla_con
                        ]);
                    }
                }

                // PIE
                //      ESTILO
                $sheet->row(($tot_reg_ist+9), function ($row) {
                // Fuente
                $row->setFontFamily('Arial');
                // Negrita
                $row->setFontWeight('bold');
                // Tamaño
                $row->setFontSize(10);
                // Alineamiento
                $row->setAlignment('center');
                // Fondo
                $row->setBackground('#4eb24d');
                // Bordes - Set all borders (top, right, bottom, left)
                $row->setBorder('thin','thin','thin','thin');
                }); 
            });
        })->export('xlsx');

        return redirect()->route('clases.index');
    
    }

    //  11- NOTIFICACIONES
    // NOTIFICACIONES USUARIO
    public function notification($type)
    {
        switch ($type) {
            case 'message':
                alert()->message('Notificación solo con mensaje');
                break;
            case 'basic':
                alert()->basic('Notificación Básica, mensaje y título', 'Título');
                break;
            case 'info':
                alert()->info('Notificación tipo Información');
                break;
            case 'success':
                alert()->success('Notificación de Éxito.','Título')->autoclose(3000);
                break;
            case 'error':
                alert()->error('Notificación de Error');
                break;
            case 'warning':
                alert()->warning('Notificación de Advertencia');
                break;
        }

        return redirect()->route('home');
    }
}

