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

		ob_start(); ?>
		
		<script>
		 document.write("The value from the app is<br />" + window.AppInventor.getWebViewString());
		 window.AppInventor.setWebViewString("hello from Javascript");	
		</script>
		
		<?php
		$form_code = ob_get_contents();
		ob_end_clean();
		$html .= $form_code;

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

	}

	function visita_csv($query, $memberInfo, &$args) {

		return $query;
	}
	function visita_batch_actions(&$args) {

		return [];
	}
