<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/nosotros', 'Home::nosotros');
$routes->get('/Como_funciona', 'Home::Como_funciona');
$routes->get('/menu', 'Home::menu');
$routes->get('/', 'Home::index');
$routes->get('/registrar', 'registrar::registrar');
$routes->post('/ingresar_datos', 'registrar::ingresar_datos');
$routes->get('/ingresar_datos', 'registrar::ingresar_datos');
$routes->get('/cargar_login', 'login::cargar_login');
$routes->post('/login', 'login::login');
$routes->post('/cerrar_session', 'login::cerrar_session');
$routes->get('/cerrar_session', 'login::cerrar_session');
$routes->get('/cargar_pp', 'pagina_principal::cargar_pp');
$routes->get('/eliminar_token', 'pagina_principal::eliminar_token');
$routes->get('/recibir_nodemcu', 'recibir_nodemcu::recibir_datos'); $routes->post('/recibir_nodemcu', 'recibir_nodemcu::recibir_datos');
$routes->get('/recibir_nodemcu_prueba', 'recibir_nodemcu::recibir_datos_prueba'); $routes->post('/recibir_nodemcu_prueba', 'recibir_nodemcu::recibir_datos_prueba');
$routes->get('/enviar_correo', 'recuperar_password::correo'); $routes->post('/enviar_correo', 'recuperar_password::correo');
$routes->post('/datos_dispositivo', 'datos_dispositivo::datos_dispositivo');
$routes->post('/cargarNodemcu', 'datos_dispositivo::cargarNodemcu');
$routes->post('/cargarSpConf', 'datos_dispositivo::cargarSpConf');
$routes->get('/cargar_recuperacion', 'recuperar_password::cargar_recuperacion');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
