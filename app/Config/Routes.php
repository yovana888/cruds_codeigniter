<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Configuracion');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Configuracion::index');
$routes->get('departamento', 'Departamento::index');
$routes->add('provincia', 'Provincia::index');
$routes->add('distrito', 'Distrito::index');
$routes->add('unidadmedida', 'UnidadMedida::index');
$routes->add('tipoexistencia', 'TipoExistencia::index');
$routes->add('tipooperacion', 'TipoOperacion::index');
$routes->add('gironegocio', 'GiroNegocio::index');
$routes->add('rol', 'Rol::index');
$routes->add('tipocambio', 'TipoCambio::index');
$routes->add('tipopersona', 'TipoPersona::index');
$routes->add('familiaproducto', 'FamiliaProducto::index');
$routes->add('subfamiliaproducto', 'SubFamiliaProducto::index');
$routes->add('lineaproducto', 'LineaProducto::index');
$routes->add('modulosistema', 'ModuloSistema::index');
$routes->add('grupoparametro', 'GrupoParametro::index');
$routes->add('parametrosistema', 'ModuloSistema::index');
$routes->add('moneda', 'Moneda::index');
$routes->add('regimentributario', 'RegimenTributario::index');
$routes->add('tipodocumento', 'TipoDocumento::index');
$routes->add('tipodocumentoidentidad', 'TipoDocumentoIdentidad::index');
$routes->add('marca', 'Marca::index');
$routes->add('modelomarca', 'ModeloMarca::index');
$routes->add('fabricante', 'Fabricante::index');
$routes->get('producto', 'Producto::index');
$routes->get('kitproducto', 'KitProducto::index');
$routes->get('sede', 'Sede::index');
$routes->get('persona', 'Persona::index');
$routes->get('transportista', 'Transportista::index');
$routes->get('empresa', 'Empresa::index');
$routes->get('empleado', 'Empleado::index');
$routes->get('inventario', 'Inventario::index');
$routes->get('resumeninventario', 'ResumenInventario::index');
//Inicio Nota Salida
$routes->get('notasalida', 'NotaSalida::index');
$routes->get('newNotaSalida', 'NotaSalida::createNotaSalida');
$routes->get('editNotaSalida', 'NotaSalida::editNotaSalida');
//Fin Nota Salida

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
