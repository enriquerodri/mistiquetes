<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           SegurosControler.php
//Descripción:      Seguros para control por fecha de vencimiento (humanos - robots - vehículos)
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
use App\Capmsegu;
use App\Captaudi;
use App\User;

setlocale(LC_TIME,"es_ES"); date_default_timezone_set ('America/Bogota');

class SegurosController extends Controller
{

    //ORDENAMIENTO
    // ASCENDENTE - DESCENTE
    private $m_canombr_ordene="asc";
    // NOMBRE CAMPO
    private $m_canombr_campos="m_canombr";
    //FILTROS
    private $m_canombr_filtro="";
    private $m_cadescr_filtro="";
    private $m_caapper_filtro="";
    private $m_caapvpa_filtro="";
    private $m_caapvca_filtro="";
    private $m_caaprem_filtro="";
    private $m_caresol_filtro="";
    private $m_cacoven_filtro="";
    private $m_caacmav_filtro="";
    private $m_caapesv_filtro="";
    private $m_caacrma_filtro="";
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
            $m_cadescr_filtro="";
            $m_caapper_filtro="";
            $m_caapvpa_filtro="";
            $m_caapvca_filtro="";
            $m_caaprem_filtro="";
            $m_caresol_filtro="";
            $m_cacoven_filtro="";
            $m_caacmav_filtro="";
            $m_caapesv_filtro="";
            $m_caacrma_filtro="";
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
                $m_cadescr_filtro = $request->m_cadescr;
                $m_caapper_filtro = $request->m_caapper;
                $m_caapvpa_filtro = $request->m_caapvpa;
                $m_caapvca_filtro = $request->m_caapvca;
                $m_caaprem_filtro = $request->m_caaprem;
                $m_caresol_filtro = $request->m_caresol;
                $m_cacoven_filtro = $request->m_cacoven;
                $m_caacmav_filtro = $request->m_caacmav;
                $m_caapesv_filtro = $request->m_caapesv;
                $m_caacrma_filtro = $request->m_caacrma;
                $m_cacodna_filtro = $request->m_cacodna;
                $m_caestad_filtro = $request->m_caestad;
                $m_causreg_filtro = $request->m_causreg;
                $m_causact_filtro = $request->m_causact;
            }
            
            //  return $m_canombr_ordene;
            //  return $m_canombr_campos;
            //  /*
            //  SEGUROS
            if($m_canombr_campos=="llave_compuesta"){
                $seguros = Capmsegu::nombre($request->m_canombr)->
                Documento_descripcion($request->m_cadescr)->
                Documento_a_personas($request->m_caapper)->
                Documento_a_v_pasajeros($request->m_caapvpa)->
                Documento_a_v_carga($request->m_caapvca)->
                Documento_a_remolques($request->m_caaprem)->
                Documento_resolucion($request->m_caresol)->
                Documento_c_vencimiento($request->m_cacoven)->
                Documento_a_masivas($request->m_caacmav)->
                Documento_pesv($request->m_caapesv)->
                Documento_cronograma($request->m_caacrma)->
                Codigo_nacional($request->m_cacodna)->
                estado($request->m_caestad)->
                usuario_registra($request->m_causreg)->
                usuario_actualiza($request->m_causact)->
                orderBy('m_canombr',$m_canombr_ordene)->paginate(20);
            }else{
                $seguros = Capmsegu::nombre($request->m_canombr)->
                Documento_descripcion($request->m_cadescr)->
                Documento_a_personas($request->m_caapper)->
                Documento_a_v_pasajeros($request->m_caapvpa)->
                Documento_a_v_carga($request->m_caapvca)->
                Documento_a_remolques($request->m_caaprem)->
                Documento_resolucion($request->m_caresol)->
                Documento_c_vencimiento($request->m_cacoven)->
                Documento_a_masivas($request->m_caacmav)->
                Documento_pesv($request->m_caapesv)->
                Documento_cronograma($request->m_caacrma)->
                Codigo_nacional($request->m_cacodna)->
                estado($request->m_caestad)->
                usuario_registra($request->m_causreg)->
                usuario_actualiza($request->m_causact)->
                orderBy($m_canombr_campos,$m_canombr_ordene)->paginate(20);
            }

            //  USUARIOS
            $usuarios = User::orderBy('name','asc')->pluck('name','id');
            //  VISTA
            return view('admin.programador.seguros.index',
                compact('seguros','usuarios','m_canombr_filtro',
                'm_cadescr_filtro','m_caapper_filtro',
                'm_caapvpa_filtro','m_caapvca_filtro',
                'm_caaprem_filtro','m_caresol_filtro',
                'm_cacoven_filtro','m_caacmav_filtro',
                'm_caapesv_filtro','m_caacrma_filtro',
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
        return view('admin.programador.seguros.crear');
    }

    //  4- ALMACENAR
    //Store: Función para validar datos y luego insertarlos en tabla
    public function store(Request $request){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 1;
        $aud_nom_pag = 'seguros';

        //2- CONSULTA SI EL NOMBRE YA EXISTE
        //$seguros = Capmsegu::where('m_canombr',$request->m_canombr)->get();
        $seguros = Capmsegu::where('m_canombr',$request->m_canombr)->get();

        if(count($seguros)>0){

            //2-1 EL NUEVO NOMBRE YA ESTA EN LA TABLA
            //2-2 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Seguro: ';
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
            //return redirect()->route('seguros.index',['m_canombr'=>$request->m_canombr])->with($par_men_res_err);
            return redirect()->route('seguros.index',
                    ['m_canombr'=>$request->m_canombr])->with($par_men_res_err);
        }
        else{
            
            //2-1 EL NOMBRE NUEVO NO EXISTE
            //2-2 INSERTAR LOS DATOS
            $seguro = Capmsegu::create([
                'm_canombr'=>$request->m_canombr,
                'm_cacodna'=>$request->m_cacodna,
                'm_nuorden'=>$request->m_nuorden,
                'm_caresol'=>$request->m_caresol,
                'm_feresol'=>$request->m_feresol,
                'm_cadescr'=>$request->m_cadescr,
                'm_caapper'=>$request->m_caapper,
                'm_caapvpa'=>$request->m_caapvpa,
                'm_caapvca'=>$request->m_caapvca,
                'm_caaprem'=>$request->m_caaprem,
                'm_cacoven'=>$request->m_cacoven,
                'm_nudiapv'=>$request->m_nudiapv,
                'm_caacmav'=>$request->m_caacmav,
                'm_caapesv'=>$request->m_caapesv,
                'm_caacrma'=>$request->m_caacrma,
                'm_caestad'=>$request->m_caestad,
                'm_causreg'=>Auth::user()->id,
                'm_causact'=>Auth::user()->id
            ]);

            //2-3 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_ini = $seguro;

            //2-3 AUDITORIA: INSERTA REGISTRO POR NUEVO REGISTRO
            $audi_editar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_callave'=>$request->m_canombr,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$con_dat_ini]);

            //2-4 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Seguro: ';
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
            return redirect()->route('seguros.index')->with($par_men_res_cor);
        }
    }

    //  5- EDITAR
    //Edit: Función para actualizar campos de registros
    public function edit($id){
        //1- PREPARA
        $seguro = Capmsegu::find($id);
        $causreg = User::find($seguro->m_causreg);
        $nombre_usuario_causreg = $causreg->name;
        $seguro['nombre_causreg'] = $nombre_usuario_causreg;

        //2-1 RESULTADOS: ENVIA
        return response()->json($seguro);
    }
    
    //  6- MOSTRAR
    //Show: Función para mostrar campos de registros
    public function show($id){
        $seguro = Capmsegu::find($id);
        //return response()->json($seguro);
        return view('admin.programador.seguros.consultar',compact('seguro'));
    }

    //  7- ACTUALIZAR
    //Update: Función para validar y actualizar campos de registros en tabla
    public function update(Request $request, $id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 11;
        $aud_nom_pag = 'seguros';
        //2- BUSCA EL REGISTRO POR EL ID PARA VERIFICAR SI TIENE EL MISMO NOMBRE (LLAVE)
        $seguro = Capmsegu::find($id);

        //2-1 BUSCA EL REGISTRO POR EL ID TOMA VALORES INICIALES (AUDITORIA)
        $con_dat_ini = Capmsegu::find($id);

        //2-2 COMPARA NOMBRE (LLAVE) REGISTRO HALLADO CON NOMBRE (LLAVE) DE LA RESPUESTA
        if($seguro->m_canombr==$request->m_canombr){

            //2-3 CORRESPONDE AL MISMO NOMBRE (LLAVE) - NO FUE MODIFICADO - ACTUALIZA TODOS LOS CAMPOS
            $seguro = Capmsegu::find($id);
            $seguro->m_canombr = $request->m_canombr;
            $seguro->m_cacodna = $request->m_cacodna;
            $seguro->m_nuorden = $request->m_nuorden;
            $seguro->m_caresol = $request->m_caresol;
            $seguro->m_feresol = $request->m_feresol;
            $seguro->m_cadescr = $request->m_cadescr;
            $seguro->m_caapper = $request->m_caapper;
            $seguro->m_caapvpa = $request->m_caapvpa;
            $seguro->m_caapvca = $request->m_caapvca;
            $seguro->m_caaprem = $request->m_caaprem;
            $seguro->m_cacoven = $request->m_cacoven;
            $seguro->m_nudiapv = $request->m_nudiapv;
            $seguro->m_caacmav = $request->m_caacmav;
            $seguro->m_caapesv = $request->m_caapesv;
            $seguro->m_caacrma = $request->m_caacrma;
            $seguro->m_caestad = $request->m_caestad;
            $seguro->m_causact = Auth::user()->id;
            $seguro->save();
            
            //2-4 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_fin = Capmsegu::find($id);

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
                $tit_men_res_cor = 'Seguro: ';
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
                return redirect()->route('seguros.index')->with($par_men_res_cor);
                
            } else{
                // NO HALLO CAMBIOS EN VALORES DE CAMPOS: ENVIA
                return redirect()->route('seguros.index');
            }

        } else if($seguro->m_canombr!==$request->m_canombr){
            
            //2-3 EL NOMBRE FUE MODIFICADO
            //2-4 CONSULTA PARA REVISAR QUE EL NUEVO NOMBRE NO ESTÉ YA EN LA TABLA
            $validar = Capmsegu::where('m_canombr',$request->m_canombr)->get();
            if(count($validar)>0){
                
                //2-5 ERROR EL NUEVO NOMBRE YA ESTA EN LA TABLA
                //2-6 RESULTADO ERROR: MENSAJES
                $tit_men_res_err = 'Seguro: ';
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
                return redirect()->route('seguros.index',
                        ['m_canombr'=>$request->m_canombr])->with($par_men_res_err);
               
            } else{
                
                //2-5 EL NUEVO NOMBRE NO ESTA EN LA TABLA
                $seguro = Capmsegu::find($id);
                $seguro->m_canombr = $request->m_canombr;
                $seguro->m_cacodna = $request->m_cacodna;
                $seguro->m_nuorden = $request->m_nuorden;
                $seguro->m_caresol = $request->m_caresol;
                $seguro->m_feresol = $request->m_feresol;
                $seguro->m_cadescr = $request->m_cadescr;
                $seguro->m_caapper = $request->m_caapper;
                $seguro->m_caapvpa = $request->m_caapvpa;
                $seguro->m_caapvca = $request->m_caapvca;
                $seguro->m_caaprem = $request->m_caaprem;
                $seguro->m_cacoven = $request->m_cacoven;
                $seguro->m_nudiapv = $request->m_nudiapv;
                $seguro->m_caacmav = $request->m_caacmav;
                $seguro->m_caapesv = $request->m_caapesv;
                $seguro->m_caacrma = $request->m_caacrma;
                $seguro->m_caestad = $request->m_caestad;
                $seguro->m_causact = Auth::user()->id;
                $seguro->save();

                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                $audi_editar = Captaudi::create([
                    'm_nuidope'=>$aud_idu_ope,
                    'm_canombr'=>$aud_nom_pag,
                    'm_callave'=>$request->m_canombr,
                    'm_nuidusu'=>Auth::user()->id,
                    'm_cadeini'=>$con_dat_ini,
                    'm_cadefin'=>$seguro]);

                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Seguro: ';
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
                return redirect()->route('seguros.index')->with($par_men_res_cor);
            }
        }
    }

    //  8- ELIMINAR
    //Destroy: Función para eliminar registros en tabla
    public function destroy($id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 21;
        $aud_nom_pag = 'seguros';

        //2- BUSCA EL REGISTRO POR EL ID POR SI YA HA SIDO ELIMINADO (SEGURIDAD)
        $seguro = Capmsegu::find($id);
        if($seguro){
            //REGISTRO HALLADO EN LA TABLA - PUEDE ELIMINARLO

            //2-1 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Seguro: ';
            $tx1_men_res_cor = 'Nombre: '.$seguro->m_canombr.' ';
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
            $aud_nom_pag = 'seguros';
            $audi_borrar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_callave'=>$seguro->m_canombr,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$seguro]);

            //2-4 ELIMINA REGISTRO
            $seguro->delete();

            //2-5 RESULTADO CORRECTO: ENVIA
            return redirect()->route('seguros.index')->with($par_men_res_cor);

        }else{
            //REGISTRO NO HALLADO EN LA TABLA
            
            //3-1 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Seguro: ';
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
            return redirect()->route('seguros.index')->with($par_men_res_err);
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
        $this->m_cadescr_filtro=$request->m_cadescr;
        $this->m_caapper_filtro=$request->m_caapper;
        $this->m_caapvpa_filtro=$request->m_caapvpa;
        $this->m_caapvca_filtro=$request->m_caapvca;
        $this->m_caaprem_filtro=$request->m_caaprem;
        $this->m_caresol_filtro=$request->m_caresol;
        $this->m_cacoven_filtro=$request->m_cacoven;
        $this->m_caacmav_filtro=$request->m_caacmav;
        $this->m_caapesv_filtro=$request->m_caapesv;
        $this->m_caacrma_filtro=$request->m_caacrma;
        $this->m_cacodna_filtro=$request->m_cacodna;
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;

        // 0- CONSULTA
        if($this->m_canombr_campos=="llave_compuesta"){
            $seguros = Capmsegu::nombre($this->m_canombr_filtro)->
            Documento_descripcion($this->m_cadescr_filtro)->
            Documento_a_personas($this->m_caapper_filtro)->
            Documento_a_v_pasajeros($this->m_caapvpa_filtro)->
            Documento_a_v_carga($this->m_caapvca_filtro)->
            Documento_a_remolques($this->m_caaprem_filtro)->
            Documento_resolucion($this->m_caresol_filtro)->
            Documento_c_vencimiento($this->m_cacoven_filtro)->
            Documento_a_masivas($this->m_caacmav_filtro)->
            Documento_pesv($this->m_caapesv_filtro)->
            Documento_cronograma($this->m_caacrma_filtro)->
            Codigo_nacional($this->m_cacodna_filtro)->
            estado($this->m_caestad_filtro)->
            usuario_registra($this->m_causreg_filtro)->
            usuario_actualiza($this->m_causact_filtro)->
            orderBy('m_canombr',m_canombr_ordene)->get();
        }else{
            $seguros = Capmsegu::nombre($this->m_canombr_filtro)->
            Documento_descripcion($this->m_cadescr_filtro)->
            Documento_a_personas($this->m_caapper_filtro)->
            Documento_a_v_pasajeros($this->m_caapvpa_filtro)->
            Documento_a_v_carga($this->m_caapvca_filtro)->
            Documento_a_remolques($this->m_caaprem_filtro)->
            Documento_resolucion($this->m_caresol_filtro)->
            Documento_c_vencimiento($this->m_cacoven_filtro)->
            Documento_a_masivas($this->m_caacmav_filtro)->
            Documento_pesv($this->m_caapesv_filtro)->
            Documento_cronograma($this->m_caacrma_filtro)->
            Codigo_nacional($this->m_cacodna_filtro)->
            estado($this->m_caestad_filtro)->
            usuario_registra($this->m_causreg_filtro)->
            usuario_actualiza($this->m_causact_filtro)->
            orderBy($this->m_canombr_campos,$this->m_canombr_ordene)->get();
        }

        $barra = new DNS1D();
        $pdf = \App::make('dompdf.wrapper');
        $vista = \view('admin.programador.seguros.exportarpdf',compact('seguros'))->render();
        
        $pdf->loadHTML($vista);
        // Obtiene fecha y hora actual
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'seguros_'.$cadena_fecha_actual.'.pdf';
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
        $this->m_cadescr_filtro=$request->m_cadescr;
        $this->m_caapper_filtro=$request->m_caapper;
        $this->m_caapvpa_filtro=$request->m_caapvpa;
        $this->m_caapvca_filtro=$request->m_caapvca;
        $this->m_caaprem_filtro=$request->m_caaprem;
        $this->m_caresol_filtro=$request->m_caresol;
        $this->m_cacoven_filtro=$request->m_cacoven;
        $this->m_caacmav_filtro=$request->m_caacmav;
        $this->m_caapesv_filtro=$request->m_caapesv;
        $this->m_caacrma_filtro=$request->m_caacrma;
        $this->m_cacodna_filtro=$request->m_cacodna;
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;
        
        // Obtiene fecha y hora actual
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'seguros_'.$cadena_fecha_actual;

        Excel::create($nombre_archivo, function($excel) {
            $excel->sheet('seguros', function($sheet) {

            // 0- CONSULTA
            if($this->m_canombr_campos=="llave_compuesta"){
                $seguros = Capmsegu::nombre($this->m_canombr_filtro)->
                Documento_descripcion($this->m_cadescr_filtro)->
                Documento_a_personas($this->m_caapper_filtro)->
                Documento_a_v_pasajeros($this->m_caapvpa_filtro)->
                Documento_a_v_carga($this->m_caapvca_filtro)->
                Documento_a_remolques($this->m_caaprem_filtro)->
                Documento_resolucion($this->m_caresol_filtro)->
                Documento_c_vencimiento($this->m_cacoven_filtro)->
                Documento_a_masivas($this->m_caacmav_filtro)->
                Documento_pesv($this->$m_caapesv_filtro)->
                Documento_cronograma($this->m_caacrma_filtro)->
                Codigo_nacional($this->m_cacodna_filtro)->
                estado($this->m_caestad_filtro)->
                usuario_registra($this->m_causreg_filtro)->
                usuario_actualiza($this->m_causact_filtro)->
                orderBy('m_canombr',$this->m_canombr_ordene)->get();
            }else{
                $seguros = Capmsegu::nombre($this->m_canombr_filtro)->
                Documento_descripcion($this->m_cadescr_filtro)->
                Documento_a_personas($this->m_caapper_filtro)->
                Documento_a_v_pasajeros($this->m_caapvpa_filtro)->
                Documento_a_v_carga($this->m_caapvca_filtro)->
                Documento_a_remolques($this->m_caaprem_filtro)->
                Documento_resolucion($this->m_caresol_filtro)->
                Documento_c_vencimiento($this->m_cacoven_filtro)->
                Documento_a_masivas($this->m_caacmav_filtro)->
                Documento_pesv($this->m_caapesv_filtro)->
                Documento_cronograma($this->m_caacrma_filtro)->
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
                $tit_con_sul = 'CONSULTA SEGUROS';

                // 20- TOTAL REGISTROS
                $tot_reg_ist = $seguros->Count();
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
                $sheet->mergeCells('A6:W6');
                $sheet->row(6, function ($row) {
                    $row->setFontFamily('Arial');
                    $row->setFontSize(12);
                });

                // ENCABEZADOS
                $sheet->row(7, [
                        'Identificador', 'Seguro', 'Descripción',
                        'Aplica a personas', 'Aplica a vehículos pasajeros',
                        'Aplica a vehículos carga', 'Aplica a remolques',
                        'Detalles resolución', 'Fecha resolución',
                        'Controla vencimiento', 'Días de alerta',
                        'Actualizaciones masivas', 'Plan estratégico de seguridad vial',
                        'Cronograma de mantenimiento',
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
                foreach($seguros as $index => $seguro) {

                    //      ESTILO
                    $sheet->Cells('A8:Z100000');
                    $sheet->row($index+8, function ($row) {
                        $row->setFontFamily('Arial');
                        $row->setFontSize(10);
                    });

                    if ($index) {
                            $sheet->row($index+8, [
                            $seguro->m_nucodig, $seguro->m_canombr, $seguro->m_cadescr,
                            $seguro->m_caapper, $seguro->m_caapvpa,
                            $seguro->m_caapvca, $seguro->m_caaprem,
                            $seguro->m_caresol, $seguro->m_feresol,
                            $seguro->m_cacoven, $seguro->m_nudiapv,
                            $seguro->m_caacmav, $seguro->m_caapesv,
                            $seguro->m_caacrma,
                            $seguro->m_cacodna, $seguro->m_caestad,
                            $seguro->created_at, $seguro->usuario_registra->name,
                            $seguro->updated_at, $seguro->usuario_actualiza->name,
                        ]);
                    } else {
                        $sheet->row($index+8, [
                            $seguro->m_nucodig, $seguro->m_canombr, $seguro->m_cadescr,
                            $seguro->m_caapper, $seguro->m_caapvpa,
                            $seguro->m_caapvca, $seguro->m_caaprem,
                            $seguro->m_caresol, $seguro->m_feresol,
                            $seguro->m_cacoven, $seguro->m_nudiapv,
                            $seguro->m_caacmav, $seguro->m_caapesv,
                            $seguro->m_caacrma,
                            $seguro->m_cacodna, $seguro->m_caestad,
                            $seguro->created_at, $seguro->usuario_registra->name,
                            $seguro->updated_at, $seguro->usuario_actualiza->name,
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

                //$vista = \view('admin.programador.seguros.exportarexcel',compact('seguros'))->render();
                //$sheet->fromArray($seguros);
 
            });
        })->export('xlsx');

        return redirect()->route('seguros.index');
    
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
