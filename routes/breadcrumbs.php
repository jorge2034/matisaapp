<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Inicio
Breadcrumbs::for('escritorio', function ($trail) {
    $trail->push('Escritorio', route('escritorio'));
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