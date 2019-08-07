<?php

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           DivisionesControler.php
//Descripción:      Divisiones o areas organización empresarial
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
use App\Capmdivi;
use App\Captauco;
use App\Captaudi;
use App\User;


class AuditoriaController extends Controller
{
    
    //  1- CONSTRUCTOR
    //Constructor: Función para validar usuarios
    public function __construct(){
        $this->middleware('auth');
    }

    //  2- INDICES
    //Index: Función para mostrar registros tabla de pagina principal
    public function index(Request $request){
        if(Auth::user()->m_capap10=="SI"){
            // LIMPIA FILTROS
            $m_canombr_filtro="";
            $m_cacodna_filtro="";
            $m_caestad_filtro="";
            $m_causreg_filtro="";
            $m_causact_filtro="";
            //  VALIDA RESULTADO
            if($request){
                //  CARGA VALORES
                $m_canombr_filtro = $request->m_canombr;
                $m_cacodna_filtro = $request->m_cacodna;
                $m_caestad_filtro = $request->m_caestad;
                $m_causreg_filtro = $request->m_causreg;
                $m_causact_filtro = $request->m_causact;
            }

            //  CONCEPTOS
            $conceptos_auditoria = Captauco::orderBy('m_canombr','asc')->where('m_caestad','ACTIVO')->pluck('m_canombr','m_nucodig');            
            //  USUARIOS
            $usuarios = User::orderBy('name','asc')->pluck('name','id');
            //  VISTA
            return view('admin.auditor.eventos.index',compact('usuarios','conceptos_auditoria','m_cacodna_filtro','m_caestad_filtro','m_causreg_filtro','m_causact_filtro'));
        } else{
            //  MENSAJE
            $mensaje = 'Propiedad inactiva';
            return redirect()->back()->with('mensaje',$mensaje);
        }
    }

    //  3- CREAR
    //Create: Función para agregar registros a tabla
    public function create(){
        return view('admin.programador.divisiones.crear');
    }

    //  4- ALMACENAR
    //Store: Función para validar datos y luego insertarlos en tabla
    public function store(Request $request){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 1;
        $aud_nom_pag = 'Divisiones';

        //2- CONSULTA SI EL NOMBRE YA EXISTE
        $divisiones = Capmdivi::where('m_canombr',$request->m_canombr)->get();
        if(count($divisiones)>0){

            //2-1 EL NUEVO NOMBRE YA ESTA EN LA TABLA
            //2-2 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Division: ';
            $tx1_men_res_err = ' '.$request->m_canombr.' ';
            $tx2_men_res_err = ' '.$request->m_cacodna.' ';
            $tx3_men_res_err = '';
            $tx4_men_res_err = '';
            $tx5_men_res_err = '';
            $fo1_men_res_err = 'Ya existe un registro con ese nombre';
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
            return redirect()->route('divisiones.index',['m_canombr'=>$request->m_canombr])->with($par_men_res_err);
        }
        else{
            
            //2-1 EL NOMBRE NUEVO NO EXISTE
            //2-2 INSERTAR LOS DATOS
            $division = Capmdivi::create([
                'm_canombr'=>$request->m_canombr,
                'm_cacodna'=>$request->m_cacodna,
                'm_caestad'=>$request->m_caestad,
                'm_causreg'=>Auth::user()->id,
                'm_causact'=>Auth::user()->id
            ]);

            //2-3 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_ini = $division;

            //2-3 AUDITORIA: INSERTA REGISTRO POR NUEVO REGISTRO
            $audi_editar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$con_dat_ini]);

            //2-4 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Division: ';
            $tx1_men_res_cor = ' '.$request->m_canombr.' ';
            $tx2_men_res_cor = ' '.$request->m_cacodna.' ';
            $tx3_men_res_cor = '';
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
            return redirect()->route('divisiones.index')->with($par_men_res_cor);
        }
    }

    //  5- EDITAR
    //Edit: Función para actualizar campos de registros
    public function edit($id){
        //1- PREPARA
        $division = Capmdivi::find($id);
        $causreg = User::find($division->m_causreg);
        $nombre_usuario_causreg = $causreg->name;
        $division['nombre_causreg'] = $nombre_usuario_causreg;
        
        //2-1 RESULTADOS: ENVIA
        return response()->json($division);
    }

    //  6- MOSTRAR
    //Show: Función para mostrar campos de registros
    public function show($id){
        $division = Capmdivi::find($id);
        return view('admin.programador.divisiones.consultar',compact('division'));
    }

    //  7- ACTUALIZAR
    //Update: Función para validar y actualizar campos de registros en tabla
    public function update(Request $request, $id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 11;
        $aud_nom_pag = 'Divisiones';
        //2- BUSCA EL REGISTRO POR EL ID PARA VERIFICAR SI TIENE EL MISMO NOMBRE (LLAVE)
        $division = Capmdivi::find($id);
        //$division_ini = Capmdivi::find($id);

        //2-1 BUSCA EL REGISTRO POR EL ID TOMA VALORES INICIALES (AUDITORIA)
        $con_dat_ini = Capmdivi::find($id);

        //2-2 COMPARA NOMBRE (LLAVE) REGISTRO HALLADO CON NOMBRE (LLAVE) DE LA RESPUESTA
        if($division->m_canombr==$request->m_canombr){

            //$division_ini = $division;

            //2-3 CORRESPONDE AL MISMO NOMBRE (LLAVE) - NO FUE MODIFICADO - ACTUALIZA TODOS LOS CAMPOS
            $division->m_canombr = $request->m_canombr;
            $division->m_cacodna = $request->m_cacodna;
            $division->m_caestad = $request->m_caestad;
            $division->m_causact = Auth::user()->id;
            $division->save();
            
            //2-4 BUSCA EL REGISTRO POR EL ID TOMA VALORES FINALES (AUDITORIA)
            $con_dat_fin = Capmdivi::find($id);

            //2-5 COMPARA VALORES INICIALES VS VALORES FINALES
            if($con_dat_ini != $con_dat_fin){
                //return $division_ini;
                //'id_user'=>Auth::user()->id,
                //return $con_dat_ini;
                
                //CAMBIOS HALLADOS EN VALORES DE CAMPOS
                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                $audi_editar = Captaudi::create([
                    'm_nuidope'=>$aud_idu_ope,
                    'm_canombr'=>$aud_nom_pag,
                    'm_nuidusu'=>Auth::user()->id,
                    'm_cadeini'=>$con_dat_ini,
                    'm_cadefin'=>$con_dat_fin]);
            
                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Division: ';
                $tx1_men_res_cor = ' '.$request->m_canombr.' ';
                $tx2_men_res_cor = ' '.$request->m_cacodna.' ';
                $tx3_men_res_cor = '';
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
                return redirect()->route('divisiones.index')->with($par_men_res_cor);
                
            } else{
                // NO HALLO CAMBIOS EN VALORES DE CAMPOS: ENVIA
                return redirect()->route('divisiones.index');
            }

        } else if($division->m_canombr!==$request->m_canombr) {
            
            //2-3 EL NOMBRE FUE MODIFICADO
            //2-4 CONSULTA PARA REVISAR QUE EL NUEVO NOMBRE NO ESTÉ YA EN LA TABLA
            $validar = Capmdivi::where('m_canombr',$request->m_canombr)->get();
            if(count($validar)>0){
                
                //2-5 ERROR EL NUEVO NOMBRE YA ESTA EN LA TABLA
                //2-6 RESULTADO ERROR: MENSAJES
                $tit_men_res_err = 'Division: ';
                $tx1_men_res_err = ' '.$request->m_canombr.' ';
                $tx2_men_res_err = ' '.$request->m_cacodna.' ';
                $tx3_men_res_err = '';
                $tx4_men_res_err = '';
                $tx5_men_res_err = '';
                $fo1_men_res_err = 'Ya existe un registro con ese nombre';
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
                return redirect()->route('divisiones.index',['m_canombr'=>$request->m_canombr])->with($par_men_res_err);
                
            } else{
                
                //2-5 EL NUEVO NOMBRE NO ESTA EN LA TABLA
                $division->m_canombr = $request->m_canombr;
                $division->m_cacodna = $request->m_cacodna;
                $division->m_caestad = $request->m_caestad;
                $division->m_causact = Auth::user()->id;
                $division->save();

                //2-6 AUDITORIA: INSERTA REGISTRO POR CAMBIOS EN CAMPOS
                $audi_editar = Captaudi::create([
                    'm_nuidope'=>$aud_idu_ope,
                    'm_canombr'=>$aud_nom_pag,
                    'm_nuidusu'=>Auth::user()->id,
                    'm_cadeini'=>$con_dat_ini,
                    'm_cadefin'=>$division]);

                //2-7 RESULTADO CORRECTO: MENSAJES
                $tit_men_res_cor = 'Division: ';
                $tx1_men_res_cor = ' '.$request->m_canombr.' ';
                $tx2_men_res_cor = ' '.$request->m_cacodna.' ';
                $tx3_men_res_cor = '';
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
                return redirect()->route('divisiones.index')->with($par_men_res_cor);
            }
        }
    }

    //  8- ELIMINAR
    //Destroy: Función para eliminar registros en tabla
    public function destroy($id){
        
        //1- DEFINE VARIABLES AUDITORIA
        $aud_idu_ope = 21;
        $aud_nom_pag = 'Divisiones';

        //2- BUSCA EL REGISTRO POR EL ID POR SI YA HA SIDO ELIMINADO (SEGURIDAD)
        $division = Capmdivi::find($id);
        if($division){
            //REGISTRO HALLADO EN LA TABLA - PUEDE ELIMINARLO

            //2-1 RESULTADO CORRECTO: MENSAJES
            $tit_men_res_cor = 'Division: ';
            $tx1_men_res_cor = ' '.$division->m_canombr.' ';
            $tx2_men_res_cor = ' '.$division->m_cacodna.' ';
            $tx3_men_res_cor = '';
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
            $aud_nom_pag = 'Divisiones';
            $audi_borrar = Captaudi::create([
                'm_nuidope'=>$aud_idu_ope,
                'm_canombr'=>$aud_nom_pag,
                'm_nuidusu'=>Auth::user()->id,
                'm_cadeini'=>$division]);

            //2-4 ELIMINA REGISTRO
            $division->delete();

            //2-5 RESULTADO CORRECTO: ENVIA
            return redirect()->route('divisiones.index')->with($par_men_res_cor);

        }else{
            //REGISTRO NO HALLADO EN LA TABLA
            
            //3-1 RESULTADO ERROR: MENSAJES
            $tit_men_res_err = 'Division: ';
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
            return redirect()->route('divisiones.index')->with($par_men_res_err);
        }
    }

    //  9- EXPORTAR: PDF
    // Funcion para exportar PDF
    public function exportarpdf(){

        $barra = new DNS1D();
        $divisiones = Capmdivi::all();
        $pdf = \App::make('dompdf.wrapper');
        $vista = \view('admin.programador.divisiones.exportarpdf',compact('divisiones'))->render();
        $pdf->loadHTML($vista);
        // Obtiene fecha y hora actual
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'divisiones_'.$cadena_fecha_actual.'.pdf';
        //  Resultados
        return $pdf->download($nombre_archivo);
    }

    //  10- EXPORTAR: HOJA DE CALCULO
    // Funcion para exportar HOJA DE CALCULO
    public function exportarexcel(){

        // Obtiene fecha y hora actual
        $fecha_actual = new DateTime();
        // Convierte fecha y hora actual a texto
        $cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
        // Nombre archivo exportacion
        $nombre_archivo = 'divisiones_'.$cadena_fecha_actual;

        Excel::create($nombre_archivo, function($excel) {
            $excel->sheet('Divisiones', function($sheet) {
                // 0- CONSULTA
                $divisiones = Capmdivi::all();
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
                $tit_con_sul = 'CONSULTA DE DIVISIONES';

                // 20- TOTAL REGISTROS
                $tot_reg_ist = $divisiones->Count();
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
                $sheet->mergeCells('A6:K6');
                $sheet->row(6, function ($row) {
                    $row->setFontFamily('Arial');
                    $row->setFontSize(12);
                });

                // ENCABEZADOS
                $sheet->row(7, [
                        'Identificador', 'Division',
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
                foreach($divisiones as $index => $division) {

                    //      ESTILO
                    $sheet->Cells('A8:Z100000');
                    $sheet->row($index+8, function ($row) {
                        $row->setFontFamily('Arial');
                        $row->setFontSize(10);
                    });

                    if ($index) {
                            $sheet->row($index+8, [
                            $division->m_nucodig, $division->m_canombr,
                            $division->m_cacodna, $division->m_caestad,
                            $division->created_at, $division->usuario_registra->name,
                            $division->updated_at, $division->usuario_actualiza->name,
                        ]);
                    } else {
                        $sheet->row($index+8, [
                            $division->m_nucodig, $division->m_canombr,
                            $division->m_cacodna, $division->m_caestad,
                            $division->created_at, $division->usuario_registra->name,
                            $division->updated_at, $division->usuario_actualiza->name,
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

                //$vista = \view('admin.programador.divisiones.exportarexcel',compact('divisiones'))->render();
                //$sheet->fromArray($divisiones);
 
            });
        })->export('xlsx');

        return redirect()->route('divisiones.index');
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

    //auditoria-eventos
}
