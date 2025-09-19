<?php
include('config.php');
$defaultVersion = $CFG['version'];
echo "Please enter the version [{$defaultVersion}]: ";
$version = trim(fgets(STDIN));
if ($version === "") {
    $version = $defaultVersion;
}

if (!is_dir('builds')) {
    mkdir('builds');
}

$dir = 'builds/' . str_replace('.', '_', $version);
if (!is_dir($dir)) {
    mkdir($dir);
}

$indexFile     = 'index.php';
$configFile    = 'config.php';
$functionsFile = 'functions.php';
$cssDir        = __DIR__ . '/css';
$jsDir         = __DIR__ . '/js';
$langDir       = __DIR__ . '/lang';
$outputFile    = $dir . '/install.php';

function read_php_file_clean($filename) {
    $content = file_get_contents($filename);
    $content = trim($content);
    $content = preg_replace('/^<\?php\s*/', '', $content);
    $content = preg_replace('/\s*\?>\s*$/', '', $content);
    return trim($content);
}

// Read files
$indexContent     = file_get_contents($indexFile);
$configContent    = read_php_file_clean($configFile);
$functionsContent = read_php_file_clean($functionsFile);

// Build CSS inline content
$cssContent = "";
if (is_dir($cssDir)) {
    $cssFiles = glob($cssDir . '/*.css');
    foreach ($cssFiles as $cssFile) {
        $cssData = file_get_contents($cssFile);
        if ($cssData !== false) {
            $cssContent .= "<style>\n" . trim($cssData) . "\n</style>\n";
        }
    }
}

// Build JS inline content
$jsContent = "";
if (is_dir($jsDir)) {
    $jsFiles = glob($jsDir . '/*.js');
    foreach ($jsFiles as $jsFile) {
        $jsData = file_get_contents($jsFile);
        if ($jsData !== false) {
            $jsContent .= "<script>\n" . trim($jsData) . "\n</script>\n";
        }
    }
}

// Build language dictionaries (auto-scan /lang)
$dictContent = "\$dict = [];\n";

$langFiles = glob($langDir . '/*.php');
foreach ($langFiles as $langFile) {
    $lang = basename($langFile, '.php');
    $langData = read_php_file_clean($langFile);

    $dictContent .= "// Language: $lang\n";
    $dictContent .= "\$dict['$lang'] = [];\n";

    // Convert $string[...] into $dict['$lang'][...]
	$langData = preg_replace(
		"/\\\$string\\[['\"](.*?)['\"]\\]\s*=\s*(['\"].*?['\"])\s*;/",
		'\$dict[\'' . $lang . '\'][\'$1\'] = $2;',
		$langData
	);

    $dictContent .= $langData . "\n";
}

// === REPLACEMENTS ===

// Replace include('config.php');
$indexContent = preg_replace(
    "/include\\(['\"]config\\.php['\"]\\);/",
    "\n" . $configContent . "\n",
    $indexContent,
    1
);

// Replace include('functions.php');
$indexContent = preg_replace(
    "/include\\(['\"]functions\\.php['\"]\\);/",
    "\n" . $functionsContent . "\n",
    $indexContent,
    1
);

// Remove some sections;
$indexContent = str_replace("<?php load_css_files(); ?>", "", $indexContent);
$indexContent = str_replace("<?php load_js_files(); ?>", "", $indexContent);
$indexContent = str_replace("include('functions_local.php');", "", $indexContent);

// Replace load_css_files();
$indexContent = str_replace('<!-- LOAD_CSS_FILES_HERE -->', $cssContent, $indexContent);

// Replace load_js_files();
$indexContent = str_replace('<!-- LOAD_JS_FILES_HERE -->', $jsContent, $indexContent);

// Replace $dict = get_dict();
$indexContent = preg_replace(
    '/\$dict\s*=\s*get_dict\s*\(\s*\)\s*;/',
    $dictContent,
    $indexContent,
    1
);

// Save as install.php
if (file_put_contents($outputFile, $indexContent) === false) {
    die("Failed to write $outputFile\n");
}

echo "✅ install.php generated successfully at $outputFile\n";
