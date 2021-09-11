@extends('layout.template')
@section('content')

    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
                <tr>
                    <th>CodPedido</th>
                    <th>Proveedor</th>
                    <th>Fecha de Orden</th>
                    <th>Fecha de entrega</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->code}}</td>
                        <td>{{$order->supplier->business_name}}</td>
                        <td>{{$order->date_current}}</td>
                        <td>{{$order->date_required}}</td>
                        <td>{{$order->status}}</td>
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
