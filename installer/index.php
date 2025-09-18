<?php
#Salam!
//ini_set('display_errors', true);
include('config.php');
include('functions.php');
$lang = 'en';
$dir = get_dir();
$dict = get_dict();
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
	<title><?php echo get_string('title'); ?></title>
<?php
	load_css_files();
	load_js_files();
?>
</head>
<body>
	<div id="wrapper">
		<div id="mainStage">
			<div id="mainSide">
				<div id="mainSideLogo">
					<div id="logoSVG"><?php echo get_logo(); ?></div>
					<?php echo $CFG['brand']; ?>
				</div>
			</div>
			<div id="mainBody">

			</div>
		</div>
		<div id="footer">
			<div>
				<?php echo get_string('installerversion').' '.$CFG['version']; ?>
			</div>
			<div>
				<a id="websiteURL" href="<?php echo $CFG['website_url']; ?>" target="_blank">
				<?php echo $CFG['website_title']; ?>
				</a>
			</div>
		</div>
	</div>
</body>
</html>