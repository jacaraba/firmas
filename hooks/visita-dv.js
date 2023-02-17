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
		
		window.AppInventor.setWebViewString("Firmar");
		
		if(isNaN(latitud) || latitud < 1 || latitud > 500){
			return show_error('Latitud', 'Esta fuera de los Limites de Cali');
		}

		if(isNaN(longitud) || longitud < 1 || longitud > 500){
			return show_error('longitud', 'Esta fuera de los Limites de Cali');
		}
	});

	$j('#update').click(function(){
		/* Make sure shipped date is today or older, but not older than order date */
		var now = new Date();
		var OrderDate = get_date('OrderDate');
		var ShippedDate = get_date('ShippedDate');
		
		if(ShippedDate && (ShippedDate < OrderDate || ShippedDate > now)){
			return show_error('ShippedDate', 'Shipped date must be set to today or earlier, but not earlier than order date.');
		}
	});
	
	$j('#insert').click(function(){
		var OrderDate = get_date('OrderDate');
		var today = new Date();
		var yesterday = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 1);
		var tomorrow = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1);
		
		/* Make sure order date is yesterday, today or tomorrow */
		if(OrderDate < yesterday || OrderDate > tomorrow){
			return show_error('OrderDate', 'Order date can only be yesterday, today or tomorrow');
		}
		
		/* Make sure required date is at least one day after order date */
		var RequiredDate = get_date('RequiredDate');
		var min_date = new Date(OrderDate.getFullYear(), OrderDate.getMonth(), OrderDate.getDate() + 1);
		
		if(RequiredDate && RequiredDate < min_date){
			return show_error('RequiredDate', 'Required date must be at least one day after order date.');
		}
	});

})