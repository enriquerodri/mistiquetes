<?php

Route::get('/', function() { return view('auth.login'); });
Route::get('/inicio', function() { return view('inicio'); })->middleware('auth')->name('inicio');
Route::get('/datos', 'DatosController@consultarDatos')->middleware('auth')->name('datos');
//Route::get('/acceso', function(){ return view('auth.login'); })->name('acceso');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');

//PASSOWORD RESET ROUTES
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password-Request');

Route::get('/admin', function(){ return view('admin.home'); })->middleware('auth')->name('admin');
Route::get('/admin/vehiculos', function(){ return view('admin.vehiculos.home'); })->middleware('auth')->name('admin-vehiculos');

Route::resource('/admin/vehiculos/vehiculos/vehiculos','Admin\VehiculosController');
 
Route::resource('/admin/vehiculos/tipos-combustible','Admin\TiposcombustibleController');
Route::resource('/admin/vehiculos/clases','Admin\ClasesvehiculosController');
Route::resource('/admin/vehiculos/lineas','Admin\LineasvehiculosController');
Route::resource('/admin/vehiculos/marcas','Admin\MarcasvehiculosController');
Route::resource('/admin/vehiculos/colores','Admin\ColoresvehiculosController');
Route::resource('/admin/vehiculos/servicios','Admin\ServiciosvehiculosController');
Route::resource('/admin/vehiculos/tipos-carrocerias','Admin\TiposcarroceriasController');
Route::resource('/admin/vehiculos/rutas-registro','Admin\RutasadminController');
Route::resource('/admin/vehiculos/rutas-autorizadas','Admin\RutasautorizadasController');
Route::resource('/admin/vehiculos/propietarios','Admin\PropietariosController');
Route::get('/admin/programador', function(){ return view('admin.programador.home'); })->middleware('auth')->name('admin-programador');
Route::resource('/admin/programador/paises','Admin\PaisesController');
Route::resource('/admin/programador/departamentos','Admin\DepartamentosController');
Route::resource('/admin/programador/ciudades','Admin\CiudadesController');

Route::resource('/admin/programador/divisiones','Admin\DivisionesController');
Route::resource('/admin/programador/cargos','Admin\CargosController');
Route::resource('/admin/programador/grupos','Admin\GruposController');
Route::resource('/admin/programador/contratos','Admin\ContratosController');
Route::resource('/admin/programador/capacitaciones','Admin\CapacitacionesController');
Route::resource('/admin/programador/examenes','Admin\ExamenesController');
Route::resource('/admin/programador/pruebas','Admin\PruebasController');

Route::resource('/admin/programador/estadocivil','Admin\EstadocivilController');
Route::resource('/admin/programador/estratosocial','Admin\EstratosocialController');
Route::resource('/admin/programador/conceptos','Admin\ConceptosController');
Route::resource('/admin/programador/anulaciones','Admin\AnulacionesController');
Route::resource('/admin/programador/usuarios','Admin\UsuariosController');

Route::resource('/admin/programador/contrasenias','Admin\ContraseniasController');
Route::post('/validarcontrasenia','Admin\ContraseniasController@validarcontrasenia');






Route::resource('/admin/programador/tiposdocumentos','Admin\TiposdocumentosController');

//Rutas creadas entre el sábado 19 y el lunes 21
Route::resource('/admin/programador/clientescredito','Admin\ClientescreditoController');
Route::resource('/admin/programador/contratoscredito','Admin\ContratoscreditoController');
Route::resource('/admin/programador/clientesconvenios','Admin\ClientesconveniosController');
Route::resource('/admin/programador/clientescontado','Admin\ClientescontadoController');
Route::resource('/admin/programador/aseguradoras','Admin\AseguradorasController');
Route::resource('/admin/programador/asociados','Admin\AsociadosController');
Route::resource('/admin/programador/documentos','Admin\DocumentosController');
Route::resource('/admin/programador/gastosviaje','Admin\GastosviajeController');
Route::resource('/admin/programador/oficinas','Admin\OficinasController');


//OPERATIVOS
//1- TIQUETES
Route::resource('/operativos/tiquetes/ventas','Operativos\TiquetesventasController');

//PLANO EVHICULOS DE IDA
Route::post('/obtenerPlano_vehiculo_ida','Operativos\TiquetesventasController@plano_vehiculo_ida');
//DATOS VIAJERO
Route::post('/obtenerDatosViajero','Operativos\TiquetesventasController@obtenerDatosViajero');
//GRABAR TIQUETES IDA
Route::post('/grabartiquetesIda','Operativos\TiquetesventasController@grabartiquetesIda');


//Rutas creadas entre el lunes 21 y el martes 22
Route::resource('/admin/programador/seguros','Admin\SegurosController');
Route::resource('/admin/programador/terminales','Admin\TerminalesdatosController');
Route::resource('/admin/programador/tarifas','Admin\TarifasterminalesController');

Route::get('/calendario', function() { return view('calendario'); });
Route::get('/calendario2', function() { return view('calendario2'); });

# ACTUALIZADO 19-05-2018 - INICIO
//OPERATIVOS
Route::get('/operativos', function(){ return view('operativos.home'); })->name('operativos');
//SOPORTE
Route::get('/soporte', function(){ return view('soporte.home'); })->name('soporte');
//NOSOTROS
Route::get('/nosotros', function(){ return view('nosotros.home'); })->name('nosotros');
//AUDITOR
Route::get('/admin/auditor', function(){ return view('admin.auditor.home'); })->name('admin-auditor');
# ACTUALIZADO 19-05-2018 - CIERRE
//DESDE AQUI RUTAS NUEVAS - 21-05-2018
//CONDUCTORES
Route::get('/admin/conductores', function(){ return view('admin.conductores.home'); })->name('admin-conductores');
Route::resource('/admin/conductores/conductores','Admin\ConductoresController');


//GUARDAR DOCUMENTOS PERSONA
Route::post('/guardarDocumentoPersona','Admin\ConductoresController@guardarDocumentoPersona');
//ELIMINAR DOCUMENTOS PERSONA
Route::post('/eliminarDocumentoPersona','Admin\ConductoresController@eliminarDocumentoPersona');
//GUARDAR SEGUROS PERSONA
Route::post('/guardarSeguroPersona','Admin\ConductoresController@guardarSeguroPersona');
//ELIMINAR SEGUROS PERSONA
Route::post('/eliminarSeguroPersona','Admin\ConductoresController@eliminarSeguroPersona');


//EXPORTAR HOJA DE CALCULO CONDUCTORES DE VEHICULOS
Route::get('conductores-excel','Admin\ConductoresController@exportarexcel')->name('conductores-excel');
//EXPORTAR PDF CONDUCTORES DE VEHICULOS
Route::get('conductores-pdf','Admin\ConductoresController@exportarpdf')->name('conductores-pdf');

//CONSULTAS
Route::get('/admin/consultas', function(){ return view('admin.consultas.home'); })->name('admin-consultas');
//FICHA TECNICA
Route::get('/admin/fichatecnica', function(){ return view('admin.fichatecnica.home'); })->name('admin-fichatecnica');
//INTEGRADOR CONTABLE
Route::get('/admin/integradorcontable', function(){ return view('admin.integradorcontable.home'); })->name('admin-integradorcontable');
//BIBLIOTECA DE CONSULTA
Route::get('/operativos/biblioteca', function(){ return view('operativos.biblioteca.home'); })->name('operativos-biblioteca');
//RODAMIENTOS
Route::get('/operativos/rodamientos', function(){ return view('operativos.rodamientos.home'); })->name('operativos-rodamientos');
//TIQUETES
Route::get('/operativos/tiquetes', function(){ return view('operativos.tiquetes.home'); })->name('operativos-tiquetes');
//HASTA AQUI RUTAS NUEVAS - 21-05-2018
//DESDE AQUI RUTAS NUEVAS - 27-05-2018
//SOPORTE
//MI CHAT
Route::get('/soporte/michat', function(){ return view('soporte.michat.home'); })->name('soporte-michat');
//MIS PROCEDIMIENTOS
Route::get('/soporte/misprocedimientos', function(){ return view('soporte.misprocedimientos.home'); })->name('soporte-misprocedimientos');
//ACERCA DE
Route::get('/soporte/acercade', function(){ return view('soporte.acercade.home'); })->name('soporte-acercade');
//NOSOTROS
//NUESTRA EMPRESA
Route::get('/nosotros/nuestraempresa', function(){ return view('nosotros.nuestraempresa.home'); })->name('nosotros-nuestraempresa');
//NOSOTROS
Route::get('/nosotros/nosotroso', function(){ return view('nosotros.nosotroso.home'); })->name('nosotros-nosotroso');
//MIS DEBERES, MIS DERECHOS
Route::get('/nosotros/misdeberesmisderechos', function(){ return view('nosotros.misdeberesmisderechos.home'); })->name('nosotros-misdeberesmisderechos');
//NOTICIAS
Route::get('/nosotros/noticias', function(){ return view('nosotros.noticias.home'); })->name('nosotros-noticias');
//HASTA AQUI RUTAS NUEVAS - 27-05-2018

//DESDE AQUI RUTAS NUEVAS - 11-07-2018
//EXPORTAR HOJA DE CALCULO MOTIVOS ANULACIONES
Route::get('anulaciones-excel','Admin\AnulacionesController@exportarexcel')->name('anulaciones-excel');
//EXPORTAR PDF MOTIVOS ANULACIONES
Route::get('anulaciones-pdf','Admin\AnulacionesController@exportarpdf')->name('anulaciones-pdf');
//HASTA AQUI RUTAS NUEVAS - 11-07-2018

//DESDE AQUI RUTAS NUEVAS - 23-07-2018
//EXPORTAR HOJA DE CALCULO ASEGURADORAS
Route::get('aseguradoras-excel/','Admin\AseguradorasController@exportarexcel')->name('aseguradoras-excel');
//EXPORTAR PDF ASEGURADORAS
Route::get('aseguradoras-pdf','Admin\AseguradorasController@exportarpdf')->name('aseguradoras-pdf');

//EXPORTAR HOJA DE CALCULO ASOCIADOS
Route::get('asociados-excel/','Admin\AsociadosController@exportarexcel')->name('asociados-excel');
//EXPORTAR PDF ASOCIADOS
Route::get('asociados-pdf','Admin\AsociadosController@exportarpdf')->name('asociados-pdf');


//EXPORTAR HOJA DE CALCULO USUARIOS
Route::get('usuarios-excel/','Admin\UsuariosController@exportarexcel')->name('Usuarios-excel');
//EXPORTAR PDF USUARIOS
Route::get('usuarios-pdf','Admin\UsuariosController@exportarpdf')->name('usuarios-pdf');

//EXPORTAR HOJA DE CALCULO TERMINALES DE TRANSPORTE
Route::get('terminalesdatos-excel/','Admin\TerminalesdatosController@exportarexcel')->name('terminalesdatos-excel');
//EXPORTAR PDF TERMINALES DE TRANSPORTE
Route::get('terminalesdatos-pdf','Admin\TerminalesdatosController@exportarpdf')->name('terminalesdatos-pdf');
//EXPORTAR HOJA DE CALCULO CLIENTES CONVENIOS
Route::get('clientesconvenios-excel/','Admin\ClientesconveniosController@exportarexcel')->name('clientesconvenios-excel');
//EXPORTAR PDF CLIENTES CONVENIOS
Route::get('clientesconvenios-pdf','Admin\ClientesconveniosController@exportarpdf')->name('clientesconvenios-pdf');
//EXPORTAR HOJA DE CALCULO CLIENTES CREDITO
Route::get('clientescredito-excel/','Admin\ClientescreditoController@exportarexcel')->name('clientescredito-excel');
//EXPORTAR PDF CLIENTES CREDITO
Route::get('clientescredito-pdf','Admin\ClientescreditoController@exportarpdf')->name('clientescredito-pdf');
//EXPORTAR HOJA DE CALCULO CLIENTES CONTADO
Route::get('clientescontado-excel/','Admin\ClientescontadoController@exportarexcel')->name('clientescontado-excel');
//EXPORTAR PDF CLIENTES CONTADO
Route::get('clientescontado-pdf','Admin\ClientescontadoController@exportarpdf')->name('clientescontado-pdf');

//EXPORTAR HOJA DE CALCULO CLIENTES CONTADO
Route::get('clientescontado-excel/','Admin\ClientescontadoController@exportarexcel')->name('clientescontado-excel');
//EXPORTAR PDF CLIENTES CONTADO
Route::get('clientescontado-pdf','Admin\ClientescontadoController@exportarpdf')->name('clientescontado-pdf');

//16-11-2018
//EXPORTAR HOJA DE CALCULO CAPACITACIONES
Route::get('capacitaciones-excel','Admin\CapacitacionesController@exportarexcel')->name('capacitaciones-excel');
//EXPORTAR PDF  CAPACITACIONES
Route::get('capacitaciones-pdf','Admin\CapacitacionesController@exportarpdf')->name('capacitaciones-pdf');
//EXPORTAR HOJA DE CALCULO EXAMENES MEDICOS
Route::get('examenes-excel','Admin\ExamenesController@exportarexcel')->name('examenes-excel');
//EXPORTAR PDF  EXAMENES MEDICOS
Route::get('examenes-pdf','Admin\ExamenesController@exportarpdf')->name('examenes-pdf');
//EXPORTAR HOJA DE CALCULO PRUEBAS
Route::get('pruebas-excel','Admin\PruebasController@exportarexcel')->name('pruebas-excel');
//EXPORTAR PDF  PRUEBAS
Route::get('pruebas-pdf','Admin\PruebasController@exportarpdf')->name('pruebas-pdf');
//EXPORTAR HOJA DE CALCULO GRUPOS
Route::get('grupos-excel','Admin\GruposController@exportarexcel')->name('grupos-excel');
//EXPORTAR PDF  GRUPOS
Route::get('grupos-pdf','Admin\GruposController@exportarpdf')->name('grupos-pdf');
//EXPORTAR HOJA DE CALCULO TIPO DOCUMENTOS
Route::get('tiposdocumentos-excel','Admin\TiposdocumentosController@exportarexcel')->name('tiposdocumentos-excel');
//EXPORTAR PDF TIPO DOCUMENTOS
Route::get('tiposdocumentos-pdf','Admin\TiposdocumentosController@exportarpdf')->name('tiposdocumentos-pdf');
//EXPORTAR HOJA DE CALCULO ESTADO CIVIL
Route::get('estadocivil-excel','Admin\EstadocivilController@exportarexcel')->name('estadocivil-excel');
//EXPORTAR PDF ESTADO CIVIL
Route::get('estadocivil-pdf','Admin\EstadocivilController@exportarpdf')->name('estadocivil-pdf');
//EXPORTAR HOJA DE CALCULO ESTRATO SOCIAL
Route::get('estratosocial-excel','Admin\EstratosocialController@exportarexcel')->name('estratosocial-excel');
//EXPORTAR PDF ESTRATO SOCIAL
Route::get('estratosocial-pdf','Admin\EstratosocialController@exportarpdf')->name('estratosocial-pdf');
//EXPORTAR HOJA DE CALCULO PAISES
Route::get('paises-excel','Admin\PaisesController@exportarexcel')->name('paises-excel');
//EXPORTAR PDF PAISES
Route::get('paises-pdf','Admin\PaisesController@exportarpdf')->name('paises-pdf');

//EXPORTAR HOJA DE CALCULO DEPARTAMENTOS
Route::get('departamentos-excel','Admin\departamentosController@exportarexcel')->name('departamentos-excel');
//EXPORTAR PDF DEPARTAMENTOS
Route::get('departamentos-pdf','Admin\departamentosController@exportarpdf')->name('departamentos-pdf');
//EXPORTAR HOJA DE CALCULO CIUDADES
Route::get('ciudades-excel','Admin\ciudadesController@exportarexcel')->name('ciudades-excel');
//EXPORTAR PDF CIUDADES
Route::get('ciudades-pdf','Admin\ciudadesController@exportarpdf')->name('ciudades-pdf');
//EXPORTAR HOJA DE CALCULO DIVISIONES
Route::get('divisiones-excel','Admin\DivisionesController@exportarexcel')->name('divisiones-excel');
//EXPORTAR PDF DIVISIONES
Route::get('divisiones-pdf','Admin\DivisionesController@exportarpdf')->name('divisiones-pdf');
//EXPORTAR HOJA DE CALCULO CARGOS
Route::get('cargos-excel','Admin\CargosController@exportarexcel')->name('cargos-excel');
//EXPORTAR PDF  CARGOS
Route::get('cargos-pdf','Admin\CargosController@exportarpdf')->name('cargos-pdf');
//HASTA AQUI RUTAS NUEVAS - 23-07-2018
//EXPORTAR HOJA DE CALCULO TIPOS DE CONTRATO LABORAL
Route::get('contratos-excel','Admin\ContratosController@exportarexcel')->name('contratos-excel');
//EXPORTAR PDF TIPOS DE CONTRATO LABORAL
Route::get('contratos-pdf','Admin\ContratosController@exportarpdf')->name('contratos-pdf');
//EXPORTAR HOJA DE CALCULO DOCUMENTOS
Route::get('documentos-excel','Admin\DocumentosController@exportarexcel')->name('documentos-excel');
//EXPORTAR PDF DOCUMENTOS
Route::get('documentos-pdf','Admin\DocumentosController@exportarpdf')->name('documentos-pdf');
//EXPORTAR HOJA DE CALCULO SEGUROS
Route::get('seguros-excel','Admin\SegurosController@exportarexcel')->name('seguros-excel');
//EXPORTAR PDF SEGUROS
Route::get('seguros-pdf','Admin\SegurosController@exportarpdf')->name('seguros-pdf');
//EXPORTAR HOJA DE CALCULO CONCEPTOS
Route::get('conceptos-excel','Admin\ConceptosController@exportarexcel')->name('conceptos-excel');
//EXPORTAR PDF CONCEPTOS
Route::get('conceptos-pdf','Admin\ConceptosController@exportarpdf')->name('conceptos-pdf');

//EXPORTAR HOJA DE CALCULO OFICINAS
Route::get('oficinas-excel/','Admin\OficinasController@exportarexcel')->name('oficinas-excel');
//EXPORTAR PDF OFICINAS
Route::get('oficinas-pdf','Admin\OficinasController@exportarpdf')->name('oficinas-pdf');


//VEHICULOS 

//EXPORTAR HOJA DE CALCULO VEHICULOS
Route::get('vehiculos-excel','Admin\VehiculosController@exportarexcel')->name('vehiculos-excel');
//EXPORTAR PDF VEHICULOS
Route::get('vehiculos-pdf','Admin\VehiculosController@exportarpdf')->name('vehiculos-pdf');

//EXPORTAR HOJA DE CALCULO CLASES DE VEHICULO
Route::get('clases-excel','Admin\ClasesvehiculosController@exportarexcel')->name('clases-excel');
//EXPORTAR PDF CLASES DE VEHICULO
Route::get('clases-pdf','Admin\ClasesvehiculosController@exportarpdf')->name('clases-pdf');
//EXPORTAR HOJA DE CALCULO MARCAS DE VEHICULO
Route::get('marcas-excel','Admin\MarcasvehiculosController@exportarexcel')->name('marcas-excel');
//EXPORTAR PDF MARCAS DE VEHICULO
Route::get('marcas-pdf','Admin\MarcasvehiculosController@exportarpdf')->name('marcas-pdf');
//EXPORTAR HOJA DE CALCULO COMBUSTIBLES DE VEHICULO
Route::get('tipos-combustible-excel','Admin\TiposcombustibleController@exportarexcel')->name('tipos-combustible-excel');
//EXPORTAR PDF COMBUSTIBLES DE VEHICULO
Route::get('tipos-combustible-pdf','Admin\TiposcombustibleController@exportarpdf')->name('tipos-combustible-pdf');
//EXPORTAR HOJA DE CALCULO CARROCERIAS DE VEHICULO
Route::get('tipos-carrocerias-excel','Admin\TiposcarroceriasController@exportarexcel')->name('tipos-carrocerias-excel');
//EXPORTAR PDF CARROCERIAS DE VEHICULO
Route::get('tipos-carrocerias-pdf','Admin\TiposcarroceriasController@exportarpdf')->name('tipos-carrocerias-pdf');
//EXPORTAR HOJA DE CALCULO COLORES VEHICULO
Route::get('colores-excel','Admin\ColoresvehiculosController@exportarexcel')->name('colores-excel');
//EXPORTAR PDF COLORES VEHICULO
Route::get('colores-pdf','Admin\ColoresvehiculosController@exportarpdf')->name('colores-pdf');
//EXPORTAR HOJA DE CALCULO SERVICIOS VEHICULO
Route::get('servicios-excel','Admin\ServiciosvehiculosController@exportarexcel')->name('servicios-excel');
//EXPORTAR PDF SERVICIOS VEHICULO
Route::get('servicios-pdf','Admin\ServiciosvehiculosController@exportarpdf')->name('servicios-pdf');

Route::resource('/admin/vehiculos/rutas','Admin\RutasadminController');
//EXPORTAR HOJA DE CALCULO RUTAS
Route::get('rutas-excel','Admin\RutasadminController@exportarexcel')->name('rutas-excel');
//EXPORTAR PDF RUTAS
Route::get('rutas-pdf','Admin\RutasautorizadasController@exportarpdf')->name('rutas-pdf');

//EXPORTAR HOJA DE CALCULO RUTAS AUTORIZADAS
Route::get('rutas-autorizadas-excel','Admin\RutasautorizadasController@exportarexcel')->name('rutas-autorizadas-excel');
//EXPORTAR PDF RUTAS AUTORIZADAS
Route::get('rutas-autorizadas-pdf','Admin\RutasautorizadasController@exportarpdf')->name('rutas-autorizadas-pdf');
//EXPORTAR HOJA DE CALCULO LINEAS DE VEHICULO
Route::get('lineas-excel','Admin\LineasvehiculosController@exportarexcel')->name('lineas-excel');
//EXPORTAR PDF LINEAS DE VEHICULO
Route::get('lineas-pdf','Admin\LineasvehiculosController@exportarpdf')->name('lineas-pdf');

//EXPORTAR HOJA DE CALCULO PROPIETARIOS DE VEHICULOS
Route::get('propietarios-excel','Admin\PropietariosController@exportarexcel')->name('propietarios-excel');
//EXPORTAR PDF PROPIETARIOS DE VEHICULOS
Route::get('propietarios-pdf','Admin\PropietariosController@exportarpdf')->name('propietarios-pdf');



//07-09-2018
// NOTIFICACIONES USUARIO
Route::get('tipo/{type}', 'SweetController@notification');

//20-09-2018
//	INDEX
//Route::resource('/admin/auditor/eventos','Admin\AuditoriaController');
Route::get('/admin/auditor/eventos','Admin\AuditoriaController@index')->name('auditoria-eventos');
//EXPORTAR HOJA DE CALCULO AUDITORIA
Route::get('auditoria-excel','Admin\AuditoriaController@exportarexcel')->name('auditoria-excel');
//EXPORTAR PDF AUDITORIA
Route::get('auditoria-pdf','Admin\AuditoriaController@exportarpdf')->name('auditoria-pdf');

//  12- CIUDADES - DEPARTAMENTOS - PAISES 
Route::get('/datos-ciudad','Admin\CiudadesController@datosCiudad')->name('datos-ciudad');

//  12- DATOS MARCA VEHICULO
Route::get('/datos-marca','Admin\LineasvehiculosController@datosMarca')->name('datos-marca');

// CONTADOR DE EXPORTAR
Route::get('/contador','Admin\CiudadesController@contador')->name('contador');

//  12- CARGOS - DIVISIONES
Route::get('/datos-cargo','Admin\ConductoresController@datosCargo')->name('datos-cargo');

//  12- VEHICULOS - PROPIETARIOS
Route::get('/datos-vehiculo','Admin\ConductoresController@datosvehiculo')->name('datos-vehiculo');