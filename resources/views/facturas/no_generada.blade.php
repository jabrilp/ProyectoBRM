@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Factura</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="title">Aun no se ha añadido ningun producto a la factura </h3>                       
                        <h5><a href="{{ url('/') }}">Ver productos</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
