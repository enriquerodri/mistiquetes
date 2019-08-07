@extends('template')
@section('content')
    <div id="holas">
      <!-- Datepicker Markup -->
      <input type="hidden" name="fecha" id="fecha">
      <span class="glyphicon glyphicon-th"></span>
    </div>
    <script type="text/javascript">
      $(".glyphicon").click(function(){
        $("#fecha").datepicker("show");
      });
    </script>
@endsection