<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           OficinasControler.php
//Descripción:      Oficinas
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
use App\Capmsucu;
use App\Capmciud;
use App\Capmdepa;
use App\Capmpais;
use App\Capmterm;
use App\Captaudi;
use App\User;

setlocale(LC_TIME,"es_ES"); date_default_timezone_set ('America/Bogota');

class OficinasController extends Controller
{

    //ORDENAMIENTO
    // ASCENDENTE - DESCENTE
    private $m_canombr_ordene="asc";
    // NOMBRE CAMPO
    private $m_canombr_campos="m_canombr";
    //FILTROS
    private $m_nucecon_filtro="";
    private $m_canombr_filtro="";
    private $m_nucociu_filtro="";
    private $m_nuidjof_filtro="";
    private $m_caidrev_filtro="";
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
            $m_nucecon_filtro="";
            $m_canombr_filtro="";
            $m_nucociu_filtro="";
            $m_nuidjof_filtro="";
            $m_caidrev_filtro="";
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
                $m_nucecon_filtro = $request->m_nucecon;
                $m_canombr_filtro = $request->m_canombr;
                $m_nucociu_filtro = $request->m_nucociu;
                $m_nuidjof_filtro = $request->m_nuidjof;
                $m_caidrev_filtro = $request->m_caidrev;
                $m_cacodna_filtro = $request->m_cacodna;
                $m_caestad_filtro = $request->m_caestad;
                $m_causreg_filtro = $request->m_causreg;
                $m_causact_filtro = $request->m_causact;
            }
            //  OFICINAS
            //Codigo_nacional($request->m_cacodna)->
            //estado($request->m_caestad)->
            $oficinas = Capmsucu::Centrocostos($request->m_nucecon)->
                nombre($request->m_canombr)->
                Nombre_ciudad($request->m_nucociu)->
                jefe_oficina($request->m_nuidjof)->
                revisor_oficina($request->m_nuidrev)->
                Terminal_Transporte($request->m_nucoter)->
                usuario_registra($request->m_causreg)->
                usuario_actualiza($request->m_causact)->
                orderBy($m_canombr_campos,$m_canombr_ordene)->paginate(20);

            foreach($oficinas as $oficina){
                $ciudad = Capmciud::where('m_nucodig',$oficina->m_nucociu)->first();
                $departamento = Capmdepa::where('m_nucodig',$ciudad->m_nucodep)->first();
                $pais = Capmpais::where('m_nucodig',$departamento->m_nucopai)->first();
                $oficina_registro = Capmsucu::where('m_nucodig',$oficina->m_nuofici)->first();

                $ciudad_x[]=$ciudad->m_canombr;
                $departamento_x[]=$departamento->m_canombr;
                $pais_x[]=$pais->m_canombr;
            }

            //  TIPOS DE DOCUMENTO
            //$tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  CIUDADES
            //$ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig','m_nucodep');
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

            $TerminalesTransporte = Capmterm::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  VISTA
            //return $oficinas;
            
            //return $request;
            //return $oficina_registro;
            //return $tiposdocumentos;
            
            return view('admin.programador.oficinas.index',
                compact('oficinas','ciudades','departamentos',
                        'paises','oficina_registro','ciudad_x','departamento_x','pais_x','usuarios',
                        'TerminalesTransporte',
                        'm_nucecon_filtro', 'm_canombr_filtro',
                        'm_nucociu_filtro', 'm_nuidjof_filtro',
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
        //$tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
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
        return view('admin.vehiculos.propietarios.crear',
                compact('departamentos','paises','oficina_registro','ciudades','usuarios'));
    }

    //  4- ALMACENAR
    //Store: Función para validar datos y luego insertarlos en tabla
    public function store(Request $request){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 1;
        $aud_nom_pag = 'Oficinas';

        //2- CONSULTA SI EL NUIP YA EXISTE
        $oficinas = Capmsucu::where('m_nucecon',$request->m_nucecon)->get();
        if(count($oficinas)>0){

            //2-1 EL NUEVO NOMBRE YA ESTA EN LA TABLA
            //2-2 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Oficina: ';
            $tx1_men_res_err = ' '.$request->m_nucecon.' ';
            $tx2_men_res_err = ' '.$request->m_canombr.' ';
            $tx3_men_res_err = ' '.$request->m_cacodna.' ';
            $tx4_men_res_err = '';
            $tx5_men_res_err = '';
            $fo1_men_res_err = 'Ya existe un registro con ese CENTRO DE COSTOS';
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
            return redirect()->route('oficinas.index',['m_nucecon'=>$request->m_nucecon])->with($par_men_res_err);
        }
        else{
            
            //2-1 EL NOMBRE NUEVO NO EXISTE
            //2-2 INSERTAR LOS DATOS
            $oficina = Capmsucu::create([
                'm_nucecon'=>$request->m_nucecon,
                'm_canombr'=>$request->m_canombr,
                'm_canomco'=>$request->m_canomco,
                'm_cadirec'=>$request->m_cadirec,
                'm_nucociu'=>$request->m_nucociu,
                'm_catelfi'=>$request->m_catelfi,
                'm_camovil'=>$request->m_camovil,
                'm_cacorel'=>$request->m_cacorel,
                'm_nuidjof'=>$request->m_nuidjof,
                'm_nuidrev'=>$request->m_nuidrev,
                'm_cacoco1'=>$request->m_cacoco1,
                'm_cacoco2'=>$request->m_cacoco2,
                'm_cacoco3'=>$request->m_cacoco3,
                'm_cacoco4'=>$request->m_cacoco4,
                'm_cacoco5'=>$request->m_cacoco5,
                'm_nucoter'=>$request->m_nucoter,
                'm_cacoter'=>$request->m_cacoter,
                'm_catoken'=>$request->m_catoken,
                'm_caizter'=>$request->m_caizter,
                'm_catiofi'=>$request->m_catiofi,
                'm_caclofi'=>$request->m_caclofi,
                'm_caproce'=>$request->m_caproce,
                'm_cacodna'=>$request->m_cacodna,
                'm_caestad'=>$request->m_caestad,
                'm_caencon'=>$request->m_caencon,
                'm_caencob'=>$request->m_caencob,
                'm_caencre'=>$request->m_caencre,
                'm_caencoi'=>$request->m_caencoi,
                'm_cagienv'=>$request->m_cagienv,
                'm_cagirec'=>$request->m_cagirec,
                'm_caticon'=>$request->m_caticon,
                'm_caticre'=>$request->m_caticre,
                'm_caticor'=>$request->m_caticor,
                'm_catirem'=>$request->m_catirem,
                'm_catiweb'=>$request->m_catiweb,
                'm_cativip'=>$request->m_cativip,
                'm_catides'=>$request->m_catides,
                'm_catimic'=>$request->m_catimic,
                'm_catires'=>$request->m_catires,
                'm_cativig'=>$request->m_cativig,
                'm_catiabo'=>$request->m_catiabo,
                'm_catidco'=>$request->m_catidco,
                'm_cacagdv'=>$request->m_cacagdv,
                'm_cacaegr'=>$request->m_cacaegr,
                'm_cacaing'=>$request->m_cacaing,
                'm_cacancr'=>$request->m_cacancr,
                'm_cacandb'=>$request->m_cacandb,
                'm_cacadma'=>$request->m_cacadma,
                'm_capradp'=>$request->m_capradp,
                'm_caprcco'=>$request->m_caprcco,
                'm_caprccu'=>$request->m_caprccu,
                'm_caprcgd'=>$request->m_caprcgd,
                'm_caprigi'=>$request->m_caprigi,
                'm_caprtan'=>$request->m_caprtan,
                'm_catttab'=>$request->m_catttab,
                'm_caprtdv'=>$request->m_caprtdv,
                'm_caprtdm'=>$request->m_caprtdm,
                'm_caprtcv'=>$request->m_caprtcv,
                'm_caprtpp'=>$request->m_caprtpp,
                'm_cappdav'=>$request->m_cappdav,
                'm_cappdaw'=>$request->m_cappdaw,
                'm_capdbal'=>$request->m_capdbal,
                'm_capdcam'=>$request->m_capdcam,
                'm_capdlhu'=>$request->m_capdlhu,
                'm_capdlrf'=>$request->m_capdlrf,
                'm_capdlnu'=>$request->m_capdlnu,
                'm_cargeco'=>$request->m_cargeco,
                'm_cargecb'=>$request->m_cargecb,
                'm_cargecr'=>$request->m_cargecr,
                'm_cargtco'=>$request->m_cargtco,
                'm_cargtcr'=>$request->m_cargtcr,
                'm_cargtrm'=>$request->m_cargtrm,
                'm_cargtwb'=>$request->m_cargtwb,
                'm_carggen'=>$request->m_carggen,
                'm_carggpa'=>$request->m_carggpa,
                'm_caimrea'=>$request->m_caimrea,
                'm_nuimrea'=>$request->m_nuimrea,
                'm_caimstb'=>$request->m_caimstb,
                'm_nuimstb'=>$request->m_nuimstb,
                'm_cacbcgv'=>$request->m_cacbcgv,
                'm_cacbceg'=>$request->m_cacbceg,
                'm_cacbcin'=>$request->m_cacbcin,
                'm_cacbcnc'=>$request->m_cacbcnc,
                'm_cacbcnd'=>$request->m_cacbcnd,
                'm_cacbeco'=>$request->m_cacbeco,
                'm_cacbecb'=>$request->m_cacbecb,
                'm_cacbecr'=>$request->m_cacbecr,
                'm_cacbeci'=>$request->m_cacbeci,
                'm_cacbepc'=>$request->m_cacbepc,
                'm_cacbtco'=>$request->m_cacbtco,
                'm_cacbtcr'=>$request->m_cacbtcr,
                'm_cacbtcs'=>$request->m_cacbtcs,
                'm_cacbtrm'=>$request->m_cacbtrm,
                'm_cacbtwb'=>$request->m_cacbtwb,
                'm_cacbtvp'=>$request->m_cacbtvp,
                'm_cacbtlv'=>$request->m_cacbtlv,
                'm_cacbpda'=>$request->m_cacbpda,
                'm_causreg'=>Auth::user()->id,
                'm_causact'=>Auth::user()->id
            ]);

            //2-3 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA) 
            $con_dat_ini = $oficina;

            //2-3 AUDITORIA: INSERTA REGISTRO POR NUEVO REGISTRO
            $audi_editar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_callave'=>$request->m_nucecon,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$con_dat_ini]);

            //2-4 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Oficina: ';
            $tx1_men_res_cor = ' '.$request->m_nucecon.' ';
            $tx2_men_res_cor = ' '.$request->m_canombr.' ';
            $tx3_men_res_cor = ' '.$request->m_cacodna.' ';
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
            return redirect()->route('oficinas.index')->with($par_men_res_cor);
        }
    }

    //  5- EDITAR 
    //Edit: Función para actualizar campos de registros
    public function edit($id){
        $oficina = Capmsucu::find($id);
        //$tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $oficina_registro = Capmsucu::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');

        //dd($oficina);

        //2-1 RESULTADOS: ENVIA
        return response()->json($oficina);
    }

    //  6- MOSTRAR
    //Show: Función para mostrar campos de registros
    public function show($id){
        $oficina = Capmsucu::find($id);
        //$tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $oficina_registro = Capmsucu::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //return response()->json($Oficina);
        return view('admin.vehiculos.propietarios.consultar',compact('propietario','ciudades','oficina_registro'));
    }
    
    //  7- ACTUALIZAR
    //Update: Función para validar y actualizar campos de registros en tabla
    public function update(Request $request, $id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 11;
        $aud_nom_pag = 'Oficinas';
        //2- BUSCA EL REGISTRO POR EL ID PARA VERIFICAR SI TIENE EL MISMO NUIP (LLAVE)
        $oficina = Capmsucu::find($id);

        //2-1 BUSCA EL REGISTRO POR EL ID TOMA VALORES INICIALES (AUDITORIA)
        $con_dat_ini = Capmsucu::find($id);

        //2-2 COMPARA CENTRO DE COSTOS (LLAVE) REGISTRO HALLADO CON CENTRO DE COSTOS (LLAVE) DE LA RESPUESTA
        if($oficina->m_nucecon==$request->m_nucecon){

            //2-3 CORRESPONDE AL MISMO CENTRO DE COSTOS (LLAVE) - NO FUE MODIFICADO - ACTUALIZA TODOS LOS CAMPOS
            $oficina = Capmsucu::find($id);
            $oficina->m_nucecon = $request->m_nucecon;
            $oficina->m_canombr = $request->m_canombr;
            $oficina->m_canomco = $request->m_canomco;
            $oficina->m_cadirec = $request->m_cadirec;
            $oficina->m_nucociu = $request->m_nucociu;
            $oficina->m_catelfi = $request->m_catelfi;
            $oficina->m_camovil = $request->m_camovil;
            $oficina->m_cacorel = $request->m_cacorel;
            $oficina->m_nuidjof = $request->m_nuidjof;
            $oficina->m_nuidrev = $request->m_nuidrev;
            $oficina->m_cacoco1 = $request->m_cacoco1;
            $oficina->m_cacoco2 = $request->m_cacoco2;
            $oficina->m_cacoco3 = $request->m_cacoco3;
            $oficina->m_cacoco4 = $request->m_cacoco4;
            $oficina->m_cacoco5 = $request->m_cacoco5;
            $oficina->m_nucoter = $request->m_nucoter;
            $oficina->m_cacoter = $request->m_cacoter;
            $oficina->m_catoken = $request->m_catoken;
            $oficina->m_caizter = $request->m_caizter;
            $oficina->m_catiofi = $request->m_catiofi;
            $oficina->m_caclofi = $request->m_caclofi;
            $oficina->m_caproce = $request->m_caproce;
            $oficina->m_cacodna = $request->m_cacodna;
            $oficina->m_caestad = $request->m_caestad;
            $oficina->m_caencon = $request->m_caencon;
            $oficina->m_caencob = $request->m_caencob;
            $oficina->m_caencre = $request->m_caencre;
            $oficina->m_caencoi = $request->m_caencoi;
            $oficina->m_cagienv = $request->m_cagienv;
            $oficina->m_cagirec = $request->m_cagirec;
            $oficina->m_caticon = $request->m_caticon;
            $oficina->m_caticre = $request->m_caticre;
            $oficina->m_caticor = $request->m_caticor;
            $oficina->m_catirem = $request->m_catirem;
            $oficina->m_catiweb = $request->m_catiweb;
            $oficina->m_cativip = $request->m_cativip;
            $oficina->m_catides = $request->m_catides;
            $oficina->m_catimic = $request->m_catimic;
            $oficina->m_catires = $request->m_catires;
            $oficina->m_cativig = $request->m_cativig;
            $oficina->m_catiabo = $request->m_catiabo;
            $oficina->m_catidco = $request->m_catidco;
            $oficina->m_cacagdv = $request->m_cacagdv;
            $oficina->m_cacaegr = $request->m_cacaegr;
            $oficina->m_cacaing = $request->m_cacaing;
            $oficina->m_cacancr = $request->m_cacancr;
            $oficina->m_cacandb = $request->m_cacandb;
            $oficina->m_cacadma = $request->m_cacadma;
            $oficina->m_capradp = $request->m_capradp;
            $oficina->m_caprcco = $request->m_caprcco;
            $oficina->m_caprccu = $request->m_caprccu;
            $oficina->m_caprcgd = $request->m_caprcgd;
            $oficina->m_caprigi = $request->m_caprigi;
            $oficina->m_caprtan = $request->m_caprtan;
            $oficina->m_catttab = $request->m_catttab;
            $oficina->m_caprtdv = $request->m_caprtdv;
            $oficina->m_caprtdm = $request->m_caprtdm;
            $oficina->m_caprtcv = $request->m_caprtcv;
            $oficina->m_caprtpp = $request->m_caprtpp;
            $oficina->m_cappdav = $request->m_cappdav;
            $oficina->m_cappdaw = $request->m_cappdaw;
            $oficina->m_capdbal = $request->m_capdbal;
            $oficina->m_capdcam = $request->m_capdcam;
            $oficina->m_capdlhu = $request->m_capdlhu;
            $oficina->m_capdlrf = $request->m_capdlrf;
            $oficina->m_capdlnu = $request->m_capdlnu;
            $oficina->m_cargeco = $request->m_cargeco;
            $oficina->m_cargecb = $request->m_cargecb;
            $oficina->m_cargecr = $request->m_cargecr;
            $oficina->m_cargtco = $request->m_cargtco;
            $oficina->m_cargtcr = $request->m_cargtcr;
            $oficina->m_cargtrm = $request->m_cargtrm;
            $oficina->m_cargtwb = $request->m_cargtwb;
            $oficina->m_carggen = $request->m_carggen;
            $oficina->m_carggpa = $request->m_carggpa;
            $oficina->m_caimrea = $request->m_caimrea;
            $oficina->m_nuimrea = $request->m_nuimrea;
            $oficina->m_caimstb = $request->m_caimstb;
            $oficina->m_nuimstb = $request->m_nuimstb;
            $oficina->m_cacbcgv = $request->m_cacbcgv;
            $oficina->m_cacbceg = $request->m_cacbceg;
            $oficina->m_cacbcin = $request->m_cacbcin;
            $oficina->m_cacbcnc = $request->m_cacbcnc;
            $oficina->m_cacbcnd = $request->m_cacbcnd;
            $oficina->m_cacbeco = $request->m_cacbeco;
            $oficina->m_cacbecb = $request->m_cacbecb;
            $oficina->m_cacbecr = $request->m_cacbecr;
            $oficina->m_cacbeci = $request->m_cacbeci;
            $oficina->m_cacbepc = $request->m_cacbepc;
            $oficina->m_cacbtco = $request->m_cacbtco;
            $oficina->m_cacbtcr = $request->m_cacbtcr;
            $oficina->m_cacbtcs = $request->m_cacbtcs;
            $oficina->m_cacbtrm = $request->m_cacbtrm;
            $oficina->m_cacbtwb = $request->m_cacbtwb;
            $oficina->m_cacbtvp = $request->m_cacbtvp;
            $oficina->m_cacbtlv = $request->m_cacbtlv;
            $oficina->m_cacbpda = $request->m_cacbpda;
            $oficina->m_causact = Auth::user()->id;
            $oficina->save();
            
            //2-4 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_fin = Capmsucu::find($id);

            //2-5 COMPARA VALORES INICIALES VS VALORES FINALES
            if($con_dat_ini != $con_dat_fin){
                
                //CAMBIOS HALLADOS EN VALORES DE CAMPOS
                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                $audi_editar = Captaudi::create([
                    'm_nuidope'=>$aud_idu_ope,
                    'm_canombr'=>$aud_nom_pag,
                    'm_callave'=>$request->m_nucecon,
                    'm_nuidusu'=>Auth::user()->id,
                    'm_cadeini'=>$con_dat_ini,
                    'm_cadefin'=>$con_dat_fin]);
            
                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Oficina: ';
                $tx1_men_res_cor = ' '.$request->m_nucecon.' ';
                $tx2_men_res_cor = ' '.$request->m_canombr.' ';
                $tx3_men_res_cor = ' '.$request->m_cacodna.' ';
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
                return redirect()->route('oficinas.index')->with($par_men_res_cor);
                
            } else{
                // NO HALLO CAMBIOS EN VALORES DE CAMPOS: ENVIA
                return redirect()->route('oficinas.index');
            }

        } else if($oficina->m_nucecon!==$request->m_nucecon) {
            
            //2-3 EL CENTRO DE COSTOS FUE MODIFICADO
            //2-4 CONSULTA PARA REVISAR QUE EL NUEVO CENTRO DE COSTOS NO ESTÉ YA EN LA TABLA
            $validar = Capmsucu::where('m_nucecon',$request->m_nucecon)->get();
            if(count($validar)>0){
                
                //2-5 ERROR EL NUEVO CENTRO DE COSTOS YA ESTA EN LA TABLA
                //2-6 RESULTADO ERROR: MENSAJES
                $tit_men_res_err = 'Oficina: ';
                $tx1_men_res_err = ' '.$request->m_nucecon.' ';
                $tx2_men_res_err = ' '.$request->m_canombr.' ';
                $tx3_men_res_err = ' '.$request->m_cacodna.' ';
                $tx4_men_res_err = '';
                $tx5_men_res_err = '';
                $fo1_men_res_err = 'Ya existe un registro con ese CENTRO DE COSTOS';
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
                return redirect()->route('oficinas.index',['m_nucecon'=>$request->m_nucecon])->with($par_men_res_err);
                
            } else{
                
                //2-5 EL NUEVO CENTRO DE COSTOS NO ESTA EN LA TABLA
                $oficina = Capmsucu::find($id);
                $oficina->m_nucecon = $request->m_nucecon;
                $oficina->m_canombr = $request->m_canombr;
                $oficina->m_canomco = $request->m_canomco;
                $oficina->m_cadirec = $request->m_cadirec;
                $oficina->m_nucociu = $request->m_nucociu;
                $oficina->m_catelfi = $request->m_catelfi;
                $oficina->m_camovil = $request->m_camovil;
                $oficina->m_cacorel = $request->m_cacorel;
                $oficina->m_nuidjof = $request->m_nuidjof;
                $oficina->m_nuidrev = $request->m_nuidrev;
                $oficina->m_cacoco1 = $request->m_cacoco1;
                $oficina->m_cacoco2 = $request->m_cacoco2;
                $oficina->m_cacoco3 = $request->m_cacoco3;
                $oficina->m_cacoco4 = $request->m_cacoco4;
                $oficina->m_cacoco5 = $request->m_cacoco5;
                $oficina->m_nucoter = $request->m_nucoter;
                $oficina->m_cacoter = $request->m_cacoter;
                $oficina->m_catoken = $request->m_catoken;
                $oficina->m_caizter = $request->m_caizter;
                $oficina->m_catiofi = $request->m_catiofi;
                $oficina->m_caclofi = $request->m_caclofi;
                $oficina->m_caproce = $request->m_caproce;
                $oficina->m_cacodna = $request->m_cacodna;
                $oficina->m_caestad = $request->m_caestad;
                $oficina->m_caencon = $request->m_caencon;
                $oficina->m_caencob = $request->m_caencob;
                $oficina->m_caencre = $request->m_caencre;
                $oficina->m_caencoi = $request->m_caencoi;
                $oficina->m_cagienv = $request->m_cagienv;
                $oficina->m_cagirec = $request->m_cagirec;
                $oficina->m_caticon = $request->m_caticon;
                $oficina->m_caticre = $request->m_caticre;
                $oficina->m_caticor = $request->m_caticor;
                $oficina->m_catirem = $request->m_catirem;
                $oficina->m_catiweb = $request->m_catiweb;
                $oficina->m_cativip = $request->m_cativip;
                $oficina->m_catides = $request->m_catides;
                $oficina->m_catimic = $request->m_catimic;
                $oficina->m_catires = $request->m_catires;
                $oficina->m_cativig = $request->m_cativig;
                $oficina->m_catiabo = $request->m_catiabo;
                $oficina->m_catidco = $request->m_catidco;
                $oficina->m_cacagdv = $request->m_cacagdv;
                $oficina->m_cacaegr = $request->m_cacaegr;
                $oficina->m_cacaing = $request->m_cacaing;
                $oficina->m_cacancr = $request->m_cacancr;
                $oficina->m_cacandb = $request->m_cacandb;
                $oficina->m_cacadma = $request->m_cacadma;
                $oficina->m_capradp = $request->m_capradp;
                $oficina->m_caprcco = $request->m_caprcco;
                $oficina->m_caprccu = $request->m_caprccu;
                $oficina->m_caprcgd = $request->m_caprcgd;
                $oficina->m_caprigi = $request->m_caprigi;
                $oficina->m_caprtan = $request->m_caprtan;
                $oficina->m_catttab = $request->m_catttab;
                $oficina->m_caprtdv = $request->m_caprtdv;
                $oficina->m_caprtdm = $request->m_caprtdm;
                $oficina->m_caprtcv = $request->m_caprtcv;
                $oficina->m_caprtpp = $request->m_caprtpp;
                $oficina->m_cappdav = $request->m_cappdav;
                $oficina->m_cappdaw = $request->m_cappdaw;
                $oficina->m_capdbal = $request->m_capdbal;
                $oficina->m_capdcam = $request->m_capdcam;
                $oficina->m_capdlhu = $request->m_capdlhu;
                $oficina->m_capdlrf = $request->m_capdlrf;
                $oficina->m_capdlnu = $request->m_capdlnu;
                $oficina->m_cargeco = $request->m_cargeco;
                $oficina->m_cargecb = $request->m_cargecb;
                $oficina->m_cargecr = $request->m_cargecr;
                $oficina->m_cargtco = $request->m_cargtco;
                $oficina->m_cargtcr = $request->m_cargtcr;
                $oficina->m_cargtrm = $request->m_cargtrm;
                $oficina->m_cargtwb = $request->m_cargtwb;
                $oficina->m_carggen = $request->m_carggen;
                $oficina->m_carggpa = $request->m_carggpa;
                $oficina->m_caimrea = $request->m_caimrea;
                $oficina->m_nuimrea = $request->m_nuimrea;
                $oficina->m_caimstb = $request->m_caimstb;
                $oficina->m_nuimstb = $request->m_nuimstb;
                $oficina->m_cacbcgv = $request->m_cacbcgv;
                $oficina->m_cacbceg = $request->m_cacbceg;
                $oficina->m_cacbcin = $request->m_cacbcin;
                $oficina->m_cacbcnc = $request->m_cacbcnc;
                $oficina->m_cacbcnd = $request->m_cacbcnd;
                $oficina->m_cacbeco = $request->m_cacbeco;
                $oficina->m_cacbecb = $request->m_cacbecb;
                $oficina->m_cacbecr = $request->m_cacbecr;
                $oficina->m_cacbeci = $request->m_cacbeci;
                $oficina->m_cacbepc = $request->m_cacbepc;
                $oficina->m_cacbtco = $request->m_cacbtco;
                $oficina->m_cacbtcr = $request->m_cacbtcr;
                $oficina->m_cacbtcs = $request->m_cacbtcs;
                $oficina->m_cacbtrm = $request->m_cacbtrm;
                $oficina->m_cacbtwb = $request->m_cacbtwb;
                $oficina->m_cacbtvp = $request->m_cacbtvp;
                $oficina->m_cacbtlv = $request->m_cacbtlv;
                $oficina->m_cacbpda = $request->m_cacbpda;
                $oficina->m_causact = Auth::user()->id;
                $oficina->save();

                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                $audi_editar = Captaudi::create([
                    'm_nuidope'=>$aud_idu_ope,
                    'm_canombr'=>$aud_nom_pag,
                    'm_callave'=>$request->m_nucecon,
                    'm_nuidusu'=>Auth::user()->id,
                    'm_cadeini'=>$con_dat_ini,
                    'm_cadefin'=>$oficina]);

                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Oficina: ';
                $tx1_men_res_cor = ' '.$request->m_nucecon.' ';
                $tx2_men_res_cor = ' '.$request->m_canombr.' ';
                $tx3_men_res_cor = ' '.$request->m_cacodna.' ';
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
                return redirect()->route('oficinas.index')->with($par_men_res_cor);
            }
        }
    }

    //  8- ELIMINAR
    //Destroy: Función para eliminar registros en tabla
    public function destroy($id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 21;
        $aud_nom_pag = 'Oficinas';

        //2- BUSCA EL REGISTRO POR EL ID POR SI YA HA SIDO ELIMINADO (SEGURIDAD)
        $oficina = Capmsucu::find($id);
        if($oficina){
            //REGISTRO HALLADO EN LA TABLA - PUEDE ELIMINARLO

            //2-1 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Oficina: ';
            $tx1_men_res_cor = ' '.$oficina->m_nucecon.' ';
            $tx2_men_res_cor = ' '.$oficina->m_canombr.' ';
            $tx3_men_res_cor = ' '.$oficina->m_cacodna.' ';
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
            $aud_nom_pag = 'Oficinas';
            $audi_borrar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_callave'=>$oficina->m_nucecon,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$oficina]);

            //2-4 ELIMINA REGISTRO
            $oficina->delete();

            //2-5 RESULTADO CORRECTO: ENVIA
            return redirect()->route('oficinas.index')->with($par_men_res_cor);

        }else{
            //REGISTRO NO HALLADO EN LA TABLA
            
            //3-1 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Oficina: ';
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
            return redirect()->route('oficinas.index')->with($par_men_res_err);
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
        $this->m_nucecon_filtro=$request->m_nucecon;
        $this->m_canombr_filtro=$request->m_canombr;
        $this->m_nucociu_filtro=$request->m_nucociu;
        $this->m_nuidjof_filtro=$request->m_nuidjof;
        $this->m_cacodna_filtro=$request->m_cacodna;
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;

        $oficinas = Capmsucu::Centrocostos($this->m_nucecon_filtro)->
                        nombre($this->m_canombr_filtro)->
                        Nombre_ciudad($this->m_nucociu_filtro)->
                        estado($this->m_caestad_filtro)->
                        usuario_registra($this->m_causreg_filtro)->
                        usuario_actualiza($this->m_causact_filtro)->
                        orderBy($this->m_canombr_campos,$this->m_canombr_ordene)->get();
        
        $barra = new DNS1D();
        $pdf = \App::make('dompdf.wrapper');
        $vista = \view('admin.programador.oficinas.exportarpdf',compact('oficinas'))->render();
        $pdf->loadHTML($vista);
        // Obtiene fecha y hora actual 
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'oficinas_'.$cadena_fecha_actual.'.pdf';
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
        $this->m_nucecon_filtro=$request->m_nucecon;
        $this->m_canombr_filtro=$request->m_canombr;
        $this->m_nucociu_filtro=$request->m_nucociu;
        $this->m_nuidjof_filtro=$request->m_nuidjof;
        $this->m_cacodna_filtro=$request->m_cacodna;
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;

        
        // Obtiene fecha y hora actual
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'oficinas_'.$cadena_fecha_actual;

        Excel::create($nombre_archivo, function($excel) {
            $excel->sheet('Oficinas', function($sheet) {

                // 0- CONSULTA 
                $oficinas = Capmsucu::Centrocostos($this->m_nucecon_filtro)->
                    nombre($this->m_canombr_filtro)->
                    Nombre_ciudad($this->m_nucociu_filtro)->
                    estado($this->m_caestad_filtro)->
                    usuario_registra($this->m_causreg_filtro)->
                    usuario_actualiza($this->m_causact_filtro)->
                    orderBy($this->m_canombr_campos,$this->m_canombr_ordene)->get();

                foreach($oficinas as $oficina){
                    $ciudad = Capmciud::where('m_nucodig',$oficina->m_nucociu)->first();
                    $departamento = Capmdepa::where('m_nucodig',$ciudad->m_nucodep)->first();
                    $pais = Capmpais::where('m_nucodig',$departamento->m_nucopai)->first();
                    $oficina_registro = Capmsucu::where('m_nucodig',$oficina->m_nuofici)->first();

                    $ciudad_x[]=$ciudad->m_canombr;
                    $departamento_x[]=$departamento->m_canombr;
                    $pais_x[]=$pais->m_canombr;
                }

                // 1- EMPRESA RAZON SOCIAL
                $emp_raz_soc = Auth::user()->empresa->m_carazso;
                // 2- EMPRESA NUIPE
                $emp_nui_pes = Auth::user()->empresa->m_nucecon;
                // 3- OFICINA NOMBRE
                $ofi_nom_bre = Auth::user()->oficina->m_canombr;
                // 4- OFICINA UBICACION REGIONAL - VARIABLE GLOBAL
                //      Session::get('glo_ofi_ubi_reg'
                // 5- APLICATIVO NOMBRE
                $app_nom_bre = 'mistiquetes.com';
                // 6- TITULO CONSULTA
                $tit_con_sul = 'CONSULTA DE OFICINAS';

                // 20- TOTAL REGISTROS
                $tot_reg_ist = $oficinas->Count();
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
                $sheet->mergeCells('A6:U6');
                $sheet->row(6, function ($row) {
                    $row->setFontFamily('Arial');
                    $row->setFontSize(12);
                });

                // ENCABEZADOS
                $sheet->row(7, [
                        'Identificador', 'Centro de costos',
                        'Oficina',
                        'Dirección','Ciudad','Departamento','País',
                        'Telefóno fijo', 'Telefóno móvil',
                        'Correo electrónico',
                        'Código nacional', 'Estado',
                        'Registro', 'Usuario', 'actualizado', 'Usuario',
                        'Total registros', 'Generado fecha - hora', 'Generado usuario', 'Noticia'
                    ]);

                //      ESTILO
                $sheet->Cells('A7:T7');
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
                foreach($oficinas as $index => $oficina) {

                    //      ESTILO
                    $sheet->Cells('A8:Z100000');
                    $sheet->row($index+8, function ($row) {
                        $row->setFontFamily('Arial');
                        $row->setFontSize(10);
                    });

                    if ($index) {
                            $sheet->row($index+8, [
                            $oficina->m_nucodig,
                            $oficina->m_nucecon,
                            $oficina->m_canombr,
                            $oficina->m_cadirec, $oficina->ciudades->m_canombr,
                            $departamento_x[$j],
                            $pais_x[$j],
                            $oficina->m_catelfi, $oficina->m_camovil,
                            $oficina->m_cacorel, $oficina->m_nuidjof,
                            $oficina->m_caestad,
                            $oficina->created_at, $oficina->usuario_registra->name,
                            $oficina->updated_at, $oficina->usuario_actualiza->name,
                        ]);
                    } else {
                        $sheet->row($index+8, [
                            $oficina->m_nucodig,
                            $oficina->m_nucecon,
                            $oficina->m_canombr,
                            $oficina->m_cadirec, $oficina->ciudades->m_canombr,
                            $departamento_x[$j],
                            $pais_x[$j],
                            $oficina->m_catelfi, $oficina->m_camovil,
                            $oficina->m_cacorel, $oficina->m_nuidjof, $oficina->m_caautna,
                            $oficina->m_caestad,
                            $oficina->created_at, $oficina->usuario_registra->name,
                            $oficina->updated_at, $oficina->usuario_actualiza->name,
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

        return redirect()->route('oficinas.index');
        
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
