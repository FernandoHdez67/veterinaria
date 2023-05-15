<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Categoria;
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

// Inicio > Citas
Breadcrumbs::for('ayuda', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Ayuda', route('ayuda'));
});

// Inicio > Citas
Breadcrumbs::for('contacto', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Contacto', route('contacto'));
});

// Inicio > Citas
Breadcrumbs::for('politicas', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Terminos y Condiciones', route('politicas'));
});



//Registro de las migas de pan
Breadcrumbs::for('detalles', function ($trail, $detalles) {
    $trail->parent('productos'); // Agrega la migaja de pan padre
    $trail->push($detalles->nombre, route('detalles', $detalles)); // Agrega la migaja de pan actual
});


// Inicio > Productos > [Category]
// Breadcrumbs::for('detalles', function (BreadcrumbTrail $trail, Detalles $detalles) {
//     $trail->parent('productos');
//     $trail->push($detalles->nombre, route('detalles', $detalles)); // Agrega el nombre del producto como último elemento
// });
