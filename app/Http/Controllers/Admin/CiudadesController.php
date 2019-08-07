<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           CiudadesControler.php
//Descripción:      Ubicación regional ciudades
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
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use DateTime;
use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D;
use App\Capmciud;
use App\Capmdepa;
use App\Capmpais;
use App\Captaudi;
use App\User;
//use Session;

setlocale(LC_TIME,"es_ES"); date_default_timezone_set ('America/Bogota');

class CiudadesController extends Controller
{

    //ORDENAMIENTO
    // ASCENDENTE - DESCENTE
    private $m_canombr_ordene="asc";
    // NOMBRE CAMPO
    private $m_canombr_campos="m_canombr";
    //FILTROS
    private $m_canombr_filtro="";
    private $m_nucodep_filtro="";
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
            $m_nucodep_filtro="";
            $m_cacodna_filtro="";
            $m_caestad_filtro="";
            $m_causreg_filtro="";
            $m_causact_filtro="";
            //  VALIDA RESULTADO
            if(count($request->all())>0){

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
                $m_nucodep_filtro = $request->m_nucodep;
                $m_cacodna_filtro = $request->m_cacodna;
                $m_caestad_filtro = $request->m_caestad;
                $m_causreg_filtro = $request->m_causreg;
                $m_causact_filtro = $request->m_causact;
            }
            //  CIUDADES
            if($m_canombr_campos=="llave_compuesta"){
                $ciudades = DB::table('capmciud')->
                            join('capmdepa','capmciud.m_nucodep','=','capmdepa.m_nucodig')->
                            join('capmpais','capmdepa.m_nucopai','=','capmpais.m_nucodig')->
                            join('users','capmciud.m_causreg','=','users.id')->
                            select('capmciud.*',DB::raw("(SELECT m_canombr FROM capmdepa WHERE m_nucodig=capmciud.m_nucodep) as nombre_departamento"),DB::raw("(SELECT m_canombr FROM capmpais WHERE m_nucodig=capmdepa.m_nucopai) as nombre_pais"),DB::raw("(SELECT name FROM users WHERE id=capmciud.m_causreg) as usuario_registra"),DB::raw("(SELECT name FROM users WHERE id=capmciud.m_causact) as usuario_actualiza"))->
                            where('capmciud.m_canombr','LIKE','%'.$request->m_canombr.'%')->
                            where('capmciud.m_nucodep','LIKE',$request->m_nucodep)->
                            where('capmciud.m_cacodna','LIKE','%'.$request->m_cacodna.'%')->
                            where('capmciud.m_caestad','LIKE',$request->m_caestad)->
                            where('capmciud.m_causreg','LIKE',$request->m_causreg)->
                            where('capmciud.m_causact','LIKE',$request->m_causact)->
                            orderBy('capmpais.m_canombr',$m_canombr_ordene)->
                            orderBy('capmdepa.m_canombr',$m_canombr_ordene)->
                            orderBy('capmciud.m_canombr',$m_canombr_ordene)->paginate(20);
            }else{
                $ciudades = DB::table('capmciud')->
                                join('capmdepa','capmciud.m_nucodep','=','capmdepa.m_nucodig')->
                                join('capmpais','capmdepa.m_nucopai','=','capmpais.m_nucodig')->
                                join('users','capmciud.m_causreg','=','users.id')->
                                select('capmciud.*',DB::raw("(SELECT m_canombr FROM capmdepa WHERE m_nucodig=capmciud.m_nucodep) as nombre_departamento"),DB::raw("(SELECT m_canombr FROM capmpais WHERE m_nucodig=capmdepa.m_nucopai) as nombre_pais"),DB::raw("(SELECT name FROM users WHERE id=capmciud.m_causreg) as usuario_registra"),DB::raw("(SELECT name FROM users WHERE id=capmciud.m_causact) as usuario_actualiza"))->
                                where('capmciud.m_canombr','LIKE','%'.$request->m_canombr.'%')->
                                where('capmciud.m_nucodep','LIKE',$request->m_nucodep)->
                                where('capmciud.m_cacodna','LIKE','%'.$request->m_cacodna.'%')->
                                where('capmciud.m_caestad','LIKE',$request->m_caestad)->
                                where('capmciud.m_causreg','LIKE',$request->m_causreg)->
                                where('capmciud.m_causact','LIKE',$request->m_causact)->
                                orderBy($m_canombr_campos,$m_canombr_ordene)->paginate(20);
            }

            //  DEPARTAMENTOS
            $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig','m_nucopai');
            //  PAISES
            $paises = Capmpais::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  USUARIOS
            $usuarios = User::orderBy('name','asc')->pluck('name','id');
            //  VISTA
            return view('admin.programador.ciudades.index',
                compact('ciudades','departamentos','paises','usuarios',
                'm_canombr_filtro','m_nucodep_filtro',
                'm_cacodna_filtro','m_caestad_filtro',
                'm_causreg_filtro','m_causact_filtro',
                'm_canombr_ordene','m_canombr_campos'));
        } else{
            //  MENSAJE
            $mensaje = 'Propiedad inactiva';
            return redirect()->back()->with('mensaje',$mensaje);
        }
    }

    //  3- CREAR
    //Create: Función para agregar registros a tabla
    public function create(){
         //  DEPARTAMENTOS
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //  PAISES
        $paises = Capmpais::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //  VISTA
        return view('admin.programador.ciudades.crear',compact('paises','departamentos'));
    }

    //  4- ALMACENAR
    //Store: Función para validar datos y luego insertarlos en tabla
    public function store(Request $request){
        
        //1- DEFINE VARIABLES AUDITORIA 
        $aud_idu_ope = 1;
        $aud_nom_pag = 'Ciudades';

        //2- CONSULTA SI EL NOMBRE YA EXISTE
        $ciudades = Capmciud::where('m_canombr',$request->m_canombr)
        ->where('m_nucodep',$request->m_nucodep)->get();

        //13-10-2018
        //2-1 LLAMAR A LA FUNCION QUE TRAE LOS DATOS DE CIUDAD - DEPARTAMENTO - PAIS
        $departamento = Capmdepa::where('m_nucodig',$request->m_nucodep)->first();
        $pais = Capmpais::where('m_nucodig',$departamento->m_nucopai)->first();

        if(count($ciudades)>0){

            //2-1 EL NUEVO NOMBRE YA ESTA EN LA TABLA
            //2-2 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Ciudad: ';
            $tx1_men_res_err = ' '.$request->m_canombr.' ';
            $tx2_men_res_err = ' '.$departamento->m_canombr.' ';
            $tx3_men_res_err = ' '.$pais->m_canombr.' ';
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
            return redirect()->route('ciudades.index',
                    ['m_canombr'=>$request->m_canombr,
                    'm_nucodep'=>$request->m_nucodep])
                    ->with($par_men_res_err);
        }
        else{
            
            //2-1 EL NOMBRE NUEVO NO EXISTE
            //2-2 INSERTAR LOS DATOS
            $ciudad = Capmciud::create([
                'm_canombr'=>$request->m_canombr,
                'm_canomco'=>$request->m_canomco,
                'm_cacodna'=>$request->m_cacodna,
                'm_nucodep'=>$request->m_nucodep,
                'm_canuind'=>$request->m_canuind,
                'm_caestad'=>$request->m_caestad,
                'm_causreg'=>Auth::user()->id,
                'm_causact'=>Auth::user()->id
            ]);


            //2-3 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_ini = $ciudad;

            //2-3 AUDITORIA: INSERTA REGISTRO POR NUEVO REGISTRO
            $audi_editar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_callave'=>$request->m_canombr,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$con_dat_ini]);

            //2-4 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Ciudad: ';
            $tx1_men_res_cor = ' '.$request->m_canombr.' ';
            $tx2_men_res_cor = ' '.$departamento->m_canombr.' ';
            $tx3_men_res_cor = ' '.$pais->m_canombr.' ';
            $tx4_men_res_cor = '';
            $tx5_men_res_cor = '';
            $fo1_men_res_cor = 'Registrada satisfactoriamente';
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
            return redirect()->route('ciudades.index')->with($par_men_res_cor);
        }
    }

    //  5- EDITAR
    //Edit: Función para actualizar campos de registros 
    public function edit($id){
        //  CIUDADES
        $ciudad = Capmciud::find($id);
        //  DEPARTAMENTOS
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //  PAISES
        $paises = Capmpais::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //2-1 RESULTADOS: ENVIA
        //return view('admin.programador.ciudades.editar',compact('ciudad','paises','departamentos'));
        return response()->json($ciudad);
    }

    //  6- MOSTRAR
    //Show: Función para mostrar campos de registros
    public function show($id){
        //  CIUDADES
        $ciudad = Capmciud::find($id);
        //  DEPARTAMENTOS
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //  PAISES
        $paises = Capmpais::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //2-1 RESULTADOS: ENVIA
        return view('admin.programador.ciudades.consultar',compact('ciudad','paises','departamentos'));
    }
    
    //  7- ACTUALIZAR
    //Update: Función para validar y actualizar campos de registros en tabla
    public function update(Request $request, $id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 11;
        $aud_nom_pag = 'Ciudades';
        //2- BUSCA EL REGISTRO POR EL ID PARA VERIFICAR SI TIENE EL MISMO NUIP (LLAVE)
        $ciudad = Capmciud::find($id);

        //2-1 BUSCA EL REGISTRO POR EL ID TOMA VALORES INICIALES (AUDITORIA)
        $con_dat_ini = Capmciud::find($id);

        //13-10-2018
        //2-1 LLAMAR A LA FUNCION QUE TRAE LOS DATOS DE CIUDAD - DEPARTAMENTO - PAIS
        $departamento = Capmdepa::where('m_nucodig',$request->m_nucodep)->first();
        $pais = Capmpais::where('m_nucodig',$departamento->m_nucopai)->first();

        //2-2 COMPARA NUIP (LLAVE) REGISTRO HALLADO CON NUIP (LLAVE) DE LA RESPUESTA
        if($ciudad->m_canombr==$request->m_canombr
            AND $ciudad->m_nucodep==$request->m_nucodep
            ){

            //2-3 CORRESPONDE AL MISMO NUIP (LLAVE) - NO FUE MODIFICADO - ACTUALIZA TODOS LOS CAMPOS
            $ciudad = Capmciud::find($id);
            $ciudad->m_canombr = $request->m_canombr;
            $ciudad->m_canomco = $request->m_canomco;
            $ciudad->m_cacodna = $request->m_cacodna;
            $ciudad->m_nucodep = $request->m_nucodep;
            $ciudad->m_canuind = $request->m_canuind;
            $ciudad->m_caestad = $request->m_caestad;
            $ciudad->m_causact = Auth::user()->id;
            $ciudad->save();
           
            //2-4 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_fin = Capmciud::find($id);

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
                $tit_men_res_cor = 'Ciudad: ';
                $tx1_men_res_cor = ' '.$request->m_canombr.' ';
                $tx2_men_res_cor = ' '.$departamento->m_canombr.' ';
                $tx3_men_res_cor = ' '.$pais->m_canombr.' ';
                $tx4_men_res_cor = '';
                $tx5_men_res_cor = '';
                $fo1_men_res_cor = 'Actualizada satisfactoriamente';
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
                return redirect()->route('ciudades.index')->with($par_men_res_cor);
                
            } else{
                // NO HALLO CAMBIOS EN VALORES DE CAMPOS: ENVIA
                return redirect()->route('ciudades.index');
            }

        } else if($ciudad->m_canombr!==$request->m_canombr
                OR $ciudad->m_nucodep!==$request->m_nucodep){
            
            //2-3 EL NOMBRE FUE MODIFICADO
            //2-4 CONSULTA PARA REVISAR QUE EL NUEVO NOMBRE NO ESTÉ YA EN LA TABLA
            $validar = Capmciud::where('m_canombr',$request->m_canombr)
            ->where('m_nucodep',$request->m_nucodep)->get();
            if(count($validar)>0){
                
                //2-5 ERROR EL NUEVO NUIP YA ESTA EN LA TABLA
                //2-6 RESULTADO ERROR: MENSAJES
                $tit_men_res_err = 'Ciudad: ';
                $tx1_men_res_err = ' '.$request->m_canombr.' ';
                $tx2_men_res_err = ' '.$departamento->m_canombr.' ';
                $tx3_men_res_err = ' '.$pais->m_canombr.' ';
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
                return redirect()->route('ciudades.index',
                        ['m_canombr'=>$request->m_canombr,
                        'm_nucodep'=>$request->m_nucodep])
                        ->with($par_men_res_err);                
            } else{
                
                //2-5 EL NUEVO NOMBRE NO ESTA EN LA TABLA
                $ciudad = Capmciud::find($id);
                $ciudad->m_canombr = $request->m_canombr;
                $ciudad->m_canomco = $request->m_canomco;
                $ciudad->m_cacodna = $request->m_cacodna;
                $ciudad->m_nucodep = $request->m_nucodep;
                $ciudad->m_canuind = $request->m_canuind;
                $ciudad->m_caestad = $request->m_caestad;
                $ciudad->m_causact = Auth::user()->id;
                $ciudad->save();

                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                $audi_editar = Captaudi::create([
                    'm_nuidope'=>$aud_idu_ope,
                    'm_canombr'=>$aud_nom_pag,
                    'm_callave'=>$request->m_canombr,
                    'm_nuidusu'=>Auth::user()->id,
                    'm_cadeini'=>$con_dat_ini,
                    'm_cadefin'=>$ciudad]);

                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Ciudad: ';
                $tx1_men_res_cor = ' '.$request->m_canombr.' ';
                $tx2_men_res_cor = ' '.$departamento->m_canombr.' ';
                $tx3_men_res_cor = ' '.$pais->m_canombr.' ';
                $tx4_men_res_cor = '';
                $tx5_men_res_cor = '';
                $fo1_men_res_cor = 'Actualizada satisfactoriamente';
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
                return redirect()->route('ciudades.index')->with($par_men_res_cor);
            }
        }
    }

    //  8- ELIMINAR
    //Destroy: Función para eliminar registros en tabla
    public function destroy($id){

        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 21;
        $aud_nom_pag = 'Ciudades';

        //2- BUSCA EL REGISTRO POR EL ID POR SI YA HA SIDO ELIMINADO (SEGURIDAD)
        $ciudad = Capmciud::find($id);
        //13-10-2018
        //2-1 LLAMAR A LA FUNCION QUE TRAE LOS DATOS DE CIUDAD - DEPARTAMENTO - PAIS
        $departamento = Capmdepa::where('m_nucodig',$ciudad->m_nucodep)->first();
        $pais = Capmpais::where('m_nucodig',$departamento->m_nucopai)->first();
        if($ciudad){
            //REGISTRO HALLADO EN LA TABLA - PUEDE ELIMINARLO

            //2-1 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Ciudad: ';
            $tx1_men_res_cor = ' '.$ciudad->m_canombr.' ';
            $tx2_men_res_cor = ' '.$departamento->m_canombr.' ';
            $tx3_men_res_cor = ' '.$pais->m_canombr.' ';
            $tx4_men_res_cor = '';
            $tx5_men_res_cor = '';
            $fo1_men_res_cor = 'Eliminada satisfactoriamente';
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
            $aud_nom_pag = 'Ciudades';
            $audi_borrar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_callave'=>$ciudad->m_canombr,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$ciudad]);

            //2-4 ELIMINA REGISTRO
            $ciudad->delete();

            //2-5 RESULTADO CORRECTO: ENVIA
            return redirect()->route('ciudades.index')->with($par_men_res_cor);

        }else{
            //REGISTRO NO HALLADO EN LA TABLA
            
            //3-1 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Ciudad: ';
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
            return redirect()->route('ciudades.index')->with($par_men_res_err);
        }
    }

    //  9- EXPORTAR: PDF 
    // Funcion para exportar PDF
    public function exportarpdf(Request $request){

        // 0- ORDEN FILTROS
        //ORDENAMIENTO
        // ASCENDENTE - DESCENTE
        $this->m_canombr_ordene=$request->m_canombr_ordene;
        // NOMBRE CAMPO
        $this->m_canombr_campos=$request->m_canombr_campos;
        // FILTROS
        $this->m_canombr_filtro=$request->m_canombr;
        $this->m_nucodep_filtro=$request->m_nucodep;
        $this->m_cacodna_filtro=$request->m_cacodna;
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;

        // 0- CONSULTA
        if($this->m_canombr_campos=="llave_compuesta"){
            $ciudades = DB::table('capmciud')->
                    join('capmdepa','capmciud.m_nucodep','=','capmdepa.m_nucodig')->
                    join('capmpais','capmdepa.m_nucopai','=','capmpais.m_nucodig')->
                    join('users','capmciud.m_causreg','=','users.id')->
                    select('capmciud.*',DB::raw("(SELECT m_canombr FROM capmdepa WHERE m_nucodig=capmciud.m_nucodep) as nombre_departamento"),DB::raw("(SELECT m_canombr FROM capmpais WHERE m_nucodig=capmdepa.m_nucopai) as nombre_pais"),DB::raw("(SELECT name FROM users WHERE id=capmciud.m_causreg) as usuario_registra"),DB::raw("(SELECT name FROM users WHERE id=capmciud.m_causact) as usuario_actualiza"))->
                    where('capmciud.m_canombr','LIKE','%'.$this->m_canombr_filtro.'%')->
                    where('capmciud.m_nucodep','LIKE',$this->m_nucodep_filtro)->
                    where('capmciud.m_cacodna','LIKE','%'.$this->m_cacodna_filtro.'%')->
                    where('capmciud.m_caestad','LIKE',$this->m_caestad_filtro)->
                    where('capmciud.m_causreg','LIKE',$this->m_causreg_filtro)->
                    where('capmciud.m_causact','LIKE',$this->m_causact_filtro)->
                    orderBy('capmpais.m_canombr',$this->m_canombr_ordene)->
                    orderBy('capmdepa.m_canombr',$this->m_canombr_ordene)->
                    orderBy('capmciud.m_canombr',$this->m_canombr_ordene)->get();
        }else{
            $ciudades = DB::table('capmciud')->
                    join('capmdepa','capmciud.m_nucodep','=','capmdepa.m_nucodig')->
                    join('capmpais','capmdepa.m_nucopai','=','capmpais.m_nucodig')->
                    join('users','capmciud.m_causreg','=','users.id')->
                    select('capmciud.*',DB::raw("(SELECT m_canombr FROM capmdepa WHERE m_nucodig=capmciud.m_nucodep) as nombre_departamento"),DB::raw("(SELECT m_canombr FROM capmpais WHERE m_nucodig=capmdepa.m_nucopai) as nombre_pais"),DB::raw("(SELECT name FROM users WHERE id=capmciud.m_causreg) as usuario_registra"),DB::raw("(SELECT name FROM users WHERE id=capmciud.m_causact) as usuario_actualiza"))->
                    where('capmciud.m_canombr','LIKE','%'.$this->m_canombr_filtro.'%')->
                    where('capmciud.m_nucodep','LIKE',$this->m_nucodep_filtro)->
                    where('capmciud.m_cacodna','LIKE','%'.$this->m_cacodna_filtro.'%')->
                    where('capmciud.m_caestad','LIKE',$this->m_caestad_filtro)->
                    where('capmciud.m_causreg','LIKE',$this->m_causreg_filtro)->
                    where('capmciud.m_causact','LIKE',$this->m_causact_filtro)->
                    orderBy($this->m_canombr_campos,$this->m_canombr_ordene)->get();
        }
        
        $barra = new DNS1D();
        $pdf = \App::make('dompdf.wrapper');
        $vista = \view('admin.programador.ciudades.exportarpdf',compact('ciudades'))->render();
        $pdf->loadHTML($vista);
        // Obtiene fecha y hora actual
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'ciudades_'.$cadena_fecha_actual.'.pdf';
        //  Resultados
        return $pdf->download($nombre_archivo);
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
        //return response()->json($this->m_canombr_filtro);
        $this->m_nucodep_filtro=$request->m_nucodep;
        $this->m_cacodna_filtro=$request->m_cacodna;
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;
        
        // Obtiene fecha y hora actual
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'ciudades_'.$cadena_fecha_actual;

        Excel::create($nombre_archivo, function($excel) {
            $excel->sheet('Ciudades', function($sheet) {

                // 0- CONSULTA
                if($this->m_canombr_campos=="llave_compuesta"){
                    $ciudades = DB::table('capmciud')->
                            join('capmdepa','capmciud.m_nucodep','=','capmdepa.m_nucodig')->
                            join('capmpais','capmdepa.m_nucopai','=','capmpais.m_nucodig')->
                            join('users','capmciud.m_causreg','=','users.id')->
                            select('capmciud.*',DB::raw("(SELECT m_canombr FROM capmdepa WHERE m_nucodig=capmciud.m_nucodep) as nombre_departamento"),DB::raw("(SELECT m_canombr FROM capmpais WHERE m_nucodig=capmdepa.m_nucopai) as nombre_pais"),DB::raw("(SELECT name FROM users WHERE id=capmciud.m_causreg) as usuario_registra"),DB::raw("(SELECT name FROM users WHERE id=capmciud.m_causact) as usuario_actualiza"))->
                            where('capmciud.m_canombr','LIKE','%'.$this->m_canombr_filtro.'%')->
                            where('capmciud.m_nucodep','LIKE',$this->m_nucodep_filtro)->
                            where('capmciud.m_cacodna','LIKE','%'.$this->m_cacodna_filtro.'%')->
                            where('capmciud.m_caestad','LIKE',$this->m_caestad_filtro)->
                            where('capmciud.m_causreg','LIKE',$this->m_causreg_filtro)->
                            where('capmciud.m_causact','LIKE',$this->m_causact_filtro)->
                            orderBy('capmpais.m_canombr',$this->m_canombr_ordene)->
                            orderBy('capmdepa.m_canombr',$this->m_canombr_ordene)->
                            orderBy('capmciud.m_canombr',$this->m_canombr_ordene)->get();
                }else{
                    $ciudades = DB::table('capmciud')->
                            join('capmdepa','capmciud.m_nucodep','=','capmdepa.m_nucodig')->
                            join('capmpais','capmdepa.m_nucopai','=','capmpais.m_nucodig')->
                            join('users','capmciud.m_causreg','=','users.id')->
                            select('capmciud.*',DB::raw("(SELECT m_canombr FROM capmdepa WHERE m_nucodig=capmciud.m_nucodep) as nombre_departamento"),DB::raw("(SELECT m_canombr FROM capmpais WHERE m_nucodig=capmdepa.m_nucopai) as nombre_pais"),DB::raw("(SELECT name FROM users WHERE id=capmciud.m_causreg) as usuario_registra"),DB::raw("(SELECT name FROM users WHERE id=capmciud.m_causact) as usuario_actualiza"))->
                            where('capmciud.m_canombr','LIKE','%'.$this->m_canombr_filtro.'%')->
                            where('capmciud.m_nucodep','LIKE',$this->m_nucodep_filtro)->
                            where('capmciud.m_cacodna','LIKE','%'.$this->m_cacodna_filtro.'%')->
                            where('capmciud.m_caestad','LIKE',$this->m_caestad_filtro)->
                            where('capmciud.m_causreg','LIKE',$this->m_causreg_filtro)->
                            where('capmciud.m_causact','LIKE',$this->m_causact_filtro)->
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
                $tit_con_sul = 'CONSULTA DE CIUDADES';

                // 20- TOTAL REGISTROS
                $tot_reg_ist = $ciudades->Count();
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
                //         IMPORTANTE: ESTILO - UNA CELDA ANTES DE LA FINAL
                $sheet->mergeCells('A6:N6');
                $sheet->row(6, function ($row) {
                    $row->setFontFamily('Arial');
                    $row->setFontSize(12);
                });

                // ENCABEZADOS 
                $sheet->row(7, [
                        'Identificador',
                        'Ciudad','Nombre corto','Departamento','País',
                        'Indicativo','Código nacional', 'Estado',
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
                $dato = $tot_reg_ist;

                foreach($ciudades as $index => $ciudad) {
                    $dato = $dato-1;
                    $this->agregarSesion($dato);                    

                    //      ESTILO
                    $sheet->Cells('A8:Z100000');
                    $sheet->row($index+8, function ($row) {
                        $row->setFontFamily('Arial');
                        $row->setFontSize(10);
                    });

                    if ($index) {
                            $sheet->row($index+8, [
                            $ciudad->m_nucodig,
                            $ciudad->m_canombr,
                            $ciudad->m_canomco,
                            $ciudad->nombre_departamento,
                            $ciudad->nombre_pais,
                            $ciudad->m_canuind,
                            $ciudad->m_cacodna, $ciudad->m_caestad,
                            $ciudad->created_at, $ciudad->usuario_registra,
                            $ciudad->updated_at, $ciudad->usuario_actualiza,
                        ]);
                    } else {
                        $sheet->row($index+8, [
                            $ciudad->m_nucodig,
                            $ciudad->m_canombr,
                            $ciudad->m_canomco,
                            $ciudad->nombre_departamento,
                            $ciudad->nombre_pais,
                            $ciudad->m_canuind,
                            $ciudad->m_cacodna, $ciudad->m_caestad,
                            $ciudad->created_at, $ciudad->usuario_registra,
                            $ciudad->updated_at, $ciudad->usuario_actualiza,
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

        //return redirect()->route('aseguradoras.index');
        
        
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

    //  12- CIUDADES - DEPARTAMENTOS - PAISES
    public function datosCiudad(Request $request){
        //return $request->id;
        $ciudad = Capmciud::find($request->id);
        $departamento = Capmdepa::where('m_nucodig',$ciudad->m_nucodep)->first();
        $pais = Capmpais::where('m_nucodig',$departamento->m_nucopai)->first();

        $datos = array();
        $datos[0] = $ciudad->m_canombr;
        $datos[1] = $departamento->m_canombr;
        $datos[2] = $pais->m_canombr;
        $datos[3] = $departamento->m_nucodig;
        $datos[4] = $pais->m_nucodig;
        $datos[5] = $ciudad->m_canuind;
        $datos[6] = $pais->m_cacotel;

        return response()->json($datos);
    }

    public function agregarSesion($dato){
        Session::put('contador',$dato);
        return response()->json($dato);
        //echo "<script>console.log(".Session::get('contador').")</script>";
    }

    public function contador(){
        $dato_obt = Session::get('contador');
        return response()->json($dato_obt);
        //echo "<script>console.log(".$dato_obt.")</script>";
    }


}
