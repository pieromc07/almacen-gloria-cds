@extends('layout.template')
@section('content')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
                <tr>
<<<<<<< HEAD:resources/views/product/list.blade.php
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Precio unitario</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $i => $product)
                    <tr>
                        <td>{{$i +1}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->brand}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->product_categories->category}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->unit_price}}</td>
                        <td>
                            <div class="options-list">
                                <a class="edit" href="{{ route('product.edit', $product) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('product.destroy', $product) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

=======
                    <th>CodPedido</th>
                    <th>Proveedor</th>
                    <th>Fecha de Orden</th>
                    <th>Fecha de entrega</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0001</td>
                    <td>Alicorp</td>
                    <td>08/08/2021</td>
                    <td>13/08/2021</td>
                    <td>pendiente <a href="#" class="fa fa-plus"> ver mas</a></td>
                </tr>
>>>>>>> feature-order:resources/views/order/list.blade.php
            </tbody>
        </table>
    </div>

@endsection
@section('script')
    <script type="text/javascript" src="/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>
@endsection
