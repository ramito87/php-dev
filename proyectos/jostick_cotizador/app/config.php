<?php


//Para saber si estamos en servidor local o en produccion
define('IS_LOCAL', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));
define ('URL', (IS_LOCAL ? 'http://127.0.0.1:8848/php-dev/proyectos/jostick_cotizador/' : 'https://mi-sitio-produccion.com'));


//rutas para carpetas
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', getcwd() . DS);
define('APP', ROOT.'app' . DS);
define('ASSETS', ROOT.'assets' . DS);
define('TEMPLATES', ROOT.'templates' . DS);
define('INCLUDES', TEMPLATES.'includes' . DS);
define('MODULES', TEMPLATES.'modules' . DS);
define('VIEWS', TEMPLATES.'views' . DS);
define('UPLOADS', ROOT.'uploads' . DS);


//para archivos que vayaamos a incluir en header o footer
define('CSS', URL.'assets/css/');
define('JS', URL.'assets/js/'); 
define('IMG', URL.'assets/img/');

//Cargar las funciones
require_once 'app/functions.php';