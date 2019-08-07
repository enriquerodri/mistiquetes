<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           footr.blade.php
//Descripción:      Pie de pagina global
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO PIE DE PAGINA GLOBAL -->
<footer id="footer" class="footer divider layer-overlay overlay-dark-9" data-bg-img="{{ asset('images/slider1.jpg') }}">
  <div class="footer-bottom bg-black-333">
    <div class="container pt-20 pb-20">
      <div class="row">
        <div class="col-md-6">
          <!-- ACTUALIZADO 19-05-2018 – INICIO -->
          <!-- <p class="font-11 text-black-777 m-0">Copyright &copy;2018. Todos los derechos reservados</p> -->
          <p class="font-14 text-black-777 m-0">&copy;2020. Mis tiquetes. Todos los derechos reservados</p>
          <!-- ACTUALIZADO 19-05-2018 – INICIO -->
        </div>
        <div class="col-md-6 text-right">
          <div class="widget no-border m-0">
            <ul class="list-inline sm-text-center mt-5 font-12">
              <li>
                <a class="font-14 text-white-777 m-0" href="{{ route('soporte') }}">FAQs
                </a>
              </li>
              <li>|</li>
              <li>
                <a class="font-14 text-white-777 m-0" href="{{ route('soporte') }}">Ayuda
                </a>
              </li>
              <li>|</li>
              <li>
                <a class="font-14 text-white-777 m-0" href="{{ route('soporte') }}">Contacto
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- FIN PIE DE PAGINA GLOBAL -->
