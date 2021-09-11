@extends('layout.template')
@section('content')
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
                <tr>
                    <th>RUC</th>
                    <th>Razon Social</th>
                    <th>Nombre de Contacto</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Make an order</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->ruc }}</td>
                        <td>{{ $supplier->business_name }}</td>
                        <td>{{ $supplier->contact_name }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>
                            <a href="{{ route('order.create', ['id'=>$supplier->id]) }}">
                                <i class="fas fa-file"></i>
                                Order
                            </a>
                        </td>
                        <td>
                            <div class="options-list">
                                <a class="edit" href="{{ route('supplier.edit', $supplier) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('supplier.destroy', $supplier) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>


                        </td>
                    </tr>
                @endforeach
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
