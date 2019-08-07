<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           header.blade.php
//Descripción:      Encabezado de pagina global
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO ENCABEZADO DE PAGINA GLOBAL -->
<header id="header" class="header"> 
  <!-- INICIO DIVISION 1 -->
  <!--    VINCULOS CORPORATIVOS -->
  <!--    VINCULOS REDES SOCIALES -->
  <div class="header-top bg-theme-color-2 sm-text-center p-0">
    <div class="container">
      <div class="row">
        <!-- INCIO VINCULOS CORPORATIVOS -->
        <div class="col-md-4">
          <div class="widget no-border m-0">
            <ul class="list-inline font-13 sm-text-center mt-5">
              <!-- VINCULO CORPORATIVO: PORTAL MIS TIQUETES -->
              @if(Auth::check())
                <li>
                  <a target="blank" class="text-white" href="{{Auth::user()->empresa->m_cacop01}}">Mistiquetes.com</a>
                </li>
                <li class="text-white">|</li>
                <!-- VINCULO CORPORATIVO: PORTAL EMPRESA -->
                <li>
                  <a target="blank" class="text-white" href="{{Auth::user()->empresa->m_cacop02}}">{{Auth::user()->empresa->m_canomco}}</a>
                </li>
                <li class="text-white">|</li>
              @endif
              @guest
                <li>
                  <a class="text-white" href="{{ route('acceso') }}">Acceso</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
        <!-- FIN VINCULOS CORPORATIVOS -->

        <!-- INCIO VINCULOS REDES SOCIALES -->
        <div class="col-md-8">
          <div class="widget no-border m-0 mr-15 pull-right flip sm-pull-none sm-text-center">
            <ul class="styled-icons icon-circled icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
              <!-- VINCULO RED SOCIAL: FACEBOOK -->
              <li>
                <a href="#" class="fa fa-facebook text-white"></a>
              </li>
              <!-- VINCULO RED SOCIAL: TWITTER -->
              <li>
                <a href="#" class="fa fa-twitter text-white"></a>
              </li>
              <!-- VINCULO RED SOCIAL: GOOGLE -->
              <li>
                <a href="#" class="fa fa-google-plus text-white"></a>
              </li>
              <!-- VINCULO RED SOCIAL: INSTAGRAM -->
              <li>
                <a href="#" class="fa fa-instagram text-white"></a>
              </li>
            </ul>
          </div>
        </div>
        <!-- FIN VINCULOS REDES SOCIALES -->
      </div>
    </div>
  </div>
  <!-- FIN DIVISION 1 -->

  <!-- INICIO DIVISION 2 -->
  <!--    LOGO MIS TIQUETES -->
  <!--    INFORMACION OFICINA DEL USUARIO ACTIVO -->
  <!--    INFORMACION USUARIO ACTIVO -->
  <div class="header-middle p-0 bg-lightest xs-text-center">
    <div class="container pt-0 pb-0">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-5">
          <!-- LOGO MIS TIQUETES -->
          <div class="widget no-border mt-0 mb-20 ml-0">
            <a class="menuzord-brand pull-left flip xs-pull-center mb-10"
              data-toggle="modal"
              data-target="#acercade"
              title="Acera de Mis tiquetes...&nbsp&nbsp">
              <img src="{{ asset('images/logo-wide_199.png') }}" alt="">
            </a>
          </div>
        </div>
        @guest
        @else
          <!-- INFORMACION OFICINA DEL USUARIO ACTIVO -->
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-20 m-0">
              <ul class="list-inline">
                <!-- MODAL: OFICINA -->
                  <input type="hidden" name="" id=""> &nbsp;&nbsp;      
                  <input type="image"
                          class=""
                          data-toggle="modal"
                          data-target="#modaloficina"
                          style="border: 0;"
                          data-toggle="tooltip"
                          data-placement="left"
                          title="Oficina...&nbsp&nbsp"
                          src="{{ asset('images/flaticon-png/small/ubicacion_regional_11.jpg') }}">
                <li>
                  <!-- INFORMACION OFICINA NOMBRE -->
                  <h5 class="font-14 m-0"> {{Auth::user()->oficina->m_canombr}} </h5>
                  <!-- INFORMACION OFICINA UBICACION REGIONAL -->
                  <h5 class="font-14 m-0"> {{Session::get('glo_ofi_ubi_reg')}}  </h5>
                </li>
              </ul>
            </div>
          </div>

          <!--    INFORMACION USUARIO ACTIVO -->
          <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-20 m-0">
              @if(Auth::user()->m_catisex=="M")
                <ul class="list-inline">
                  <!-- MODAL: USUARIO ACTIVO - MASCULINO -->
                  <input type="hidden" name="" id=""> &nbsp;&nbsp;      
                  <input type="image"
                          class=""
                          data-toggle="modal"
                          data-target="#modalusuario"
                          style="border: 0;"
                          data-toggle="tooltip"
                          data-placement="left"
                          title="Usuario activo...&nbsp&nbsp"
                          src="{{ asset('images/flaticon-png/small/usuario_hombre_11.jpg') }}">
                  <li>
                    <!--    INFORMACION USUARIO ACTIVO PRIMER NOMBRE -->
                    <h5 class="font-14 m-0"> {{Auth::user()->m_caprnom}} {{Auth::user()->m_casenom}}</h5>
                    <!--    INFORMACION USUARIO ACTIVO PRIMER APELLIDO -->
                    <h5 class="font-14 m-0"> {{Auth::user()->m_caprape}} {{Auth::user()->m_caseape}}</h5>
                  </li>
                </ul>
              @else
                <ul class="list-inline">
                  <!-- MODAL: USUARIO ACTIVO FEMENINO -->
                  <input type="hidden" name="" id=""> &nbsp;&nbsp;      
                  <input type="image"
                          class=""
                          data-toggle="modal"
                          data-target="#modalusuario"
                          style="border: 0;"
                          data-toggle="tooltip"
                          data-placement="left"
                          title="Usuario activo...&nbsp&nbsp"
                          src="{{ asset('images/flaticon-png/small/usuario_mujer_11.jpg') }}">
                  <li>
                    <!--    INFORMACION USUARIO ACTIVO PRIMER NOMBRE -->
                    <h5 class="font-14 m-0"> {{Auth::user()->m_caprnom}} {{Auth::user()->m_casenom}}</h5>
                    <!--    INFORMACION USUARIO ACTIVO PRIMER APELLIDO -->
                    <h5 class="font-14 m-0"> {{Auth::user()->m_caprape}} {{Auth::user()->m_caseape}}</h5>
                  </li>
                </ul>
              @endif
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
  <!-- FIN DIVISION 2 -->

  <!-- INICIO DIVISION 3 -->
  <!--    MENU PRINCIPAL -->
  <div class="header-nav">
    <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-colored border-bottom-theme-color-2-1px">
      <div class="container">
        @guest
        @else
          <!--    MENU PRINCIPAL -->
          @include('partials.menu')
        @endif
      </div>
    </div>
  </div>
  <!-- FIN DIVISION 3 -->

  <!-- INICIO MODAL: INFORMACION DE PRODUCTO -->
  <div id="acercade9999" class="modal fade">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Encabezado -->
      <div class="modal-header" style="background-color: #3498db">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class=" glyphicon glyphicon-question-sign"></span>&nbsp&nbspINFORMACION DE PRODUCTO
        </h3>
      </div>
      <!-- Contenido -->
      <div class="modal-body">
        <div class="container-fluid">
          <!-- INFORMACION DEL PRODUCTO -->
          <div class="row form-group">
            <div class="col-md-3 text-right">
                
            </div>
            <div class="col-md-9">
                <h5 class="font-20 m-0"> Producto activado </h5>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-4 text-right">
                
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/logo-wide_199.png') }}" alt="">
            </div>
          </div>
          <!-- INFORMACION DERECHOS LEGALES -->
          <div class="row form-group">
            <div class="col-md-3 text-right">
            </div>
            <div class="col-md-9">
                <h5 class="font-14 m-0"> &copy;2018. Mis tiquetes. Todos los derechos reservados</h5>
            </div>
          </div>
          <!-- ACERCA DE... -->
          <div class="row form-group">
            <div class="col-md-3 text-right">
            </div>
            <div class="col-md-9">
                <h5 class="font-14 m-0"> Acerca de Mis tiquetes</h5>
            </div>
          </div>
        </div>
        <!-- Contenido -->
          <object width="100%" height="50px" data="{{ asset('document/modulos.pdf') }}"></object>
      </div>
        <!-- Pie -->
      <div class="modal-footer">
        <div class="text-center">
          <button type="button" class="btn btn-warning" data-dismiss="modal" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCerrar</button>
        </div>
      </div>
      </div>
    </div>
  </div>
  <!-- FIN MODAL: ACERCA DE -->

  <!-- INICIO MODAL: INFORMACION DE PRODUCTO -->
  <div id="acercade" class="modal fade" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Encabezado -->
        <div class="modal-header" style="background-color: #3498db">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-info-sign"></span>&nbsp&nbspINFORMACION DE PRODUCTO
          </h3>
        </div>
        <!-- Contenido -->
        <div class="modal-body">
          <!-- INFORMACION DEL PRODUCTO -->
          <div class="row form-group">
            <div class="col-md-3 text-right">
                
            </div>
            <div class="col-md-9">
                <h5 class="font-20 m-0"> Producto activado </h5>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-4 text-right">
                
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/logo-wide_199.png') }}" alt="">
            </div>
          </div>
          <br>
          <!-- INFORMACION PRODUCTOS CONTENIDO -->
          <div class="row form-group">
            <div class="col-md-3 text-right">
            </div>
            <div class="col-md-9">
                <h5 class="font-14 m-0"> Este producto contiene módulos Administrativos y operativos para la administración de empresas del Transporte de pasajeros y carga
                </h5>
            </div>
          </div>
          <br>
          <!-- ACERCA DE -->
          <div class="row form-group">
            <div class="col-md-3 text-right">
            </div>
            <div class="col-md-2">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#cluf" style="text-shadow:2px 2px 4px #000000;"><i class=" fa fa-info-circle" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspAcerca de
              </button>
            </div>
            <div class="col-md-7">
                <h5 class="font-14 m-0"> Más información sobre Mis tiquetes</h5>
            </div>
          </div>
        </div>
        <!-- Pie -->
        <div class="modal-footer">
          <div class="text-center">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCerrar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FIN MODAL: INFORMACION DE PRODUCTO -->

  <!-- INICIO MODAL: ACERCA DE -->
  <div id="cluf" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Encabezado -->
        <div class="modal-header" style="background-color: #3498db">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-info-sign"></span>&nbsp&nbspAcerca de Mis tiquetes
          </h3>
        </div>
        <!-- Contenido -->
        <div class="modal-body">
          <div class="container-fluid">
            <!-- INFORMACION DERECHOS LEGALES -->
            <div class="row form-group">
              <div class="col-md-3 text-right">
              </div>
              <div class="col-md-9">
                  <h5 class="font-14 m-0"> &copy;2018. Mis tiquetes. Todos los derechos reservados</h5>
              </div>
            </div>
            <object width="100%" height="50px" data="{{ asset('document/cluf.pdf') }}"></object>
            </div>
            <br>
            <!-- INFORMACION DERECHOS LEGALES -->
            <div class="row form-group">
              <div class="col-md-0 text-right">
              </div>
              <div class="col-md-12">
                  <p class="font-14 m-0"> 
                    Advertencia: este programa está protegido por las leyes de derechos de autor y otros tratados internacionales. La reproducción o la distribución no autorizadas de este programa o de cualquier parte del mismo está penada por la ley con severas sanciones civiles y penales y será objeto de todas las acciones judiciales que correspondan.
                  </p>
              </div>
            </div>
        </div>
        <!-- Pie -->
        <div class="modal-footer">
          <div class="text-center">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FIN MODAL: ACERCA DE -->

  <!-- INICIO MODAL: OFICINA -->
  @if(Auth::check())
    <div id="modaloficina" class="modal fade">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Encabezado -->
        <div class="modal-header" style="background-color: #3498db">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
           <!-- INFORMACION EMPRESA RAZON SOCIAL -->
          <h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class=" fa fa-bank"></span>&nbsp&nbsp{{Session::get('emp_raz_soc')}}
          <br>
          <!-- INFORMACION EMPRESA NUIP -->
          {{Session::get('emp_nui_p00')}}
          </h3>
        </div>
        <!-- Contenido -->
        <div class="modal-body">
            <!-- INCIO INFORMACION EMPRESA -->
            <div class="container-fluid">
              <!-- INFORMACION OFICINA NOMBRE Y CENTRO DE COSTOS-->
              <div class="row form-group">
                <div class="col-md-3 text-right">
                    <h5 class="font-20 m-0"> <span class="glyphicon glyphicon-home"></span></h5>
                </div>
                <div class="col-md-9">
                    <h5 class="font-14 m-0">{{Auth::user()->oficina->m_canombr}}  - {{Session::get('glo_cen_con_ofi')}} </h5>
                </div>
              </div>
              
              <!-- INFORMACION OFICINA DIRECCION -->
              <div class="row form-group">
                <div class="col-md-3 text-right">
                  <h5 class="font-20 m-0"> <span class="glyphicon glyphicon-map-marker"></span></h5>
                </div>
                <div class="col-md-9">
                    <h5 class="font-14 m-0"> {{Session::get('glo_dir_ecc_ofi')}} </h5>
                </div>
              </div>
                
              <!-- INFORMACION OFICINA UBICACION REGIONAL -->
              <div class="row form-group">
                <div class="col-md-3 text-right">

                </div>
                <div class="col-md-9">
                    <h5 class="font-14 m-0"> {{Session::get('glo_ofi_ubi_reg')}} </h5>
                </div>
              </div>
                
              <!-- INFORMACION OFICINA TELEFONOS -->
              <div class="row form-group">
                <div class="col-md-3 text-right">
                  <h5 class="font-20 m-0"> <span class="glyphicon glyphicon-earphone"></span></h5>
                </div>
                <div class="col-md-9">
                    <h5 class="font-14 m-0"> {{Session::get('glo_tel_fij_ofi')}} - {{Session::get('glo_tel_mov_ofi')}} </h5>
                </div>
              </div>
            
              <!-- INFORMACION OFICINA CORREO ELECTRONICO -->
              <div class="row form-group">
                <div class="col-md-3 text-right">
                  <h5 class="font-20 m-0"> <span class="glyphicon glyphicon-envelope"></span></h5>
                </div>
                <div class="col-md-9">
                    <h5 class="font-14 m-0"> {{Session::get('glo_cor_ele_ofi')}} </h5>
                </div>
              </div>

              <div class="container-fluid" style="background-color: #3498db">
                <!-- INFORMACION OFICINA JEFE -->
                <br>
                <div class="row form-group">
                  <div class="col-md-3 text-center">
                     <h5 class="font-26 m-0"> <span class="glyphicon glyphicon-user"></span></h5>
                  </div>
                  <div class="col-md-9">
                      <h5 class="font-14 m-0"> {{Session::get('glo_jef_nom_ofi')}} </h5>
                      <h5 class="font-12 m-0"> Director </h5>
                  </div>
                </div>

                <!-- INFORMACION OFICINA REVISOR -->
                <div class="row form-group">
                  <div class="col-md-3 text-right">

                  </div>
                  <div class="col-md-9">
                      <h5 class="font-14 m-0"> {{Session::get('glo_rev_nom_ofi')}} </h5>
                      <h5 class="font-12 m-0"> Revisor </h5>
                  </div>
                </div>

                <!-- INFORMACION OFICINA USUARIO ACTIVO -->
                <div class="row form-group">
                  <div class="col-md-3 text-right">

                  </div>
                  <div class="col-md-9">
                      <h5 class="font-14 m-0"> {{Auth::user()->name}} </h5>
                      <h5 class="font-12 m-0"> Usuario activo </h5>
                  </div>
                </div>
              </div>
              <br>

              <!-- INFORMACION EMPRESA SLOGAN -->
              <div class="text-center">
                  {{Session::get('emp_esl_oga')}}
              </div>
            </div>
            <!-- FIN INFORMACION EMPRESA -->
          </div>
        <!-- Pie -->
        <div class="modal-footer">
          <div class="text-center">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCerrar</button>
          </div>
        </div>
        </div>
      </div>
    </div>
    <!-- FIN MODAL: OFICINA -->
    
    <!-- INICIO MODAL: USUARIO ACTIVO -->
    <div id="modalusuario" class="modal fade">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Encabezado -->
        <div class="modal-header" style="background-color: #3498db">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-log-in"></span>&nbsp&nbspUSUARIO ACTIVO
          </h3>
        </div>
        <!-- Contenido -->
        <div class="modal-body">
            <div class="container-fluid">
              <!-- INFORMACION USUARIO ACTIVO NOMBRE -->
              <div class="row form-group">
                <div class="col-md-3 text-right">
                    <h5 class="font-20 m-0"> <span class="glyphicon glyphicon-thumbs-up"></span></h5>
                </div>
                <div class="col-md-9">
                    <h5 class="font-14 m-0"> {{Auth::user()->name}} </h5>
                </div>
              </div>

              <!-- INFORMACION USUARIO ACTIVO CUENTA -->
              <div class="row form-group">
                <div class="col-md-3 text-right">
                    <h5 class="font-20 m-0"> <span class="glyphicon glyphicon-calendar"></span></h5>
                </div>
                <div class="col-md-9">
                    <h5 class="font-14 m-0"> Inicio {{Session::get('glo_usu_cue_ini')}} - Vencimiento {{Session::get('glo_usu_cue_fin')}}</h5>
                </div>
              </div>

            </div>
          </div>
        <!-- Pie -->
        <div class="modal-footer">
          <div class="text-center">
            <button type="button" class="btn btn-warning" data-dismiss="modal" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCerrar</button>
          </div>
        </div>
        </div>
      </div>
    </div>
    <!-- FIN MODAL: USUARIO ACTIVO -->
  @endif

</header>
<!-- FIN ENCABEZADO DE PAGINA GLOBAL -->
