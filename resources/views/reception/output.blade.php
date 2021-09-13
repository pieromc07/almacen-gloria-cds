@extends('layout.template')
@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <h6>fecha de orden: <?php echo date('d-m-y'); ?></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('output.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">

                        <div class="form-group">
                            <label for="product">Producto</label>
                            <select class="form-control" id="products">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}_{{ $product->name }}_{{ $product->stock }}">
                                        {{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="col-6">

                        <div class="form-group">
                            <label for="product_name">Cantidad</label>
                            <input class="form-control" id="quantity" type="number" placeholder="" min="1" value="1">
                            <p id="error" class="text-danger font-weight-bold d-none">required</p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-around">
                    <div class="col-6">
                        <div class="tile-footer d-flex justify-content-around">

                            <button class="btn btn-success" type="submit"><i
                                    class="fa fa-fw fa-lg fas fa-check"></i>Aceptar</button>

                            <button class="btn btn-primary" id="add"><i
                                    class="fa fa-fw fa-lg fas fa-plus"></i>Agregar</button>
                        </div>
                    </div>
                </div><br>

                <div class="ml-3 col-md-5 d-none alert alert-danger" role="alert" id="error-exists"><strong>This
                        product is already added</strong></div>
                <div class="ml-3 col-md-5 d-none alert alert-danger" role="alert" id="error-stock"><strong>This
                        product is already added</strong></div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="detalle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Quitar</th>
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
        let index = 0;
        let i = 1;
        let list_Product = [];
        $('#add').click(function(e) {
            e.preventDefault();
            let product = $('#products').val().split('_');
            let quantity = $('#quantity').val();

            if (validate(quantity, product[0], product[2])) {
                let row = '<tr id="row' + index +
                    '"><td><input type="hidden" name="list_products[]" value="' +
                    product[0] + '"><input type="hidden" name="list_quantity[]" value="' + quantity +
                    '">' + i++ +
                    '</td><td>' + product[1] + '</td><td>' + quantity +
                    '</td><td><button onclick="remove(' + index +
                    ' )" class="btn btn-danger"><i class="fas fa-minus"></i></button></td></tr>';
                $('#error').removeClass('d-block');
                $('#detalle').append(row);
                list_Product[index] = [product[0]];
                index++;
                $('#quantity').val(1);
                $('#error-exists').removeClass('d-block');
            }



        });

        function remove(row) {
            $('#row' + row).remove();
            list_Product.splice(row);
            index--;
            i--;
        }

        function validate(units, id, stock) {
            console.log(units + ' ' + stock);

            if (parseInt(units) <= parseInt(stock)) {
                if (parseInt(units) != 0) {
                    for (let count = 0; count < list_Product.length; count++) {
                        const element = list_Product[count];
                        if (element == id) {
                            $('#error-exists').addClass('d-block');
                            return false;
                        }
                    }
                    return true;
                } else {
                    $('#error').addClass('d-block');
                    return false;
                }
            } else {
                $('#error-stock').addClass('d-block');
                return false;
            }
        }
    </script>

@endsection
