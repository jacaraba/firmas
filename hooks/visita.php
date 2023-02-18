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
			const l = window.AppInventor.getWebViewString();
            const ls = "\'" + window.AppInventor.getWebViewString() + "\'";
			const lsm = JSON.parse(ls);

			$j('#latitud').val(l);
			$j('#longitud').val(l.length);
			$j('#direccion').val(lsm.name);

			$j(function(){
				<?php if($selectedID){ ?>
					$j('#visita_dv_action_buttons .btn-toolbar').append(
						'<div class="btn-group-vertical btn-group-lg" style="width: 100%;">' +
							'<button type="button" class="btn btn-default btn-lg" onclick="print_invoice()">' +
								'<i class="glyphicon glyphicon-print"></i> Print Invoice</button>' +
							'<button type="button" class="btn btn-warning btn-lg" onclick="do_something_else()">' +
								'<i class="glyphicon glyphicon-ok"></i> Do Something Else!</button>' +
						'</div>'
					);
				<?php } ?>
			});
			
			function print_invoice(){
				var selectedID = '<?php echo urlencode($selectedID); ?>';
				window.location = 'hooks/order_invoice.php?OrderID=' + selectedID;
			}
			
			function do_something_else(){
				
		    window.AppInventor.setWebViewString("hello from Javascript");
			alert(window.AppInventor.getWebViewString());


			}
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
