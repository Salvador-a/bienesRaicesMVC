<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController {
    public static function crear( Router $router ) {

        $errores = Vendedor::getErrores();

        $vendedor = new Vendedor;

        // Ejecutar el código de que el usuario envia el formualrio 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        // Crear una nueva instacia 
        $vendedor = new Vendedor($_POST['vendedor']);

        // validar que no haya campos vacios
        $errores = $vendedor->validar();

        // No hay errores
        if (empty($errores)) {
            
            $vendedor->guardar();
        }


    }

        $router->render('vendedores/crear', [

           'errores'  => $errores,
           'vendedor' => $vendedor

        ]);
        
    }

    public static function actualizar( Router $router) {

        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');

        // Obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor

        ]);
        
    }

    public static function creliminarear() {
        echo "Eliminar Vendedor";
    }
}