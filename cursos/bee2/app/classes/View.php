<?php
class View{
    public static function render($view, $data = [])
    {
        //Convertir el array asociativo en objeto
        $d = to_object($data); //$data en array $d en objetos

        if(!is_file(VIEWS.CONTROLLER.DS.$view.'View.php'))
        {
            die(sprintf('La vista %sView no existe en el directorio %s', $view, CONTROLLER ));
        }
        
        require VIEWS.CONTROLLER.DS.$view.'View.php';
        exit();   
        
    }

}