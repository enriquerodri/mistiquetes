<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           VehiculosControler.php
//Descripción:      Vehículos
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
use App\Capmascp;
use App\Capmtido;
use App\Capmpais;
use App\Capmdepa;
use App\Capmciud;
use App\Capmsucu;
use App\capmdopv;
use App\capmseve;
use App\Capmcarg;
use App\Capmdivi;
use App\Capmgrtr;
use App\Capmtico;
use App\Capmvehi;
use App\Captaudi;
use App\User;

setlocale(LC_TIME,"es_ES"); date_default_timezone_set ('America/Bogota');

class VehiculosController extends Controller
{

    //ORDENAMIENTO
    // ASCENDENTE - DESCENTE
    private $m_canuint_ordene="asc";
    // NOMBRE CAMPO
    private $m_canuint_campos="m_canuint";
    //FILTROS
    private $m_caplaca_filtro="";
    private $m_canuint_filtro="";
    private $m_nucociu_filtro="";
    private $m_cacenco_filtro="";
    private $m_nucodiv_filtro="";
    private $m_cadacon_filtro="";
    private $m_caidpac_filtro="";
    private $m_caestad_filtro="";
    private $m_causreg_filtro="";
    private $m_causact_filtro="";
    
    //  1- CONSTRUCTOR 
    //Función Constructor para validar usuarios
    public function __construct(){
        $this->middleware('auth');
    }

    //  2- INDICES
    //Index: Función para mostrar registros tabla de pagina principal 
    public function index(Request $request){
        if(Auth::user()->m_capap10=="SI"){

            //ORDENAMIENTO
            // ASCENDENTE - DESCENTE
            $m_canuint_ordene="asc";
            // NOMBRE CAMPO
            $m_canuint_campos="m_canuint";
            // LIMPIA FILTROS
            $m_caplaca_filtro="";
            $m_canuint_filtro="";
            $m_nucociu_filtro="";
            $m_cacenco_filtro="";
            $m_nucodiv_filtro="";
            $m_cadacon_filtro="";
            $m_caidpac_filtro="";
            $m_caestad_filtro="";
            $m_causreg_filtro="";
            $m_causact_filtro="";
            //  VALIDA RESULTADO
            if(count($request->all())>0){
                //  CARGA VALORES
                //ORDENAMIENTO
                // ASCENDENTE - DESCENTE
                $m_canuint_ordene = $request->m_canuint_ordene;
                // NOMBRE CAMPO
                if($request->m_canuint_campos==null)
                    $m_canuint_campos = "m_canuint";
                else
                    $m_canuint_campos = $request->m_canuint_campos;
                // FILTROS
                $m_caplaca_filtro = $request->m_caplaca;
                $m_canuint_filtro = $request->m_canuint;
                $m_nucociu_filtro = $request->m_nucociu;
                $m_cacenco_filtro = $request->m_cacenco;
                $m_nucodiv_filtro = $request->m_nucodiv;
                $m_cadacon_filtro = $request->m_cadacon;
                $m_caidpac_filtro = $request->m_caidpac;
                $m_caestad_filtro = $request->m_caestad;
                $m_causreg_filtro = $request->m_causreg;
                $m_causact_filtro = $request->m_causact;
            }
            //  VEHICULOS 
            //Codigo_nacional($request->m_caidpac)->
            //estado($request->m_caestad)->
            $vehiculos = Capmvehi::Nuipe($request->m_caplaca)->
                Numerointerno($request->m_canuint)->
                estado($request->m_caestad)->
                usuario_registra($request->m_causreg)->
                usuario_actualiza($request->m_causact)->
                orderBy($m_canuint_campos,$m_canuint_ordene)->paginate(20);

            // RELACIONES
            //  PROPIETARIOS VEHICULOS
            $propietariosvehiculos = Capmascp::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  TIPOS DE DOCUMENTO 
            //$tiposdocumentos = Capmtido::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
            //  CARGOS
            //$cargos = Capmcarg::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig','m_nucodiv');
            //  DIVISIONES
            //$divisiones = Capmdivi::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
            //  CIUDADES
            $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig','m_nucodep');
            //  DEPARTAMENTOS
            $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig','m_nucopai');
            //  PAISES
            $paises = Capmpais::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  OFICINA
            $oficina_registro = Capmsucu::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  USUARIOS
            $usuarios = User::orderBy('name','asc')->pluck('name','id');
            //  GRUPOS DE TRABAJO
            //$grupostrabajos = capmgrtr::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
            //  TIPOS DE CONTRATO
            //$tiposcontratos = capmtico::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
            //  CONDUCTOR VEHICULO ACTUAL
            //$vehiculoactconductores = Capmvehi::orderBy('m_caplaca','asc')->pluck('m_caplaca','m_nucodig');
            
            //  VISTA
            return view('admin.vehiculos.vehiculos.vehiculos.index',
                compact('vehiculos','propietariosvehiculos','usuarios',
                        'ciudades','departamentos','paises',
                        'm_caplaca_filtro', 'm_canuint_filtro',
                        'm_caestad_filtro',
                        'm_causreg_filtro', 'm_causact_filtro',
                        'm_canuint_ordene','m_canuint_campos'));
        } else{
            //  MENSAJE
            $mensaje = 'Propiedad inactiva';
            return redirect()->back()->with('mensaje',$mensaje);
        }
    }

    //  3- CREAR
    //Create: Función para agregar registros a tabla
    public function create(){
        //  TIPOS DE DOCUMENTO
        $tiposdocumentos = Capmtido::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
        //  CIUDADES
        $ciudades = Capmciud::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
        //  DEPARTAMENTOS
        $departamentos = Capmdepa::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
        //  PAISES
        $paises = Capmpais::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
        //  OFICINA
        $oficina_registro = Capmsucu::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
        //  USUARIOS
        $usuarios = User::orderBy('name','asc')->pluck('name','id');
        //  VISTA
        return view('admin.vehiculos.vehiculos.vehiculos.crear',
                compact('tiposdocumentos','departamentos','paises','oficina_registro','ciudades','usuarios'));
    }

    //  4- ALMACENAR
    //Store: Función para validar datos y luego insertarlos en tabla
    public function store(Request $request){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 1;
        $aud_nom_pag = 'Vehiculos';

        //2- CONSULTA SI EL NUIP YA EXISTE
        $vehiculos = Capmvehi::where('m_caplaca',$request->m_caplaca)->get();
        if(count($vehiculos)>0){

            //2-1 EL NUEVO NOMBRE YA ESTA EN LA TABLA
            //2-2 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Vehículo: ';
            $tx1_men_res_err = ' '.$request->m_caplaca.' ';
            $tx2_men_res_err = ' '.$request->m_canuint.' ';
            $tx3_men_res_err = ' '.$request->m_caidpac.' ';
            $tx4_men_res_err = '';
            $tx5_men_res_err = '';
            $fo1_men_res_err = 'Ya existe un registro con ese NUIP';
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
            return redirect()->route('vehiculos.index',['m_caplaca'=>$request->m_caplaca])->with($par_men_res_err);
        }
        else{
            
            //2-1 EL NOMBRE NUEVO NO EXISTE
            //2-2 INSERTAR LOS DATOS
            $vehiculo = Capmvehi::create([
                'm_caplaca'=>$request->m_caplaca,
                'm_caplaca'=>$request->m_caplaca,
                'm_canuint'=>$request->m_canuint,
                'm_caviemp'=>$request->m_caviemp,
                'm_catipos'=>$request->m_catipos,
                'm_caestad'=>$request->m_caestad,
                'm_fevincu'=>$request->m_fevincu,
                'm_feestad'=>$request->m_feestad,
                'm_cadesta'=>$request->m_cadesta,
                'm_caopres'=>$request->m_caopres,
                'm_feinsuv'=>$request->m_feinsuv,
                'm_fetesuv'=>$request->m_fetesuv,
                'm_nucomar'=>$request->m_nucomar,
                'm_nucolin'=>$request->m_nucolin,
                'm_numodel'=>$request->m_numodel,
                'm_nuantig'=>$request->m_nuantig,
                'm_camorea'=>$request->m_camorea,
                'm_cacilin'=>$request->m_cacilin,
                'm_nucolor'=>$request->m_nucolor,
                'm_caservi'=>$request->m_caservi,
                'm_nucogru'=>$request->m_nucogru,
                'm_nucosrv'=>$request->m_nucosrv,
                'm_nucocar'=>$request->m_nucocar,
                'm_nucocbl'=>$request->m_nucocbl,
                'm_nucapci'=>$request->m_nucapci,
                'm_nucodis'=>$request->m_nucodis,
                'm_canumot'=>$request->m_canumot,
                'm_canuvin'=>$request->m_canuvin,
                'm_canuser'=>$request->m_canuser,
                'm_canucha'=>$request->m_canucha,
                'm_canurun'=>$request->m_canurun,
                'm_cacofdh'=>$request->m_cacofdh,
                'm_nucocir'=>$request->m_nucocir,
                'm_nuancho'=>$request->m_nuancho,
                'm_nualtos'=>$request->m_nualtos,
                'm_nulargo'=>$request->m_nulargo,
                'm_nuvolpo'=>$request->m_nuvolpo,
                'm_nupesva'=>$request->m_nupesva,
                'm_nucapdi'=>$request->m_nucapdi,
                'm_nukiact'=>$request->m_nukiact,
                'm_nukiprv'=>$request->m_nukiprv,
                'm_nucorut'=>$request->m_nucorut,
                'm_nucocib'=>$request->m_nucocib,
                'm_carodam'=>$request->m_carodam,
                'm_nusires'=>$request->m_nusires,
                'm_nusipre'=>$request->m_nusipre,
                'm_nusiweb'=>$request->m_nusiweb,
                'm_caencon'=>$request->m_caencon,
                'm_caencob'=>$request->m_caencob,
                'm_caencre'=>$request->m_caencre,
                'm_caencor'=>$request->m_caencor,
                'm_caproju'=>$request->m_caproju,
                'm_caidpac'=>$request->m_caidpac,
                'm_caidpan'=>$request->m_caidpan,
                'm_caidten'=>$request->m_caidten,
                'm_nuavalu'=>$request->m_nuavalu,
                'm_cacopuc'=>$request->m_cacopuc,
                'm_cacenco'=>$request->m_cacenco,
                'm_calidep'=>$request->m_calidep,
                'm_calants'=>$request->m_calants,
                'm_nulvtas'=>$request->m_nulvtas,
                'm_nulvcas'=>$request->m_nulvcas,
                'm_nulvpas'=>$request->m_nulvpas,
                'm_nulvaas'=>$request->m_nulvaas,
                'm_calpadc'=>$request->m_calpadc,
                'm_nulvtpa'=>$request->m_nulvtpa,
                'm_nulvcpa'=>$request->m_nulvcpa,
                'm_nulpcpa'=>$request->m_nulpcpa,
                'm_nulvapa'=>$request->m_nulvapa,
                'm_calvppd'=>$request->m_calvppd,
                'm_nulvcpd'=>$request->m_nulvcpd,
                'm_nulpcpd'=>$request->m_nulpcpd,
                'm_nulvapd'=>$request->m_nulvapd,
                'm_calsrjo'=>$request->m_calsrjo,
                'm_nulvtsj'=>$request->m_nulvtsj,
                'm_nulvcsj'=>$request->m_nulvcsj,
                'm_nulpcsj'=>$request->m_nulpcsj,
                'm_nulvasj'=>$request->m_nulvasj,
                'm_calsspz'=>$request->m_calsspz,
                'm_nulvtsp'=>$request->m_nulvtsp,
                'm_nulvcsp'=>$request->m_nulvcsp,
                'm_nulpcsp'=>$request->m_nulpcsp,
                'm_nulvasp'=>$request->m_nulvasp,
                'm_caliper'=>$request->m_caliper,
                'm_calic01'=>$request->m_calic01,
                'm_calid01'=>$request->m_calid01,
                'm_nuliv01'=>$request->m_nuliv01,
                'm_calic02'=>$request->m_calic02,
                'm_calid02'=>$request->m_calid02,
                'm_nuliv02'=>$request->m_nuliv02,
                'm_calic03'=>$request->m_calic03,
                'm_calid03'=>$request->m_calid03,
                'm_nuliv03'=>$request->m_nuliv03,
                'm_calic04'=>$request->m_calic04,
                'm_calid04'=>$request->m_calid04,
                'm_nuliv04'=>$request->m_nuliv04,
                'm_calic05'=>$request->m_calic05,
                'm_calid05'=>$request->m_calid05,
                'm_nuliv05'=>$request->m_nuliv05,
                'm_calic06'=>$request->m_calic06,
                'm_calid06'=>$request->m_calid06,
                'm_nuliv06'=>$request->m_nuliv06,
                'm_calic07'=>$request->m_calic07,
                'm_calid07'=>$request->m_calid07,
                'm_nuliv07'=>$request->m_nuliv07,
                'm_calic08'=>$request->m_calic08,
                'm_calid08'=>$request->m_calid08,
                'm_nuliv08'=>$request->m_nuliv08,
                'm_calic09'=>$request->m_calic09,
                'm_calid09'=>$request->m_calid09,
                'm_nuliv09'=>$request->m_nuliv09,
                'm_calic10'=>$request->m_calic10,
                'm_calid10'=>$request->m_calid10,
                'm_nuliv10'=>$request->m_nuliv10,
                'm_nulivto'=>$request->m_nulivto,
                'm_caadmin'=>$request->m_caadmin,
                'm_nuvaadm'=>$request->m_nuvaadm,
                'm_nupoadm'=>$request->m_nupoadm,
                'm_canomco'=>$request->m_canomco,
                'm_nuvanco'=>$request->m_nuvanco,
                'm_nuponco'=>$request->m_nuponco,
                'm_cassoco'=>$request->m_cassoco,
                'm_nuvasco'=>$request->m_nuvasco,
                'm_nuposco'=>$request->m_nuposco,
                'm_cafdoin'=>$request->m_cafdoin,
                'm_nuvafdi'=>$request->m_nuvafdi,
                'm_nupofdi'=>$request->m_nupofdi,
                'm_cafdomu'=>$request->m_cafdomu,
                'm_nuvafdm'=>$request->m_nuvafdm,
                'm_nupofdm'=>$request->m_nupofdm,
                'm_caldvpr'=>$request->m_caldvpr,
                'm_nuldvvc'=>$request->m_nuldvvc,
                'm_nuldvpc'=>$request->m_nuldvpc,
                'm_capapel'=>$request->m_capapel,
                'm_nuvapap'=>$request->m_nuvapap,
                'm_nupopap'=>$request->m_nupopap,
                'm_capdcpr'=>$request->m_capdcpr,
                'm_nupdcvc'=>$request->m_nupdcvc,
                'm_nupdcpc'=>$request->m_nupdcpc,
                'm_capoliz'=>$request->m_capoliz,
                'm_nuvaplz'=>$request->m_nuvaplz,
                'm_nupoplz'=>$request->m_nupoplz,
                'm_canomrv'=>$request->m_canomrv,
                'm_nuvanrv'=>$request->m_nuvanrv,
                'm_nuponrv'=>$request->m_nuponrv,
                'm_cassorv'=>$request->m_cassorv,
                'm_nuvasrv'=>$request->m_nuvasrv,
                'm_nuposrv'=>$request->m_nuposrv,
                'm_causreg'=>Auth::user()->id,
                'm_causact'=>Auth::user()->id
            ]);

            //2-3 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_ini = $vehiculo;

            //2-3 AUDITORIA: INSERTA REGISTRO POR NUEVO REGISTRO
            //$audi_editar = Captaudi::create([
            //    'm_nuidope'=>$aud_idu_ope,
            //    'm_canuint'=>$aud_nom_pag,
            //    'm_callave'=>$request->m_caplaca,
            //    'm_nuidusu'=>Auth::user()->id,
            //    'm_cadeini'=>$con_dat_ini]);

            //2-4 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Vehículo: ';
            $tx1_men_res_cor = ' '.$request->m_caplaca.' ';
            $tx2_men_res_cor = ' '.$request->m_canuint.' ';
            $tx3_men_res_cor = ' '.$request->m_caidpac.' ';
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
            return redirect()->route('vehiculos.index')->with($par_men_res_cor);
        }
    }

    //  5- EDITAR 
    //Edit: Función para actualizar campos de registros
    public function edit($id){
        $vehiculo = Capmvehi::find($id);
        $documentospersonas = DB::select('select * from capmdopv where m_nuidper = ?', [$id]);
        $segurospersonas = DB::select('select * from capmseve where m_nuidper = ?', [$id]);

        $usuregdocper = null;
        $usuactdocper = null;
        $usuregsegper = null;
        $usuactsegper = null;
        if(count($documentospersonas)>0){
            $usuregdocper = DB::select('select * from users where id = ?', [$documentospersonas[0]->m_causreg]);
        
            $usuactdocper = DB::select('select * from users where id = ?', [$documentospersonas[0]->m_causact]);
        }

        if(count($segurospersonas)>0){
            $usuregsegper = DB::select('select * from users where id = ?', [$segurospersonas[0]->m_causreg]);
            
            $usuactsegper = DB::select('select * from users where id = ?', [$segurospersonas[0]->m_causact]);
        }

        //$divisiones,
        //$divisiones = $vehiculo //DB::table('Capmvehi')
        //    ->select('Capmvehi.m_canuint as nombreConductor', 'Capmvehi.m_cavehac as vehiculoActual',
        //             'capmcarg.m_canuint as nombreCargo', 'capmdivi.m_canuint as nombreDivision')
        //    ->join('capmcarg', 'Capmvehi.m_nucocar', '=', 'capmcarg.m_nucodig')
        //    ->join('capmdivi', 'capmcarg.m_nucodiv', '=', 'capmdivi.m_nucodig')
        //    ->where('Capmvehi.m_nucodig', $id)
        //    ->get();

        //$numeroVehiculo,
        //$numeroVehiculo = DB::select('select * from Capmvehi where m_nucodig = ?', [$divisiones[0]->vehiculoActual]);

        //2-1 RESULTADOS: ENVIA
        return response()->json([$vehiculo,
                                $documentospersonas,
                                $segurospersonas,
                                $usuregdocper,
                                $usuactdocper,
                                $usuregsegper,
                                $usuactsegper,
                            ]);

    }

    //  6- MOSTRAR
    //Show: Función para mostrar campos de registros
    public function show($id){
        $vehiculo = Capmvehi::find($id);
        $tiposdocumentos = Capmtido::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
        $departamentos = Capmdepa::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
        $ciudades = Capmciud::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
        $oficina_registro = Capmsucu::orderBy('m_canuint','asc')->pluck('m_canuint','m_nucodig');
        //return response()->json($vehiculo);
        return view('admin.vehiculos.vehiculos.vehiculos.consultar',compact('propietario','tiposdocumentos','ciudades','oficina_registro'));
    }
    
    //  7- ACTUALIZAR
    //Update: Función para validar y actualizar campos de registros en tabla
    public function update(Request $request, $id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 11;
        $aud_nom_pag = 'Vehículos';
        //2- BUSCA EL REGISTRO POR EL ID PARA VERIFICAR SI TIENE EL MISMO NUIP (LLAVE)
        $vehiculo = Capmvehi::find($id);

        //2-1 BUSCA EL REGISTRO POR EL ID TOMA VALORES INICIALES (AUDITORIA)
        $con_dat_ini = Capmvehi::find($id);

        //2-2 COMPARA NUIP (LLAVE) REGISTRO HALLADO CON NUIP (LLAVE) DE LA RESPUESTA
        if($vehiculo->m_caplaca==$request->m_caplaca){

            //2-3 CORRESPONDE AL MISMO NUIP (LLAVE) - NO FUE MODIFICADO - ACTUALIZA TODOS LOS CAMPOS
            $vehiculo = Capmvehi::find($id);
            $vehiculo->m_caplaca = $request->m_caplaca;
            $vehiculo->m_caplaca = $request->m_caplaca;
            $vehiculo->m_canuint = $request->m_canuint;
            $vehiculo->m_caviemp = $request->m_caviemp;
            $vehiculo->m_catipos = $request->m_catipos;
            $vehiculo->m_caestad = $request->m_caestad;
            $vehiculo->m_fevincu = $request->m_fevincu;
            $vehiculo->m_feestad = $request->m_feestad;
            $vehiculo->m_cadesta = $request->m_cadesta;
            $vehiculo->m_caopres = $request->m_caopres;
            $vehiculo->m_feinsuv = $request->m_feinsuv;
            $vehiculo->m_fetesuv = $request->m_fetesuv;
            $vehiculo->m_nucomar = $request->m_nucomar;
            $vehiculo->m_nucolin = $request->m_nucolin;
            $vehiculo->m_numodel = $request->m_numodel;
            $vehiculo->m_nuantig = $request->m_nuantig;
            $vehiculo->m_camorea = $request->m_camorea;
            $vehiculo->m_cacilin = $request->m_cacilin;
            $vehiculo->m_nucolor = $request->m_nucolor;
            $vehiculo->m_caservi = $request->m_caservi;
            $vehiculo->m_nucogru = $request->m_nucogru;
            $vehiculo->m_nucosrv = $request->m_nucosrv;
            $vehiculo->m_nucocar = $request->m_nucocar;
            $vehiculo->m_nucocbl = $request->m_nucocbl;
            $vehiculo->m_nucapci = $request->m_nucapci;
            $vehiculo->m_nucodis = $request->m_nucodis;
            $vehiculo->m_canumot = $request->m_canumot;
            $vehiculo->m_canuvin = $request->m_canuvin;
            $vehiculo->m_canuser = $request->m_canuser;
            $vehiculo->m_canucha = $request->m_canucha;
            $vehiculo->m_canurun = $request->m_canurun;
            $vehiculo->m_cacofdh = $request->m_cacofdh;
            $vehiculo->m_nucocir = $request->m_nucocir;
            $vehiculo->m_nuancho = $request->m_nuancho;
            $vehiculo->m_nualtos = $request->m_nualtos;
            $vehiculo->m_nulargo = $request->m_nulargo;
            $vehiculo->m_nuvolpo = $request->m_nuvolpo;
            $vehiculo->m_nupesva = $request->m_nupesva;
            $vehiculo->m_nucapdi = $request->m_nucapdi;
            $vehiculo->m_nukiact = $request->m_nukiact;
            $vehiculo->m_nukiprv = $request->m_nukiprv;
            $vehiculo->m_nucorut = $request->m_nucorut;
            $vehiculo->m_nucocib = $request->m_nucocib;
            $vehiculo->m_carodam = $request->m_carodam;
            $vehiculo->m_nusires = $request->m_nusires;
            $vehiculo->m_nusipre = $request->m_nusipre;
            $vehiculo->m_nusiweb = $request->m_nusiweb;
            $vehiculo->m_caencon = $request->m_caencon;
            $vehiculo->m_caencob = $request->m_caencob;
            $vehiculo->m_caencre = $request->m_caencre;
            $vehiculo->m_caencor = $request->m_caencor;
            $vehiculo->m_caproju = $request->m_caproju;
            $vehiculo->m_caidpac = $request->m_caidpac;
            $vehiculo->m_caidpan = $request->m_caidpan;
            $vehiculo->m_caidten = $request->m_caidten;
            $vehiculo->m_nuavalu = $request->m_nuavalu;
            $vehiculo->m_cacopuc = $request->m_cacopuc;
            $vehiculo->m_cacenco = $request->m_cacenco;
            $vehiculo->m_calidep = $request->m_calidep;
            $vehiculo->m_calants = $request->m_calants;
            $vehiculo->m_nulvtas = $request->m_nulvtas;
            $vehiculo->m_nulvcas = $request->m_nulvcas;
            $vehiculo->m_nulvpas = $request->m_nulvpas;
            $vehiculo->m_nulvaas = $request->m_nulvaas;
            $vehiculo->m_calpadc = $request->m_calpadc;
            $vehiculo->m_nulvtpa = $request->m_nulvtpa;
            $vehiculo->m_nulvcpa = $request->m_nulvcpa;
            $vehiculo->m_nulpcpa = $request->m_nulpcpa;
            $vehiculo->m_nulvapa = $request->m_nulvapa;
            $vehiculo->m_calvppd = $request->m_calvppd;
            $vehiculo->m_nulvcpd = $request->m_nulvcpd;
            $vehiculo->m_nulpcpd = $request->m_nulpcpd;
            $vehiculo->m_nulvapd = $request->m_nulvapd;
            $vehiculo->m_calsrjo = $request->m_calsrjo;
            $vehiculo->m_nulvtsj = $request->m_nulvtsj;
            $vehiculo->m_nulvcsj = $request->m_nulvcsj;
            $vehiculo->m_nulpcsj = $request->m_nulpcsj;
            $vehiculo->m_nulvasj = $request->m_nulvasj;
            $vehiculo->m_calsspz = $request->m_calsspz;
            $vehiculo->m_nulvtsp = $request->m_nulvtsp;
            $vehiculo->m_nulvcsp = $request->m_nulvcsp;
            $vehiculo->m_nulpcsp = $request->m_nulpcsp;
            $vehiculo->m_nulvasp = $request->m_nulvasp;
            $vehiculo->m_caliper = $request->m_caliper;
            $vehiculo->m_calic01 = $request->m_calic01;
            $vehiculo->m_calid01 = $request->m_calid01;
            $vehiculo->m_nuliv01 = $request->m_nuliv01;
            $vehiculo->m_calic02 = $request->m_calic02;
            $vehiculo->m_calid02 = $request->m_calid02;
            $vehiculo->m_nuliv02 = $request->m_nuliv02;
            $vehiculo->m_calic03 = $request->m_calic03;
            $vehiculo->m_calid03 = $request->m_calid03;
            $vehiculo->m_nuliv03 = $request->m_nuliv03;
            $vehiculo->m_calic04 = $request->m_calic04;
            $vehiculo->m_calid04 = $request->m_calid04;
            $vehiculo->m_nuliv04 = $request->m_nuliv04;
            $vehiculo->m_calic05 = $request->m_calic05;
            $vehiculo->m_calid05 = $request->m_calid05;
            $vehiculo->m_nuliv05 = $request->m_nuliv05;
            $vehiculo->m_calic06 = $request->m_calic06;
            $vehiculo->m_calid06 = $request->m_calid06;
            $vehiculo->m_nuliv06 = $request->m_nuliv06;
            $vehiculo->m_calic07 = $request->m_calic07;
            $vehiculo->m_calid07 = $request->m_calid07;
            $vehiculo->m_nuliv07 = $request->m_nuliv07;
            $vehiculo->m_calic08 = $request->m_calic08;
            $vehiculo->m_calid08 = $request->m_calid08;
            $vehiculo->m_nuliv08 = $request->m_nuliv08;
            $vehiculo->m_calic09 = $request->m_calic09;
            $vehiculo->m_calid09 = $request->m_calid09;
            $vehiculo->m_nuliv09 = $request->m_nuliv09;
            $vehiculo->m_calic10 = $request->m_calic10;
            $vehiculo->m_calid10 = $request->m_calid10;
            $vehiculo->m_nuliv10 = $request->m_nuliv10;
            $vehiculo->m_nulivto = $request->m_nulivto;
            $vehiculo->m_caadmin = $request->m_caadmin;
            $vehiculo->m_nuvaadm = $request->m_nuvaadm;
            $vehiculo->m_nupoadm = $request->m_nupoadm;
            $vehiculo->m_canomco = $request->m_canomco;
            $vehiculo->m_nuvanco = $request->m_nuvanco;
            $vehiculo->m_nuponco = $request->m_nuponco;
            $vehiculo->m_cassoco = $request->m_cassoco;
            $vehiculo->m_nuvasco = $request->m_nuvasco;
            $vehiculo->m_nuposco = $request->m_nuposco;
            $vehiculo->m_cafdoin = $request->m_cafdoin;
            $vehiculo->m_nuvafdi = $request->m_nuvafdi;
            $vehiculo->m_nupofdi = $request->m_nupofdi;
            $vehiculo->m_cafdomu = $request->m_cafdomu;
            $vehiculo->m_nuvafdm = $request->m_nuvafdm;
            $vehiculo->m_nupofdm = $request->m_nupofdm;
            $vehiculo->m_caldvpr = $request->m_caldvpr;
            $vehiculo->m_nuldvvc = $request->m_nuldvvc;
            $vehiculo->m_nuldvpc = $request->m_nuldvpc;
            $vehiculo->m_capapel = $request->m_capapel;
            $vehiculo->m_nuvapap = $request->m_nuvapap;
            $vehiculo->m_nupopap = $request->m_nupopap;
            $vehiculo->m_capdcpr = $request->m_capdcpr;
            $vehiculo->m_nupdcvc = $request->m_nupdcvc;
            $vehiculo->m_nupdcpc = $request->m_nupdcpc;
            $vehiculo->m_capoliz = $request->m_capoliz;
            $vehiculo->m_nuvaplz = $request->m_nuvaplz;
            $vehiculo->m_nupoplz = $request->m_nupoplz;
            $vehiculo->m_canomrv = $request->m_canomrv;
            $vehiculo->m_nuvanrv = $request->m_nuvanrv;
            $vehiculo->m_nuponrv = $request->m_nuponrv;
            $vehiculo->m_cassorv = $request->m_cassorv;
            $vehiculo->m_nuvasrv = $request->m_nuvasrv;
            $vehiculo->m_nuposrv = $request->m_nuposrv;
            $vehiculo->m_causact = Auth::user()->id;
            $vehiculo->save();
             
            //2-4 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_fin = Capmvehi::find($id);

            //2-5 COMPARA VALORES INICIALES VS VALORES FINALES
            if($con_dat_ini != $con_dat_fin){
                
                //CAMBIOS HALLADOS EN VALORES DE CAMPOS
                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                //$audi_editar = Captaudi::create([
                //    'm_nuidope'=>$aud_idu_ope,
                //    'm_canuint'=>$aud_nom_pag,
                //    'm_callave'=>$request->m_caplaca,
                //    'm_nuidusu'=>Auth::user()->id,
                //    'm_cadeini'=>$con_dat_ini,
                //    'm_cadefin'=>$con_dat_fin]);
            
                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Vehículo: ';
                $tx1_men_res_cor = ' '.$request->m_caplaca.' ';
                $tx2_men_res_cor = ' '.$request->m_canuint.' ';
                $tx3_men_res_cor = ' '.$request->m_caidpac.' ';
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
                return redirect()->route('vehiculos.index')->with($par_men_res_cor);
                
            } else{
                // NO HALLO CAMBIOS EN VALORES DE CAMPOS: ENVIA
                return redirect()->route('vehiculos.index');
            }

        } else if($vehiculo->m_caplaca!==$request->m_caplaca) {
            
            //2-3 EL NUIP FUE MODIFICADO
            //2-4 CONSULTA PARA REVISAR QUE EL NUEVO NUIP NO ESTÉ YA EN LA TABLA
            $validar = Capmvehi::where('m_caplaca',$request->m_caplaca)->get();
            if(count($validar)>0){
                
                //2-5 ERROR EL NUEVO NUIP YA ESTA EN LA TABLA
                //2-6 RESULTADO ERROR: MENSAJES
                $tit_men_res_err = 'Vehículo: ';
                $tx1_men_res_err = ' '.$request->m_caplaca.' ';
                $tx2_men_res_err = ' '.$request->m_canuint.' ';
                $tx3_men_res_err = ' '.$request->m_caidpac.' ';
                $tx4_men_res_err = '';
                $tx5_men_res_err = '';
                $fo1_men_res_err = 'Ya existe un registro con ese NUIP';
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
                return redirect()->route('vehiculos.index',['m_caplaca'=>$request->m_caplaca])->with($par_men_res_err);
                
            } else{
                
                //2-5 EL NUEVO NUIPE NO ESTA EN LA TABLA 
                $vehiculo = Capmvehi::find($id);
                $vehiculo->m_causact = Auth::user()->id;
                $vehiculo->m_caplaca = $request->m_caplaca;
                $vehiculo->m_caplaca = $request->m_caplaca;
                $vehiculo->m_canuint = $request->m_canuint;
                $vehiculo->m_caviemp = $request->m_caviemp;
                $vehiculo->m_catipos = $request->m_catipos;
                $vehiculo->m_caestad = $request->m_caestad;
                $vehiculo->m_fevincu = $request->m_fevincu;
                $vehiculo->m_feestad = $request->m_feestad;
                $vehiculo->m_cadesta = $request->m_cadesta;
                $vehiculo->m_caopres = $request->m_caopres;
                $vehiculo->m_feinsuv = $request->m_feinsuv;
                $vehiculo->m_fetesuv = $request->m_fetesuv;
                $vehiculo->m_nucomar = $request->m_nucomar;
                $vehiculo->m_nucolin = $request->m_nucolin;
                $vehiculo->m_numodel = $request->m_numodel;
                $vehiculo->m_nuantig = $request->m_nuantig;
                $vehiculo->m_camorea = $request->m_camorea;
                $vehiculo->m_cacilin = $request->m_cacilin;
                $vehiculo->m_nucolor = $request->m_nucolor;
                $vehiculo->m_caservi = $request->m_caservi;
                $vehiculo->m_nucogru = $request->m_nucogru;
                $vehiculo->m_nucosrv = $request->m_nucosrv;
                $vehiculo->m_nucocar = $request->m_nucocar;
                $vehiculo->m_nucocbl = $request->m_nucocbl;
                $vehiculo->m_nucapci = $request->m_nucapci;
                $vehiculo->m_nucodis = $request->m_nucodis;
                $vehiculo->m_canumot = $request->m_canumot;
                $vehiculo->m_canuvin = $request->m_canuvin;
                $vehiculo->m_canuser = $request->m_canuser;
                $vehiculo->m_canucha = $request->m_canucha;
                $vehiculo->m_canurun = $request->m_canurun;
                $vehiculo->m_cacofdh = $request->m_cacofdh;
                $vehiculo->m_nucocir = $request->m_nucocir;
                $vehiculo->m_nuancho = $request->m_nuancho;
                $vehiculo->m_nualtos = $request->m_nualtos;
                $vehiculo->m_nulargo = $request->m_nulargo;
                $vehiculo->m_nuvolpo = $request->m_nuvolpo;
                $vehiculo->m_nupesva = $request->m_nupesva;
                $vehiculo->m_nucapdi = $request->m_nucapdi;
                $vehiculo->m_nukiact = $request->m_nukiact;
                $vehiculo->m_nukiprv = $request->m_nukiprv;
                $vehiculo->m_nucorut = $request->m_nucorut;
                $vehiculo->m_nucocib = $request->m_nucocib;
                $vehiculo->m_carodam = $request->m_carodam;
                $vehiculo->m_nusires = $request->m_nusires;
                $vehiculo->m_nusipre = $request->m_nusipre;
                $vehiculo->m_nusiweb = $request->m_nusiweb;
                $vehiculo->m_caencon = $request->m_caencon;
                $vehiculo->m_caencob = $request->m_caencob;
                $vehiculo->m_caencre = $request->m_caencre;
                $vehiculo->m_caencor = $request->m_caencor;
                $vehiculo->m_caproju = $request->m_caproju;
                $vehiculo->m_caidpac = $request->m_caidpac;
                $vehiculo->m_caidpan = $request->m_caidpan;
                $vehiculo->m_caidten = $request->m_caidten;
                $vehiculo->m_nuavalu = $request->m_nuavalu;
                $vehiculo->m_cacopuc = $request->m_cacopuc;
                $vehiculo->m_cacenco = $request->m_cacenco;
                $vehiculo->m_calidep = $request->m_calidep;
                $vehiculo->m_calants = $request->m_calants;
                $vehiculo->m_nulvtas = $request->m_nulvtas;
                $vehiculo->m_nulvcas = $request->m_nulvcas;
                $vehiculo->m_nulvpas = $request->m_nulvpas;
                $vehiculo->m_nulvaas = $request->m_nulvaas;
                $vehiculo->m_calpadc = $request->m_calpadc;
                $vehiculo->m_nulvtpa = $request->m_nulvtpa;
                $vehiculo->m_nulvcpa = $request->m_nulvcpa;
                $vehiculo->m_nulpcpa = $request->m_nulpcpa;
                $vehiculo->m_nulvapa = $request->m_nulvapa;
                $vehiculo->m_calvppd = $request->m_calvppd;
                $vehiculo->m_nulvcpd = $request->m_nulvcpd;
                $vehiculo->m_nulpcpd = $request->m_nulpcpd;
                $vehiculo->m_nulvapd = $request->m_nulvapd;
                $vehiculo->m_calsrjo = $request->m_calsrjo;
                $vehiculo->m_nulvtsj = $request->m_nulvtsj;
                $vehiculo->m_nulvcsj = $request->m_nulvcsj;
                $vehiculo->m_nulpcsj = $request->m_nulpcsj;
                $vehiculo->m_nulvasj = $request->m_nulvasj;
                $vehiculo->m_calsspz = $request->m_calsspz;
                $vehiculo->m_nulvtsp = $request->m_nulvtsp;
                $vehiculo->m_nulvcsp = $request->m_nulvcsp;
                $vehiculo->m_nulpcsp = $request->m_nulpcsp;
                $vehiculo->m_nulvasp = $request->m_nulvasp;
                $vehiculo->m_caliper = $request->m_caliper;
                $vehiculo->m_calic01 = $request->m_calic01;
                $vehiculo->m_calid01 = $request->m_calid01;
                $vehiculo->m_nuliv01 = $request->m_nuliv01;
                $vehiculo->m_calic02 = $request->m_calic02;
                $vehiculo->m_calid02 = $request->m_calid02;
                $vehiculo->m_nuliv02 = $request->m_nuliv02;
                $vehiculo->m_calic03 = $request->m_calic03;
                $vehiculo->m_calid03 = $request->m_calid03;
                $vehiculo->m_nuliv03 = $request->m_nuliv03;
                $vehiculo->m_calic04 = $request->m_calic04;
                $vehiculo->m_calid04 = $request->m_calid04;
                $vehiculo->m_nuliv04 = $request->m_nuliv04;
                $vehiculo->m_calic05 = $request->m_calic05;
                $vehiculo->m_calid05 = $request->m_calid05;
                $vehiculo->m_nuliv05 = $request->m_nuliv05;
                $vehiculo->m_calic06 = $request->m_calic06;
                $vehiculo->m_calid06 = $request->m_calid06;
                $vehiculo->m_nuliv06 = $request->m_nuliv06;
                $vehiculo->m_calic07 = $request->m_calic07;
                $vehiculo->m_calid07 = $request->m_calid07;
                $vehiculo->m_nuliv07 = $request->m_nuliv07;
                $vehiculo->m_calic08 = $request->m_calic08;
                $vehiculo->m_calid08 = $request->m_calid08;
                $vehiculo->m_nuliv08 = $request->m_nuliv08;
                $vehiculo->m_calic09 = $request->m_calic09;
                $vehiculo->m_calid09 = $request->m_calid09;
                $vehiculo->m_nuliv09 = $request->m_nuliv09;
                $vehiculo->m_calic10 = $request->m_calic10;
                $vehiculo->m_calid10 = $request->m_calid10;
                $vehiculo->m_nuliv10 = $request->m_nuliv10;
                $vehiculo->m_nulivto = $request->m_nulivto;
                $vehiculo->m_caadmin = $request->m_caadmin;
                $vehiculo->m_nuvaadm = $request->m_nuvaadm;
                $vehiculo->m_nupoadm = $request->m_nupoadm;
                $vehiculo->m_canomco = $request->m_canomco;
                $vehiculo->m_nuvanco = $request->m_nuvanco;
                $vehiculo->m_nuponco = $request->m_nuponco;
                $vehiculo->m_cassoco = $request->m_cassoco;
                $vehiculo->m_nuvasco = $request->m_nuvasco;
                $vehiculo->m_nuposco = $request->m_nuposco;
                $vehiculo->m_cafdoin = $request->m_cafdoin;
                $vehiculo->m_nuvafdi = $request->m_nuvafdi;
                $vehiculo->m_nupofdi = $request->m_nupofdi;
                $vehiculo->m_cafdomu = $request->m_cafdomu;
                $vehiculo->m_nuvafdm = $request->m_nuvafdm;
                $vehiculo->m_nupofdm = $request->m_nupofdm;
                $vehiculo->m_caldvpr = $request->m_caldvpr;
                $vehiculo->m_nuldvvc = $request->m_nuldvvc;
                $vehiculo->m_nuldvpc = $request->m_nuldvpc;
                $vehiculo->m_capapel = $request->m_capapel;
                $vehiculo->m_nuvapap = $request->m_nuvapap;
                $vehiculo->m_nupopap = $request->m_nupopap;
                $vehiculo->m_capdcpr = $request->m_capdcpr;
                $vehiculo->m_nupdcvc = $request->m_nupdcvc;
                $vehiculo->m_nupdcpc = $request->m_nupdcpc;
                $vehiculo->m_capoliz = $request->m_capoliz;
                $vehiculo->m_nuvaplz = $request->m_nuvaplz;
                $vehiculo->m_nupoplz = $request->m_nupoplz;
                $vehiculo->m_canomrv = $request->m_canomrv;
                $vehiculo->m_nuvanrv = $request->m_nuvanrv;
                $vehiculo->m_nuponrv = $request->m_nuponrv;
                $vehiculo->m_cassorv = $request->m_cassorv;
                $vehiculo->m_nuvasrv = $request->m_nuvasrv;
                $vehiculo->m_nuposrv = $request->m_nuposrv;
                $vehiculo->save();

                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                //$audi_editar = Captaudi::create([
                //    'm_nuidope'=>$aud_idu_ope,
                //    'm_canuint'=>$aud_nom_pag,
                //    'm_callave'=>$request->m_caplaca,
                //    'm_nuidusu'=>Auth::user()->id,
                //    'm_cadeini'=>$con_dat_ini,
                //    'm_cadefin'=>$vehiculo]);

                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Vehículo: ';
                $tx1_men_res_cor = ' '.$request->m_caplaca.' ';
                $tx2_men_res_cor = ' '.$request->m_canuint.' ';
                $tx3_men_res_cor = ' '.$request->m_caidpac.' ';
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
                return redirect()->route('vehiculos.index')->with($par_men_res_cor);
            }
        }
    }

    //  8- ELIMINAR
    //Destroy: Función para eliminar registros en tabla
    public function destroy($id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 21;
        $aud_nom_pag = 'Vehículos';

        //2- BUSCA EL REGISTRO POR EL ID POR SI YA HA SIDO ELIMINADO (SEGURIDAD)
        $vehiculo = Capmvehi::find($id);
        if($vehiculo){
            //REGISTRO HALLADO EN LA TABLA - PUEDE ELIMINARLO

            //2-1 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Vehículo: ';
            $tx1_men_res_cor = ' '.$vehiculo->m_caplaca.' ';
            $tx2_men_res_cor = ' '.$vehiculo->m_canuint.' ';
            $tx3_men_res_cor = ' '.$vehiculo->m_caidpac.' ';
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
            $aud_nom_pag = 'Vehículos';
            //$audi_borrar = Captaudi::create([
            //    'm_nuidope'=>$aud_idu_ope,
            //    'm_canuint'=>$aud_nom_pag,
            //    'm_callave'=>$vehiculo->m_caplaca,
            //    'm_nuidusu'=>Auth::user()->id,
            //    'm_cadeini'=>$vehiculo]);

            //2-4 ELIMINA REGISTRO
            $vehiculo->delete();

            //2-5 RESULTADO CORRECTO: ENVIA
            return redirect()->route('vehiculos.index')->with($par_men_res_cor);

        }else{
            //REGISTRO NO HALLADO EN LA TABLA
            
            //3-1 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Vehículo: ';
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
            return redirect()->route('vehiculos.index')->with($par_men_res_err);
        }
    }

    //  9- EXPORTAR: PDF
    // Funcion para exportar PDF
    public function exportarpdf(Request $request){

        // 0- ORDEN FILTROS
        //ORDENAMIENTO
        // ASCENDENTE - DESCENTE
        $this->m_canuint_ordene=$request->m_canuint_ordene;
        // NOMBRE CAMPO
        $this->m_canuint_campos=$request->m_canuint_campos;
        // FILTROS
        $this->m_caplaca_filtro=$request->m_caplaca;
        $this->m_canuint_filtro=$request->m_canuint;
        $this->m_nucociu_filtro=$request->m_nucociu;
        $this->m_cadacon_filtro=$request->m_cadacon;
        $this->m_caidpac_filtro=$request->m_caidpac;
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;

        $vehiculos = Capmvehi::Nuipe($this->m_caplaca_filtro)->
                        Numerointerno($this->m_canuint_filtro)->
                        Nombre_ciudad($this->m_nucociu_filtro)->
                        Nombre_contacto($this->m_cadacon_filtro)->
                        Codigo_nacional($this->m_caidpac_filtro)->
                        estado($this->m_caestad_filtro)->
                        usuario_registra($this->m_causreg_filtro)->
                        usuario_actualiza($this->m_causact_filtro)->
                        orderBy($this->m_canuint_campos,$this->m_canuint_ordene)->get();
        
        $barra = new DNS1D();
        $pdf = \App::make('dompdf.wrapper');
        $vista = \view('admin.vehiculos.vehiculos.vehiculos.exportarpdf',compact('vehiculos'))->render();
        $pdf->loadHTML($vista);
        // Obtiene fecha y hora actual 
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'vehiculos_'.$cadena_fecha_actual.'.pdf';
        //  Resultados
        return $pdf->download($nombre_archivo);
    }

    //  10- EXPORTAR: HOJA DE CALCULO
    // Funcion para exportar HOJA DE CALCULO
    public function exportarexcel(Request $request){

        // 0- ORDEN FILTROS
        //ORDENAMIENTO
        // ASCENDENTE - DESCENTE
        $this->m_canuint_ordene=$request->m_canuint_ordene;
        // NOMBRE CAMPO
        $this->m_canuint_campos=$request->m_canuint_campos;
        // FILTROS
        $this->m_caplaca_filtro=$request->m_caplaca;
        $this->m_canuint_filtro=$request->m_canuint;
        $this->m_nucociu_filtro=$request->m_nucociu;
        $this->m_cadacon_filtro=$request->m_cadacon;
        $this->m_caidpac_filtro=$request->m_caidpac;
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;

        // Obtiene fecha y hora actual
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'vehiculos_'.$cadena_fecha_actual;

        Excel::create($nombre_archivo, function($excel) {
            $excel->sheet('Vehículos', function($sheet) {

                // 0- CONSULTA 
                $vehiculos = Capmvehi::Nuipe($this->m_caplaca_filtro)->
                    Numerointerno($this->m_canuint_filtro)->
                    Nombre_ciudad($this->m_nucociu_filtro)->
                    Nombre_contacto($this->m_cadacon_filtro)->
                    Codigo_nacional($this->m_caidpac_filtro)->
                    estado($this->m_caestad_filtro)->
                    usuario_registra($this->m_causreg_filtro)->
                    usuario_actualiza($this->m_causact_filtro)->
                    orderBy($this->m_canuint_campos,$this->m_canuint_ordene)->get();

                foreach($vehiculos as $vehiculo){
                    $ciudad = Capmciud::where('m_nucodig',$vehiculo->m_nucociu)->first();
                    $departamento = Capmdepa::where('m_nucodig',$ciudad->m_nucodep)->first();
                    $pais = Capmpais::where('m_nucodig',$departamento->m_nucopai)->first();
                    $oficina_registro = Capmsucu::where('m_nucodig',$vehiculo->m_nuofici)->first();

                    $ciudad_x[]=$ciudad->m_canuint;
                    $departamento_x[]=$departamento->m_canuint;
                    $pais_x[]=$pais->m_canuint;
                }

                // 1- EMPRESA RAZON SOCIAL
                $emp_raz_soc = Auth::user()->empresa->m_carazso;
                // 2- EMPRESA NUIPE
                $emp_nui_pes = Auth::user()->empresa->m_caplaca;
                // 3- OFICINA NOMBRE
                $ofi_nom_bre = Auth::user()->oficina->m_canuint;
                // 4- OFICINA UBICACION REGIONAL - VARIABLE GLOBAL
                //      Session::get('glo_ofi_ubi_reg'
                // 5- APLICATIVO NOMBRE
                $app_nom_bre = 'mistiquetes.com';
                // 6- TITULO CONSULTA
                $tit_con_sul = 'CONSULTA DE VEHICULOS';

                // 20- TOTAL REGISTROS
                $tot_reg_ist = $vehiculos->Count();
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
                //      IMPORTANTE: ESTILO - UNA CELDA ANTES DE LA FINAL
                $sheet->mergeCells('A6:AD6');
                $sheet->row(6, function ($row) {
                    $row->setFontFamily('Arial');
                    $row->setFontSize(12);
                });

                // ENCABEZADOS
                $sheet->row(7, [
                        'Identificador', 'NUIP', 'DV',
                        'Tipo de documento','Conductor',
                        'Primer nombre','Segundo nombre','Primer apellido','Segundo apellido',
                        'Dirección','Ciudad','Departamento','País',
                        'Telefóno fijo', 'Telefóno móvil', 'Portal Web',
                        'Correo electrónico', 'Contacto', 'Código autorización',
                        'Código nacional', 'Estado',
                        'Vínculo empresarial', 'Oficina de registro',
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
                //13-10-2018
                $j=0;
                foreach($vehiculos as $index => $vehiculo) {

                    //      ESTILO
                    $sheet->Cells('A8:Z100000');
                    $sheet->row($index+8, function ($row) {
                        $row->setFontFamily('Arial');
                        $row->setFontSize(10);
                    });

                    if ($index) {
                            $sheet->row($index+8, [
                            $vehiculo->m_nucodig,
                            $vehiculo->m_caplaca, $vehiculo->m_nudiver,
                            $vehiculo->tiposdocumentos->m_canuint,
                            $vehiculo->m_canuint,
                            $vehiculo->m_caprnom, $vehiculo->m_casenom,
                            $vehiculo->m_caprape, $vehiculo->m_caseape,
                            $vehiculo->m_cadirec, $vehiculo->ciudades->m_canuint,
                            $departamento_x[$j],
                            $pais_x[$j],
                            $vehiculo->m_catelfi, $vehiculo->m_camovil, $vehiculo->m_casitew,
                            $vehiculo->m_cacorel, $vehiculo->m_cadacon, $vehiculo->m_caautna,
                            $vehiculo->m_caidpac, $vehiculo->m_caestad,
                            $vehiculo->m_caviemp, $vehiculo->oficina_registro->m_canuint,
                            $vehiculo->created_at, $vehiculo->usuario_registra->name,
                            $vehiculo->updated_at, $vehiculo->usuario_actualiza->name,
                        ]);
                    } else {
                        $sheet->row($index+8, [
                            $vehiculo->m_nucodig,
                            $vehiculo->m_caplaca, $vehiculo->m_nudiver,
                            $vehiculo->tiposdocumentos->m_canuint,
                            $vehiculo->m_canuint,
                            $vehiculo->m_caprnom, $vehiculo->m_casenom,
                            $vehiculo->m_caprape, $vehiculo->m_caseape,
                            $vehiculo->m_cadirec, $vehiculo->ciudades->m_canuint,
                            $departamento_x[$j],
                            $pais_x[$j],
                            $vehiculo->m_catelfi, $vehiculo->m_camovil, $vehiculo->m_casitew,
                            $vehiculo->m_cacorel, $vehiculo->m_cadacon, $vehiculo->m_caautna,
                            $vehiculo->m_caidpac, $vehiculo->m_caestad,
                            $vehiculo->m_caviemp, $vehiculo->oficina_registro->m_canuint,
                            $vehiculo->created_at, $vehiculo->usuario_registra->name,
                            $vehiculo->updated_at, $vehiculo->usuario_actualiza->name,
                            $tot_reg_ist, $fec_hor_gen, $usu_gen_era, $not_cla_con
                        ]);
                    }
                    //13-10-2018
                    $j++;
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

        return redirect()->route('vehiculos.index');
        
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

    //  12- CARGOS - DIVISIONES 
    public function datosCargo(Request $request){
        //return $request->id;
        $cargo = Capmcarg::find($request->id);
        $division = Capmdivi::where('m_nucodig',$cargo->m_nucodiv)->first();

        $datos = array();
        $datos[0] = $cargo->m_canuint;
        $datos[1] = $division->m_canuint;
        return response()->json($datos);
    }

    //  12- VEHICULOS - VEHICULOS
    public function datosVehiculo(Request $request){
        //return $request->id;
        $vehiculo = Capmvehi::find($request->id);
        $valor = $vehiculo->m_caidpac;
        
        $vehiculoVehiculo = DB::select('select * from Capmvehi where m_nucodig = ?', [$valor]);
        $numeroVehiculo = DB::select('select * from Capmvehi where m_caidpac = ?', [$valor]);
        return response()->json([$vehiculoVehiculo,$numeroVehiculo]);
    }

    public function guardarDocumentoPersona(Request $request){    
        $m_nucodig = (int)$request->input('m_nucodig');
        $documentosPersona = capmdopv::find($m_nucodig);

        try {
            //AGREGRAR TODOS LOS CAMPOS DE LA TABLA DOCUMENTOS
            $documentosPersona->m_feexped = $request->m_feexped;
            $documentosPersona->m_feinici = $request->m_feinici;
            $documentosPersona->m_fevenci = $request->m_fevenci;
            $documentosPersona->m_canumer = $request->m_canumer;
            $documentosPersona->m_cacateg = $request->m_cacateg;
            $documentosPersona->m_cadetal = $request->m_cadetal;
            $documentosPersona->m_nucocie = $request->m_nucocie;
            $documentosPersona->m_causact = Auth::user()->id;
            $documentosPersona->save();

            return response()->json([true]); 
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

       }

    public function guardarSeguroPersona(Request $request){

        $m_nucodig = (int)$request->input('m_nucodig');
        $segurosPersona = capmseve::find($m_nucodig);

        try {
            //AGREGRAR TODOS LOS CAMPOS DE LA TABLA DOCUMENTOS
            $segurosPersona->m_feexped = $request->m_feexped;
            $segurosPersona->m_feinici = $request->m_feinici;
            $segurosPersona->m_fevenci = $request->m_fevenci;
            $segurosPersona->m_canumer = $request->m_canumer;
            $segurosPersona->m_cacateg = $request->m_cacateg;
            $segurosPersona->m_cadetal = $request->m_cadetal;
            $segurosPersona->m_nucocie = $request->m_nucocie;            
            $segurosPersona->m_causact = Auth::user()->id;
            $segurosPersona->save();

            return response()->json([true]); 
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

       }

}
