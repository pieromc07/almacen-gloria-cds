@extends('layout.template')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title"> <i class="fas fa-chart-bar"></i> Chart</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="pedidos"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="indicators"><br>
                <h3 class="tile-title"> <i class="fas fa-info-circle"></i> Indicators</h3><br>
                <h4>Coste Unitario de Almacenamiento</h4><h4 class="movD">{{$cosUniAlm}}</h4><br>
                <h4>Coste por unidad servida</h4><h4 class="movD">{{$cosUniServ}}</h4><br>
                <h4>Coste por m<sup>3</sup></h4><h4 class="movD">{{$cosXm}}</h4>
                
                
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('pedidos').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pendiente', 'Recibido', 'Distribuido'],
                datasets: [{
                    data: [{{$pen}}, {{$rec}} ,{{$dis}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(25, 132, 12, 1)',
                        'rgba(42, 114, 122, 1)',
                        'rgba(230, 130, 215, 1)',
                        'rgba(128, 190, 120, 1)'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                    }
                }
            },
        });
    </script>
@endsection
