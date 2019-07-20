<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Inicio
Breadcrumbs::for('escritorio', function ($trail) {
    $trail->push('Escritorio', route('escritorio'));
});


// escritorio > users
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('escritorio');
    $trail->push('Usuarios', route('config.users.index'));
});
// Escritorio > users > [users]
Breadcrumbs::for('users.show', function ($trail, $users) {
    $trail->parent('users');
    $trail->push($users->name, route('config.users.show', $users));
});
// Escritorio > users > Crear users
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users');
    $trail->push('Crear', route('config.users.create'));
});
// Escritorio > users > [users]
Breadcrumbs::for('users.edit', function ($trail,$users) {
    $trail->parent('users');
    $trail->push('Editar', route('config.users.edit', $users));
});

// escritorio > Empresas
Breadcrumbs::for('empresas', function ($trail) {
    $trail->parent('escritorio');
    $trail->push('Empresas', route('config.empresas.index'));
});

// Escritorio > Empresas > [Empresa]
Breadcrumbs::for('empresas.show', function ($trail, $empresa) {
    $trail->parent('empresas');
    $trail->push($empresa->nombre, route('config.empresas.show', $empresa));
});
// Escritorio > Empresas > Crear Empresa
Breadcrumbs::for('empresas.create', function ($trail) {
    $trail->parent('empresas');
    $trail->push('Crear', route('config.empresas.create'));
});
// Escritorio > Empresas > [Empresa]
Breadcrumbs::for('empresas.edit', function ($trail,$empresa) {
    $trail->parent('empresas');
    $trail->push('Editar', route('config.empresas.edit', $empresa));
});

/*// Inicio > Generos > [Genero] > [Pelicula]
Breadcrumbs::for('movie', function ($trail, $movie) {
    $trail->parent('genre', $movie->genre);
    $trail->push($movie->name, route('movies.show', $movie));
});*/

// escritorio > InvCategoria
Breadcrumbs::for('invcategorias', function ($trail) {
    $trail->parent('escritorio');
    $trail->push('Categorias (Inventario)', route('inventario.categorias.index'));
});

// Escritorio > InvCategoria > [InvCategoria]
Breadcrumbs::for('invcategorias.show', function ($trail, $invcategoria) {
    $trail->parent('invcategorias');
    $trail->push($invcategoria->nombre, route('inventario.categorias.show', $invcategoria));
});
// Escritorio > Empresas > Crear Empresa
Breadcrumbs::for('invcategorias.create', function ($trail) {
    $trail->parent('invcategorias');
    $trail->push('Crear', route('inventario.categorias.create'));
});
// Escritorio > Empresas > [Empresa]
Breadcrumbs::for('invcategorias.edit', function ($trail,$invcategoria) {
    $trail->parent('invcategorias');
    $trail->push('Editar', route('inventario.categorias.edit', $invcategoria));
});


// escritorio > InvMarca
Breadcrumbs::for('invmarcas', function ($trail) {
    $trail->parent('escritorio');
    $trail->push('Marcas (Inventario)', route('inventario.marcas.index'));
});

// Escritorio > InvCategoria > [InvCategoria]
Breadcrumbs::for('invmarcas.show', function ($trail, $invmarca) {
    $trail->parent('invmarcas');
    $trail->push($invmarca->nombre, route('inventario.marcas.show', $invmarca));
});
// Escritorio > Empresas > Crear Empresa
Breadcrumbs::for('invmarcas.create', function ($trail) {
    $trail->parent('invmarcas');
    $trail->push('Crear', route('inventario.marcas.create'));
});
// Escritorio > Empresas > [Empresa]
Breadcrumbs::for('invmarcas.edit', function ($trail,$invmarca) {
    $trail->parent('invmarcas');
    $trail->push('Editar', route('inventario.marcas.edit', $invmarca));
});

// escritorio > InvVehiculos
Breadcrumbs::for('invVehiculos', function ($trail) {
    $trail->parent('escritorio');
    $trail->push('Vehiculos (Inventario)', route('inventario.vehiculos.index'));
});

// Escritorio > InvVehiculos > [InvVehiculos]
Breadcrumbs::for('invVehiculos.show', function ($trail, $invVehiculos) {
    $trail->parent('invVehiculos');
    $trail->push($invVehiculos->nombre, route('inventario.vehiculos.show', $invVehiculos));
});
// Escritorio > InvVehiculos > Crear InvVehiculos
Breadcrumbs::for('invVehiculos.create', function ($trail) {
    $trail->parent('invVehiculos');
    $trail->push('Crear', route('inventario.vehiculos.create'));
});
// Escritorio > InvVehiculos > [InvVehiculos]
Breadcrumbs::for('invVehiculos.edit', function ($trail,$invVehiculos) {
    $trail->parent('invVehiculos');
    $trail->push('Editar', route('inventario.vehiculos.edit', $invVehiculos));
});



// escritorio > comRegistroComprasFacturas
Breadcrumbs::for('comRegistroComprasFacturas', function ($trail) {
    $trail->parent('escritorio');
    $trail->push('Registro compras con factura', route('compras.registroComprasFacturas.index'));
});

// Escritorio > comRegistroComprasFacturas > [comRegistroComprasFacturas]
Breadcrumbs::for('comRegistroComprasFacturas.show', function ($trail, $comRegistroComprasFacturas) {
    $trail->parent('comRegistroComprasFacturas');
    $trail->push($comRegistroComprasFacturas->nombre, route('compras.registroComprasFacturas.show', $comRegistroComprasFacturas));
});
// Escritorio > comRegistroComprasFacturas > Crear comRegistroComprasFacturas
Breadcrumbs::for('comRegistroComprasFacturas.create', function ($trail) {
    $trail->parent('comRegistroComprasFacturas');
    $trail->push('Crear', route('compras.registroComprasFacturas.create'));
});
// Escritorio > comRegistroComprasFacturas > [comRegistroComprasFacturas]
Breadcrumbs::for('comRegistroComprasFacturas.edit', function ($trail,$comRegistroComprasFacturas) {
    $trail->parent('comRegistroComprasFacturas');
    $trail->push('Editar', route('compras.registroComprasFacturas.edit', $comRegistroComprasFacturas));
});

// escritorio > invAlmacenes
Breadcrumbs::for('invAlmacenes', function ($trail) {
    $trail->parent('escritorio');
    $trail->push('Almacenes', route('inventario.almacenes.index'));
});

// Escritorio > invAlmacenes > [invAlmacenes]
Breadcrumbs::for('invAlmacenes.show', function ($trail, $invAlmacenes) {
    $trail->parent('invAlmacenes');
    $trail->push($invAlmacenes->nombre, route('inventario.almacenes.show', $invAlmacenes));
});
// Escritorio > invAlmacenes > Crear invAlmacenes
Breadcrumbs::for('invAlmacenes.create', function ($trail) {
    $trail->parent('invAlmacenes');
    $trail->push('Crear', route('inventario.almacenes.create'));
});
// Escritorio > invAlmacenes > [invAlmacenes]
Breadcrumbs::for('invAlmacenes.edit', function ($trail,$invAlmacenes) {
    $trail->parent('invAlmacenes');
    $trail->push('Editar', route('inventario.almacenes.edit', $invAlmacenes));
});