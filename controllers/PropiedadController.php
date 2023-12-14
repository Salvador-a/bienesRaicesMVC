<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
    public static function index(Router $router) {

        $propiedades = Propiedad::all();
        // Mensaje condicional
        $resultado = $_GET['resultado'] ?? null;
        
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades ,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router) {

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        // Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ejecuta el código después de que el usuario envía el formulario

    
        // Asignar los atributos
        $args = $_POST['propiedad'];

         // Sincronizar el objeto Propiedad con los valores del formulario
         $propiedad->sincronizar($args);
        
         // Subida de archivos         
         // Generar un nombre único
         $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
         
         if ($_FILES['propiedad']['tmp_name']['imagen']) {
             $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
             $propiedad->setImagen($nombreImagen);
         }
         
         //Validacion
         $errores = $propiedad->validar();
  
         // Revisar que el array de errores esté vacío
         if(empty($errores)) {
             // Almacenar la imagen
             if($_FILES['propiedad']['tmp_name']['imagen']) {
                 $image->save(CARPETA_IMAGENES . $nombreImagen);
                 }
  
             $propiedad->guardar();
             }
         }
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
        
    }

    public static function actualizar() {
        echo "actualizar propiedad";
    }
}

