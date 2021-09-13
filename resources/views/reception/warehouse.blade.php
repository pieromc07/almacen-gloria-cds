@extends('layout.template')
@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <h6>fecha de orden: <?php echo date('d-m-y'); ?></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('storage.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <input type="hidden" name="reception_id" value="{{$reception->id}}">
                        <div class="form-group">
                            <label for="product_name">Número de registro</label>
                            <input type="hidden" name="code" value="{{ $codeStorage }}">
                            <input class="form-control" id="code" type="text" placeholder=""
                                value="{{ $codeStorage }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="product">Producto</label>
                            <select class="form-control" id="products" type="text">
                                @foreach ($receptionDetails as $detail)
                                    <option
                                        value="{{ $detail->product->id }}_{{ $detail->quantity_received }}_{{ $detail->product->product_categories->category }}_{{ $detail->price_unit }}">
                                        {{ $detail->product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product_name">Número de lote</label>
                            <input class="form-control" id="lot_number" type="text" placeholder=""
                                value="{{ $lot_number }}" disabled>
                        </div>
                    </div>

                    <div class="col-6">

                        <div class="form-group">
                            <label for="product_name">Cantidad</label>
                            <input class="form-control" id="quantity_received" type="text" placeholder="" disabled>
                        </div>

                        <div class="form-group mt-2">
                            <button class="btn btn-primary my-4" id="add"><i
                                    class="fa fa-fw fa-lg fa-dolly"></i>Agregar</button>
                        </div>

                    </div>
                </div>
                <div class="row d-flex justify-content-around">
                    <div class="col-6">
                        <div class="tile-footer d-flex justify-content-around">

                            <button class="btn btn-success" type="submit"><i
                                    class="fa fa-fw fa-lg fas fa-check"></i>Aceptar</button>
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
                                <th>Lote</th>
                                <th>Precio De Lote</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')

    <script>
        $(document).ready(function() {
            var indexSelect = $("#products").val().split('_');

            $('#quantity_received').val(indexSelect[1]);

            $('#products').change(function(e) {
                e.preventDefault();
                indexSelect = $("#products").val().split('_');
                $('#quantity_received').val(indexSelect[1]);
            });


            var index = 0;
            $('#add').click(function(e) {

                e.preventDefault();


                let select = document.getElementById('products');
                var values = $("#products").val().split('_');
                let indexSelect = document.getElementById('products').selectedIndex;
                $('#quantity_received').val(values[1]);
                let category = values[2];


                select.removeChild(select[indexSelect]);


                let quantity = $('#quantity_received').val();
                let lot_number = $('#lot_number').val();
                let price_unit = values[3]
                let row = '<tr id="row' + index +
                    '"><td><input type="hidden" name="lot_numbers[]" value="' +
                    lot_number + '-' + category.toUpperCase() +
                    '"><input type="hidden" name="lot_prices[]" value="' +
                    (parseInt(quantity) * parseInt(price_unit)) +
                    '"><input type="hidden" name="list_products[]" value="' +
                    values[0] + '"><input type="hidden" name="list_quantity[]" value="' + quantity +
                    '">' + (++index) + '</td><td>' +
                    lot_number + '-' + category.toUpperCase() + '</td><td>' + (parseInt(quantity) *
                        parseInt(
                            price_unit)) + '</td><td>' + quantity + '</td></tr>';

                $('#detalle').append(row);
                if (!$("#products").val()) {
                    $('#quantity_order').val(" ");
                    document.getElementById('products').disabled = true;
                    document.getElementById('quantity_received').disabled = true;
                    document.getElementById('add').disabled = true
                }
                $('#error').removeClass('d-block');
                if ($("#products").val()) {
                    values = $("#products").val().split('_');
                    $('#quantity_received').val(values[1]);
                }
            });




        });
    </script>

@endsection
