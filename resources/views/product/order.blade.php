@extends('layout.template')
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <center>
                <h1>Pedido de Productos</h1><br>
            </center>
            <div class="form-group">

                <label class="col-form-label" for="inputDefault">Nombre del Producto</label>
                <input class="form-control" id="inputDefault" type="text"><br>

                <label for="exampleTextarea">Descripción</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea><br>

                <label for="exampleSelect1">Categoría</label>
                <select class="form-control" id="exampleSelect1">
                    <option>Juguetes</option>
                    <option>Comidita</option>
                    <option>Javier Chivo</option>
                    <option>Curro Gay</option>
                    <option>Will Carroñero</option>
                </select><br>

                <label class="col-form-label" for="inputDefault">Precio Unitario</label>
                <input class="form-control" id="inputDefault" type="text"><br>
                <div style="display:flex; justify-content:space-around">
                    <button class="btn btn-primary" type="button">Confirmar</button>
                    <button class="btn btn-danger" type="button">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
