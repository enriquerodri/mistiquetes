<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           UsuariosControler.php
//Descripción:      Usuarios
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
use App\User;
use App\Users;
use App\Capmtido;
use App\Capmpais;
use App\Capmdepa;
use App\Capmciud;
use App\Capmsucu;
use App\Campcarg;
use App\Capmdivi;
use App\Captaudi;
use App\Capmreep;

setlocale(LC_TIME,"es_ES"); date_default_timezone_set ('America/Bogota');

class UsuariosController extends Controller

{
    //ORDENAMIENTO
    // ASCENDENTE - DESCENTE
    private $m_canombr_ordene="asc";
    // NOMBRE CAMPO
    private $m_canombr_campos="name";
    //FILTROS
    private $m_canuipe_filtro="";
    private $m_canombr_filtro="";
    private $m_nucociu_filtro="";
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
            $m_canombr_campos="name";
            // LIMPIA FILTROS
            $m_canuipe_filtro="";
            $m_canombr_filtro="";
            $m_nucociu_filtro="";
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
                    $m_canombr_campos = "name";
                else
                    $m_canombr_campos = $request->m_canombr_campos;
                // FILTROS
                $m_canuipe_filtro = $request->m_canuipe;
                $m_canombr_filtro = $request->m_canombr;
                $m_nucociu_filtro = $request->m_nucociu;
                $m_caestad_filtro = $request->m_caestad;
                $m_causreg_filtro = $request->m_causreg;
                $m_causact_filtro = $request->m_causact;
            }
            //  USUAIROS
            $usuarios = Users::Nuipe($request->m_canuipe)->
                nombre($request->m_canombr)->
                Nombre_ciudad($request->m_nucociu)->
                usuario_registra($request->m_causreg)->
                usuario_actualiza($request->m_causact)->
                orderBy($m_canombr_campos,$m_canombr_ordene)->paginate(20);

            //dd($usuarios);

            foreach($usuarios as $usuario){
                $oficinas = Capmsucu::where('m_nucodig',$usuario->m_nuofici)->first();
                $ciudad = Capmciud::where('m_nucodig',$usuario->m_nucociu)->first();
                $departamento = Capmdepa::where('m_nucodig',$ciudad->m_nucodep)->first();
                $pais = Capmpais::where('m_nucodig',$departamento->m_nucopai)->first();
                $oficina_registro = Capmsucu::where('m_nucodig',$usuario->m_nuofici)->first();

                $ciudad_x[]=$ciudad->m_canombr;
                $departamento_x[]=$departamento->m_canombr;
                $pais_x[]=$pais->m_canombr;
            }

            //  OFICINAS
            $oficina = Capmsucu::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  TIPOS DE DOCUMENTO
            $tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
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
            $usuariosRegAct = Users::orderBy('name','asc')->pluck('name','id');
            //  VISTA 

            return view('admin.programador.usuarios.index',
                compact('oficina','tiposdocumentos','ciudades','departamentos',
                        'paises','oficina_registro','ciudad_x','departamento_x','pais_x','usuarios',
                        'm_canuipe_filtro', 'm_canombr_filtro',
                        'm_nucociu_filtro',
                        'm_caestad_filtro',
                        'm_causreg_filtro', 'm_causact_filtro','usuariosRegAct',
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
        $usuariosRegAct = Users::orderBy('name','asc')->pluck('name','id');
        //  VISTA
        return view('admin.programador.usarios.crear',
                compact('tiposdocumentos','departamentos','paises','oficina_registro','ciudades','usuariosRegAct'));
    }

    //  4- ALMACENAR
    //Store: Función para validar datos y luego insertarlos en tabla
    public function store(Request $request){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 1;
        $aud_nom_pag = 'Usuarios';

        //2- CONSULTA SI EL NUIP YA EXISTE
        $usuarios = Users::where('m_canuipe',$request->m_canuipe)->get();
        if(count($usuarios)>0){

            //2-1 EL NUEVO NOMBRE YA ESTA EN LA TABLA
            //2-2 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Usuario: ';
            $tx1_men_res_err = ' '.$request->m_canuipe.' ';
            $tx2_men_res_err = ' '.$request->m_canombr.' ';
            $tx3_men_res_err = ' ';
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
            return redirect()->route('usuarios.index',['m_canuipe'=>$request->m_canuipe])->with($par_men_res_err);
        }
        else{
            
            

            //2-1 EL NOMBRE NUEVO NO EXISTE
            //2-2 INSERTAR LOS DATOS
            $usuario = Users::create([
                'm_canuipe'=>$request->m_canuipe,
                'm_nudiver'=>$request->m_nudiver,
                'm_nutipdo'=>$request->m_nutipdo,
                'name'=>$request->name,
                'm_caprnom'=>$request->m_caprnom,
                'm_casenom'=>$request->m_casenom,
                'm_caprape'=>$request->m_caprape,
                'm_caseape'=>$request->m_caseape,
                'm_fenacim'=>$request->m_fenacim,
                'm_nuedada'=>$request->m_nuedada,
                'm_catipsa'=>$request->m_catipsa,
                'm_catisex'=>$request->m_catisex,
                'm_cadirec'=>$request->m_cadirec,
                'm_nucociu'=>$request->m_nucociu,
                'm_catelfi'=>$request->m_catelfi,
                'm_camovil'=>$request->m_camovil,
                'm_nuofici'=>$request->m_nuofici,
                'm_nucocar'=>$request->m_nucocar,
                'm_caestad'=>$request->m_caestad,
                'm_canivel'=>$request->m_canivel,
                'm_feinici'=>$request->m_feinici,
                'm_fevenci'=>$request->m_fevenci,
                'email'=>$request->email,
                'm_caprenu'=>$request->m_caprenu,
                'm_capreed'=>$request->m_capreed,
                'm_capreel'=>$request->m_capreel,
                'm_capreex'=>$request->m_capreex,
                'm_capreep'=>$request->m_capreep,
                'm_capap01'=>$request->m_capap01,
                'm_capap02'=>$request->m_capap02,
                'm_capap03'=>$request->m_capap03,
                'm_capap04'=>$request->m_capap04,
                'm_capap05'=>$request->m_capap05,
                'm_capap06'=>$request->m_capap06,
                'm_capap07'=>$request->m_capap07,
                'm_capap08'=>$request->m_capap08,
                'm_capap09'=>$request->m_capap09,
                'm_capap10'=>$request->m_capap10,
                'm_capap11'=>$request->m_capap11,
                'm_capap12'=>$request->m_capap12,
                'm_capap13'=>$request->m_capap13,
                'm_capap14'=>$request->m_capap14,
                'm_capap15'=>$request->m_capap15,
                'm_capap16'=>$request->m_capap16,
                'm_capap17'=>$request->m_capap17,
                'm_capap18'=>$request->m_capap18,
                'm_capap19'=>$request->m_capap19,
                'm_capap20'=>$request->m_capap20,
                'm_capap21'=>$request->m_capap21,
                'm_capap22'=>$request->m_capap22,
                'm_capap23'=>$request->m_capap23,
                'm_capap24'=>$request->m_capap24,
                'm_capap25'=>$request->m_capap25,
                'm_capapus'=>$request->m_capapus,
                'm_capauco'=>$request->m_capauco,
                'm_capacgv'=>$request->m_capacgv,
                'm_capaceg'=>$request->m_capaceg,
                'm_capacin'=>$request->m_capacin,
                'm_capacnc'=>$request->m_capacnc,
                'm_capacnd'=>$request->m_capacnd,
                'm_capaeco'=>$request->m_capaeco,
                'm_capaecb'=>$request->m_capaecb,
                'm_capaecr'=>$request->m_capaecr,
                'm_capaeci'=>$request->m_capaeci,
                'm_capaepc'=>$request->m_capaepc,
                'm_capagen'=>$request->m_capagen,
                'm_capagpa'=>$request->m_capagpa,
                'm_capatco'=>$request->m_capatco,
                'm_capatcr'=>$request->m_capatcr,
                'm_capatca'=>$request->m_capatca,
                'm_capatrm'=>$request->m_capatrm,
                'm_capatwb'=>$request->m_capatwb,
                'm_capatrv'=>$request->m_capatrv,
                'm_capaldv'=>$request->m_capaldv,
                'm_capabti'=>$request->m_capabti,
                'm_capreti'=>$request->m_capreti,
                'm_capvdtm'=>$request->m_capvdtm,
                'm_caprpoa'=>$request->m_caprpoa,
                'm_caprpop'=>$request->m_caprpop,
                'm_caprpva'=>$request->m_caprpva,
                'm_caprpvp'=>$request->m_caprpvp,
                'm_caprplo'=>$request->m_caprplo,
                'm_caprtlo'=>$request->m_caprtlo,
                'm_caprtli'=>$request->m_caprtli,
                'm_caprrgv'=>$request->m_caprrgv,
                'm_capcc01'=>$request->m_capcc01,
                'm_capcc02'=>$request->m_capcc02,
                'm_capcc03'=>$request->m_capcc03,
                'm_capcc04'=>$request->m_capcc04,
                'm_capcavt'=>$request->m_capcavt,
                'm_capcius'=>$request->m_capcius,
                'm_nuplenc'=>$request->m_nuplenc,
                'm_nuplgir'=>$request->m_nuplgir,
                'm_nupltiq'=>$request->m_nupltiq,
                'm_nuplotr'=>$request->m_nuplotr,
                'm_nucoemp'=>$request->m_nucoemp,
                'm_causreg'=>Auth::user()->id,
                'm_causact'=>Auth::user()->id,
                'updated_at'=>new DateTime();;
            ]);
            
            //2-3 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_ini = $usuario;

            //2-3 AUDITORIA: INSERTA REGISTRO POR NUEVO REGISTRO
            $audi_editar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_callave'=>$request->m_canuipe,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$con_dat_ini]);

            //2-4 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Usuario: ';
            $tx1_men_res_cor = ' '.$request->m_canuipe.' ';
            $tx2_men_res_cor = ' '.$request->m_canombr.' ';
            $tx3_men_res_cor = ' ';
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
            return redirect()->route('usuarios.index')->with($par_men_res_cor);
        }
    }    


    //  5- EDITAR 
    //Edit: Función para actualizar campos de registros
    public function edit($id){
        alert('entro');
        $usuario = Users::find($id);
        $tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $oficina_registro = Capmsucu::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');

        //dd($usuario);

        //2-1 RESULTADOS: ENVIA
        return response()->json($usuario);
    }

    //  6- MOSTRAR
    //Show: Función para mostrar campos de registros
    public function show($id){
        $usuarios = Users::find($id);
        $tiposdocumentos = Capmtido::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $departamentos = Capmdepa::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        $oficina_registro = Capmsucu::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
        //return response()->json($usuario);
        return view('admin.programador.usuarios.consultar',compact('usuarios','tiposdocumentos','ciudades','oficina_registro'));
    }
    
    //  7- ACTUALIZAR
    //Update: Función para validar y actualizar campos de registros en tabla
    public function update(Request $request, $id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 11;
        $aud_nom_pag = 'Usuarios';
        //2- BUSCA EL REGISTRO POR EL ID PARA VERIFICAR SI TIENE EL MISMO NUIP (LLAVE)
        $usuario = Users::find($id);

        //2-1 BUSCA EL REGISTRO POR EL ID TOMA VALORES INICIALES (AUDITORIA)
        $con_dat_ini = Users::find($id);

        //2-2 COMPARA NUIP (LLAVE) REGISTRO HALLADO CON NUIP (LLAVE) DE LA RESPUESTA
        if($usuario->m_canuipe==$request->m_canuipe){

            //2-3 CORRESPONDE AL MISMO NUIP (LLAVE) - NO FUE MODIFICADO - ACTUALIZA TODOS LOS CAMPOS
            $usuario = Users::find($id);
            $usuario->m_canuipe = $request->m_canuipe;
            $usuario->m_nudiver = $request->m_nudiver;
            $usuario->m_nutipdo = $request->m_nutipdo;
            $usuario->name = $request->name;
            $usuario->m_caprnom = $request->m_caprnom;
            $usuario->m_casenom = $request->m_casenom;
            $usuario->m_caprape = $request->m_caprape;
            $usuario->m_caseape = $request->m_caseape;
            $usuario->m_fenacim = $request->m_fenacim;
            $usuario->m_nuedada = $request->m_nuedada;
            $usuario->m_catipsa = $request->m_catipsa;
            $usuario->m_catisex = $request->m_catisex;
            $usuario->m_cadirec = $request->m_cadirec;
            $usuario->m_nucociu = $request->m_nucociu;
            $usuario->m_catelfi = $request->m_catelfi;
            $usuario->m_camovil = $request->m_camovil;
            $usuario->m_nuofici = $request->m_nuofici;
            $usuario->m_nucocar = $request->m_nucocar;
            $usuario->m_caestad = $request->m_caestad;
            $usuario->m_canivel = $request->m_canivel;
            $usuario->m_feinici = $request->m_feinici;
            $usuario->m_fevenci = $request->m_fevenci;
            $usuario->email = $request->email;
            $usuario->m_caprenu = $request->m_caprenu;
            $usuario->m_capreed = $request->m_capreed;
            $usuario->m_capreel = $request->m_capreel;
            $usuario->m_capreex = $request->m_capreex;
            $usuario->m_capreep = $request->m_capreep;
            $usuario->m_capap01 = $request->m_capap01;
            $usuario->m_capap02 = $request->m_capap02;
            $usuario->m_capap03 = $request->m_capap03;
            $usuario->m_capap04 = $request->m_capap04;
            $usuario->m_capap05 = $request->m_capap05;
            $usuario->m_capap06 = $request->m_capap06;
            $usuario->m_capap07 = $request->m_capap07;
            $usuario->m_capap08 = $request->m_capap08;
            $usuario->m_capap09 = $request->m_capap09;
            $usuario->m_capap10 = $request->m_capap10;
            $usuario->m_capap11 = $request->m_capap11;
            $usuario->m_capap12 = $request->m_capap12;
            $usuario->m_capap13 = $request->m_capap13;
            $usuario->m_capap14 = $request->m_capap14;
            $usuario->m_capap15 = $request->m_capap15;
            $usuario->m_capap16 = $request->m_capap16;
            $usuario->m_capap17 = $request->m_capap17;
            $usuario->m_capap18 = $request->m_capap18;
            $usuario->m_capap19 = $request->m_capap19;
            $usuario->m_capap20 = $request->m_capap20;
            $usuario->m_capap21 = $request->m_capap21;
            $usuario->m_capap22 = $request->m_capap22;
            $usuario->m_capap23 = $request->m_capap23;
            $usuario->m_capap24 = $request->m_capap24;
            $usuario->m_capap25 = $request->m_capap25;
            $usuario->m_capapus = $request->m_capapus;
            $usuario->m_capauco = $request->m_capauco;
            $usuario->m_capacgv = $request->m_capacgv;
            $usuario->m_capaceg = $request->m_capaceg;
            $usuario->m_capacin = $request->m_capacin;
            $usuario->m_capacnc = $request->m_capacnc;
            $usuario->m_capacnd = $request->m_capacnd;
            $usuario->m_capaeco = $request->m_capaeco;
            $usuario->m_capaecb = $request->m_capaecb;
            $usuario->m_capaecr = $request->m_capaecr;
            $usuario->m_capaeci = $request->m_capaeci;
            $usuario->m_capaepc = $request->m_capaepc;
            $usuario->m_capagen = $request->m_capagen;
            $usuario->m_capagpa = $request->m_capagpa;
            $usuario->m_capatco = $request->m_capatco;
            $usuario->m_capatcr = $request->m_capatcr;
            $usuario->m_capatca = $request->m_capatca;
            $usuario->m_capatrm = $request->m_capatrm;
            $usuario->m_capatwb = $request->m_capatwb;
            $usuario->m_capatrv = $request->m_capatrv;
            $usuario->m_capaldv = $request->m_capaldv;
            $usuario->m_capabti = $request->m_capabti;
            $usuario->m_capreti = $request->m_capreti;
            $usuario->m_capvdtm = $request->m_capvdtm;
            $usuario->m_caprpoa = $request->m_caprpoa;
            $usuario->m_caprpop = $request->m_caprpop;
            $usuario->m_caprpva = $request->m_caprpva;
            $usuario->m_caprpvp = $request->m_caprpvp;
            $usuario->m_caprplo = $request->m_caprplo;
            $usuario->m_caprtlo = $request->m_caprtlo;
            $usuario->m_caprtli = $request->m_caprtli;
            $usuario->m_caprrgv = $request->m_caprrgv;
            $usuario->m_capcc01 = $request->m_capcc01;
            $usuario->m_capcc02 = $request->m_capcc02;
            $usuario->m_capcc03 = $request->m_capcc03;
            $usuario->m_capcc04 = $request->m_capcc04;
            $usuario->m_capcavt = $request->m_capcavt;
            $usuario->m_capcius = $request->m_capcius;
            $usuario->m_nuplenc = $request->m_nuplenc;
            $usuario->m_nuplgir = $request->m_nuplgir;
            $usuario->m_nupltiq = $request->m_nupltiq;
            $usuario->m_nuplotr = $request->m_nuplotr;
            $usuario->m_nucoemp = $request->m_nucoemp;
            $usuario->m_causact = Auth::user()->id;
            $obj_user->updated_at = new DateTime();;
            $usuario->save();

            //2-4 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_fin = Users::find($id);

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
                $tit_men_res_cor = 'Usuario: ';
                $tx1_men_res_cor = ' '.$request->m_canuipe.' ';
                $tx2_men_res_cor = ' '.$request->name.' ';
                $tx3_men_res_cor = ' ';
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
                return redirect()->route('usuarios.index')->with($par_men_res_cor);
                
            } else{
                // NO HALLO CAMBIOS EN VALORES DE CAMPOS: ENVIA
                return redirect()->route('usuarios.index');
            }

        } else if($usuario->m_canuipe!==$request->m_canuipe) {
            
            //2-3 EL NUIP FUE MODIFICADO
            //2-4 CONSULTA PARA REVISAR QUE EL NUEVO NUIP NO ESTÉ YA EN LA TABLA
            $validar = Users::where('m_canuipe',$request->m_canuipe)->get();
            if(count($validar)>0){
                
                //2-5 ERROR EL NUEVO NUIP YA ESTA EN LA TABLA
                //2-6 RESULTADO ERROR: MENSAJES
                $tit_men_res_err = 'Usuario: ';
                $tx1_men_res_err = ' '.$request->m_canuipe.' ';
                $tx2_men_res_err = ' '.$request->name.' ';
                $tx3_men_res_err = ' ';
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
                return redirect()->route('usuarios.index',['m_canuipe'=>$request->m_canuipe])->with($par_men_res_err);
                
            } else{
                
                //2-5 EL NUEVO NUIPE NO ESTA EN LA TABLA 
                $usuario = Users::find($id);
                $usuario->m_canuipe = $request->m_canuipe;
                $usuario->m_nudiver = $request->m_nudiver;
                $usuario->m_nutipdo = $request->m_nutipdo;
                $usuario->name = $request->name;
                $usuario->m_caprnom = $request->m_caprnom;
                $usuario->m_casenom = $request->m_casenom;
                $usuario->m_caprape = $request->m_caprape;
                $usuario->m_caseape = $request->m_caseape;
                $usuario->m_fenacim = $request->m_fenacim;
                $usuario->m_nuedada = $request->m_nuedada;
                $usuario->m_catipsa = $request->m_catipsa;
                $usuario->m_catisex = $request->m_catisex;
                $usuario->m_cadirec = $request->m_cadirec;
                $usuario->m_nucociu = $request->m_nucociu;
                $usuario->m_catelfi = $request->m_catelfi;
                $usuario->m_camovil = $request->m_camovil;
                $usuario->m_nuofici = $request->m_nuofici;
                $usuario->m_nucocar = $request->m_nucocar;
                $usuario->m_caestad = $request->m_caestad;
                $usuario->m_canivel = $request->m_canivel;
                $usuario->m_feinici = $request->m_feinici;
                $usuario->m_fevenci = $request->m_fevenci;
                $usuario->email = $request->email;
                $usuario->m_caprenu = $request->m_caprenu;
                $usuario->m_capreed = $request->m_capreed;
                $usuario->m_capreel = $request->m_capreel;
                $usuario->m_capreex = $request->m_capreex;
                $usuario->m_capreep = $request->m_capreep;
                $usuario->m_capap01 = $request->m_capap01;
                $usuario->m_capap02 = $request->m_capap02;
                $usuario->m_capap03 = $request->m_capap03;
                $usuario->m_capap04 = $request->m_capap04;
                $usuario->m_capap05 = $request->m_capap05;
                $usuario->m_capap06 = $request->m_capap06;
                $usuario->m_capap07 = $request->m_capap07;
                $usuario->m_capap08 = $request->m_capap08;
                $usuario->m_capap09 = $request->m_capap09;
                $usuario->m_capap10 = $request->m_capap10;
                $usuario->m_capap11 = $request->m_capap11;
                $usuario->m_capap12 = $request->m_capap12;
                $usuario->m_capap13 = $request->m_capap13;
                $usuario->m_capap14 = $request->m_capap14;
                $usuario->m_capap15 = $request->m_capap15;
                $usuario->m_capap16 = $request->m_capap16;
                $usuario->m_capap17 = $request->m_capap17;
                $usuario->m_capap18 = $request->m_capap18;
                $usuario->m_capap19 = $request->m_capap19;
                $usuario->m_capap20 = $request->m_capap20;
                $usuario->m_capap21 = $request->m_capap21;
                $usuario->m_capap22 = $request->m_capap22;
                $usuario->m_capap23 = $request->m_capap23;
                $usuario->m_capap24 = $request->m_capap24;
                $usuario->m_capap25 = $request->m_capap25;
                $usuario->m_capapus = $request->m_capapus;
                $usuario->m_capauco = $request->m_capauco;
                $usuario->m_capacgv = $request->m_capacgv;
                $usuario->m_capaceg = $request->m_capaceg;
                $usuario->m_capacin = $request->m_capacin;
                $usuario->m_capacnc = $request->m_capacnc;
                $usuario->m_capacnd = $request->m_capacnd;
                $usuario->m_capaeco = $request->m_capaeco;
                $usuario->m_capaecb = $request->m_capaecb;
                $usuario->m_capaecr = $request->m_capaecr;
                $usuario->m_capaeci = $request->m_capaeci;
                $usuario->m_capaepc = $request->m_capaepc;
                $usuario->m_capagen = $request->m_capagen;
                $usuario->m_capagpa = $request->m_capagpa;
                $usuario->m_capatco = $request->m_capatco;
                $usuario->m_capatcr = $request->m_capatcr;
                $usuario->m_capatca = $request->m_capatca;
                $usuario->m_capatrm = $request->m_capatrm;
                $usuario->m_capatwb = $request->m_capatwb;
                $usuario->m_capatrv = $request->m_capatrv;
                $usuario->m_capaldv = $request->m_capaldv;
                $usuario->m_capabti = $request->m_capabti;
                $usuario->m_capreti = $request->m_capreti;
                $usuario->m_capvdtm = $request->m_capvdtm;
                $usuario->m_caprpoa = $request->m_caprpoa;
                $usuario->m_caprpop = $request->m_caprpop;
                $usuario->m_caprpva = $request->m_caprpva;
                $usuario->m_caprpvp = $request->m_caprpvp;
                $usuario->m_caprplo = $request->m_caprplo;
                $usuario->m_caprtlo = $request->m_caprtlo;
                $usuario->m_caprtli = $request->m_caprtli;
                $usuario->m_caprrgv = $request->m_caprrgv;
                $usuario->m_capcc01 = $request->m_capcc01;
                $usuario->m_capcc02 = $request->m_capcc02;
                $usuario->m_capcc03 = $request->m_capcc03;
                $usuario->m_capcc04 = $request->m_capcc04;
                $usuario->m_capcavt = $request->m_capcavt;
                $usuario->m_capcius = $request->m_capcius;
                $usuario->m_nuplenc = $request->m_nuplenc;
                $usuario->m_nuplgir = $request->m_nuplgir;
                $usuario->m_nupltiq = $request->m_nupltiq;
                $usuario->m_nuplotr = $request->m_nuplotr;
                $usuario->m_nucoemp = $request->m_nucoemp;
                $usuario->m_causact = Auth::user()->id;
                $obj_user->updated_at = new DateTime();;
                $usuario->save();

                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                $audi_editar = Captaudi::create([
                    'm_nuidope'=>$aud_idu_ope,
                    'm_canombr'=>$aud_nom_pag,
                    'm_callave'=>$request->m_canuipe,
                    'm_nuidusu'=>Auth::user()->id,
                    'm_cadeini'=>$con_dat_ini,
                    'm_cadefin'=>$usuario]);

                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Usuario: ';
                $tx1_men_res_cor = ' '.$request->m_canuipe.' ';
                $tx2_men_res_cor = ' '.$request->name.' ';
                $tx3_men_res_cor = ' ';
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
                return redirect()->route('usuarios.index')->with($par_men_res_cor);
            }
        }
    }

    //  8- ELIMINAR
    //Destroy: Función para eliminar registros en tabla
    public function destroy($id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 21;
        $aud_nom_pag = 'Usuarios';

        //2- BUSCA EL REGISTRO POR EL ID POR SI YA HA SIDO ELIMINADO (SEGURIDAD)
        $usuario = Users::find($id);
        if($usuario){
            //REGISTRO HALLADO EN LA TABLA - PUEDE ELIMINARLO

            //2-1 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Usuario: ';
            $tx1_men_res_cor = ' '.$usuario->m_canuipe.' ';
            $tx2_men_res_cor = ' '.$usuario->name.' ';
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
            $aud_nom_pag = 'Usuarios';
            $audi_borrar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_callave'=>$usuario->m_canuipe,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$usuario]);

            //2-4 ELIMINA REGISTRO
            $usuario->delete();

            //2-5 RESULTADO CORRECTO: ENVIA
            return redirect()->route('usuarios.index')->with($par_men_res_cor);

        }else{
            //REGISTRO NO HALLADO EN LA TABLA
            
            //3-1 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Usuario: ';
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
            return redirect()->route('usuarios.index')->with($par_men_res_err);
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
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;

        $usuarios = Users::Nuipe($this->m_canuipe_filtro)->
                        nombre($this->m_canombr_filtro)->
                        Nombre_ciudad($this->m_nucociu_filtro)->
                        estado($this->m_caestad_filtro)->
                        usuario_registra($this->m_causreg_filtro)->
                        usuario_actualiza($this->m_causact_filtro)->
                        orderBy($this->m_canombr_campos,$this->m_canombr_ordene)->get();
        
        $barra = new DNS1D();
        $pdf = \App::make('dompdf.wrapper');
        $vista = \view('admin.programador.usuarios.exportarpdf',compact('Usuarios'))->render();
        $pdf->loadHTML($vista);
        // Obtiene fecha y hora actual 
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'usuarios_'.$cadena_fecha_actual.'.pdf';
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
        $this->m_caestad_filtro=$request->m_caestad;
        $this->m_causreg_filtro=$request->m_causreg;
        $this->m_causact_filtro=$request->m_causact;

        
        // Obtiene fecha y hora actual
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'usuarios_'.$cadena_fecha_actual;

        Excel::create($nombre_archivo, function($excel) {
            $excel->sheet('Usuarios', function($sheet) {

                // 0- CONSULTA 
                $usuarios = Users::Nuipe($this->m_canuipe_filtro)->
                    nombre($this->m_canombr_filtro)->
                    Nombre_ciudad($this->m_nucociu_filtro)->
                    estado($this->m_caestad_filtro)->
                    usuario_registra($this->m_causreg_filtro)->
                    usuario_actualiza($this->m_causact_filtro)->
                    orderBy($this->m_canombr_campos,$this->m_canombr_ordene)->get();

                foreach($usuarios as $usuario){
                    $ciudad = Capmciud::where('m_nucodig',$usuario->m_nucociu)->first();
                    $departamento = Capmdepa::where('m_nucodig',$ciudad->m_nucodep)->first();
                    $pais = Capmpais::where('m_nucodig',$departamento->m_nucopai)->first();
                    $oficina_registro = Capmsucu::where('m_nucodig',$usuario->m_nuofici)->first();

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
                $tit_con_sul = 'CONSULTA DE USUARIOS';

                // 20- TOTAL REGISTROS
                $tot_reg_ist = $usuarios->Count();
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
                        'Tipo de documento','Usuario',
                        'Primer nombre','Segundo nombre','Primer apellido','Segundo apellido',
                        'Dirección','Ciudad','Departamento','País',
                        'Telefóno fijo', 'Telefóno móvil', 'Portal Web',
                        'Correo electrónico', 'Código autorización',
                        'Estado',
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
                foreach($usuarios as $index => $usuario) {

                    //      ESTILO
                    $sheet->Cells('A8:Z100000');
                    $sheet->row($index+8, function ($row) {
                        $row->setFontFamily('Arial');
                        $row->setFontSize(10);
                    });

                    if ($index) {
                            $sheet->row($index+8, [
                            $usuario->id,
                            $usuario->m_canuipe, $usuario->m_nudiver,
                            $usuario->tiposdocumentos->m_canombr,
                            $usuario->m_canombr,
                            $usuario->m_caprnom, $usuario->m_casenom,
                            $usuario->m_caprape, $usuario->m_caseape,
                            $usuario->m_cadirec, $usuario->ciudades->m_canombr,
                            $departamento_x[$j],
                            $pais_x[$j],
                            $usuario->m_catelfi, $usuario->m_camovil,
                            $usuario->m_cacorel,
                            $usuario->m_caestad,
                            $usuario->oficina_registro->m_canombr,
                            $usuario->created_at, $usuario->usuario_registra->name,
                            $usuario->updated_at, $usuario->usuario_actualiza->name,
                        ]);
                    } else {
                        $sheet->row($index+8, [
                            $usuario->id,
                            $usuario->m_canuipe, $usuario->m_nudiver,
                            $usuario->tiposdocumentos->m_canombr,
                            $usuario->m_canombr,
                            $usuario->m_caprnom, $usuario->m_casenom,
                            $usuario->m_caprape, $usuario->m_caseape,
                            $usuario->m_cadirec, $usuario->ciudades->m_canombr,
                            $departamento_x[$j],
                            $pais_x[$j],
                            $usuario->m_catelfi, $usuario->m_camovil,
                            $usuario->m_cacorel,
                            $usuario->m_caestad,
                            $usuario->oficina_registro->m_canombr,
                            $usuario->created_at, $usuario->usuario_registra->name,
                            $usuario->updated_at, $usuario->usuario_actualiza->name,
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

        return redirect()->route('usuarios.index');
        
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
