<?php

class Bee
{

    //propiedades del Framework

    private $framework = "Bee Framework";
    private $version = "1.0.0";
    private $uri = [];

    //Lafuncion principal que se ejecuta al iniciar el framework

    function __construct()
    {
        //  echo 'En el cosntructor de la clase Bee';
        $this->init();
    }

    /**
     * Metodo para ejecutar cada "metodo" de forma subsecuente
     * 
     * @return void
     */

    private function init()
    {
        //toodos los metodos que se ejecutan al iniciar el framework
        $this->init_session();
        $this->init_load_config();
        $this->init_load_functions();
        $this->init_autoload();
        $this->init_csrf();
        $this->dispatch();
    }

    /**
     * Metodo para iniciar la sesion de usuario
     *
     * @return void
     */

    private function init_session()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        return;
    }

    /***
     * Metodo para cargar la configuracion del framework
     * 
     * @return void
     */
    private function init_load_config()
    {
        $file = 'bee_config.php';
        if (!is_file('app/config/' . $file)) {
            die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione', $file, $this->framework));
        }
        //Cargar la configuracion del framework
        require_once 'app/config/' . $file;

        return;
    }

    /**
     * Metodo para cargar las funciones  del framework
     * 
     * @return void
     */

    private function init_load_functions()
    {
        $file = 'bee_core_functions.php';
        if (!is_file(FUNCTIONS . $file)) {
            die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione', 'bee_core_functions.php', $this->framework));
        }

        //Cargar las funciones core         
        require_once FUNCTIONS . $file;

        $file = 'bee_custom_functions.php';
        if (!is_file(FUNCTIONS . $file)) {
            die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione', 'bee_core_functions.php', $this->framework));
        }

        //Cargar las funciones core         
        require_once FUNCTIONS . $file;


        return;
    }

    /**
     * Metodo para cargar todos los archivos del framework
     *
     * @return void
     */
    private function init_autoload()
    {
        require_once CLASSES . 'Autoloader.php';
        Autoloader::init();
        //require_once CLASSES . 'Db.php';
        //require_once CLASSES . 'Model.php';
        //require_once CLASSES . 'View.php';
        //require_once CLASSES . 'Controller.php';
        //require_once CONTROLLERS . DEFAULT_CONTROLLER . 'Controller.php';
        //require_once CONTROLLERS . DEFAULT_ERROR_CONTROLLER . 'Controller.php';


        return;
    }

/**
     * Metodo para crear un nuevo usuario
     *
     * @return void
     */

    private function init_csrf()  {
        $csrf = new Csrf();

        print_r($_SESSION);
    }

    /**MEtodo para filtrat y descomponer los elementos de nuestra url y urti
     * 
     * @return void
     */

    private function filter_url()
    {
        if (isset($_GET['uri'])) {
            $this->uri = $_GET['uri'];
            $this->uri = rtrim($this->uri, '/');
            $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
            $this->uri = explode('/', $this->uri);
            return $this->uri;
        }
    }


    /*
     *Metodo para ejecutar y cargar de forma automatica
     * el controlador y metodo solicitado y pasar parametros 
     * 
      */

    private function dispatch()
    {
        //Filtrar la URL y separar la URI
        $this->filter_url();

        //Necesitamos saber si se esta pasando el nombre de un controlador
        //$this->uri[0] es el controlador en cuestion
        if (isset($this->uri[0])) {
            $current_controller = $this->uri[0]; //Usuarios Controller.php
            unset($this->uri[0]);
        } else {
            $current_controller = DEFAULT_CONTROLLER; //home
        }

        //Ejeccion del controlador
        //Verifacamos si existe una calse con el controlador solicitado
        $controller = $current_controller . 'Controller'; //homeController
        if (!class_exists($controller)) {
            $current_controller = DEFAULT_ERROR_CONTROLLER;
            $controller = DEFAULT_ERROR_CONTROLLER . 'Controller'; //errorController
        }

        ///////////////////////////////////////////////////////////////////////////////7
        //Metodo solicitado
        if(isset($this->uri[1])){
            $method = str_replace('-', '_', $this->uri[1]);
            
            //Existe o no el metodo solicitado
            if(!method_exists($controller, $method)){
                $controller = DEFAULT_ERROR_CONTROLLER.'Controller'; //error controler
                $current_method = DEFAULT_METHOD; //index
                $current_controller = DEFAULT_ERROR_CONTROLLER;      
            }else{
                $current_method = $method;
            }

            unset($this->uri[1]);
        }else{
            $current_method = DEFAULT_METHOD; //index
        }

        // /////////////////////////////////////////////////////////////////////
        // Creando constantes para el controlador y metodo solicitado
        define('CONTROLLER', $current_controller);
        define('METHOD', $current_method);


        ///Ejecutar elk controlador y el metodo solicitado
        $controller = new $controller;

        //Obteniendo los parametros de la URI
        $params = array_values(empty($this->uri) ? [] : $this->uri);
        
        //llamando al metodo que solicita el usuario
        if(empty($params)){
            call_user_func(array($controller, $current_method));    
        }else{
            call_user_func_array( [$controller, $current_method], $params);
        }

        return;
        //print_r($this->uri);
        //echo $current_method;
    }


    //Metodo para corre nuestro framework
    public static function fly()
    {
        $bee = new self();
        return;
    }
}
