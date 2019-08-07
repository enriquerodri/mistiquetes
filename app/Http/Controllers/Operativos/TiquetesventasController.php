<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           TiquetesventasControler.php
//Descripción:      Venta de tiquetes
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      

namespace App\Http\Controllers\Operativos;

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
use App\Capmtido;
use App\Capmpais;
use App\Capmdepa;
use App\Capmciud;
use App\Capmsucu;
use App\Tictarod;
use App\Capmpldv;
use App\Tictatiq;
use App\capmtati;
use App\capmtato;
use App\Captaudi;
use App\Capmclgl;
use App\User;

setlocale(LC_TIME,"es_ES"); date_default_timezone_set ('America/Bogota');

class TiquetesventasController extends Controller
{
    //  1- CONSTRUCTOR
    //Función Constructor para validar usuarios
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
            $rodamientos_origen = null;
            $rodamientos_destino = null;

        if(Auth::user()->m_capap10=="SI"){        
            //  CIUDADES 
            $ciudades = Capmciud::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  IDA - OFICINA DE ABORDAJE - 
            $ida_oficina_abo = Capmsucu::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  REGRESO - OFICINA DE ABORDAJE
            $reg_oficina_abo = Capmsucu::orderBy('m_canombr','asc')->pluck('m_canombr','m_nucodig');
            //  VISTA 
            
            if ($request->m_nucoori==null) {
                return view('operativos.tiquetes.ventas.index',compact('ciudades','ida_oficina_abo','reg_oficina_abo', 'rodamientos_destino','rodamientos_origen'));
            }          

            return view('operativos.tiquetes.ventas.index')->with(compact('ciudades','ida_oficina_abo','reg_oficina_abo'))->with($this->getIdaRegreso($request));

            //return response()->json([$request->m_nucoori,$request->m_nucodes,$request->m_nuofici,$request->m_nuofire]);
        } else{
            //  MENSAJE
            $mensaje = 'Propiedad inactiva';
            return redirect()->back()->with('mensaje',$mensaje);
        }
    }

    public function getIdaRegreso(Request $request){

        if(Auth::user()->m_capap10=="SI"){          
 
            $m_caestad_filtro="EN LINEA";
            $m_caplaca_filtro="";

            $m_catipvi = $request->m_catipvi;
            $m_nucoori = $request->m_nucoori;
            $m_nucodes = $request->m_nucodes;
            $m_nuofici = $request->m_nuofici;
            $m_feferod = $request->m_feferod;

            $m_nuofire = $request->m_nuofire;
            $m_federeg = $request->m_federeg;            

            $rodamientos_destino = null;

            //  RODAMIENTOS DE IDA
            //  NUEVO TOMANDO PRIMERO LAS TARIFAS Y TRAYECTOS HACIA RODAMIENTOS
            $rodamientos_origen = DB::table('capmtati')->
                distinct()->
                where('capmtati.m_nucocio','LIKE',$m_nucoori)->
                where('capmtati.m_nucocid','LIKE',$m_nucodes)->
                where('capmtati.m_caestad','LIKE','ACTIVO')->
                join('capmtato','capmtato.m_nucotra','=','capmtati.m_nucodig')->
                join('tictarod','tictarod.m_nucodru','=','capmtati.m_nucorut')->
                select('tictarod.*',
                    DB::raw("(SELECT m_canombr
                        FROM capmtati
                        WHERE m_nucocio=tictarod.m_nucoori
                        AND m_nucocid=tictarod.m_nucodes
                        LIMIT 1) as nombre_ruta"),
                    DB::raw("(SELECT m_nutalia
                        FROM capmtato
                        WHERE capmtato.m_nucotra=capmtati.m_nucodig
                        AND capmtato.m_nutipve=tictarod.m_nucogru
                        LIMIT 1) as tarifa_tiquete_ida"),
                    DB::raw("(SELECT m_nutaliz
                        FROM capmtato
                        WHERE capmtato.m_nucotra=capmtati.m_nucodig
                        AND capmtato.m_nutipve=tictarod.m_nucogru
                        LIMIT 1) as tarifa_tiquete_ida_minima"),
                    DB::raw("(SELECT m_canombr
                        FROM capmtati
                        WHERE capmtati.m_nucodig=capmtato.m_nucotra
                        LIMIT 1) as origen_destino_ida"),
                    DB::raw("(SELECT SUM(m_nucanti)
                        FROM tictatiq
                        WHERE tictatiq.m_nurodam=tictarod.m_nuident
                        LIMIT 1) as sillas_vendida_ida"),
                    DB::raw("(SELECT (tictarod.m_nucapac)-SUM(tictatiq.m_nucanti)
                        FROM tictatiq
                        WHERE tictatiq.m_nurodam=tictarod.m_nuident
                        LIMIT 1) as sillas_disponi_ida"),
                    DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                        FROM tictatiq
                        WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                        tictatiq.m_catitiq LIKE 'LOCAL'
                        LIMIT 1) as sillas_locales_ida"),
                    DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                        FROM tictatiq
                        WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                        tictatiq.m_catitiq LIKE 'CONVENIO'
                        LIMIT 1) as sillas_conveni_ida"),
                    DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                        FROM tictatiq
                        WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                        tictatiq.m_catitiq LIKE 'CORTESIA'
                        LIMIT 1) as sillas_cortesi_ida"),
                    DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                        FROM tictatiq
                        WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                        tictatiq.m_catitiq LIKE 'CREDITO'
                        LIMIT 1) as sillas_credito_ida"),
                    DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                        FROM tictatiq
                        WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                        tictatiq.m_catitiq LIKE 'REVERTIDO'
                        LIMIT 1) as sillas_reverti_ida"),
                    DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                        FROM tictatiq
                        WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                        tictatiq.m_catitiq LIKE 'RESERVA'
                        LIMIT 1) as sillas_reserva_ida"),
                    DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                        FROM tictatiq
                        WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                        tictatiq.m_catitiq LIKE 'VIP'
                        LIMIT 1) as sillas_vipvtas_ida"),
                    DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                        FROM tictatiq
                        WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                        tictatiq.m_catitiq LIKE 'WEB'
                        LIMIT 1) as sillas_webvtas_ida"),
                    DB::raw("(SELECT m_casiasg
                        FROM tictatiq
                        WHERE tictatiq.m_nurodam=tictarod.m_nuident
                        ORDER BY m_casiasg asc
                        LIMIT 1,1) as sillas_asignad_ida"),
                    DB::raw("(SELECT m_canombr
                        FROM capmsucu
                        WHERE m_nucodig=tictarod.m_nuofici
                        LIMIT 1) as ida_ofinomb_abo"),
                    DB::raw("(SELECT m_canombr
                        FROM capmpldv
                        WHERE m_nucodig=tictarod.m_nucodis
                        LIMIT 1) as nombre_plano"))->
                where('tictarod.m_nuofici','LIKE',$m_nuofici)->
                where('tictarod.m_feferod','LIKE',$m_feferod)->
                where('tictarod.m_caestad','LIKE',$m_caestad_filtro)->
                where('tictarod.m_caplaca','!=',$m_caplaca_filtro)->
                orderBy('tictarod.m_canomho','asc')->paginate(100);


            if ($request->m_nuofire!=null) {
                $rodamientos_destino = DB::table('capmtati')->
                    distinct()->
                    where('capmtati.m_nucocio','LIKE',$m_nucodes)->
                    where('capmtati.m_nucocid','LIKE',$m_nucoori)->
                    where('capmtati.m_caestad','LIKE','ACTIVO')->
                    join('capmtato','capmtato.m_nucotra','=','capmtati.m_nucodig')->
                    join('tictarod','tictarod.m_nucodru','=','capmtati.m_nucorut')->
                    select('tictarod.*',
                        DB::raw("(SELECT m_canombr
                            FROM capmtati
                            WHERE m_nucocio=tictarod.m_nucoori
                            AND m_nucocid=tictarod.m_nucodes
                            LIMIT 1) as nombre_ruta"),
                        DB::raw("(SELECT m_nutalia
                            FROM capmtato
                            WHERE capmtato.m_nucotra=capmtati.m_nucodig
                            AND capmtato.m_nutipve=tictarod.m_nucogru
                            LIMIT 1) as tarifa_tiquete_reg"),
                        DB::raw("(SELECT m_canombr
                            FROM capmtati
                            WHERE capmtati.m_nucodig=capmtato.m_nucotra
                            LIMIT 1) as origen_destino_reg"),
                        DB::raw("(SELECT SUM(m_nucanti)
                            FROM tictatiq
                            WHERE tictatiq.m_nurodam=tictarod.m_nuident
                            LIMIT 1) as sillas_vendida_reg"),
                        DB::raw("(SELECT (tictarod.m_nucapac)-SUM(tictatiq.m_nucanti)
                            FROM tictatiq
                            WHERE tictatiq.m_nurodam=tictarod.m_nuident
                            LIMIT 1) as sillas_disponi_reg"),
                        DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                            FROM tictatiq
                            WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                            tictatiq.m_catitiq LIKE 'LOCAL'
                            LIMIT 1) as sillas_locales_reg"),
                        DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                            FROM tictatiq
                            WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                            tictatiq.m_catitiq LIKE 'CONVENIO'
                            LIMIT 1) as sillas_conveni_reg"),
                        DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                            FROM tictatiq
                            WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                            tictatiq.m_catitiq LIKE 'CORTESIA'
                            LIMIT 1) as sillas_cortesi_reg"),
                        DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                            FROM tictatiq
                            WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                            tictatiq.m_catitiq LIKE 'CREDITO'
                            LIMIT 1) as sillas_credito_reg"),
                        DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                            FROM tictatiq
                            WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                            tictatiq.m_catitiq LIKE 'REVERTIDO'
                            LIMIT 1) as sillas_reverti_reg"),
                        DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                            FROM tictatiq
                            WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                            tictatiq.m_catitiq LIKE 'RESERVA'
                            LIMIT 1) as sillas_reserva_reg"),
                        DB::raw("(SELECT SUM(tictatiq.m_nucanti)
                            FROM tictatiq
                            WHERE tictatiq.m_nurodam=tictarod.m_nuident AND
                            tictatiq.m_catitiq LIKE 'WEB'
                            LIMIT 1) as sillas_webvtas_reg"),
                        DB::raw("(SELECT m_casiasg
                            FROM tictatiq
                            WHERE tictatiq.m_nurodam=tictarod.m_nuident
                            ORDER BY m_casiasg asc
                            LIMIT 1,1) as sillas_asignad_reg"),
                        DB::raw("(SELECT m_canombr
                            FROM capmsucu
                            WHERE m_nucodig=tictarod.m_nuofici
                            LIMIT 1) as reg_ofinomb_abo"),
                        DB::raw("(SELECT m_canombr
                            FROM capmpldv
                            WHERE m_nucodig=tictarod.m_nucodis
                            LIMIT 1) as nombre_plano"))->
                    where('tictarod.m_nuofici','LIKE',$m_nuofire)->
                    where('tictarod.m_feferod','LIKE',$m_federeg)->
                    where('tictarod.m_caestad','LIKE',$m_caestad_filtro)->
                    where('tictarod.m_caplaca','!=',$m_caplaca_filtro)->
                    orderBy('tictarod.m_canomho','asc')->paginate(100);
            }


        //2-1 RESULTADOS: ENVIA
        //return response()->json([$rodamientos_origen,$rodamientos_destino]);

        // return compact('request');
        return compact('rodamientos_origen','m_nucoori'
            ,'m_nuofici','m_nucodes','m_nuofire'
            ,'rodamientos_destino','m_feferod'
            ,'m_federeg','m_catipvi'
            ,'m_nuofire');
        
        } else{
            //  MENSAJE
            $mensaje = 'Propiedad inactiva';
            return redirect()->back()->with('mensaje',$mensaje);
        }
    }

    //rodamiento_vehiculo_ida: Función para consultar rodamiento vehiculo de ida
    public function plano_vehiculo_ida(Request $request){
        //return response()->json($request->obj);
        $m_nucodoc = (int)$request->obj['m_nucodis'];
        $m_nuideli = (int)$request->obj['m_nuideli'];
        $m_nuident = (int)$request->obj['m_nuident'];
        $rodamiento_veh_ida = Capmpldv::find($m_nucodoc);

        $sillasAsignadas = DB::table('tictatiq')
                    ->where('m_nuideli', $m_nuideli)
                    ->Where('m_nurodam', $m_nuident)
                    ->get();

        return response()->json([$rodamiento_veh_ida,$sillasAsignadas,]);
        //return response()->json($rodamiento_veh_ida);
    }

    public function obtenerDatosViajero(Request $request){
        
        $m_canuipe = $request->m_canuipe;
       
        $viajero = DB::table('Capmclgl')
            ->where('m_canuipe', $m_canuipe)
            ->get();

        return response()->json($viajero);             
    }

    public function grabartiquetesIda(Request $request){
      
        $m_canombr = null;
        $m_canuipe = null;
        $m_camovil = null;   
       
        //return response()->json($request->data[0]); 
        //return response()->json($request->all()); 
                      


        //return response()->json([,,$silla["m_camovil"]]); 

        DB::beginTransaction();
        try {
            //2-1 EL NOMBRE NUEVO NO EXISTE
            //2-2 INSERTAR LOS DATOS
            $sillas = $request->sillas;   
            foreach ($sillas as $silla) {                     
                $datosScanner = explode(",", $silla["datacedula"]);   

                //si no existe                 
                if((count($datosScanner)>1) && DB::table('Capmclgl')->where('m_canuipe', $silla["m_canuipe"])->doesntExist()){
                    //guardelo como cliente - VALIDAR
                    //1024470338,MORENO,RODRIGUEZ,JONATHAN,WOLFAN,M,09,12,1986,A+

                    $contado = Capmclgl::create([
                        'm_canuipe'=>$datosScanner[0],
                        'm_nudiver'=>2,
                        'm_nutipdo'=>2,
                        'm_canombr'=>$silla["m_canombr"],
                        'm_camovil'=>$silla["m_camovil"],
                        'm_causreg'=>Auth::user()->id,
                        'm_causact'=>Auth::user()->id
                    ]);
                }

                //  AGREGRA CAMPOS COMPLEMENTARIOS
                $crearTiqueteIda = tictatiq::create([
                    'm_canuivi' => $silla["m_canuipe"],
                    'm_canovij' => $silla["m_canombr"],
                    'm_fefevia' => $silla["m_feferod"],
                    'm_catitiq' => $silla["formaDePagoIda"],
                    'm_causreg'=>Auth::user()->id,
                    'm_causact'=>Auth::user()->id
                ]);                
            }
            

            DB::commit();
            return response()->json("test full"); 
        } catch (ModelNotFoundException $exception) {
            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
        }

        return response()->json("test");             
    }
}