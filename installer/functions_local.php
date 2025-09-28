<?php
function load_css_files() {
	$cssDir = __DIR__ . '/css/';
	$cssFiles = glob($cssDir . '/*.css');

	foreach ($cssFiles as $file) {
		echo '<link href="css/'.basename($file).'" rel="stylesheet">'.PHP_EOL;
	}
}

function load_js_files() {
	$jsDir = __DIR__ . '/js/';
	$jsFiles = glob($jsDir . '/*.js');

	foreach ($jsFiles as $file) {
		echo '<script src="js/'.basename($file).'"></script>'.PHP_EOL;
	}
}

function get_dict() {
	$langDir = __DIR__ . '/lang/';
	$langFiles = glob($langDir . '/*.php');

	$output = array();

	foreach ($langFiles as $file) {
		$lang = explode('.',basename($file))[0];
		include('lang/'.basename($file));
		$output[$lang] = $string;
	}
	
	return $output;
}
?>