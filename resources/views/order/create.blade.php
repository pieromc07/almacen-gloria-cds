@extends('layout.template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{ route('product.store') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="product_name">Nombre del Producto</label>
                            <input class="form-control" id="product_name" type="text" placeholder="Nombre del Producto"
                                name="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion del Producto</label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Categoria de Producto</label>
                            <select class="form-control" id="category" name="product_categories_id">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="brand">Marca</label>
                            <input class="form-control" id="brand" type="text" placeholder="Marca" name="brand">
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input class="form-control" id="stock" type="number" min="0" placeholder="Stock" name="stock">
                        </div>
                        <div class="form-group">
                            <label for="unit_price">Precio Unitario</label>
                            <input class="form-control" id="unit_price" type="number" step="any" placeholder="0.00" name="unit_price">
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-around">
                    <div class="col-6">
                        <div class="tile-footer d-flex justify-content-around">
                            <button class="btn btn-primary" type="submit"><i
                                    class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>
                            <a class="btn btn-danger" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
