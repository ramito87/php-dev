<?php

// saber si estamos local o remoto
define('IS_LOCAL', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

// definir zona horaria
date_default_timezone_set('America/Mexico_City');

//lenguaje
define('LANG', 'es');

// ruta base del proyecto
define('BASEPATH', IS_LOCAL ? '/bee/' : '___EL_BASE_PATH_EN PRODICCION___');

//sal del proyecto
define('AUTH_SALT', 'BeeFramework <3');

//Puerto y URL del sitio
define('PORT', '80');
define('URL', IS_LOCAL ? 'http://bee:'.PORT.'/bee/' : 'http://bee:'.PORT.'/');

//rutas de directorios y archivos
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', getcwd() . DS);

define('APP', ROOT . 'app' . DS);
define('CLASSES', APP . 'classes' . DS);
define('CONFIG', APP . 'config' . DS);
define('CONTROLLERS', APP . 'controllers' . DS);
define('FUNCTIONS', APP . 'functions' . DS);
define('MODELS', APP . 'models' . DS);

define('TEMPLATES', ROOT . 'templates' . DS);
define('INCLUDES', TEMPLATES . 'includes' . DS);
define('MODULES', TEMPLATES . 'modules' . DS);
define('VIEWS', TEMPLATES . 'views' . DS);

define('ASSETS', URL . 'assets/');
define('CSS', ASSETS . 'css/');
define('FAVICON', ASSETS . 'js/');
define('FONTS', ASSETS . 'plugins/');
define('IMAGES', ASSETS . 'images/');
define('JS', ASSETS . 'js/');
define('PLUGINS', ASSETS . 'plugins/');
define('UPLOADS', ASSETS . 'uploads/');


//Base de datos
//set conexion local
define('LDB_ENGINE', 'mysql');
define('LDB_HOST', 'localhost');
define('LDB_NAME', 'bee');
define('LDB_USER', 'phpmyadmin');
define('LDB_PASS', '4OxbTwJkTzPBqc9Lwb8qItHrgV7qKnf3');
define('LDB_CHARSET', 'utf8');

//set para produccion
define('DB_ENGINE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'bee');
define('DB_USER', 'phpmyadmin');
define('DB_PASS', '4OxbTwJkTzPBqc9Lwb8qItHrgV7qKnf3');
define('DB_CHARSET', 'utf8');

//El controlador y metodo por defecto
define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_ERROR_CONTROLLER', 'error');
define('DEFAULT_METHOD', 'index');