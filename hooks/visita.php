<?php
	// For help on using hooks, please refer to https://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function visita_init(&$options, $memberInfo, &$args) {

		return TRUE;
	}

	function visita_header($contentType, $memberInfo, &$args) {
		$header='';

		switch($contentType) {
			case 'tableview':
				$header='';
				break;

			case 'detailview':
				$header='';
				break;

			case 'tableview+detailview':
				$header='';
				break;

			case 'print-tableview':
				$header='';
				break;

			case 'print-detailview':
				$header='';
				break;

			case 'filters':
				$header='';
				break;
		}

		return $header;
	}

	function visita_footer($contentType, $memberInfo, &$args) {
		$footer='';

		switch($contentType) {
			case 'tableview':
				$footer='';
				break;

			case 'detailview':
				$footer='';
				break;

			case 'tableview+detailview':
				$footer='';
				break;

			case 'print-tableview':
				$footer='';
				break;

			case 'print-detailview':
				$footer='';
				break;

			case 'filters':
				$footer='';
				break;
		}

		return $footer;
	}

	function visita_before_insert(&$data, $memberInfo, &$args) {

		return TRUE;
	}

	function visita_after_insert($data, $memberInfo, &$args) {

		return TRUE;
	}

	function visita_before_update(&$data, $memberInfo, &$args) {

		return TRUE;
	}

	function visita_after_update($data, $memberInfo, &$args) {

		return TRUE;
	}

	function visita_before_delete($selectedID, &$skipChecks, $memberInfo, &$args) {

		return TRUE;
	}

	function visita_after_delete($selectedID, $memberInfo, &$args) {

	}

	function visita_dv($selectedID, $memberInfo, &$html, &$args) {
		
		ob_start(); ?>
		
		<script>
			
			$j(function(){
				<?php if($selectedID){ ?>
					$j('#visita_dv_action_buttons .btn-toolbar').append(
						'<div class="btn-group-vertical btn-group-lg" style="width: 100%;">' +
							'<button type="button" class="btn btn-default btn-lg" onclick="print_invoice()">' +
								'<i class="glyphicon glyphicon-print"></i>Posicionar</button>' +
						'</div>'
					);
				<?php } ?>
				<?php if(!$selectedID){ ?>
					$j('#visita_dv_action_buttons .btn-toolbar').append(
						'<div class="btn-group-vertical btn-group-lg" style="width: 100%;">' +
							'<button type="button" class="btn btn-warning btn-lg" id="posicionar" name="posicionar_x" onclick="do_something_else()">' +
								'<i class="glyphicon glyphicon-ok"></i>Posicionar</button>' +
						'</div>'
					);
				<?php } ?>
			});
			
			function print_invoice(){
				var selectedID = '<?php echo urlencode($selectedID); ?>';
				window.location = 'hooks/order_invoice.php?OrderID=' + selectedID;
			}
			
			function do_something_else(){
				window.AppInventor.setWebViewString("Salir")
			}

			var delimiter = ",";
			var posicion = window.AppInventor.getWebViewString().split("\n");
			var posicions = posicion.toString().slice(0,-1);
			var posicionsx = JSON.parse(posicions);
			var today = new Date();
			
					
		    $j('#Nombre').val(posicion);
			$j('#latitud').val(posicionsx.latitud);
			$j('#longitud').val(posicionsx.longitud);
			$j('#direccion').val(posicionsx.direccion);
			$j('#nombre').val(posicionsx.nombre);
			$j('#fecha').val(today.getFullYear());
			$j('#fecha' + '-mm').val(today.getMonth()+1);
			$j('#fecha' + '-dd').val(today.getDate());
			if (posicionsx.ingreso == "salir") { $j('#insert').click(); }	
			$j('#insert').click(); 
			$j('#insert').hide();
			$j('#deselect').hide();
			$j('#posicionar').hide();		

		</script>
		
		<?php
		$form_code = ob_get_contents();
		ob_end_clean();
		
		$html .= $form_code;

	}

	function visita_csv($query, $memberInfo, &$args) {

		return $query;
	}
	function visita_batch_actions(&$args) {

		return [];
	}
