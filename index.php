<?php include 'buscador.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>
<script
src="https://code.jquery.com/jquery-2.2.4.js"
integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
crossorigin="anonymous"></script>
<script>
$(function() {

  $('#mostrarTodos').click(function() {

    $.ajax({
          url: 'data-1.json',
          dataType: 'json',
          success: function(data) {
             var items = []
             $.each(data, function(key, elemento) {

            $('.row').append('<div class="col s7"><img src="img/home.jpg" width= "50%"/></div><div class="col s5">Ciudad:<lu id="' +  key + '">'+ elemento.Ciudad + '</lu><br>Dirección:<lu id="' +  key + '">'+ elemento.Direccion + '</lu><br>Teléfono:<lu id="' +  key + '">'+ elemento.Telefono + '</lu><br>Precio:<lu id="' +  key + '">'+ elemento.Precio + '</lu><br></div><br>')
             });
          },
        }),
        $('.row').show();
  });
//--------------------
$('#submitButton').click(function() {

  $.ajax({
        url: 'data-1.json',
        dataType: 'json',
        type: "POST",

        success: function(data) {

          var ciudad = $('#selectCiudad').val();
          var tipo = $('#selectTipo').val();
          var precio = $('#rangoPrecio').val();
          var posicion = precio.lastIndexOf(";");
          var precioinicial = precio.substring(0,posicion);
          var preciofinal = precio.substring(posicion + 1,9);


           $.each(data, function(key, elemento) {
          var preciopropiedad = elemento.Precio.substring(1,9);
          var preciopropiedadnew =preciopropiedad.replace(',','');


          if ((preciopropiedadnew >= precioinicial && preciopropiedadnew <= preciofinal) && (elemento.Ciudad == ciudad && elemento.Tipo == tipo)) {
              $('.row').append('<div class="col s7"><img src="img/home.jpg" width= "50%"/></div><div class="col s5">Ciudad:<lu id="' +  key + '">'+ elemento.Ciudad + '</lu><br>Dirección:<lu id="' +  key + '">'+ elemento.Direccion + '</lu><br>Tipo:<lu id="' +  key + '">'+ elemento.Tipo + '</lu><br>Precio:<lu id="' +  key + '">'+ elemento.Precio + '</lu><br></div><br>')
          }
          if ((preciopropiedadnew >= precioinicial && preciopropiedadnew <= preciofinal) && (elemento.Ciudad == ciudad && tipo =='')) {
                 $('.row').append('<div class="col s7"><img src="img/home.jpg" width= "50%"/></div><div class="col s5">Ciudad:<lu id="' +  key + '">'+ elemento.Ciudad + '</lu><br>Dirección:<lu id="' +  key + '">'+ elemento.Direccion + '</lu><br>Tipo:<lu id="' +  key + '">'+ elemento.Tipo + '</lu><br>Precio:<lu id="' +  key + '">'+ elemento.Precio + '</lu><br></div><br>')
          }
          if ((preciopropiedadnew >= precioinicial && preciopropiedadnew <= preciofinal) && (elemento.tipo == tipo && ciudad =='')) {
                 $('.row').append('<div class="col s7"><img src="img/home.jpg" width= "50%"/></div><div class="col s5">Ciudad:<lu id="' +  key + '">'+ elemento.Ciudad + '</lu><br>Dirección:<lu id="' +  key + '">'+ elemento.Direccion + '</lu><br>Tipo:<lu id="' +  key + '">'+ elemento.Tipo + '</lu><br>Precio:<lu id="' +  key + '">'+ elemento.Precio + '</lu><br></div><br>')
          }
          if ((preciopropiedadnew >= precioinicial && preciopropiedadnew <= preciofinal) && (tipo =='' && ciudad =='')) {
                 $('.row').append('<div class="col s7"><img src="img/home.jpg" width= "50%"/></div><div class="col s5">Ciudad:<lu id="' +  key + '">'+ elemento.Ciudad + '</lu><br>Dirección:<lu id="' +  key + '">'+ elemento.Direccion + '</lu><br>Tipo:<lu id="' +  key + '">'+ elemento.Tipo + '</lu><br>Precio:<lu id="' +  key + '">'+ elemento.Precio + '</lu><br></div><br>')
          }

           });

        },
      }),

      $('.row').show();
});

  })
</script>

<body>
  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Buscador</h1>
    </div>
    <div class="colFiltros">
      <form method="POST" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Realiza una búsqueda personalizada</h5>
          </div>
          <div class="filtroCiudad input-field">
            <label for="selectCiudad">Ciudad:</label><br><br>
            <select class="browser-default" name="sciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
              <?php foreach ($ciudades as $key => $value) { ?>
                <option value="<?php echo $value ?>"><?php echo $value ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <label for="selecTipo">Tipo:</label><br><br>
            <select class="browser-default" name="stipo" id="selectTipo">
              <option value="" selected>Elige un tipo</option>
              <?php foreach ($tipos as $key => $value) { ?>
                <option value="<?php echo $value ?>"><?php echo $value ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="button" class="btn-flat waves-effect" value="Buscar" id="submitButton">

          </div>
        </div>
      </div>
      <div class="colContenido">
        <div class="tituloContenido card">
          <h5>Resultados de la búsqueda:</h5>
          <div class="divider"></div>
          <button type="button" name="todos" class="btn-flat waves-effect" id="mostrarTodos">Mostrar Todos</button>
                <div class="row" hidden >
                </div>
      </div>
          </div>
        </div>
      </form>
  </div>
  <script type="text/javascript" src="js/jquery-3.0.0.js"></script>
  <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
</body>
</html>
