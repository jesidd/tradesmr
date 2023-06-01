function seleccionarOpcion() {
	var select1 = document.getElementById("codeEliminar");
	var select2 = document.getElementById("productoEliminar");
  
	var opcionSeleccionada = select1.selectedIndex;
	var opcionSeleccionada2 = select2.selectedIndex;
  
	select2.selectedIndex = opcionSeleccionada;
	
  }

  function seleccionarOpcion2() {
	var select1 = document.getElementById("codeEliminar");
	var select2 = document.getElementById("productoEliminar");
  
	var opcionSeleccionada = select2.selectedIndex;
  
	select1.selectedIndex = opcionSeleccionada;
	
  }

  function buscarCategoria() {
	var codigoSeleccionado = $('#codigoEditar').val();
	
	$.ajax({
	  url: '../../controlador/action/act_listartodo.php',
	  type: 'POST',
	  data: { codigo: codigoSeleccionado },
	  success: function(response) {

		// La respuesta del servidor se maneja en la variable 'response'
		var datos = JSON.parse(response);

		// Realiza las operaciones necesarias con los datos
		document.getElementById("categoriaProductoEditar").value= datos.categoria;
		document.getElementById("productoEditar").value= datos.nombre;
		document.getElementById("nuevoAtributo").value= datos.precio;
		document.getElementById("existenciaEditar").value= datos.cantidad;

		console.log(datos);
	  },
	  error: function() {
		console.log('Error al realizar la solicitud');
	  }
	});
  }

