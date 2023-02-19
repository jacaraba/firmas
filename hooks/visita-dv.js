function show_error(field, msg){
	
	modal_window({
		message: '<div class="alert alert-danger">' + msg + '</div>',
		title: 'Error in ' + field,
		close: function(){
			$j('#' + field).focus();
			$j('#' + field).parents('.form-group').addClass('has-error');
		}
	});
	
	return false;
}

function get_date(date_field){
	var y = $j('#' + date_field).val();
	var m = $j('#' + date_field + '-mm').val();
	var d = $j('#' + date_field + '-dd').val();
	
	var date_object = new Date(y, m - 1, d);
	
	if(!y) return false;
	
	return date_object;
}

$j(function(){
	$j('#update, #insert').click(function(){
		/* Valida el campo latitud */
		var latitud = $j('#latitud').val();
		var longitud = $j('#longitud').val();
	
		if(isNaN(latitud) || latitud < 1 || latitud > 500){
			
			return show_error('Latitud', '');
		}

		if(isNaN(longitud) || longitud < 1 || longitud > 500){
			return show_error('longitud', '');
		}
	});

	$j('#update').click(function(){
		/* Make sure shipped date is today or older, but not older than order date */
		var now = new Date();
		var fecha = get_date('fecha');
		
		if(fecha && (fecha > now)){
			return show_error('fecha', 'Solo puede ser fechas anteriores a la fecha original');
		}
	});
	
	$j('#insert').click(function(){
		
		var now = new Date();
		var fecha = get_date('fecha');

		if(fecha && (fecha == now)){
			return show_error('fecha', 'Solo puede ser la fecha de hoy');
		}

	});



})