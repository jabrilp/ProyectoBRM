@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Historial de facturas</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="title">Descripcion</h3>
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th scope="col">Factura ID</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Valor Total</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($facturas as $fact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $fact->fact_id }}</td>
                                        <td>{{ $fact->fact_estado }}</td>
                                        <td>$ {{ $fact->fact_total }}</td>
                                        <td>{{ $fact->created_at }}</td>
                                        <td>
                                            <a href="{{ url('ver_factura/'.$fact->fact_id) }}" class="btn btn-primary">Ver mas..</a>
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
