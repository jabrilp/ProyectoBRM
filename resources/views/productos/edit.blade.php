@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Editar producto</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('producto/'.$producto->prod_id) }}" method="POST">
                            <input name="_method" type="hidden" value="PUT">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre del producto</label>
                                <input type="text" class="form-control" name="nombre" value="{{ $producto->prod_nombre }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Cantidad en stock: {{ $producto->prod_cantidad }} , Agregar nueva cantidad:</label>
                                <input type="number" class="form-control" name="cantidad" value="0" required> 
                                <small>La cantidad agragada se sumara con la que hay en stock</small>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Numero de lote</label>
                                <input type="text" class="form-control" name="lote"  value="{{ $producto->prod_num_lote }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Fecha de vencimiento</label>
                                <input type="date" class="form-control" name="vencimiento"  value="{{ $producto->prod_fecha_vencimiento }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Precio</label>
                                <input type="number" class="form-control" name="precio"  value="{{ $producto->prod_precio }}" required>
                            </div> 
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
