<?php

namespace Controllers;
use MVC\Router;

use Model\Admin;

class LoginController {
    public static function login(Router $router) {

        $errores = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if(empty($errores)) {
                // Verificar si el usuario exite
                $resultado = $auth->existeUsuario();

                if (!$resultado) {
                    // Verifica si el usuario o no (mensaje de error)
                    $errores = Admin::getErrores();
                } else {
                    
                    // Verifivar el password 
                    $autenticado = $auth->comprobarPassword($resultado);

                    if ($autenticado) {
                       // Autentificar al usuario
                    } else {
                        // Password incorrecto (mensaje de error )
                        $errores = Admin::getErrores();
                    }
    
                    
                }

            }
        }
        
        $router->render('auth/login', [

            'errores' => $errores

        ]);
    }

    public static function logout() {
        echo "desde logout";

    }
}