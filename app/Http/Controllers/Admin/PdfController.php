<?php
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           PdfControler.php
//Descripción:      Exportar a Pdf
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Capmanul;

class PdfController extends Controller
{
    // Funcion para exportar PDF
    public function exportarpdf(){

    	$anulaciones = Capmanul::all();
		$pdf = \App::make('dompdf.wrapper');
		//$pdf->loadHTML('<h1>Mi primer PDF</h1><p>Aquí va el contenido del PDF<p>');
		$vista = \view('admin.programador.anulaciones.exportarpdf',compact('anulaciones'))->render();
		$pdf->loadHTML($vista);
		return $pdf->download('anulaciones.pdf');
    }
}
