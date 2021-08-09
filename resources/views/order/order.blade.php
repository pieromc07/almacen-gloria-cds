@extends('layout.template')
@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <h6>fecha de orden: <?php echo date("d-m-y");?></h6>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="product_name">Codigo de Pedido</label>
                            <input class="form-control" id="product_name" type="text" placeholder="Nombre del Producto"
                                name="name">
                        </div>

                        <div class="form-group">
                            <label for="category">Fecha de entrega</label>
                            <input class="form-control" id="category" name="product_categories_id" type="date">
                        </div>
                        <div class="form-group">
                            <label for="brand">Proveedor</label>
                            <select class="form-control" id="brand" type="text" placeholder="Marca" name="brand">
                            <option value="">Alicorp</option>
                            <option value="">Nestle</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="brand">Categoría</label>
                            <select class="form-control" id="brand" type="text" placeholder="Marca" name="brand">
                            <option value="">Juguetes</option>
                            <option value="">Comida</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand">Producto</label>
                            <select class="form-control" id="brand" type="text" placeholder="Marca" name="brand">
                            <option value="">Juguetes</option>
                            <option value="">Comida</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-around">
                    <div class="col-6">
                        <div class="tile-footer d-flex justify-content-around">
                            <button class="btn btn-primary" type="submit"><i
                                    class="fa fa-fw fa-lg fa-plus"></i>Agregar</button>
                            <a class="btn btn-danger" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </form><br>

            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre de Producto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
