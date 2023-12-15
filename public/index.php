<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaguinasController;
use Controllers\LoginController;

$router = new Router();

// Zona Privada
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear' ]);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear' ]);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar' ]);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar' ]);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar' ]);

$router->get('/vendedores/crear', [VendedorController::class, 'crear' ]);
$router->post('/vendedores/crear', [VendedorController::class, 'crear' ]);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar' ]);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar' ]);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar' ]);

// Zona Publica
$router->get('/', [PaguinasController::class, 'index']);
$router->get('/nosotros', [PaguinasController::class, 'nosotros']);
$router->get('/propiedades', [PaguinasController::class, 'propiedades']);
$router->get('/propiedad', [PaguinasController::class, 'propiedad']);
$router->get('/blog', [PaguinasController::class, 'blog']);
$router->get('/entrada', [PaguinasController::class, 'entrada']);
$router->get('/contacto', [PaguinasController::class, 'contacto']);
$router->post('/contacto', [PaguinasController::class, 'contacto']);

// Login y Autentificacion
$router->get('/login',[LoginController::class,'login']);
$router->post('/login',[LoginController::class,'login']);
$router->get('/logout',[LoginController::class,'logout']);

$router->comprobarRutas();

