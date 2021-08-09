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
                <tr>
                    <td>0001</td>
                    <td>Alicorp</td>
                    <td>08/08/2021</td>
                    <td>13/08/2021</td>
                    <td>pendiente <a href="#" class="fa fa-plus"> ver mas</a></td>
                </tr>
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
