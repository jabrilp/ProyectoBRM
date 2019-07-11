<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Producto;
use App\Factura;
use App\FacturaProducto;

class FacturaController extends Controller
{
    public function agregarProducto($id, Request $request){
        
        $factura = Factura::where('fact_estado', 'PENDIENTE')->first();
        
        $producto_a_agregar = Producto::findOrfail($id);
        
        if($factura){

            DB::beginTransaction();
            try {

                $factura->fact_total = $factura->fact_total + ($producto_a_agregar->prod_precio * $request->cantidad);
                $factura->save();

                $producto_factura = new FacturaProducto;
                $producto_factura->factura_id = $factura->fact_id;
                $producto_factura->producto_id = $producto_a_agregar->prod_id;
                $producto_factura->fapr_cantidad = $request->cantidad;
                $producto_factura->save();

                $producto_a_agregar->prod_cantidad = $producto_a_agregar->prod_cantidad - $request->cantidad;
                $producto_a_agregar->save();

                DB::commit();

                return redirect('/')->with('message', 'Se ha agregado '.$producto_a_agregar->prod_nombre.' a tu factura!');
                
            } catch (\Throwable $th) {
                //throw $th;
            }

            return $factura;
        }else{

            DB::beginTransaction();
            try {

                $nueva_factura = new Factura;
                $nueva_factura->fact_total = $producto_a_agregar->prod_precio * $request->cantidad;
                $nueva_factura->fact_estado = 'PENDIENTE';
                $nueva_factura->save();

                $producto_factura = new FacturaProducto;
                $producto_factura->factura_id = $nueva_factura->fact_id;
                $producto_factura->producto_id = $producto_a_agregar->prod_id;
                $producto_factura->fapr_cantidad = $request->cantidad;
                $producto_factura->save();

                $producto_a_agregar->prod_cantidad = $producto_a_agregar->prod_cantidad - $request->cantidad;
                $producto_a_agregar->save();

                DB::commit();

                return redirect('/')->with('message', 'Se ha agregado '.$producto_a_agregar->prod_nombre.' a tu factura!');
                
            } catch (\Throwable $th) {
                //throw $th;
            }
        
        }

    }

    public function verFactura(){
        $factura = Factura::where('fact_estado', 'PENDIENTE')->first();

        if($factura){
            $productos_factura = $factura->productos;
            return view('facturas.index', ['factura'=> $factura, 'productos_factura'=> $productos_factura]);
        }else{
            return view('facturas.no_generada');
        }
        
    }

    public function showFacturas(){
        $facturas = Factura::where('fact_estado', 'PAGADO')->orwhere('fact_estado', 'CANCELADO')->get();
        return view('facturas.ver_facturas', ['facturas'=> $facturas]);
    }

    public function detalleFactura($id){
        $factura = Factura::findOrFail($id);
        $productos_factura = $factura->productos;
        return view('facturas.detalle', ['factura'=> $factura, 'productos_factura'=> $productos_factura]);
    }

    public function pagarFactura($id){
        $factura = Factura::findOrFail($id);
        $factura->fact_estado = 'PAGADO';
        $factura->save();
        return redirect('/')->with('message', 'Se ha pagado la factura '.$factura->fact_id.' exitosamente!');
    }

    public function cancelarFactura($id){
        $factura = Factura::findOrFail($id);
        $factura->fact_estado = 'CANCELADO';
        $factura->save();

        $productos_factura = FacturaProducto::where('factura_id', $id)->get();
        foreach ($productos_factura as $prfact) {
            $producto = Producto::find($prfact->producto_id);
            $producto->prod_cantidad = $producto->prod_cantidad + $prfact->fapr_cantidad;
            $producto->save(); 
        }
        return redirect('/')->with('message', 'Se ha cancelado la factura '.$factura->fact_id.' exitosamente!');
    }
}
