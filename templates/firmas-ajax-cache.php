<?php
	$rdata = array_map('to_utf8', array_map('safe_html', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('safe_html', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'firmas';

		/* data for selected record, or defaults if none is selected */
		var data = {
			id: <?php echo json_encode(['id' => $rdata['id'], 'value' => $rdata['id'], 'text' => $jdata['id']]); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for id */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'id' && d.id == data.id.id)
				return { results: [ data.id ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

