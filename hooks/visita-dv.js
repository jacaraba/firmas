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

})