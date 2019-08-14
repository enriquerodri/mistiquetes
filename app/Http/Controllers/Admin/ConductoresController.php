<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           ConductoresControler.php
//Descripción:      Conductores vehículos
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
use App\Capmdocu;
use App\Capmdopp;
use App\Capmsepp;
use App\Capmsegu;
use App\Capmcarg;
use App\Capmdivi;
use App\Capmgrtr;
use App\Capmtico;
use App\Capmvehi;
use App\Captaudi;
use App\User;

setlocale(LC_TIME,"es_ES"); date_default_timezone_set ('America/Bogota');

class ConductoresController extends Controller
{

    //ORDENAMIENTO
    // ASCENDENTE - DESCENTE
    private $m_canombr_ordene="asc";
    // NOMBRE CAMPO
    private $m_canombr_campos="m_canombr";
    //FILTROS
    private $m_canuipe_filtro="";
    private $m_canombr_filtro="";
    private $m_nucociu_filtro="";
    private $m_nucocar_filtro="";
    private $m_nucodiv_filtro="";
    private $m_cadacon_filtro="";
    private $m_cacodna_filtro="";
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
            $m_canombr_ordene="asc";
            // NOMBRE CAMPO
            $m_canombr_campos="m_canombr";
            // LIMPIA FILTROS
            $m_canuipe_filtro="";
            $m_canombr_filtro="";
            $m_nucociu_filtro="";
            $m_nucocar_filtro="";
            $m_nucodiv_filtro="";
            $m_cadacon_filtro="";
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
                $m_canuipe_filtro = $request->m_canuipe;
                $m_canombr_filtro = $request->m_canombr;
                $m_nucociu_filtro = $request->m_nucociu;
                $m_nucocar_filtro = $request->m_nucocar;
                $m_nucodiv_filtro = $request->m_nucodiv;
                $m_cadacon_filtro = $request->m_cadacon;
                $m_cacodna_filtro = $request->m_cacodna;
                $m_caestad_filtro = $request->m_caestad;
                $m_causreg_filtro = $request->m_causreg;
                $m_causact_filtro = $request->m_causact;
            }
            //  PROPIETARIOS 
            //Codigo_nacional($request->m_cacodna)->
            //estado($request->m_caestad)->
            $propietarios = Capmascp::Nuipe($request->m_canuipe)->
                nombre($request->m_canombr)->
                where('m_cacondu',"SI")->
                orderBy($m_canombr_campos,$m_canombr_ordene)->paginate(20);

            foreach($propietarios as $propietario){
                $ciudad = Capmciud::where('m_nucodig',$propietario->m_nucociu)->first();
                $departamento = Capmdepa::where('m_nucodig',$ciudad->m_nucodep)->first();
                $pais = Capmpais::where('m_nucodig',$departamento->m_nucopai)->first();
                $oficina_registro = Capmsucu::where('m_nucodig',$propietario->m_nuofici)->first();

                $ciudad_x[]=$ciudad->m_canombr;
                $departamento_x[]=$departamento->m_canombr;
                $pais_x[]=$pais->m_canombr;
            }

            //  TIPOS DE DOCUMENTO
            $tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  CARGOS
            $cargos = Capmcarg::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig','m_nucodiv');
            //  DIVISIONES
            $divisiones = Capmdivi::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  CIUDADES
            $ciudades_actual = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig','m_nucodep');
            //  CIUDADS II
            $ciudades = DB::table('capmciud')->
                            join('capmdepa','capmdepa.m_nucodig','=','capmciud.m_nucodep')->
                            join('capmpais','capmpais.m_nucodig','=','capmdepa.m_nucopai')->
                            selectRaw('CONCAT(capmciud.m_canombr, " - ", capmdepa.m_canombr, " - ", capmpais.m_canombr) as m_nucociu, capmciud.m_nucodig')->
                            orderBy('capmciud.m_canombr','asc')->
                            pluck('m_nucociu','m_nucodig');
            //  DEPARTAMENTOS
            $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig','m_nucopai');
            //  PAISES
            $paises = Capmpais::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  OFICINA
            $oficina_registro = Capmsucu::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  USUARIOS
            $usuarios = User::orderBy('name','asc')->pluck('name','id');
            //  GRUPOS DE TRABAJO
            $grupostrabajos = capmgrtr::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  TIPOS DE CONTRATO
            $tiposcontratos = capmtico::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  CONDUCTOR VEHICULO ACTUAL - CONCATENAR - NUMERO INTERNO Y PLACA (EN LA MISMA TABLA)
            $vehiculoactconductores = Capmvehi::select(DB::raw("CONCAT(m_canuint,' - ',m_caplaca) AS m_caplaca"),'m_nucodig')->orderBy('m_caplaca','asc')->pluck('m_caplaca','m_nucodig');
            //  MAESTRO DOCUMENTOS

           $maestrodocumentos = DB::table('capmdocu')->
                selectRaw('CONCAT(m_nucodig, ",", m_nudiapv, ",", m_cacoven, ",", m_nuorden) as m_nucodig, m_canombr')->
                orderBy('m_canombr','asc')->
                where([['m_caapper','=','SI'],['m_caestad','=','ACTIVO']])->
                pluck('m_canombr','m_nucodig');

            //  MAESTRO SEGUROS
           $maestroseguros = DB::table('capmsegu')->
                selectRaw('CONCAT(m_nucodig, ",", m_nudiapv, ",", m_cacoven, ",", m_nuorden) as m_nucodig, m_canombr')->
                orderBy('m_canombr','asc')->
                where([['m_caapper','=','SI'],['m_caestad','=','ACTIVO']])->
                pluck('m_canombr','m_nucodig');
            //$maestroseguros = Capmsegu::orderBy('m_canombr','asc')->
            //                  where('m_caapper',"SI",)->
            //                  where('m_caestad',"ACTIVO",)->
            //                  pluck('m_canombr','m_nucodig');

            //  VISTA
            return view('admin.conductores.conductores.index',
                compact('propietarios','tiposdocumentos',
                        'ciudades','departamentos','paises',
                        'ciudad_x','departamento_x','pais_x',
                        'oficina_registro','usuarios',
                        'cargos','divisiones',
                        'grupostrabajos','tiposcontratos',
                        'vehiculoactconductores',
                        'maestrodocumentos','maestroseguros',
                        'm_canuipe_filtro', 'm_canombr_filtro',
                        'm_nucociu_filtro', 'm_cadacon_filtro',
                        'm_cacodna_filtro', 'm_caestad_filtro',
                        'm_causreg_filtro', 'm_causact_filtro',
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
        //  TIPOS DE DOCUMENTO
        $tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //  CIUDADES
        $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //  DEPARTAMENTOS
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //  PAISES
        $paises = Capmpais::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //  OFICINA
        $oficina_registro = Capmsucu::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //  USUARIOS
        $usuarios = User::orderBy('name','asc')->pluck('name','id');
        //  VISTA
        return view('admin.conductores.conductores.crear',
                compact('tiposdocumentos','departamentos','paises','oficina_registro','ciudades','usuarios'));
    }

    //  4- ALMACENAR
    //Store: Función para validar datos y luego insertarlos en tabla
    public function store(Request $request){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 1;
        $aud_nom_pag = 'Conductores';

        //2- CONSULTA SI EL NUIP YA EXISTE
        $propietarios = Capmascp::where('m_canuipe',$request->m_canuipe)->get();
        if(count($propietarios)>0){

            //2-1 EL NUEVO NOMBRE YA ESTA EN LA TABLA
            //2-2 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Conductor: ';
            $tx1_men_res_err = ' '.$request->m_canuipe.' ';
            $tx2_men_res_err = ' '.$request->m_canombr.' ';
            $tx3_men_res_err = ' '.$request->m_cacodna.' ';
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
            return redirect()->route('conductores.index',['m_canuipe'=>$request->m_canuipe])->with($par_men_res_err);
        }
        else{
            
            //2-1 EL NOMBRE NUEVO NO EXISTE
            //2-2 INSERTAR LOS DATOS
            $propietario = Capmascp::create([
                'm_canuipe'=>$request->m_canuipe,
                'm_nudiver'=>$request->m_nudiver,
                'm_nutipdo'=>$request->m_nutipdo,
                'm_canombr'=>$request->m_canombr,
                'm_caprnom'=>$request->m_caprnom,
                'm_casenom'=>$request->m_casenom,
                'm_caprape'=>$request->m_caprape,
                'm_caseape'=>$request->m_caseape,
                'm_cadirec'=>$request->m_cadirec,
                'm_nucociu'=>$request->m_nucociu,
                'm_catelfi'=>$request->m_catelfi,
                'm_camovil'=>$request->m_camovil,
                'm_casitew'=>$request->m_casitew,
                'm_cacorel'=>$request->m_cacorel,
                'm_caenvco'=>$request->m_caenvco,
                'm_cadacon'=>$request->m_cadacon,
                'm_caautna'=>$request->m_caautna,
                'm_cacodna'=>$request->m_cacodna,
                'm_caestad'=>$request->m_caestad,
                'm_fenacim'=>$request->m_fenacim,
                'm_nuedada'=>$request->m_nuedada,
                'm_catipsa'=>$request->m_catipsa,
                'm_catisex'=>$request->m_catisex,
                'm_nuofici'=>$request->m_nuofici,
                'm_caviemp'=>$request->m_caviemp,
                'm_caasoci'=>$request->m_caasoci,
                'm_fevinas'=>$request->m_fevinas,
                'm_caestas'=>$request->m_caestas,
                'm_feestas'=>$request->m_feestas,
                'm_cadeeas'=>$request->m_cadeeas,
                'm_caorpas'=>$request->m_caorpas,
                'm_capropi'=>$request->m_capropi,
                'm_fevinpr'=>$request->m_fevinpr,
                'm_caestpr'=>$request->m_caestpr,
                'm_feestpr'=>$request->m_feestpr,
                'm_cadeepr'=>$request->m_cadeepr,
                'm_caorppr'=>$request->m_caorppr,
                'm_cacondu'=>$request->m_cacondu,
                'm_fevinco'=>$request->m_fevinco,
                'm_caestco'=>$request->m_caestco,
                'm_feestco'=>$request->m_feestco,
                'm_cadeeco'=>$request->m_cadeeco,
                'm_caorpco'=>$request->m_caorpco,
                'm_feinsco'=>$request->m_feinsco,
                'm_fetesco'=>$request->m_fetesco,
                'm_feincon'=>$request->m_feincon,
                'm_nuexper'=>$request->m_nuexper,
                'm_nucocol'=>$request->m_nucocol,
                'm_nucocar'=>$request->m_nucocar,
                'm_nucogrt'=>$request->m_nucogrt,
                'm_cavehac'=>$request->m_cavehac,
                'm_fevehac'=>$request->m_fevehac,
                'm_camovac'=>$request->m_camovac,
                'm_caorvco'=>$request->m_caorvco,
                'm_cavehan'=>$request->m_cavehan,
                'm_causreg'=>Auth::user()->id,
                'm_causact'=>Auth::user()->id
            ]);

            //2-3 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_ini = $propietario;

            //2-3 AUDITORIA: INSERTA REGISTRO POR NUEVO REGISTRO
            $audi_editar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_callave'=>$request->m_canuipe,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$con_dat_ini]);

            //2-4 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Conductor: ';
            $tx1_men_res_cor = ' '.$request->m_canuipe.' ';
            $tx2_men_res_cor = ' '.$request->m_canombr.' ';
            $tx3_men_res_cor = ' '.$request->m_cacodna.' ';
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
            return redirect()->route('conductores.index')->with($par_men_res_cor);
        }
    }

    //  5- EDITAR
    //Edit: Función para actualizar campos de registros
    public function edit($id){
        $propietario = Capmascp::find($id);
        $documentospersonas = DB::select('select * from capmdopp where m_nuidper = ?', [$id]);
        $segurospersonas = DB::select('select * from Capmsepp where m_nuidper = ?', [$id]);

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

        $divisiones = $propietario //DB::table('capmascp')
            ->select('capmascp.m_canombr as nombreConductor', 'capmascp.m_cavehac as vehiculoActual',
                     'capmcarg.m_canombr as nombreCargo', 'capmdivi.m_canombr as nombreDivision')
            ->join('capmcarg', 'capmascp.m_nucocar', '=', 'capmcarg.m_nucodig')
            ->join('capmdivi', 'capmcarg.m_nucodiv', '=', 'capmdivi.m_nucodig')
            ->where('capmascp.m_nucodig', $id)
            ->get();

        $numeroVehiculo = DB::select('select * from Capmvehi where m_nucodig = ?', [$divisiones[0]->vehiculoActual]);

        //2-1 RESULTADOS: ENVIA
        return response()->json([$propietario,
                                $documentospersonas,
                                $segurospersonas,
                                $divisiones,
                                $usuregdocper,
                                $usuactdocper,
                                $usuregsegper,
                                $usuactsegper,
                                $numeroVehiculo,
                            ]);

    }

    //  6- MOSTRAR
    //Show: Función para mostrar campos de registros
    public function show($id){
        $propietario = Capmascp::find($id);
        $tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $oficina_registro = Capmsucu::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //return response()->json($propietario);
        return view('admin.conductores.conductores.consultar',compact('propietario','tiposdocumentos','ciudades','oficina_registro'));
    }
    
    //  7- ACTUALIZAR
    //Update: Función para validar y actualizar campos de registros en tabla
    public function update(Request $request, $id){
        
        //return response()->json([$request->all()]);


        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 11;
        $aud_nom_pag = 'Conductores';
        //2- BUSCA EL REGISTRO POR EL ID PARA VERIFICAR SI TIENE EL MISMO NUIP (LLAVE)
        $propietario = Capmascp::find($id);

        //2-1 BUSCA EL REGISTRO POR EL ID TOMA VALORES INICIALES (AUDITORIA)
        $con_dat_ini = Capmascp::find($id);

        //2-2 COMPARA NUIP (LLAVE) REGISTRO HALLADO CON NUIP (LLAVE) DE LA RESPUESTA
        if($propietario->m_canuipe==$request->m_canuipe){

            //2-3 CORRESPONDE AL MISMO NUIP (LLAVE) - NO FUE MODIFICADO - ACTUALIZA TODOS LOS CAMPOS
            $propietario = Capmascp::find($id);
            $propietario->m_canuipe = $request->m_canuipe;
            $propietario->m_nudiver = $request->m_nudiver;
            $propietario->m_nutipdo = $request->m_nutipdo;
            $propietario->m_canombr = $request->m_canombr;
            $propietario->m_caprnom = $request->m_caprnom;
            $propietario->m_casenom = $request->m_casenom;
            $propietario->m_caprape = $request->m_caprape;
            $propietario->m_caseape = $request->m_caseape;
            $propietario->m_cadirec = $request->m_cadirec;
            $propietario->m_nucociu = $request->m_nucociu;
            $propietario->m_catelfi = $request->m_catelfi;
            $propietario->m_camovil = $request->m_camovil;
            $propietario->m_casitew = $request->m_casitew;
            $propietario->m_cacorel = $request->m_cacorel;
            $propietario->m_caenvco = $request->m_caenvco;
            $propietario->m_cadacon = $request->m_cadacon;
            $propietario->m_caautna = $request->m_caautna;
            $propietario->m_cacodna = $request->m_cacodna;
            $propietario->m_caestad = $request->m_caestad;
            $propietario->m_fenacim = $request->m_fenacim;
            $propietario->m_nuedada = $request->m_nuedada;
            $propietario->m_catipsa = $request->m_catipsa;
            $propietario->m_catisex = $request->m_catisex;
            $propietario->m_nuofici = $request->m_nuofici;
            $propietario->m_caviemp = $request->m_caviemp;
            $propietario->m_caasoci = $request->m_caasoci;
            $propietario->m_fevinas = $request->m_fevinas;
            $propietario->m_caestas = $request->m_caestas;
            $propietario->m_feestas = $request->m_feestas;
            $propietario->m_cadeeas = $request->m_cadeeas;
            $propietario->m_caorpas = $request->m_caorpas;
            $propietario->m_capropi = $request->m_capropi;
            $propietario->m_fevinpr = $request->m_fevinpr;
            $propietario->m_caestpr = $request->m_caestpr;
            $propietario->m_feestpr = $request->m_feestpr;
            $propietario->m_cadeepr = $request->m_cadeepr;
            $propietario->m_caorppr = $request->m_caorppr;
            $propietario->m_cacondu = $request->m_cacondu;
            $propietario->m_fevinco = $request->m_fevinco;
            $propietario->m_caestco = $request->m_caestco;
            $propietario->m_feestco = $request->m_feestco;
            $propietario->m_cadeeco = $request->m_cadeeco;
            $propietario->m_caorpco = $request->m_caorpco;
            $propietario->m_feinsco = $request->m_feinsco;
            $propietario->m_fetesco = $request->m_fetesco;
            $propietario->m_feincon = $request->m_feincon;
            $propietario->m_nuexper = $request->m_nuexper;
            $propietario->m_nucocol = $request->m_nucocol;
            $propietario->m_nucocar = $request->m_nucocar;
            $propietario->m_nucogrt = $request->m_nucogrt;
            $propietario->m_cavehac = $request->m_caplaca; //m_cavehac
            $propietario->m_fevehac = $request->m_fevehac;
            $propietario->m_camovac = $request->m_camovac;
            $propietario->m_caorvco = $request->m_caorvco;
            $propietario->m_cavehan = $request->m_cavehan;
            $propietario->m_causact = Auth::user()->id;
            $propietario->save();
            
            //2-4 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_fin = Capmascp::find($id);

            //2-5 COMPARA VALORES INICIALES VS VALORES FINALES
            if($con_dat_ini != $con_dat_fin){
                
                //CAMBIOS HALLADOS EN VALORES DE CAMPOS
                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                $audi_editar = Captaudi::create([
                    'm_nuidope'=>$aud_idu_ope,
                    'm_canombr'=>$aud_nom_pag,
                    'm_callave'=>$request->m_canuipe,
                    'm_nuidusu'=>Auth::user()->id,
                    'm_cadeini'=>$con_dat_ini,
                    'm_cadefin'=>$con_dat_fin]);
            
                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Conductor: ';
                $tx1_men_res_cor = ' '.$request->m_canuipe.' ';
                $tx2_men_res_cor = ' '.$request->m_canombr.' ';
                $tx3_men_res_cor = ' '.$request->m_cacodna.' ';
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
                return redirect()->route('conductores.index')->with($par_men_res_cor);
                
            } else{
                // NO HALLO CAMBIOS EN VALORES DE CAMPOS: ENVIA
                return redirect()->route('conductores.index');
            }

        } else if($propietario->m_canuipe!==$request->m_canuipe) {
            
            //2-3 EL NUIP FUE MODIFICADO
            //2-4 CONSULTA PARA REVISAR QUE EL NUEVO NUIP NO ESTÉ YA EN LA TABLA
            $validar = Capmascp::where('m_canuipe',$request->m_canuipe)->get();
            if(count($validar)>0){
                
                //2-5 ERROR EL NUEVO NUIP YA ESTA EN LA TABLA
                //2-6 RESULTADO ERROR: MENSAJES
                $tit_men_res_err = 'Conductor: ';
                $tx1_men_res_err = ' '.$request->m_canuipe.' ';
                $tx2_men_res_err = ' '.$request->m_canombr.' ';
                $tx3_men_res_err = ' '.$request->m_cacodna.' ';
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
                return redirect()->route('conductores.index',['m_canuipe'=>$request->m_canuipe])->with($par_men_res_err);
                
            } else{
                
                //2-5 EL NUEVO NUIPE NO ESTA EN LA TABLA 
                $propietario = Capmascp::find($id);
                $propietario->m_canuipe = $request->m_canuipe;
                $propietario->m_nudiver = $request->m_nudiver;
                $propietario->m_nutipdo = $request->m_nutipdo;
                $propietario->m_canombr = $request->m_canombr;
                $propietario->m_caprnom = $request->m_caprnom;
                $propietario->m_casenom = $request->m_casenom;
                $propietario->m_caprape = $request->m_caprape;
                $propietario->m_caseape = $request->m_caseape;
                $propietario->m_cadirec = $request->m_cadirec;
                $propietario->m_nucociu = $request->m_nucociu;
                $propietario->m_catelfi = $request->m_catelfi;
                $propietario->m_camovil = $request->m_camovil;
                $propietario->m_casitew = $request->m_casitew;
                $propietario->m_cacorel = $request->m_cacorel;
                $propietario->m_caenvco = $request->m_caenvco;
                $propietario->m_cadacon = $request->m_cadacon;
                $propietario->m_caautna = $request->m_caautna;
                $propietario->m_cacodna = $request->m_cacodna;
                $propietario->m_caestad = $request->m_caestad;
                $propietario->m_fenacim = $request->m_fenacim;
                $propietario->m_nuedada = $request->m_nuedada;
                $propietario->m_catipsa = $request->m_catipsa;
                $propietario->m_catisex = $request->m_catisex;
                $propietario->m_nuofici = $request->m_nuofici;
                $propietario->m_caviemp = $request->m_caviemp;
                $propietario->m_caasoci = $request->m_caasoci;
                $propietario->m_fevinas = $request->m_fevinas;
                $propietario->m_caestas = $request->m_caestas;
                $propietario->m_feestas = $request->m_feestas;
                $propietario->m_cadeeas = $request->m_cadeeas;
                $propietario->m_caorpas = $request->m_caorpas;
                $propietario->m_capropi = $request->m_capropi;
                $propietario->m_fevinpr = $request->m_fevinpr;
                $propietario->m_caestpr = $request->m_caestpr;
                $propietario->m_feestpr = $request->m_feestpr;
                $propietario->m_cadeepr = $request->m_cadeepr;
                $propietario->m_caorppr = $request->m_caorppr;
                $propietario->m_cacondu = $request->m_cacondu;
                $propietario->m_fevinco = $request->m_fevinco;
                $propietario->m_caestco = $request->m_caestco;
                $propietario->m_feestco = $request->m_feestco;
                $propietario->m_cadeeco = $request->m_cadeeco;
                $propietario->m_caorpco = $request->m_caorpco;
                $propietario->m_feinsco = $request->m_feinsco;
                $propietario->m_fetesco = $request->m_fetesco;
                $propietario->m_feincon = $request->m_feincon;
                $propietario->m_nuexper = $request->m_nuexper;
                $propietario->m_nucocol = $request->m_nucocol;
                $propietario->m_nucocar = $request->m_nucocar;
                $propietario->m_nucogrt = $request->m_nucogrt;
                $propietario->m_cavehac = $request->m_caplaca; //m_cavehac
                $propietario->m_fevehac = $request->m_fevehac;
                $propietario->m_camovac = $request->m_camovac;
                $propietario->m_caorvco = $request->m_caorvco;
                $propietario->m_cavehan = $request->m_cavehan;
                $propietario->m_causact = Auth::user()->id;
                $propietario->save();

                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                $audi_editar = Captaudi::create([
                    'm_nuidope'=>$aud_idu_ope,
                    'm_canombr'=>$aud_nom_pag,
                    'm_callave'=>$request->m_canuipe,
                    'm_nuidusu'=>Auth::user()->id,
                    'm_cadeini'=>$con_dat_ini,
                    'm_cadefin'=>$propietario]);

                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Conductor: ';
                $tx1_men_res_cor = ' '.$request->m_canuipe.' ';
                $tx2_men_res_cor = ' '.$request->m_canombr.' ';
                $tx3_men_res_cor = ' '.$request->m_cacodna.' ';
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
                return redirect()->route('conductores.index')->with($par_men_res_cor);
            }
        }
    }

    //  8- ELIMINAR
    //Destroy: Función para eliminar registros en tabla
    public function destroy($id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 21;
        $aud_nom_pag = 'Conductores';

        //2- BUSCA EL REGISTRO POR EL ID POR SI YA HA SIDO ELIMINADO (SEGURIDAD)
        $propietario = Capmascp::find($id);
        if($propietario){
            //REGISTRO HALLADO EN LA TABLA - PUEDE ELIMINARLO

            //2-1 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Conductor: ';
            $tx1_men_res_cor = ' '.$propietario->m_canuipe.' ';
            $tx2_men_res_cor = ' '.$propietario->m_canombr.' ';
            $tx3_men_res_cor = ' '.$propietario->m_cacodna.' ';
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
            $aud_nom_pag = 'Conductores';
            $audi_borrar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_callave'=>$propietario->m_canuipe,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$propietario]);

            //2-4 ELIMINA REGISTRO
            $propietario->delete();

            //2-5 RESULTADO CORRECTO: ENVIA
            return redirect()->route('conductores.index')->with($par_men_res_cor);

        }else{
            //REGISTRO NO HALLADO EN LA TABLA
            
            //3-1 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Conductor: ';
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
            return redirect()->route('conductores.index')->with($par_men_res_err);
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
        $this->m_canuipe_filtro=$request->m_canuipe;
        $this->m_canombr_filtro=$request->m_canombr;
        $this->m_nucociu_filtro=$request->m_nucociu;
        $this->m_cadacon_filtro=$request->m_cadacon;
        $this->m_cacodna_filtro=$request->m_cacodna;
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;

        $propietarios = Capmascp::Nuipe($this->m_canuipe_filtro)->
                        nombre($this->m_canombr_filtro)->
                        Nombre_ciudad($this->m_nucociu_filtro)->
                        Nombre_contacto($this->m_cadacon_filtro)->
                        Codigo_nacional($this->m_cacodna_filtro)->
                        estado($this->m_caestad_filtro)->
                        usuario_registra($this->m_causreg_filtro)->
                        usuario_actualiza($this->m_causact_filtro)->
                        where('m_cacondu',"SI")->
                        orderBy($this->m_canombr_campos,$this->m_canombr_ordene)->get();
        
        $barra = new DNS1D();
        $pdf = \App::make('dompdf.wrapper');
        $vista = \view('admin.conductores.conductores.exportarpdf',compact('propietarios'))->render();
        $pdf->loadHTML($vista);
        // Obtiene fecha y hora actual 
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'conductores_'.$cadena_fecha_actual.'.pdf';
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
        $this->m_canuipe_filtro=$request->m_canuipe;
        $this->m_canombr_filtro=$request->m_canombr;
        $this->m_nucociu_filtro=$request->m_nucociu;
        $this->m_cadacon_filtro=$request->m_cadacon;
        $this->m_cacodna_filtro=$request->m_cacodna;
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;

        // Obtiene fecha y hora actual
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'conductores_'.$cadena_fecha_actual;

        Excel::create($nombre_archivo, function($excel) {
            $excel->sheet('conductores', function($sheet) {

                // 0- CONSULTA 
                $propietarios = Capmascp::Nuipe($this->m_canuipe_filtro)->
                    nombre($this->m_canombr_filtro)->
                    Nombre_ciudad($this->m_nucociu_filtro)->
                    Nombre_contacto($this->m_cadacon_filtro)->
                    Codigo_nacional($this->m_cacodna_filtro)->
                    estado($this->m_caestad_filtro)->
                    usuario_registra($this->m_causreg_filtro)->
                    usuario_actualiza($this->m_causact_filtro)->
                    where('m_cacondu',"SI")->
                    orderBy($this->m_canombr_campos,$this->m_canombr_ordene)->get();

                foreach($propietarios as $propietario){
                    $ciudad = Capmciud::where('m_nucodig',$propietario->m_nucociu)->first();
                    $departamento = Capmdepa::where('m_nucodig',$ciudad->m_nucodep)->first();
                    $pais = Capmpais::where('m_nucodig',$departamento->m_nucopai)->first();
                    $oficina_registro = Capmsucu::where('m_nucodig',$propietario->m_nuofici)->first();

                    $ciudad_x[]=$ciudad->m_canombr;
                    $departamento_x[]=$departamento->m_canombr;
                    $pais_x[]=$pais->m_canombr;
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
                $tit_con_sul = 'CONSULTA DE CONDUCTORES';

                // 20- TOTAL REGISTROS
                $tot_reg_ist = $propietarios->Count();
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
                foreach($propietarios as $index => $propietario) {

                    //      ESTILO
                    $sheet->Cells('A8:Z100000');
                    $sheet->row($index+8, function ($row) {
                        $row->setFontFamily('Arial');
                        $row->setFontSize(10);
                    });

                    if ($index) {
                            $sheet->row($index+8, [
                            $propietario->m_nucodig,
                            $propietario->m_canuipe, $propietario->m_nudiver,
                            $propietario->tiposdocumentos->m_canombr,
                            $propietario->m_canombr,
                            $propietario->m_caprnom, $propietario->m_casenom,
                            $propietario->m_caprape, $propietario->m_caseape,
                            $propietario->m_cadirec, $propietario->ciudades->m_canombr,
                            $departamento_x[$j],
                            $pais_x[$j],
                            $propietario->m_catelfi, $propietario->m_camovil, $propietario->m_casitew,
                            $propietario->m_cacorel, $propietario->m_cadacon, $propietario->m_caautna,
                            $propietario->m_cacodna, $propietario->m_caestad,
                            $propietario->m_caviemp, $propietario->oficina_registro->m_canombr,
                            $propietario->created_at, $propietario->usuario_registra->name,
                            $propietario->updated_at, $propietario->usuario_actualiza->name,
                        ]);
                    } else {
                        $sheet->row($index+8, [
                            $propietario->m_nucodig,
                            $propietario->m_canuipe, $propietario->m_nudiver,
                            $propietario->tiposdocumentos->m_canombr,
                            $propietario->m_canombr,
                            $propietario->m_caprnom, $propietario->m_casenom,
                            $propietario->m_caprape, $propietario->m_caseape,
                            $propietario->m_cadirec, $propietario->ciudades->m_canombr,
                            $departamento_x[$j],
                            $pais_x[$j],
                            $propietario->m_catelfi, $propietario->m_camovil, $propietario->m_casitew,
                            $propietario->m_cacorel, $propietario->m_cadacon, $propietario->m_caautna,
                            $propietario->m_cacodna, $propietario->m_caestad,
                            $propietario->m_caviemp, $propietario->oficina_registro->m_canombr,
                            $propietario->created_at, $propietario->usuario_registra->name,
                            $propietario->updated_at, $propietario->usuario_actualiza->name,
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

        return redirect()->route('conductores.index');
        
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
        $datos[0] = $cargo->m_canombr;
        $datos[1] = $division->m_canombr;
        return response()->json($datos);
    }

    //  12- VEHICULOS - PROPIETARIOS
    public function datosVehiculo(Request $request){
        //return $request->id;
        $vehiculo = Capmvehi::find($request->id);
        $valor = $vehiculo->m_caidpac;
        
        $propietarioVehiculo = DB::select('select * from Capmascp where m_nucodig = ?', [$valor]);
        $numeroVehiculo = DB::select('select * from Capmvehi where m_caidpac = ?', [$valor]);
        return response()->json([$propietarioVehiculo,$numeroVehiculo]);
    }

    public function guardarDocumentoPersona(Request $request){

        //return response()->json([$request->m_feexped]);
        $agregarDocumentoPersona = $request->input('agregarDocumentoPersona');
        if ($agregarDocumentoPersona == "true") {
            $m_nucodoc = (int)$request->input('m_nucodigo_d');
            $m_cainact = $request->input('m_cainact');
            $m_nudiapv = $request->input('m_nudiapv');
            $m_nuidper = (int)$request->input('m_id');
            $m_canombr = $request->input('nombreDocumento'); 
            $fechaActual = $request->input('fechaActual');
            $m_nuordoc = 0;
            $fechaVacia = "0000-00-00";

            //2- CONSULTA SI EL NUIP YA EXISTE
            $chequeoDocumento = Capmdopp::where([['m_nuidper','=',$m_nuidper],['m_nucodoc','=',$m_nucodoc]])->get();              
            if(count($chequeoDocumento)>0){
              return response()->json([false]); 
            }


            try {
                //2-1 EL NOMBRE NUEVO NO EXISTE
                //2-2 INSERTAR LOS DATOS
                $crearDocumentoPersona = Capmdopp::create([
                    'm_canombr' => $m_canombr,
                    'm_nucodoc' => $m_nucodoc,
                    'm_cainact' => $m_cainact,
                    'm_nudiapv' => $m_nudiapv,
                    'm_nuidper' => $m_nuidper,
                    'm_nuordoc' => $m_nuordoc,
                    'm_causreg'=>Auth::user()->id,
                    'm_causact'=>Auth::user()->id
                ]);

                return response()->json([$crearDocumentoPersona]); 
            } catch (ModelNotFoundException $exception) {
                return back()->withError($exception->getMessage())->withInput();
            }

        }else{
            $m_nucodig = (int)$request->input('m_nucodig');
            $documentosPersona = Capmdopp::find($m_nucodig);
            //2-1 BUSCA EL REGISTRO POR EL ID TOMA VALORES INICIALES (AUDITORIA)
            $con_dat_ini = Capmdopp::find($m_nucodig);

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

                //2-4 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
                $con_dat_fin = Capmdopp::find($m_nucodig);
                //2-5 COMPARA VALORES INICIALES VS VALORES FINALES
                if($con_dat_ini != $con_dat_fin){
                    return response()->json([true]); 
                }
            } catch (ModelNotFoundException $exception) {
                return back()->withError($exception->getMessage())->withInput();
            }

        }
    }

    public function eliminarDocumentoPersona(Request $request){
             
        $m_nucodig = (int)$request->input('id');
        $documentosPersona = Capmdopp::find($m_nucodig);

        try {
            //ELIMINAR REGISTRO DE LA TABLA DOCUMENTOS
            $documentosPersona->delete();

            return response()->json([$documentosPersona]); 
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

    }
    
    public function guardarSeguroPersona(Request $request){

        //return response()->json([$request->m_feexped]); 
        $agregarSeguroPersona = $request->input('agregarSeguroPersona');
        if ($agregarSeguroPersona == "true") {
            $m_nucodoc = (int)$request->input('m_nucodigo_s');
            $m_cainact = $request->input('m_cainact');
            $m_nudiapv = $request->input('m_nudiapv');
            $m_nuidper = (int)$request->input('m_id');
            $m_canombr = $request->input('nombreSeguro'); 
            $fechaActual = $request->input('fechaActual');
            $m_nuordoc = 0;
            $fechaVacia = "0000-00-00";

            //2- CONSULTA SI EL NUIP YA EXISTE
            $chequeoSeguro = Capmsepp::where([['m_nuidper','=',$m_nuidper],['m_nucodoc','=',$m_nucodoc]])->get();              
            if(count($chequeoSeguro)>0){
              return response()->json([false]); 
            }


            try {
                //2-1 EL NOMBRE NUEVO NO EXISTE
                //2-2 INSERTAR LOS DATOS
                $crearSeguroPersona = Capmsepp::create([
                    'm_canombr' => $m_canombr,
                    'm_nucodoc' => $m_nucodoc,
                    'm_cainact' => $m_cainact,
                    'm_nudiapv' => $m_nudiapv,
                    'm_nuidper' => $m_nuidper,
                    'm_nuordoc' => $m_nuordoc,
                    'm_causreg'=>Auth::user()->id,
                    'm_causact'=>Auth::user()->id
                ]);

                return response()->json([$crearSeguroPersona]); 
            } catch (ModelNotFoundException $exception) {
                return back()->withError($exception->getMessage())->withInput();
            }

        }else{
            $m_nucodig = (int)$request->input('m_nucodig');
            $SegurosPersona = Capmsepp::find($m_nucodig);
            //2-1 BUSCA EL REGISTRO POR EL ID TOMA VALORES INICIALES (AUDITORIA)
            $con_dat_ini = Capmsepp::find($m_nucodig);

            try {
                //AGREGRAR TODOS LOS CAMPOS DE LA TABLA SEGUROS
                $SegurosPersona->m_feexped = $request->m_feexped;
                $SegurosPersona->m_feinici = $request->m_feinici;
                $SegurosPersona->m_fevenci = $request->m_fevenci;
                $SegurosPersona->m_canumer = $request->m_canumer;
                $SegurosPersona->m_cacateg = $request->m_cacateg;
                $SegurosPersona->m_cadetal = $request->m_cadetal;
                $SegurosPersona->m_nucocie = $request->m_nucocie;
                $SegurosPersona->m_causact = Auth::user()->id;
                $SegurosPersona->save();

                //2-4 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
                $con_dat_fin = Capmsepp::find($m_nucodig);
                //2-5 COMPARA VALORES INICIALES VS VALORES FINALES
                if($con_dat_ini != $con_dat_fin){
                    return response()->json([true]); 
                }
            } catch (ModelNotFoundException $exception) {
                return back()->withError($exception->getMessage())->withInput();
            }

        }
    }

    public function eliminarSeguroPersona(Request $request){
             
        $m_nucodig = (int)$request->input('id');
        $segurosPersona = Capmsepp::find($m_nucodig);

        try {
            //ELIMINAR REGISTRO DE LA TABLA SEGUROS 
            $segurosPersona->delete();

            return response()->json([$segurosPersona]); 
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

    }

}
