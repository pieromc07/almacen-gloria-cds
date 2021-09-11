@extends('layout.template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{ route('recepcion.create') }}">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="ruc">Código de pedido</label>
                            <input type="text" name="order_id" id="" value="{{ $order->id }}" hidden>
                            <input class="form-control" type="text" placeholder="Código de pedido"
                                value="{{ $order->code }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="ruc">Fecha de Requerida</label>
                            <input class="form-control" id="date" type="date" disabled
                                value="{{ $order->date_required }}">
                        </div>
                        <div class="form-group">
                            <label for="">Proveedor</label>
                            <input class="form-control" type="text" placeholder="Proveedor"
                                value="{{ $order->supplier->business_name }}" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="ruc">Fecha de recepción</label>
                            <input type="date" name="date_reception" id="" value="{{ $date }}" hidden>
                            <input class="form-control" id="date" type="date" value="{{ $date }}" disabled>
                        </div>



                        <div class="form-group">
                            <label for="ruc">Producto del Pedido</label>
                            <select class="form-control" name="" id="products">
                                @foreach ($orderDetails as $detail)
                                    <option value="{{ $detail->product->id }}_{{ $detail->quantity }}">
                                        {{ $detail->product->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ruc">Cantidad pedida</label>
                            <input class="form-control" id="quantity_order" type="text" placeholder="Cantidad pedida">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="ruc">Cantidad recibida</label>
                            <input class="form-control" id="quantity_received" type="text"
                                placeholder="Cantidad recibida">
                            <span id="error" class="alert alert-danger d-none" role="alert"></span>
                        </div>
                        <div class="form-group">
                            <label for="ruc">Estado del Producto</label>
                            <select class="form-control" name="" id="status">
                                <option value="CONFORME">CONFORME</option>
                                <option value="DESCONFORME">DESCONFORME</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="form-control btn btn-primary mt-4" id="add">
                                <i class="fas fa-plus-circle mr-2"></i>
                                Confirmar
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center my-3">
                    <div class="col-6 d-flex justify-content-around">
                        <button class="btn btn-success" type="submit"><i
                                class="fa fa-fw fa-lg fa-check-circle"></i>Aceptar</button>
                        <button class="btn btn-danger" type="submit"><i
                                class="fa fa-fw fa-lg fa-times-circle"></i>Rechazar</button>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="detalle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Cantidad pedida</th>
                                        <th>Cantidad recibida</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="/js/plugins/select2.min.js"></script>
    <script type="text/javascript">
        $('#products').select2();
        $(document).ready(function() {



            var indexSelect = $("#products").val().split('_');

            $('#quantity_order').val(indexSelect[1]);

            $('#products').change(function(e) {
                e.preventDefault();
                indexSelect = $("#products").val().split('_');
                $('#quantity_order').val(indexSelect[1]);
            });


            var index = 0;
            $('#add').click(function(e) {

                e.preventDefault();

                if ($('#quantity_received').val()) {

                    let select = document.getElementById('products');
                    var values = $("#products").val().split('_');
                    let indexSelect = document.getElementById('products').selectedIndex;
                    $('#quantity_order').val(values[1]);
                    select.removeChild(select[indexSelect]);


                    let quantity = $('#quantity_received').val();
                    let status = $('#status').val();
                    let row = '<tr id="row' + index +
                        '"><td><input type="hidden" name="quantity_orders[]" value="' +
                        values[1] + '"><input type="hidden" name="status[]" value="' +
                        status + '"><input type="hidden" name="list_quantity[]" value="' + quantity +
                        '">' + (++index) + '</td><td>' +
                        values[1] + '</td><td>' + quantity + '</td><td>' + status + '</td></tr>';

                    $('#detalle').append(row);
                    if (!$("#products").val()) {
                        $('#quantity_order').val(" ");
                        document.getElementById('products').disabled = true;
                        document.getElementById('quantity_order').disabled = true;
                        document.getElementById('quantity_received').disabled = true;
                        document.getElementById('status').disabled = true
                        document.getElementById('add').disabled = true
                    }
                    $('#error').removeClass('d-block');
                    values = $("#products").val().split('_');
                    $('#quantity_order').val(values[1]);
                } else {
                    $('#error').addClass('d-block');
                    $('#error').html("Cantidad requerida");
                }
            });
        });
    </script>
@endsection
