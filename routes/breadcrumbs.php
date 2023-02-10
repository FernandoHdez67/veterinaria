<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Inicio
Breadcrumbs::for('inicio', function (BreadcrumbTrail $trail) {
    $trail->push('Inicio', route('inicio'));
});

// Inicio > Quienes somos
Breadcrumbs::for('quienessomos', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Quienes Somos', route('somos'));
});

// Inicio > Productos
Breadcrumbs::for('productos', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Productos', route('productos'));
});

// Inicio > Servicios
Breadcrumbs::for('servicios', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Servicios', route('servicios'));
});

// Inicio > Citas
Breadcrumbs::for('citas', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Citas', route('citas'));
});

// Inicio > Productos > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('productos');
    $trail->push($category->title, route('category', $category));
});