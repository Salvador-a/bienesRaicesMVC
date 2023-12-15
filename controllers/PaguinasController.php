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

    public static function nosotros( Router $router ) {
        

        $router->render('paguinas/nosotros',[
            

        ]);
    }

    public static function propiedades( Router $router ) {

        $propiedades = Propiedad::all();

        $router->render('paguinas/propiedades', [

            'propiedades' => $propiedades


        ]);
    }

    public static function propiedad( Router $router ) {

        $id = validarORedireccionar('/propieades');

        // Busacar la propiedad por su id
        $propiedad = Propiedad::find($id);
        
        $router->render('paguinas/propiedad', [
            'propiedad' => $propiedad

        ]);
    }
    public static function blog( Router $router ) {
        $router->render('paguinas/blog');
    }
    public static function entrada( Router $router ) {
        $router->render('paguinas/entrada', [
            
        ]);
    }
    public static function contacto( ) {
        echo "Desde contacto";
    }
   
}