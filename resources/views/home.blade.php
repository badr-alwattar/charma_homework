@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5 text-center">
            <canvas id="AllowancesChart"></canvas>
            <h4 class="mt-5">Money Spent On Allowances (SAR)</h4>
        </div>
        <div class="col-sm-5 text-center">
            <canvas id="SalariesChart"></canvas>
            <h4 class="mt-5">Money Spent On Salaries (SAR)</h4>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        
        $(".sidebar-nav #home").addClass("active-sidebar");
        getPieChartData();
        getSalariesChart();


        function getSalariesChart() {
            let labels, datasets = [];
            $.ajax({
                url: "{{ route('slalries.chart') }}",
                type: "GET",
                async: false,
                success: function(response){
                    datasets = response.datasets
                    labels = response.labels          
                }
            });
        
            var ctx = document.getElementById('SalariesChart').getContext('2d');
            var SalariesChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '# of Votes',
                        data: datasets,
                        backgroundColor: [
                            // 'rgba(255, 99, 132, 0.2)',
                            // 'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            // 'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            // 'rgba(255, 99, 132, 1)',
                            // 'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            // 'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                
            });
        }



        function getPieChartData() {
            let labels, datasets = [];
            $.ajax({
                url: "{{ route('pie.chart.data') }}",
                type: "GET",
                async: false,
                success: function(response){
                    datasets = response.datasets
                    labels = response.labels          
                }
            });
        
            var ctx = document.getElementById('AllowancesChart').getContext('2d');
            var AllowancesChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '# of Votes',
                        data: datasets,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                
            });
        }
        
    </script>
@endsection