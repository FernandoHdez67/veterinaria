<?php

namespace App\Http\Controllers;

use App\Models\sf;
use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function index()
    {
        // Obtener los productos del carrito desde la sesión
        $carrito = session()->get('carrito', []);

        return view('modulos.carrito', compact('carrito'));
    }

    public function agregar($idproducto)
    {
        // Obtener el producto de la base de datos por su ID
        $producto = Producto::findOrFail($idproducto);

        // Obtener el carrito actual desde la sesión
        $carrito = session()->get('carrito', []);

        // Agregar el producto al carrito
        $carrito[$idproducto] = [
            'idproducto' => $producto->idproducto,
            'nombre' => $producto->nombre,
            'cantidad' => 1, // Puedes ajustar la cantidad según tus necesidades
            'total' => $producto->precio,
        ];

        // Guardar el carrito actualizado en la sesión
        session()->put('carrito', $carrito);

        return redirect()->route('carrito')->with('success', 'Producto agregado al carrito.');
    }

    public function remover($idproducto)
    {
        // Obtener el carrito actual desde la sesión
        $carrito = session()->get('carrito', []);

        // Eliminar el producto del carrito si existe
        if (isset($carrito[$idproducto])) {
            unset($carrito[$idproducto]);
            // Actualizar el carrito en la sesión
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito.');
    }

    public function limpiar()
    {
        // Limpiar el carrito de compras eliminando todos los productos
        session()->forget('carrito');

        return redirect()->route('carrito.index')->with('success', 'Carrito limpiado.');
    }
}
