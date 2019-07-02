<?php

//Auth::routes();
/////////////////////////////////////////AUTH ROUTES
// Authentication Routes...
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//path: C:\wamp64\www\matisasys\vendor\laravel\framework\src\Illuminate\Routing\Router.php
/////////////////////////////////////////////////////





Route::get('/escritorio', 'HomeController@index')->name('escritorio');
//Rutas
    //roles
    Route::post('config/roles/store','RoleController@store')->name('config.roles.store')
       ->middleware('permission:roles.create');
    Route::get('config/roles','RoleController@index')->name('config.roles.index')
        ->middleware('permission:roles.index');
    Route::get('config/roles/create','RoleController@create')->name('config.roles.create')
        ->middleware('permission:roles.create');
    Route::put('config/roles/{role}','RoleController@update')->name('config.roles.update')
        ->middleware('permission:roles.edit');
    Route::get('config/roles/{role}','RoleController@show')->name('config.roles.show')
        ->middleware('permission:roles.show');
    Route::delete('config/roles/{role}','RoleController@destroy')->name('config.roles.destroy')
        ->middleware('permission:roles.destroy');
    Route::get('config/roles/{role}/edit','RoleController@edit')->name('config.roles.edit')
        ->middleware('permission:roles.edit');
    //monedas
    Route::post('parametros/monedas/store','MonedaController@store')->name('parametros.monedas.store')
        ->middleware('permission:monedas.create');
    Route::get('parametros/monedas','MonedaController@index')->name('parametros.monedas.index')
        ->middleware('permission:monedas.index');
    Route::get('parametros/monedas/create','MonedaController@create')->name('parametros.monedas.create')
        ->middleware('permission:monedas.create');
    Route::put('parametros/monedas/{moneda}','MonedaController@update')->name('parametros.monedas.update')
        ->middleware('permission:monedas.edit');
    Route::get('parametros/monedas/{moneda}','MonedaController@show')->name('parametros.monedas.show')
        ->middleware('permission:monedas.show');
    Route::delete('parametros/monedas/{moneda}','MonedaController@destroy')->name('parametros.monedas.destroy')
        ->middleware('permission:monedas.destroy');
    Route::get('parametros/monedas/{moneda}/edit','MonedaController@edit')->name('parametros.monedas.edit')
        ->middleware('permission:monedas.edit');

    //usuarios
    Route::get('config/users','UserController@index')->name('config.users.index')
        ->middleware('permission:users.index');
    Route::put('config/users/{user}','UserController@update')->name('config.users.update')
        ->middleware('permission:users.edit');
    Route::get('config/users/{user}','UserController@show')->name('config.users.show')
        ->middleware('permission:users.show');
    Route::delete('config/users/{user}','UserController@destroy')->name('config.users.destroy')
        ->middleware('permission:users.destroy');
    Route::get('config/users/{user}/edit','UserController@edit')->name('config.users.edit')
        ->middleware('permission:users.edit');

    //Company
    Route::get('config/empresas','EmpresaController@index')->name('config.empresas.index')
        ->middleware('permission:empresas.index');
    Route::post('config/empresas/store','EmpresaController@store')->name('config.empresas.store')
        ->middleware('permission:empresas.create');
    Route::get('config/empresas/create','EmpresaController@create')->name('config.empresas.create')
        ->middleware('permission:empresas.create');
    Route::put('config/empresas/{empresa}','EmpresaController@update')->name('config.empresas.update')
        ->middleware('permission:empresas.edit');
    Route::get('config/empresas/{empresa}','EmpresaController@show')->name('config.empresas.show')
        ->middleware('permission:empresas.show');
    Route::delete('config/empresas/{empresa}','EmpresaController@destroy')->name('config.empresas.destroy')
        ->middleware('permission:empresas.destroy');
    Route::get('config/empresas/{empresa}/edit','EmpresaController@edit')->name('config.empresas.edit')
        ->middleware('permission:empresas.edit');

    //Inventario Categorias
    Route::post('inventario/categorias/store','Inventario\InvCategoriaController@store')->name('inventario.categorias.store')
        ->middleware('permission:invcategorias.create');
    Route::get('inventario/categorias','Inventario\InvCategoriaController@index')->name('inventario.categorias.index')
        ->middleware('permission:invcategorias.index');
    Route::get('inventario/categorias/create','Inventario\InvCategoriaController@create')->name('inventario.categorias.create')
        ->middleware('permission:invcategorias.create');
    Route::put('inventario/categorias/{invcategoria}','Inventario\InvCategoriaController@update')->name('inventario.categorias.update')
        ->middleware('permission:invcategorias.edit');
    Route::get('inventario/categorias/{invcategoria}','Inventario\InvCategoriaController@show')->name('inventario.categorias.show')
        ->middleware('permission:invcategorias.show');
    Route::delete('inventario/categorias/{invcategoria}','Inventario\InvCategoriaController@destroy')->name('inventario.categorias.destroy')
        ->middleware('permission:invcategorias.destroy');
    Route::get('inventario/categorias/{invcategoria}/edit','Inventario\InvCategoriaController@edit')->name('inventario.categorias.edit')
        ->middleware('permission:invcategorias.edit');

    //Inventario Marcas
    Route::post('inventario/marcas/store','Inventario\InvMarcaController@store')->name('inventario.marcas.store')
        ->middleware('permission:invmarcas.create');
    Route::get('inventario/marcas','Inventario\InvMarcaController@index')->name('inventario.marcas.index')
        ->middleware('permission:invmarcas.index');
    Route::get('inventario/marcas/create','Inventario\InvMarcaController@create')->name('inventario.marcas.create')
        ->middleware('permission:invmarcas.create');
    Route::put('inventario/marcas/{invmarca}','Inventario\InvMarcaController@update')->name('inventario.marcas.update')
        ->middleware('permission:invmarcas.edit');
    Route::get('inventario/marcas/{invmarca}','Inventario\InvMarcaController@show')->name('inventario.marcas.show')
        ->middleware('permission:invmarcas.show');
    Route::delete('inventario/marcas/{invmarca}','Inventario\InvMarcaController@destroy')->name('inventario.marcas.destroy')
        ->middleware('permission:invmarcas.destroy');
    Route::get('inventario/marcas/{invmarca}/edit','Inventario\InvMarcaController@edit')->name('inventario.marcas.edit')
        ->middleware('permission:invmarcas.edit');

    //Inventario Vehiculos
    Route::post('inventario/vehiculos/store','Inventario\InvVehiculoController@store')->name('inventario.vehiculos.store')
        ->middleware('permission:invVehiculos.create');
    Route::get('inventario/vehiculos','Inventario\InvVehiculoController@index')->name('inventario.vehiculos.index')
        ->middleware('permission:invVehiculos.index');
    Route::get('inventario/vehiculos/create','Inventario\InvVehiculoController@create')->name('inventario.vehiculos.create')
        ->middleware('permission:invVehiculos.create');
    Route::put('inventario/vehiculos/{invVehiculos}','Inventario\InvVehiculoController@update')->name('inventario.vehiculos.update')
        ->middleware('permission:invVehiculos.edit');
    Route::get('inventario/vehiculos/{invVehiculos}','Inventario\InvVehiculoController@show')->name('inventario.vehiculos.show')
        ->middleware('permission:invVehiculos.show');
    Route::delete('inventario/vehiculos/{invVehiculos}','Inventario\InvVehiculoController@destroy')->name('inventario.vehiculos.destroy')
        ->middleware('permission:invVehiculos.destroy');
    Route::get('inventario/vehiculos/{invVehiculos}/edit','Inventario\InvVehiculoController@edit')->name('inventario.vehiculos.edit')
        ->middleware('permission:invVehiculos.edit');


 //compras Registro compras con factura
    Route::post('compras/registroComprasFacturas/store','compras\ComRegistroComprasFacturaController@store')->name('compras.registroComprasFacturas.store')
        ->middleware('permission:comregistrocomprasfacturas.create');
    Route::get('compras/registroComprasFacturas','compras\ComRegistroComprasFacturaController@index')->name('compras.registroComprasFacturas.index')
        ->middleware('permission:comregistrocomprasfacturas.index');
    Route::get('compras/registroComprasFacturas/create','compras\ComRegistroComprasFacturaController@create')->name('compras.registroComprasFacturas.create')
        ->middleware('permission:comregistrocomprasfacturas.create');
    Route::put('compras/registroComprasFacturas/{comRegistroComprasFacturas}','compras\ComRegistroComprasFacturaController@update')->name('compras.registroComprasFacturas.update')
        ->middleware('permission:comregistrocomprasfacturas.edit');
    Route::get('compras/registroComprasFacturas/{comRegistroComprasFacturas}','compras\ComRegistroComprasFacturaController@show')->name('compras.registroComprasFacturas.show')
        ->middleware('permission:comregistrocomprasfacturas.show');
    Route::delete('compras/registroComprasFacturas/{comRegistroComprasFacturas}','compras\ComRegistroComprasFacturaController@destroy')->name('compras.registroComprasFacturas.destroy')
        ->middleware('permission:comregistrocomprasfacturas.destroy');
    Route::get('compras/registroComprasFacturas/{comRegistroComprasFacturas}/edit','compras\ComRegistroComprasFacturaController@edit')->name('compras.registroComprasFacturas.edit')
        ->middleware('permission:comregistrocomprasfacturas.edit');