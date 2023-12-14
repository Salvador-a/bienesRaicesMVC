<?php
namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PaguinasController {

    public static function index( Router $router ) {

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router ->render('paguinas/index',[
            'propiedades' => $propiedades,
            'inicio' => $inicio

        ]);
    }
    public static function nosotros( ) {
        echo "Desde nostros";
    }
    public static function propiedades( ) {
        echo "Desde propiedades";
    }

    public static function propiedad( ) {
        echo "Desde propiedad";
    }
    public static function blog( ) {
        echo "Desde blog";
    }
    public static function entrada( ) {
        echo "Desde entrada";
    }
    public static function contacto( ) {
        echo "Desde contacto";
    }
   
}