@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Inventario de productos</h3>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <h5 class="card-title">Lista de productos</h5>
                        <a href="{{ url('producto/crear') }}" class="btn btn-primary">Crear producto</a>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">No Lote</th>
                                <th scope="col">Fecha de vencimiento</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $prod)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $prod->prod_nombre }}</td>
                                    <td>{{ $prod->prod_cantidad }}</td>
                                    <td>{{ $prod->prod_num_lote }}</td>
                                    <td>{{ $prod->prod_fecha_vencimiento }}</td>
                                    <td>{{ $prod->prod_precio }}</td>
                                    <td>
                                        <a href="{{ url('producto/'.$prod->prod_id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
