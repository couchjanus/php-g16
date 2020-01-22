<?php
// Общие настройки
// Устанавливаем временную зону по умолчанию
date_default_timezone_set('Europe/Kiev');    
// Ошибки и протоколирование
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);

function dd($mix)
{
    echo '<pre>'.print_r($mix, true).'</pre>';
}

function view($path, $data = null, $layout='app') 
{
	if ( !empty($data) ) {
		extract($data);
	}
	$path .= '.php';
	return require VIEWS."/layouts/${layout}.php";
}

function getURI()
{
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}
function conf($mix)
{
	return include(CONFIG."/".$mix.".php"); 
}

require_once dirname(__DIR__).'/config/app.php';
require_once CORE.'/Connection.php';
require_once CORE.'/Session.php';
require_once CORE.'/Helper.php';
require_once CORE.'/View.php';
require_once CORE.'/Response.php';
require_once CORE.'/Controller.php';
require_once CORE.'/Slug.php';
require_once CORE.'/Model.php';

require_once CORE.'/Router.php';

// Запускаем сессию
Session::init();
// По умолчанию, PHP хранит сессию в файлах 
// print_r(session_save_path());

// Если нет идентификатора – то он создаётся (session_id())
// print_r(session_id());

// Если идентификатор присутствует, то ищем файл сессии в папке session.save_path:
// print_r(session_save_path().'/sess_'.session_id());
// print_r($_COOKIE[session_name()]);

// $something = Session::set('something', 'something');
// var_dump(Session::display());

// $value = 'что-то где-то';
// setcookie("TestCookie", $value);
// setcookie("TestCookie", $value, time()+3600);  /* срок действия 1 час */
// setcookie("TestCookie", $value, time()+3600, "/~rasmus/", "example.com", 1);

// Вывести одно конкретное значение cookie
// print_r($_COOKIE["TestCookie"]);

// В целях тестирования и отладки может пригодиться вывод всех cookie
// print_r($_COOKIE);

// if (ini_get("session.use_cookies")) {
// 	$params = session_get_cookie_params();
// 	// print_r($params);
// 	setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"] );    
// 	print_r($params);
// }

$router = new Router();
$router->direct(getURI());