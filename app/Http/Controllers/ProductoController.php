<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::all();

        return view('productos.index', ['productos'=> $productos]);
    }

    public function create(){
        return view('productos.create');
    }

    public function store(Request $request){
        
        $prod = new Producto;

        $prod->prod_nombre = $request->nombre;
        $prod->prod_cantidad = $request->cantidad;
        $prod->prod_num_lote = $request->lote;
        $prod->prod_fecha_vencimiento = $request->vencimiento;
        $prod->prod_precio = $request->precio;

        $prod->save();

        return redirect('producto')->with('message', 'Producto Creado!');
    }

    public function edit($id){
        $producto = Producto::findOrFail($id);
    
        return view('productos.edit', ['producto'=> $producto]);
    }

    public function update($id, Request $request){
        $prod = Producto::findOrFail($id);

        $prod->prod_nombre = $request->nombre;
        $prod->prod_cantidad = $prod->prod_cantidad + $request->cantidad;
        $prod->prod_num_lote = $request->lote;
        $prod->prod_fecha_vencimiento = $request->vencimiento;
        $prod->prod_precio = $request->precio;

        $prod->save();
    
        return redirect('producto')->with('message', 'Producto Actualizado!');
    }

    public function showProductos(){
        $productos = Producto::all();

        return view('productos.show_productos', ['productos'=> $productos]);
    }
}
