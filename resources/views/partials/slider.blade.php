<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           slider.blade.php
//Descripción:      Diapositivas pagina de inicio
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO DIAPOSITIVAS PAGINA DE INICIO -->
<!-- INICIO .rev_slider_wrapper -->
<div class="rev_slider_wrapper">
  <!-- INICIO .rev_slider -->
  <div class="rev_slider" data-version="5.0">
    <ul>
      <!-- ADMINISTRATIVOS -->
      <!-- SLIDE - DIAPOSITIVA 1 -->
      <!-- DIAPOSITIVA 1 - IMAGEN - VEHICULO BUS BLANCO (slider01.jpg) -->
      <li data-index="rs-1" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{ asset('images/slider01.jpg') }}" data-rotate="0" data-saveperformance="off" data-title="Slide 1" data-description="">
        <!-- DIAPOSITIVA 1 - IMAGEN - VEHICULO BUS BLANCO (slider01.jpg) -->
        <img src="{{ asset('images/slider01.jpg') }}"  alt=""  data-bgposition="center 10%" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
        <!-- DIAPOSITIVA 1 - CAPA 1 - TITULO: TRANSPORTE -->
        <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-theme-colored-transparent border-left-theme-color-2-6px pl-20 pr-20"
          id="rs-1-layer-1"

          data-x="['left']"
          data-hoffset="['30']"
          data-y="['middle']"
          data-voffset="['-110']" 
          data-fontsize="['100']"
          data-lineheight="['110']"
          data-width="none"
          data-height="none"
          data-whitespace="nowrap"
          data-transform_idle="o:1;s:500"
          data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
          data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
          data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
          data-start="1000" 
          data-splitin="none" 
          data-splitout="none" 
          data-responsive_offset="on"
          style="z-index: 7; white-space: nowrap; font-weight:700;"> Transporte  
        </div>

        <!-- DIAPOSITIVA 1 - CAPA 2 - TITULO: TERRESTRE -->
        <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-theme-colored-transparent border-left-theme-color-2-6px pl-20 pr-20"
          id="rs-1-layer-2"

          data-x="['left']"
          data-hoffset="['35']"
          data-y="['middle']"
          data-voffset="['-25']" 
          data-fontsize="['35']"
          data-lineheight="['54']"
          data-width="none"
          data-height="none"
          data-whitespace="nowrap"
          data-transform_idle="o:1;s:500"
          data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
          data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
          data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
          data-start="1000" 
          data-splitin="none" 
          data-splitout="none" 
          data-responsive_offset="on"
          style="z-index: 7; white-space: nowrap; font-weight:600;">Terrestre
        </div>

        <!-- DIAPOSITIVA 1 - CAPA 3 - TITULO: DESCRIPCION MODULOS ADMINISTRATIVOS -->
        <div class="tp-caption tp-resizeme text-black" 
          id="rs-1-layer-3"

          data-x="['left']"
          data-hoffset="['35']"
          data-y="['middle']"
          data-voffset="['35']"
          data-fontsize="['16']"
          data-lineheight="['28']"
          data-width="none"
          data-height="none"
          data-whitespace="nowrap"
          data-transform_idle="o:1;s:500"
          data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
          data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
          data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
          data-start="1400" 
          data-splitin="none" 
          data-splitout="none" 
          data-responsive_offset="on"
          style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400; background-color: white">&nbsp&nbspMódulos administrativos para conductores, parque automotor, propietarios y mucho más...&nbsp&nbsp
        </div>

        <!-- DIAPOSITIVA 1 - CAPA 4 - BOTON: INGRESAR -->
        <!-- 26-08-2018 -->
        <!-- MODULOS ADMINISTRATIVOS -->
        @if(Auth::user()->m_capap22=="SI")
          <div class="tp-caption tp-resizeme" 
            id="rs-1-layer-4"

            data-x="['left']"
            data-hoffset="['35']"
            data-y="['middle']"
            data-voffset="['100']"
            data-width="none"
            data-height="none"
            data-whitespace="nowrap"
            data-transform_idle="o:1;"
            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
            data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
            data-start="1400" 
            data-splitin="none" 
            data-splitout="none" 
            data-responsive_offset="on"
            style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a class="btn btn-colored btn-lg btn-flat btn-theme-colored border-left-theme-color-2-6px pl-20 pr-20" href="{{ route('admin') }}">Ingresar</a> 
          </div>
        @endif
      </li>

      <!-- OPERATIVOS - MIS TIQUETES-->
      <!-- SLIDE - DIAPOSITIVA 2 -->
      <!-- DIAPOSITIVA 2 - IMAGEN - HUMANOS Y MALETAS (slider02.jpg) -->
      <li data-index="rs-2" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{ asset('images/slider02.jpg') }}" data-rotate="0" data-saveperformance="off" data-title="Slide 2" data-description="">
        <!-- DIAPOSITIVA 2 - IMAGEN - HUMANOS Y MALETAS (slider02.jpg) -->
        <img src="{{ asset('images/slider02.jpg') }}"  alt=""  data-bgposition="center 40%" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
        <!-- DIAPOSITIVA 2 - CAPA 1 - TITULO: VENTA DE TIQUETES -->
        <div class="tp-caption tp-resizeme text-uppercase  bg-dark-transparent-5 text-white font-raleway border-left-theme-color-2-6px border-right-theme-color-2-6px pl-30 pr-30"
          id="rs-2-layer-1"
        
          data-x="['center']"
          data-hoffset="['0']"
          data-y="['middle']"
          data-voffset="['-90']" 
          data-fontsize="['28']"
          data-lineheight="['54']"
          data-width="none"
          data-height="none"
          data-whitespace="nowrap"
          data-transform_idle="o:1;s:500"
          data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
          data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
          data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
          data-start="1000" 
          data-splitin="none" 
          data-splitout="none" 
          data-responsive_offset="on"
          style="z-index: 7; white-space: nowrap; font-weight:400; border-radius: 30px;">Venta de Tiquetes 
        </div>

        <!-- DIAPOSITIVA 2 - CAPA 2 - TITULO: FACIL, RAPIDO Y EFICIENTE -->
        <div class="tp-caption tp-resizeme text-uppercase bg-theme-colored-transparent text-white font-raleway pl-30 pr-30"
          id="rs-2-layer-2"

          data-x="['center']"
          data-hoffset="['0']"
          data-y="['middle']"
          data-voffset="['-20']"
          data-fontsize="['48']"
          data-lineheight="['70']"
          data-width="none"
          data-height="none"
          data-whitespace="nowrap"
          data-transform_idle="o:1;s:500"
          data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
          data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
          data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
          data-start="1000" 
          data-splitin="none" 
          data-splitout="none" 
          data-responsive_offset="on"
          style="z-index: 7; white-space: nowrap; font-weight:700; border-radius: 30px;"> Fácil, rápido y Eficiente
        </div>

        <!-- DIAPOSITIVA 2 - CAPA 3 - TITULO: DESCRIPCION PAGINAS -->
        <div class="tp-caption tp-resizeme text-black text-center" 
          id="rs-2-layer-3"

          data-x="['center']"
          data-hoffset="['0']"
          data-y="['middle']"
          data-voffset="['50']"
          data-fontsize="['16']"
          data-lineheight="['28']"
          data-width="none"
          data-height="none"
          data-whitespace="nowrap"
          data-transform_idle="o:1;s:500"
          data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
          data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
          data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
          data-start="1400" 
          data-splitin="none" 
          data-splitout="none" 
          data-responsive_offset="on"
          style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400; background-color: white">&nbsp&nbspPáginas para venta de tiquetes, despacho de vehículos, caja y mucho más...&nbsp&nbsp
        </div>

        <!-- DIAPOSITIVA 2 - CAPA 4 - BOTON: INGRESAR -->
        <!-- 26-08-2018 -->
        @if(Auth::user()->m_capap23=="SI")
          <!-- VENTAS ENCOMIENDAS - GIROS - TIQUETES -->
          @if(Auth::user()->m_capap12=="SI")
            <div class="tp-caption tp-resizeme" 
              id="rs-2-layer-4"

              data-x="['center']"
              data-hoffset="['0']"
              data-y="['middle']"
              data-voffset="['115']"
              data-width="none"
              data-height="none"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
              data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
              data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
              data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
              data-start="1400" 
              data-splitin="none" 
              data-splitout="none" 
              data-responsive_offset="on"
              style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a class="btn btn-default btn-circled btn-transparent pl-20 pr-20" href="{{ route('operativos-tiquetes') }}">Ingresar</a> 
            </div>
          @endif
        @endif
      </li>

      <!-- OPERATIVOS - MIS TIQUETES-->
      <!-- SLIDE - DIAPOSITIVA 3 -->
      <!-- DIAPOSITIVA 3 - IMAGEN - CAJAS (slider02.jpg) -->
      <li data-index="rs-3" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{ asset('images/slider03.png') }}" data-rotate="0" data-saveperformance="off" data-title="Slide 3" data-description="">
        <!-- DIAPOSITIVA 3 - IMAGEN - CAJAS (slider02.jpg) -->
        <img src="{{ asset('images/slider03.png') }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
        <!-- DIAPOSITIVA 3 - CAPA 1 - TITULO: CARGA Y GISROS -->
        <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-theme-colored-transparent border-right-theme-color-2-6px pr-20 pl-20"
          id="rs-3-layer-1"

          data-x="['right']"
          data-hoffset="['30']"
          data-y="['middle']"
          data-voffset="['-90']" 
          data-fontsize="['64']"
          data-lineheight="['72']"
          data-width="none"
          data-height="none"
          data-whitespace="nowrap"
          data-transform_idle="o:1;s:500"
          data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
          data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
          data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
          data-start="1000" 
          data-splitin="none" 
          data-splitout="none" 
          data-responsive_offset="on"
          style="z-index: 7; white-space: nowrap; font-weight:600;">Carga y Giros
        </div>

        <!-- DIAPOSITIVA 3 - CAPA 2 - TITULO: RAPIDO Y ECONOMICO -->
        <div class="tp-caption tp-resizeme text-uppercase bg-dark-transparent-6 text-white font-raleway pl-20 pr-20"
          id="rs-3-layer-2"

          data-x="['right']"
          data-hoffset="['35']"
          data-y="['middle']"
          data-voffset="['-25']" 
          data-fontsize="['32']"
          data-lineheight="['54']"
          data-width="none"
          data-height="none"
          data-whitespace="nowrap"
          data-transform_idle="o:1;s:500"
          data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
          data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
          data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
          data-start="1000" 
          data-splitin="none" 
          data-splitout="none" 
          data-responsive_offset="on"
          style="z-index: 7; white-space: nowrap; font-weight:600;">Rápido y Económico
        </div>

        <!-- DIAPOSITIVA 3 - CAPA 3 - TITULO: DESCRIPCION PAGINAS -->
        <div class="tp-caption tp-resizeme text-black text-right" 
          id="rs-3-layer-3"

          data-x="['right']"
          data-hoffset="['35']"
          data-y="['middle']"
          data-voffset="['30']"
          data-fontsize="['16']"
          data-lineheight="['28']"
          data-width="none"
          data-height="none"
          data-whitespace="nowrap"
          data-transform_idle="o:1;s:500"
          data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
          data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
          data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
          data-start="1400" 
          data-splitin="none" 
          data-splitout="none" 
          data-responsive_offset="on"
          style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400; background-color: white">&nbsp&nbspPáginas para registro de carga, giros y mucho más...&nbsp&nbsp
        </div>

        <!-- DIAPOSITIVA 3 - CAPA 4 - BOTON: INGRESAR -->
        <!-- 26-08-2018 -->
        @if(Auth::user()->m_capap23=="SI")
          <!-- VENTAS ENCOMIENDAS - GIROS - TIQUETES -->
          @if(Auth::user()->m_capap12=="SI")
            <div class="tp-caption tp-resizeme" 
              id="rs-3-layer-4"

              data-x="['right']"
              data-hoffset="['35']"
              data-y="['middle']"
              data-voffset="['95']"
              data-width="none"
              data-height="none"
              data-whitespace="nowrap"
              data-transform_idle="o:1;"
              data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
              data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
              data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
              data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
              data-start="1400" 
              data-splitin="none" 
              data-splitout="none" 
              data-responsive_offset="on"
              style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a class="btn btn-colored btn-lg btn-flat btn-theme-colored btn-theme-colored border-right-theme-color-2-6px pl-20 pr-20" href="{{ route('operativos-tiquetes') }}">Ingresar</a> 
            </div>
          @endif
        @endif
      </li>
    </ul>
  </div>
  <!-- FIN .rev_slider -->
</div>
<!-- FIN .rev_slider_wrapper -->

<!-- INICIO SCRIPT DIAPOSITIVAS -->
<script>
  $(document).ready(function(e) {
    $(".rev_slider").revolution({
      sliderType:"standard",
      sliderLayout: "auto",
      dottedOverlay: "none",
      delay: 5000,
      navigation: {
          keyboardNavigation: "off",
          keyboard_direction: "horizontal",
          mouseScrollNavigation: "off",
          onHoverStop: "off",
          touch: {
              touchenabled: "on",
              swipe_threshold: 75,
              swipe_min_touches: 1,
              swipe_direction: "horizontal",
              drag_block_vertical: false
          },
        arrows: {
          style:"zeus",
          enable:true,
          hide_onmobile:true,
          hide_under:600,
          hide_onleave:true,
          hide_delay:200,
          hide_delay_mobile:1200,
          tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
          left: {
            h_align:"left",
            v_align:"center",
            h_offset:30,
            v_offset:0
          },
          right: {
            h_align:"right",
            v_align:"center",
            h_offset:30,
            v_offset:0
          }
        },
        bullets: {
          enable:true,
          hide_onmobile:true,
          hide_under:600,
          style:"metis",
          hide_onleave:true,
          hide_delay:200,
          hide_delay_mobile:1200,
          direction:"horizontal",
          h_align:"center",
          v_align:"bottom",
          h_offset:0,
          v_offset:30,
          space:5,
          tmp:'<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">Ir a...</span>'
        }
      },
      responsiveLevels: [1240, 1024, 778],
      visibilityLevels: [1240, 1024, 778],
      gridwidth: [1170, 1024, 778, 480],
      gridheight: [650, 768, 960, 720],
      lazyType: "none",
      parallax: {
          origo: "slidercenter",
          speed: 1000,
          levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
          type: "scroll"
      },
      shadow: 0,
      spinner: "off",
      stopLoop: "on",
      stopAfterLoops: 0,
      stopAtSlide: -1,
      shuffle: "off",
      autoHeight: "off",
      fullScreenAutoWidth: "off",
      fullScreenAlignForce: "off",
      fullScreenOffsetContainer: "",
      fullScreenOffset: "0",
      hideThumbsOnMobile: "off",
      hideSliderAtLimit: 0,
      hideCaptionAtLimit: 0,
      hideAllCaptionAtLilmit: 0,
      debugMode: false,
      fallbacks: {
          simplifyAll: "off",
          nextSlideOnWindowFocus: "off",
          disableFocusListener: false,
      }
    });
  });
</script>
<!-- FIN SCRIPT DIAPOSITIVAS -->
<!-- FIN DIAPOSITIVAS PAGINA DE INICIO -->
