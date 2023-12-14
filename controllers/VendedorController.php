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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar lo valoeres
            $args = $_POST['vendedor'];
        
            //Sincronizar objeto en memoria con lo que el usuroario escribió
            $vendedor->sincronizar($args);
        
            //Validación
            $errores = $vendedor->validar();
        
            if (empty($errores)) {
                $vendedor->guardar();
            }      
        }

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar( ) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            

           // validar el id
           $id = $_POST['id'];
           $id = filter_var($id, FILTER_VALIDATE_INT);

           if ($id) {
            // Valida el tipo de a eliminar
            $tipo = $_POST['tipo'];
            
            if(validarTipoContenido($tipo)) {
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            }
           }
        }
    }
}