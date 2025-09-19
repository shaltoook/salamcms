<?php
function load_css_files() {
	$cssDir = __DIR__ . '/css/';
	$cssFiles = glob($cssDir . '/*.css');

	foreach ($cssFiles as $file) {
		echo '<link href="css/'.basename($file).'" rel="stylesheet">'.PHP_EOL;
	}
}

function load_js_files() {
	$cssDir = __DIR__ . '/js/';
	$cssFiles = glob($cssDir . '/*.js');

	foreach ($cssFiles as $file) {
		echo '<script src="js/'.basename($file).'"></script>'.PHP_EOL;
	}
}

function get_dict() {
	$cssDir = __DIR__ . '/lang/';
	$cssFiles = glob($cssDir . '/*.php');

	$output = array();

	foreach ($cssFiles as $file) {
		$lang = explode('.',basename($file))[0];
		include('lang/'.basename($file));
		$output[$lang] = $string;
	}
	
	return $output;
}
?>