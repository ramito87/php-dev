<?php

class errorController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data=[
            'title' => 'Pagina no encontrada',
            'bg' => 'dark'
        ];
        View::render('404', $data);

    }   
}
