@extends('layout.template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{ route('supplier.store') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ruc">Código de pedido</label>
                            <input class="form-control" id="ruc" type="text" placeholder="Código de pedido" name="ruc">
                        </div>

                        <div class="form-group">
                            <label for="ruc">Descripción de pedido</label>
                            <textarea class="form-control" id="ruc" type="text" name="ruc" rows="5"> </textarea>
                        </div>

                        <div class="form-group">
                            <label for="ruc">Fecha de emisión</label>
                            <input class="form-control" id="date" name="date_required" type="date" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ruc">Fecha de recepción</label>
                            <input class="form-control" id="date" name="date_required" type="date" required>
                        </div>

                        <div class="form-group">
                            <label for="ruc">Proveedor</label>
                            <input class="form-control" id="ruc" type="text" placeholder="Proveedor" name="ruc">
                        </div>


                        <div class="form-group">
                            <label for="ruc">Cantidad pedida</label>
                            <input class="form-control" id="ruc" type="text" placeholder="Cantidad pedida" name="ruc">
                        </div>

                        <div class="form-group">
                            <label for="ruc">Cantidad recibida</label>
                            <input class="form-control" id="ruc" type="text" placeholder="Cantidad recibida" name="ruc">
                        </div>

                    </div>

                    <div class="row d-flex justify-content-around">
                        <div class="col-6">
                            <div class="tile-footer d-flex justify-content-around">
                                <button class="btn btn-success" type="submit"><i
                                    class="fa fa-fw fa-lg fa-check-circle"></i>Aceptar</button>
                                <button class="btn btn-danger" type="submit"><i
                                    class="fa fa-fw fa-lg fa-times-circle"></i>Rechazar</button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Cod. Pedido</th>
                                    <th>Fecha de emisión</th>
                                    <th>Fecha de recepción</th>
                                    <th>Proveedor</th>
                                    <th>Cantidad pedida</th>
                                    <th>Cantidad recibida</th>
                                    <th>Estado de pedido</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

            </form>
        </div>
    </div>
@endsection
