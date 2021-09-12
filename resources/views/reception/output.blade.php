@extends('layout.template')
@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <h6>fecha de orden: <?php echo date('d-m-y'); ?></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="#" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">

                        <div class="form-group">
                            <label for="product">Producto</label>
                            <select class="form-control" id="products" type="text">
                                <option value="">Producto1</option>
                                <option value="">Producto2</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-6">

                        <div class="form-group">
                            <label for="product_name">Cantidad</label>
                            <input class="form-control" id="code" type="text" placeholder="" name="code" value="">
                        </div>

                    </div>
                </div>
                <div class="row d-flex justify-content-around">
                    <div class="col-6">
                        <div class="tile-footer d-flex justify-content-around">

                            <button class="btn btn-success" type="submit"><i
                                    class="fa fa-fw fa-lg fas fa-check"></i>Aceptar</button>

                            <button class="btn btn-primary" type="add"><i
                                    class="fa fa-fw fa-lg fas fa-plus"></i>Agregar</button>
                        </div>
                    </div>
                </div><br>

                <div class="ml-3 col-md-5 d-none alert alert-danger" role="alert" id="error-exists"><strong>This
                        product is already added</strong></div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="detalle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </form>
        </div>
    </div>
@endsection
