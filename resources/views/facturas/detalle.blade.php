@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Factura No {{ $factura->fact_id }}</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="title">Descripcion</h3>
                        <h5>Fecha de registro: {{ $factura->created_at }}</h5>
                        <h5>Estado de la factura: {{ $factura->fact_estado }}</h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio unitario</th>
                                    <th scope="col">Precio Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos_factura as $producto)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $producto->prod_nombre }}</td>
                                        <td>{{ $producto->pivot->fapr_cantidad }}</td>
                                        <td>$ {{ $producto->prod_precio }}</td>
                                        <td>$ {{ $producto->prod_precio * $producto->pivot->fapr_cantidad }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4"><h5>Total</h5></td>
                                    <td>$ {{ $factura->fact_total }}</td>
                                </tr>
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
