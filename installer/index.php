<?php
#Salam!
session_start();
//ini_set('display_errors', true);
include('config.php');
include('functions.php');

if(req('lang')) {
	set_sess('lang', req('lang'));
}

$lang = get_lang();
$dir = get_dir();
$dict = get_dict();

if(req('ajax')) {
	
}
if(req('clevel')) {
	if(sess('current_level') > req('clevel'))
		set_sess('current_level', req('clevel'));
}
if(req('level')) {
	$functionName = 'process_level_' . req('level');
	if (function_exists($functionName)) {
		$result = $functionName();
	}
}

$clevel = get_current_level();
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
				<div id="mainSideMenu">
				<?php
					$menuItems = get_menu_items();
					show_menu($menuItems, $clevel);
				?>
				</div>
			</div>
			<div id="mainBody">
				<div id="mainBodyHead">
				<?php echo $menuItems[1]; ?>
				</div>
				<form action="" method="post" >
					<?php 
						show_notifications();
					?>
					<div id="mainBodyContent">
						<?php echo show_body_content(); ?>
					</div>
					
					<div id="mainBodyBtns">
						<input type="hidden" name="level" value="<?php echo $clevel; ?>" >
						<?php show_back_btn(); ?>
						<?php show_next_btn(); ?>
					</div>
				</form>
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