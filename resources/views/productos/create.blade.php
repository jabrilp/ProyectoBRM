@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Nuevo producto</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('producto') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre del producto</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Cantidad</label>
                                <input type="number" class="form-control" name="cantidad" value="1" required> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Numero de lote</label>
                                <input type="text" class="form-control" name="lote" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Fecha de vencimiento</label>
                                <input type="date" class="form-control" name="vencimiento" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Precio</label>
                                <input type="number" class="form-control" name="precio" required>
                            </div> 
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
