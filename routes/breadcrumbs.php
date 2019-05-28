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