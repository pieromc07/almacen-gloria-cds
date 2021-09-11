@extends('layout.template')
@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <h6>fecha de orden: <?php echo date('d-m-y'); ?></h6>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="product_name">Codigo de Pedido</label>
                            <input class="form-control" id="code" type="text" placeholder="" name="code"
                                value="{{ $codeOrder }}">
                        </div>
                        <div class="form-group">
                            <label for="date">Fecha de entrega</label>
                            <input class="form-control" id="date" name="date_required" type="date" required>
                        </div>
                        <div class="form-group">
                            <label class="d-flex flex-wrap align-content-center" for="quantiy">{{ __('Quantiy') }}</label>
                            <input class="form-control" type="number" id="quantity" value="1" min="1"
                                placeholder="number">
                            <p id="error" class="text-danger font-weight-bold d-none">required</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="supplier">Proveedor</label>
                            <input class="form-control" type="text" value="{{ $supplier->business_name }}">
                            <input type="text" name="supplier_id" value="{{ $supplier->id }}" hidden>
                        </div>
                        <div class="form-group">
                            <label for="product">Producto</label>
                            <select class="form-control" id="products" type="text">
                                @foreach ($categories as $category)
                                    <optgroup label="{{ $category->category }}">
                                        @foreach ($products as $product)
                                            @if ($product->product_categories->id == $category->id)
                                                <option
                                                    value="{{ $product->id }}_{{ $product->name }}_{{ $product->unit_price }}_{{ $product->stock }}">
                                                    {{ $product->name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <button class="btn btn-primary my-4" id="add"><i
                                    class="fa fa-fw fa-lg fa-plus"></i>Agregar</button>
                        </div>

                    </div>
                </div>
                <div class="row d-flex justify-content-around">
                    <div class="col-6">
                        <div class="tile-footer d-flex justify-content-around">

                            <button class="btn btn-success" type="submit"><i
                                    class="fa fa-fw fa-lg fas fa-check"></i>Realizar Pedido</button>
                        </div>
                    </div>
                </div>


                <div class="ml-3 col-md-5 d-none alert alert-danger" role="alert" id="error-exists"><strong>This
                        product is already added</strong></div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="detalle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre de Producto</th>
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
    <script type="text/javascript" src="/js/plugins/select2.min.js"></script>
    <script type="text/javascript">
        $('#products').select2();
        let index = 0;
        let i = 1;
        let total = 0;
        let list_Product = [];
        $('#total').html(total);
        $('#add').click(function(e) {
            e.preventDefault();
            let product = $('#products').val().split('_');
            let quantity = $('#quantity').val();
            if (validate(quantity, product[0], product[3])) {
                let row = '<tr id="row' + index + '"><td><input type="hidden" name="list_products[]" value="' +
                    product[0] + '"><input type="hidden" name="list_quantity[]" value="' + quantity + '">' + i++ +
                    '</td><td>' + product[1] + '</td><td>' + quantity + '</td><td><button onclick="remove(' +
                    index + ' , ' + (product[2] *
                        quantity) + ' )" class="btn btn-danger"><i class="fas fa-minus"></i></button></td></tr>';
                $('#error').removeClass('d-block');
                $('#detalle').append(row);
                total += (product[2] * quantity);
                list_Product[index] = [product[0]];
                $('#total').html(total);
                index++;
                $('#quantity').val(1);
                $('#error-exists').removeClass('d-block');
            }
        });

        function remove(row, price) {
            $('#row' + row).remove();
            total -= price;
            list_Product.splice(row);
            $('#total').html(total);
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
