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
use Illuminate\Support\Facades\Hash;



class ContraseniasController extends Controller

{
    //ORDENAMIENTO
    // ASCENDENTE - DESCENTE
    private $m_canombr_ordene="asc";
    // NOMBRE CAMPO
    private $m_canombr_campos="name";
    //FILTROS
    private $m_canuipe_filtro="";
    private $email_filtro="";
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
    public function index(){
        setlocale(LC_TIME,"es_ES"); 
        if(Auth::user()->m_capap10=="SI"){

            //cargar los datos del usuario autenticado actual

            //return response()->json([Auth::user()]);
            return view('admin.programador.contrasenias.index');

        } else{
            //  MENSAJE
            $mensaje = 'Propiedad inactiva';
            return redirect()->back()->with('mensaje',$mensaje);
        }
    }

    //  3- CREAR
    //Create: Función para agregar registros a tabla
    public function create(){

    }

    //  4- ALMACENAR
    //Store: Función para validar datos y luego insertarlos en tabla
    public function store(Request $request){
       
    }    
    
    public function validarcontrasenia(Request $request){
        $usuario = Users::find($request->id);
        $requestpassword =  $request->password;
        $passwordactual =  $usuario->password;

        //$obj_user->m_feactco = new DateTime();;

        if (Hash::check($requestpassword, $passwordactual))//exitoso2018
        {            
            $request_data = $request->All();
            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['passwordNew']);
            $obj_user->m_feactco = new DateTime();;
            $obj_user->save(); 
        
            //2-7 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Usuario: ';
            $tx1_men_res_cor = ' '.$request->m_canuipe.' ';
            $tx2_men_res_cor = ' '.$request->name.' ';
            $tx3_men_res_cor = ' ';
            $tx4_men_res_cor = '';
            $tx5_men_res_cor = '';
            $fo1_men_res_cor = 'Contraseña actualizada satisfactoriamente';
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

            return response()->json([true, $par_men_res_cor]);
        
        }else{
            
            return response()->json([false]);
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
        return view('admin.programador.contrasenias.consultar',compact('usuarios','tiposdocumentos','ciudades','oficina_registro'));
    }
    
    //  7- ACTUALIZAR
    //Update: Función para validar y actualizar campos de registros en tabla
    public function update(Request $request, $id){
        
    }

    //  8- ELIMINAR
    //Destroy: Función para eliminar registros en tabla
    public function destroy($id){
        
    }

    //  9- EXPORTAR: PDF
    // Funcion para exportar PDF
    public function exportarpdf(Request $request){

    }

    //  10- EXPORTAR: HOJA DE CALCULO
    // Funcion para exportar HOJA DE CALCULO
    public function exportarexcel(Request $request){

        
    }

    //  11- NOTIFICACIONES
    // NOTIFICACIONES USUARIO
    public function notification($type)
    {
    }

}
