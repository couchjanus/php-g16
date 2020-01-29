<?php
date_default_timezone_set('Europe/Kiev');    
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);
// ============================================



require_once dirname(__DIR__).'/config/app.php';

spl_autoload_register(function($class) {
	$file = CORE."/".$class.EXT;
	if(is_file($file)) {
		require_once $file;
	}
	
	// $filename = MODELS . $class . EXT;

	// if (file_exists($filename)) {
	// 	include_once $filename;
	// }
});

// spl_autoload_register(function($class) {
// 	$file = ROOT.'/'.str_replace('\\', '/', $class).'.php';
// 	var_dump($file);
// 	if(is_file($file)) {
// 		require_once $file;
// 	}
// });

// use core\App;

$app = new App();
$app->init();

// $app = new \core\App();
// $app->init();

