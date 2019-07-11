@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <h1 class="card-title">Lista de productos</h1>
                        <hr>
                        <table class="table table-hover">
                            <thead>
                                <tr class="bg-primary">
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">No Lote</th>
                                <th scope="col">Fecha de vencimiento</th>
                                <th scope="col">Precio unitario</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $prod)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $prod->prod_nombre }}</td>
                                    <td>{{ $prod->prod_num_lote }}</td>
                                    <td>{{ $prod->prod_fecha_vencimiento }}</td>
                                    <td>{{ $prod->prod_precio }}</td>
                                    <td>
                                        <form id="agregar-form{{ $prod->prod_id }}" action="{{ url('agregar/'.$prod->prod_id) }}" method="POST">
                                            @csrf
                                            <input type="number" class="form-control" value="1" name="cantidad" min="1">
                                        </form>
                            
                                    </td>
                                    <td>
                                        <a href="{{ url('agregar/'.$prod->prod_id) }}" class="btn btn-primary btn-sm" 
                                            onclick="event.preventDefault();
                                            document.getElementById('agregar-form{{ $prod->prod_id }}').submit();">
                                            Agregar al carrito
                                        </a>
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
